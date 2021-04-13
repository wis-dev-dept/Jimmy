<?php
session_start();


// initializing variables
$Fname="";
$Lname="";
$Phone="";
$Email="";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost","root","","dbbarber");
// REGISTER USER
if (isset($_POST['reg_user'])) {
  $Fname = mysqli_real_escape_string($db, $_POST["fname"]);
  $Lname = mysqli_real_escape_string($db, $_POST["lname"]);
  $Phone = mysqli_real_escape_string($db, $_POST["phone"]);
  $Email = mysqli_real_escape_string($db, $_POST["email"]);
  $Password_1 = mysqli_real_escape_string($db, $_POST["password_1"]);
  $Password_2 = mysqli_real_escape_string($db, $_POST["password_2"]);
  
  
  
   if (empty($Fname)) {
  	array_push($errors, "First Name is required");
  }
   if (empty($Lname)) {
  	array_push($errors, "Last Name is required");
  }
   if (empty($Phone)) {
  	array_push($errors, "Phone Number is required");
  }
  if (empty($Email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($Password_1)) {
  	array_push($errors, "Password is required");
  }
   if (empty($Password_2)) {
  	array_push($errors, "Confirm Password is required");
  }
  
    if ($Password_1 != $Password_2) {
	array_push($errors, "The two passwords do not match");
	}
	
	
 //Checking User Exists
  $user_check_query = "SELECT * FROM tbcustomer WHERE email='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Email'] === $Email) {
      array_push($errors, "email already exists");
    }
  }
  // No user Exists register the user

  if (count($errors) == 0) {
  	$password = $Password_1;
  	$query = "INSERT INTO tbcustomer(FirstName,LastName,Phone,Email,Password) VALUES('$Fname','$Lname','$Phone','$Email','$password')";
  	 mysqli_query($db, $query);
 
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location:../Login/login.php');
    }
}

?>