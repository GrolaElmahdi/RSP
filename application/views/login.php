<div class="content-header">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Espace Etudiant</b>RSP</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Authentification</p>
        <?php echo form_open('Login');?>
        <form action="home" method="post">
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Email" type="email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Password" type="password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">

                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Connecter</button>
                </div><!-- /.col -->
            </div>
        </form>



        <a href="Auth" class="text-center">Rejoindre !</a>

        </div><!-- /.login-box-body -->
    </div>
    <div class="content">

    </div>
</div>