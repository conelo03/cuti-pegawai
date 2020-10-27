<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Golongan</a></div>
        <div class="breadcrumb-item">Edit Golongan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-golruang/'.$golruang['golruang_id']); ?>" method="post">
              <div class="card-header">
                <h4>Form Edit Golongan</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Golongan</label>
                  <input type="text" name="golruang_golongan" class="form-control" value="<?= set_value('golruang_golongan', $golruang['golruang_golongan']); ?>" required="">
                  <?= form_error('golruang_golongan', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Ruangan</label>
                  <input type="text" name="golruang_ruang" class="form-control" value="<?= set_value('golruang_ruang', $golruang['golruang_ruang']); ?>" required="">
                  <?= form_error('golruang_ruang', '<span class="text-danger small">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <label>Pangkat</label>
                  <input type="text" name="golruang_pangkat" class="form-control" value="<?= set_value('golruang_pangkat', $golruang['golruang_pangkat']); ?>" required="">
                  <?= form_error('golruang_pangkat', '<span class="text-danger small">', '</span>'); ?>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('golruang');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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