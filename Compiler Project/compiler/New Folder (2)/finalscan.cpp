
#include "stdafx.h"
#include<iostream>
#include <stdio.h>
#include<fstream>
#include<conio.h>
#include <locale>
#include<string.h>
#include<iomanip>
using namespace std;
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
int i,d,b,m,r,y;
int z=-1,h=0,flag=0,v=1;
int state,parser=0;
int ro=1;
int co=0,w=0;

ifstream p;

typedef char array[60];
array LandScape[]={"main","(",")","id","{","}","[","]",";","int","float","char","bool","if","while","return","num","<","<=",">",">=","!=","==","&&","||","$","=","+","-","*","/","%"};
array Portrait[]={"Program","Compound_st","Local_dec","Var_dec","Specifier","Q","Id_list'","St_list","St","Ret_st","S","Exp","Op","Selection","Iteration","Relop","Arithop","Logicop"};
array tmp[100];
array stack[100];

int pt[17][30];

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

cout<<"\n";
///////////////////////////////////////////voroodiii
   cin.get(temp[v]);
   v++;
               while (temp[v-1]!='$')
			   {
               	cin.get(temp[v]);
                v++;
                m++;
			   }

               temp[v]='\0';

cout<<"\t"<<" Atefeh Shafiee & Elham Khosravi"<<"\n";
cout<<"\n"<<"  SCANNER "<<"\n";
cout<<"\n"<<"\t"<<"                                          " <<"\n";
cout<<"\t"<<"  "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<" "<<"\n";
cout<<"\t"<<"   "<<"\t"<<"Token"<<"\t"<<"Type"<<"\t"<<"\t"<<"  Row"<<"\t"<<"Col"<<"\t"<<"  "<<"\n";
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
                                       cin>>h;
                               }

                               else if(ch=='+')
                               {
                                       state=0;
                                       z++;b++;
                                       strcpy(a[z].token,"+");
                                       cout<<"\t"<<"   "<<"\t"<<"+";
                                       strcpy(a[z].type,"+");
                                       cout<<"\t"<<"operator ";
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
                                       cout<<"\t"<<"operator";
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
                                          cout<<"\t"<<"operator ";
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
                                           cout<<"\t"<<"operator";
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
                                          cout<<"\t"<<"operatoe";
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
                                           cout<<"\t"<<"operator ";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"delimiter";
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
                                       cout<<"\t"<<"operator";
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
                                       cout<<"\t"<<"operator";
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
                                      
                               }
                               else if(ch=='"')
                               {
                                       w++;r=w;
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
                                       h=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(d=b;d<=i;d++)
                                       {
                                               a[z].token[h]=temp[d];
                                           h++;w++;
                                               cout<<temp[d];
                                       }
                                       a[z].token[h]='\0';
                                        for(m=0;m<=12;m++)
                                       {
                                               if(strcmp(keyword[m],a[z].token)==0)
                                               {
                                                       strcpy(a[z].type,keyword[m]);
                                                       cout<<"\t"<<"keyword";
                                                       flag=1;
                                                       break;
                                               }
                                               else {flag=0;}
                                       }
                                               if(flag==0)
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
                                       h=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(d=b;d<=i;d++)
                                       {
                                           a[z].token[h]=temp[d];
                                           h++;w++;
                                           cout<<temp[d];
                                       }
                                       a[z].token[h]='\0';
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
                                       cin>>h;
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
                                       h=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(d=b;d<=i;d++)
                                       {
                                           a[z].token[h]=temp[d];
                                           h++;w++;
                                           cout<<temp[d];
                                       }
                                       a[z].token[h]='\0';
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
                                       cin>>h;
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
                                       cin>>h;}
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
                                       h=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(d=b;d<=i;d++)
                                       {
                                               a[z].token[h]=temp[d];
                                           h++;w++;
                                               cout<<temp[d];
                                       }
                                       a[z].token[h]='\0';
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
                                       cout<<"\t"<<"operator ";
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
                                       cout<<"\t"<<"operator";
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
                                       cin>>h;
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
                                       cout<<"\t"<<"operator";
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
                                       cin>>h;
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
                                       cout<<"\t"<<"operator";
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
                                       cout<<"\t"<<"operator";
                                       co=w;
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
                                       cin>>h;
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
                                       cin>>h;
                               }
                               else if(ch=='"')
                               {
                                   co=w;b--;co--;
                                       b=b+2;co++;
                                       z++;
                                       h=0;
                                       cout<<"\t"<<"   "<<"\t";
                                       for(d=b;d<=i;d++)
                                       {
                                               a[z].token[h]=temp[d];
                                           h++;w++;
                                               cout<<temp[d];
                                       }
                                       a[z].token[h]='\0';
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
                                       cin>>h;
                               }
                               break;
                       }
               }
      while(temp[i]!='\0');
       p.close();

