<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-3 Error Based- String (with Twist) </title>
<link rel="stylesheet" href="../index.html_files/freemind2html.css" type="text/css"/>

</head>

<body>

<div style="margin-top:60px; color:#FFF; font-size:23px; text-align:center">
  <h1>Welcome to SQL injection Master course</h1>
  <h2 class="style2">Lesson 3</h2>
  <h2><span class="style5">Hint : Error based string</span> </h2>
  <h2><span class="style4">hitesh@hiteshchoudhary.com</span><br>
    <font class="style3">
      
      
    <?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");

// take the variables
if(isset($_GET['id']))
{
$id=$_GET['id'];
//logging the connection parameters to a file for analysis.
$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);

// connectivity 


$sql="SELECT * FROM users WHERE id=('$id') LIMIT 0,1";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

	if($row)
	{
  	echo '<font color= "#0000ff">';	
  	echo 'Your Login name:'. $row['username'];
  	echo "<br>";
  	echo 'Your Password:' .$row['password'];
  	echo "</font>";
  	}
	} catch (mysqli_sql_exception $e) {
    echo '<font size="5" color="#900">';
    echo $e->getMessage();  // فقط متن خطای MySQL
    echo "</br></font>";
}
}
	else { echo "Please input the ID as parameter with numeric value";}

?>
                </font> </h2>
</div>
<div class="botton_fix">For more please visit : <a href="http://www.hiteshchoudhary.com" target="_blank">www.hiteshchoudhary.com</a></div>
</br></br></br><center>
</center>
</body>
</html>
