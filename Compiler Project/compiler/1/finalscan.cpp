// finalscan.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"



// escan.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"


int _tmain(int argc, _TCHAR* argv[])
{
	return 0;
}

#include<iostream>
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
int i,j,b,x,g,y;
int z=-1,k=0,key=0,v=1;
int state;
int ro=1;
int co=0,w=0;

ifstream p;

typedef char array[60];

int A[20][30];

       typedef char string[20];
       string keyword[34];
strcpy(keyword[0],"if");
strcpy(keyword[1],"else");
strcpy(keyword[2],"while");
strcpy(keyword[3],"for");
strcpy(keyword[4],"int");
strcpy(keyword[5],"float");
strcpy(keyword[6],"switch");
strcpy(keyword[7],"case");
strcpy(keyword[8],"volatile");
strcpy(keyword[9],"do");
strcpy(keyword[10],"break");
strcpy(keyword[11],"char");
strcpy(keyword[12],"void");
strcpy(keyword[13],"double");
strcpy(keyword[14],"long");
strcpy(keyword[15],"unsigned");
strcpy(keyword[16],"continue");
strcpy(keyword[17],"return");
strcpy(keyword[18],"auto");
strcpy(keyword[19],"const");
strcpy(keyword[20],"default");
strcpy(keyword[21],"enum");
strcpy(keyword[22],"extern");
strcpy(keyword[23],"goto");
strcpy(keyword[24],"register");
strcpy(keyword[25],"short");
strcpy(keyword[26],"signed");
strcpy(keyword[27],"sizeof");
strcpy(keyword[28],"static");
strcpy(keyword[29],"struct");
strcpy(keyword[30],"typedef");
strcpy(keyword[31],"union");



symbol a[90];

       p.open("f:\\elham\\file2.txt");
       if(!p){
               cout<<"Cannot open the file";

               cin>>k;
       return(0);
       }       p.get(c);

               while(!p.eof()){
                       temp[v]=c;
                       p.get(c);
                       v++;
               }
               temp[v]='\0';
cout<<"\n";
cout<<"\n"<<"\t"<<"  ""SCANE RESULT :"<<"\n";
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
//*****************************************************************************************
                     else if(ch=='+')
						 state=2;
//*******************************************************************************************
                      else if(ch=='-')
						  state=9;                       
//*******************************************************************************************
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
//********************************************************************************************
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
                                 cout<<"\t"<<"operatoe ";
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
//***************************************************************************************************
                            else if(ch=='!')
                                state=17;
//*********************************************************************************************************
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
                               state=10;
//*******************************************************************************************************
                               else if(ch=='%')
                                 {
                                   state=0;
                                   z++;b++;
                                   strcpy(a[z].token,"%");
                                   cout<<"\t"<<"   "<<"\t"<<"%";
                                   strcpy(a[z].type,"%");
								   cout<<"\t"<<"operator: division";
                                   co=w;co++;w++;
                                   a[z].row=ro;
                                   cout<<"\t  "<<ro;
                                   a[z].col=co;
                                   cout<<"\t"<<co<<"\t"<<"  ";
                                   cout<<"\n"<<"\t"<<"                                          "<<endl;
                                   cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                 }
//*******************************************************************************************************
                               else if(ch=='&')
                                   state=18;
//**************************************************************************************************
                               else if(ch=='|')
                                   state=19;
//***************************************************************************************************
                               else if(ch=='=')
                                   state=30;
//*********************************************************************************************************
                               else if(ch=='/')
                                 {      
								   state=20;
                                   w++;y=w;
                                       //p=ro;
                                 }
                               else if(ch=='"')
                                 {
                                    w++;g=w;
                                    state=25;
                                 }

                                break;
