<?php

$id_user = $this->session->userdata('id_user');
$role = $this->session->userdata('role');

?>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>

            <li class="<?php if ($this->uri->segment(2) == "kelas") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/kelas')
                                        ?>"><i class="fa fa-building"></i> <span>kelas</span></a></li>


            <li class="<?php if ($this->uri->segment(2) == "layanan") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('admin/layanan')
                                        ?>"><i class="fa fa-tags"></i> <span>Layanan</span></a></li>




            <li class="treeview <?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-user"></i> <span>Manajemen User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "user") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/user') ?>">List User</a></li>
                </ul>
            </li>


            <li class="treeview <?php if ($this->uri->segment(2) == "userl") {
                                    echo "active";
                                } ?>">
                <a href="#"><i class="fa fa-cogs"></i> <span>Konfigurasi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if ($this->uri->segment(2) == "konfigurasi") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi') ?>">General</a></li>

                    <li class="<?php if ($this->uri->segment(2) == "banner") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/banner') ?>">Banner</a></li>

                    <li class="<?php if ($this->uri->segment(2) == "logo") {
                                    echo "active";
                                } ?>"><a href="<?= base_url('admin/konfigurasi/logo') ?>">Logo</a></li>
                </ul>
            </li>




        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">