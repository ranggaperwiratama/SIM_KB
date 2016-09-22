<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');

class manage extends CI_Controller {
	function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');    
    }
	public function index() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$m['page']		= "awal";
		$this->load->view('manage/tampil', $m);
	}
	public function wil_pus() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$idp					= addslashes($this->input->post('idp'));
		$kode_rt				= addslashes($this->input->post('kode_rt'));
		$kode_rw				= addslashes($this->input->post('kode_rw'));
		$kode_kelurahan			= addslashes($this->input->post('kode_kelurahan'));
		$kode_kecamatan			= addslashes($this->input->post('kode_kecamatan'));
		$nama_kelompok_kb		= addslashes($this->input->post('nama_kelompok_kb'));
		$nama_ketua				= addslashes($this->input->post('nama_ketua'));
		$nama_plkb				= addslashes($this->input->post('nama_plkb'));
		$tahun_pus				= addslashes($this->input->post('tahun_pus'));
		
		$m['data']		= $this->db->query("SELECT * FROM wilayah_pus 
			JOIN master_rt ON wilayah_pus.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_pus.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_pus.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_pus.kode_kecamatan=master_kecamatan.kode_kecamatan")->result();
		$m['page']		= "v_wil_pus";
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM wilayah_pus WHERE id_wilayah_pus = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_pus');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_wil_pus";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM wilayah_pus WHERE id_wilayah_pus = '$idu'")->row();	
			$m['page']			= "f_wil_pus";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO wilayah_pus VALUES ('', '$kode_rt', '$kode_rw', '$kode_kelurahan', '$kode_kecamatan', '$nama_kelompok_kb', '$nama_ketua', '$nama_plkb', '$tahun_pus')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambah</div>");
			redirect('manage/wil_pus');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE wilayah_pus SET kode_rt = '$kode_rt', kode_rw = '$kode_rw', kode_kelurahan = '$kode_kelurahan', kode_kecamatan = '$kode_kecamatan', nama_kelompok_kb = '$nama_kelompok_kb', nama_ketua = '$nama_ketua', nama_plkb = '$nama_plkb', tahun_pus = '$tahun_pus' WHERE id_wilayah_pus = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/wil_pus');
		} else {
			$m['page']	= "v_wil_pus";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function wil_bkb() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$idp					= addslashes($this->input->post('idp'));
		$kode_rt				= addslashes($this->input->post('kode_rt'));
		$kode_rw				= addslashes($this->input->post('kode_rw'));
		$kode_kelurahan			= addslashes($this->input->post('kode_kelurahan'));
		$kode_kecamatan			= addslashes($this->input->post('kode_kecamatan'));
		$nama_kelompok		    = addslashes($this->input->post('nama_kelompok'));
		$nama_ketua				= addslashes($this->input->post('nama_ketua'));
		$nama_pembina			= addslashes($this->input->post('nama_pembina'));
		$tahun_bkb					= addslashes($this->input->post('tahun_bkb'));
		
		$m['data']		= $this->db->query("SELECT * FROM wilayah_bkb")->result();
		$m['page']		= "v_wil_bkb";
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM wilayah_bkb WHERE id_wilayah_bkb = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkb');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_wil_bkb";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM wilayah_bkb WHERE id_wilayah_bkb = '$idu'")->row();	
			$m['page']			= "f_wil_bkb";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO wilayah_bkb VALUES ('', '$kode_rt', '$kode_rw', '$kode_kelurahan', '$kode_kecamatan', '$nama_kelompok', '$nama_ketua', '$nama_pembina', '$tahun_bkb')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambah</div>");
			redirect('manage/wil_bkb');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE wilayah_bkb SET kode_rt = '$kode_rt', kode_rw = '$kode_rw', kode_kelurahan = '$kode_kelurahan', kode_kecamatan = '$kode_kecamatan', nama_kelompok_bkb = '$nama_kelompok', nama_ketua_bkb = '$nama_ketua', nama_pembina_bkb = '$nama_pembina', tahun_bkb = '$tahun_bkb' WHERE id_wilayah_bkb = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/wil_bkb');
		} else {
			$m['page']	= "v_wil_bkb";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function wil_bkr() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$idp					= addslashes($this->input->post('idp'));
		$kode_rt				= addslashes($this->input->post('kode_rt'));
		$kode_rw				= addslashes($this->input->post('kode_rw'));
		$kode_kelurahan			= addslashes($this->input->post('kode_kelurahan'));
		$kode_kecamatan			= addslashes($this->input->post('kode_kecamatan'));
		$nama_kelompok		    = addslashes($this->input->post('nama_kelompok'));
		$nama_ketua				= addslashes($this->input->post('nama_ketua'));
		$nama_pembina			= addslashes($this->input->post('nama_pembina'));
		$tahun_bkr					= addslashes($this->input->post('tahun_bkr'));
		
		$m['data']		= $this->db->query("SELECT * FROM wilayah_bkr")->result();
		$m['page']		= "v_wil_bkr";
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM wilayah_bkr WHERE id_wilayah_bkr = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkr');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_wil_bkr";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM wilayah_bkr WHERE id_wilayah_bkr = '$idu'")->row();	
			$m['page']			= "f_wil_bkr";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO wilayah_bkr VALUES ('', '$kode_rt', '$kode_rw', '$kode_kelurahan', '$kode_kecamatan', '$nama_kelompok', '$nama_ketua', '$nama_pembina', '$tahun_bkr')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambah</div>");
			redirect('manage/wil_bkr');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE wilayah_bkr SET kode_rt = '$kode_rt', kode_rw = '$kode_rw', kode_kelurahan = '$kode_kelurahan', kode_kecamatan = '$kode_kecamatan', nama_kelompok_bkr = '$nama_kelompok', nama_ketua_bkr = '$nama_ketua', nama_pembina_bkr = '$nama_pembina', tahun_bkr = '$tahun_bkr' WHERE id_wilayah_bkr = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/wil_bkr');
		} else {
			$m['page']	= "v_wil_bkr";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function wil_bkl() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$idp					= addslashes($this->input->post('idp'));
		$kode_rt				= addslashes($this->input->post('kode_rt'));
		$kode_rw				= addslashes($this->input->post('kode_rw'));
		$kode_kelurahan			= addslashes($this->input->post('kode_kelurahan'));
		$kode_kecamatan			= addslashes($this->input->post('kode_kecamatan'));
		$nama_kelompok		    = addslashes($this->input->post('nama_kelompok'));
		$nama_ketua				= addslashes($this->input->post('nama_ketua'));
		$nama_pembina			= addslashes($this->input->post('nama_pembina'));
		$tahun_bkl					= addslashes($this->input->post('tahun_bkl'));
		
		$m['data']		= $this->db->query("SELECT * FROM wilayah_bkl")->result();
		$m['page']		= "v_wil_bkl";
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM wilayah_bkl WHERE id_wilayah_bkl = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkl');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_wil_bkl";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM wilayah_bkl WHERE id_wilayah_bkl = '$idu'")->row();	
			$m['page']			= "f_wil_bkl";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO wilayah_bkl VALUES ('', '$kode_rt', '$kode_rw', '$kode_kelurahan', '$kode_kecamatan', '$nama_kelompok', '$nama_ketua', '$nama_pembina', '$tahun_bkl')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambah</div>");
			redirect('manage/wil_bkl');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE wilayah_bkl SET kode_rt = '$kode_rt', kode_rw = '$kode_rw', kode_kelurahan = '$kode_kelurahan', kode_kecamatan = '$kode_kecamatan', nama_kelompok_bkl = '$nama_kelompok', nama_ketua_bkl = '$nama_ketua', nama_pembina_bkl = '$nama_pembina', tahun_bkl = '$tahun_bkl' WHERE id_wilayah_bkl = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/wil_bkl');
		} else {
			$m['page']	= "v_wil_bkl";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function pre_register_pus() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$ke				= $this->uri->segment(3);
		$id_kelompok_kb		= $this->uri->segment(4);
		$id_pus		= $this->uri->segment(6);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_pus")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_pus ORDER BY id_wilayah_pus DESC")->result();
		$m['page']	= "b_pus";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_pus 
			JOIN master_rt ON wilayah_pus.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_pus.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_pus.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_pus.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_pus = '$id_kelompok_kb'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$m['kode_bulan'] 		=$kode_bulan;
				$m['pembinaan'] = $this->db->query("SELECT * FROM hasil_pembinaan_pus JOIN pasangan_usia_subur ON hasil_pembinaan_pus.id_pus=pasangan_usia_subur.id_pus WHERE kode_bulan = '".$kode_bulan."'")->result();
				$m['jumlah_pus'] 		= $this->db->query("SELECT count(id_pus) FROM pasangan_usia_subur WHERE id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['iud_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mow_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mop_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['k_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['ipn_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['s_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['p_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['iud_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mow_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mop_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['k_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['ipn_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['s_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['p_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['iud_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mow_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['mop_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['k_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['ipn_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['s_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['p_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['h'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'H' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['ias'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IAS' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['iat'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IAT' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$m['tia'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'TIAL' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM pasangan_usia_subur WHERE id_pus = '$id_pus'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('/manage/pre_register_pus/baca/'.$idp."#komentar");
		}			
		else {
			redirect('manage/wil_pus');
		}
		
	}
	
	public function register_pus() {
		$isteri	= addslashes($this->input->post('isteri'));
		$suami	= addslashes($this->input->post('suami'));
		$umur_isteri	= addslashes($this->input->post('umur_isteri'));
		$jumlah_anak	= addslashes($this->input->post('jumlah_anak'));
		$umur_anak_terkecil	= addslashes($this->input->post('umur_anak_terkecil'));
		$tahapan_ks	= addslashes($this->input->post('tahapan_ks'));
		$peserta_jamkesnas	= addslashes($this->input->post('peserta_jamkesnas'));
		$keikutsertaan_kb	= addslashes($this->input->post('keikutsertaan_kb'));
		$pemerintah_swasta = addslashes($this->input->post('pemerintah_swasta'));
		$id		= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO pasangan_usia_subur VALUES ('', '$isteri', '$suami', '$umur_isteri', '$jumlah_anak', '$umur_anak_terkecil', '$tahapan_ks', '$peserta_jamkesnas', '$keikutsertaan_kb', '$id', '$pemerintah_swasta')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_pus/baca/'.$id."#komentar");
	}
	public function pre_register_bkb() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkb	= $this->uri->segment(4);
		$id_bkb		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkb")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkb ORDER BY id_wilayah_bkb DESC")->result();
		$m['page']	= "b_bkb";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkb WHERE id_wilayah_bkb =  '$id_kelompok_bkb'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkb WHERE id_bkb = '$id_bkb'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkb');
		}			
		else {
			redirect('manage/wil_bkb');
		}
		
	}
	
	public function register_bkb() {
		$nama_keluarga	= addslashes($this->input->post('nama_keluarga'));
		$kat_1	= addslashes($this->input->post('kat_1'));
		$kat_2	= addslashes($this->input->post('kat_2'));
		$kat_3	= addslashes($this->input->post('kat_3'));
		$kat_4	= addslashes($this->input->post('kat_4'));
		$kat_5	= addslashes($this->input->post('kat_5'));
		$kat_6	= addslashes($this->input->post('kat_6'));
		$kka	= addslashes($this->input->post('kka'));
		$kesertaan_bkb	= addslashes($this->input->post('kesertaan_bkb'));
		$tahapan_ks	= addslashes($this->input->post('tahapan_ks'));
		$keikutsertaan_kb	= addslashes($this->input->post('keikutsertaan_kb'));
		$status_pus = addslashes($this->input->post('status_pus'));
		$id		= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO bkb VALUES ('', '$id', '$nama_keluarga', '$kat_1', '$kat_2', '$kat_3', '$kat_4', '$kat_5', '$kat_6', '$kka', '$kesertaan_bkb', '$status_pus', '$keikutsertaan_kb', '$tahapan_ks')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('manage/pre_register_bkb/baca/'.$id."#komentar");
	}	
	public function pre_register_bkl() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkl	= $this->uri->segment(4);
		$id_bkl		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkl")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkl ORDER BY id_wilayah_bkl DESC")->result();
		$m['page']	= "b_bkl";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkl WHERE id_wilayah_bkl =  '$id_kelompok_bkl'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkl WHERE id_bkl = '$id_bkl'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkl');
		}			
		else {
			redirect('manage/wil_bkl');
		}
		
	}
	
	public function register_bkl() {
		$nama_keluarga	= addslashes($this->input->post('nama_keluarga'));
		$kesertaan_bkl	= addslashes($this->input->post('kesertaan_bkl'));
		$tahapan_ks	= addslashes($this->input->post('tahapan_ks'));
		$keikutsertaan_kb	= addslashes($this->input->post('keikutsertaan_kb'));
		$status_pus = addslashes($this->input->post('status_pus'));
		$id		= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO bkl VALUES ('', '$id', '$nama_keluarga', '$tahapan_ks', '$kesertaan_bkl', '$status_pus', '$keikutsertaan_kb')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('manage/wil_bkl');
	}
	public function pre_register_bkr() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkr	= $this->uri->segment(4);
		$id_bkr		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkr")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkr ORDER BY id_wilayah_bkr DESC")->result();
		$m['page']	= "b_bkr";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkr WHERE id_wilayah_bkr =  '$id_kelompok_bkr'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkr WHERE id_bkr = '$id_bkr'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkr');
		}			
		else {
			redirect('manage/wil_bkr');
		}
		
	}
	
	public function register_bkr() {
		$nama_keluarga	= addslashes($this->input->post('nama_keluarga'));
		$kesertaan_bkr	= addslashes($this->input->post('kesertaan_bkr'));
		$tahapan_ks	= addslashes($this->input->post('tahapan_ks'));
		$keikutsertaan_kb	= addslashes($this->input->post('keikutsertaan_kb'));
		$status_pus = addslashes($this->input->post('status_pus'));
		$id		= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO bkr VALUES ('', '$id', '$nama_keluarga', '$tahapan_ks', '$kesertaan_bkr', '$status_pus', '$keikutsertaan_kb')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('manage/wil_bkr');
	}
	public function bulan_pembinaan(){
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$m['page']	= "b_pus";
		$m['data']	= $this->db->query("SELECT * FROM hasil_pembinaan_pus WHERE kode_bulan = '".$kode_bulan."' AND id_pus =  '".$data->ID_PUS."'")->result();
		$this->load->view('manage/tampil', $m);
	}
	public function register_pembinaan_pus() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$kps_ksi	= addslashes($this->input->post('kps_ksi'));
		$tahun	= addslashes($this->input->post('tahun'));
		$pbi	= addslashes($this->input->post('pbi'));
		$tahapan_ks	= addslashes($this->input->post('tahapan_ks'));
		$non_jkn	= addslashes($this->input->post('non_jkn'));
		$bukan_pbi = addslashes($this->input->post('bukan_pbi'));
		$id		= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO hasil_pembinaan_pus VALUES ('', '$kode_bulan', '$id', '$id_wilayah', '$tahapan_ks', '$kps_ksi', '$pbi', '$bukan_pbi', '$non_jkn', '$tahun')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_pus/baca/'.$id_wilayah.'/');
	}
	public function laporan_pus() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kode_kecamatan	= addslashes($this->input->post('kode_kecamatan'));
		$m['page']	= "l_pus";
		$m['total_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn!='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['total_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['total_aktif_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE seluruh_tahapan_ks!='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['total_aktif_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE seluruh_tahapan_ks='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['total_aktif_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE pbi!='' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['total_aktif_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE pbi='' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['iud_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mow_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mop_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['kondom_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['implan_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['suntik_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['pil_pemerintah'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (bukan_pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();		
		$m['iud_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['mow_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['mop_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['kondom_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['implan_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['suntik_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['pil_swasta'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE non_jkn='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan'")->result();
		$m['iud_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iud_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='IUD' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mow_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mow_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='MOW' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mop_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mop_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='MOP' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['k_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['k_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='K' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ipn_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ipn_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='IPN' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['s_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['s_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='S' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['p_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['p_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='P' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['h_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['h_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='H' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ias_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ias_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='IAS' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iat_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iat_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='IAT' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['tia_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (seluruh_tahapan_ks!='' AND pbi='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND bukan_pbi='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (seluruh_tahapan_ks!='' AND non_jkn='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['tia_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (kps_ksi!='' AND pbi='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND bukan_pbi='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan') OR (kps_ksi!='' AND non_jkn='TIA' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mow_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='MOW' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mow_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='MOW' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iud_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IUD' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iud_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='IUD' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mop_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='MOP' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['mop_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='MOP' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['k_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='K' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['k_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='K' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ipn_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IPN' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ipn_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='IPN' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['s_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='S' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['s_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='S' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['p_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='P' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['p_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='P' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['h_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='H' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['h_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='H' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ias_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IAS' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['ias_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='IAS' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iat_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='IAT' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['iat_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='IAT' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['tia_pbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (pbi='TIA' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['tia_nonpbi'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM hasil_pembinaan_pus JOIN wilayah_pus ON hasil_pembinaan_pus.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE (bukan_pbi='TIA' AND non_jkn='' AND kode_bulan='$kode_bulan' AND kode_kecamatan = '$kode_kecamatan')")->result();
		$m['tot_kps'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM pasangan_usia_subur JOIN wilayah_pus ON pasangan_usia_subur.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE ((tahapan_ks_pus='I' OR tahapan_ks_pus='') AND kode_kecamatan = '2')")->result();
		$m['tot_ks'] 		= $this->db->query("SELECT COUNT(id_pus) AS tot FROM pasangan_usia_subur JOIN wilayah_pus ON pasangan_usia_subur.id_wilayah_pus=wilayah_pus.id_wilayah_pus WHERE ((tahapan_ks_pus='II' OR tahapan_ks_pus='III' OR tahapan_ks_pus='III+') AND kode_kecamatan = '2')")->result();
		
		$this->load->view('manage/tampil', $m);
	}
	public function laporan_pembinaan_pus() {
		$id_kelompok_kb	= addslashes($this->input->post('id'));
		$m['page']	= "l_pembinaan_pus";
		$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_pus 
			JOIN master_rt ON wilayah_pus.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_pus.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_pus.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_pus.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_pus = '$id_kelompok_kb'");
			$m['baca']	= $q_ambil_kelompok->row();
			$m['jumlah_pus'] 		= $this->db->query("SELECT count(id_pus) AS tot FROM pasangan_usia_subur WHERE id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['iud_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mow_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mop_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['k_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['ipn_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['s_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['p_swasta'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' and PEMERINTAH_SWASTA = 0 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['iud_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mow_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mop_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['k_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['ipn_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['s_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['p_pem'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' and PEMERINTAH_SWASTA = 1 AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['iud_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'I' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mow_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOW' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['mop_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'MOP' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['k_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'K' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['ipn_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IPN' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['s_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'S' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['p_tot'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'P' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['h'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'H' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['ias'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IAS' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['iat'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'IAT' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$m['tia'] 		= $this->db->query("SELECT COUNT(KEIKUTSERTAAN_KB_PUS) as tot FROM pasangan_usia_subur WHERE KEIKUTSERTAAN_KB_PUS = 'TIAL' AND id_wilayah_pus = '$id_kelompok_kb'")->result();
			$this->load->view('manage/tampil', $m);
	}
	public function register_absensi_bkb() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkb VALUES ('', '$id', '$kode_bulan', 0)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkb/baca/'.$id_wilayah."#komentar2");
	}
	public function register_presensi_bkb() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkb VALUES ('', '$id', '$kode_bulan', 1)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkb/baca/'.$id_wilayah."#komentar2");
	}
	public function rekap_bkb() {
		$m['id_wilayah_bkb'] 		= addslashes($this->input->post('id_wilayah_bkb'));
		$m['page']	= "l_bkb";
		$this->load->view('manage/tampil', $m);
	}
	public function register_absensi_bkr() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkr VALUES ('', '$id', '$kode_bulan', 0)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkr/baca/'.$id_wilayah."#komentar2");
	}
	public function register_presensi_bkr() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkr VALUES ('', '$id', '$kode_bulan', 1)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkr/baca/'.$id_wilayah."#komentar2");
	}
	public function rekap_bkr() {
		$m['id_wilayah_bkr'] 		= addslashes($this->input->post('id_wilayah_bkr'));
		$m['page']	= "l_bkr";
		$this->load->view('manage/tampil', $m);
	}
	public function register_absensi_bkl() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkl VALUES ('', '$kode_bulan', '$id', 0)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkl/baca/'.$id_wilayah."#komentar2");
	}
	public function register_presensi_bkl() {
		$kode_bulan	= addslashes($this->input->post('kode_bulan'));
		$kehadiran = addslashes($this->input->post('kehadiran'));
		$id		= addslashes($this->input->post('id'));
		$id_wilayah	= addslashes($this->input->post('id_wilayah'));
		$this->db->query("INSERT INTO presensi_bkl VALUES ('', '$kode_bulan', '$id', 1)");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_bkl/baca/'.$id_wilayah."#komentar2");
	}
	public function rekap_bkl() {
		$m['id_wilayah_bkl'] 		= addslashes($this->input->post('id_wilayah_bkl'));
		$m['page']	= "l_bkl";
		$this->load->view('manage/tampil', $m);
	}
	public function wil_uppks() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		
		$mau_ke					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$idp					= addslashes($this->input->post('idp'));
		$kode_rt				= addslashes($this->input->post('kode_rt'));
		$kode_rw				= addslashes($this->input->post('kode_rw'));
		$kode_kelurahan			= addslashes($this->input->post('kode_kelurahan'));
		$kode_kecamatan			= addslashes($this->input->post('kode_kecamatan'));
		$sumber_modal_saat_ini		= addslashes($this->input->post('sumber_modal_saat_ini'));
		$nama_kelompok_uppks			= addslashes($this->input->post('nama_kelompok_uppks'));
		$jenis_usaha				= addslashes($this->input->post('jenis_usaha'));
		$sumber_dana_pernah_diperoleh				= addslashes($this->input->post('sumber_dana_pernah_diperoleh'));
		$total_modal_saat_ini				= addslashes($this->input->post('total_modal_saat_ini'));
		$nama_ketua_uppks				= addslashes($this->input->post('nama_ketua_uppks'));
		$tgl_lahir_ketua_uppks				= addslashes($this->input->post('tgl_lahir_ketua_uppks'));
		$no_telp				= addslashes($this->input->post('no_telp'));
		$no_fax				= addslashes($this->input->post('no_fax'));
		$no_hp				= addslashes($this->input->post('no_hp'));
		$email				= addslashes($this->input->post('email'));
		$kode_pos				= addslashes($this->input->post('kode_pos'));
		
		$m['data']		= $this->db->query("SELECT * FROM wilayah_uppks 
			JOIN master_rt ON wilayah_uppks.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_uppks.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_uppks.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_uppks.kode_kecamatan=master_kecamatan.kode_kecamatan")->result();
		$m['page']		= "v_wil_uppks";
		
		if ($mau_ke == "del") {
			$this->db->query("DELETE FROM wilayah_uppks WHERE id_wilayah_uppks = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_uppks');
		} else if ($mau_ke == "add") {
			$m['page']	= "f_wil_uppks";
		} else if ($mau_ke == "edit") {
			$m['datpil']		= $this->db->query("SELECT * FROM wilayah_uppks WHERE id_wilayah_uppks = '$idu'")->row();	
			$m['page']			= "f_wil_uppks";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO wilayah_uppks VALUES ('', '$kode_rt', '$kode_rw', '$kode_kelurahan', '$kode_kecamatan', '$sumber_modal_saat_ini', '$nama_kelompok_uppks', '$jenis_usaha', '$sumber_dana_pernah_diperoleh', '$total_modal_saat_ini', '$nama_ketua_uppks', '$tgl_lahir_ketua_uppks', '$no_telp', '$no_fax', '$no_hp', '$email', '$kode_pos')");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil ditambah</div>");
			redirect('manage/wil_uppks');
		} else if ($mau_ke == "act_edit") {			
			$this->db->query("UPDATE wilayah_uppks SET kode_rt='$kode_rt', kode_rw='$kode_rw', kode_kelurahan='$kode_kelurahan', kode_kecamatan='$kode_kecamatan', sumber_modal_saat_ini='$sumber_modal_saat_ini', nama_kelompok_uppks='$nama_kelompok_uppks', jenis_usaha='$jenis_usaha', sumber_dana_pernah_diperoleh='$sumber_dana_pernah_diperoleh', total_modal_saat_ini='$total_modal_saat_ini', nama_ketua_uppks='$nama_ketua_uppks', 'tgl_lahir_ketua=$tgl_lahir_ketua_uppks', no_telp='$no_telp', no_fax='$no_fax', no_hp='$no_hp', email='$email', kode_pos='$kode_pos' WHERE id_wilayah_uppks = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil diedit</div>");
			redirect('manage/wil_uppks');
		} else {
			$m['page']	= "v_wil_uppks";
		}

		$this->load->view('manage/tampil', $m);
	}
	public function pre_register_uppks() {
		if(! $this->session->userdata('validated')){
            redirect('tampil');
        }
		$ke				= $this->uri->segment(3);
		$id_kelompok_kb		= $this->uri->segment(4);
		$id_pus		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_uppks")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_uppks ORDER BY id_wilayah_uppks DESC")->result();
		$m['page']	= "b_uppks";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_uppks 
			JOIN master_rt ON wilayah_uppks.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_uppks.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_uppks.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_uppks.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_uppks = '$id_kelompok_kb'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM anggota_uppks WHERE id_anggota_uppks = '$id_pus'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('/manage/pre_register_uppks/baca/'.$idp."#komentar");
		}			
		else {
			redirect('manage/wil_pus');
		}
		
	}
	public function register_uppks() {
		$nama_anggota	= addslashes($this->input->post('nama_anggota'));
		$jabatan	= addslashes($this->input->post('jabatan'));
		$ks_kps	= addslashes($this->input->post('ks_kps'));
		$ks_ks	= addslashes($this->input->post('ks_ks'));
		$pus_kps	= addslashes($this->input->post('pus_kps'));
		$pus_ks	= addslashes($this->input->post('pus_ks'));
		$kb_kps	= addslashes($this->input->post('kb_kps'));
		$kb_ks	= addslashes($this->input->post('kb_ks'));
		$kb_mandiri	= addslashes($this->input->post('kb_mandiri'));
		$jenis_usaha_sub	= addslashes($this->input->post('jenis_usaha_sub'));
		$jumlah_modal	= addslashes($this->input->post('jumlah_modal'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO anggota_uppks VALUES ('', '$nama_anggota', '$id', '$kb_mandiri', '$jenis_usaha_sub', '$jumlah_modal', '$ks_kps', '$ks_ks', '$pus_kps', '$pus_ks', '$kb_kps', '$kb_ks', '$jabatan')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_uppks/baca/'.$id."#komentar");
	}
	public function pre_register_potensi_bkb() {
		if(! $this->session->userdata('validated')){
			redirect('tampil');
		}
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkb	= $this->uri->segment(4);
		$id_bkb		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkb")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkb ORDER BY id_wilayah_bkb DESC")->result();
		$m['page']	= "b_potensi_bkb";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkb WHERE id_wilayah_bkb =  '$id_kelompok_bkb'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$m['kka'] = $this->db->query("SELECT COUNT(id_bkb) AS tot FROM bkb WHERE KKA='1' AND id_wilayah_bkb =  '$id_kelompok_bkb'")->result();
				$m['tot_keluarga'] = $this->db->query("SELECT COUNT(id_bkb) AS tot FROM bkb WHERE ID_WILAYAH_BKB='$id_kelompok_bkb' AND KATEGORI_UMUR_1='1' OR KATEGORI_UMUR_2='1' OR KATEGORI_UMUR_3='1' OR KATEGORI_UMUR_4='1' OR KATEGORI_UMUR_5='1' OR KATEGORI_UMUR_6='1'")->result();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkb WHERE id_bkb = '$id_bkb'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkb');
		}			
		else {
			redirect('manage/wil_bkb');
		}
	}
	public function register_info_bkb() {
		$sk	= addslashes($this->input->post('sk'));
		$sertifikasi	= addslashes($this->input->post('sertifikasi'));
		$keterpaduan	= addslashes($this->input->post('keterpaduan'));
		$bkb_kit	= addslashes($this->input->post('bkb_kit'));
		$kka	= addslashes($this->input->post('kka'));
		$tot_keluarga	= addslashes($this->input->post('tot_keluarga'));
		$sumber_dana	= addslashes($this->input->post('sumber_dana'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kelompok_bkb VALUES ('', '$id', '$sk', '$sertifikasi', '$keterpaduan', '$bkb_kit', '$kka', '$tot_keluarga', '$sumber_dana')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkb/baca/'.$id."#komentar");
	}
	public function register_penyuluhan_bkb() {
		$judul	= addslashes($this->input->post('judul'));
		$materi	= addslashes($this->input->post('materi'));
		$diskusi	= addslashes($this->input->post('diskusi'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO kegiatan_penyuluhan_bkb VALUES ('', '$id', '$judul', '$materi', '$diskusi')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkb/baca/'.$id."#komentar4");
	}
	public function register_kader_bkb() {
		$jabatan	= addslashes($this->input->post('jabatan'));
		$nama	= addslashes($this->input->post('nama'));
		$pendidikan	= addslashes($this->input->post('pendidikan'));
		$pelatihan	= addslashes($this->input->post('pelatihan'));
		$pekerjaan	= addslashes($this->input->post('pekerjaan'));
		$pus	= addslashes($this->input->post('pus'));
		$kb	= addslashes($this->input->post('kb'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kader_bkb VALUES ('', '$id', '$nama', '$pendidikan', '$pelatihan', '$pekerjaan', '$pus', '$kb', '$jabatan')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkb/baca/'.$id."#komentar2");
	}
	public function pre_register_potensi_bkr() {
		if(! $this->session->userdata('validated')){
			redirect('tampil');
		}
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkr	= $this->uri->segment(4);
		$id_bkr		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkr")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkr ORDER BY id_wilayah_bkr DESC")->result();
		$m['page']	= "b_potensi_bkr";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkr WHERE id_wilayah_bkr =  '$id_kelompok_bkr'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkr WHERE id_bkr = '$id_bkr'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkr');
		}			
		else {
			redirect('manage/wil_bkr');
		}
	}
	public function register_info_bkr() {
		$sk	= addslashes($this->input->post('sk'));
		$sertifikasi	= addslashes($this->input->post('sertifikasi'));
		$keterpaduan	= addslashes($this->input->post('keterpaduan'));
		$buku_bkr	= addslashes($this->input->post('buku_bkr'));
		$sumber_dana	= addslashes($this->input->post('sumber_dana'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kelompok_bkr VALUES ('', '$id', '$sk', '$sertifikasi', '$keterpaduan', '$buku_bkr', '$sumber_dana')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkr/baca/'.$id."#komentar");
	}
	public function register_penyuluhan_bkr() {
		$judul	= addslashes($this->input->post('judul'));
		$materi	= addslashes($this->input->post('materi'));
		$diskusi	= addslashes($this->input->post('diskusi'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO kegiatan_penyuluhan_bkr VALUES ('', '$id', '$judul', '$materi', '$diskusi')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkr/baca/'.$id."#komentar4");
	}
	public function register_kader_bkr() {
		$jabatan	= addslashes($this->input->post('jabatan'));
		$nama	= addslashes($this->input->post('nama'));
		$pendidikan	= addslashes($this->input->post('pendidikan'));
		$pelatihan	= addslashes($this->input->post('pelatihan'));
		$pekerjaan	= addslashes($this->input->post('pekerjaan'));
		$pus	= addslashes($this->input->post('pus'));
		$kb	= addslashes($this->input->post('kb'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kader_bkr VALUES ('', '$id', '$jabatan', '$nama', '$pendidikan', '$pelatihan', '$pekerjaan', '$pus', '$kb')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkr/baca/'.$id."#komentar2");
	}
	public function pre_register_potensi_bkl() {
		if(! $this->session->userdata('validated')){
			redirect('tampil');
		}
		$ke				= $this->uri->segment(3);
		$id_kelompok_bkl	= $this->uri->segment(4);
		$id_bkl		= $this->uri->segment(5);
		
		$total_rows		= $this->db->query("SELECT * FROM wilayah_bkl")->num_rows();
		
		
		$m['blog'] 		= $this->db->query("SELECT * FROM wilayah_bkl ORDER BY id_wilayah_bkl DESC")->result();
		$m['page']	= "b_potensi_bkl";
				
		if ($ke == "baca") {
			$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkl WHERE id_wilayah_bkl =  '$id_kelompok_bkl'");
			if ($q_ambil_kelompok->num_rows() == NULL) {
				redirect('index.php/manage/invalid');
			} else {
				$m['baca']	= $q_ambil_kelompok->row();
				$this->load->view('manage/tampil', $m);
			}
		}
		else if ($ke == "hapus") {
			$this->db->query("DELETE FROM bkl WHERE id_bkl = '$id_bkl'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\">Data berhasil dihapus </div>");
			redirect('manage/wil_bkl');
		}			
		else {
			redirect('manage/wil_bkl');
		}
	}
	public function register_info_bkl() {
		$sk	= addslashes($this->input->post('sk'));
		$sertifikasi	= addslashes($this->input->post('sertifikasi'));
		$keterpaduan	= addslashes($this->input->post('keterpaduan'));
		$buku_bkl	= addslashes($this->input->post('buku_bkl'));
		$sumber_dana	= addslashes($this->input->post('sumber_dana'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kelompok_bkl VALUES ('', '$id', '$sk', '$sertifikasi', '$keterpaduan', '$buku_bkl', '$sumber_dana')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkl/baca/'.$id."#komentar");
	}
	public function register_penyuluhan_bkl() {
		$judul	= addslashes($this->input->post('judul'));
		$materi	= addslashes($this->input->post('materi'));
		$diskusi	= addslashes($this->input->post('diskusi'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO kegiatan_penyuluhan_bkl VALUES ('', '$id', '$judul', '$materi', '$diskusi')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkl/baca/'.$id."#komentar4");
	}
	public function register_kader_bkl() {
		$jabatan	= addslashes($this->input->post('jabatan'));
		$nama	= addslashes($this->input->post('nama'));
		$pendidikan	= addslashes($this->input->post('pendidikan'));
		$pelatihan	= addslashes($this->input->post('pelatihan'));
		$pekerjaan	= addslashes($this->input->post('pekerjaan'));
		$pus	= addslashes($this->input->post('pus'));
		$kb	= addslashes($this->input->post('kb'));
		$id	= addslashes($this->input->post('id'));
		$this->db->query("INSERT INTO info_kader_bkl VALUES ('', '$id', '$jabatan', '$nama', '$pendidikan', '$pelatihan', '$pekerjaan', '$pus', '$kb')");
		$this->session->set_flashdata("k", "<div class='alert alert-success'>Data terkirim</div>");
		redirect('/manage/pre_register_potensi_bkl/baca/'.$id."#komentar2");
	}
	public function laporan_potensi_bkb() {
		$id_kelompok_kb	= addslashes($this->input->post('id'));
		$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkb JOIN master_rt ON wilayah_bkb.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_bkb.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_bkb.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_bkb.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_bkb =  '$id_kelompok_kb'");
		$m['baca']	= $q_ambil_kelompok->row();
		$m['kps_ksi'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (tahapan_ks_bkb ='S' AND id_wilayah_bkb =  '$id_kelompok_kb') or (tahapan_ks_bkb ='I' AND id_wilayah_bkb =  '$id_kelompok_kb')")->result();
		$m['seluruh_tahap_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE tahapan_ks_bkb != '' AND id_wilayah_bkb =  '$id_kelompok_kb'")->result();
		$m['anggota_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['anggota_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();
		$m['pus_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (status_pus_bkb='1' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (status_pus_bkb='1' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['pus_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (status_pus_bkb='1' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['iud_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='IUD' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='IUD' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['iud_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='IUD' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['mow_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='MOW' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='MOW' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['mow_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='MOW' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['k_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='K' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='K' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['k_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='K' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['mop_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='MOP' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='MOP' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['mop_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='MOP' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['ipn_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='IPN' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='IPN' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['ipn_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='IPN' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['s_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='S' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='S' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['s_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='S' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['p_kps'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='P' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='S') OR (kesertaan_kb_bkb='P' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb='I')")->result();
		$m['p_ks'] 		= $this->db->query("SELECT COUNT(id_bkb) as tot FROM bkb WHERE (kesertaan_kb_bkb='P' AND kesertaan_bkb='1' AND id_wilayah_bkb='$id_kelompok_kb' AND tahapan_ks_bkb!='')")->result();	
		$m['page']	= "l_potensi_bkb";
		$this->load->view('manage/tampil', $m);
	}
	public function laporan_potensi_bkr() {
		$id_kelompok_kb	= addslashes($this->input->post('id'));
		$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkr WHERE id_wilayah_bkr =  '$id_kelompok_kb'");
		$m['baca']	= $q_ambil_kelompok->row();
		$m['page']	= "l_potensi_bkr";
		$this->load->view('manage/tampil', $m);
	}
	public function laporan_potensi_bkl() {
		$id_kelompok_kb	= addslashes($this->input->post('id'));
		$q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkl WHERE id_wilayah_bkl =  '$id_kelompok_kb'");
		$m['baca']	= $q_ambil_kelompok->row();
		$m['page']	= "l_potensi_bkl";
		$this->load->view('manage/tampil', $m);
	}
	public function laporan_uppks() {
		$id	= addslashes($this->input->post('id'));
		$m['page']	= "l_uppks";
		$m['baca']	= $this->db->query("SELECT * FROM wilayah_uppks 
			JOIN master_rt ON wilayah_uppks.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_uppks.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_uppks.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_uppks.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_uppks = '".$id."'")->result();
		$m['data'] 		= $this->db->query("SELECT * FROM anggota_uppks WHERE id_wilayah_uppks = '".$id."'")->result();
		
		$this->load->view('manage/tampil', $m);
	}
}
?>
