<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src=<?php  echo 'dist/img/'.$profil->image_profil; ?> class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php  echo $profil->nom_profil?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Amis  </span><i class="fa  pull-right"><?php echo $profilmanagement->count_friend($profil);?></i></a> </li>
            <li><a href=Groupe><i class="fa fa-link"></i> <span>Groupe</span></a></li>
            <li class="treeview">
                <a href="Email"><i class="fa fa-link"></i> <span>Emails</span><i class="fa "></i></a><?php echo $profilmanagement->total_message($profil);?>

            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>