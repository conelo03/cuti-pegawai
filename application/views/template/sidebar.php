<?php
$id_user = $this->session->userdata('user_id');
$id_pegawai = $this->session->userdata('pegawai_id');
$id_jabatan   = $this->session->userdata('jabatan_id');
if(!is_staf()){
  if($id_jabatan == '1'){
    $notifikasi_cuti  = $this->M_cuti->get_by_pejabat($id_pegawai)->num_rows();
    $notifikasi_izin  = $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
  } elseif($id_jabatan == '2'){
    $notifikasi_cuti  = $this->M_cuti->get_by_pejabat($id_pegawai)->num_rows();
    $notifikasi_izin  = $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
  } else {
    $notifikasi_cuti  = $this->M_cuti->get_by_atasan_langsung($id_pegawai)->num_rows();
    $notifikasi_izin  = $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
  }
} elseif(is_admin()){
  $notifikasi_cuti  = $this->db->get_where('cuti', ['cuti_status', 0])->num_rows();
  $notifikasi_izin  = $this->M_izin->get_by_atasan_langsung($id_pegawai)->num_rows();
}
//var_dump($id_pegawai);
//die();
$get_user = $this->db->select('*')->from('pegawai')->join('pengguna','pengguna.pegawai_id=pegawai.pegawai_id')->where('pegawai.pegawai_id', $id_pegawai)->get()->row_array();
?>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-auto">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <?php if(!is_staf()): ?>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i>
            <?php if($notifikasi_izin == '0' && $notifikasi_cuti == '0'): ?>

            <?php elseif($notifikasi_izin == '0' && $notifikasi_cuti > '0'): ?>
              <span class="badge badge-warning navbar-badge">1</span>
            <?php elseif($notifikasi_izin > '0' && $notifikasi_cuti == '0'): ?>
              <span class="badge badge-warning navbar-badge">1</span>
            <?php elseif($notifikasi_izin > '0' && $notifikasi_cuti > '0'): ?>
              <span class="badge badge-warning navbar-badge">2</span>
            <?php endif;?>
          </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <?php if($notifikasi_izin == '0' && $notifikasi_cuti == '0'): ?>

                <?php elseif($notifikasi_izin == '0' && $notifikasi_cuti > '0'): ?>
                  <a href="<?= base_url('data-cuti');?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?= $notifikasi_cuti?></b> pegawai melakukan Pengajuan Cuti
                      <div class="time">Klik untuk melihat detail.</div>
                    </div>
                  </a>
                  
                <?php elseif($notifikasi_izin > '0' && $notifikasi_cuti == '0'): ?>
                  <a href="<?= base_url('data-izin');?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?= $notifikasi_izin?></b> pegawai melakukan Pengajuan Izin Keluar Kantor
                      <div class="time">Klik untuk melihat detail.</div>
                    </div>
                  </a>
                <?php elseif($notifikasi_izin > '0' && $notifikasi_cuti > '0'): ?>
                  <a href="<?= base_url('data-cuti');?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?= $notifikasi_cuti?></b> pegawai melakukan Pengajuan Cuti
                      <div class="time">Klik untuk melihat detail.</div>
                    </div>
                  </a>
                  <a href="<?= base_url('data-izin');?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b><?= $notifikasi_izin?></b> pegawai melakukan Pengajuan Izin Keluar Kantor
                      <div class="time">Klik untuk melihat detail.</div>
                    </div>
                  </a>
                <?php endif;?>
              </div>
              <div class="dropdown-footer text-center">
                <?php if($notifikasi_izin == '0' && $notifikasi_cuti == '0'):?>
                Tidak ada notifikasi
                <?php endif;?>
              </div>
            </div>
          </li>
          <?php else: ?>
          <?php endif; ?>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <?php if($get_user['pegawai_foto_profil'] == NULL || $get_user['pegawai_foto_profil'] == 'user.png'): ?>
              <img alt="image" src="<?= base_url('assets/img/profile/user.png'); ?>" class="rounded-circle mr-1">
            <?php else:?>
              <img alt="image" src="<?= base_url('assets/img/profile/'.$get_user['pegawai_foto_profil']); ?>" class="rounded-circle mr-1">
            <?php endif;?>
            <div class="d-sm-none d-lg-inline-block"><?= $get_user['pegawai_nama_lengkap'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('profil-pegawai');?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?= base_url('update-profil');?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon text-danger" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </nav>

      <?php if(is_admin()):?>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">E-ICUT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">EIC</a>
          </div>
          <?php
            $judul = explode(' ', $title);
          ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-circle"></i> <span>Dashboard</span></a></li>  
            <li class="<?= $title == 'Profil Pegawai' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('profil-pegawai');?>"><i class="fas fa-circle"></i> <span>Profil Pegawai</span></a></li>   

            <li class="menu-header">Data Cuti & Izin</li>

            <li class="nav-item dropdown <?= $title == 'Pengajuan Cuti' || $title == 'Data Pengajuan Cuti' || $title == 'Verifikasi Pengajuan Cuti' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-circle"></i><span>Pengajuan Cuti</span></a>
              <ul class="dropdown-menu">
                <li class=" <?= $title == 'Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('cuti');?>">Pengajuan Cuti Saya</a></li>
                <li class=" <?= $title == 'Verifikasi Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('verifikasi-cuti');?>">Verifikasi Pengajuan Cuti</a></li>
                <li class=" <?= $title == 'Data Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('data-cuti');?>">Data Pengajuan Cuti</a></li>
              </ul>
            </li>
            <li class="<?= $title == 'Riwayat Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('riwayat-cuti');?>"><i class="fas fa-circle"></i> <span>Riwayat Pengajuan Cuti</span></a></li>
            <li class="nav-item dropdown <?= $title == 'Data Izin Saya' || $title == 'Data Izin Keluar Kantor' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-circle"></i><span>Izin Keluar Kantor</span></a>
              <ul class="dropdown-menu">
                <li class=" <?= $title == 'Data Izin Saya' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('izin');?>">Data Izin Saya</a></li>
                <li class=" <?= $title == 'Data Izin Keluar Kantor' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('data-izin');?>">Data Izin Keluar Kantor</a></li>
              </ul>
            </li> 

            <li class="menu-header">Data Master</li>        
            <li class="nav-item dropdown <?= $title == 'Kelola Pengguna' || $title == 'Kelola Pegawai' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-circle"></i><span>Master User</span></a>
              <ul class="dropdown-menu">
                <li class=" <?= $title == 'Kelola Pengguna' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('user');?>">Kelola Pengguna</a></li>
                <li class=" <?= $title == 'Kelola Pegawai' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('pegawai');?>">Kelola Pegawai</a></li>
              </ul>
            </li>
            <li class="<?= $title == 'Kelola Jabatan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('jabatan');?>"><i class="fas fa-circle"></i> <span>Kelola Jabatan</span></a></li>

            <li class="<?= $title == 'Kelola idang' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('bidang');?>"><i class="fas fa-circle"></i> <span>Kelola Bidang</span></a></li>

            <li class="<?= $title == 'Kelola Golongan' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('golruang');?>"><i class="fas fa-circle"></i> <span>Kelola Golongan</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      <?php elseif(is_pegawai()):?>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">E-ICUT</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">EIC</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="<?= $title == 'Dashboard' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('dashboard');?>"><i class="fas fa-circle"></i> <span>Dashboard</span></a></li>  
            <li class="<?= $title == 'Profil Pegawai' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('profil-pegawai');?>"><i class="fas fa-circle"></i> <span>Profil Pegawai</span></a></li>    

            <li class="menu-header">Data Cuti & Izin</li>

            <?php if(is_staf()):?>
            <li class="<?= $title == 'Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('cuti');?>"><i class="fas fa-circle"></i> <span>Pengajuan Cuti Saya</span></a></li> 
            <li class="<?= $title == 'Izin Keluar Kantor' || $title == 'Data Izin Saya' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('izin');?>"><i class="fas fa-circle"></i> <span>Data Izin Keluar Kantor</span></a></li>  

            <?php else:?>
            <li class="nav-item dropdown <?= $title == 'Pengajuan Cuti' || $title == 'Data Pengajuan Cuti' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-circle"></i><span>Pengajuan Cuti</span></a>
              <ul class="dropdown-menu">
                <li class=" <?= $title == 'Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('cuti');?>">Pengajuan Cuti Saya</a></li>
                <li class=" <?= $title == 'Data Pengajuan Cuti' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('data-cuti');?>">Data Pengajuan Cuti</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= $title == 'Data Izin Saya' || $title == 'Data Izin Keluar Kantor' ? 'active' : ''; ?>">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-circle"></i><span>Izin Keluar Kantor</span></a>
              <ul class="dropdown-menu">
                <li class=" <?= $title == 'Data Izin Saya' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('izin');?>">Data Izin Saya</a></li>
                <li class=" <?= $title == 'Data Izin Keluar Kantor' ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url('data-izin');?>">Data Izin Keluar Kantor</a></li>
              </ul>
            </li>
            <?php endif;?>

          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <button class="btn btn-danger btn-lg btn-block btn-icon-split" data-confirm="Logout|Anda yakin ingin keluar?" data-confirm-yes="document.location.href='<?= base_url('logout'); ?>';"><i class="fa fa-sign-out-alt"></i> Logout</button>
          </div>
        </aside>
      </div>
      <?php endif;?>