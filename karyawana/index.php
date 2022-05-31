<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Login Perusahaanku</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post">
      <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Silakan Login</h1>
      <?php
      session_start();
      if (isset($_SESSION['username'])) {
        header('Location: pages/main.php');
      }

      if (isset($_POST['button_login'])) {
        $loginSQL = "SELECT * FROM pengguna 
          WHERE username='" . $_POST['username'] . "' AND password=MD5('" . $_POST['password'] . "')";
        include_once "database/database.php";

        $database = new Database();
        $connection = $database->getConnection();
        $statement = $connection->prepare($loginSQL);
        $statement->execute();
        $row_count = $statement->rowCount();

        if ($row_count > 0) {
      ?>
          <div class="alert alert-success" role="alert">
            Username/Password sudah benar!
          </div>

        <?php
          $_SESSION['username'] = $_POST['username'];

          header('Location: pages/main.php');
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            Username/Password salah!
          </div>
      <?php
        }
      }
      ?>
      <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="button_login" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
  </main>



</body>

</html>