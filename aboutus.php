<?php session_start();       // Start the session ?> 
<?php include "header.php" ?>

<?php
if (isset($_POST['dashboard'])) {
  header('location: admindashboard.php');
}?>

<h2 class="text-center mt-3">About Us</h2>
<hr>


<div class="container">
  <div class="row">
  <p>
  <form action="" method="POST">
   <button type="submit" name='dashboard' class=" btn btn-primary mb-3">Admin Dashboard</button>  
  </form>

    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Shane Michael Tapado</h3>
        </div>
        <div class="card-body">
          <a href="https://www.facebook.com/Shnistired.tyd"><img src="images/1.jpeg" alt="register image" width="51%" height="51%" style="border: 4px solid black;"></a>
          <p class="card-text text-muted">Shane Michael D. Tapado</p>
          <p class="card-text text-muted">Course: BSIT - 3B</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">John Anilou Estrada</h3>
        </div>
        <div class="card-body">
          <a href="https://www.facebook.com/profile.php?id=100008949166987"> <img src="images/2.jpeg" alt="login image" width="53%" height="53%" style="border: 4px solid black;"></a>
          <p class="card-text text-muted">John Anilou Q. Estrada</p>
          <p class="card-text text-muted">Course: BSIT - 3B</p>
        </div>
      </div>
    </div>



    <div class="col">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Evann Jewel Avenido</h3>
        </div>
        <div class="card-body">
          <a href="https://www.facebook.com/EvannJewel.Avenido.09"> <img src="images/3.jpeg" alt="login image" width="53%" height="53%" style="border: 4px solid black;"></a>
          <p class="card-text text-muted">Evann Jewel B. Avenido</p>
          <p class="card-text text-muted">Course: BSIT - 3B</p>
        </div>
      </div>
    </div>



<p>
    <small class="text-muted">User: </small>
    <small> <?php echo $_SESSION['AdminId']; ?> </small>
</p>
</div>
<?php include "footer.php" ?>