cout<<"\n";

cout<<"\n";
cout<<"\n"<<"  PARSER "<<"\n";

cout<<"\n";

pt[0][0]=1;
pt[1][3]=2;
pt[2][3]=4;pt[2][4]=4;pt[2][9]=3;pt[2][10]=3;pt[2][11]=3;pt[2][12]=3;pt[2][13]=4;pt[2][14]=4;pt[2][15]=4;pt[2][16]=4;
pt[3][9]=5;pt[3][10]=5;pt[3][11]=5;pt[3][12]=5;
pt[4][9]=9;pt[4][10]=12;pt[4][11]=10;pt[4][12]=11;
pt[5][6]=7;pt[5][9]=8;pt[5][10]=8;pt[5][11]=8;pt[5][12]=8;pt[5][25]=8;
pt[6][3]=6;
pt[7][4]=13;pt[7][5]=14;pt[7][13]=13;pt[7][14]=13;pt[7][15]=13;
pt[8][3]=18;pt[8][4]=16;pt[8][13]=15;pt[8][14]=17;pt[8][15]=19;pt[8][16]=18;
pt[9][16]=20;
pt[10][1]=21;pt[10][8]=22;
pt[11][3]=23;pt[11][16]=24;
pt[12][17]=25;pt[12][18]=25;pt[12][19]=25;pt[12][20]=25;pt[12][21]=25;pt[12][22]=25;pt[12][23]=27;pt[12][24]=27;pt[12][26]=26;pt[12][27]=26;pt[12][28]=26;pt[12][29]=26;pt[12][30]=26;
pt[13][13]=28;
pt[14][14]=29;
pt[15][17]=30;pt[15][18]=32;pt[15][19]=31;pt[15][20]=33;pt[15][21]=34;pt[15][22]=35;
pt[16][26]=36;pt[16][27]=37;pt[16][28]=39;pt[16][29]=38;pt[16][30]=40;
pt[17][23]=41;pt[17][24]=42;


for(i=0;i<=z;i++)
{strcpy(tmp[i],a[i].type);

}

strcpy(tmp[i],"$");

strcpy(stack[0],"$");

strcpy(stack[1],"program");
i=0;d=1;


