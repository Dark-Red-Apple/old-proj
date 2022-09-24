

#include<iostream.h>
#include<fstream.h>
#include<conio.h>
#include <locale>
#include<string.h>
#include<iomanip.h>
struct symbol{
       char token[20];
       char type[20];
       int row;
       int col;
};

int main()
{
char c,ch;
char temp[90];
int i,j,b,x,g,y;
int z=-1,k=0,key=0,v=1;
int state,parse=0;
int ro=1;
int co=0,w=0;

       ifstream p;

       typedef char array[60];
array horizon[]={"main","(",")","{","}","int","float","char","bool","id",",",";","=","num","literal","if","else","while","<",">","<=",">=","!=","==","+","-","/","*","%","&&","||","$"};
array vertical[]={"program","compound-statement","local-dec","statement-list","var-dec","specifier","id-list","id-list'","statement","assign","assign'","term","op","selection","selection'","iteration","exp","exp'","relop","arop","logicop"};
       array temp1[100];
 array stack[100];

int A[20][30];

       typedef char string[20];
       string keyword[17];
strcpy(keyword[0],"if");
strcpy(keyword[1],"else");
strcpy(keyword[2],"while");
strcpy(keyword[3],"for");
strcpy(keyword[4],"int");
strcpy(keyword[5],"float");
strcpy(keyword[6],"switch");
strcpy(keyword[7],"case");
strcpy(keyword[8],"main");
strcpy(keyword[9],"do");
strcpy(keyword[10],"break");
strcpy(keyword[11],"char");
strcpy(keyword[12],"bool");
strcpy(keyword[13],"double");
strcpy(keyword[14],"long");
strcpy(keyword[15],"then");
strcpy(keyword[16],"contiue");
strcpy(keyword[17],"return");
symbol a[90];

///////////////////////////////////////////voroodiii
 cout<<"/////////PLEASE WRIITE THE PROGRAM AND USE $ FOR END////////";
 cout<<"\n";
   cin.get(temp[v]);
   v++;
               while (temp[v-1]!='$')
			   {
               	cin.get(temp[v]);
                v++;
                			   }
			   temp[v-1]='\0';

               
cout<<"\n";
cout<<"\n"<<"\t"<<"                ** SCANER **              "<<"\n";
cout<<"\n"<<"\t"<<"                                          " <<"\n";
cout<<"\t"<<"  "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<" "<<"\n";
cout<<"\t"<<"   "<<"\t"<<"token"<<"\t"<<"type"<<"\t"<<"\t"<<"  row"<<"\t"<<"col"<<"\t"<<"  "<<"\n";
cout<<"\t"<<"                                          "<<endl;
cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
//************************************************************************
i=0;
b=0;
state=0;
       do
               {
           switch(state)
               {
                       case 0:
                               i++;
                               ch=temp[i];
                           if((ch>='a' && ch<='z')||(ch>='A' && ch<='Z'))
                               state=1;
                               else if(ch==' '||ch=='\n'||ch=='\t')
                               {
                                       state=0;
                                   b=i;w++;
                                       if(ch=='\t')
                                               co=co+8;
                                       if(ch=='\n')
                                       {ro++;co=0;w=0;}
                               }
                               else if(isdigit(ch))
                                       state=3;
                               else if(ch=='.')
                               {
                   co=w;co++;
                                       cout<<"\n"<<"\t"<<"     ** ERROR **"<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }

                               else if(ch=='+')
                               {
                                       state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"+");
                                       cout<<"\t"<<"   "<<"\t"<<"+";
                               //      strcpy(tk[z].type,"plus");
       strcpy(a[z].type,"+");
                                       cout<<"\t"<<"operator +";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"   "<<"\n";
                               }
                               else if(ch=='-')
                               {
                                       state=0;
                   z++;b++;
                                       strcpy(a[z].token,"-");
                                       cout<<"\t"<<"   "<<"\t"<<"-";
                                       strcpy(a[z].type,"-");
                                       cout<<"\t"<<"operator -";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='<')
                               {
                                       i++;
                                  ch=temp[i];
                                  if(ch=='=')
                                  {
                                          state=0;
                                          b=i;
                                          z++;
                                          strcpy(a[z].token,"<=");
                                          cout<<"\t"<<"   "<<"\t"<<"<=";
                                          strcpy(a[z].type,"<=");
                                          cout<<"\t"<<"operator <=";
                                          co=w;co++;w=w+2;
                                          a[z].row=ro;
                                          cout<<"\t  "<<ro;
                      a[z].col=co;
                                      cout<<"\t"<<co<<"\t"<<"  ";
                      cout<<"\n"<<"\t"<<"                                          "<<endl;
                                          cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                  }
                                   else
                                       {
                                       i--;
                                       b++;
                       state=0;
                                           z++;
                                           strcpy(a[z].token,"<");
                                           cout<<"\t"<<"   "<<"\t"<<"<";
                                           strcpy(a[z].type,"<");
                                           cout<<"\t"<<"operator <";
                                           co=w;co++;w++;
                                           a[z].row=ro;
                                           cout<<"\t  "<<ro;
                       a[z].col=co;
                                       cout<<"\t"<<co<<"\t"<<"  ";
                       cout<<"\n"<<"\t"<<"                                          "<<endl;
                                           cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                       }
                               }
                               else if(ch=='>')
                               {
                                       i++;
                                  ch=temp[i];
                                  if(ch=='=')
                                  {
                                          state=0;
                                          b=i;
                                          z++;
                                          strcpy(a[z].token,">=");
                                          cout<<"\t"<<"   "<<"\t"<<">=";
                                          strcpy(a[z].type,">=");
                                          cout<<"\t"<<"operatoe >=";
                                          co=w;co++;w=w+2;
                                          a[z].row=ro;
                                          cout<<"\t  "<<ro;
                      a[z].col=co;
                                      cout<<"\t"<<co<<"\t"<<"  ";
                      cout<<"\n"<<"\t"<<"                                          "<<endl;
                                          cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                  }
                                   else
                                       {
                                       i--;
                                       b++;
                       state=0;
                                           z++;
                                           strcpy(a[z].token,">");
                                           cout<<"\t"<<"   "<<"\t"<<">";
                                           strcpy(a[z].type,">");
                                           cout<<"\t"<<"operator >";
                                           co=w;co++;w++;
                                           a[z].row=ro;
                                           cout<<"\t  "<<ro;
                       a[z].col=co;
                                       cout<<"\t"<<co<<"\t"<<"  ";
                       cout<<"\n"<<"\t"<<"                                          "<<endl;
                                           cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                       }
                               }

               else if(ch=='!')
                                       state=17;
               else if(ch==',')
                               {
                                       state=0;
                                       z++;b++;
                                       strcpy(a[z].token,",");
                                       cout<<"\t"<<"   "<<"\t"<<",";
                                       strcpy(a[z].type,",");
                                       cout<<"\t"<<"operator ,";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch==';')
                               {
                                       state=0;
                                       z++;b++;
                                       strcpy(a[z].token,";");
                                       cout<<"\t"<<"   "<<"\t"<<";";
                                       strcpy(a[z].type,";");
                                       cout<<"\t"<<"operator ;";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='{')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"{");
                                       cout<<"\t"<<"   "<<"\t"<<"{";
                                       strcpy(a[z].type,"{");
                                       cout<<"\t"<<"operator {";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='}')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"}");
                                       cout<<"\t"<<"   "<<"\t"<<"}";
                                       strcpy(a[z].type,"}");
                                       cout<<"\t"<<"operator }";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='(')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"(");
                                       cout<<"\t"<<"   "<<"\t"<<"(";

