<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Auto Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-light">

<!-- menüü -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">Auto Rent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="admin.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="d-flex justify-content-end mb-3">
    <a href="lisa.php" class="btn btn-success">+ Lisa auto</a>
  </div>

  <table class="table table-striped table-bordered shadow-sm">
    <thead class="table-dark">
      <tr>
          <td>Mark</td>
          <td>Model</td>
          <td>Engine</td>
          <td>Fuel</td>
          <td>Price</td>
          <td>Image</td>
          <td>Kustuta</td>
          <td>Muuda</td>
      </thead>
      </tr>


<?php

    include("config.php");

    $paring = "SELECT * FROM cars ORDER BY id DESC LIMIT 8";
    $valjund = mysqli_query($yhendus, $paring); // mysql käsu saatmine andmebaasile

    while($rida = mysqli_fetch_assoc($valjund)){
        // var_dump($rida);
        echo"<tr>
            <td>".$rida['mark']."</td>
            <td>".$rida['model']."</td>
            <td>".$rida['engine']."</td>
            <td>".$rida['fuel']."</td>
            <td>".$rida['price']."</td>
            <td>".$rida['image']."</td>
            <td><a href='kustuta.php?id=".$rida['id']."'class='btn btn-sm btn-outline-danger'>Kustuta</a></td>
            <td><a href='muuda.php?id=".$rida['id']."'class='btn btn-sm btn-outline-primary'>Muuda</a></td>

        </tr>";

    }
?>
</table>
</div>

<div class="container mt-2">
  <div class="d-flex flex-md-row justify-content-end gap-3 mb-4">
    <div class="btn-toolbar gap-2">
      <a href="logout.php" class="btn btn-danger">Logi välja</a>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-pjKp1R5Dg8ZDdujoyu4E5H8pG6Feqc8A5Ww7Y1MMtA8PMkK4vY7ZP5vPYyK4vXCd" crossorigin="anonymous"></script>
</body>
</html>
