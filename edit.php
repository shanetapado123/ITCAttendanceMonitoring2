<?php session_start();       // Start the session ?>  
<?php include "header.php" ?>
<?php
if (isset($_POST['dashboard'])) {
  //session_destroy();            //  destroys session 
  header('location: admindashboard.php');
}
?>

<?php
if (isset($_POST['logout'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>

<div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">ITC Employee Accounts </h1>
  <hr>
  <form action="" method="POST">
   <button type="submit" name='dashboard' class=" btn btn-primary mb-3">Admin Dashboard</button>
   <button type="button" value="Import as Excel" name='generate' class=" btn btn-success mb-3" onclick="saveAsExcel('tableToExcel', 'ITCActiveEmployee.xls')">Import as Excel</button>
   <button type="submit" name='logout' class=" btn btn-danger mb-3" style="float: right;"> Logout</button>
  </form>
  <script type="text/javascript" src="saveAsExcel.js">

  function myReturn() {
  let text = "Do you want to delete!\n Yes or No.";
  if (confirm(text) == true) {
    text = "You pressed OK!";
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;
  }
  </script>



<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve users data
$sql = "SELECT * FROM employeeid";

// Execute the query
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>

<?php if ($result->num_rows > 0): ?>

  <table id="tableToExcel" class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">EmployeeID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Contact</th>
        <th scope="col">Department</th>
        <th scope="col">Gender</th>
        <th scope="col">Update</th>
      </tr>
    </thead>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["emId"]; ?></td>
                <td><?php echo $row["itc_name"]; ?></td>
                <td><?php echo $row["itc_address"]; ?></td>
                <td><?php echo $row["itc_contact"]; ?></td>
                <td><?php echo $row["itc_department"]; ?></td>
                <td><?php echo $row["itc_gender"]; ?></td>
                <td><a href="editaction.php?user_id=<?php echo $row["emId"]; ?>">Edit</a> | <a href="deleteaction.php?user_id=<?php echo $row["emId"]; ?>">Delete</a>


            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>



 <p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
  </p>
</div>
<?php include "footer.php" ?>