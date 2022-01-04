<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?home=home">Trang chủ</a>
          </li>
        </ul>
        </li>
        </ul>
        <?php if ((isset($_SESSION["user"]))) : ?>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
             <?= $_SESSION["user"]->name; ?>
            </button>
            <ul class="dropdown-menu btn btn-dark" style="background:black" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" style="color:white" href="index.php?users=show&&id=<?= $_SESSION["user"]->id;  ?>">Trang cá nhân</a></li>
              <li><a class="dropdown-item" style="color:white" href="index.php?home=logout">Đăng xuất</a></li>
            </ul>
          </div>
        <?php else : ?>
          <li class="d-flex">
            <a class="nav-link brand" style="color:white" href="index.php?users=login">Đăng nhập</a>
            <a class="nav-link brand" style="color:white" href="index.php?users=register">Đăng kí</a>
          </li>
        <?php endif; ?>
      </div>
    </div>
  </nav>