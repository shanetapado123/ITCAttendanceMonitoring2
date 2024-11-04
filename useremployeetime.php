<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

  <div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Employee Working Hours </h1>
  <hr>

  <form action="" method="POST">

  <?php
if (isset($_POST['logout'])) {
  //session_destroy();            //  destroys session 
  header('location: index.php');
}
?>

   <button type="submit" name='logout' class=" btn btn-danger mb-3" style="float: right;"> Logout</button>
  </form>

  <p>
    <small class="text-muted">Name: </small>
    <small> <?php echo $_SESSION['name']; ?> </small>
    <br><small class="text-muted">EmployeeId: </small>
    <small> <?php echo $_SESSION['empId']; ?> </small>

  </p>


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

// SQL query to retrieve users data
$sql = "SELECT * FROM clockinout WHERE itc_date = DATE(NOW()) ";

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
<p>No users found.</p>
<?php
header('location: admindashboard.php'); ?>
<?php endif; ?>



        </div>
      </div>
    </div>
  </div>
</div>

</div>


</div>

<?php include "footer.php" ?>