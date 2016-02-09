<section class="content">

    <!-- Your Page Content Here -->
    <?php
    //$msg_count = $profilmanagement->count_emails_sent();

    ?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Emails</span>
                <span class="info-box-number"><?php  echo $profilmanagement->total_message($profil) ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-group"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Groupes</span>
                <span class="info-box-number"><?php echo $profilmanagement->count_groupe($profil);?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-comments-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Discussions</span>
                <span class="info-box-number"><?php  echo $profilmanagement->count_discussion($profil);?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->

    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Amis</span>
                <span class="info-box-number"><?php  echo $profilmanagement->count_friend($profil);?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->

    </div>



</section><!-- /.content -->
