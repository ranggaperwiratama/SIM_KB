<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '512M');

class Tampil extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->library(array('Pagination','image_lib', 'session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'file'));
	}
	
	public function index() {
		$web['info']	= "";
		$this->load->view('login', $web);
	}

	public function do_login() {
		$web['info']	= "";
        $u = $this->security->xss_clean($this->input->post('u'));
        $p = md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT * FROM admin WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		
		
        if($j_cek == 1) {
            $data = array(
                    'user' => $d_cek->u,
                    'pass' => $d_cek->p,
					'validated' => true
                    );
            $this->session->set_userdata($data);
            redirect('manage');
        } else {	
			$web['info']	= "<div style='margin: 15px 15px -10px 15px; background: red; padding: 5px 0 5px 0; text-align: center'>Username atau Password Salah</div>";
			$this->load->view('login', $web);
		}
	}
}