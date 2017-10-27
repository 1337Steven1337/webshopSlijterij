<div class="container homeContainer content">
    <div class="row">
        <div class="col-md-4 productItem">
            <h2>Captain Morgan Spiced Gold</h2>
            <img width="auto" height="325px" src="/include/img/drank1.jpg">
            <p><a class="btn btn-secondary" href="#" role="button">Meer informatie</a></p>
        </div>
        <div class="col-md-4 productItem">
            <h2>Aberlour</h2>
            <img width="auto" height="325px" src="/include/img/drank2.jpg">
            <p><a class="btn btn-secondary" href="#" role="button">Meer informatie</a></p>
        </div>
        <div class="col-md-4 productItem">
            <h2>The Balvenie</h2>
            <img width="auto" height="325px" src="/include/img/drank3.jpg">
            <p><a class="btn btn-secondary" href="#" role="button">Meer informatie</a></p>
        </div>
    </div>
    <?php
    $products = selectQuery("SELECT name, img FROM product");
    foreach($products as $row){
        
    }
    ?>
</div>