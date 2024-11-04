<?php session_start();       // Start the session ?>  
<?php include "header.php" ?>
<script type="text/javascript" src="saveAsExcel.js"></script>
<?php
if (isset($_POST['cancel'])) {
  session_destroy();            //  destroys session 
  header('location: index.php');
}?>

<?php
if (isset($_POST['listemployee'])) {
  header('location: listemployee.php');
}?>

<?php
if (isset($_POST['dashboard'])) {
  header('location: admindashboard.php');
}?>

<?php
if (isset($_POST['listadmin'])) {
  header('location: listadmin.php');
}?>


<h2 class="text-center mt-3">Iba Town Centre Reports</h2>
<hr>

<div class="container">

  <form action="" method="POST">
  <div class="row">
  <p>
    <button type="submit" name='dashboard' class=" btn btn-primary mb-3" style="float: left;">Admin Dashboard</button>
   <button type="submit" name='cancel' class=" btn btn-danger mb-3" style="float: right;">Logout</button>
  </p>
    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">List of ITC Employee</h3>
        </div>
        <div class="card-body">
          <a href="listemployee.php"><img src="images/listemployee.png" alt="register image" width="25%" height="25%"></a>
          <p class="card-text text-muted">Generate ITC Employee.</p>
          <button type="listemployee" name='listemployee' class=" btn btn-success mb-3" style="float: left;">Generate</button>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">List of ITC Admin Users</h3>
        </div>
        <div class="card-body">
          <a href="listadmin.php"> <img src="images/listadmin.png" alt="login image" width="25%" height="25%"></a>
          <p class="card-text text-muted">Generate ITC Admin Users.</p>
          <button type="listadmin" name='listadmin' class=" btn btn-success mb-3" style="float: left;">Generate</button>
        </div>
      </div>
    </div>
  </form>

  <p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
  </p>
</div>

<?php include "footer.php" ?>