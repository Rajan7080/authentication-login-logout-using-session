<?php 
include('connect.php');
include('header.php');
session_start();
if(isset($_SESSION['email1'])){
$id=$_GET['id'];
$query="SELECT * FROM validations WHERE id ='$id'";
$data=mysqli_query($conn,$query);
$row=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
?>
<section class="container shadow-lg mt-5">
  <h1 class="text-primary text-center">Update Profile</h1>
    <div class="row">
        <div class="col-12">
            <div class="main">
            <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" required="" value="<?php echo $result['name'];?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email"  required="" value="<?php echo $result['email'];?>">
</div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="update">update</button>
</form>
<?php 
include('connect.php');
if(isset($_POST['update'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $query="UPDATE validations SET name='$name', email='$email' WHERE id= '$id'";
  $data=mysqli_query($conn,$query);
  if($data){
    header('location:dashboard.php');
  }else{
    header('location:SignIn.php');
  }
}

?>
</div>
</div>
</div>
</section>
<?php
}else{
header('location:SignIn.php');
}
?>
