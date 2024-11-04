<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>
<?php
if (isset($_POST['clockin'])) {

  date_default_timezone_set('Asia/Manila');
  $timestamp = time();
  $am_pm = date('a', $timestamp);
  $status='Clock In';
  $clock=date('h:i:s');
  $cstatus=$am_pm;
  $date=date("Y-m-d");
  $department = $_SESSION['department']; 
  $employeeid = $_SESSION['empId'];
  $name = $_SESSION['name']; 

  $query = "INSERT INTO clockinout(emId,itc_name,itc_status,itc_clock,itc_ampm,itc_department,itc_date) VALUES('{$employeeid}','{$name}','{$status}','{$clock}','{$cstatus}','{$department}','{$date}')";
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    echo "This EmployeeID is already taken!" . mysqli_error($conn);
  } else {
    echo "Not Connected";
    header('location: index.php');
  }
}
?>
<?php
if (isset($_POST['clockout'])) {

  date_default_timezone_set('Asia/Manila');
  $timestamp = time();
  $am_pm = date('a', $timestamp);
  $status='Clock Out';
  $clock=date('h:i:s');
  $cstatus=$am_pm;
  $date=date("Y-m-d");
  $department = $_SESSION['department']; 
  $employeeid = $_SESSION['empId'];
  $name = $_SESSION['name']; 
  $query = "INSERT INTO clockinout(emId,itc_name,itc_status,itc_clock,itc_ampm,itc_department,itc_date) VALUES('{$employeeid}','{$name}','{$status}','{$clock}','{$cstatus}','{$department}','{$date}')";
  $addUser = mysqli_query($conn, $query);

  if (!$addUser) {
    echo "This EmployeeID is already taken!" . mysqli_error($conn);
  } else {
    echo "Not Connected";
    header('location: index.php');
  }
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
 
<h1 class=" mt-3 text-center">Welcome <?php echo $_SESSION['name']; ?>, This is your dashboard!! </h1>
<hr>
        <h1 class=" mt-3 text-center"> <script type="text/javascript">
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
      <div name="clock" id="clock"></div></h1>




<div class="container">
  <div class="row">

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">ITC Employee Login</h3>
        </div>
        <div class="card-body">


       <div id="col">
      
      </div>
        <div id="display-image">
        <?php
        $id=$_SESSION['empId'];

        $query = " SELECT * from employeeid WHERE emId ='$id' ";
        $result = mysqli_query($conn, $query);
        $username = $_POST['adminid'];
        $password = $_POST['adminpassword'];

  $query = "SELECT * from admin WHERE admin_user = '$username'AND admin_password = '$password'";
        while ($data = mysqli_fetch_assoc($result)) {
            ?>
        <img src=
                "./images/<?php echo $data['filename']; ?>">

           <?php
                   }
                    ?>
          </div>
      
      </div>
     </div>
    </div>

<p>
    <div class="col">
      <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
          <h4 class=" mt-3 text-left">Employee ID : <?php echo $_SESSION['empId']; ?></h4>
          <h4 class=" mt-3 text-left">Name:  <?php echo $_SESSION['name']; ?> </h4>
          <h4 class=" mt-3 text-left">Address:  <?php echo $_SESSION['address']; ?> </h4>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
          <h4 class=" mt-3 text-left">Contact:  <?php echo $_SESSION['contact']; ?> </h4>
          <h4 class=" mt-3 text-left">Department:  <?php echo $_SESSION['department']; ?> </h4>
          <h4 class=" mt-3 text-left">Gender:  <?php echo $_SESSION['gender']; ?> </h4>
        </div>
      </div>
    </div>

  </div>

<p>
         <form action="" method="POST">
        <button type="submit" name='signout' class=" btn btn-warning mb-3"style="float: right;"> Sign Out</button>
        <button type="submit" name='clockin' class=" btn btn-success mb-3" style="float: left;"> Clock In</button>
        <button type="submit" name='clockout' class=" btn btn-danger mb-3" style="float: left;"> Clock Out</button>
        </form>
</div>

 <?php include "footer.php" ?>