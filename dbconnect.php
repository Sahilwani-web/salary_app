<?php

$host="localhost";
$user="root";
$password="";
$db="salary";

session_start();


$dbconn=mysqli_connect($host,$user,$password,$db);

if($dbconn===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from users where name='".$username."' AND password='".$password."' ";

	$result=mysqli_query($dbconn ,$sql);


	$row=mysqli_fetch_array($result);

	if($row["usertype"]==0)
	{	

		$_SESSION["username"]=$username;

		header("location:userhome.php");
	}

	elseif($row["usertype"]==1)
	{

		$_SESSION["username"]=$username;
		
		header("location:adminhome.php");
	}

	else
	{
		echo " incorrect username or password ";
	}

}




?>
