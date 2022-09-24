// pattern se bodi.c


#include "C:\Program Files\Microsoft Visual Studio\MyProjects\Common\OpenGLSB.h"	// System and OpenGL Stuff
#include "C:\Program Files\Microsoft Visual Studio\MyProjects\Common\GLTools.h"       // gltools library
#include <math.h>
#include <gltools.h>
// Rotation amounts
static GLfloat xRot = 0.0f;
static GLfloat yRot = 0.0f;
float poly[12];

// These values need to be available globally
// Light values and coordinates
GLfloat  ambientLight[] = { 0.9f, 0.9f, 0.9f, 1.0f };
GLfloat  diffuseLight[] = { 1.0f, 1.0f, 1.0f, 1.0f };
GLfloat  specular[] = { 1.0f, 1.0f, 1.0f, 1.0f};
GLfloat	 lightPos[] = { 40.0f, 120.0f, -5.0f, 0.0f };
GLfloat  specref[] =  { 1.0f, 1.0f, 1.0f, 1.0f };

// Transformation matrix to project shadow
GLTMatrix shadowMat;
static int iShape=1;


////////////////////////////////////////////////
// This function just specifically draws the cube
void ProcessMenu(int value)
	{
	
	iShape = value;
	
    glutPostRedisplay();

	}

