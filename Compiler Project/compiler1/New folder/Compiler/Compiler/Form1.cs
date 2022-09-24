using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Compiler
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        int sn = 0;
        string[] Reserved_word = new string[16] { "if", "then", "else", "int", "float", "char", "real", "true", "false", "while", "for", "do", "return", "break", ";","enum" };
        string[,] st = new string[10000, 2];


        private void Scan_Click(object sender, EventArgs e) //Starting Scan
        {
            spesification_token();
            showtoken();
        }


        private void showtoken() //Writing Tokens in ListBoxs...
        {
            listBox1.Items.Clear();
            listBox2.Items.Clear();
            for (int i = 0; i < sn; i++)
            {
                if (st[i, 0] != null)
                {
                    listBox1.Items.Add(i.ToString() + ">  " + st[i, 0].ToString());
                    listBox2.Items.Add(i.ToString() + ">  " + st[i, 1].ToString());
                }
            }
        }

        private bool separator(char c) // Looking For separators
        {
            if ((c == ' ') || (c == '(') || (c == ')') || (c == '{') || (c == '}') || (c == ',') )
                return true;
            return false;
        }

        private bool alphabet(char c) //Looking For alphabet
        {
            if (c > 96 && c < 123)
                return true;
            if (c > 64 && c < 91)
                return true;
            if (c == 95)
                return true;
            return false;
        }

        private bool digit(char c) //Looking For digit
        {
            if (c == '0' || c == '1' || c == '2' || c == '3' || c == '4' || c == '5' || c == '6' || c == '7' || c == '8' || c == '9')
                return true;
            return false;
        }

        private bool operand(char c) //Looking For Operator
        {
            if ((c == '*') || (c == '/') || (c == '+') || (c == '-') || (c == '=') || (c == '<') || (c == '>') )
                return true;
            return false;

        }











        private void spesification_token()
        {
            //////////////////////////////////Read Input & Enter in Sym TBL///////////////////////////////////
            int n_line = 0;
            int p;
            int l_line = 0;
            string s1 = "";
            sn = 0;
            ///// Clear the Symbol Table//////
            Array.Clear(st, 0, 10000);

            //////////////////////////////////

            n_line = richTextBox1.Lines.Length;
            for (int k = 0; k < n_line; k++)
            {
                p = 0;
                s1 = richTextBox1.Lines[k].ToString();
                l_line = s1.Length - 1;
                while (p <= l_line)
                {
                    try
                    {
                        if ((!separator(s1[p])) && (!operand(s1[p])))
                        {
//                            bool dot = false, e = false;
                            while ((p <= l_line) && (!separator(s1[p])) && (!operand(s1[p])))
                            {
/*                                if (e)
                                {
                                    if ((s1[p] == 'e') || (s1[p] == 'E'))
                                    {
                                        if (p + 1 <= l_line && ((s1[p+1]=='+') || (s1[p+1]=='-')))
                                        {
                                            st[sn, 0] = st[sn, 0] + s1[p] + s1[p + 1];
                                            p += 2;
                                        }
                                    }
                                }
                                if (dot && digit(s1[p]))
                                    e = true;
                                if (s1[p] == '.')
                                    dot = true;
 */
                                st[sn, 0] = st[sn, 0] + s1[p];
                                p++;

                            }                                
                            st[sn, 1] = "Identifier";
                            sn++;
                        }
                        else if (separator(s1[p]))
                        {
                            if (s1[p] != ' ' )
                            {
                                st[sn, 0] = s1[p].ToString();
                                st[sn, 1] = "Separator";
                                sn++;
                            }
                            p++;
                        }
                        else if (operand(s1[p]))
                            {
                                bool ef = true;

                                if (p+1<=l_line)
                                    if (operand(s1[p + 1]))
                                    {

                                        if (s1[p] == '+')
                                        {
                                            if (s1[p + 1] == '+')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '=')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '-')
                                        {
                                            if (s1[p + 1] == '-')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '=')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '<')
                                        {
                                            if (s1[p + 1] == '>')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '=')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '>')
                                        {
                                            if (s1[p + 1] == '<')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '=')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '=')
                                        {
                                            if (s1[p + 1] == '<')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            if (s1[p + 1] == '>')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '=')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Operator";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '/')
                                        {
                                            if (s1[p + 1] == '/')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Comment";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                            else if (s1[p + 1] == '*')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Comment";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                        else if (s1[p] == '*')
                                        {
                                            if (s1[p + 1] == '/')
                                            {
                                                st[sn, 0] = s1[p].ToString();
                                                st[sn, 0] = st[sn, 0] + s1[p + 1].ToString();
                                                st[sn, 1] = "Comment";
                                                sn++;
                                                p += 2;
                                                ef = false;
                                            }
                                        }
                                    }
                                if (ef)
                                {
                                    st[sn, 0] = s1[p].ToString();
                                    st[sn, 1] = "Operator";
                                    sn++;
                                    p++;
                                }
                            }
                        st[sn, 1] = "Identifier";
                    }
                    catch (Exception)
                    {

                    }
                }
            }
            ///////////////////////////////////specification Reserved Word//////////////
            int cmp;
            for (int i = 0; i < sn; i++)
            {
                for (int j = 0; j < 16; j++)
                {
                    if (st[i, 0] != null)
                    {

                        cmp = st[i, 0].CompareTo(Reserved_word[j]);
                        if (cmp == 0)
                        {
                            st[i, 1] = "Reserved";
                        }
                    }
                }
            }
            ////////////////////////////////////specification digit/////////////////////////////////////
            s1 = "";
            for (int i = 0; i < sn; i++)
            {
                if (st[i, 0] != null && st[i, 1] == "Identifier")
                {
                    
                    s1 = st[i, 0];
                    for (int j = 0; j < s1.Length; j++)
                    {
                        if (alphabet(s1[0]))
                        {
                            for (int k = 1; k < s1.Length; k++)
                            {
                                if (digit(s1[k]) || alphabet(s1[k]))
                                {

                                }
                                else
                                {
                                    st[i, 1] = "Error";
                                }


                            }
                        }
                        else if (digit(s1[0]))
                        {
                            st[i, 1] = "Int";
                            bool flag = false;
                            for (int t = 1; t < (s1.Length); t++)
                            {

                                if (s1[t] == '.')
                                {
                                    if (flag == true)
                                    {
                                        st[i, 1] = "Error";
                                    }
                                    else
                                    {
                                        st[i, 1] = "Float";
                                        flag = true;
                                    }
                                }
                                else
                                    if (!digit(s1[t]))
                                    {
                                        st[i, 1] = "Error";
                                    }
                            }
                        }
                        else
                        {
                            st[i, 1] = "Error";
                        }
                    }
                }
            }
            ////////////////////////////////////specification Char/////////////////////////////////////
            s1 = "";
            int b=0;
           while(b<=sn)
            {
                if (st[b, 0] != null && st[b, 0] == "'")            
                {
                    b++;
                    if (st[b, 0] != null)
                    {
                        b++;
                        if (st[b, 0] != null && st[b, 0] == "'")
                        {
                            st[b - 1, 1] = "Char";
                            b++;
                        }
                    }
                }
                b++;
            }
        }















        private void New_Click_1(object sender, EventArgs e)
        {
            richTextBox1.Clear();
        }

        private void listBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            listBox2.SelectedIndex = listBox1.SelectedIndex;
        }

        private void listBox2_SelectedIndexChanged_1(object sender, EventArgs e)
        {
            listBox1.SelectedIndex = listBox2.SelectedIndex;
        }


    }
}
