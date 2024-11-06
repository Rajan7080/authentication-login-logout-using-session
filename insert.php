<?php
 include('connect.php');

if(isset($_POST['SignUp'])){
$username=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
 $query="INSERT INTO validations (name ,email, password) VALUES('$username','$email','$password')";
$data=mysqli_query($conn,$query);
if($data){
header('location:SignIn.php');
}else{
    echo'something went wrong';
}
}
?>