void Drawpat(int nShadow)
	{
	GLTVector3 vNormal;	// Storeage for calculated surface normal

	// Nose Cone /////////////////////////////
	// Set material color, note we only have to set to black
	// for the shadow once



	int i,j=1,c=1;
	float u=0.5, v=0.0,R=100,p=3.1415;
	const float t= 1.0/8.0;
	

	
	
	for(i=1;i<=8;i++)
	{
		for(j=1;j<=8;++j)
		{
			poly[0] = R*cos(p*u)*cos(2*p*v);
		    poly[1] = R*cos(p*u)*sin(2*p*v);
			poly[2] = R*sin(p*u);

			poly[3] = R*cos(p*(u+t))*cos(2*p*v);
			poly[4] = R*cos(p*(u+t))*sin(2*p*v);
			poly[5] = R*sin(p*(u+t));

			poly[6] = R*cos(p*(u+t))*cos(2*p*(v+t));
			poly[7] = R*cos(p*(u+t))*sin(2*p*(v+t));
			poly[8] = R*sin(p*(u+t));

			poly[9] = R*cos(p*u)*cos(2*p*(v+t));
			poly[10] = R*cos(p*u)*sin(2*p*(v+t));
			poly[11] = R*sin(p*u);

	///color for light

      
		if (nShadow==0)
		{

			if (c==1) glColor3f(1.0,1.0,0.0);
			if (c==-1) glColor3f(1.0,0.0,0.0);}
	
     	else
            glColor3ub(0,0,0);

			c=c*(-1);

			glBegin(GL_POLYGON);
                {
                GLTVector4 vPoints[4] = {{poly[0],poly[1],poly[2],1.5 },
                                        { poly[3],poly[4],poly[5],1.5 }, 
				{ poly[6],poly[7],poly[8],1.5 },
				{poly[9],poly[10],poly[11],1.5}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex4fv(vPoints[0]);
		glVertex4fv(vPoints[1]);
		glVertex4fv(vPoints[2]);
		glVertex4fv(vPoints[3]);
                }
			glEnd();
			v=v+ (1.0/8.0); // v changes from 0 degree to 360
	      }
	 u=u + ( 1.0/8.0); // u changes from -90 to 90 degree
	 v=1.0;
	 c= c*(-1);
    }

	}

// Called to draw scene
void RenderScene(void)
    {

    // Clear the window with current clearing color
    glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

    // Draw the ground, we do manual shading to a darker green
    // in the background to give the illusion of depth
    glBegin(GL_QUADS);
        glColor3ub(38,158,217);
        glVertex3f(200.0f, -150.0f, -400.0f);
        glVertex3f(-200.0f, -150.0f, -400.0f);
        glVertex3f(-200.0f, -150.0f, 100.0f);
        glVertex3f(200.0f, -150.0f, 100.0f);
    glEnd();

    // Save the matrix state and do the rotations
    glPushMatrix();

if (iShape==1)
 {
    glEnable(GL_LIGHTING);
}
    glLightfv(GL_LIGHT0,GL_POSITION,lightPos);
    glRotatef(xRot, 1.0f, 0.0f, 0.0f);
    glRotatef(yRot, 0.0f, 1.0f, 0.0f);

    Drawpat(0);

    // Restore original matrix state
    glPopMatrix();	


    glDisable(GL_LIGHTING);
    glPushMatrix();

    // Multiply by shadow projection matrix
    glMultMatrixf((GLfloat *)shadowMat);

    // Now rotate the cube around in the new flattend space
    glRotatef(xRot, 1.0f, 0.0f, 0.0f);
    glRotatef(yRot, 0.0f, 1.0f, 0.0f);

    // Pass true to indicate drawing shadow
if (iShape==1)
 { 
    Drawpat(1);	
}
    // Restore the projection to normal
    glPopMatrix();
 	glPushMatrix();

 
    // Display the results
    glutSwapBuffers();
    }

// This function does any needed initialization on the rendering
// context. 
void SetupRC()
    {
    // Any three points on the ground (counter clockwise order)
    GLTVector3 points[3] = {{ -30.0f, -149.0f, -20.0f },
                            { -30.0f, -149.0f, 20.0f },
                            { 40.0f, -149.0f, 20.0f }};

    // Setup and enable light 0
    glLightfv(GL_LIGHT0,GL_AMBIENT,ambientLight);
    glLightfv(GL_LIGHT0,GL_DIFFUSE,diffuseLight);
	glLightfv(GL_LIGHT0,GL_SPECULAR,specular);
    glLightfv(GL_LIGHT0,GL_POSITION,lightPos);
 
	glEnable(GL_LIGHT0);

    // Enable color tracking
    glEnable(GL_COLOR_MATERIAL);
	
    // Set Material properties to follow glColor values
    glColorMaterial(GL_FRONT, GL_AMBIENT_AND_DIFFUSE);

    // All materials hereafter have full specular reflectivity
    // with a high shine
    glMaterialfv(GL_FRONT, GL_SPECULAR,specref);
    glMateriali(GL_FRONT,GL_SHININESS,10);

    // Light blue background
    glClearColor(0.1882f, 0.4156f, 0.6470f, 1.0f );

    // Calculate projection matrix to draw shadow on the ground
    gltMakeShadowMatrix(points, lightPos, shadowMat);

	glEnable(GL_DEPTH_TEST);	
    glEnable(GL_DITHER);
    glShadeModel(GL_SMOOTH);
    }

void SpecialKeys(int key, int x, int y)
    {
    if(key == GLUT_KEY_UP)
        xRot-= 5.0f;

    if(key == GLUT_KEY_DOWN)
        xRot += 5.0f;

    if(key == GLUT_KEY_LEFT)
        yRot -= 5.0f;

    if(key == GLUT_KEY_RIGHT)
        yRot += 5.0f;

    if(key > 356.0f)
        xRot = 0.0f;

    if(key < -1.0f)
        xRot = 355.0f;

    if(key > 356.0f)
        yRot = 0.0f;

    if(key < -1.0f)
        yRot = 355.0f;

    // Refresh the Window
    glutPostRedisplay();
    }


void ChangeSize(int w, int h)
    {
    GLfloat fAspect;

    // Prevent a divide by zero
    if(h == 0)
        h = 1;

	
    // Set Viewport to window dimensions
    glViewport(0, 0, w, h);

    // Reset coordinate system
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();

    fAspect = (GLfloat)w/(GLfloat)h;
    gluPerspective(60.0f, fAspect, 200.0, 500.0);

    glMatrixMode(GL_MODELVIEW);
    glLoadIdentity();

    // Move out Z axis so we can see everything
    glTranslatef(0.0f, 0.0f, -390.0f);
    glLightfv(GL_LIGHT0,GL_POSITION,lightPos);
    }

int main(int argc, char* argv[])
    {
	int nOnOffMenu;
	int nMainMenu;

    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH);
    glutInitWindowSize(800, 600);
    glutCreateWindow("pattern,sebodi");

	nOnOffMenu = glutCreateMenu(ProcessMenu);
	glutAddMenuEntry("On",1);
	glutAddMenuEntry("Off",2);

	nMainMenu = glutCreateMenu(ProcessMenu);
	glutAddSubMenu("OnOff", nOnOffMenu);
	glutAttachMenu(GLUT_RIGHT_BUTTON);


    glutReshapeFunc(ChangeSize);
    glutSpecialFunc(SpecialKeys);
    glutDisplayFunc(RenderScene);
    SetupRC();
    glutMainLoop();

    return 0;
    }
