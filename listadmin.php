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


<h2 class="text-center mt-3">Iba Town Centre Admin User List</h2>
<script type="text/javascript" src="saveAsExcel.js"></script>

<div class="container">

<?php if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve users data
$sql = "SELECT * FROM admin";

// Execute the query
$result = $conn->query($sql);

// Close the connection
$conn->close();

?>

<?php if ($result->num_rows > 0): ?>

  <table id="tableToExcel" class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">UserID</th>
        <th scope="col">Password</th>
        <th scope="col">Created Date</th>
        <th scope="col">Created By</th>
      </tr>
    </thead>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["admin_user"]; ?></td>
                <td><?php echo $row["admin_password"]; ?></td>
                <td><?php echo $row["admin_created"]; ?></td>
                <td><?php echo $row["admin_createdby"]; ?></td>

            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>


<p>
  <form action="" method="POST">
  <button type="submit" name='dashboard' class=" btn btn-primary mb-3" style="float: left;">Report Dashboard</button>
  <button type="button" value="Import as Excel" name='generate' class=" btn btn-success mb-3" onclick="saveAsExcel('tableToExcel', 'ITCAdminUserlist.xls')">Import as Excel</button>
  <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Logout</button>
  </form>
</p>
<p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
</p>
</div>

<?php include "footer.php" ?>