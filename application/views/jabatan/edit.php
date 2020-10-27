<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Jabatan</a></div>
        <div class="breadcrumb-item">Edit Jabatan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-jabatan/'.$jabatan['jabatan_id']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Jabatan</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" name="jabatan_nama" class="form-control" value="<?= set_value('jabatan_nama', $jabatan['jabatan_nama']); ?>" required="">
                  <?= form_error('jabatan_nama', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Atasan Langsung</label>
                  <input type="text" name="jabatan_atasanlangsung" class="form-control" value="<?= set_value('jabatan_atasanlangsung', $jabatan['jabatan_atasanlangsung']); ?>" required="">
                  <?= form_error('jabatan_atasanlangsung', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('jabatan');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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