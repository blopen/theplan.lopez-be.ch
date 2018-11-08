namespace ScriptGenerator
{
    partial class Form1
    {
        /// <summary>
        /// Erforderliche Designervariable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Verwendete Ressourcen bereinigen.
        /// </summary>
        /// <param name="disposing">True, wenn verwaltete Ressourcen gelöscht werden sollen; andernfalls False.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Vom Windows Form-Designer generierter Code

        /// <summary>
        /// Erforderliche Methode für die Designerunterstützung.
        /// Der Inhalt der Methode darf nicht mit dem Code-Editor geändert werden.
        /// </summary>
        private void InitializeComponent()
        {
            this.button1 = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.nudUserId = new System.Windows.Forms.NumericUpDown();
            this.txtDestination = new System.Windows.Forms.TextBox();
            this.nudNumberOfSessions = new System.Windows.Forms.NumericUpDown();
            this.label4 = new System.Windows.Forms.Label();
            this.nudSetsPerSessions = new System.Windows.Forms.NumericUpDown();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.txtExcersices = new System.Windows.Forms.TextBox();
            ((System.ComponentModel.ISupportInitialize)(this.nudUserId)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.nudNumberOfSessions)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.nudSetsPerSessions)).BeginInit();
            this.SuspendLayout();
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(237, 166);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(208, 23);
            this.button1.TabIndex = 0;
            this.button1.Text = "Create";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(12, 15);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(63, 13);
            this.label1.TabIndex = 3;
            this.label1.Text = "Destination:";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(12, 54);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(44, 13);
            this.label2.TabIndex = 4;
            this.label2.Text = "User Id:";
            // 
            // nudUserId
            // 
            this.nudUserId.Location = new System.Drawing.Point(192, 52);
            this.nudUserId.Maximum = new decimal(new int[] {
            10000,
            0,
            0,
            0});
            this.nudUserId.Name = "nudUserId";
            this.nudUserId.Size = new System.Drawing.Size(253, 20);
            this.nudUserId.TabIndex = 5;
            this.nudUserId.Value = new decimal(new int[] {
            10,
            0,
            0,
            0});
            // 
            // txtDestination
            // 
            this.txtDestination.Location = new System.Drawing.Point(81, 12);
            this.txtDestination.Name = "txtDestination";
            this.txtDestination.Size = new System.Drawing.Size(364, 20);
            this.txtDestination.TabIndex = 1;
            // 
            // nudNumberOfSessions
            // 
            this.nudNumberOfSessions.Location = new System.Drawing.Point(192, 78);
            this.nudNumberOfSessions.Maximum = new decimal(new int[] {
            10000,
            0,
            0,
            0});
            this.nudNumberOfSessions.Name = "nudNumberOfSessions";
            this.nudNumberOfSessions.Size = new System.Drawing.Size(253, 20);
            this.nudNumberOfSessions.TabIndex = 9;
            this.nudNumberOfSessions.Value = new decimal(new int[] {
            10,
            0,
            0,
            0});
            this.nudNumberOfSessions.ValueChanged += new System.EventHandler(this.numericUpDown2_ValueChanged);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(12, 80);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(101, 13);
            this.label4.TabIndex = 8;
            this.label4.Text = "Number of Sessions";
            // 
            // nudSetsPerSessions
            // 
            this.nudSetsPerSessions.Location = new System.Drawing.Point(192, 102);
            this.nudSetsPerSessions.Maximum = new decimal(new int[] {
            10000,
            0,
            0,
            0});
            this.nudSetsPerSessions.Name = "nudSetsPerSessions";
            this.nudSetsPerSessions.Size = new System.Drawing.Size(253, 20);
            this.nudSetsPerSessions.TabIndex = 11;
            this.nudSetsPerSessions.Value = new decimal(new int[] {
            10,
            0,
            0,
            0});
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(12, 104);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(174, 13);
            this.label5.TabIndex = 10;
            this.label5.Text = "Number of excersices each session";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(12, 132);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(157, 13);
            this.label6.TabIndex = 17;
            this.label6.Text = "Comma seperated exercised (id)";
            // 
            // txtExcersices
            // 
            this.txtExcersices.Location = new System.Drawing.Point(192, 128);
            this.txtExcersices.Name = "txtExcersices";
            this.txtExcersices.Size = new System.Drawing.Size(253, 20);
            this.txtExcersices.TabIndex = 16;
            this.txtExcersices.Text = "1,2,3,4,5,";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(463, 203);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.txtExcersices);
            this.Controls.Add(this.nudSetsPerSessions);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.nudNumberOfSessions);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.nudUserId);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.txtDestination);
            this.Controls.Add(this.button1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.Name = "Form1";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.nudUserId)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.nudNumberOfSessions)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.nudSetsPerSessions)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.NumericUpDown nudUserId;
        private System.Windows.Forms.TextBox txtDestination;
        private System.Windows.Forms.NumericUpDown nudNumberOfSessions;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.NumericUpDown nudSetsPerSessions;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.TextBox txtExcersices;
    }
}

