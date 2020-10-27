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
            <div class="card-header">
              <h4>Data Pengajuan Cuti</h4>
              <div class="card-header-action">
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-cuti">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Jenis</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Lama Cuti</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $id_pegawai = $this->session->userdata('pegawai_id'); 
                    foreach($cuti as $c):?>
                    <tr>
                      <?php if($id_pegawai == $c['cuti_atasanlangsung_id'] && $c['cuti_atasanlangsung_status'] == 'Belum dikonfirmasi' && $c['cuti_status'] == '1'): ?>
                        <td class="text-center"><?= $no++;?><span class="badge badge-warning table-badge text-warning">0</span></td>
                      <?php elseif($id_pegawai == $c['cuti_pejabat_id'] && $c['cuti_pejabat_status'] == 'Belum dikonfirmasi' && $c['cuti_status'] == '2'): ?>
                        <td class="text-center"><?= $no++;?><span class="badge badge-warning table-badge text-warning">0</span></td>
                      <?php else:?>
                          <td class="text-center"><?= $no++;?></td>
                      <?php endif;?>                    
                      <td><?= $c['cuti_jenis'];?></td>
                      <td><?= $c['cuti_tanggal'];?></td>
                      <td><?= $c['cuti_lama'];?> Hari Kerja</td>
                      <td><?= $c['cuti_awal'];?></td>
                      <td><?= $c['cuti_akhir'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-cuti/'.$c['cuti_id']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
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
  </section>
</div>
<?php $this->load->view('template/footer');?>