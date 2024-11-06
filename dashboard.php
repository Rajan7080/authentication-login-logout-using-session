<?php
include('connect.php');
include('header.php');
session_start();
if ($_SESSION['email1']) {
?><div class="container1">
    <div class="row">
      <div class="div">
        <h2 class="text-white mt-3 text-center ">Welcome For Visit : <?php ?><span class="echo"> <?php echo $_SESSION['email1']; ?></span> </h2>
      </div>
      <div class="list">
        <h2 class="text-primary text-center">List For User Visit </h2>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
              <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('connect.php');
          $query = "SELECT * FROM  validations";
          $data = mysqli_query($conn, $query);
          $row = mysqli_num_rows($data);
          if ($row > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
          ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="update.php? id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Edit</button></a></td>
                <td><a href="delete.php? id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>


              </tr>

          <?php
            }
          }

          ?>
        </tbody>
      </table>
      <div class=" main">
        <a href="logout.php">
          <button class=" btn btn-danger text-white btn-outline-danger">Logout</button>
        </a>
        <a href="index.php">
          <button class=" btn btn-primary text-white btn-outline-success">Add user</button>
        </a>
        
      </div>
      </div>
  </div>
<?php
} else {
  echo 'something went wrong ';
  header('location:SignIn.php');
}
?>