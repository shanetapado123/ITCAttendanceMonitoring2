<?php session_start(); ?>
<?php include "header.php" ?>

<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>



<?php

if (isset($_POST['clockout'])) {
  $username = $_POST['empid'];

  $query = "SELECT * from clockinout WHERE emId = '$username'";
  $user = mysqli_query($conn, $query);

  if (!$user) {
    die('query Failed' . mysqli_error($conn));
  }

  while ($row = mysqli_fetch_array($user)) {
    $IDuser = $row['itc_search'];
    $user_id = $row['emId'];

  }
  if ($user_id == $username) {

    $_SESSION['empId'] = $user_id;       // Storing the value in session
    $_GET['uniquecode'] = $IDuser;   // Storing the value in session

    //! Session data can be hijacked. Never store personal data such as Name, Address, Department and Contact Number and other important data in $_SESSION
    
  header('location: dashboard.php?user_id=' . $IDuser);
  } else {
    header('location: login.php');
  }
}

?>

<?php echo $row["itc_search"]; ?>
<form method="POST">

    <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
    <input type="submit" name='clockout' class=" btn btn-danger mb-3" style="float: right;" value="Clock Out"> 
    <input  type="submit" name='clockin' class=" btn btn-success mb-3" style="float: right;"value="Clock In" >
    <button type="submit" name='' class=" btn btn-default mb-3" style="float: right;"> </button>
    <select name="status" style="float: right;" >
      <option>AM</option>
      <option>PM</option>
      </select>


</form>


<div class="container">
  <div class="row">
    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">ITC Employee Login</h3>
        </div>
        <div class="card-body">


<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uniquecode=$_SESSION['uniquecode'];
// SQL query to retrieve users data
$sql = "SELECT * FROM clockinout WHERE itc_search = $uniquecode";

// Execute the query
$result = $conn->query($sql);


// Close the connection
$conn->close();
?>

<?php if ($result->num_rows > 0): ?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table id="tableToExcel" class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
      <tr>
        <th scope="col" rowspan="2">ID</th>
        <th scope="col" rowspan="2">Date</th>
        <th scope="col"colspan="2">AM</th>
        <th scope="col"colspan="2">PM</th>
      </tr>
      <tr>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
      </tr>
      </thead>




        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["itc_search"]; ?></td>
                <td><?php echo $row["itc_date"]; ?></td>
                <td><?php echo $row["itc_amin"]; ?></td>
                <td><?php echo $row["itc_amout"]; ?></td>
                <td><?php echo $row["itc_pmin"]; ?></td>
                <td><?php echo $row["itc_pmout"]; ?></td>

       
            </tr>

        </div>
      </div>
    </div>
  </div>
</div>

<?php endwhile; ?>
</table>
<?php else: ?>
<p>No Working Hours.</p>
<?php
//header('location: dashboard.php'); ?>
<?php endif; ?>



        </div>
      </div>
    </div>
  </div>
</div>

</div>

</div>