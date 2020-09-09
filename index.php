<!DOCTYPE html>
<html>
<head>
<title>Form site</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
</head>
<body>
  <center>
    <h1>Simple Sign-up page</h1>
    <br>
    <br>
    <div class="dull">
      <br><br>
<form method="post">
  <font size="10px">Name*  :</font> <input type="text" name="name"><br><br>
  <font size="10px">Email-ID* :</font> <input type="text" name="email"><br><br>
<font size="10px">Username* :</font> <input type="text" name="username"><br><br>
<font size="10px">Password* :</font> <input type="password" name="password"><br><br>
<input type="submit" value="Sign-up">
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
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
if(!empty($name)){
if(!empty($email)){
if (!empty($username)){
if (!empty($password)){
$mysqli = new mysqli($host, $dbusername, $dbpassword, $database_in_use);
if ($mysqli->connect_errno) {
    echo "<font color='red'><b>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") </b></font>" . $mysqli->connect_error;
}
$sql = "INSERT INTO account (name,email,username, password)
values ('$name','$email','$username','$password')";
if ($mysqli->query($sql)){
echo "<font color='green'><b>Sign-up Successful</b></font>";
sleep(2);
echo "<a href='login.php'><input type='button' value='Procced to login'></a>"
}
else{
echo "Error: ". $sql ."
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
}
else{
echo "<font color='red'><b>Email id should not be empty</b></font>";
die();
}
}
else{
echo "<font color='red'><b>Name should not be empty</b></font>";
die();
}



?>

</center>
</body>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/7.19.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/7.19.1/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
</html>
<!--$sql1 = "SELECT * FROM account WHERE username='$username' and password='$password'";
$row = mysqli_fetch_array($sql1,MYSQLI_ASSOC);
$active = $row['active'];
$count = mysqli_num_rows($sql1);
if ($count == 1){
  echo "Login Successful";
}
else{
  echo "Login Failed";
}
$mysqli->close();*/-->
