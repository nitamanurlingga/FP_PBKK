<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url(); ?>assets/img/navbar-logo.svg" /></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button> -->
        <a href="#"><img src="https://fontmeme.com/permalink/200515/3d7ff7f575e50cef8b5c716fe025b052.png" alt="calligraphy-fonts" border="0"></a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#"><button type="button" class="btn btn-warning">Login</button></a></li> -->
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li> -->
            </ul>
            <!-- <a class="nav-link js-scroll-trigger" href="#"><button type="button" class="btn btn-warning"><?= $user['name'] ?></button></a></li> -->
            <!-- dropdown -->
            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $user['name'] ?>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('verifikasi'); ?>">List User</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>