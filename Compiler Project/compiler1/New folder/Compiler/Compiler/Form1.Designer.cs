namespace Compiler
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.Scan = new System.Windows.Forms.Button();
            this.listBox1 = new System.Windows.Forms.ListBox();
            this.listBox2 = new System.Windows.Forms.ListBox();
            this.New = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // richTextBox1
            // 
            this.richTextBox1.Location = new System.Drawing.Point(21, 16);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(608, 485);
            this.richTextBox1.TabIndex = 0;
            this.richTextBox1.Text = "amir\namin123\n123\n12.3\n1.2 enum+3\nif then else while do real \nbreak return true fa" +
                "lse char float\n;\n:[]\\\n// /* */\n== ++ -\n<> < +=\n=>\n";
            // 
            // Scan
            // 
            this.Scan.Location = new System.Drawing.Point(119, 515);
            this.Scan.Name = "Scan";
            this.Scan.Size = new System.Drawing.Size(135, 36);
            this.Scan.TabIndex = 1;
            this.Scan.Text = "Scan";
            this.Scan.UseVisualStyleBackColor = true;
            this.Scan.Click += new System.EventHandler(this.Scan_Click);
            // 
            // listBox1
            // 
            this.listBox1.FormattingEnabled = true;
            this.listBox1.Items.AddRange(new object[] {
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9"});
            this.listBox1.Location = new System.Drawing.Point(635, 16);
            this.listBox1.Name = "listBox1";
            this.listBox1.Size = new System.Drawing.Size(151, 485);
            this.listBox1.TabIndex = 2;
            this.listBox1.SelectedIndexChanged += new System.EventHandler(this.listBox1_SelectedIndexChanged);
            // 
            // listBox2
            // 
            this.listBox2.FormattingEnabled = true;
            this.listBox2.Items.AddRange(new object[] {
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9"});
            this.listBox2.Location = new System.Drawing.Point(792, 16);
            this.listBox2.Name = "listBox2";
            this.listBox2.Size = new System.Drawing.Size(151, 485);
            this.listBox2.TabIndex = 3;
            this.listBox2.SelectedIndexChanged += new System.EventHandler(this.listBox2_SelectedIndexChanged_1);
            // 
            // New
            // 
            this.New.Location = new System.Drawing.Point(21, 515);
            this.New.Name = "New";
            this.New.Size = new System.Drawing.Size(92, 35);
            this.New.TabIndex = 4;
            this.New.Text = "New";
            this.New.UseVisualStyleBackColor = true;
            this.New.Click += new System.EventHandler(this.New_Click_1);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(955, 562);
            this.Controls.Add(this.New);
            this.Controls.Add(this.listBox2);
            this.Controls.Add(this.listBox1);
            this.Controls.Add(this.Scan);
            this.Controls.Add(this.richTextBox1);
            this.Name = "Form1";
            this.Text = "Compiler";
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.RichTextBox richTextBox1;
        private System.Windows.Forms.Button Scan;
        private System.Windows.Forms.ListBox listBox1;
        private System.Windows.Forms.ListBox listBox2;
        private System.Windows.Forms.Button New;
    }
}

