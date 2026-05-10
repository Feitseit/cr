<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

    include("config.php");

    if (!empty($_GET['muuda_id'])) {
        $id = $_GET['muuda_id'];
        $mark = $_GET['mark'];
        $model = $_GET['model'];
        $engine = $_GET['engine'];
        $fuel = $_GET['fuel'];
        $price = $_GET['price'];
        $image = $_GET['image'];

        $paring = "UPDATE cars 
        SET mark = '".$mark."', 
        model = '".$model."',
        engine = '".$engine."',
        fuel = '".$fuel."',
        price = '".$price."',
        image = '".$image."'
        WHERE cars.id = ".$id."";

        $valjund = mysqli_query($yhendus, $paring);
        $tulemus = mysqli_affected_rows($yhendus);
            if ($tulemus == 1) {
                header("Location:admin.php");
            }
        } 
        
        $paring = "SELECT * FROM cars WHERE id=".$_GET['id']."";
        $valjund = mysqli_query($yhendus, $paring);
        $rida = mysqli_fetch_assoc($valjund);
?>
<!doctype html>
<html lang="et">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muuda auto - Auto Rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Muuda auto</h2>
    <form action="muuda.php" method="get" class="card p-4 shadow">
        <input type="hidden" name="muuda_id" value="<?php echo $rida['id']; ?>">
        <input type="text" name="mark" class="form-control mb-3" placeholder="Mark" value="<?php echo $rida['mark']; ?>" required>
        <input type="text" name="model" class="form-control mb-3" placeholder="Model" value="<?php echo $rida['model']; ?>" required>
        <input type="text" name="engine" class="form-control mb-3" placeholder="Engine" value="<?php echo $rida['engine']; ?>" required>
        <input type="text" name="fuel" class="form-control mb-3" placeholder="Fuel" value="<?php echo $rida['fuel']; ?>" required>
        <input type="text" name="price" class="form-control mb-3" placeholder="Price" value="<?php echo $rida['price']; ?>" required>
        <input type="text" name="image" class="form-control mb-3" placeholder="Image" value="<?php echo $rida['image']; ?>">
        <button type="submit" class="btn btn-dark">
            Salvesta auto
        </button>
        <a href="admin.php" class="btn btn-secondary mt-3">
            ← Tagasi
        </a>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>