//Setup datatable for products
var productsTable, productid;

$(document).ready(function(){
    productsTable = $("#productsTable").DataTable();
    //Click if product is selected
    $("body").on("click touchstart", ".rowClick", function(){
        fillProductForm($(this).attr("data-id"));
    });
    $(".productEdit").on("submit", function(event){
        var form = document.createElement('form');
        form.enctype = "application/x-www-form-urlencoded";

        var formdata = new FormData(form);

        var file = document.getElementById("productPic").files[0];

        if (file) {
            formdata.append("pic", file);
        }

        formdata.append("id", productid);
        formdata.append("name", $("#productName").val());
        formdata.append("description", $("#productDescription").val());
        formdata.append("category", $("#productCategory").val());
        formdata.append("price", $("#productPrice").val());
        formdata.append("btw", $("#productBtw").val());

        $.ajax({
            url: "action/ac_products.php?a=saveProduct",
            method: "POST",
            data: formdata,
            cache:false,
            processData: false,
            contentType: false,
            success: function(ret){
                loadProducts();
                $(".inProductContent").hide();
                $(".normalProductContent").show();
            }
        });
        event.preventDefault();
    });
    $(".productAdd").on("submit", function(event){
        var name = $("#productNameNew").val();
        $.post("action/ac_products.php?a=addProduct", {name: name}, function(ret){
            fillProductForm(JSON.parse(ret));
        });
        event.preventDefault();
    });
    $(".return").on("click touchstart", function(){
        $(".inProductContent").hide();
        $(".normalProductContent").show();
    });
    $(".addProduct").on("click", function(){
        $(".inProductContent").hide();
        $(".addProductContent").show();
    });
    $(".delete").on("click touchstart", function(){
        $.post("action/ac_products.php?a=deleteProduct", {id: productid}, function(ret){
            $(".return").trigger("click");
        });
    });
    loadProducts()
});

function loadProducts(){
    $.ajax({
        url: "action/ac_products.php?a=getProducts",
        method: "POST",
        success: function(ret){
            productsTable
                .clear()
                .draw();

            productsTable
                .rows.add($(ret))
                .draw();
        }
    });
}

function fillProductForm(x){
    var id = x;
    productid = id;
    $.ajax({
        url: "action/ac_products.php?a=getProductData",
        method: "POST",
        data: {id : JSON.stringify(id)},
        success: function(ret){
            var product = JSON.parse(ret);

            updateCategorySelect(function(){
                $("#productCategory").val(product.categoryid);
            });

            $("#productName").val(product.name);
            $("#productDescription").val(product.description);
            $("#productPrice").val(product.price);
            $("#productBtw").val(product.btw);

            if(product.img != null) {
                $("#productImgLive")[0].src = "/files/product/" + product.img;
                $("#productImgLive").show();
            }else{
                $("#productImgLive").hide();
            }

            $(".inProductContent").hide();
            $(".editProductContent").show();
        }
    });
}

function updateCategorySelect(callback){
    $.ajax({
        url: "action/ac_products.php?a=updateCategorySelect",
        method: "POST",
        success: function(ret){
            var cate = JSON.parse(ret);
            $(".productCategory").empty();

            var newCats = "";
            for(var i = 0; i < cate.length; i++){
                var row = cate[i];
                var string = "<option value='"+row.id+"'>"+row.name+"</option>";
                newCats += string;
            }

            $("#productCategory").html(newCats);
            callback();
        }
    });
}