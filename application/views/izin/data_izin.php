<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Izin Keluar Kantor Saya</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Izin Keluar Kantor</a></div>
        <div class="breadcrumb-item"><a href="#">Daftar Izin Keluar Kantor Saya</a></div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Izin Keluar Kantor</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-izin">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th class="text-center" style="width: 240px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($izin as $c):?>
                    <tr>
                      <?php if($c['izin_atasanlangsung_status'] == 'Belum dikonfirmasi'):?>
                        <td class="text-center"><?= $no++;?><span class="badge badge-warning table-badge text-warning">0</span></td>
                      <?php else:?>
                        <td class="text-center"><?= $no++;?></td>
                      <?php endif;?>
                      <td><?= $c['izin_tanggal'];?></td>
                      <td><?= $c['izin_mulai'];?></td>
                      <td><?= $c['izin_selesai'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-izin/'.$c['izin_id']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
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