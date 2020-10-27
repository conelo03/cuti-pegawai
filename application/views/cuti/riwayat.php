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

    <?php if(isset($riwayat_cuti)):?>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pengajuan Cuti</h4>
              <?php if(is_admin()):?>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-riwayat-cuti/'.$pegawai['pegawai_id']);?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
              <?php endif;?>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-2">
                  <h6>NIP</h6>
                </div>
                <div class="col-10">
                  <h6>: <?= $pegawai['pegawai_nip'] ?></h6>
                </div>
                <div class="col-2">
                  <h6>Nama Lengkap</h6>
                </div>
                <div class="col-10">
                  <h6>: <?= $pegawai['pegawai_nama_lengkap'] ?></h6>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-cuti">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tahun</th>
                      <th>Sisa Cuti</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($riwayat_cuti as $c):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $c['riwayat_cuti_tahun'];?></td>
                      <td><?= $c['riwayat_cuti_sisa'];?></td>
                      <td class="text-center">   
                        <a href="<?= base_url('edit-riwayat-cuti/'.$c['riwayat_cuti_id'].'/'.$pegawai['pegawai_id']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-riwayat-cuti/'.$c['riwayat_cuti_id'].'/'.$pegawai['pegawai_id']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php else:?>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="<?= base_url('riwayat-cuti');?>" method="post">
              <div class="card-header">
                <h4>Pilih Pegawai</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Pilih Pegawai</label>
                      <select class="form-control" name="pegawai_id" id="select-pegawai" data-live-search="true">
                        <option disabled selected>-- Pilih Pegawai --</option>
                        <?php foreach ($pegawai as $pegawai):?>
                        <option value="<?= $pegawai['pegawai_id']?>" <?= set_value('pegawai_id') == $pegawai['pegawai_id'] ? 'selected' : '' ; ?> ><?= $pegawai['pegawai_nip'].' - '.$pegawai['pegawai_nama_lengkap'] ?></option>
                        <?php endforeach;?>
                      </select>
                      <?= form_error('pegawai_id', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer text-right">
                <a href="<?= base_url('cuti');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button type="reset" class="btn btn-danger"><i class="fa fa-sync"></i> Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Pilih</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php endif;?>
  </section>
</div>
<?php $this->load->view('template/footer');?>