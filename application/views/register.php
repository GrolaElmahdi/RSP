<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Espace Etudiant</b>RSP</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Rejoindre ! </p>
        <?php echo form_open('Auth');?>
        <form action="Auth/profil" method="post" name="rejoindre">
            <div class="form-group has-feedback">
                <input class="form-control" name="nom" placeholder="Nom" type="text">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" name="prenom" placeholder="Prenom" type="text">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Numero inscription" type="text" name="num">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="CNE" type="text" name="cne">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label>Sexe</label>
                <select class="form-control" name="sexe">
                    <option>F</option>
                    <option>H</option>
                </select>
            </div>
            <div class="form-group">
                <label>Profession</label>
                <select class="form-control" name="profession">
                    <option>Etudiant</option>
                    <option>Professeur</option>
                </select>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Email" type="email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Telephone" type="tel" name="telephone">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Adresse" type="text" name="adresse">
                <span class="glyphicon glyphicon-flag form-control-feedback"></span>
            </div>
            <!--
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Password" type="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Retype password" type="password">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            -->
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Register</button>
                </div><!-- /.col -->
            </div>
        </form>


        <a href="" class="text-center">I already have a membership</a>
    </div><!-- /.form-box -->
</div>