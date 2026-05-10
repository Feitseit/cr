<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
    include("config.php");

    if (!empty($_GET)) {
        $mark = $_GET['mark'];
        $model = $_GET['model'];
        $engine = $_GET['engine'];
        $fuel = $_GET['fuel'];
        $price = $_GET['price'];
        $image = $_GET['image'];

        $paring = "INSERT INTO cars (mark, model, engine, fuel, price, image) 
        VALUES ('".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$image."')";

        $valjund = mysqli_query($yhendus, $paring);
        $tulemus = mysqli_affected_rows($yhendus);
        if ($tulemus == 1) {
            header("Location:admin.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa auto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Lisa uus auto</h2>
    <form action="lisa.php" method="get" class="card p-4 shadow">
        <input type="text" name="mark" class="form-control mb-3" placeholder="Mark" value="ford" required>
        <input type="text" name="model" class="form-control mb-3" placeholder="Model" value="focus" required>
        <input type="text" name="engine" class="form-control mb-3" placeholder="Engine" value="v8" required>
        <input type="text" name="fuel" class="form-control mb-3" placeholder="Fuel" value="bensiin" required>
        <input type="text" name="price" class="form-control mb-3" placeholder="Price" value="100" required>
        <input type="text" name="image" class="form-control mb-3" placeholder="Image" value="ford.jpg">
        <button type="submit" class="btn btn-dark">
            Lisa auto
        </button>
        <a href="admin.php" class="btn btn-secondary mt-3">
            ← Tagasi
        </a>
    </form>
</div>

</body>
</html>