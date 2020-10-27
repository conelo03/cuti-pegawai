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
        <div class="breadcrumb-item">Data Golongan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Golongan</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-golruang/');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-golongan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Golongan</th>
                      <th>Ruangan</th>
                      <th>Pangkat</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($golruang as $g):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $g['golruang_golongan'];?></td>
                      <td><?= $g['golruang_ruang'];?></td>
                      <td><?= $g['golruang_pangkat'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-golruang/'.$g['golruang_id']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-golruang/'.$g['golruang_id']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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