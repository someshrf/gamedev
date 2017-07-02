<!DOCTYPE html>
<html>
 <head>
   <link rel="stylesheet" type="text/css" href="style.css"> 
 </head>
<body>
  
<?php
// Enter your Host, username, password, database below.
session_start();
$username="";

$errors=array();

$db = mysqli_connect('localhost','root','','registration');
// Check connection
if(isset($_POST['register'])){
	
  	$username = mysqli_real_escape_string($db, $_POST['username']);
  
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']); 
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    $password = md5($password_1);
  
    if(empty($username)) {
    	array_push($errors,"username is required");
    }
    if(empty($password_1)) {
    	array_push($errors,"Password is required");
    }
    if($password_1 != $password_2) {
    	array_push($errors,"passwords do not match");
    }
  
   if(empty($errors)) {
  	$sql = "INSERT INTO users (username,password,type) VALUES ('$username','$password','student')";
  	mysqli_query($db,$sql);
    ?>
    <p style="color:green;">Registered Successfully</p>
<?php
    }
}

//add notes
if(isset($_POST['addnote'])) {

  $note1 = mysqli_real_escape_string($db, $_POST['note']);

   if($note1) {
    $sql = "INSERT INTO notes (texts) VALUES ('$note1')";
    mysqli_query($db,$sql);
    }
}

//delete notes
if(isset($_POST['delnote'])) {

  $note1 = mysqli_real_escape_string($db, $_POST['nos']);

   if($note1) {
    $sql = "DELETE FROM notes WHERE id='$note1'";
    mysqli_query($db,$sql);
    }
}

//make admin
if(isset($_POST['useradm'])) {

  $note1 = mysqli_real_escape_string($db, $_POST['useradmin']);

   if($note1) {
    $sql = "UPDATE notes set type ='prof' WHERE id='$note1'";
    mysqli_query($db,$sql);
    }
}

//login
if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

   if(empty($username)) {
      array_push($errors,"username is required");
    }
    
   if(empty($username)) {
      array_push($errors,"username is required");
    }
   
  if (count($errors)==0) {
    $password=md5($password);
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result=mysqli_query($db,$query);
      $row = $result->fetch_assoc();
      //echo $row["id"];
     if(mysqli_num_rows($result)==1){
      $_SESSION['username']=$username;
      $_SESSION['success']="You are logged in";
      header('location:index1.php');
      $_SESSION['post']= $row["type"];
    }else{
      array_push($errors,"wrong combination");
    } 

  }

}

//logout
 if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');

 }

?>

 </body>
</html>
