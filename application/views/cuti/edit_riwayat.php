<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Pengajuan Cuti</a></div>
        <div class="breadcrumb-item"><a href="#">Data Pengajuan Cuti</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-riwayat-cuti/'.$riwayat_cuti['riwayat_cuti_id'].'/'.$pegawai['pegawai_id']);?>" method="post">
              <div class="card-header">
                <h4>Edit Riwayat Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="hidden" name="pegawai_id" class="form-control" value="<?= $pegawai['pegawai_id'] ?>"> 
                      <input type="text" name="riwayat_cuti_tahun" class="form-control" value="<?= $riwayat_cuti['riwayat_cuti_tahun'] ?>" required> 
                      <?= form_error('riwayat_cuti_tahun', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Sisa</label>
                      <input type="text" name="riwayat_cuti_sisa" class="form-control" value="<?= $riwayat_cuti['riwayat_cuti_sisa'] ?>" required> 
                      <?= form_error('riwayat_cuti_sisa', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('riwayat-cuti/'.$pegawai['pegawai_id']);?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('template/footer');?>