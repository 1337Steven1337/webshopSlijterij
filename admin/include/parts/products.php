<div class="container productsContainer content">
    <div class="inProductContent normalProductContent">
        <table id="productsTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Naam</th>
                    <th>Categorie</th>
                    <th>Prijs</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <button class="btn btn-success addProduct">Toevoegen</button>
    </div>
    <div class="inProductContent editProductContent">
        <form class="form-horizontal productEdit">
            <div class="form-group">
                <label class="control-label col-sm-2" for="productName">Naam:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productName" placeholder="Naam van product">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="productDescription">Bechrijving:</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="productDescription" placeholder="Beschrijving van product" ></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="productCategory">Categorie:</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" id="productCategory">
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="productPic">Foto:</label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        Browse <input type="file" class="form-control" id="productPic" style="display:none;">
                    </label>
                    <img id="productImgLive" src="/files/product/" style="display:none;height:100px;width:auto;">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="productPrice">Prijs (excl btw):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productPrice" placeholder="Prijs van product">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="productBtw">BTW %:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productBtw" placeholder="Btw van product">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="button" class="btn btn-default return">Ga Terug</button>
                    <button type="button" class="btn btn-danger delete pull-right">Verwijder Product</button>
                </div>
            </div>
        </form>
    </div>
    <div class="inProductContent addProductContent">
        <form class="form-horizontal productAdd">
            <div class="form-group">
                <label class="control-label col-sm-2" for="productNameNew">Naam:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="productNameNew" placeholder="Naam van product">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Toevoegen</button>
                    <button type="button" class="btn btn-default return">Ga Terug</button>
                </div>
            </div>
        </form>
    </div>
</div>