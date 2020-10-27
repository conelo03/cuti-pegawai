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
        <div class="breadcrumb-item">Data Pegawai</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Pegawai</h4>
              <div class="card-header-action">
                <a href="<?= base_url('tambah-pegawai/');?>" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="datatables-pegawai">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Pangkat</th>
                      <th class="text-center" style="width: 300px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1; 
                    foreach($pegawai as $p):?>
                    <tr>
                      <td class="text-center"><?= $no++;?></td>
                      <td><?= $p['pegawai_nip'];?></td>
                      <td><?= $p['pegawai_nama_lengkap'];?></td>
                      <td><?= $p['jabatan_nama'];?></td>
                      <td><?= $p['golruang_golongan'].$p['golruang_ruang'].' '.$p['golruang_pangkat'];?></td>
                      <td class="text-center">
                        <a href="<?= base_url('detail-pegawai/'.$p['pegawai_id']);?>" class="btn btn-light"><i class="fa fa-list"></i> Detail</a>
                        <a href="<?= base_url('edit-pegawai/'.$p['pegawai_id']);?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-confirm="Anda yakin ingin menghapus data ini?|Data yang sudah dihapus tidak akan kembali." data-confirm-yes="document.location.href='<?= base_url('hapus-pegawai/'.$p['pegawai_id']); ?>';"><i class="fa fa-trash"></i> Delete</button>
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