<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	private function validation()
	{
		$this->form_validation->set_rules('cuti_tanggal', 'Tanggal Pengajuan Cuti', 'required');
		$this->form_validation->set_rules('cuti_jenis', 'Jenis Cuti', 'required');
		$this->form_validation->set_rules('cuti_alasan', 'Alasan Cuti', 'required');
		$this->form_validation->set_rules('cuti_lama', 'Lama Cuti', 'required');
		$this->form_validation->set_rules('cuti_awal', 'Tanggal Mulai Cuti', 'required');
		$this->form_validation->set_rules('cuti_akhir', 'Tanggal Selesai Cuti', 'required');
		$this->form_validation->set_rules('cuti_no_hp', 'No Hp yang bisa dihubungi', 'required');
		$this->form_validation->set_rules('cuti_alamat', 'Alamat Cuti', 'required');
	}

	private function validation_status($tag)
	{
		if($tag == 'atasan_langsung') {
			$this->form_validation->set_rules('cuti_atasanlangsung_status', 'Status', 'required');
			$this->form_validation->set_rules('cuti_atasanlangsung_deskripsi', 'Deskripsi', 'required');
		} elseif($tag == 'pejabat') {
			$this->form_validation->set_rules('cuti_pejabat_status', 'Status', 'required');
			$this->form_validation->set_rules('cuti_pejabat_deskripsi', 'Deskripsi', 'required');
		}
		
	}

	public function index()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
        $data['title']		= 'Pengajuan Cuti';
        $data['cuti']	= $this->M_cuti->get_by_staf($id_pegawai)->result_array();
		$this->load->view('cuti/data', $data);
	}

	public function verifikasi_cuti()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
        $data['title']	= 'Verifikasi Pengajuan Cuti';
        $data['cuti']	= $this->M_cuti->get_data('0')->result_array();
		$this->load->view('cuti/verifikasi_cuti', $data);
	}

	public function verifikasi($id_cuti)
	{
		$data	= [
			'cuti_id'		=> $id_cuti,
			'cuti_status'	=> 1,
		];
		
		$this->M_cuti->update($data);
		$this->session->set_flashdata('msg', 'verifikasi');
		redirect('verifikasi-cuti');
	}

	public function data_cuti()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$id_jabatan = $this->session->userdata('jabatan_id');
        $data['title']	= 'Data Pengajuan Cuti';
        if(is_admin()){
        	$data['cuti']	= $this->db->select('*')->from('cuti')->where_not_in('cuti_status', '0')->get()->result_array();
        }elseif($id_jabatan == '1' || $id_jabatan == '2'){
        	$data['cuti']	= $this->M_cuti->get_by_pejabat($id_pegawai)->result_array();
        }elseif(is_pegawai()) {
        	$data['cuti']	= $this->M_cuti->get_by_atasan_langsung($id_pegawai)->result_array();
        }
        
		$this->load->view('cuti/data_cuti', $data);
	}

	public function detail($id_cuti)
	{
        $id_pegawai = $this->session->userdata('pegawai_id');
		$data['cuti']		= $this->M_cuti->get_by_id($id_cuti)->row_array();
		if ($id_pegawai == $data['cuti']['pegawai_id']) {
			$data['title']		= 'Pengajuan Cuti';
		} else {
			$data['title']		= 'Data Pengajuan Cuti';
		}
		$data['atasan']		= $this->M_pegawai->get_data()->result_array();
		$this->load->view('cuti/detail', $data);
	}

	public function tambah()
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Pengajuan Cuti';
			$data['pegawai']	= $this->db->get_where('pegawai', ['pegawai_id' => $id_pegawai])->row_array();
			$data['atasan']		= $this->M_pegawai->get_data()->result_array();
			$this->load->view('cuti/tambah', $data);
		} else {
			$id_jabatan = $this->session->userdata('jabatan_id');
			$a 			= $this->db->get_where('jabatan', ['jabatan_id' => $id_jabatan])->row_array();
			$get_atasan_langsung = $this->db->get_where('jabatan', ['jabatan_nama' => $a['jabatan_atasanlangsung']])->row_array();
			$get_pejabat = $this->db->get_where('jabatan', ['jabatan_nama' => 'Ketua Pengadilan'])->row_array();
			$id_atasan_langsung = $this->db->get_where('pegawai', ['jabatan_id' => $get_atasan_langsung['jabatan_id']])->row_array();
			$id_pejabat = $this->db->get_where('pegawai', ['jabatan_id' => $get_pejabat['jabatan_id']])->row_array();
			$data		= $this->input->post(null, true);
			$tahun 		= date('Y');
			$get_cuti 	= $this->db->query('SELECT MAX(cuti_nomor) as nomor FROM cuti where cuti_tanggal like "'.$tahun.'%" ')->row_array();
			$nomor = $get_cuti['nomor']+1;
			$data_user	= [
				'pegawai_id'	=> $data['pegawai_id'],
				'cuti_tanggal'	=> $data['cuti_tanggal'],
				'cuti_nomor'	=> $nomor,
				'cuti_jenis'	=> $data['cuti_jenis'],
				'cuti_alasan'	=> $data['cuti_alasan'],
				'cuti_lama'		=> $data['cuti_lama'],
				'cuti_awal'		=> $data['cuti_awal'],
				'cuti_akhir'	=> $data['cuti_akhir'],
				'cuti_no_hp'	=> $data['cuti_no_hp'],
				'cuti_alamat'	=> $data['cuti_alamat'],
				'cuti_atasanlangsung_id'		=> $id_atasan_langsung['pegawai_id'],
				'cuti_atasanlangsung_status'	=> 'Belum dikonfirmasi',
				'cuti_pejabat_id'				=> $id_pejabat['pegawai_id'],
				'cuti_pejabat_status'			=> 'Belum dikonfirmasi',
				'cuti_created'	=> date('Y-m-d H:i:s'),
			];

			if ($this->M_cuti->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-cuti');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('cuti');
			}
		}
	}

	public function edit($id_cuti)
	{
		$id_pegawai = $this->session->userdata('pegawai_id');
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Pengajuan Cuti';
			$data['pegawai']	= $this->db->get_where('pegawai', ['pegawai_id' => $id_pegawai])->row_array();
			$data['atasan']		= $this->M_pegawai->get_data()->result_array();
			$data['cuti']		= $this->M_cuti->get_by_id($id_cuti)->row_array();
			$this->load->view('cuti/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'cuti_id'		=> $id_cuti,
				'pegawai_id'	=> $data['pegawai_id'],
				'cuti_tanggal'	=> $data['cuti_tanggal'],
				'cuti_nomor'	=> $data['cuti_nomor'],
				'cuti_jenis'	=> $data['cuti_jenis'],
				'cuti_alasan'	=> $data['cuti_alasan'],
				'cuti_lama'		=> $data['cuti_lama'],
				'cuti_awal'		=> $data['cuti_awal'],
				'cuti_akhir'	=> $data['cuti_akhir'],
				'cuti_no_hp'	=> $data['cuti_no_hp'],
				'cuti_alamat'	=> $data['cuti_alamat'],
			];
			
			if ($this->M_cuti->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-cuti/'.$id_cuti);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('cuti');
			}
		}
	}

	public function edit_status($id_cuti, $tag)
	{
		$this->validation_status($tag);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Pengajuan Cuti';
			$data['cuti']	= $this->M_cuti->get_by_id($id_cuti)->row_array();
			$data['atasan']		= $this->M_pegawai->get_data()->result_array();
			$this->load->view('cuti/detail', $data);
		} else {
			$data		= $this->input->post(null, true);
			if($tag == 'atasan_langsung'){
				$data_user	= [
					'cuti_id'						=> $id_cuti,
					'cuti_atasanlangsung_status'	=> $data['cuti_atasanlangsung_status'],
					'cuti_atasanlangsung_deskripsi'	=> $data['cuti_atasanlangsung_deskripsi'],
					'cuti_status'					=> '2',
				];
			} elseif($tag == 'pejabat') {
				$data_user	= [
					'cuti_id'						=> $id_cuti,
					'cuti_pejabat_status'			=> $data['cuti_pejabat_status'],
					'cuti_pejabat_deskripsi'		=> $data['cuti_pejabat_deskripsi'],
					'cuti_status'					=> '3',
				];
			}
			
			
			if ($this->M_cuti->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('detail-cuti/'.$id_cuti);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('data-cuti/');
			}
		}
	}

	public function hapus($id_cuti)
	{
		$this->M_cuti->delete($id_cuti);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('cuti');
	}

	public function cetak($id_cuti)
	{
        $data['title']		= 'Pengajuan Cutii';
		$data['cuti']	= $this->M_cuti->get_by_id_cetak($id_cuti)->row_array();

		$tanggal = date('d-F-Y', strtotime($data['cuti']['cuti_tanggal']));
		$pch_tgl = explode('-', $tanggal);
		$bulan = $this->bulan($pch_tgl[1]);
		$data['tanggal_cuti'] = $pch_tgl[0].' '.$bulan.' '.$pch_tgl[2];

		$tanggal_awal = date('d-F-Y', strtotime($data['cuti']['cuti_awal']));
		$pch_tgl_awal = explode('-', $tanggal_awal);
		$bulan_awal = $this->bulan($pch_tgl_awal[1]);
		$data['tanggal_awal'] = $pch_tgl_awal[0].' '.$bulan_awal.' '.$pch_tgl_awal[2];

		$tanggal_akhir = date('d-F-Y', strtotime($data['cuti']['cuti_akhir']));
		$pch_tgl_akhir = explode('-', $tanggal_akhir);
		$bulan_akhir = $this->bulan($pch_tgl_akhir[1]);
		$data['tanggal_akhir'] = $pch_tgl_akhir[0].' '.$bulan_akhir.' '.$pch_tgl_akhir[2];
		
		$this->load->view('cuti/cetak', $data);
	}

	//RIWAYAT

	private function validation_riwayat()
	{
		$this->form_validation->set_rules('pegawai_id', 'Pegawai ID', 'required');
	}

	public function riwayat($id_pegawai = null)
	{
		if(empty($id_pegawai)){
			$this->validation_riwayat();
			if (!$this->form_validation->run()) {
				$data['title'] = 'Riwayat Pengajuan Cuti';
				$data['pegawai'] = $this->M_pegawai->get_data()->result_array();
				$this->load->view('cuti/riwayat', $data);
			} else {
				$data		= $this->input->post(null, true);
				$id_pegawai = $data['pegawai_id'];
				$data['title'] = 'Riwayat Pengajuan Cuti';
				$data['pegawai'] = $this->M_pegawai->get_by_id($id_pegawai)->row_array();
				$data['riwayat_cuti'] = $this->M_cuti->get_riwayat_by_pegawai($id_pegawai)->result_array();
				$this->load->view('cuti/riwayat', $data);
			}
		} else {
			$data['title'] = 'Riwayat Pengajuan Cuti';
			$data['pegawai'] = $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$data['riwayat_cuti'] = $this->M_cuti->get_riwayat_by_pegawai($id_pegawai)->result_array();
			$this->load->view('cuti/riwayat', $data);
		}
		
	}

	public function tambah_riwayat($id_pegawai)
	{
		$this->validation_riwayat();
		if (!$this->form_validation->run()) {
			$data['title'] = 'Tambah Riwayat Pengajuan Cuti';
			$data['pegawai'] = $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$this->load->view('cuti/tambah_riwayat', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_riwayat = [
				'pegawai_id' => $data['pegawai_id'],
				'riwayat_cuti_tahun' => $data['riwayat_cuti_tahun'],
				'riwayat_cuti_sisa' => $data['riwayat_cuti_sisa'],
				'riwayat_cuti_created'	=> date('Y-m-d H:i:s'),
			];
			if ($this->M_cuti->insert_riwayat($data_riwayat)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-riwayat-cuti/'.$id_pegawai);
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('riwayat-cuti/'.$id_pegawai);
			}
		}
	}

	public function edit_riwayat($id_riwayat_cuti, $id_pegawai)
	{
		$this->validation_riwayat();
		if (!$this->form_validation->run()) {
			$data['title'] = 'Edit Riwayat Pengajuan Cuti';
			$data['riwayat_cuti'] = $this->M_cuti->get_riwayat_by_id($id_riwayat_cuti)->row_array();
			$data['pegawai'] = $this->M_pegawai->get_by_id($id_pegawai)->row_array();
			$this->load->view('cuti/edit_riwayat', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_riwayat = [
				'pegawai_id' => $data['pegawai_id'],
				'riwayat_cuti_tahun' => $data['riwayat_cuti_tahun'],
				'riwayat_cuti_sisa' => $data['riwayat_cuti_sisa'],
			];
			if ($this->M_cuti->update_riwayat($data_riwayat)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-riwayat-cuti/'.$id_riwayat_cuti.'/'.$id_pegawai);
			} else {
				$this->session->set_flashdata('msg', 'info');
				redirect('riwayat-cuti/'.$id_pegawai);
			}
		}
	}

	public function hapus_riwayat($id_riwayat_cuti, $id_pegawai)
	{
		$this->M_cuti->delete_riwayat($id_riwayat_cuti);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('riwayat-cuti/'.$id_pegawai);
	}

	private function bulan($bulan)
    {
        $bulan=$bulan;
        switch ($bulan) {
          case 'January':
            $bulan= "Januari";
            break;
          case 'February':
            $bulan= "Februari";
            break;
          case 'March':
            $bulan= "Maret";
            break;
          case 'April':
            $bulan= "April";
            break;
          case 'May':
            $bulan= "Mei";
            break;
          case 'June':
            $bulan= "Juni";
            break;
          case 'July':
            $bulan= "Juli";
            break;
          case 'August':
            $bulan= "Agustus";
            break;
          case 'September':
            $bulan= "September";
            break;
          case 'October':
            $bulan= "Oktober";
            break;
          case 'November':
            $bulan= "November";
            break;
          case 'December':
            $bulan= "Desember";
            break;
          default:
            $bulan= "Isi variabel tidak di temukan";
            break;
        }

        return $bulan;
    }
}
