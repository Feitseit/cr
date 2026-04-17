<?php
    include("config.php");

     if (!empty($_GET['muuda_id'])) {
         $id = $_GET['muuda_id'];
         $mark = $_GET['mark'];
         $model = $_GET['model'];
         $engine = $_GET['engine'];
         $fuel = $_GET['fuel'];
         $price = $_GET['price'];
         $image = $_GET['image'];


         $paring = "UPDATE cars SET mark = '".$mark."', model = '".$model."', engine = '".$engine."', fuel = '".$fuel."', price = '".$price."', image = '".$image."' WHERE cars.id = ".$id."";
       
        print($paring);
        $valjund = mysqli_query($yhendus, $paring);
        $tulemus =mysqli_affected_rows($yhendus);
            if ($tulemus == 1) {
                header("Location: admin.php");
            }
         }
        
        
        $paring = "SELECT * FROM cars WHERE id=".$_GET['id']."";
        $valjund = mysqli_query($yhendus, $paring);
        $rida = mysqli_fetch_assoc($valjund); 
        print_r($rida);  


       


     
?>
        
<form action="muuda.php" method="get">
    <input type="hidden" name="muuda_id" value="<?php echo $rida['id']; ?>"><br>
    Mark <input type="text" name="mark" value="<?php echo $rida['mark']; ?>"><br>
    Model <input type="text" name="model" value="<?php echo $rida['model']; ?>"><br>
    Engine <input type="text" name="engine" value="<?php echo $rida['engine']; ?>"><br>
    Fuel <input type="text" name="fuel" value="<?php echo $rida['fuel']; ?>"><br>
    Price <input type="text" name="price" value="<?php echo $rida['price']; ?>"><br>
    Image <input type="text" name="image" value="<?php echo $rida['image']; ?>"><br>
    <input type="submit" value="Salvesta auto"><br>


</form>