strcpy(a[z].type,"(");
                                       cout<<"\t"<<"operator (";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                           "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch==')')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,")");
                                       cout<<"\t"<<"   "<<"\t"<<")";

strcpy(a[z].type,")");
                                       cout<<"\t"<<"operator )";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='[')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"[");
                                       cout<<"\t"<<"   "<<"\t"<<"[";
                                       strcpy(a[z].type,"[");
                                       cout<<"\t"<<"operator [";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch==']')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"]");
                                       cout<<"\t"<<"   "<<"\t"<<"]";
                                       strcpy(a[z].type,"]");
                                       cout<<"\t"<<"operator ]";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='*')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"*");
                                       cout<<"\t"<<"   "<<"\t"<<"*";

strcpy(a[z].type,"*");
                                       cout<<"\t"<<"operator *";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='%')
                               {
                   state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"%");
                                       cout<<"\t"<<"   "<<"\t"<<"%";
                                       strcpy(a[z].type,"%");
                                       cout<<"\t"<<"operator %";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else if(ch=='&')
                                       state=18;
                               else if(ch=='|')
                                       state=19;
                               else if(ch=='=')
                                       state=30;
                               else if(ch=='/')
                               {       state=20;
                                   w++;y=w;
                                       p=ro;
                               }
                               else if(ch=='"')
                               {
                                       w++;g=w;
                                       state=25;
                               }

               break;

                       case 1:
                               i++;
                               ch=temp[i];
                               if((ch>='a' && ch<='z')||(ch>='A' && ch<='Z')||(isdigit(ch)))
                                       state=1;
                               else
                               {
                                       i--;co=w;
                                       b++;co++;
                                       z++;
                                       k=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(j=b;j<=i;j++)
                                       {
                                               a[z].token[k]=temp[j];
                                           k++;w++;
                                               cout<<temp[j];
                                       }
                                       a[z].token[k]='\0';
                  for(x=0;x<=12;x++)
                                       {
                                               if(strcmp(keyword[x],a[z].token)==0)
                                               {
                                                       strcpy(a[z].type,keyword[x]);
                           cout<<"\t"<<"keyword";
                                                       key=1;
                                                       break;
                                               }
                                               else {key=0;}
                                       }
                                               if(key==0)
                                               {
                                                       strcpy(a[z].type,"id");
                                               cout<<"\t"<<"id";
                                               }
                                               a[z].row=ro;
                                               cout<<"\t  "<<"\t  "<<ro;
                       a[z].col=co;
                                               cout<<"\t"<<co<<"\t"<<"  ";
                       cout<<"\n"<<"\t"<<"                                          "<<endl;
                                               cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                               state=0;
                                               b=i;
                               }

               break;

                       case 3:
                               i++;
                               ch=temp[i];
                               if(isdigit(ch))
                                       state=3;
                               else if(ch=='.')
                                       state=4;
                               else if(ch=='E')
                                       state=6;
                               else
                               {
                                       i--;co=w;
                                       b++;co++;
                                       z++;
                                       k=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(j=b;j<=i;j++)
                                       {
                                               a[z].token[k]=temp[j];
                                           k++;w++;
                                               cout<<temp[j];
                                       }
                                       a[z].token[k]='\0';
                                       strcpy(a[z].type,"num");
                                       cout<<"\t"<<"integer";
                                       a[z].row=ro;
                                       cout<<"\t"<<"\t  "<<ro;
                   a[z].col=co;
                                       cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                       state=0;
                                       b=i;
                               }
                               break;

                       case 4:
                               i++;
                               ch=temp[i];
                               if(isdigit(ch))
                                       state=5;
                               else {
                                       co=w;co++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR            **"<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               break;
                       case 5:
                               i++;
                               ch=temp[i];
                               if(isdigit(ch))
                                       state=5;
                               else if(ch=='E')
                                       state=6;
                               else
                               {
                                       i--;co=w;
                                       b++;co++;
                                       z++;
                                       k=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(j=b;j<=i;j++)
                                       {
                                               a[z].token[k]=temp[j];
                                           k++;w++;
                                               cout<<temp[j];
                                       }
                                       a[z].token[k]='\0';
                                       strcpy(a[z].type,"float");
                                       cout<<"\t"<<"decimal";
                                       a[z].row=ro;
                                       cout<<"\t"<<"\t  "<<ro;
                   a[z].col=co;
                                       cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"   "<<"\n";
                                       state=0;
                                       b=i;
                               }
                               break;
                       case 6:
                               i++;
                               ch=temp[i];
                               if(ch=='+'||ch=='-')
                                       state=7;
                               else if(isdigit(ch))
                                       state=8;
                               else
                               {   co=w;co++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **"<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               break;

                       case 7:
                               i++;
                               ch=temp[i];
                               if(isdigit(ch))
                                       state=8;
                               else{co=w;co++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **"<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;}
                               break;

                       case 8:
                               i++;
                               ch=temp[i];
                               if(isdigit(ch))
                                       state=8;
                               else
                               {
                                       i--;co=w;
                                       b++;co++;
                                       z++;
                                       k=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(j=b;j<=i;j++)
                                       {
                                               a[z].token[k]=temp[j];
                                           k++;w++;
                                               cout<<temp[j];
                                       }
                                       a[z].token[k]='\0';
                                       strcpy(a[z].type,"SciNum");
                                       cout<<"\t"<<"SciNum";
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                       cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                       state=0;
                                       b=i;
                               }
                               break;

                       case 17:
                               i++;
                               ch=temp[i];
                               if(ch=='=')
                               {
                                       state=0;
                   z++;b=i;
                                       strcpy(a[z].token,"!=");
                                       cout<<"\t"<<"   "<<"\t"<<"!=";
                                       strcpy(a[z].type,"!=");
                                       cout<<"\t"<<"operator !=";
                                       co=w;co++;w=w+2;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else
                               {
                                   i--;
                                   b++;
                   state=0;
                                       z++;
                                       strcpy(a[z].token,"!");
                                       cout<<"\t"<<"   "<<"\t"<<"!";
                                       strcpy(a[z].type,"!");
                                       cout<<"\t"<<"operator !";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                                       break;

                       case 18:
                               i++;
                               ch=temp[i];
                               if(ch=='&')
                               {
                   state=0;
                   z++;b=i;
                                       strcpy(a[z].token,"&&");
                                       cout<<"\t"<<"   "<<"\t"<<"&&";
                                       strcpy(a[z].type,"&&");
                                       cout<<"\t"<<"and";
                                       co=w;co++;w=w+2;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else
                               {
                   i--;
                                   b++;
                   state=0;
                   co=w;co++;w++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **           "<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               break;

                       case 19:
               i++;
                               ch=temp[i];
                               if(ch=='|')
                               {
                   state=0;
                   z++;b=i;
                                       strcpy(a[z].token,"||");
                                       cout<<"\t"<<"   "<<"\t"<<"||";
                                       strcpy(a[z].type,"||");
                                       cout<<"\t"<<"operator ||";
                                       co=w;co++;w=w+2;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else
                               {
                   i--;
                                   b++;
                   state=0;
                   co=w;co++;w++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **           "<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               break;

                       case 30:

               i++;
                               ch=temp[i];
                               if(ch=='=')
                               {
                                       state=0;
                   z++;b=i;
                                       strcpy(a[z].token,"==");
                                       cout<<"\t"<<"   "<<"\t"<<"==";
                                       strcpy(a[z].type,"==");
                                       cout<<"\t"<<"operator ==";
                                       co=w;co++;w=w+2;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                               else
                               {
                                   i--;
                                   b++;
                   state=0;
                                       z++;
                                       strcpy(a[z].token,"=");
                                       cout<<"\t"<<"   "<<"\t"<<"=";
                                       strcpy(a[z].type,"=");
                                       cout<<"\t"<<"operator =";
                                       co=w;co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                                       break;

                       case 20:
                               i++;
                               ch=temp[i];
                               if(ch=='*')
                               {w=w+2;
                               state=21;}
                               else
                               {
                   i--;
                                   b++;
                   state=0;
                                       z++;
                                       strcpy(a[z].token,"/");
                                       cout<<"\t"<<"   "<<"\t"<<"/";
                                       strcpy(a[z].type,"/");
                                       cout<<"\t"<<"operator /";
                                       co=w;//co++;w++;
                                       a[z].row=ro;
                                       cout<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                                       break;

                       case 21:
                               i++;
                               ch=temp[i];
                               if(ch=='*')
                               {w++;
                               state=23;}
                               else if(ch=='\0')
                               {   co=y;
                   co=w;co++;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **          "<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<p<<"\t"<<"col = "<<y;
                                       cin>>k;
                               }
                               else if(ch=='\n')
                               {
                                       state=21;
                                       ro++;co=0;w=0;}
                               else{
                                       state=21;
                                       w++;}
                               break;

                       case 23:
                               i++;
                               ch=temp[i];
                               if(ch=='/')
                               {w++;
                               state=24;}
                               else{
                                       state=21;
                                       w++;}
                               break;

                       case 24:
                               b=i;
                               state=0;
                               break;

                       case 25:
                               i++;
                               ch=temp[i];
                               if(ch=='\\')
                               {
                                       state=27;
                               }
                               else if(ch=='\n'||ch=='\0')
                               {
                   co=w;

                                       cout<<"\n"<<"\t"<<"                ** ERROR **           "<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               else if(ch=='"')
                               {
                                   co=w;b--;co--;
                                       b=b+2;co++;
                                       z++;
                                       k=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(j=b;j<=i;j++)
                                       {
                                               a[z].token[k]=temp[j];
                                           k++;w++;
                                               cout<<temp[j];
                                       }
                                       a[z].token[k]='\0';
                   strcpy(a[z].type,"literal");
                                       cout<<"\t"<<"literal";

                                       a[z].row=ro;
                                       cout<<"\t"<<"\t  "<<ro;
                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                       cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";

                                       b=i;
                                       state=0;w--;
                               }
                               else
                               {state=25;
                               }

                               break;

                       case 27:
                               i++;
                               ch=temp[i];
                               if(ch=='\\'||ch=='"'||ch=='n'||ch=='t')
                               {state=25;
                               }
                               else
                               {
                                       co=w;
                                       cout<<"\n"<<"\t"<<"                ** ERROR **           "<<endl;
                                       cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                       cin>>k;
                               }
                               break;
                       }
               }
      while(temp[i]!='\0');
       p.close();

cout<<"\n";
cout<<"\n";
cout<<"\n";
cout<<"                               ** PARSER **                            "<<"\n";

cout<<"\n";

A[0][0]=1;
A[1][3]=2;
A[2][4]=4;A[2][5]=3;A[2][6]=3;A[2][7]=3;A[2][8]=3;A[2][9]=4;A[2][15]=4;A[2][17]=4;
A[3][4]=14;A[3][9]=13;A[3][15]=13;A[3][17]=13;
A[4][5]=5;A[4][6]=5;A[4][7]=5;A[4][8]=5;
A[5][5]=6;A[5][6]=7;A[5][7]=8;A[5][8]=9;
A[6][9]=10;
A[7][10]=11;A[7][11]=12;
A[8][9]=15;A[8][15]=16;A[8][17]=17;
A[9][9]=18;
A[10][11]=20;A[10][18]=19;A[10][19]=19;A[10][20]=19;A[10][21]=19;A[10][22]=19;A[10][23]=19;A[10][24]=19;A[10][25]=19;A[10][26]=19;A[10][27]=19;A[10][28]=19;A[10][29]=19;A[10][30]=19;
A[11][9]=22;A[11][13]=21;A[11][14]=23;
A[12][18]=24;A[12][19]=24;A[12][20]=24;A[12][21]=24;A[12][22]=24;A[12][23]=24;A[12][24]=26;A[12][25]=26;A[12][26]=26;A[12][27]=26;A[12][28]=26;A[12][29]=25;A[12][30]=25;
A[13][15]=27;
A[14][11]=29;A[14][16]=28;
A[15][17]=30;
A[16][9]=31;A[16][13]=31;A[16][14]=31;
A[17][2]=33;A[17][18]=32;A[17][19]=32;A[17][20]=32;A[17][21]=32;A[17][22]=32;A[17][23]=32;A[17][24]=32;A[17][25]=32;A[17][26]=32;A[17][27]=32;A[17][28]=32;A[17][29]=32;A[17][30]=32;
A[18][18]=34;A[18][19]=35;A[18][20]=36;A[18][21]=37;A[18][22]=38;A[18][23]=39;
A[19][24]=40;A[19][25]=41;A[19][26]=42;A[19][27]=43;A[19][28]=44;
A[20][29]=45;A[20][30]=46;


for(i=0;i<=z;i++)
{strcpy(temp1[i],a[i].type);

}

strcpy(temp1[i],"$");

strcpy(stack[0],"$");

strcpy(stack[1],"program");
i=0;j=1;p=0;
//*********************************

do{
for(g=0;g<=31;g++)
{
if(strcmp(stack[j],horizon[g])==0)
{       key=1;
       break;
}
else {key=0;}
}

//.....................................
if(key==1)
{

       if(strcmp(stack[j],temp1[i])==0 && strcmp(stack[j],"$")==0)
       {
               cout<<"\n";
       cout<<"\n"<<"\t"<<"\t"<<"\n";
       cout<<"\n"<<"\t"<<"\t"<<"\n";
               cout<<"\n"<<"\t"<<"\t"<<"  **   parse is successfull **   ";
       cout<<"\n"<<"\t"<<"\t"<<" \n";
       cout<<"\n"<<"\t"<<"\t"<<"  \n ";
       parse=1;
               break;
       }
       else if(strcmp(stack[j],temp1[i])==0)
       {
               i++;
               j--;
       }
       else{p=1;
       cout<<"\n";
       cout<<"\n"<<"\t"<<"\t"<<" \n ";
       cout<<"\n"<<"\t"<<"\t"<<" \n";
               cout<<"\n"<<"\t"<<"\t"<<"  !! ERROR  IN PARSING!!  ";
       cout<<"\n"<<"\t"<<"\t"<<"  \n";
       cout<<"\n"<<"\t"<<"\t"<<"  \n ";
               break;
       }
}
else
{
       for(k=0;k<=31;k++)
       {
               if(strcmp(temp1[i],horizon[k])==0)
               {
               break;}
       }
   for(x=0;x<=20;x++)
       {
               if(strcmp(stack[j],vertical[x])==0)
               {
               break;}
       }
       if(A[x][k]==1)
       {j--;cout<<"\n"<<"\t"<<"1."<<"\t"<<"program===> main() compound-statement";
j++;    strcpy(stack[j],"compound-statement");
j++;    strcpy(stack[j],")");
j++;    strcpy(stack[j],"(");
j++;    strcpy(stack[j],"main");
       }

else if(A[x][k]==2)
       {j--;cout<<"\n"<<"\t"<<"2."<<"\t"<<"compound-statement===> {local-dec statement-list}";
j++;    strcpy(stack[j],"}");
j++;   strcpy(stack[j],"statement-list");
j++;   strcpy(stack[j],"local-dec");
j++;    strcpy(stack[j],"{");
       }

else if(A[x][k]==3)
{j--;cout<<"\n"<<"\t"<<"3."<<"\t"<<"local-dec===> var-dec local-dec";
j++;    strcpy(stack[j],"local-dec");
j++;   strcpy(stack[j],"var-dec");}

else if(A[x][k]==4)
       {j--;cout<<"\n"<<"\t"<<"4."<<"\t"<<"local-dec===> E";
       }

else if(A[x][k]==5)
       {j--;cout<<"\n"<<"\t"<<"5."<<"\t"<<"var-dec===> specifier id-list;";
j++;    strcpy(stack[j],";");
j++;    strcpy(stack[j],"id-list");
 j++;   strcpy(stack[j],"specifier");
       }

else if(A[x][k]==6)
{j--;cout<<"\n"<<"\t"<<"6."<<"\t"<<"specifier===> int";
j++;    strcpy(stack[j],"int"); }

else if(A[x][k]==7)
       {j--;cout<<"\n"<<"\t"<<"7."<<"\t"<<"specifier===> float";
j++;    strcpy(stack[j],"float");
       }

else if(A[x][k]==8)
       {j--;cout<<"\n"<<"\t"<<"8."<<"\t"<<"specifier===> char";
j++;    strcpy(stack[j],"char");
       }

else if(A[x][k]==9)
       {j--;cout<<"\n"<<"\t"<<"9."<<"\t"<<"specifier===> bool";
j++;    strcpy(stack[j],"bool");
       }
else if(A[x][k]==10)
       {j--;cout<<"\n"<<"\t"<<"10."<<"\t"<<"id-list===> id id-list'";
j++;    strcpy(stack[j],"id-list'");
j++;    strcpy(stack[j],"id");
       }
else if(A[x][k]==11)
       {j--;cout<<"\n"<<"\t"<<"11."<<"\t"<<"id list'===> , id-list";
j++;    strcpy(stack[j],"id-list");
j++;    strcpy(stack[j],",");
       }
else if(A[x][k]==12)
       {j--;cout<<"\n"<<"\t"<<"12."<<"\t"<<"id list'===> E";
       }
else if(A[x][k]==13)
       {j--;cout<<"\n"<<"\t"<<"13."<<"\t"<<"statement-list===> statement ; statement-list";
j++;    strcpy(stack[j],"statement-list");
j++;    strcpy(stack[j],";");
j++;    strcpy(stack[j],"statement");
       }
else if(A[x][k]==14)
       {j--;cout<<"\n"<<"\t"<<"14."<<"\t"<<"statement-list===> E";
       }
else if(A[x][k]==15)
       {j--;cout<<"\n"<<"\t"<<"15."<<"\t"<<"statement===> assign";
j++;    strcpy(stack[j],"assign");
       }
else if(A[x][k]==16)
       {j--;cout<<"\n"<<"\t"<<"16."<<"\t"<<"statement===> selection";
j++;    strcpy(stack[j],"selection");
       }
else if(A[x][k]==17)
       {j--;cout<<"\n"<<"\t"<<"17."<<"\t"<<"statement===> iteration";
j++;    strcpy(stack[j],"iteration");
       }
else if(A[x][k]==18)
       {j--;cout<<"\n"<<"\t"<<"18."<<"\t"<<"assign===> id = term assign'";
j++;    strcpy(stack[j],"assign'");
j++;    strcpy(stack[j],"term");
j++;    strcpy(stack[j],"=");
j++;    strcpy(stack[j],"id");
       }
else if(A[x][k]==19)
       {j--;cout<<"\n"<<"\t"<<"19."<<"\t"<<"assign'===> op term";
j++;    strcpy(stack[j],"term");
j++;    strcpy(stack[j],"op");
       }
else if(A[x][k]==20)
{j--;cout<<"\n"<<"\t"<<"20."<<"\t"<<"assign'===> E";
}
else if(A[x][k]==21)
       {j--;cout<<"\n"<<"\t"<<"21."<<"\t"<<"term===> num";
j++;    strcpy(stack[j],"num");
       }
else if(A[x][k]==22)
       {j--;cout<<"\n"<<"\t"<<"22."<<"\t"<<"term===> id";
j++;    strcpy(stack[j],"id");
       }
else if(A[x][k]==23)
       {j--;cout<<"\n"<<"\t"<<"23."<<"\t"<<"term===> literal";
j++;    strcpy(stack[j],"literal");
       }
else if(A[x][k]==24)
       {j--;cout<<"\n"<<"\t"<<"24."<<"\t"<<"op===> relop";
j++;    strcpy(stack[j],"relop");
       }
else if(A[x][k]==25)
       {j--;cout<<"\n"<<"\t"<<"25."<<"\t"<<"op===> logicop";
j++;    strcpy(stack[j],"logicop");
       }
else if(A[x][k]==26)
       {j--;cout<<"\n"<<"\t"<<"26."<<"\t"<<"op===> arop";
j++;    strcpy(stack[j],"arop");
       }
else if(A[x][k]==27)
       {j--;cout<<"\n"<<"\t"<<"27."<<"\t"<<"selection===> if ( exp ) compound-statement selection'";
j++;    strcpy(stack[j],"selection'");
j++;    strcpy(stack[j],"compound-statement");
j++;    strcpy(stack[j],")");
j++;    strcpy(stack[j],"exp");
j++;    strcpy(stack[j],"(");
j++;    strcpy(stack[j],"if");
       }
else if(A[x][k]==28)
       {j--;cout<<"\n"<<"\t"<<"28."<<"\t"<<"selection'===> else compound-statement";
j++;    strcpy(stack[j],"compound-statement");
j++;    strcpy(stack[j],"else");
       }
else if(A[x][k]==29)
       {j--;cout<<"\n"<<"\t"<<"29."<<"\t"<<"selection'===>3";
       }
else if(A[x][k]==30)
       {j--;cout<<"\n"<<"\t"<<"30."<<"\t"<<"iteration===> while ( exp ) compound-statement";
j++;    strcpy(stack[j],"compound-statement");
j++;    strcpy(stack[j],")");
j++;    strcpy(stack[j],"exp");
j++;    strcpy(stack[j],"(");
j++;    strcpy(stack[j],"while");
       }
else if(A[x][k]==31)
       {j--;cout<<"\n"<<"\t"<<"31."<<"\t"<<"exp===> term exp'";
j++;    strcpy(stack[j],"exp'");
j++;    strcpy(stack[j],"term");
       }
else if(A[x][k]==32)
       {j--;cout<<"\n"<<"\t"<<"32."<<"\t"<<"exp'===> op term";
j++;    strcpy(stack[j],"term");
j++;    strcpy(stack[j],"op");
       }
else if(A[x][k]==33)
       {j--;cout<<"\n"<<"\t"<<"33."<<"\t"<<"exp'===> 3";
       }
else if(A[x][k]==34)
       {j--;cout<<"\n"<<"\t"<<"34."<<"\t"<<"relop===> <";
j++;    strcpy(stack[j],"<");
       }
else if(A[x][k]==35)
       {j--;cout<<"\n"<<"\t"<<"35."<<"\t"<<"relop===> >";
j++;    strcpy(stack[j],">");
       }
else if(A[x][k]==36)
       {j--;cout<<"\n"<<"\t"<<"36."<<"\t"<<"relop===> <=";
j++;    strcpy(stack[j],"<=");
       }
else if(A[x][k]==37)
       {j--;cout<<"\n"<<"\t"<<"37."<<"\t"<<"relop===> >=";
j++;    strcpy(stack[j],">=");
       }
else if(A[x][k]==38)
       {j--;cout<<"\n"<<"\t"<<"38."<<"\t"<<"relop===> !=";
j++;    strcpy(stack[j],"!=");
       }
else if(A[x][k]==39)
       {j--;cout<<"\n"<<"\t"<<"39."<<"\t"<<"relop===> ==";
j++;    strcpy(stack[j],"==");
       }
else if(A[x][k]==40)
       {j--;cout<<"\n"<<"\t"<<"40."<<"\t"<<"arop===> +";
j++;    strcpy(stack[j],"+");
       }
else if(A[x][k]==41)
       {j--;cout<<"\n"<<"\t"<<"41."<<"\t"<<"arop===> -";
j++;    strcpy(stack[j],"-");
       }
else if(A[x][k]==42)
       {j--;cout<<"\n"<<"\t"<<"42."<<"\t"<<"arop===> /";
j++;    strcpy(stack[j],"/");
       }
else if(A[x][k]==43)
       {j--;cout<<"\n"<<"\t"<<"43."<<"\t"<<"arop===> *";
j++;    strcpy(stack[j],"*");
       }
else if(A[x][k]==44)
       {j--;cout<<"\n"<<"\t"<<"44."<<"\t"<<"arop===> %";
j++;    strcpy(stack[j],"%");
       }
else if(A[x][k]==45)
       {j--;cout<<"\n"<<"\t"<<"45."<<"\t"<<"logicop===> &&";
j++;    strcpy(stack[j],"&&");
       }
else if(A[x][k]==46)
       {j--;cout<<"\n"<<"\t"<<"46."<<"\t"<<"logicop===> ||";
j++;    strcpy(stack[j],"||");
       }
else{

       cout<<"\n";
       cout<<"\n"<<"\t"<<"\t"<<"  \n ";
       cout<<"\n"<<"\t"<<"\t"<<"\n";
               cout<<"\n"<<"\t"<<"\t"<<" !! ERROR IN PARSING !! ";
       cout<<"\n"<<"\t"<<"\t"<<"\n";
       cout<<"\n"<<"\t"<<"\t"<<"\n ";
               break;
       }
}


}while(!parse==1);

               cin>>k;
               getch();
               return 0;
}       
 
 
 