do{
for(r=0;r<=31;r++)
 {
   if(strcmp(stack[d],LandScape[r])==0)
    {     
	  flag=1;
      break;
     }
    else {flag=0;}
  }


if(flag==1)
  {
     if(strcmp(stack[d],tmp[i])==0 && strcmp(stack[d],"$")==0)
       {
          cout<<"\n";
          cout<<"\n";
          cout<<"\n";
          cout<<"\n"<<"\t"<<"\t"<<"  parser is success ";
          cout<<"\n";;
          cout<<"\n";
          parser=1;
               break;
       }
      else if(strcmp(stack[d],tmp[i])==0)
       {
            i++;
            d--;
       }
       else
	   {
         cout<<"\n";
         cout<<"\n";
         cout<<"\n";
         cout<<"\n"<<"\t"<<"\t"<<"  ERROR ";
         cout<<"\n";
         cout<<"\n";
          break;
        }
 }
else
  {
    for(h=0;h<=31;h++)
      {
        if(strcmp(tmp[i],LandScape[h])==0)
           {
               break;
		    }
      }
for(m=0;m<=20;m++)
  {
    if(strcmp(stack[d],Portrait[m])==0)
       {
           break;
	    }
  }
if(pt[m][h]==1)
 {
	 d--;
	 cout<<"\n"<<"\t"<<"1."<<"Program => main() Compound_st";
     d++;    
     strcpy(stack[d],"Compound_st");
     d++;   
     strcpy(stack[d],")");
     d++;   
     strcpy(stack[d],"(");
     d++;  
     strcpy(stack[d],"main");
  }

else if(pt[m][h]==2)
  {
     d--;
     cout<<"\n"<<"\t"<<"2."<<"Componund_st => {Local_dec   St_list}";
     d++;   
     strcpy(stack[d],"}");
     d++;  
     strcpy(stack[d],"St_list");
     d++; 
     strcpy(stack[d],"Local_dec ");
     d++;  
     strcpy(stack[d],"{");
   }

else if(pt[m][h]==3)
 {
	d--;
	cout<<"\n"<<"\t"<<"3."<<"Local_dec =>  Var-dec  Local_dec";
    d++;   
    strcpy(stack[d],"Local_dec");
    d++;  
    strcpy(stack[d],"Var-dec");
 }

else if(pt[m][h]==4)
  {
    d--;
    cout<<"\n"<<"\t"<<"4."<<"Local-dec => E";
  }

else if(pt[m][h]==5)
  {
   d--;
   cout<<"\n"<<"\t"<<"5."<<"Var_dec => Specifier Id_list ;";
   d++;    
   strcpy(stack[d],";");
   d++;   
   strcpy(stack[d],"Id_list");
   d++; 
   strcpy(stack[d],"Specifier");
  }

else if(pt[m][h]==6)
  {
	d--;
	cout<<"\n"<<"\t"<<"6."<<"Id_ list => id  Q ";
    d++;    
    strcpy(stack[d]," Q ");
    d++;    
    strcpy(stack[d],"id ");
  }

else if(pt[m][h]==7)
  {
    d--;
    cout<<"\n"<<"\t"<<"7."<<"Q => [num]";
    d++;    
    strcpy(stack[d],"]");
    d++;    
    strcpy(stack[d],"num");
    d++;    
    strcpy(stack[d],"[");
  }

else if(pt[m][h]==8)
  {
    d--;
    cout<<"\n"<<"\t"<<"8."<<"Q => E";
  }

else if(pt[m][h]==9)
  {
   d--;
   cout<<"\n"<<"\t"<<"9."<<"Specifier => int";
   d++;    
   strcpy(stack[d],"int");
  }

else if(pt[m][h]==10)
   {
	 d--;
     cout<<"\n"<<"\t"<<"10."<<"Specifier =>  char";
     d++;   
     strcpy(stack[d],"char");
    }

else if(pt[m][h]==11)
   {
	 d--;
	 cout<<"\n"<<"\t"<<"11."<<"Specifier => bool";
     d++;   
     strcpy(stack[d],"bool");
     }

else if(pt[m][h]==12)
   {
	 d--;
	 cout<<"\n"<<"\t"<<"12."<<"Specifier => float";
     d++;   
     strcpy(stack[d],"float");
    }

else if(pt[m][h]==13)
  {
   d--;
   cout<<"\n"<<"\t"<<"13."<<"St_list => St  St_list";
   d++;    
   strcpy(stack[d],"St_list");
   d++;  
   strcpy(stack[d],"St");
       }

else if(pt[m][h]==14)
   {
    d--;
    cout<<"\n"<<"\t"<<"14."<<"St_list => E";
   }

else if(pt[m][h]==15)
  {
    d--;
    cout<<"\n"<<"\t"<<"15."<<"St => Selection";
    d++;   
    strcpy(stack[d],"Selection");
  }

else if(pt[m][h]==16)
   {
    d--;
    cout<<"\n"<<"\t"<<"16."<<"St  => Compound_st";
    d++;    
    strcpy(stack[d],"Compound_st");
    }

else if(pt[m][h]==17)
   {
	 d--;
	 cout<<"\n"<<"\t"<<"17."<<"St => Iteration";
     d++;    
     strcpy(stack[d],"Iteration");
    }

else if(pt[m][h]==18)
   {
     d--;
     cout<<"\n"<<"\t"<<"18."<<"St => Exp";
     d++;    
     strcpy(stack[d],"Exp");
   }

else if(pt[m][h]==19)
   {
    d--;
	cout<<"\n"<<"\t"<<"19."<<"St => Ret-st";
    d++;   
    strcpy(stack[d],"Ret-st");
   }

else if(pt[m][h]==20)
   {
	d--;
	cout<<"\n"<<"\t"<<"20."<<"Ret-st => return S; ";
    d++;   
    strcpy(stack[d],";");
    d++;   
    strcpy(stack[d],"S");
    d++;   
    strcpy(stack[d],"return");
   }

else if(pt[m][h]==21)
   {
     d--;
     cout<<"\n"<<"\t"<<"21."<<"\t"<<"S => (Exp) ";
     d++;    
     strcpy(stack[d],")");
     d++;   
    strcpy(stack[d],"Exp");
    d++;   
    strcpy(stack[d],"(");
       }

else if(pt[m][h]==22)
   {
    d--;
    cout<<"\n"<<"\t"<<"22."<<"S => E";
    }

else if(pt[m][h]==23)
   {
	 d--;
     cout<<"\n"<<"\t"<<"23."<<"Exp => Id_list = Exp";
     d++;   
     strcpy(stack[d],"Exp");
     d++;   
     strcpy(stack[d],"=");
     d++;   
     strcpy(stack[d],"Id_list");
   }

else if(pt[m][h]==24)
   {
    d--;
    cout<<"\n"<<"\t"<<"24."<<"Exp => num op num";
    d++;    
    strcpy(stack[d],"num");
    d++;    
    strcpy(stack[d],"op");
    d++;    
    strcpy(stack[d],"num");
   }

else if(pt[m][h]==25)
   {
     d--;
     cout<<"\n"<<"\t"<<"25."<<"Op => Relop";
     d++;   
     strcpy(stack[d],"Relop");
    }

else if(pt[m][h]==26)
   {
	 d--;
     cout<<"\n"<<"\t"<<"26."<<"Op => Logicop";
     d++;    
     strcpy(stack[d],"Logicop");
   }

else if(pt[m][h]==27)
  {
    d--;
    cout<<"\n"<<"\t"<<"27."<<"Op => Arithop";
    d++;    
    strcpy(stack[d],"Arithop");
   }
else if(pt[m][h]==28)
   {
	 d--;
	 cout<<"\n"<<"\t"<<"28."<<"Selection  => if (Exp) St   ";
     d++;    
     strcpy(stack[d],"St");
     d++;   
     strcpy(stack[d],")");
     d++;   
     strcpy(stack[d],"Exp");
     d++;   
     strcpy(stack[d],"(");
     d++;   
     strcpy(stack[d],"if");
       }

else if(pt[m][h]==29)
   {
    d--;
    cout<<"\n"<<"\t"<<"29."<<"Iteration => while (Exp) St";
    d++;    
    strcpy(stack[d],"St");
    d++;   
    strcpy(stack[d],")");
    d++;   
    strcpy(stack[d],"Exp");
    d++;   
    strcpy(stack[d],"(");
    d++;   
    strcpy(stack[d],"while");
       }

else if(pt[m][h]==30)
   {
    d--;
    cout<<"\n"<<"\t"<<"30."<<"Relop => <";
    d++;  
    strcpy(stack[d],"<");
       }

else if(pt[m][h]==31)
   {
	 d--;
     cout<<"\n"<<"\t"<<"31."<<"Relop =>  >";
     d++;   
     strcpy(stack[d],">");
    }

else if(pt[m][h]==32)
   {
     d--;
     cout<<"\n"<<"\t"<<"32."<<"Relop =>  <=";
     d++;    
     strcpy(stack[d],"<=");
    }

else if(pt[m][h]==33)
   {
	 d--;
	 cout<<"\n"<<"\t"<<"33."<<"\t"<<"Relop =>  >=";
     d++;    
     strcpy(stack[d],">=");
       }

else if(pt[m][h]==34)
   {
     d--;
     cout<<"\n"<<"\t"<<"34."<<"Relop => !=";
     d++;  
     strcpy(stack[d],"!=");
    }

else if(pt[m][h]==35)
   {
     d--;
	 cout<<"\n"<<"\t"<<"35."<<"Relop =>  ==";
     d++;    
     strcpy(stack[d],"==");
       }

else if(pt[m][h]==36)
   {
     d--;
     cout<<"\n"<<"\t"<<"36."<<"Arithop	=>  +";
     d++;    
     strcpy(stack[d],"+");
       }

else if(pt[m][h]==37)
   {
	 d--;
     cout<<"\n"<<"\t"<<"37."<<"Arithop => -";
     d++;    
     strcpy(stack[d],"-");
   }

else if(pt[m][h]==38)
   {
     d--;
     cout<<"\n"<<"\t"<<"38."<<"Arithop => /";
     d++;    
     strcpy(stack[d],"/");
       }

else if(pt[m][h]==39)
   {
     d--;
     cout<<"\n"<<"\t"<<"39."<<"Arithop =>	*";
     d++;    
     strcpy(stack[d],"*");
   }

else if(pt[m][h]==40)
   {
	 d--;
    cout<<"\n"<<"\t"<<"40."<<"Arithop	=> %";
    d++;    
    strcpy(stack[d],"%");
   }

else if(pt[m][h]==41)
  {
   d--;
   cout<<"\n"<<"\t"<<"41."<<"Logicop => &&";
   d++;    
   strcpy(stack[d],"&&");
  }

else if(pt[m][h]==42)
   {
    d--;
    cout<<"\n"<<"\t"<<"42."<<"Logicop	=> || ";
    d++;   
    strcpy(stack[d],"||");
   }

 else
 {
    cout<<"\n";
    cout<<"\n";
    cout<<"\n"<<"\t"<<"\t"<<" ERROR ";
    cout<<"\n";
    cout<<"\n";
               break;
       }
}


}while(!parser==1);

               cin>>h;
               getch();
               return 0;
}       