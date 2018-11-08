using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace ScriptGenerator
{

    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            var filename = "script.sql";
            filename =  DateTime.Now.ToString(dateFileFormat) +".sql";
            txtDestination.Text = Environment.GetEnvironmentVariable("tmp") + "\\" + filename;

        }

    

        private string dateFormat = "yyyy-MM-dd hh:mm:ss";
        private string dateFileFormat = "yyyy-MM-dd_hh-mm-ss";

        private StringBuilder sb = new StringBuilder();
        private StringBuilder sbEnd = new StringBuilder();
        private Random random = new Random();
        private static readonly char[] seperators = new char[] { ',', ';' };
        private void button1_Click(object sender, EventArgs e)
        {

            var splits = txtExcersices.Text.Split(seperators);

            List<int> excercies = new List<int>();

            foreach (var part in splits)
            {
                int result;
                if (!int.TryParse(part, out result))
                {
                    break;
                }
                excercies.Add(result);
            }

            var userId = (int)nudUserId.Value;
            var numberOfSessions = (int) nudNumberOfSessions.Value;

            var firstDay = DateTime.Now.AddDays(-numberOfSessions);


            var setId = 1;
            var sessionId = 1;

            var sessionStartId = "@sessionId";
            var setStartId = "@setId";

            var sessionTable = "session";
            var setTable = "`set`";
            var sessionSetTable = "session_set";

            Insert($"SET {sessionStartId} = (SELECT max(id) from {sessionTable})", false);
            Insert($"SET {setStartId} = (SELECT max(id) from {setTable})", false);

            DateTime currentDay = firstDay;


            for (var sessionIndex = 0; sessionIndex < numberOfSessions; sessionIndex++)
            {
                
                var dateString = currentDay.ToString(dateFormat);
                
                Insert($"{sessionTable} VALUES ('{sessionId}'+{sessionStartId}, '{dateString}', '{userId}')");

                foreach (var excersie in excercies) {

                    for (var setIndex = 0; setIndex < nudSetsPerSessions.Value; setIndex++)
                    {
                        var repetition = random.Next(10) + 6;
                        var weight = random.Next(100) + 20;
                   
                        Insert($"{setTable} VALUES ('{setId}'+{setStartId},'{weight}','{repetition}','{excersie}')");

						InsertEnd($"`session_set` (`session_id`, `set_id`) VALUES ('{sessionId}'+{sessionStartId},'{setId}'+{setStartId})");
                        setId++;
                    }
             
                }
                sessionId++;
                currentDay = currentDay.AddDays(1);
            }

            try
            {
                File.Delete(txtDestination.Text);
                File.WriteAllText(txtDestination.Text, "");
                File.AppendAllText(txtDestination.Text, sb.ToString());
				File.AppendAllText(txtDestination.Text, sbEnd.ToString());
            }
            catch(Exception ex)
            {
                MessageBox.Show($"File is open, please close file before");
            }
        }
        
        private void Insert(string text, bool withInsert = true)
        {
            var insertInto = (withInsert) ? "INSERT INTO " : "";
            sb.Append(insertInto + text + "; "+ Environment.NewLine);
        }

		private void InsertEnd(string text, bool withInsert = true)
		{
			var insertInto = (withInsert) ? "INSERT INTO " : "";
			sbEnd.Append(insertInto + text + "; " + Environment.NewLine);
		}



		private void numericUpDown2_ValueChanged(object sender, EventArgs e)
        {

        }

        private void numericUpDown1_ValueChanged(object sender, EventArgs e)
        {

        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
