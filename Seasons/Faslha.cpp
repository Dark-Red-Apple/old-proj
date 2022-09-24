// faslha seasons



#include "C:\Program Files\Microsoft Visual Studio\MyProjects\Common\OpenGLSB.h"	// System and OpenGL Stuff
#include "C:\Program Files\Microsoft Visual Studio\MyProjects\Common\GLTools.h"        // gltools library
#include <math.h>
#define GL_PI 3.1415f
// Rotation amounts
static GLfloat xRot = 0.0f;
static GLfloat yRot = 0.0f;

// These values need to be available globally
// Light values and coordinates
GLfloat  ambientLight[] = { 1.0f, 1.0f, 1.0f, 1.0f };
GLfloat  diffuseLight[] = { 1.0f, 1.0f, 1.0f, 1.0f };
GLfloat  specular[] = { 1.0f, 1.0f, 1.0f, 1.0f};
GLfloat	 lightPos[] = { 50.0f, 100.0f, -10.0f, 0.0f };
GLfloat  specref[] =  { 1.0f, 1.0f, 1.0f, 1.0f };
// Transformation matrix to project shadow
GLTMatrix shadowMat;
GLfloat x=30,z=0,angle,x2,y2,angle2;
int f=0,g=0,r=0,m=0;
GLfloat ra=60,e=75,k=10,t=150;
static int iShape=2,n=2 ;
int snow[1000][800];
int snowX;
int snowY;

///////////////////////////////////////////////////////////
void ProcessMenu(int value)
	{
	
	iShape = value;
	
    glutPostRedisplay();

	}