//**************************************************************************************************
                    case 1://tashkhes keyword ya id
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
						//		   while !((temp[b]>='a' && temp[b]<='z')||(temp[b]>='A' && temp[b]<='Z'))
						//				b++;
									   for(j=b;j<=i;j++)
										   {
											   a[z].token[k]=temp[j];																			
											   k++;w++;
											   cout<<temp[j];
									   }
								   
                                    a[z].token[k]='\0';
                                    for(x=0;x<=31;x++)
                                       {
                                         if(strcmp(keyword[x],a[z].token)==0)
                                           {
                                             strcpy(a[z].type,keyword[x]);
                                             cout<<"\t"<<"keyword";
                                             key=1;
                                             break;
                                           }
                                          else 
										    {
											  key=0;
										     }
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
//*************************************************************************************************
					case 2:

						 i++;
                            ch=temp[i];
                            if(ch=='+')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"++");
                                cout<<"\t"<<"   "<<"\t"<<"++";
                                strcpy(a[z].type,"++");
								cout<<"\t"<<"operator";
                                co=w;co++;w=w+2;
                                a[z].row=ro;
                                cout<<"\t  "<<ro;
                                a[z].col=co;
                                cout<<"\t"<<co<<"\t"<<"  ";
                                cout<<"\n"<<"\t"<<"                                          "<<endl;
                                cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                              }

							else if(ch=='=')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"+=");
                                cout<<"\t"<<"   "<<"\t"<<"+=";
                                strcpy(a[z].type,"+=");
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
                                 strcpy(a[z].token,"+");
                                 cout<<"\t"<<"   "<<"\t"<<"+";
                                 strcpy(a[z].type,"+");
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

//*************************************************************************************************
                    case 3://adad saheh
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
//*************************************************************************************************
                    case 4://error
                            i++;
                            ch=temp[i];
                            if(isdigit(ch))
                                state=5;
                            else
							  {
                                co=w;co++;
                                cout<<"\n"<<"\t"<<"                ** ERROR            **"<<endl;
                                cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                cin>>k;
                               }
                            break;
//******************************************************************************************************
                    case 5://adad ashare
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
//****************************************************************************************************
                    case 6:
                            i++;
                            ch=temp[i];
                            if(ch=='+'||ch=='-')
                               state=7;
                            else if(isdigit(ch))
                               state=8;
                            else
                              {  
								co=w;co++;
                                cout<<"\n"<<"\t"<<"                ** ERROR **"<<endl;
                                cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                cin>>k;
                              }
                            break;
//***********************************************************************************************
                    case 7:
                            i++;
                            ch=temp[i];
                            if(isdigit(ch))
                               state=8;
                            else
							  {
							    co=w;co++;
                                cout<<"\n"<<"\t"<<"                ** ERROR **"<<endl;
                                cout<<"\n"<<"\t"<<"\t"<<"    row = "<<ro<<"\t"<<"col = "<<co;
                                cin>>k;
							  }
                            break;
//****************************************************************************************************
                    case 8://adad alme
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
                                cout<<"\t  ""\t  "<<ro;
                                a[z].col=co;
                                cout<<"\t"<<co<<"\t "<<"  ";
                                cout<<"\n"<<"\t"<<"                                          "<<endl;
                                cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                                state=0;
                                b=i;
                              }
                            break;
                           break;
//****************************************************************************************************
                    case 9:
							 i++;
                            ch=temp[i];
                            if(ch=='-')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"--");
                                cout<<"\t"<<"   "<<"\t"<<"--";
                                strcpy(a[z].type,"--");
								cout<<"\t"<<"operator";
                                co=w;co++;w=w+2;
                                a[z].row=ro;
                                cout<<"\t  "<<ro;
                                a[z].col=co;
                                cout<<"\t"<<co<<"\t"<<"  ";
                                cout<<"\n"<<"\t"<<"                                          "<<endl;
                                cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                              }
							 else if(ch=='=')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"-=");
                                cout<<"\t"<<"   "<<"\t"<<"-=";
                                strcpy(a[z].type,"-=");
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
                             break;
