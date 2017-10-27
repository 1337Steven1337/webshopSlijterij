//Setup datatable for products
var productsTable;

$(document).ready(function(){
    productsTable = $("#productsTable").DataTable();
    //Click if product is selected
    $("body").on("click", ".rowClick", function(){
        var id = $(this).attr("data-id");
        $.ajax({
            url: "action/ac_products.php?a=getProductData",
            method: "POST",
            data: {id : JSON.stringify(id)},
            success: function(ret){
                var product = JSON.parse(ret);
                console.log(product);
            }
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