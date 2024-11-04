<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

  <div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Employee Working Hours </h1>
  <hr>
  <script type="text/javascript" src="saveAsExcel.js"></script>

  <form action="" method="POST">
   <button type="submit" name='dashboard' class=" btn btn-primary mb-3">Admin Dashboard</button>
   <button type="button" value="Import as Excel" name='generate' class=" btn btn-success mb-3" onclick="saveAsExcel('tableToExcel', 'EmployeeWorkingHours.xls')">Import as Excel</button>
    
   <button type="submit" name='logout' class=" btn btn-danger mb-3" style="float: right;"> Logout</button>
   <input type="searchid" class="form-control" id="EmpId" name="searchid" placeholder="Search" autocomplete="off">
   <button type="submit" name='search' class=" btn btn-success mb-3"style="float: right;">Filter</button>
   <small class="text-muted">Filter: Employee ID, Name, Date, Department</small>
  </form>




<?php
if (isset($_POST['dashboard'])) {
  //session_destroy();            //  destroys session 
  header('location: admindashboard.php');
}
?>

<?php
if (isset($_POST['logout'])) {
  //session_destroy();            //  destroys session 
  header('location: index.php');
}
?>

<?php


// SQL query to retrieve users data
$sql = "SELECT * FROM clockinout";

// Execute the query
$result = $conn->query($sql);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['search'])) {
$keyword=$_POST['searchid'];

// SQL query to retrieve users data
$sql = "SELECT * FROM clockinout WHERE emId LIKE '%$keyword%' OR itc_name LIKE '%$keyword%'OR itc_date LIKE '%$keyword%'OR itc_department LIKE '%$keyword%'";

// Execute the query
$result = $conn->query($sql);


// Close the connection
$conn->close();}

?>

<?php if ($result->num_rows > 0): ?>

  <table id="tableToExcel" class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col"rowspan="2">EmployeeID</th>
        <th scope="col"rowspan="2">Name</th>
        <th scope="col"rowspan="2">Date</th>
        <th scope="col"rowspan="2">Shift</th>
        <th scope="col"rowspan="2">Department</th>
        <th scope="col"colspan="2">AM</th>
        <th scope="col"colspan="2">PM</th>
        </tr>
      <tr>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
        <th scope="col">IN</th>
        <th scope="col">OUT</th>
      </tr>
      </tr>
    </thead>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["emId"]; ?></td>
                <td><?php echo $row["itc_name"]; ?></td>
                <td><?php echo $row["itc_date"]; ?></td>
                <td><?php echo $row["itc_clock"]; ?></td>
                <td><?php echo $row["itc_department"]; ?></td>
                <td><?php echo $row["itc_amin"]; ?></td>
                <td><?php echo $row["itc_amout"]; ?></td>
                <td><?php echo $row["itc_pmin"]; ?></td>
                <td><?php echo $row["itc_pmout"]; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No users found.</p>
      <?php
  // header('location: admindashboard.php'); ?>
<?php endif; ?>

  <p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
</p>
  </div>
<?php include "footer.php" ?>