

<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Espace Etudiant</b>RSP</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Creation de Profil </p>
        <?php echo form_open('Profil');?>
        <form action="" method="post" name="profil">
            <div class="form-group has-feedback">
                <input class="form-control" name="nom" placeholder="Nom" type="text">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" name="email" placeholder="Email" type="email">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label>Profession</label>
                <select class="form-control" name="profession">
                    <option>Etudiant</option>
                    <option>Professeur</option>
                </select>
            </div>
            <div class="form-group">
                <label>Sexe</label>
                <select class="form-control" name="sexe">
                    <option>F</option>
                    <option>H</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input id="exampleInputFile" type="file" name="image">
                <p></p>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
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
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Creer</button>
                </div><!-- /.col -->
            </div>
        </form>



    </div><!-- /.form-box -->

</div>