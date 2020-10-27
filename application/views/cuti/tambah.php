<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Pengajuan Cuti</a></div>
        <div class="breadcrumb-item"><a href="#">Tambah Pengajuan Cuti</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-cuti');?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Pengajuan Cuti</h4>
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
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tanggal Pengajuan Cuti</label>
                      <input type="date" name="cuti_tanggal" class="form-control" value="<?= set_value('cuti_tanggal', date('m/d/Y')) ?>">
                      <?= form_error('cuti_tanggal', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Jenis Cuti</label>
                      <select type="text" name="cuti_jenis" class="form-control">
                        <option disabled selected>--Pilih Jenis Cuti--</option>
                        <option value="Cuti Tahunan" <?= set_value('cuti_jenis') == 'Cuti Tahunan' ? 'selected' : '';?>>Cuti Tahunan</option>
                        <option value="Cuti Besar" <?= set_value('cuti_jenis') == 'Cuti Besar' ? 'selected' : '';?>>Cuti Besar</option>
                        <option value="Cuti Sakit" <?= set_value('cuti_jenis') == 'Cuti Sakit' ? 'selected' : '';?>>Cuti Sakit</option>
                        <option value="Cuti Melahirkan" <?= set_value('cuti_jenis') == 'Cuti Melahirkan' ? 'selected' : '';?>>Cuti Melahirkan</option>
                        <option value="Cuti Karena Alasan Penting" <?= set_value('cuti_jenis') == 'Cuti Karena Alasan Penting' ? 'selected' : '';?>>Cuti Karena Alasan Penting</option>
                        <option value="Cuti Diluar Tanggungan Negara" <?= set_value('cuti_jenis') == 'Cuti Diluar Tanggungan Negara' ? 'selected' : '';?>>Cuti Diluar Tanggungan Negara</option>
                      </select>
                      <?= form_error('cuti_jenis', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Alasan Cuti</label>
                      <input type="text" name="cuti_alasan" class="form-control" value="<?= set_value('cuti_alasan')?>">
                      <?= form_error('cuti_alasan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Lama Cuti</label>
                      <input type="text" name="cuti_lama" class="form-control" value="<?= set_value('cuti_lama')?>">
                      <?= form_error('cuti_lama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Tanggal Mulai Cuti</label>
                      <input type="date" name="cuti_awal" class="form-control" value="<?= set_value('cuti_awal')?>">
                      <?= form_error('cuti_awal', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Tanggal Selesai Cuti</label>
                      <input type="date" name="cuti_akhir" class="form-control" value="<?= set_value('cuti_akhir')?>">
                      <?= form_error('cuti_akhir', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>No. Telepon Cuti</label>
                      <input type="text" name="cuti_no_hp" class="form-control" value="<?= set_value('cuti_no_hp', $pegawai['pegawai_no_telepon'])?>">
                      <?= form_error('cuti_no_hp', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-group">
                      <label>Alamat Cuti</label>
                      <input type="text" name="cuti_alamat" class="form-control" value="<?= set_value('cuti_alamat')?>">
                      <?= form_error('cuti_alamat', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pegawai');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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