<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-32 **Bypass addslashes()**</title>
<link rel="stylesheet" href="../index.html_files/freemind2html.css" type="text/css"/>
</head>

<body>
<div style=" margin-top:70px;color:#FFF; font-size:23px; text-align:center">Welcome&nbsp;&nbsp;&nbsp;<font color="#FF0000"> Champ </font><br>
<font size="5" color="#00FF00">


<?php
//including the Mysql connect parameters.
include("../sql-connections/sql-connect.php");

function check_addslashes($string)
{
    $string = preg_replace('/'. preg_quote('\\') .'/', "\\\\\\", $string);          //escape any backslash
    $string = preg_replace('/\'/i', '\\\'', $string);                               //escape single quote with a backslash
    $string = preg_replace('/\"/', "\\\"", $string);                                //escape double quote with a backslash
      
    
    return $string;
}

// take the variables 
if(isset($_GET['id']))
{
$id=check_addslashes($_GET['id']);
//echo "The filtered request is :" .$id . "<br>";

//logging the connection parameters to a file for analysis.
$fp=fopen('result.txt','a');
fwrite($fp,'ID:'.$id."\n");
fclose($fp);

// connectivity 

mysqli_query($con, "SET NAMES gbk");
$sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
$result=mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

	if($row)
	{
  	echo '<font color= "#00FF00">';	
  	echo 'Your Login name:'. $row['username'];
  	echo "<br>";
  	echo 'Your Password:' .$row['password'];
  	echo "</font>";
  	}
	else 
	{
	echo '<font color= "#900">';
	print_r(mysqli_error($con));
	echo "</font>";  
	}
}
	else { echo "Please input the ID as parameter with numeric value";}
        
        

?>
</font> </div></br></br></br><center>
<img src="../images/Less-32.jpg" />
</br>
</br>
</br>
</br>
</br>
<font size='4' color= "#33FFFF">
<?php

function strToHex($string)
{
    $hex='';
    for ($i=0; $i < strlen($string); $i++)
    {
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}
echo "Hint: The Query String you input is escaped as : ".$id ."<br>";
echo "The Query String you input in Hex becomes : ".strToHex($id). "<br>";

?>
</center>
</font> 
<div class="botton_fix">For more please visit : <a href="http://www.hiteshchoudhary.com" target="_blank">www.hiteshchoudhary.com</a></div>
</body>
</html>





 
