<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

<!-- Menüü -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
    <a class="navbar-brand" href="index.php">Auto Rent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    </div>
  </nav>

<!-- Jumboton -->
<?php
$bg = "https://loremflickr.com/1200/400/1194";
?>
<div class="text-white text-center mb-5 py-5"
     style="background-image: url('<?= $bg ?>');
            background-size: cover;
            background-position: center;">

  <div class="container">
    <h1 class="fw-bold">Kiire ja mugav autorent Eestis</h1>
  </div>
</div>

<!-- Sisu -->
  <div class="container">
  <div class="row row-cols-1 row-cols-md-4 g-4">

  <?php
    $paring = "SELECT * FROM cars LIMIT 8";
    $valjund = mysqli_query($yhendus, $paring); // mysql käsu saatmine andmebaasile

    while($rida = mysqli_fetch_assoc($valjund)){
      // var_dump($rida);

  ?>
    <div class="col">
      <div class="card h-100">
        <img src="https://loremflickr.com/400/250/<?php echo $rida['mark']; ?>" class="card-img-top" alt="audi">
        <div class="card-body">
          <h5 class="card-title"><?php echo $rida['mark']; ?></h5>
          <p>Aasta: <?php echo $rida['mark']; ?></p>
          <p>Mootor: <?php echo $rida['engine']; ?></p>
          <p>Kütus:<?php echo $rida['fuel']; ?></p>
          <p>Hind: <?php echo $rida['price']; ?></p>
          <a href="single_car.php" class="btn btn-dark w-100">Rendi</a>
        </div>
      </div>
    </div>
    

    <?php
       }
    ?>
<!-- lõpp -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>