///////////////////////////////////////////////////////////
void animation(int p)
	{

	GLTVector3 vNormal;
	GLfloat x1,y1,angle1;

 	if(p == 0)
           glColor3ub(97,56, 1);
	else
            glColor3ub(0,0,0);


 //************adamkha
    
glColor3ub(118,27, 90);


glPushMatrix();
glTranslatef(-165.0f+f, -150.0f, 38.0f+g);
glBegin(GL_QUADS);
                
  
                {
                GLTVector3 vPoints[4] = {{ 13,40,0},
                                        { 17,40,0},
                                        { 17,20,0},
				                       { 13,20,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }

  ////////paha/chap
if(p == 0)
glColor3ub(0,0, 64);
else
glColor3ub(0,0,0);
glRotatef(ra,1.0f,0.0f,0.0f);
   
             {
                GLTVector3 vPoints[4] = {{ 13,20,0},
                                        { 15,20,0},
                                        { 13,10,0},
				                       { 11,10,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }

  
                {
                GLTVector3 vPoints[4] = {{ 11,10,0},
                                        { 13,10,0},
                                        { 11,0,0},
				                       { 9,0,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
//rast

				{
                GLTVector3 vPoints[4] = {{ 15,20,0},
                                        { 17,20,0},
                                        { 19,10,0},
				                       { 17,10,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }

				{
                GLTVector3 vPoints[4] = {{ 17,10,0},
                                        { 19,10,0},
                                        { 21,0,0},
				                       { 19,0,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
//dastha /chap
if(p == 0)
glColor3ub(237,173, 7254);
else
glColor3ub(0,0,0);				{
                GLTVector3 vPoints[4] = {{ 13,36,0},
                                        { 13,33,0},
                                        { 9,15,0},
				                       { 9,18,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
//rast
   				{
                GLTVector3 vPoints[4] = {{ 17,36,0},
                                        { 21,18,0},
                                        { 21,15,0},
				                       { 17,33,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
   glEnd();


    glPopMatrix();
    glPushMatrix();
    glTranslatef(-150.0f+f, -105.0f,39.0f+g);	 
	glBegin(GL_POLYGON);
	for(angle1 = 0.0f; angle1 <= (2.0f*GL_PI); angle1 += 0.05f)
		{
		x1 = 6.5f*sin(angle1);
		y1 = 6.5f*cos(angle1);
	
		glVertex2f(x1, y1);
	
		}


	glEnd();

//*************************dokhtar
if(p == 0)	    
glColor3ub(118,27, 90);
else
glColor3ub(0,0,0);

glPopMatrix();
glPushMatrix();
glTranslatef(-140.0f+f, -150.0f, 90.0f+m+g);
glBegin(GL_QUADS);
                
  
                {
                GLTVector3 vPoints[4] = {{ 13,40,0},
                                        { 17,40,0},
                                        { 17,20,0},
				                       { 13,20,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }

  ////////paha/chap
if(p == 0)
glColor3ub(247,202, 172);
else
glColor3ub(0,0,0);


  
                   {
                GLTVector3 vPoints[4] = {{ 11,10,0},
                                        { 13,10,0},
                                        { 11,0,0},
				                       { 9,0,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
//rast


				{
                GLTVector3 vPoints[4] = {{ 17,10,0},
                                        { 19,10,0},
                                        { 21,0,0},
				                       { 19,0,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
//dastha /chap
if(p == 0)
glColor3ub(247,202, 172);
else
glColor3ub(0,0,0);				{
                GLTVector3 vPoints[4] = {{ 13,36,0},
                                        { 13,33,0},
                                        { 9,15,0},
				                       { 9,18,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
//rast
   				{
                GLTVector3 vPoints[4] = {{ 17,36,0},
                                        { 21,18,0},
                                        { 21,15,0},
				                       { 17,33,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
   glEnd();
//daman
if(p == 0)
glColor3ub(194,12, 57);
else
glColor3ub(0,0,0);

   glBegin(GL_POLYGON); 
                   {
                GLTVector3 vPoints[4] = {{ 13,20,0},
                                        { 17,20,0},
                                        { 21,10,0},
				                       { 9,10,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
if(p == 0)
glColor3ub(237,173, 7254);
else
glColor3ub(0,0,0);

glEnd();
    glPopMatrix();
    glPushMatrix();
    glTranslatef(-125.0f+f, -105.0f,91.0f+m+g);	 
	glBegin(GL_POLYGON);
	for(angle1 = 0.0f; angle1 <= (2.0f*GL_PI); angle1 += 0.05f)
		{
		x1 = 6.5f*sin(angle1);
		y1 = 6.5f*cos(angle1);
	
		glVertex2f(x1, y1);
	
		}


	glEnd();
	
 //*******************************************dare khane
  if(p == 0)
  glColor3ub(182,103, 24);
  else
  glColor3ub(0,0,0);
  glPopMatrix();
  glPushMatrix();
  glTranslatef(-165.0f, -150.0f, 40.0f);
  glBegin(GL_QUADS);
                
  
                {
                GLTVector3 vPoints[4] = {{ 0,0,0},
                                        { x,0,z},
                                        { x,50,z},
				                       { 0,50,0}};

        gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
        glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);

                }
                
   glEnd();
				   	if( angle <= (0.5f*GL_PI) && m==-48)
		{
		z = 30.0f*sin(angle);
		x = 30.0f*cos(angle);
		angle+=0.1;
		}


/////////////////////////////////////////shokoofeha

if (iShape==1)
{

  glPopMatrix();
  glPushMatrix();
	glColor3ub(92,112,163);
	glTranslatef(e+4, k,t);
    glutSolidSphere(1.5f, 20, 15);

  glPopMatrix();
  glPushMatrix();
   glColor3f(0.9764f, 0.5686f, 0.7411f);
	glTranslatef(e,k+4,t);
    glutSolidSphere(1.5f, 20, 15);  

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e-4, k,t);
    glutSolidSphere(1.5f, 20, 15); 

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e, k-4,t);
    glutSolidSphere(1.5f, 20, 15);

  glPopMatrix();
  glPushMatrix();
  glTranslatef(e, k,t);
	glColor3f(0.9294f, 0.2705f, 0.6509f);
    glutSolidSphere(1.0f, 20, 15);
///
  glPopMatrix();
  glPushMatrix();
	glColor3f(0.7764f, 0.1490f, 0.3843f);
	glTranslatef(e+4-7, k+6,t);
    glutSolidSphere(1.5f, 20, 15);

  glPopMatrix();
  glPushMatrix();
   glColor3f(0.9764f, 0.5686f, 0.7411f);
	glTranslatef(e-7,k+4+6,t);
    glutSolidSphere(1.5f, 20, 15);  

  glPopMatrix();
  glPushMatrix();
	glColor3ub(191,64,191);
	glTranslatef(e-4-7, k+6,t);
    glutSolidSphere(1.5f, 20, 15); 

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e-7, k-4+6,t);
    glutSolidSphere(1.5f, 20, 15);

  glPopMatrix();
  glPushMatrix();
  glTranslatef(e-7, k+6,t);
	glColor3f(0.9294f, 0.2705f, 0.6509f);
    glutSolidSphere(1.0f, 20, 15);
//
  glPopMatrix();
  glPushMatrix();
	glColor3f(0.7764f, 0.1490f, 0.3843f);
	glTranslatef(e+4-35, k+50,t);
    glutSolidSphere(2.0f, 20, 15);

  glPopMatrix();
  glPushMatrix();
   glColor3f(0.9764f, 0.5686f, 0.7411f);
	glTranslatef(e-35,k+4+50,t);
    glutSolidSphere(2.0f, 20, 15);  

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e-4-35, k+50,t);
    glutSolidSphere(2, 20, 15); 

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e-35, k-4+50,t);
    glutSolidSphere(2, 20, 15);

  glPopMatrix();
  glPushMatrix();
  glTranslatef(e-35, k+50,t);
	glColor3f(0.9294f, 0.2705f, 0.6509f);
    glutSolidSphere(2.5f, 20, 15);
//
  glPopMatrix();
  glPushMatrix();
	glColor3f(0.7764f, 0.1490f, 0.3843f);
	glTranslatef(e+4-45, k+10,t);
    glutSolidSphere(2.0f, 20, 15);

  glPopMatrix();
  glPushMatrix();
   glColor3f(0.9764f, 0.5686f, 0.7411f);
	glTranslatef(e-45,k+4+10,t);
    glutSolidSphere(2.0f, 20, 15);  

  glPopMatrix();
  glPushMatrix();
	glColor3ub(221,74,34);
	glTranslatef(e-4-45, k+10,t);
    glutSolidSphere(2, 20, 15); 

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(e-45, k-4+10,t);
    glutSolidSphere(2, 20, 15);

  glPopMatrix();
  glPushMatrix();
  glTranslatef(e-45, k+10,t);
	glColor3ub(221,181,32);
    glutSolidSphere(2.5f, 20, 15);
	//sabete
	  glPopMatrix();
  glPushMatrix();
	glColor3f(0.7764f, 0.1490f, 0.3843f);
	glTranslatef(75+4-45+3, 20-15,150);
    glutSolidSphere(2.0f, 20, 15);

  glPopMatrix();
  glPushMatrix();
   glColor3f(0.9764f, 0.5686f, 0.7411f);
	glTranslatef(75-45+3,20+4-15,150);
    glutSolidSphere(2.0f, 20, 15);  

  glPopMatrix();
  glPushMatrix();
	glColor3ub(221,74,34);
	glTranslatef(75-4-45+3, 20-15,150);
    glutSolidSphere(2, 20, 15); 

  glPopMatrix();
  glPushMatrix();
	glColor3f(0.9294f, 0.4274f, 0.4039f);
	glTranslatef(75-45+3, 20-4-15,150);
    glutSolidSphere(2, 20, 15);

  glPopMatrix();
  glPushMatrix();
  glTranslatef(75-45+3, 20-15,150);
	glColor3ub(221,181,32);
    glutSolidSphere(2.5f, 20, 15);


	if (k>-200){
		k-=1;

		t-=0.3;
	}

	

}


	//Barf

	if (iShape == 4){
		int iif,jjf;
		for (int ii=400;ii>0;ii--){
			for(int jj=260;jj>0;jj--){
				if(snow[ii][jj]==1){
					iif=ii;
					jjf=jj;
					glPopMatrix();
					glPushMatrix();
					glTranslatef(-200.0+iif, 135.0-jjf,150);
				
					glColor3ub(250,250,250);
					glutSolidSphere(1.0f, 20, 15);
//					glBegin(GL_POINTS);
					//glVertex3f(ii,jj,150);
					//glEnd();
					snow[ii][jj]=0;
					if(jj<250)
							snow[ii][jj+1]=1;
					else
						snow[ii][1]=1;

				}
			}
		}
			
	}
//avaz kardane jaye shokoofeha
	if(iShape==2||iShape==3||iShape==4){

          e=75;
		  k=10;
		  t=150;
		  }
/////////////////////////////////////////////////
glPopMatrix();

if(m>-48)
	m--;

if(g<20 && angle > (0.5f*GL_PI))
	g++;
if(g==20 && f<180){
	f+=2;
	ra++;
}



	}
/////////////////////////////////////   Jangal ////////////////////////////////////
void DrawJ(int l)
{
	GLfloat x,y,angle;
	GLTVector3 vNormal;
	int m=-90;
    int j=-350;

	for(int k=-85;k<200;k+=10)
{
	for (j;j<560;j+=12)
	       {
    glPushMatrix();
    glTranslatef(j,k,m);
	
	glBegin(GL_POLYGON);
	      {
    GLTVector3 vPoints[4] = {{ -3, 0,0},{ 3, 0,0},{ 3, -75,0},{-3, -75,0}};
               
    gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
   	glNormal3fv(vNormal);
                	

 	if(l == 0)
	{

		glColor3ub(176,200,179);
        glColor3f(0.4941f, 0.3490f, 0.2549f);

	}
	else
	{  
		glColor3ub(0,0,0);
	}

	glVertex3fv(vPoints[0]);
	glVertex3fv(vPoints[1]);
	glColor3f(0.3254f, 0.2078f, 0.1333f);
    glVertex3fv(vPoints[2]);
	glVertex3fv(vPoints[3]);
		}
	glEnd();
	

    
	if(iShape==1)
	glColor3ub(18, 122,45);
    if(iShape==2)
    glColor3f(0.1411f, 0.4039f, 0.1058f);
    if(iShape==3)
	glColor3ub(206,85,4);
    if(iShape==4)
    glColor3ub(160,188,163);

    glutSolidSphere(35.0f, 15, 15);
	glPopMatrix();
	     }
    m-=10;
    j=-350+3;


}
//******dareakht
    glPushMatrix();
    glTranslatef(75, 25.0f,43.0f);
	glutSolidSphere(85.0f, 20, 15);
	glPopMatrix();
    glPushMatrix();
    glTranslatef(135, 25.0f,75.0f);
	glutSolidSphere(25.0f, 20, 15);
	glPopMatrix();
	glPushMatrix();
    glTranslatef(7, 25.0f,80.0f);
	glutSolidSphere(20.0f, 20, 15);
	glPopMatrix();
	glPushMatrix();
    glTranslatef(80, -20.0f,100.0f);
	glutSolidSphere(20.0f, 20, 15);
	glPopMatrix();
	glPushMatrix();
    glTranslatef(85, 50.0f,110.0f);
	glutSolidSphere(20.0f, 20, 15);
	glPopMatrix();
	glPushMatrix();
    glTranslatef(50, 70.0f,90.0f);
	glutSolidSphere(20.0f, 20, 15);

 //***********abr 
	glColor3ub(26,63,132);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-100.0f, 120.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-90.0f, 110.0f, -120.0f);
	glutSolidSphere(20.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-90.0f, 110.0f, -120.0f);
	glutSolidSphere(32.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-110.0f, 110.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-120.0f, 110.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-140.0f, 110.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-150.0f, 90.0f, -120.0f);
	glutSolidSphere(20.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-170.0f, 100.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-120.0f, 90.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-90.0f, 90.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	////abr
	glColor3ub(47,78,174);
	glTranslatef(-180.0f, 90.0f, -120.0f);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-180.0f, 90.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-190.0f, 80.0f, -120.0f);
	glutSolidSphere(20.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-190.0f, 80.0f, -120.0f);
	glutSolidSphere(32.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-190.0f, 80.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-200.0f, 80.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-220.0f, 80.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-230.0f, 60.0f, -120.0f);
	glutSolidSphere(20.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-250.0f, 70.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-200.0f, 60.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);
	glPopMatrix();
	glPushMatrix();
	glTranslatef(-150.0f, 60.0f, -120.0f);
	glutSolidSphere(30.0f, 20, 100);

glPopMatrix();
	}

//////////////////////////////////aShkale sabet dgar///////////////////////////////
void Drawcube(int nShadow)
	{


	GLTVector3 vNormal;	// Storeage for calculated surface normal

	// Nose Cone /////////////////////////////
	// Set material color, note we only have to set to black
	// for the shadow once
	if(nShadow == 0)
           glColor3ub(97,56, 1);
	else
            glColor3ub(0,0,0);
    glPushMatrix();
    glTranslatef(-150.0f, -110.0f, 0.0f);
    // Draw six quads
    glBegin(GL_QUADS);
     
      

// rasme mokaab va saye (hamrah ba be dast avardane bordare amood)
	//rooberoo1
                  {
                GLTVector3 vPoints[4] = {{ -15.0f,40.0f,40.0f},
                                        { -15.0f,-40.0f,40.0f},
                                        { -40.0f,-40.0f,40.0f},
				                        {-40.0f,40.0f,40.0f}};

               
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
		glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }
//rooberoo2
                  {
                GLTVector3 vPoints[4] = {{ 15.0f,40.0f,40.0f},
                                        { 15.0f,10.0f,40.0f},
                                        { -15.0f,10.0f,40.0f},
				                        {-15.0f,40.0f,40.0f}};

               
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
		glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }

//rooberoo3
                  {
                GLTVector3 vPoints[4] = {{ 40.0f,40.0f,40.0f},
                                        { 40.0f,-40.0f,40.0f},
                                        { 15.0f,-40.0f,40.0f},
				                        {15.0f,40.0f,40.0f}};

               
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
		glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }


//posht
                {
                GLTVector3 vPoints[4] = {{ 75.0f,40.0f,-40.0f },
                                        { 75.0f,-40.0f,-40.0f },
                                        { -5.0f,-40.0f,-40.0f },                       
				                         { -5.0f,40.0f,-40.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }

//bala
                {
                GLTVector3 vPoints[4] = {{75.0f,40.0f,-40.0f},
                                         {40.0f,40.0f,40.0f},
                                         {-40.0f,40.0f,40.0f},
                                         {-5.0f,40.0f,-40.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }
          //bottom       	
                {
                GLTVector3 vPoints[4] = {{ 75.0f,-40.0f,-40.0f},
                                        {40.0f,-40.0f,40.0f},
                                        { -40.0f,-40.0f,40.0f},
				                        {-5.0f,-40.0f,-40.0f}};

	
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }
                		
   //r

                {
                GLTVector3 vPoints[4] = {{ 40.0f,40.0f,40.0f},
                                        { 75.0f,40.0f,-40.0f},
                                        { 75.0f,-40.0f,-40.0f},
				                        {40.0f,-40.0f,40.0f}};


                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }
                
             //l         	
                {
                GLTVector3 vPoints[4] = {{-40.0f,40.0f,40.0f},
				                      { -5.0f,40.0f,-40.0f},
				                       {-5.0f,-40.0f,-40.0f },
				                      { -40.0f,-40.0f,40.0f}};
                
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		glVertex3fv(vPoints[3]);
                }
           
       
        glEnd();

//***********************************
	if(nShadow == 0)
         
		glColor3ub(3,35, 44);


glBegin(GL_TRIANGLES); 
     

                  {
                GLTVector3 vPoints[3] = {{ 40.0f,40.0f,40.0f},
                                        { -40.0f,40.0f,40.0f},
                                        { 35.0f,100.0f,0.0f}};

              
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
		glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		                }	

                {
                GLTVector3 vPoints[3] = {{ 40.0f,40.0f,40.0f },
                                        { 75.0f,40.0f,-40.0f },
                                        { 35.0f,100.0f,0.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
	               }

                {
                GLTVector3 vPoints[3] = {{-40.0f,40.0f,40.0f},
                                         {-5.0f,40.0f,-40.0f},
                                         {35.0f,100.0f,0.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
                }

                {
                GLTVector3 vPoints[3] = {{75.0f,40.0f,-40.0f},
                                         {-5.0f,40.0f,-40.0f},
                                         {35.0f,100.0f,0.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
                }
				     glEnd();

//*********************************taneye derakht
    glBegin(GL_TRIANGLES); 

	if(nShadow == 0)
          glColor3f(0.4941f, 0.3490f, 0.2549f);
	else
            glColor3ub(0,0,0);

   
      


	//rooberoo
                  {
                GLTVector3 vPoints[4] = {{ 220.0f,-40.0f,40.0f},
                                        { 230.0f,-40.0f,40.0f},
                                      	 {225.0f,60.0f,40.0f}};
									
               
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
		glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
		
                }	


//bala
                {
                GLTVector3 vPoints[4] = {{222.0f,-40.0f,30.0f},
                                         {232.0f,-40.0f,30.0f},
                                          {225.0f,60.0f,40.0f}};

                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);

                }
          //bottom       	
                {
                GLTVector3 vPoints[3] = {{ 222.0f,-40.0f,30.0},
                                        {220.0f,-40.0f,40.0f},
                                        { 225.0f,60.0f,40.0f}};

	
                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);
	
                }
                		
   //r

                {
                GLTVector3 vPoints[4] = {{ 232.0f,-40.0f,30.0},
                                        { 230.0f,-40.0f,40.0f},
                                        { 225.0f,60.0f,40.0f}};


                gltGetNormalVector(vPoints[0], vPoints[1], vPoints[2], vNormal);
                glNormal3fv(vNormal);
		glVertex3fv(vPoints[0]);
		glVertex3fv(vPoints[1]);
		glVertex3fv(vPoints[2]);

                }

                
   glEnd();

   glPopMatrix();

	}

// Called to draw scene
void RenderScene(void)
    {

    // Clear the window with current clearing color
    glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

    // Draw the ground, we do manual shading to a darker green
    // in the background to give the illusion of depth
	if(iShape==3)
	glColor3ub(179,87,4);
    else if(iShape==4)
    glColor3ub(204,230,200);
	else
	glColor3ub(0,255,0);

    glBegin(GL_QUADS);
        glVertex3f(400.0f, -150.0f, -200.0f);
        glVertex3f(-400.0f, -150.0f, -200.0f);

	if(iShape==3)
	glColor3ub(171,75,12);
    else if(iShape==4)    
   	glColor3ub(210,223,206);
	else 
	glColor3ub(63,108,32);

        glVertex3f(-400.0f, -150.0f, 200.0f);
        glVertex3f(400.0f, -150.0f, 200.0f);

    glEnd();
    
    glEnable(GL_LIGHTING);
    glLightfv(GL_LIGHT0,GL_POSITION,lightPos);

    Drawcube(0);
	DrawJ(0);
    animation(0);
	
	 // Restore original matrix state
    
    glDisable(GL_LIGHTING);
    glPushMatrix();

    // Multiply by shadow projection matrix
    glMultMatrixf((GLfloat *)shadowMat);


    // Pass true to indicate drawing shadow

    Drawcube(1);
	animation(1);
    DrawJ(1);

    // Restore the projection to normal
if (iShape==1||iShape==2||iShape==3)
{
    glPopMatrix();
 	glPushMatrix();
	glColor3ub(238,244,108);
    glTranslatef(40.0f, 120.0f, -10.0f);
	glutSolidSphere(10, 20, 50);
	
}
   glPopMatrix(); 
    // Display the results
    glutSwapBuffers();
    }

// This function does any needed initialization on the rendering
// context.
void TimerFunc(int value)
    {
    glutPostRedisplay();
    glutTimerFunc(10, TimerFunc,1);
    }
 
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
    glMateriali(GL_FRONT,GL_SHININESS,128);

    // Light blue background
    glClearColor(0.0f, 0.6509f, 1.0f, 1.0f );

    // Calculate projection matrix to draw shadow on the ground
    gltMakeShadowMatrix(points, lightPos, shadowMat);

	glEnable(GL_DEPTH_TEST);	
    glEnable(GL_DITHER);
    glShadeModel(GL_SMOOTH);
		// Enable polygon stippling

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
	int nSeasonMenu;
	int nMainMenu;
	for (int iii=0 ;iii<500;iii++){
		snowX=1 + rand() % (400 -1);
		snowY= 1+ rand() % (240 -1);
		
		snow[snowX][snowY]=1;
	}

    glutInit(&argc, argv);
    glutInitDisplayMode(GLUT_DOUBLE | GLUT_RGB | GLUT_DEPTH);
    glutInitWindowSize(1000, 800);
    glutCreateWindow("Light");

	nSeasonMenu = glutCreateMenu(ProcessMenu);
	glutAddMenuEntry("Spring",1);
	glutAddMenuEntry("Summer",2);
	glutAddMenuEntry("Autumn",3);
	glutAddMenuEntry("Winter",4);

	nMainMenu = glutCreateMenu(ProcessMenu);
	glutAddSubMenu("Season", nSeasonMenu);
	glutAttachMenu(GLUT_RIGHT_BUTTON);

    glutReshapeFunc(ChangeSize);
    glutDisplayFunc(RenderScene);
	glutTimerFunc(10, TimerFunc,1);
    SetupRC();
    glutMainLoop();

    return 0;
    }
