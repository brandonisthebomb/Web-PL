package jeopardy;

//Import Servlet Libraries
import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.*;

//Import Java Libraries
import java.io.*;
import java.util.*;
import java.lang.*;


@WebServlet("/jeopardyform")
public class jeopardyform extends HttpServlet
{
  // Location of servlet.
  static String url = "http://localhost:8080/cs4640/examples.simpleform";
  // note: domain="localhost", port="8080", path="/cs4640/", servlet="examples.simpleform"
  // put simpleform.class in /tomcat/webapps/cs4640/WEB-INF/classes/examples/ folder

  // to access the servlet via a browser
  // http://localhost:8080/cs4640/examples.simpleform

  // input text file (from CSLAB server)
  private static java.lang.String input_data = "http://plato.cs.virginia.edu/~awd5eg/data/data.txt";


  String user = "";
  String str_data = "";

  /** *****************************************************
  *  Overrides HttpServlet's doPost().
  *  Access the form data entry and present it back to the client
  **********************************************************/
  public void doPost (HttpServletRequest req, HttpServletResponse res)
  throws ServletException, IOException
  {
    res.setContentType ("text/html");
    PrintWriter out = res.getWriter ();

    out.println("   <input type=\"submit\" name=\"tea\" value=\"Tea\"/>");
    out.println("   <input type=\"submit\" name=\"coffee\" value=\"Coffee\"/>");

  }


  /** *****************************************************
  *  Overrides HttpServlet's doGet().
  *  Prints an HTML page with a blank form.
  ********************************************************* */
  public void doGet (HttpServletRequest req, HttpServletResponse res)
  throws ServletException, IOException
  {
    res.setContentType ("text/html");
    PrintWriter out = res.getWriter ();

    readFile();

    out.println("325");

    out.println("<h2> Addison Dunn and Brandon Liu</h2>");
    out.println("<h2> Q/A Selector <h2>");
    out.println("<table style=\"width:100%\" align=\"center\">");
    out.println("<tr>");
    out.println("<th>Question/Answer</th>");
    out.println("<th>Row</th>");
    out.println("<th>Column</th>");
    out.println("<th>Score</th>");
    out.println("</tr>");

    //out.println(str_data);

    String content = "Question: ";
    int i = 1;
    int j = 1;

    for(int x = 2; x < str_data.length(); x++)
    {
      if(str_data.substring(x, x + 1).equals("*")) {
        out.println("<tr>");
        out.println("<td align=\"center\">" + content + "</td>");
        out.println("<td align=\"center\">Row: <input type=\"text\" name=\"rowBox" + j + "\"/></td>");
        out.println("<td align=\"center\">Column: <input type=\"text\" name=\"colBox" + j +"\"/></td>");
        out.println("<td align=\"center\">Score: <input type=\"text\" name=\"scoreBox" + j +"\"/></td>");
        out.println("</tr>");
        content = "Question: ";
        i = 1;
      }
      else if (str_data.substring(x, x + 1).equals("~") && !str_data.substring(x + 1, x + 2).equals("*") ) {
        content += "<br> Answer " + i + ": ";
        i++;
      }
      else if ( str_data.substring(x, x + 1).equals("~") )
        content += "\n";
      else
        content += str_data.substring(x, x + 1);

    }

    out.println("<tr>");
    out.println("<td align=\"center\">" + content + "</td>");
    out.println("<td align=\"center\">Row: <input type=\"text\" name=\"rowBox\"/></td>");
    out.println("<td align=\"center\">Column: <input type=\"text\" name=\"colBox\"/></td>");
    out.println("<td align=\"center\">Score: <input type=\"text\" name=\"scoreBox\"/></td>");
    out.println("</tr>");

    out.println("</table>");

    out.println("<br>");
    out.println("<form action=\"jeopardyform\" method=\"post\">");
    out.println("<input type=\"button\" id=\"moreQuestionsButton\" align=\"center\" value=\"Add More Questions\" onclick=\"location.href=\'http://plato.cs.virginia.edu/~awd5eg/jeopardy.php\';\">");
    out.println("<input type=\"submit\" name=\"Submit\" value=\"Create Game\" /> ");
    out.println("</form>");

    out.close ();

  }



  private  void readFile()
  {
    try
    {
      java.net.URL url = new java.net.URL( input_data );
      java.net.URLConnection urlcon = url.openConnection();
      java.io.BufferedReader input_file = new java.io.BufferedReader( new java.io.InputStreamReader( urlcon.getInputStream() ) );
      java.lang.String line = new java.lang.String();
      while ((line = input_file.readLine()) != null)
      {
        if (line.length() > 0)
        {
          // A ~ marks where a space between answers should occur.
          str_data += "~" + line;
          //               System.out.println("line = " + line);
        }
      }
      input_file.close();
    } catch ( java.lang.Exception e ) {
      System.out.println( "ERROR: Cannot read input file !!" );
    }
  }

    private  void writeToFile( java.lang.String foldername, java.lang.String filename, java.lang.String str )
    {
        java.lang.String temp_str = str;
        java.lang.String out_str = new java.lang.String();
        int n = 0;
        while ((n = temp_str.indexOf( '\n' )) > 0) {
            java.lang.String line_str = temp_str.substring( 0, n );
            temp_str = temp_str.substring( n + 1, temp_str.length() );
            int i = line_str.indexOf( ":" );
            if (i > 0)
            {
                out_str = out_str + line_str.substring( i + 1, line_str.length() ) + '\n';
            }
        }
        try {
            java.io.File file = new java.io.File( foldername, filename );
            java.io.FileWriter fout = new java.io.FileWriter( file );
            fout.write( out_str );
            fout.flush();
            fout.close();
        } catch ( java.io.IOException e ) {
            System.out.println( "Error: cannot write to file " + foldername + filename + " : " + e.toString() );
            e.printStackTrace();
        }
    }

}
