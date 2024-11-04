<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>
<script type="text/javascript" src="saveAsExcel.js"></script>
<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}?>

<?php
if (isset($_POST['dashboard'])) {
  header('location: adminreport.php');
}?>


<h2 class="text-center mt-3">Iba Town Centre Employee List</h2>
<hr>
<script type="text/javascript" src="saveAsExcel.js"></script>

<div class="container">

<?php if ($conn->connect_error) {
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
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>


<p>
  <form action="" method="POST">
  <button type="submit" name='dashboard' class=" btn btn-primary mb-3" style="float: left;">Report Dashboard</button>
  <button type="button" value="Import as Excel" name='generate' class=" btn btn-success mb-3" onclick="saveAsExcel('tableToExcel', 'ITCEmployeelist.xls')">Import as Excel</button>
  <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Logout</button>
  </form>
</p>
<p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
</p>
</div>

<?php include "footer.php" ?>