<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('M_profile'));
		$this->pg = 'C_angka_kredit';	
	}	

	public function index(){
		if($this->user_model->getSecure()) {
			if($this->input->post('Update') == "UpdateProfile"){
				$nip = $this->input->post('nip',TRUE);
				$nama_lengkap = $this->input->post('nama_lengkap',TRUE);
				$tanggal_lahir = $this->input->post('tanggal_lahir',TRUE);
				$no_telepon = $this->input->post('no_telepon',TRUE);
				$alamat = $this->input->post('alamat',TRUE);
				$gender = $this->input->post('gender',TRUE);
				$email = $this->input->post('email',TRUE);
				$pangkat = $this->input->post('pangkat',TRUE);
				$jabatan = $this->input->post('jabatan',TRUE);
				$bidang = $this->input->post('bidang',TRUE);

				$var = $this->M_profile->UpdateDataProfile($nip,$nama_lengkap,$tanggal_lahir,$no_telepon,$alamat,$gender,$email,$pangkat,$jabatan,$bidang);
				if($var == 1){
					echo "<script>alert('Update Data Profile Success.');</script>";
                	redirect('Profile','refresh');
				}else{
					echo "<script>alert('Failed Update Data Profile.');</script>";
                	redirect('Profile','refresh');
				}
				$data['dataProfile'] = $this->M_profile->getDataProfil();
				$data['selectPangkat'] = $this->M_profile->select_DataPangkat();
				$data['selectJabatan'] = $this->M_profile->select_DataJabatan();
				$this->load->view('elemen/header');
				$this->load->view('elemen/nav');
				$this->load->view('v_profile/profile', $data);
				$this->load->view('elemen/footer');
			}else{
				$data['dataProfile'] = $this->M_profile->getDataProfil();
				$data['selectPangkat'] = $this->M_profile->select_DataPangkat();
				$data['selectJabatan'] = $this->M_profile->select_DataJabatan();
				$this->load->view('elemen/header');
				$this->load->view('elemen/nav');
				$this->load->view('v_profile/profile', $data);
				$this->load->view('elemen/footer');
			}
		}else{
			$this->login();
		}
	}

	public function login() {
		$this->load->view('login');
	}

}
		