//*******************************************************************************************************
							case 10:
							 i++;
                             ch=temp[i];
                             if(ch=='=')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"*=");
                                cout<<"\t"<<"   "<<"\t"<<"*=";
                                strcpy(a[z].type,"*=");
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
                                 strcpy(a[z].token,"+");
                                 cout<<"\t"<<"   "<<"\t"<<"+";
                                 strcpy(a[z].type,"+");
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
//*******************************************************************************************************
                    case 17://tashkhes != ya !
                             i++;
                             ch=temp[i];
                             if(ch=='=')
                               {
                                 state=0;
                                 z++;b=i;
                                 strcpy(a[z].token,"!=");
                                 cout<<"\t"<<"   "<<"\t"<<"!=";
                                 strcpy(a[z].type,"!=");
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
//******************************************************************************************************
                     case 18://tashkhes operator && ya &
                            i++;
                            ch=temp[i];
                            if(ch=='&')
                              {
                                state=0;
                                z++;b=i;
                                strcpy(a[z].token,"&&");
                                cout<<"\t"<<"   "<<"\t"<<"&&";
                                strcpy(a[z].type,"&&");
								cout<<"\t"<<"operator: AND";
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
                                 strcpy(a[z].token,"&");
                                 cout<<"\t"<<"   "<<"\t"<<"&";
                                 strcpy(a[z].type,"&");
                                 cout<<"\t"<<"operator (and)";
                                 co=w;co++;w++;
                                 a[z].row=ro;
                                 cout<<"\t  "<<ro;
                                 a[z].col=co;
                                 cout<<"\t"<<co<<"\t"<<"  ";
                                 cout<<"\n"<<"\t"<<"                                          "<<endl;
                                 cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                             break;
//*****************************************************************************************************
                     case 19://tashkhes operator ||
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
                                 z++;
                                 strcpy(a[z].token,"|");
                                 cout<<"\t"<<"   "<<"\t"<<"|";
                                 strcpy(a[z].type,"|");
                                 cout<<"\t"<<"operator (or)";
                                 co=w;co++;w++;
                                 a[z].row=ro;
                                 cout<<"\t  "<<ro;
                                 a[z].col=co;
                                 cout<<"\t"<<co<<"\t"<<"  ";
                                 cout<<"\n"<<"\t"<<"                                          "<<endl;
                                 cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                               }
                             break;
                                
//*********************************************************************************************************
                    case 30://tashkhes operator == ya =
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
//********************************************************************************************************
                    case 20:
                            i++;
                            ch=temp[i];
                            if(ch=='*')
                              {
							    w=w+2;
                                state=21;}
							 else if(ch=='/')
                              {
								  
							    w++;
								b=i;
                                state=0;
							}
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
                                co=w;//co++;w++;
                                a[z].row=ro;
                                cout<<"\t  "<<ro;
                                a[z].col=co;
                                cout<<"\t"<<co<<"\t"<<"  ";
                                cout<<"\n"<<"\t"<<"                                          "<<endl;
                                cout<<"\t"<<"   "<<"\t"<<"\t"<<"\t"<<"\t"<<"\t"<<"  "<<"\n";
                              }
                            break;
//**************************************************************************************************
                    case 21:
                            i++;
                            ch=temp[i];
                            if(ch=='*')
                              { 
								w++;
                                state=23;}
                             else if(ch=='\0')
                                {  
					  		      co=y;
                                  co=w;co++;
                                  cout<<"\n"<<"\t"<<"                ** ERROR **          "<<endl;
                                  cout<<"\n"<<"\t"<<"\t"<<"    row = "<<p<<"\t"<<"col = "<<y;
                                  cin>>k;
                                }
                             else if(ch=='\n')
                                {
                                  state=21;
                                  ro++;co=0;w=0;}
                             else
							    {
                                  state=21;
                                  w++;
							     }
                            break;
//*************************************************************************************************
                    case 23:
                            i++;
                            ch=temp[i];
                            if(ch=='/')
                              {
							    w++;
                                state=24;}
                            else
							   {
                                 state=21;
                                 w++;
							   }
                            break;
//*************************************************************************************************
                    case 24:
                             b=i;
                             state=0;
                            break;
//******************************************************************************************************
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
                                  state=0;
								  w--;
                               }
                             else
                               {
								 state=25;
                               }
                            break;
//**********************************************************************************************************

                    case 27:
                            i++;
                            ch=temp[i];
                            if(ch=='\\'||ch=='"'||ch=='n'||ch=='t')
                              {
								 state=25;
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
 getch();
 return 0;
}       
