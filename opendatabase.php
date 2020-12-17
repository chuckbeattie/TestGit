<?php
// Inialize session
session_start();
// All the data entered by user stored in variables below
$user = $_REQUEST["name"];
$pass = $_REQUEST["pass"];
// connection variable initialization
$Username = "root";
$Password = "secret";
$connection = mysql_connect("localhost", "Username", "Password")
 or die("Could not connect to the server");
// *************************************
// connecting to database
// database ---  name of database
// table ---   name of table
// *************************************
$db = mysql_select_db("DBNAME", $connection)
 or die("Could not select the database");
$forlogin = "select * from user";
$result = mysql_query($forlogin);
$flag = true;
while ($row = mysql_fetch_array($result)) {
 if ($user == $row['username'] && $pass == $row['password']) {
 $_SESSION['currentuser'] = $user;
 header('Location: /folder1/page-to-goto-if-login-successful.php');
 $flag = false;
 }
}
if ($flag == true)
// echo "Login Un-Successful!!";
header('Location: /folder1/page-to-goto-if-loginunsuccessful.php'?myerror=mismatch');
?>