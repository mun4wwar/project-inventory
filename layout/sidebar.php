<style>
    .sidebar-content a,
    .sidebar-content span {
        color: #ffffff !important;
        /* Warna teks untuk tautan dan teks umum */
    }

    .nav-primary .nav-item.active a,
    .nav-primary .nav-item a:hover {
        color: #fff;
        /* Warna teks untuk tautan aktif dan tautan saat dihover */
    }

    .nav-primary .nav-section h4 {
        color: #ffffff;
        /* Warna teks untuk judul bagian */
    }
</style>


<div class="sidebar sidebar-style-2" style="background-color: #000;">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/c1.jpeg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            TEKNOLOGI INFORMASI
                            <span class="user-level">Politeknik Negeri Padang</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary --bs-light-text-emphasis">
                <li class="nav-item <?php echo $_GET['p'] == 'home'?'active':''; ?>">
                    <a href="index.php?p=home">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li> 
                <?php if($_SESSION['level']=='admin'){
                        ?>

                <li class="nav-item <?php echo $_GET['p'] == 'jbarang'?'active':''; ?>">
                    <a href="index.php?p=jbarang">
                        <i class="bi bi-box-seam-fill"></i>
                        <p>Barang</p>
                    </a>
                </li>
                </li>
                <li class="nav-item <?php echo $_GET['p'] == 'ruangan'?'active':''; ?>">
                    <a href="index.php?p=ruangan">
                        <i class="bi bi-door-open-fill"></i>
                        <p>Ruangan</p>
                    </a>
                </li>
                <?php }?>
                <li class="nav-item <?php echo $_GET['p'] == 'jpinjam'?'active':''; ?>">
                    <a href="index.php?p=jpinjam">
                        <i class="bi bi-box-arrow-up"></i>
                        <p>Barang Pinjam</p>
                    </a>
                </li>
                <?php if($_SESSION['level']=='admin'){
                        ?>
                <li class="nav-item <?php echo $_GET['p'] == 'barangMasuk'?'active':''; ?>">
                    <a href="index.php?p=barangMasuk">
                        <i class="bi bi-box-arrow-in-down"></i>
                        <p>Barang Masuk</p>

                    </a>
                </li>
                <li class="nav-item <?php echo $_GET['p'] == 'barangMutasi'?'active':''; ?>">
                    <a href="index.php?p=barangMutasi">
                        <i class="bi bi-arrow-down-up"></i>
                        <p>Barang Mutasi</p>

                    </a>
                </li>
                <?php 
                    }
                    ?>
                <li class="nav-item">
                    <a class="btn btn-secondary" href="logout.php">
                        <i class="bi bi-box-arrow-right" style="color:white"></i>
                        <p style="color:white">Log Out</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>