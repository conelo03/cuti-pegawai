<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Pengajuan Cuti</a></div>
        <div class="breadcrumb-item"><a href="#">Detail Pengajuan Cuti</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('edit-cuti/'.$cuti['cuti_id']);?>" method="post">
              <div class="card-header">
                <h4>Detail Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>NIP - Nama</label>
                      <input type="hidden" name="pegawai_id" class="form-control" value="<?= $cuti['pegawai_id'] ?>" >
                      <input type="text" name="pegawai_nip" class="form-control" value="<?= $cuti['pegawai_nip'].' - '.$cuti['pegawai_nama_lengkap'] ?>" disabled>
                      <?= form_error('pegawai_nip', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Tanggal Pengajuan Cuti</label>
                      <input type="date" name="cuti_tanggal" class="form-control" value="<?= set_value('cuti_tanggal', $cuti['cuti_tanggal']) ?>">
                      <?= form_error('cuti_tanggal', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Nomor Cuti</label>
                      <input type="text" name="cuti_nomor" class="form-control" value="<?= set_value('cuti_nomor', $cuti['cuti_nomor'])?>">
                      <?= form_error('cuti_nomor', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Jenis Cuti</label>
                      <input type="text" name="cuti_jenis" class="form-control" value="<?= set_value('cuti_jenis'), $cuti['cuti_jenis']?>">
                      <?= form_error('cuti_jenis', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Alasan Cuti</label>
                      <input type="text" name="cuti_alasan" class="form-control" value="<?= set_value('cuti_alasan', $cuti['cuti_alasan'])?>">
                      <?= form_error('cuti_alasan', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Lama Cuti</label>
                      <input type="text" name="cuti_lama" class="form-control" value="<?= set_value('cuti_lama'), $cuti['cuti_lama']?>">
                      <?= form_error('cuti_lama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Tanggal Mulai Cuti</label>
                      <input type="date" name="cuti_awal" class="form-control" value="<?= set_value('cuti_awal'), $cuti['cuti_awal']?>">
                      <?= form_error('cuti_awal', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>Tanggal Selesai Cuti</label>
                      <input type="date" name="cuti_akhir" class="form-control" value="<?= set_value('cuti_akhir'), $cuti['cuti_akhir']?>">
                      <?= form_error('cuti_akhir', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>No. Telepon Cuti</label>
                      <input type="text" name="cuti_no_hp" class="form-control" value="<?= set_value('cuti_no_hp', $cuti['cuti_no_hp'])?>">
                      <?= form_error('cuti_no_hp', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-group">
                      <label>Alamat Cuti</label>
                      <input type="text" name="cuti_alamat" class="form-control" value="<?= set_value('cuti_alamat', $cuti['cuti_alamat'])?>">
                      <?= form_error('cuti_alamat', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label>Atasan Langsung</label>
                      <select type="text" name="cuti_atasanlangsung_id" class="form-control" id="select-atasan" data-live-search="true">
                        <option disabled selected>--Pilih Atasan--</option>
                        <?php foreach($atasan as $a):?>
                          <option value="<?= $a['pegawai_id']?>" <?= set_value('cuti_atasanlangsung_id', $cuti['cuti_atasanlangsung_id']) == $a['pegawai_id'] ? 'selected' : '';?>><?= $a['pegawai_nip'].' - '.$a['pegawai_nama_lengkap']?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('cuti_atasanlangsung_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Pejabat</label>
                      <select type="text" name="cuti_pejabat_id" class="form-control" id="select-pejabat" data-live-search="true">
                        <option disabled selected>--Pilih Pejabat--</option>
                        <?php foreach($atasan as $a):?>
                          <option value="<?= $a['pegawai_id']?>" <?= set_value('cuti_pejabat_id', $cuti['cuti_pejabat_id']) == $a['pegawai_id'] ? 'selected' : '';?>><?= $a['pegawai_nip'].' - '.$a['pegawai_nama_lengkap']?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('cuti_pejabat_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                

              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('cuti');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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