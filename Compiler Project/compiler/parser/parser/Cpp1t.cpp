#include <fstream.h>
#include <iostream.h>
#include <stdlib.h>
#include <conio.h>
#include <string.h>

 class string
 {
  public:
	char p[15];
	string()

	{
	 for(int i=0;i<15;i++)
	  p[i]='\0';
	};
 }stack[100];
 //************************************
  class grammer
 {
  public:
	int n;
	char st[7][15];
	int numRecord;
	grammer()
	{
	 n=0;
	 numRecord=0;
	 for(int i=0;i<7;i++)
		for(int j=0;j<15;j++)
		 st[i][j]='\0';
	};
}gram[56];
//****************************************
struct symbol{
		 char token[40];
		 char type[40];
		 int row;
};
symbol s[50];
int j=0;
 char a[30]; //current token
//****************************************
 char rowTPars[26][15]=
 {


	"program","comp-stm","loc-dec","A","var-dec","TY-speci","B",

	"stm-list","C","stm","Expr-stm","Expr","var","simp-Expr","operand",

	"Relop","logop","Arithop","selec-stm","D","Iter-stm","Return-stm","F",

	"Break-stm","G","operator"

 };

 char colTPars[32][15]=
 {

	"main","{","int","void","bool","float","[","num","]","if","while","return","break","id",

	"<=","<",">",">=","!=","==","&&","||","+","-","*","/","%","else","}",";","char",")"

 };

//****************************************
int findTerminal(char x[15],char a[30])
{
	int flag=0;
	for(int i=0;i<32;i++)
	 {
	  if(!strcmp(x,a))
		{
		  flag=1;
			break;
		}
	 }
	 return flag;
}
//***********************************************
int findNumOfRowOfParseTable(char x[15])

{
	for(int i=0;i<26;i++)
	 {
		if(!strcmp(x,rowTPars[i]))
		return i;
	 }
}
//***********************************************

int findNumOfColOfParseTable(char a[30])
{
	 for(int i=0;i<32;i++)
	  {
		 if(!strcmp(a,colTPars[i]))
		 return i;
	  }
}

//************************************************************************
void symbolTable(char temp[20],char type[20],int row)
{

		strcpy(s[j].token,temp);
		strcpy(s[j].type,type);
		s[j].row=row;
		j++;
}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!function digit
int ISDIGIT(char ch)
{
 if(ch=='0' || ch=='1'|| ch=='2' || ch=='3' || ch=='4' || ch=='5'
	|| ch=='6' || ch=='7' || ch=='8' || ch=='9')
	return 1;
 else
  return 0;
}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!end function


//////////////////////////////////////////////////////////////////////function letter
int isletter(char ch)
{
	if(ch=='a' || ch=='b' || ch=='c' || ch=='d' || ch=='e' || ch=='f'
	 || ch=='g' || ch=='h' || ch=='i' || ch=='j' || ch=='k' || ch=='l' ||
	 ch=='m' || ch=='n' || ch=='o' || ch=='p' || ch=='q' || ch=='r' ||
	 ch=='s' || ch=='t' || ch=='u' || ch=='v' || ch=='w' || ch=='x' ||
	 ch=='y' ||ch=='z')
	 return 1;
	else
	 return 0;
}
////////////////////////////////////////////////////////////////////////end function


