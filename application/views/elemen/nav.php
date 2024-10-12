<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url('home/beranda');?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Menu</li><!-- /.menu-title -->
                    <li  class="menu-item">
                        <a href="<?php echo base_url('Profile');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class=""></i> <span>Profil</span>
                        </a>
                    </li>
                    <?php
                    if($this->session->role == 1 OR $this->session->role == 2){
                    ?>
                    <li  class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class=""></i> <span>Tabel Referensi</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url('C_personil');?>">Tabel Personil</a></li>
                            <li><a href="<?php echo base_url('C_jabatan');?>">Tabel Jabatan</a></li>
                            <li><a href="<?php echo base_url('C_pangkat');?>">Tabel Pangkat</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <?php
                    if($this->session->role == 1 OR $this->session->role == 3){
                    ?>
                    <li  class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class=""></i> <span>Master Pranata</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo base_url('C_angka_kredit');?>">Angka Kredit</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                    <li  class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class=""></i> <span>Laporan</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="<?php echo base_url('C_laporan/rekap_personil');?>">Data Personil</a>
                            </li>
                            <?php
                            if($this->session->role == 1 OR $this->session->role == 3){
                            ?>
                            <li>
                                <a href="<?php echo base_url('C_laporan/rekap_angka_kredit');?>">Data Angka Kredit</a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    if($this->session->role == 1){
                    ?>
                    <li  class="menu-item">
                        <a href="<?php echo base_url('User');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class=""></i> <span>Manajemen User</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    
                    <!-- <?php echo $this->base_model->primaryMenu(); ?> -->
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="<?php echo base_url();?>assets/images/logokemhan.png" style="max-width: 45px;" alt="Logo">Pranata Kemhan</a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            $PICTURE = $this->session->picture;
                            if($PICTURE != "" OR $PICTURE != NULL){
                            ?>
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('assets/images/'.$this->session->picture);?>" alt="User Avatar">
                            <?php
                            }else{
                            ?>
                            <img class="user-avatar rounded-circle" src="<?php echo base_url('assets/images/user.png');?>" alt="User Avatar">
                            <?php
                            }
                            ?>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url('user/setting'); ?>"><i class="fa fa- user"></i>Setting</a>
                            <a class="nav-link" href="<?php echo base_url();?>login/logout"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>