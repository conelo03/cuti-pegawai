<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Pegawai</a></div>
        <div class="breadcrumb-item">Detail Pegawai</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="#" method="post">
              <div class="card-header">
                <h4>Detail Pegawai</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_nip']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_nama_lengkap']?>" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_tempat_lahir']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_tanggal_lahir']?>" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>Golongan</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['golruang_golongan']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label>Ruang</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['golruang_ruang']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Pangkat</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['golruang_pangkat']?>" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Masa Kerja</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_masa_kerja']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Bidang</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['bidang_nama']?>" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['jabatan_nama']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Detail Jabatan</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_jabatan_detail']?>" disabled="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_no_telepon']?>" disabled="">
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="username" class="form-control" value="<?= $pegawai['pegawai_alamat']?>" disabled="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pegawai');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>