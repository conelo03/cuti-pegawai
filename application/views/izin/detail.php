<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<?php 
$id_pegawai = $this->session->userdata('pegawai_id');
$id_atasan = $izin['izin_atasanlangsung_id'];
if($izin['pegawai_id'] == $id_pegawai):?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Izin Keluar Kantor</a></div>
        <div class="breadcrumb-item"><a href="#">Detail Izin Keluar Kantor</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form action="<?= base_url('#');?>" method="post">
              <div class="card-header">
                <h4>Detail Izin Keluar Kantor</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($izin['izin_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Pukul</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_mulai'].' s/d '.$izin['izin_selesai'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Alasan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
                
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Status</h6>
                      </div>
                      <div class="col-md-7">
                        <?php if($izin['izin_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                          <a href="#" class="btn btn-warning d-block"> Belum Dikonfirmasi</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Disetujui'):?>
                          <a href="#" class="btn btn-success d-block"> Disetujui</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Ditolak'):?>
                          <a href="#" class="btn btn-danger d-block"> Ditolak</a>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('izin');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?php if($izin['izin_atasanlangsung_status'] == 'Disetujui'):?>
                  <a href="<?= base_url('cetak-izin/'.$izin['izin_id']);?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                <?php endif;?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php elseif(is_admin() && $izin['izin_atasanlangsung_status'] != 'Belum dikonfirmasi'):?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Izin Keluar Kantor</a></div>
        <div class="breadcrumb-item"><a href="#">Detail Izin Keluar Kantor</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <form action="<?= base_url('#');?>" method="post">
              <div class="card-header">
                <h4>Detail Izin Keluar Kantor</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($izin['izin_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Pukul</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_mulai'].' s/d '.$izin['izin_selesai'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Alasan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
                
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Status</h6>
                      </div>
                      <div class="col-md-7">
                        <?php if($izin['izin_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                          <a href="#" class="btn btn-warning d-block"> Belum Dikonfirmasi</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Disetujui'):?>
                          <a href="#" class="btn btn-success d-block"> Disetujui</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Ditolak'):?>
                          <a href="#" class="btn btn-danger d-block"> Ditolak</a>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('data-izin');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php elseif($id_atasan == $id_pegawai):?>
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
        <div class="col-md-12">
          <div class="card">
            <form action="<?= base_url('edit-status-izin/'.$izin['izin_id']);?>" method="post">
              <div class="card-header">
                <h4>Detail Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($izin['izin_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Pukul</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_mulai'].' s/d '.$izin['izin_selesai'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Alasan</h6>
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['izin_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        
                      </div>
                      <div class="col-md-7">
                        <h6 style="color: black;"><?= $izin['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
                
                <br/>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <h6>Status</h6>
                      </div>
                      <div class="col-md-7">
                        <?php if($izin['izin_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                          <a href="#" class="btn btn-warning d-block"> Belum Dikonfirmasi</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Disetujui'):?>
                          <a href="#" class="btn btn-success d-block"> Disetujui</a>
                        <?php elseif($izin['izin_atasanlangsung_status'] == 'Ditolak'):?>
                          <a href="#" class="btn btn-danger d-block"> Ditolak</a>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
                <br/>
                <div class="row">
                  <?php 
                  $id_atasan = $izin['izin_atasanlangsung_id'];
                  $atasan = $this->db->get_where('pegawai', ['pegawai_id' => $id_atasan])->row_array();
                  ?>
                  <div class="col-md-3">
                    <h6>NIP - Nama Atasan Langsung</h6>
                  </div>
                  <div class="col-md-8">
                    <h6>: <?= $atasan['pegawai_nip'].' - '.$atasan['pegawai_nama_lengkap']?></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h6>Status dari Atasan Langsung</h6>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group">
                      <select type="text" name="izin_atasanlangsung_status" class="form-control" id="" data-live-search="true">
                        <option value="Belum dikonfirmasi" <?= $izin['izin_atasanlangsung_status'] == 'Belum dikonfirmasi' ? 'selected disabled' : '';?>>Belum dikonfirmasi</option>
                        <option value="Disetujui" <?= $izin['izin_atasanlangsung_status'] == 'Disetujui' ? 'selected' : '';?>>Disetujui</option>
                        <option value="Ditolak" <?= $izin['izin_atasanlangsung_status'] == 'Ditolak' ? 'selected' : '';?>>Ditolak</option>
                      </select>
                      <span class="text-danger small">*) wajib diisi</span><br/>
                      <?= form_error('izin_atasanlangsung_status', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('data-izin');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<?php endif; ?>
<?php $this->load->view('template/footer');?>