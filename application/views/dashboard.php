<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-header">
      <h6>Selamat Datang di Aplikasi Elektronik Ijin dan Cuti (E-ICUT)<br/><br/>
        Aplikasi ini bertujuan mempermudah Proses Perizinan dan Cuti bagi seluruh Pimpinan dan Staf di Lingkungan Kerja Pengadilan Agama Amurang. Harapannya kedepan seluruh Sistem Kepegawaian dapat memanfaatkan Teknologi Informasi.
      </h6>
    </div>
  <?php if(!is_staf()): ?>
  <?php if($notifikasi_cuti > 0 && $notifikasi_izin > 0 ):?>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?= base_url('data-cuti');?>">
            <div class="card-icon bg-success">
             <i class="far fa-bell"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Notifikasi Pengajuan Cuti</h4>
            </div>
            <div class="card-body">
              <h5><?= $notifikasi_cuti?> Pegawai melakukan Pengajuan Cuti. Harap verifikasi.</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?= base_url('data-izin');?>">
            <div class="card-icon bg-warning">
             <i class="far fa-bell"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Notifikasi Pengajuan Izin</h4>
            </div>
            <div class="card-body">
              <h5><?= $notifikasi_izin?> Pegawai melakukan Izin Keluar Kantor. Harap verifikasi.</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php elseif($notifikasi_cuti > 0 && $notifikasi_izin == 0 ):?>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?= base_url('data-cuti');?>">
            <div class="card-icon bg-success">
             <i class="far fa-bell"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Notifikasi Pengajuan Cuti</h4>
            </div>
            <div class="card-body">
              <h5><?= $notifikasi_cuti?> Pegawai melakukan Pengajuan Cuti. Harap verifikasi.</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php elseif($notifikasi_cuti == 0 && $notifikasi_izin > 0 ):?>
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <a href="<?= base_url('data-izin');?>">
            <div class="card-icon bg-warning">
             <i class="far fa-bell"></i>
            </div>
          </a>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Notifikasi Pengajuan Izin</h4>
            </div>
            <div class="card-body">
              <h5><?= $notifikasi_izin?> Pegawai melakukan Izin Keluar Kantor. Harap verifikasi.</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php elseif($notifikasi_cuti == 0 && $notifikasi_izin == 0 ):?>
  <?php endif; ?>
  <?php else: ?>
  <?php endif; ?>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-wrap">
            <div class="card-header mb-3 p-1 bg-success">
            </div>
            <div class="card-body mb-4">
              <h6 style="color: #47c363;">Data Pengajuan Cuti</h6>
              <br/>
            <?php if(!empty($cuti)): ?>
              <?php if($cuti['cuti_status'] == '0'):?>
                <a href="#" class="btn btn-warning"> Menunggu Konfirmasi Kepegawaian</a>
              <?php elseif($cuti['cuti_status'] == '1'):?>
                <a href="#" class="btn btn-warning"> Menunggu Konfirmasi Atasan Langsung</a>
              <?php elseif($cuti['cuti_status'] == '2'):?>
                <a href="#" class="btn btn-warning"> Menunggu Konfirmasi Pejabat Berwenang</a>
              <?php elseif($cuti['cuti_status'] == '3'):?>
                <a href="#" class="btn btn-info"> Selesai</a>
              <?php endif;?>
              <div class="row mt-3 ml-2">
                <div class="col-3 pr-0">
                  <h6 style="font-size: 10pt;">Tanggal</h6>
                </div>
                <div class="col-9 pr-0">
                  <h6 style="font-size: 10pt;">: <?= date('d F Y', strtotime($cuti['cuti_tanggal'])); ?></h6>
                </div>
                <div class="col-3 pr-0">
                  <h6 style="font-size: 10pt;">Jenis</h6>
                </div>
                <div class="col-9 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $cuti['cuti_jenis']; ?></h6>
                </div>
                <div class="col-3 pr-0">
                  <h6 style="font-size: 10pt;">Lamanya</h6>
                </div>
                <div class="col-9 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $cuti['cuti_lama']; ?> Hari Kerja</h6>
                </div>
                <div class="col-3 pr-0">
                  <h6 style="font-size: 10pt;">Mulai</h6>
                </div>
                <div class="col-9 pr-0">
                  <h6 style="font-size: 10pt;">: <?= date('d F Y', strtotime($cuti['cuti_awal'])); ?></h6>
                </div>
                <div class="col-3 pr-0">
                  <h6 style="font-size: 10pt;">Sampai</h6>
                </div>
                <div class="col-9 pr-0">
                  <h6 style="font-size: 10pt;">: <?= date('d F Y', strtotime($cuti['cuti_akhir'])); ?></h6>
                </div>
                <div class="col-9 pr-0">
                </div>
                <div class="col-3 pr-0">
                  <a href="<?= base_url('detail-cuti/'.$cuti['cuti_id']); ?>" class="btn btn-info ml-auto mr-0"> Detail</a>
                </div>
              </div>
          <?php else: ?>
            <h6>Belum ada pengajuan.</h6>
          <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-wrap">
            <div class="card-header mb-3 p-1 bg-warning">
            </div>
            <div class="card-body mb-4">
              <h6 style="color: #ffa426;">Data Izin Keluar Kantor</h6>
              <br/>
            <?php if(!empty($izin)): ?>
              <?php if($izin['izin_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                <a href="#" class="btn btn-warning"> Menunggu Konfirmasi Atasan Langsung</a>
              <?php elseif($izin['izin_atasanlangsung_status'] == 'Disetujui'):?>
                <a href="#" class="btn btn-success"> Disetujui</a>
              <?php elseif($izin['izin_atasanlangsung_status'] == 'Ditolak'):?>
                <a href="#" class="btn btn-danger"> Ditolak</a>
              <?php endif;?>
              <div class="row mt-3 ml-2">
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Tanggal</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= date('d F Y', strtotime($izin['izin_tanggal'])); ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Mulai</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $izin['izin_mulai']; ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Selesai</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $izin['izin_selesai'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Keperluan</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">:</h6>
                </div>
                <div class="col-12 pr-0">
                  <h6 style="font-size: 10pt;"><?= $izin['izin_alasan'] ?></h6>
                </div>
                <div class="col-9 pr-0">
                </div>
                <div class="col-3 pr-0">
                  <a href="<?= base_url('detail-izin/'.$izin['izin_id']); ?>" class="btn btn-info ml-auto mr-0"> Detail</a>
                </div>
              </div>
          <?php else: ?>
            <h6>Belum ada pengajuan.</h6>
          <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-wrap">
            <div class="card-header mb-3 p-1 bg-info">
            </div>
            <div class="card-body mb-4">
              <h6 style="color: #3abaf4;">Profile Pegawai</h6>
              <br/>
              <div class="row">
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Nama</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['pegawai_nama_lengkap'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">NIP</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['pegawai_nip'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Tempat Lahir</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['pegawai_tempat_lahir'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Tanggal Lahir</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= date('d F Y', strtotime($pegawai['pegawai_tanggal_lahir'])) ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Gol Ruang</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['golruang_golongan'].' '.$pegawai['golruang_ruang'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Pangkat</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['golruang_pangkat'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Masa Kerja</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['pegawai_masa_kerja'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Jabatan</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['jabatan_nama'] ?></h6>
                </div>
                <div class="col-4 pr-0">
                  <h6 style="font-size: 10pt;">Detail Jabatan</h6>
                </div>
                <div class="col-8 pr-0">
                  <h6 style="font-size: 10pt;">: <?= $pegawai['pegawai_jabatan_detail'] ?></h6>
                </div>
                <div class="col-9 pr-0">
                </div>
                <div class="col-3 pr-0">
                  <a href="<?= base_url('profil-pegawai'); ?>" class="btn btn-info ml-auto mr-0"> Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>