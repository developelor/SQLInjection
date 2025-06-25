<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Less-1 **Error Based- String**</title>
<link rel="stylesheet" href="../index.html_files/freemind2html.css" type="text/css"/>
</head>

<body>
<div style=" margin-top:70px;color:#FFF; font-size:23px; text-align:center">
  <h1><span class="style1">Welcome </span><font color="#FF0000">to SQL injection Master Course </font></h1>
  <h1><span class="style2">Lesson-1</span></h1>
  <h1><span class="style4">Hint : Error based string</span> <br>
    <font size="3" color="#666666">
      
   <?php
   phpinfo();

// اتصال به دیتابیس (اگه از قبل نیست)
$connection = mysqli_connect("localhost", "root", "", "security");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // لاگ گرفتن از id
    $fp = fopen('result.txt', 'a');
    fwrite($fp, 'ID:' . $id . "\n");
    fclose($fp);

    // اجرای کوئری
    $sql = "SELECT * FROM users WHERE id='$id' LIMIT 0,1";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            echo '<font color= "#0000ff">';
            echo 'Your Login name: ' . $row['username'] . "<br>";
            echo 'Your Password: ' . $row['password'];
            echo '</font>';
        } else {
            echo '<font color="#900">No user found.</font>';
        }
    } else {
        echo '<font color="#900">' . mysqli_error($connection) . '</font>';
    }

    mysqli_close($connection);
} else {
    echo "Please input the ID as parameter with numeric value";
}
?>
                </font> </h1>
</div>
<div class="botton_fix">For more please visit : <a href="http://www.hiteshchoudhary.com" target="_blank">www.hiteshchoudhary.com</a></div>
</br></br></br><center>
</center>
</body>
</html>





 
