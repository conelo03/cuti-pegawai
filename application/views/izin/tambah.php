<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Izin Keluar Kantor</a></div>
        <div class="breadcrumb-item"><a href="#">Pengajuan Izin Keluar Kantor</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-izin');?>" method="post">
              <div class="card-header">
                <h4>Form Pengajuan Izin Keluar Kantor</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="hidden" name="pegawai_id" class="form-control" value="<?= $pegawai['pegawai_id'] ?>" >
                      <input type="text" name="pegawai_nip" class="form-control" value="<?= $pegawai['pegawai_nip']?> " disabled>
                      <?= form_error('pegawai_nip', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="pegawai_nama_lengkap" class="form-control" value="<?= $pegawai['pegawai_nama_lengkap'] ?>" disabled>
                      <?= form_error('pegawai_nama_lengkap', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Tanggal Pengajuan</label>
                      <input type="date" name="izin_tanggal" class="form-control" value="<?= set_value('izin_tanggal', date('m/d/Y')) ?>">
                      <?= form_error('izin_tanggal', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Mulai</label>
                      <input type="text" name="izin_mulai" class="form-control" value="<?= set_value('izin_mulai')?>">
                      <?= form_error('izin_mulai', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Selesai</label>
                      <input type="text" name="izin_selesai" class="form-control" value="<?= set_value('izin_selesai')?>">
                      <?= form_error('izin_selesai', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Alasan Cuti</label>
                      <input type="text" name="izin_alasan" class="form-control" value="<?= set_value('izin_alasan')?>">
                      <?= form_error('izin_alasan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('izin');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Ajukan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>