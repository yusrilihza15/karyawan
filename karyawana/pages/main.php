<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/karyawan">';
}

if(isset($_POST['button_logout'])){
  session_destroy();
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/karyawan">';
}

?>
<!doctype html>
<html lang="en">

<?php 
include "Components/head.php";
include_once "../database/database.php";
?>

<body>

    <?php include "Components/header.php" ?>

  <div class="container-fluid">
    <div class="row">
      
         <?php include "Components/nav.php" ?>

        <?php include "routes.php" ?>
     </div>
  </div>

  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>