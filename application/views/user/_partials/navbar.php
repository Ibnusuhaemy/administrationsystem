<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('user') ?>"><?php echo SITE_NAME ?></a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user')?>"  role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-home"></i><span>   Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user/masuk')?>"  role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-envelope-open"></i><span>   Surat Masuk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('user/keluar')?>"  role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-envelope"></i><span>   Surat Keluar</span>
            </a>
        </li>
    </ul>
    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i> <?php echo $this->session->userdata('username')?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="<?php echo site_url('login_view')?>" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>
    </form>

    <!-- Navbar -->
    

</nav>