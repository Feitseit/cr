<?php
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
            header("Location: admin.php");

        }


    }
?>
        
<form action="lisa.php" method="get">
    Mark <input type="text" name="mark" value="Ford"><br>
    Model <input type="text" name="model" value="Focus"><br>
    Engine <input type="text" name="engine" value="V8"><br>
    Fuel <input type="text" name="fuel" value="bensiin"><br>
    Price <input type="text" name="price" value="1500"><br>
    Image <input type="text" name="image" value="ford.jpg"><br>
    <input type="submit" value="Lisa auto" value="ford"><br>


</form>