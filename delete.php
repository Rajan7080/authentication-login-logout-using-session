<?php 
include('connect.php');
include('header.php');
$id=$_GET['id'];
$query="SELECT * FROM validations where id='$id'";
$data= mysqli_query($conn,$query);
$row=mysqli_num_rows($data);
$result=mysqli_fetch_assoc( $data );
$delete="DELETE FROM validations WHERE id='$id'";
$data=mysqli_query($conn,$delete);
if($data){
header('location:dashboard.php');
}else{
    echo 'something went wrong';
}

?>