<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<?php if(is_staf() || is_kepegawaian() || is_admin()):?>
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
            <form action="<?= base_url('#');?>" method="post">
              <div class="card-header">
                <h4>Detail Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Lama Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_lama'].' Hari Kerja' ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Mulai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_awal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>NIP</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Selesai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_akhir'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Jenis Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_jenis'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>No. Telp Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_no_hp'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alasan Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alamat Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alamat'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Status</h6>
                      </div>
                      <div class="col-7">
                        <?php if($cuti['cuti_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                          <a href="#" class="btn btn-warning d-block"> Belum Dikonfirmasi</a>
                        <?php elseif($cuti['cuti_atasanlangsung_status'] == 'Disetujui'):?>
                          <a href="#" class="btn btn-success d-block"> Disetujui</a>
                        <?php elseif($cuti['cuti_atasanlangsung_status'] == 'Ditolak'):?>
                          <a href="#" class="btn btn-danger d-block"> Ditolak</a>
                        <?php elseif($cuti['cuti_atasanlangsung_status'] == 'Ditangguhkan'):?>
                          <a href="#" class="btn btn-warning d-block"> Ditangguhkan</a>
                        <?php elseif($cuti['cuti_atasanlangsung_status'] == 'Perubahan'):?>
                          <a href="#" class="btn btn-info d-block"> Perubahan</a>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('cuti');?>" class="btn btn-light"><i class="fa fa-arrow-left"></i> Kembali</a>
                <?php if(is_staf()):?>
                <a href="<?= base_url('cetak-cuti/'.$cuti['cuti_id']);?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                <?php endif;?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php elseif(is_kepala()):?>
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
            <form action="<?= base_url('#');?>" method="post">
              <div class="card-header">
                <h4>Detail Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Lama Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_lama'].' Hari Kerja' ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Mulai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_awal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>NIP</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Selesai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_akhir'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Jenis Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_jenis'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>No. Telp Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_no_hp'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alasan Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alamat Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alamat'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <?php 
                  $id_atasan = $cuti['cuti_atasanlangsung_id'];
                  $atasan = $this->db->get_where('pegawai', ['pegawai_id' => $id_atasan])->row_array();
                  ?>
                  <div class="col-3">
                    <h6>NIP - Nama Atasan Langsung</h6>
                  </div>
                  <div class="col-8">
                    <h6 style="color: black;"><?= $atasan['pegawai_nip'].' - '.$atasan['pegawai_nama_lengkap']?></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>Status dari Atasan Langsung</h6>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <select type="text" name="cuti_atasanlangsung_status" class="form-control" id="" data-live-search="true">
                        <option value="Belum dikonfirmasi" <?= $cuti['cuti_atasanlangsung_status'] == 'Belum dikonfirmasi' ? 'selected disabled' : '';?>>Belum dikonfirmasi</option>
                        <option value="Disetujui" <?= $cuti['cuti_atasanlangsung_status'] == 'Disetujui' ? 'selected' : '';?>>Disetujui</option>
                        <option value="Ditolak" <?= $cuti['cuti_atasanlangsung_status'] == 'Ditolak' ? 'selected' : '';?>>Ditolak</option>
                        <option value="Ditangguhkan" <?= $cuti['cuti_atasanlangsung_status'] == 'Ditangguhkan' ? 'selected' : '';?>>Ditangguhkan</option>
                        <option value="Perubahan" <?= $cuti['cuti_atasanlangsung_status'] == 'Perubahan' ? 'selected' : '';?>>Perubahan</option>
                      </select>
                      <span class="text-danger small">*) wajib diisi</span><br/>
                      <?= form_error('cuti_atasanlangsung_status', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>Catatan dari Atasan Langsung</h6>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <input type="text" name="cuti_atasanlangsung_deskripsi" class="form-control" value="<?= set_value('cuti_atasanlangsung_deskripsi', $cuti['cuti_atasanlangsung_deskripsi'])?>">
                      <span class="text-danger small">*) wajib diisi</span><br/>
                      <?= form_error('cuti_atasanlangsung_deskripsi', '<span class="text-danger small">', '</span>'); ?>
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
<?php elseif(is_ketua()):?>
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
            <form action="<?= base_url('#');?>" method="post">
              <div class="card-header">
                <h4>Detail Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Pengajuan</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_tanggal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Lama Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_lama'].' Hari Kerja' ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Nama Lengkap</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nama_lengkap'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Mulai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_awal'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>NIP</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['pegawai_nip'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Tanggal Selesai</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= date('d F Y', strtotime($cuti['cuti_akhir'])) ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Jenis Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_jenis'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>No. Telp Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_no_hp'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alasan Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alasan'] ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <h6>Alamat Cuti</h6>
                      </div>
                      <div class="col-7">
                        <h6 style="color: black;"><?= $cuti['cuti_alamat'] ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <?php 
                  $id_pejabat = $cuti['cuti_pejabat_id'];
                  $pejabat = $this->db->get_where('pegawai', ['pegawai_id' => $id_pejabat])->row_array();
                  ?>
                  <div class="col-3">
                    <h6>NIP - Nama Pejabat</h6>
                  </div>
                  <div class="col-8">
                    <h6 style="color: black;"><?= $pejabat['pegawai_nip'].' - '.$pejabat['pegawai_nama_lengkap']?></h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>Status dari Pejabat</h6>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <select type="text" name="cuti_pejabat_status" class="form-control" id="" data-live-search="true">
                        <option value="Belum dikonfirmasi" <?= $cuti['cuti_pejabat_status'] == 'Belum dikonfirmasi' ? 'selected' : '';?> disabled>Belum dikonfirmasi</option>
                        <option value="Disetujui" <?= $cuti['cuti_pejabat_status'] == 'Disetujui' ? 'selected' : '';?>>Disetujui</option>
                        <option value="Ditolak" <?= $cuti['cuti_pejabat_status'] == 'Ditolak' ? 'selected' : '';?>>Ditolak</option>
                        <option value="Ditangguhkan" <?= $cuti['cuti_pejabat_status'] == 'Ditangguhkan' ? 'selected' : '';?>>Ditangguhkan</option>
                        <option value="Perubahan" <?= $cuti['cuti_pejabat_status'] == 'Perubahan' ? 'selected' : '';?>>Perubahan</option>
                      </select>
                      <span class="text-danger small">*) wajib diisi</span><br/>
                      <?= form_error('cuti_pejabat_status', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>Catatan dari Pejabat</h6>
                  </div>
                  <div class="col-8">
                    <div class="form-group">
                      <input type="text" name="cuti_pejabat_deskripsi" class="form-control" value="<?= set_value('cuti_pejabat_deskripsi', $cuti['cuti_pejabat_deskripsi'])?>">
                      <span class="text-danger small">*) wajib diisi</span><br/>
                      <?= form_error('cuti_pejabat_deskripsi', '<span class="text-danger small">', '</span>'); ?>
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
<?php endif; ?>
<?php $this->load->view('template/footer');?>