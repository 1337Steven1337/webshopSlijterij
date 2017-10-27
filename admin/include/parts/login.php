<div class="container">
    <h2>Administratie Paneel</h2>
    <form class="form-horizontal" action="action/ac_login.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Gebruikersnaam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="Gebruikersnaam" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Wachtwoord:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Wachtwoord" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Inloggen</button>
            </div>
        </div>
    </form>
</div>