//***********************************************************************function bigletter
int ISBIGLETTER(char ch)
{
	  if(ch=='A' || ch=='B' || ch=='C' || ch=='D' || ch=='E' || ch=='F'
		|| ch=='G' || ch=='H' || ch=='I' || ch=='J' || ch=='K' || ch=='L' ||
		ch=='M' || ch=='N' || ch=='O' || ch=='P' || ch=='Q' || ch=='R' ||
		ch=='S' || ch=='T' || ch=='U' || ch=='V' || ch=='W' || ch=='X' ||
		ch=='Y' ||ch=='Z')
		return 1;
	  else
		return 0;
}
//****************************************************************************end function
int main()
{
char ch;
int state=0,i=0,row=0;
char temp[50];

clrscr();
ifstream fun("TC.txt");
if(!fun){
cout<<"no existing";
exit(0);
}
cout<<"\n";
cout<<"      token           type             row\n";
cout<<" --------------  ---------------  ----------------";
fun.get(ch);
do{
switch(state){
case 0:
  if(ch=='\n')
  {row++;
  state=0;
  fun.get(ch);
  }

 else if(ISDIGIT(ch))
  {state=1;}

 else if(ch=='/')
	{state=12;}

 else if(ch==' ')
	 {state=0;
	 fun.get(ch);}

 else if(isletter(ch))

	{ i=0;
	  state=10;
	  temp[i]=ch;
	  i++;
	}

 else if(ISBIGLETTER(ch))
	{ i=0;
	  state=10;
	  temp[i]=ch;
	  i++;
	}
 else if(ch=='+')
 {state=17;}
 else if(ch=='-')
 {state=20;}
 else if(ch=='*')
 {state=23;}
 else if(ch=='%')
 {state=24;}
 else if(ch=='!')
 {state=25;}
 else if(ch=='<')
 {state=28;}
 else if(ch=='>')
 {state=31;}
 else if(ch=='=')
 {state=34;}
 else if(ch=='|')
 {state=37;}
 else if(ch=='&')
 {state=39;}
 else if(ch==';')
 {state=41;}
 else if(ch==',')
 {state=42;}
 else if(ch=='{')
 {state=43;}
 else if(ch=='}')
 {state=44;}
 else if(ch=='(')
 {state=45;}
 else if(ch==')')
 {state=46;}
 else if(ch=='[')
 {state=47;}
 else if(ch==']')
 {state=48;}
else if(ch=='\\')
 {
	fun.get(ch);
	if (ch=='n')
	{state=51;}
	else if (ch=='t')
	{state=50;}
 }
 else if(ch=='"')
 {state=53;}
 else if(ch=='^')
 {state=56;}
 else
 {
	cout<<"\n";
	cout<<"there is illegal character in row   "<<row<<"";
	fun.get(ch);
	break;
 }
break;
case 1:

 fun.get(ch);
 if(ISDIGIT(ch))
 {state=1;}
 else if(ch=='.')
 {state=3;}
 else if(ch=='E')
 {state=6;}
 else
 { cout<<"\n";
	cout<<"      Integer           int       "<<"      "<<row<<"";
	cout<<"\n";
	symbolTable(temp,"num",row);
	state=0;
 }
break;
case 3:

 fun.get(ch);
 if(ISDIGIT(ch))
 {state=4;}
 else
 { cout<<"\n";
	cout<<"eror:after point should be digit-your wrong is in row"      <<row ;
 }
break;
case 4:

 fun.get(ch);
 if(ISDIGIT(ch))
 {state=4;}
 else if(ch=='E')
 {state=6;}
 else
 { cout<<"\n";
	cout<<"     Decimal           decimal       "<<"       "<<row<<"";
	cout<<"\n";
	symbolTable(temp,"num",row);
	state=0;
 }
break;
case 6:

 fun.get(ch);
 if(ISDIGIT(ch))
 {state=8;}
 else if(ch=='+' || ch=='-')
 {state=7;}
 else
 {cout<<"\n";
 cout<<"erorr:after E should be digit or +/- .. your wrong is in row"  <<row;
 state=0;}
break;
case 7:

 fun.get(ch);
 if(ISDIGIT(ch))
 { state=8;}
 else
 {cout<<"\n";
 cout<<" eror:after +/- should be digit .. your wrong is in row"   <<row;
 state=0;}
break;
case 8:

 fun.get(ch);
 if(ISDIGIT(ch))
 {state=8;}
 else
 {cout<<"\n";
 cout<<"     Ddlmy            Num       "<<"        "<<row<<"";
 cout<<"\n";
 symbolTable(temp,"num",row);
 state=0;}
break;

case 10:

 fun.get(ch);

 if(isletter(ch))
  {  state=10;
	  temp[i]=ch;
	  i++;
  }
 else if(ISBIGLETTER(ch))
 {   state=10;
	  temp[i]=ch;
	  i++;
 }
 else
 { temp[i]='\0';
	state=11;}
break;
case 11:

		i=0;
			 if ((temp[i]=='i')&&(temp[i+1]=='n')&&(temp[i+2]=='t'))
			{
		cout<<"\n";
		cout<<"      int            keyword     "<<"       "<<row<<"";
		cout<<"\n";
		symbolTable(temp,"int",row);
		state=0;
			}


			else if ((temp[i]=='c') && (temp[i+1]=='h') && (temp[i+2]=='a') &&
 (temp[i+3]=='r'))
			{
	 cout<<"\n";
	 cout<<"      char           keyword     "<<"       "<<row<<"";
	 cout<<"\n";
	 symbolTable(temp,"char",row);
	 state=0;
			}

	 else if ((temp[i]=='f') && (temp[i+1]=='o') &&
 (temp[i+2]=='r') )
			{
	 cout<<"\n";
	 cout<<"       for           keyword     "<<"       "<<row<<"";
	 cout<<"\n";
	 symbolTable(temp,"for",row);
	 state=0;
			}



			else if ((temp[i]=='c') && (temp[i+1]=='a') && (temp[i+2]=='s') &&
 (temp[i+3]=='e'))
			{
				cout<<"\n";
		 cout<<"      case           keyword     "<<"      "<<row<<"";
		 cout<<"\n";
		 symbolTable(temp,"case",row);
		 state=0;
			}
				else if ((temp[i]=='i') && (temp[i+1]=='f'))
			{
	 cout<<"\n";
	 cout<<"       if            keyword     "<<"       "<<row<<"";
	 cout<<"\n";
	 symbolTable(temp,"if",row);
	 state=0;
			}


			else if ((temp[i]=='m') && (temp[i+1]=='a') && (temp[i+2]=='i') &&(temp[i+3]=='n'))
			{
		 cout<<"\n";
		 cout<<"      main           keyword     "<<"       "<<row<<"";
		 cout<<"\n";
		 symbolTable(temp,"main",row);
		 state=0;
			}
				else if ((temp[i]=='d') && (temp[i+1]=='o'))
			{
	 cout<<"\n";
	 cout<<"      do           keyword     "<<"       "<<row<<"";
	 cout<<"\n";
	 symbolTable(temp,"do",row);
	 state=0;
			}


			else if ((temp[i]=='w') && (temp[i+1]=='h') && (temp[i+2]=='i') &&
 (temp[i+3]=='l')&&( temp[i+4]=='e'))
			{
				cout<<"\n";
		 cout<<"      while          keyword     "<<"      "<<row<<"";
		 cout<<"\n";
		 symbolTable(temp,"while",row);
	    state=0;
			}

	 else if ((temp[i]=='f') && (temp[i+1]=='l') &&
 (temp[i+2]=='o') && (temp[i+3]=='a')&&( temp[i+4]=='t'))
			{
				cout<<"\n";
		 cout<<"      float          keyword     "<<"       "<<row<<"";
		 cout<<"\n";
		 symbolTable(temp,"float",row);
		 state=0;
			}

	  else if ((temp[i]=='s') && (temp[i+1]=='w') &&
			(temp[i+2]=='i') && (temp[i+3]=='t')&&( temp[i+4]=='c')&&(
			 temp[i+5]=='h'))
			{
				cout<<"\n";
				cout<<"     switch          keyword     "<<"      "<<row<<"";
				cout<<"\n";
				symbolTable(temp,"switch",row);
				state=0;
			}
	  else if ((temp[i]=='e') && (temp[i+1]=='l') &&
			 (temp[i+2]=='s') && (temp[i+3]=='e'))
			{
				cout<<"\n";
				cout<<"     else           keyword     "<<"        "<<row<<"";
				cout<<"\n";
				symbolTable(temp,"else",row);
				state=0;
			}
	  else if ((temp[i]=='b') && (temp[i+1]=='r') &&
			 (temp[i+2]=='e') && (temp[i+3]=='a')&& (temp[i+4]=='k'))
			{
				cout<<"\n";
				cout<<"     break          keyword     "<<"        "<<row<<"";
				cout<<"\n";
				symbolTable(temp,"break",row);
				state=0;
			}

	  else if ((temp[i]=='r') && (temp[i+1]=='e') &&
			 (temp[i+2]=='t') && (temp[i+3]=='u')&& (temp[i+4]=='r') && (temp[i+5]=='n'))
			{
				cout<<"\n";
				cout<<"     return          keyword     "<<"        "<<row<<"";
				cout<<"\n";
				symbolTable(temp,"return",row);
				state=0;
			}
	 else


	 { cout<<"\n";
		cout<<"        ";
		while(temp[i]!='\0')
		  {cout<<temp[i];
			i++;}
		cout<<"               id        "<<"      "<<row<<"";
		cout<<"\n";
		symbolTable(temp,"id",row);
		state=0;
	 }

 break;

case 12:
 fun.get(ch);
 if(ch=='*')
 {state=14;}
 else
 {cout<<"\n";
 cout<<"\n";
 cout<<"        /             Divide     "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("/","/",row);
 state=0;}
break;

case 14:
  fun.get(ch);
  if(ch=='*')
  {state=15 ;}
  else if(fun.eof())
 {cout<<"\n";
 cout<<"      comment          comment     "<<"       "<<row<<"";
 cout<<"\n";

 state=0;}
  else
  {state=14;}
break;
case 15:

 fun.get(ch);
 if(ch=='/'){
 cout<<"\n";
 cout<<"      comment         comment      "<<"       "<<row<<"";
 cout<<"\n";

 state=0;
 fun.get(ch);}
 else state=14;
break;
case 17:

 fun.get(ch);
 if(ch=='+')
 {state=18;}
 else
 { cout<<"\n";
 cout<<"        +              plus      "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("+","+",row);
 state=0;}
break;
case 18:
 cout<<"\n";
 cout<<"        ++          plus plus    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("++","++",row);
 state=0;
 fun.get(ch);
break;

case 20:

 fun.get(ch);
 if(ch=='-')
 {state=22;}
 else
 { cout<<"\n";
 cout<<"        -              minus     "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("-","-",row);
 state=0;}
break;

case 22:
 cout<<"\n";
 cout<<"        --         minus minus   "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("--","--",row);
 state=0;
 fun.get(ch);
break;

case 23:
 cout<<"\n";
 cout<<"        *            Multiply    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("*","*",row);
 fun.get(ch);
 state=0;
 break;

 case 24:
 cout<<"\n";
 cout<<"        %            Remainder   "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("%","%",row);
 state=0;
 fun.get(ch);
break;

case 25:

 fun.get(ch);
 if(ch=='=')
 {state=27;}
 else
 { cout<<"\n";
 cout<<"        !              Not       "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("!","!",row);
 state=0;}
break;

case 27:
 cout<<"\n";
 cout<<"       !=          Not equal to  "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("!=","!=",row);
 state=0;
 fun.get(ch);
break;

case 28:
 fun.get(ch);
 if(ch=='=')
 {state=30;}
 else
 {cout<<"\n";
 cout<<"        <             less       "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("<","<",row);
 state=0;}
break;

case 30:
 cout<<"\n";
 cout<<"        <=          equal less   "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("<=","<=",row);
 state=0;
 fun.get(ch);
break;

case 31:
 fun.get(ch);
 if(ch=='=')
 { state=33;}
 else
 {cout<<"\n";
 cout<<"        >             more       "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable(">",">",row);
 state=0;}
break;

case 33:
 cout<<"\n";
 cout<<"        >=          equal more   "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable(">=",">=",row);
 state=0;
 fun.get(ch);
break;

case 34:
 fun.get(ch);
 if(ch=='=')
 {state=36;}
 else
 { cout<<"\n";
 cout<<"       =            Assignment   "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("=","=",row);
 state=0;
 }
break;

case 36:
 cout<<"\n";
 cout<<"        ==          Equal to     "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("==","==",row);
 state=0;
 fun.get(ch);
break;

case 37:
 fun.get(ch);
 if(ch=='|')
 state=38;
 else
 {cout<<"\n";
 cout<<" eror-you cant use just one | - your wrong is in row"   <<row ;
  cout<<"\n";
  state=0;
 fun.get(ch);
  }
break;

case 38:
 cout<<"\n";
 cout<<"        ||              or        "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("||","||",row);
 state=0;
 fun.get(ch);
 break;

 case 56:
 cout<<"\n";
 cout<<"        ^             tavan      "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("^","^",row);
 state=0;
 fun.get(ch);
 break;


 case 39:

 fun.get(ch);
 if(ch=='&')
 { state=40;}
 else
 {cout<<"\n";
 cout<<"       &            pointer      "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("&","&",row);
 state=0;}
break;

case 40:
 cout<<"\n";
 cout<<"        &&            And        "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("&&","&&",row);
 state=0;
 fun.get(ch);
break;

case 41:
 cout<<"\n";
 cout<<"        ;           Semicolon    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable(";",";",row);
 state=0;
 fun.get(ch);
break;

case 42:
 cout<<"\n";
 cout<<"        ,             comma      "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable(",",",",row);
 state=0;
 fun.get(ch);
break;

case 43:
 cout<<"\n";
 cout<<"        {             L Brace    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("{","{",row);
 fun.get(ch);
 state=0;
break;

case 44:
 cout<<"\n";
 cout<<"        }            R Brace     "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("}","}",row);
 state=0;
 fun.get(ch);
break;

case 45:
 cout<<"\n";
 cout<<"        (         L Parenthesis  "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("(","(",row);
 state=0;
 fun.get(ch);
 break;

 case 46:
 cout<<"\n";
 cout<<"        )         R Parenthesis  "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable(")",")",row);
 state=0;
 fun.get(ch);
 break;

 case 47:
 cout<<"\n";
 cout<<"        [           L Bracket    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("[","[",row);
 state=0;
 fun.get(ch);
 break;
 case 48:
 cout<<"\n";
 cout<<"        ]           R Bracket    "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("]","]",row);
 state=0;
 fun.get(ch);
break;
case 50:
 cout<<"\n";
 cout<<"      \\"<<"t               Tab       "<<"       "<<row<<"";
 cout<<"\n";
 symbolTable("\\t","\\t",row);
 state=0;
 fun.get(ch);
break;
case 51:
 cout<<"\n";
 cout<<"        \\"<<"n              enter      "<<"     "<<row<<"";
 cout<<"\n";
 symbolTable("\\n","\\n",row);
 state=0;
 fun.get(ch);
break;

case 53:
 fun.get(ch);
 if(ch=='\n')
 {
 cout<<"\n";
 cout<<"eror : you cant use enter between string-your wrong is in row    "<<row;}
 else if(fun.eof())
 {cout<<"\n";
 cout<<"eror : you should finish your string before eof-your wrong in row  "<<row;}

 else if(ch=='"')
 {
 state=54;}
 else
 {
 state=53;}
break;
case 54:

 cout<<"\n";
 cout<<"      literal             string     "<<"      "<<row<<"";
 cout<<"\n";
 symbolTable("literal","string",row);
 fun.get(ch);
 state=0;
break;

}
 }

 while(!fun.eof());
fun.close();

//************************************************************************parser
cout<<"\n";
cout<<"************************** parser ******************************";
cout<<"\n";

int k=2;


int Tparse[26][32]=
 {
	 {1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,3,3,3,3,0,3,0,0,0,0,0,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0},
	 {0,5,4,4,4,4,0,5,0,5,5,5,5,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4,0},
	 {0,0,6,6,6,6,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,6,0},
	 {0,0,9,10,11,12,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,13,0},
	 {0,0,0,0,0,0,7,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,8,0,0},
	 {0,14,0,0,0,0,0,14,0,14,14,14,14,14,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,15,0,0,0,0,0,15,0,15,15,15,15,15,0,0,0,0,0,0,0,0,0,0,0,0,0,0,16,0,0,0},
	 {0,18,0,0,0,0,0,17,0,19,20,21,22,17,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,31,0,0,0,0,0,31,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,32,0,0,0,0,0,32,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,0,0,36,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,33,0,0,0,0,0,33,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,34,0,0,0,0,0,35,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,0,0,0,40,41,44,43,44,45,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,46,47,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,48,49,50,51,52,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,23,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,25,0,0,0,0,0,25,0,25,25,25,25,25,0,0,0,0,0,0,0,0,0,0,0,0,0,24,25,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,26,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,27,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,0,28,0,0,0,0,0,28,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,29,0,0},
	 {0,0,0,0,0,0,0,0,0,0,0,0,30,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0},
	 {0,0,0,0,0,0,53,54,0,54,54,54,54,54,54,54,54,54,54,54,54,54,54,54,54,54,54,0,0,0,0,54},
	 {0,0,0,0,0,0,0,0,0,0,0,0,0,0,37,37,37,37,37,37,38,38,39,39,39,39,39,0,0,0,0,0}
 };
 //gramer
  strcpy(gram[0].st[0],"");
  strcpy(gram[0].st[1],"");
  strcpy(gram[0].st[2],"");
  strcpy(gram[0].st[3],"");
  strcpy(gram[0].st[4],"");
  gram[0].numRecord=5;

  strcpy(gram[1].st[0],"program");
  strcpy(gram[1].st[1],"main");
  strcpy(gram[1].st[2],"(");
  strcpy(gram[1].st[3],")");
  strcpy(gram[1].st[4],"comp-stm");
  gram[1].numRecord=5;

  strcpy(gram[2].st[0],"comp-stm");
  strcpy(gram[2].st[1],"{");
  strcpy(gram[2].st[2],"loc-dec");
  strcpy(gram[2].st[3],"stm-list");
  strcpy(gram[2].st[4],"}");
  gram[2].numRecord=5;

  strcpy(gram[3].st[0],"loc-dec");
  strcpy(gram[3].st[1],"A");
  gram[3].numRecord=2;

  strcpy(gram[4].st[0],"A");
  strcpy(gram[4].st[1],"var-dec");
  strcpy(gram[4].st[2],"A");
  gram[4].numRecord=3;

  strcpy(gram[5].st[0],"A");
  strcpy(gram[5].st[1],"e");//e=epsilon
  gram[5].numRecord=2;

  strcpy(gram[6].st[0],"var-dec");
  strcpy(gram[6].st[1],"TY-speci");
  strcpy(gram[6].st[2],"id");
  strcpy(gram[6].st[3],"B");
  gram[6].numRecord=4;

  strcpy(gram[7].st[0],"B");
  strcpy(gram[7].st[1],"[");
  strcpy(gram[7].st[2],"num");
  strcpy(gram[7].st[3],"]");
  strcpy(gram[7].st[4],"B");
  gram[7].numRecord=5;

  strcpy(gram[8].st[0],"B");
  strcpy(gram[8].st[1],";");
  gram[8].numRecord=2;

  strcpy(gram[9].st[0],"TY-speci");
  strcpy(gram[9].st[1],"int");
  gram[9].numRecord=2;

  strcpy(gram[10].st[0],"TY-speci");
  strcpy(gram[10].st[1],"void");
  gram[10].numRecord=2;

  strcpy(gram[11].st[0],"TY-speci");
  strcpy(gram[11].st[1],"bool");
  gram[11].numRecord=2;

  strcpy(gram[12].st[0],"TY-speci");
  strcpy(gram[12].st[1],"float");
  gram[12].numRecord=2;

  strcpy(gram[13].st[0],"TY-speci");
  strcpy(gram[13].st[1],"char");
  gram[13].numRecord=2;

  strcpy(gram[14].st[0],"stm-list");
  strcpy(gram[14].st[1],"C");
  gram[14].numRecord=2;

  strcpy(gram[15].st[0],"C");
  strcpy(gram[15].st[1],"stm");
  strcpy(gram[15].st[2],"C");
  gram[15].numRecord=3;

  strcpy(gram[16].st[0],"C");
  strcpy(gram[16].st[1],"e");
  gram[16].numRecord=2;

  strcpy(gram[17].st[0],"stm");
  strcpy(gram[17].st[1],"Expr-stm");
  gram[17].numRecord=2;

  strcpy(gram[18].st[0],"stm");
  strcpy(gram[18].st[1],"comp-stm");
  gram[18].numRecord=2;

  strcpy(gram[19].st[0],"stm");
  strcpy(gram[19].st[1],"selec-stm");
  gram[19].numRecord=2;

  strcpy(gram[20].st[0],"stm");
  strcpy(gram[20].st[1],"Iter-stm");
  gram[20].numRecord=2;

  strcpy(gram[21].st[0],"stm");
  strcpy(gram[21].st[1],"Return-stm");
  gram[21].numRecord=2;

  strcpy(gram[22].st[0],"stm");
  strcpy(gram[22].st[1],"Break-stm");
  gram[22].numRecord=2;

  strcpy(gram[23].st[0],"selec-stm");
  strcpy(gram[23].st[1],"if");
  strcpy(gram[23].st[2],"(");
  strcpy(gram[23].st[3],"Expr");
  strcpy(gram[23].st[4],")");
  strcpy(gram[23].st[5],"comp-stm");
  strcpy(gram[23].st[6],"D");
  gram[23].numRecord=7;

  strcpy(gram[24].st[0],"D");
  strcpy(gram[24].st[1],"else");
  strcpy(gram[24].st[2],"comp-stm");
  gram[24].numRecord=3;

  strcpy(gram[25].st[0],"D");
  strcpy(gram[25].st[1],"e");
  gram[25].numRecord=2;

  strcpy(gram[26].st[0],"Iter-stm");
  strcpy(gram[26].st[1],"while");
  strcpy(gram[26].st[2],"(");
  strcpy(gram[26].st[3],"Expr");
  strcpy(gram[26].st[4],")");
  strcpy(gram[26].st[5],"comp-stm");
  gram[26].numRecord=6;

  strcpy(gram[27].st[0],"Return-stm");
  strcpy(gram[27].st[1],"return");
  strcpy(gram[27].st[2],"F");
  gram[27].numRecord=3;

  strcpy(gram[28].st[0],"F");
  strcpy(gram[28].st[1],"Expr");
  strcpy(gram[28].st[2],";");
  gram[28].numRecord=3;

  strcpy(gram[29].st[0],"F");
  strcpy(gram[29].st[1],";");
  gram[29].numRecord=2;

  strcpy(gram[30].st[0],"Break-stm");
  strcpy(gram[30].st[1],"break");
  strcpy(gram[30].st[2],";");
  gram[30].numRecord=3;

  strcpy(gram[31].st[0],"Expr-stm");
  strcpy(gram[31].st[1],"Expr");
  strcpy(gram[31].st[2],";");
  gram[31].numRecord=3;

  strcpy(gram[32].st[0],"Expr");
  strcpy(gram[32].st[1],"simp-Expr");
  gram[32].numRecord=2;

  strcpy(gram[33].st[0],"simp-Expr");
  strcpy(gram[33].st[1],"operand");
  strcpy(gram[33].st[2],"operator");
  strcpy(gram[33].st[3],"operand");
  gram[33].numRecord=4;

  strcpy(gram[34].st[0],"operand");
  strcpy(gram[34].st[1],"num");
  gram[34].numRecord=2;

  strcpy(gram[35].st[0],"operand");
  strcpy(gram[35].st[1],"var");
  gram[35].numRecord=2;

  strcpy(gram[36].st[0],"var");
  strcpy(gram[36].st[1],"id");
  strcpy(gram[36].st[2],"G");
  gram[36].numRecord=3;

  strcpy(gram[37].st[0],"operator");
  strcpy(gram[37].st[1],"Relop");
  gram[37].numRecord=2;

  strcpy(gram[38].st[0],"operator");
  strcpy(gram[38].st[1],"logop");
  gram[38].numRecord=2;

  strcpy(gram[39].st[0],"operator");
  strcpy(gram[39].st[1],"Arithop");
  gram[39].numRecord=2;

  strcpy(gram[40].st[0],"Relop");
  strcpy(gram[40].st[1],"<=");
  gram[40].numRecord=2;

  strcpy(gram[41].st[0],"Relop");
  strcpy(gram[41].st[1],"<");
  gram[41].numRecord=2;

  strcpy(gram[42].st[0],"Relop");
  strcpy(gram[42].st[1],">");
  gram[42].numRecord=2;

  strcpy(gram[43].st[0],"Relop");
  strcpy(gram[43].st[1],">=");
  gram[43].numRecord=2;

  strcpy(gram[44].st[0],"Relop");
  strcpy(gram[44].st[1],"!=");
  gram[44].numRecord=2;

  strcpy(gram[45].st[0],"Relop");
  strcpy(gram[45].st[1],"==");
  gram[45].numRecord=2;

  strcpy(gram[46].st[0],"logop");
  strcpy(gram[46].st[1],"&&");
  gram[46].numRecord=2;

  strcpy(gram[47].st[0],"logop");
  strcpy(gram[47].st[1],"||");
  gram[47].numRecord=2;

  strcpy(gram[48].st[0],"Arithop");
  strcpy(gram[48].st[1],"+");
  gram[48].numRecord=2;

  strcpy(gram[49].st[0],"Arithop");
  strcpy(gram[49].st[1],"-");
  gram[49].numRecord=2;

  strcpy(gram[50].st[0],"Arithop");
  strcpy(gram[50].st[1],"*");
  gram[50].numRecord=2;

  strcpy(gram[51].st[0],"Arithop");
  strcpy(gram[51].st[1],"/");
  gram[51].numRecord=2;

  strcpy(gram[52].st[0],"Arithop");
  strcpy(gram[52].st[1],"%");
  gram[52].numRecord=2;

  strcpy(gram[53].st[0],"G");
  strcpy(gram[53].st[1],"[");
  strcpy(gram[53].st[2],"num");
  strcpy(gram[53].st[3],"]");
  gram[53].numRecord=4;

  strcpy(gram[54].st[0],"G");
  strcpy(gram[54].st[1],"e");
  gram[54].numRecord=2;


 int f=1;
 int gramnum=0;//shomareye gramer
 int ptrow; //satre parse table
 int ptcol; //sotoune parse table
 int bp=1;//pointer of top of stack
 char x[15]; //top of stack



 strcpy(s[j].type,"$");//$ ra be entehaye reshte ezafe mikonim
 strcpy(stack[0].p,"$");
 strcpy(stack[1].p,gram[1].st[0]);
  j=0;
  do
  {
	strcpy(x,stack[bp].p);
	strcpy(a,s[j].type);


	if(findTerminal(x,a))
	{
		 //if(x=a=$) Accept
		  if(!strcmp(x,a) && !strcmp(a,"$"))
		  {
			 cout<<"        ";
			 cout<<"ACCEPT\n";
		  }
		  else
			 {
				//if(x=a) {pop(x);advance ip}

				 if(!strcmp(x,a))//Advance
					 {
						 bp--;
						 j++;
						 cout<<"       ";
						 cout<<"Advance";
						 cout<<"\n";
					 }
					 //else error:
				 else
					{
					  cout<<"error miss match Terminal\n";
						f=0;
					}
			 }
	}
	else //x=nonterminal

	{
		// if(m[x,a]=x->y1y2y...yk){pop(x1);push(yk...y1)}
		if(!strcmp(x,"e"))
		  {
			  bp--;
		  }
		 else
		  {

			  ptrow=findNumOfRowOfParseTable(x);
			  ptcol=findNumOfColOfParseTable(a);
			  gramnum=Tparse[ptrow][ptcol];//m[x,a]=x->y1y2y...yk)

			  //baraye chupe production ha
				cout<<gramnum<<"  "<<gram[gramnum].st[0]<<" -> ";
				for(int i=1;i<=gram[gramnum].numRecord;i++)

				  {
						 cout<<gram[gramnum].st[i]<<"  ";
				  }

					 cout<<"\n";



			  if(gramnum)//age oun khune az parse table khali(0) naboud

				 {
						bp--;//pop(x1)

					  for(int i=gram[gramnum].numRecord;i>1;i--) //push(yk...y1)
						 {
								 bp++;
								 strcpy(stack[bp].p,gram[gramnum].st[i-1]);

						 }

				}
	  //elseerror;  //dar vage fekr konam vagti be inja residim yan khuneye jadval khali ya 0 boude pas error
	  else
	  {
		cout<<"error\n";
		f=0;
	  }
	 }
	}


  }

while (strcmp(x,"$") && f==1);


getch();
return 0;
}

