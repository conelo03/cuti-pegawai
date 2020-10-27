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
                <a href="<?= base_url('tambah-cuti');?>" class="btn btn-info"><i class="fa fa-plus"></i> Ajukan Permohonan Cuti</a>
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
                    foreach($cuti as $c):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>                    
                      <td><?= $c['cuti_jenis'];?></td>
                      <td><?= $c['cuti_tanggal'];?></td>
                      <td><?= $c['cuti_lama'];?> Hari Kerja</td>
                      <td><?= $c['cuti_awal'];?></td>
                      <td><?= $c['cuti_akhir'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-cuti/'.$c['cuti_id']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <?php if($c['cuti_status'] == '0'):?>
                          <a href="<?= base_url('edit-cuti/'.$c['cuti_id']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-cuti/'.$c['cuti_id']); ?>';"><i class="fa fa-trash"></i> Delete</button>
                        <?php else:?>
                          <a href="<?= base_url('edit-cuti/'.$c['cuti_id']);?>" class="btn btn-info disabled" disabled><i class="fa fa-edit"></i> Edit</a>
                          <button class="btn btn-danger disabled" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-cuti/'.$c['cuti_id']); ?>';" disabled><i class="fa fa-trash"></i> Delete</button>
                        <?php endif;?>
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