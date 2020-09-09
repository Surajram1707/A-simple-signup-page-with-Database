<!DOCTYPE html>
<html>
<head>
<title>Form site</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body>
  <center>
    <h1>Login-Page</h1>
    <br>
    <br>
    <div class="dull">
      <br><br>
<form method="post">
<font size="10px">Username* :</font> <input type="text" name="username"><br><br>
<font size="10px">Password* :</font> <input type="password" name="password"><br><br>
<input type="submit" value="Login">
</form>
<br><br>
</div>
<br><br>
<p><b>Note: * marked fields are mandatory</b></p>
<?php

$host = "sql204.epizy.com";
$dbusername = "epiz_26693737";
$dbpassword = "JeCoN6aAZb2PNAX";
$database_in_use = "epiz_26693737_signuppage";

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if (!empty($username)){
if (!empty($password)){
$mysqli = new mysqli($host, $dbusername, $dbpassword, $database_in_use);
if ($mysqli->connect_errno) {
    echo "<font color='red'><b>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") </b></font>" . $mysqli->connect_error;
}
$sqlq1 = "SELECT COUNT(*) as cnt FROM account WHERE username='$username' and password='$password'";
$result = mysqli_query($mysqli,$sqlq1);

$count = mysqli_fetch_assoc($result);
$val = $count['cnt'];
if ($mysqli->query($sqlq1)){
if ($val == 1){
    echo "<font color='green'><b>Login Successful</b></font>";
  echo "<br><a href='index.php'><input type='button' value='Back to signup'></a>";
}
else{
  echo "<font color='red'><b>Login failed</b></font>";
  echo "<br><a href='index.php'><input type='button' value='Back to signup'></a>";
}
}
else{
  echo "Error: ". $sqlq1 ."
  ". $mysqli->error;
}


$mysqli->close();


}
else{
echo "<font color='red'><b>Password should not be empty</b></font>";
die();
}
}
else{
echo "<font color='red'><b>Username should not be empty</b></font>";
die();
}




?>

</center>
</body>
</html>
<!--$sql = "INSERT INTO account (name,email,username, password)
values ('$name','$email','$username','$password')";
if ($mysqli->query($sql)){
echo "<font color='green'><b>Sign-up Successful</b></font>";
sleep(2);
"<a href='login.php'><input type='button' value='Procced to login'></a>";
}-->
