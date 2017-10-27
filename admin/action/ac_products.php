<?php

    include "../include/include.php";

    $action = $_GET["a"];

    if($action == "getProducts"){
        $query = "
        SELECT p.id, p.name, c.name, p.price FROM product AS p
        LEFT JOIN category AS c ON p.categoryid=c.id;
        ";

        $data = selectQuery($query);

        $string = "";
        foreach($data as $row){
             $string .= "
             <tr data-id='$row[0]' class='rowClick'>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>&euro; ".price_format($row[3])."</td>
             </tr>
             ";
        }

        echo $string;
    }elseif($action == "getProductData"){
        $id = json_decode($_POST["id"]);

        $product = selectQuery("
        SELECT p.id, p.categoryid, c.name, p.name, p.description, p.img, p.price, p.btw
        FROM product AS p 
        LEFT JOIN category AS c ON p.categoryid=c.id
        WHERE p.id=?;", array($id));

        echo json_encode($product[0]);
    }