<!-- Navbar Header -->
<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" style="background-color: #000;">		
		<a href="index.html" class="logo">

		</a>
		<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon">
				<i class="icon-menu"></i>
			</span>
		</button>
		<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
		<div class="nav-toggle">
			<button class="btn btn-toggle toggle-sidebar">
				<i class="icon-menu"></i>
			</button>
		</div>
	</div>
	<!-- End Logo Header -->
	<nav class="navbar navbar-header navbar-expand-lg" style="background-color: #000;">
        <div class="container-fluid">
            <div class="navbar-nav ml-auto">
                <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: #fff;">
                                    <?php echo $_SESSION['username']; ?>
                                </span>
                                <i class="bi bi-person-fill" style="color: white"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Anda sebagai <?php echo $_SESSION['level']; ?></a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-info"><?php echo $_SESSION['username']; ?></button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Anda sebagai <?php echo $_SESSION['level']; ?></a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Log out</a></li>
                        </ul>
                    </div> -->
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>