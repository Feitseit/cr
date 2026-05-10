<?php include("config.php"); ?>

<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🚗 Eesti Autorent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
      /* Jumbotron GIF taust */
      .jumbotron-custom {
          position: relative;
          overflow: hidden;
          color: white;
          padding: 6rem 1rem;
          text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
      }

      .jumbotron-custom::before {
          content: "";
          position: absolute;
          top: 0; left: 0;
          width: 100%; height: 100%;
          background: url('https://media.giphy.com/media/l0MYt5jPR6QX5pnqM/giphy.gif') center center / cover no-repeat;
          opacity: 0.85;  /* veidi läbipaistvust tekstile */
          z-index: 1;
      }

      .jumbotron-content {
          position: relative;
          z-index: 2;  /* tekst üle GIFi */
      }

      /* Kaardid hover */
      .card {
          border-radius: 15px;
          transition: transform 0.3s, box-shadow 0.3s;
      }
      .card:hover {
          transform: translateY(-10px);
          box-shadow: 0 20px 30px rgba(0,0,0,0.3);
      }

      .btn-rent {
          background: linear-gradient(45deg, #ff7e5f, #feb47b);
          border: none;
          transition: transform 0.2s, box-shadow 0.2s;
      }
      .btn-rent:hover {
          transform: scale(1.05);
          box-shadow: 0 8px 15px rgba(0,0,0,0.3);
      }

      .card-img-top {
          transition: transform 0.3s;
      }
      .card:hover .card-img-top {
          transform: scale(1.05);
      }
    </style>
  </head>
  <body>

  <!-- Menüü -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.php">Eesti Autorent 🚗</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Kodu</a></li>
          <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Otsi autot" aria-label="Search"/>
          <button class="btn btn-outline-light" type="submit">Otsi</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- Jumbotron -->
  <div class="jumbotron-custom text-center mb-5">
    <div class="jumbotron-content container">
      <h1 class="fw-bold display-5">🚗 Kiire, Naljakas ja Turvaline Autorent Eestis!</h1>
      <p class="lead">Vali oma auto, klõpsa “Rendi” ja naudi sõitu! 🎉</p>
    </div>
  </div>

  <!-- Sisu -->
  <div class="container mb-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">

    <?php
      $paring = "SELECT * FROM cars LIMIT 8";
      $valjund = mysqli_query($yhendus, $paring);

      while($rida = mysqli_fetch_assoc($valjund)){
    ?>
      <div class="col">
        <div class="card h-100">
          <img src="https://loremflickr.com/400/250/<?php echo $rida['mark']; ?>" class="card-img-top" alt="<?php echo $rida['mark']; ?>">
          <div class="card-body text-center">
            <h5 class="card-title"><?php echo $rida['mark']; ?> <?php echo $rida['model']; ?></h5>
            <p class="mb-1">Aasta: <?php echo $rida['year'] ?? '2023'; ?></p>
            <p class="mb-1">Mootor: <?php echo $rida['engine']; ?></p>
            <p class="mb-1">Kütus: <?php echo $rida['fuel']; ?></p>
            <p class="mb-2 fw-bold">Hind: <?php echo $rida['price']; ?> € / päev</p>
            <a href="single_car.php?id=<?php echo $rida['id']; ?>" class="btn btn-rent w-100">Rendi 🚀</a>
          </div>
        </div>
      </div>
    <?php
      }
    ?>

  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>
