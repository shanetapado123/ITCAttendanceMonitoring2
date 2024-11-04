<?php session_start();       // Start the session ?>  
<?php include "header.php" ?>

<?php
  $id = $_GET['user_id'];
  $query = "SELECT * from clockinout WHERE emId = '$id' AND itc_date = DATE(NOW()) ";
  $user = mysqli_query($conn, $query);
  if (!$user) {
    die('query Failed' . mysqli_error($conn));
      }
  while ($row = mysqli_fetch_array($user)) {
  $user_id = $row['emId'];
  $unique_id=$row['itc_search'];
  $status=$row['itc_clock'];
 
  }
?>

<?php
if (!isset($_SESSION['empId'])) {         // condition Check: if session is not set. 
  header('location: login.php');   // if not set the user is sendback to login page.
}
?>

<?php
if (isset($_POST['signout'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}
?>

<div class="container col-12 border rounded mt-3">
  <h1 class=" mt-3 text-center">Welcome, This is your dashboard!! </h1>
  <hr>
  <h2> <?php echo $_SESSION['name']; ?> </h2>
  <h3> <script type="text/javascript">
        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('clock').innerHTML = strTime;
        }
        setInterval(updateClock, 1000);
        </script>
      </head>
      <body onload="updateClock()">
      <div name="clock" id="clock"></div></h3>
  <table class="table table-striped table-bordered table-hover">
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
    <tbody>
      <tr>

        <td> <?php echo $_SESSION['empId']; ?></td>
        <td> <?php echo $_SESSION['name']; ?></td>
        <td> <?php echo $_SESSION['address']; ?></td>
        <td> <?php echo $_SESSION['contact']; ?></td>
        <td> <?php echo $_SESSION['department']; ?></td>
        <td> <?php echo $_SESSION['gender']; ?></td>
      </tr>
    </tbody>
  </table>




<form method="POST">

    <button type="submit" name='signout' class=" btn btn-warning mb-3"> Sign Out</button>
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
$id = $_GET['user_id'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve users data
$sql = "SELECT * FROM clockinout WHERE emId='$id' AND itc_date = DATE(NOW()) ";

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
        <th scope="col" rowspan="2">Shift</th>
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
                <td><?php echo $row["itc_clock"]; ?></td>
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

<?php include "footer.php" ?>

