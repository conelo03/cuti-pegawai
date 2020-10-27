<?php $this->load->view('template/header');?>
<?php $this->load->view('template/sidebar');?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master User</a></div>
        <div class="breadcrumb-item"><a href="#">Kelola Jabatan</a></div>
        <div class="breadcrumb-item">Data Jabatan</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Jabatan</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-jabatan/');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-jabatan">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Jabatan</th>
                      <th>Atasan Langsung</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($jabatan as $j):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $j['jabatan_nama'];?></td>
                      <td><?= $j['jabatan_atasanlangsung'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('edit-jabatan/'.$j['jabatan_id']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-jabatan/'.$j['jabatan_id']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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