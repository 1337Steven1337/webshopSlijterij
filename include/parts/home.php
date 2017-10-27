<div class="container homeContainer content">
    <?php
    $products = selectQuery("SELECT name, img FROM product");
    foreach($products as $row)
    {
        if($row["img"] == null){
            $row["img"] = "noimg.jpg";
        }
        echo '
        <div class="col-md-4 productItem">
            <h2>'.$row["name"].'</h2>
            <img width="auto" height="325px" src="/files/product/'.$row["img"].'">
            <p><a class="btn btn-secondary" href="#" role="button">Meer informatie</a></p>
        </div>
        ';
    }
    ?>
</div>