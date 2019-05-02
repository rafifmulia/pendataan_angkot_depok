<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
         <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        </li>
        <?php 
        switch ($this->session->username) {
        	case 'hrd':
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Olah Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('olah_data/juragan') ?>"><i class="fa fa-user"></i> Juragan</a></li>
            <li><a href="<?php echo base_url('olah_data/supir') ?>"><i class="fa fa-user"></i> Supir</a></li>
          </ul>
        </li>
        <?php
        	break;
        	case 'sekretaris':
        ?>
        <li class="treeview">
         <li><a href="<?php echo base_url('pendataan/juragan') ?>"><i class="fa fa-database"></i> <span>Data Juragan</span></a></li>
        </li>
        <li class="treeview">
         <li><a href="<?php echo base_url('olah_data/angkot') ?>"><i class="fa fa-cog"></i> <span>Pengolahan Angkot</span></a></li>
        </li>
        <?php
        	break;
        	case 'dishub':
        ?>
        <li class="treeview">
         <li><a href="<?php echo base_url('pendataan/angkot') ?>"><i class="fa fa-database"></i> <span>Data Angkot</span></a></li>
        </li>
        <li class="treeview">
         <li><a href="<?php echo base_url('olah_data/rute') ?>"><i class="fa fa-map"></i> <span>Peruteaan</span></a></li>
        </li>
        <?php
        	break;
        	case 'manager':
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Pendataan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pendataan/supir') ?>"><i class="fa fa-user"></i> Data Supir</a></li>
            <li><a href="<?php echo base_url('pendataan/angkot') ?>"><i class="fa fa-cog"></i> Data Angkot</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ul"></i>
            <span>Penugasan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('olah_data/jadwal') ?>"><i class="fa fa-list-ul"></i> Penjadwalan</a></li>
            <li><a href="<?php echo base_url('olah_data/penggunaan') ?>"><i class="fa fa-list-ul"></i> Penggunaan Angkot</a></li>
          </ul>
        </li>
        <?php
       		break;
       		case 'admin':
       	?>
       	<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Olah Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('olah_data/juragan') ?>"><i class="fa fa-user"></i> Juragan</a></li>
            <li><a href="<?php echo base_url('olah_data/supir') ?>"><i class="fa fa-user"></i> Supir</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Pendataan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pendataan/supir') ?>"><i class="fa fa-database"></i> Supir</a></li>
            <li><a href="<?php echo base_url('pendataan/angkot') ?>"><i class="fa fa-database"></i> Angkot</a></li>
            <li><a href="<?php echo base_url('pendataan/juragan') ?>"><i class="fa fa-database"></i> Juragan</a></li>
          </ul>
        </li>
        <li class="treeview">
         <li><a href="<?php echo base_url('olah_data/angkot') ?>"><i class="fa fa-cog"></i> <span>Pengolahan Angkot</span></a></li>
        </li>
        <li class="treeview">
         <li><a href="<?php echo base_url('olah_data/rute') ?>"><i class="fa fa-map"></i> <span>Perutean</span></a></li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ul"></i>
            <span>Penugasan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('olah_data/jadwal') ?>"><i class="fa fa-list-ul"></i> Penjadwalan</a></li>
            <li><a href="<?php echo base_url('olah_data/penggunaan') ?>"><i class="fa fa-list-ul"></i> Penggunaan Angkot</a></li>
          </ul>
        </li>
       	<?php
       		break;
    	}
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>