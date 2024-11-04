<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}?>


<h2 class="text-center mt-3">Iba Town Centre Attendance Monitoring Dashboard</h2>
<hr>


<div class="container">
  <div class="row">
  <p>
  <form action="" method="POST">
   <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Logout</button>
  </form>
  </p>
    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Employee Sign Up</h3>
        </div>
        <div class="card-body">
          <a href="register.php"><img src="images/registration.png" alt="register image" width="54%" height="54%"></a>
          <p class="card-text text-muted">ITC Create Employee.</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Employee Time</h3>
        </div>
        <div class="card-body">
          <a href="EmployeeTime.php"> <img src="images/IOP.png" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">ITC Employee Working Hours.</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Admin User Sign Up</h3>
        </div>
        <div class="card-body">
          <a href="adminregister.php"> <img src="images/admin.jpg" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">ITC Administrator Account.</p>
        </div>
      </div>
    </div>

<p>

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Reports</h3>
        </div>
        <div class="card-body">
          <a href="adminreport.php"><img src="images/report.png" alt="register image" width="54%" height="54%"></a>
          <p class="card-text text-muted">ITC Generate Reports.</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Accounts</h3>
        </div>
        <div class="card-body">
          <a href="edit.php"> <img src="images/delete.jpeg" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">ITC Update or Delete Account.</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">About Us</h3>
        </div>
        <div class="card-body">
          <a href="aboutus.php"> <img src="images/info.avif" alt="login image" width="53%" height="53%"></a>
          <p class="card-text text-muted">Information about the system and Developer.</p>
        </div>
      </div>
    </div>

</p>

<p>
    <small class="text-muted" style="font-size: 20px;">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
</p>
</div>