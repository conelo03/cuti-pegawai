<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Profil Pegawai</a></div>
        <div class="breadcrumb-item">Update Pegawai</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="bg-info pd-1" style="width: 100%; height: 5px; border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0"></div>
            <form action="<?= base_url('update-profil'); ?>" method="post"  enctype="multipart/form-data">
              <div class="card-header">
                <h4 style="color: #3abaf4;">Informasi Login</h4>
              </div>
              <div class="card-body">
                <div class="row mb-4">
                  <div class="col-4">
                    <label>Foto Profil</label>
                  </div>
                  <div class="col-8">
                    <input type="hidden" name="tag" class="form-control" value="login">
                    <input type="hidden" name="foto_lama" class="form-control" value="<?= $pegawai['pegawai_foto_profil']?>">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-4">
                    <label>Username</label>
                  </div>
                  <div class="col-8">
                    <input type="text" name="user_username" class="form-control" value="<?= $pegawai['user_username']?>">
                    <?= form_error('user_username', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-4">
                    <label>Password Lama</label>
                  </div>
                  <div class="col-8">
                    <input type="password" name="password_lama" class="form-control">
                    <?= form_error('password_lama', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-4">
                    <label>Password Baru</label>
                  </div>
                  <div class="col-8">
                    <input type="password" name="password_baru" class="form-control">
                    <?= form_error('password_baru', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <label>Ulangi Password Baru</label>
                  </div>
                  <div class="col-8">
                    <input type="password" name="konfirmasi_password_baru" class="form-control">
                    <?= form_error('konfirmasi_password_baru', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="bg-success pd-1" style="width: 100%; height: 5px; border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0"></div>
            <form action="<?= base_url('update-profil'); ?>" method="post"  enctype="multipart/form-data">
              <div class="card-header">
                <h4 style="color: #47c363;">Informasi Pribadi</h4>
              </div>
              <div class="card-body">
                <div class="row mb-4">
                  <div class="col-4">
                    <label>Nomor Telepon</label>
                  </div>
                  <div class="col-8">
                    <input type="hidden" name="tag" class="form-control" value="pribadi">
                    <input type="text" name="pegawai_no_telepon" class="form-control" value="<?= $pegawai['pegawai_no_telepon']?>">
                    <?= form_error('pegawai_no_telepon', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <label>Alamat</label>
                  </div>
                  <div class="col-8">
                    <textarea type="text" name="pegawai_alamat" class="form-control"><?= $pegawai['pegawai_alamat']?></textarea>
                    <?= form_error('pegawai_alamat', '<span class="text-danger small">', '</span>'); ?>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbaharui</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>