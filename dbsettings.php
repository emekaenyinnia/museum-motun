<?php
error_reporting('E_ALL');
date_default_timezone_set('Africa/Lagos');

session_start(); 


$site_url ='http://localhost/museum/';

$site_name ='Museum';


$site_motto ='Beyond Your Imagination';





$dbuser="root";
$dbname="museum_db"; 
$dbpass="";
$conn = new mysqli("localhost", "$dbuser", "$dbpass", "$dbname");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
$check_for_user=$conn->query("SELECT * from tbl_users where user_id='$user_id'");
$check_user_signin_row=$check_for_user->fetch_assoc();
$_SESSION['fullname'] = $check_user_signin_row['surname'].' '.$check_user_signin_row['firstname'];
$_SESSION['type'] = $check_user_signin_row['type'];
$_SESSION['surname'] = $check_user_signin_row['surname'];
$_SESSION['firstname'] = $check_user_signin_row['firstname'];
$_SESSION['phone'] = $check_user_signin_row['phone'];
$_SESSION['email'] = $check_user_signin_row['email'];

}

?>












