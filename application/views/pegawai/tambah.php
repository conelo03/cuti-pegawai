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
        <div class="breadcrumb-item">Tambah Pegawai</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('tambah-pegawai');?>" method="post">
              <div class="card-header">
                <h4>Form Tambah Pegawai</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="pegawai_nip" class="form-control" value="<?= set_value('pegawai_nip')?>" >
                      <?= form_error('pegawai_nip', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="pegawai_nama_lengkap" class="form-control" value="<?= set_value('pegawai_nama_lengkap')?>">
                      <?= form_error('pegawai_nama_lengkap', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="pegawai_tempat_lahir" class="form-control" value="<?= set_value('pegawai_tempat_lahir')?>">
                      <?= form_error('pegawai_tempat_lahir', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="pegawai_tanggal_lahir" class="form-control" value="<?= set_value('pegawai_tanggal_lahir')?>">
                      <?= form_error('pegawai_tanggal_lahir', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Golongan - Ruang - Pangkat</label>
                      <select type="text" name="golruang_id" class="form-control" id="select-golruang" data-live-search="true">
                        <option disabled selected>--Pilih Golongan--</option>
                        <?php foreach($golruang as $g):?>
                          <option value="<?= $g['golruang_id']?>" <?= set_value('golruang_id') == $g['golruang_id'] ? 'selected' : '';?>><?= $g['golruang_ruang'].' - '.$g['golruang_golongan'].' - '.$g['golruang_pangkat']?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('golruang_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Masa Kerja</label>
                      <input type="text" name="pegawai_masa_kerja" class="form-control" value="<?= set_value('pegawai_masa_kerja')?>">
                      <?= form_error('pegawai_masa_kerja', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Bidang</label>
                      <select type="text" name="bidang_id" class="form-control" id="select-bidang" data-live-search="true">
                        <option disabled selected>--Pilih Bidang--</option>
                        <?php foreach($bidang as $b):?>
                          <option value="<?= $b['bidang_id']?>" <?= set_value('bidang_id') == $b['bidang_id'] ? 'selected' : '';?>><?= $b['bidang_nama']?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('bidang_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select type="text" name="jabatan_id" class="form-control" id="select-jabatan" data-live-search="true">
                        <option disabled selected>--Pilih Jabatan--</option>
                        <?php foreach($jabatan as $j):?>
                          <option value="<?= $j['jabatan_id']?>" <?= set_value('jabatan_id') == $j['jabatan_id'] ? 'selected' : '';?>><?= $j['jabatan_nama']?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('jabatan_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Detail Jabatan</label>
                      <input type="text" name="pegawai_jabatan_detail" class="form-control" value="<?= set_value('pegawai_jabatan_detail')?>">
                      <?= form_error('pegawai_jabatan_detail', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="pegawai_no_telepon" class="form-control" value="<?= set_value('pegawai_no_telepon')?>">
                      <?= form_error('pegawai_no_telepon', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="pegawai_alamat" class="form-control" value="<?= set_value('pegawai_alamat')?>">
                      <?= form_error('pegawai_alamat', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>

              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('pegawai');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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