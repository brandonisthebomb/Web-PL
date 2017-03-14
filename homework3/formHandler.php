<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Simple form handler</title>
  
  <script type="text/javascript">
  
  </script>
</head>

<body bgcolor="#EEEEEE">
  <center><h2>Display Page</h2></center>
  <p>
    Please check that the question and answers that you provided are correct.
  </p>

  <table cellSpacing=1 cellPadding=1 width="75%" border=1 bgColor="lavender">
    <tr bgcolor="#FFFFFF">
      <td align="center"><strong>Parameter</strong></td>
      <td align="center"><string>Value</string></td>
    </tr>
    
    <?php
      foreach($_POST as $key => $value) {
	echo "<tr><td width=\"20%\">";
	echo $key;
	echo "</td><td>";
	echo $value;
	echo "</td></tr>";
      }
    ?>
  </table>
  
  <button id="backbutton" onclick="history.go(-1);">Back</button>
  <form method="post" action="write_to_file.php">
    <input name="data" type="hidden" value="<?php echo htmlentities(serialize($_POST));?>">
    <input type="submit" value="Confirm">
  </form>
  
</body>
</html> 