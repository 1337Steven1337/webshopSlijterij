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
             $string .= "<tr data-id='$row[0]' class='rowClick'>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>&euro; ".price_format($row[3])."</td>
</tr>";
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
    }elseif($action == "updateCategorySelect"){
        $cats = selectQuery("SELECT id, name FROM category");
        echo json_encode($cats);
    }elseif($action == "saveProduct"){
        //fileUpload
        if(isset($_FILES["pic"])) {
            $dir = "../../files/product/";
            $filename = basename($_FILES["pic"]["name"]);
            $fileLoc = $dir . $filename;
            if ($_FILES["pic"]["size"] > 2000000) {
                $big = true;
            }else{
                move_uploaded_file($_FILES["pic"]["tmp_name"], $fileLoc);
                Query("UPDATE product SET img=? WHERE id=?", array($filename, $_POST["id"]));
            }
        }

        //validation
        if($_POST["name"]){
            $validate = true;

            Query("UPDATE product SET categoryid=?, name=?, description=?, price=?, btw=? WHERE id=?;",
                array($_POST["category"], $_POST["name"], $_POST["description"], $_POST["price"], $_POST["btw"], $_POST["id"]));
        }

        //error handler
        echo json_encode(0);
    }elseif($action == "addProduct"){
        $name = $_POST["name"];
        if($name){
            Query("INSERT INTO product (name) VALUES (?);", array($name));
        }
        $id = getLastId();
        echo json_encode($id);
    }elseif($action == "deleteProduct"){
        $id = $_POST["id"];
        $file = selectQuery("SELECT img FROM product WHERE id=?", array($id));
        Query("DELETE FROM product WHERE id=?", array($id));
        unlink("../../files/product/" . $file[0][0]);
        echo json_encode(0);
    }




















