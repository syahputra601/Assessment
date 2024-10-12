<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_angka_kredit extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('M_angka_kredit'));
		$p = $this->system_model->getMenuId('C_angka_kredit');
		$this->d = $this->system_model->getPermission($this->session->role,$p);
		$this->pg = 'C_angka_kredit';
	}
	public function index(){
		if($this->user_model->getSecure()) {
			if($this->d['r']==1){
				$output['permit'] = $this->d;
				$data['list_angka_kredit'] = $this->M_angka_kredit->list_angka_kreditNew();
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_masterpranata/angka_kredit', $data);
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}
	public function edit($id){
		if($this->user_model->getSecure()) {
			if($this->d['w']==1){
				$output['res'] = $this->M_angka_kredit->list_angka_kreditEditNew($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_masterpranata/edit_angka_kredit');
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}
	public function insert()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				//print_r($_POST);die();
				$nip = $_POST['nip'];
				$tahun = $_POST['thn'];
				$tingkat = $_POST['tingkat'];
				$unsur = $_POST['unsur'];
				$sub_unsur = $_POST['sub_unsur'];
				$butir_kegiatan = $_POST['butir_kegiatan'];
				$angka_kredit = $_POST['angka_kredit'];
				//$sertifikat = $_POST['sertifikat'];
				$upload = $this->M_angka_kredit->upload();
				$cekPersonil = $this->M_angka_kredit->cekPersonil($nip);
				if($cekPersonil == 1){
					if($upload['result'] == "success"){ // Jika proses upload sukses
				        // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				        $this->M_angka_kredit->add_angka_kreditNew($upload,$nip,$tahun,$tingkat,$unsur,$sub_unsur,$butir_kegiatan,$angka_kredit);
						$data['list_angka_kredit'] = $this->M_angka_kredit->list_angka_kreditNew();
						//$data['error'] = "";
						//redirect($this->pg, $data);
						$output['permit'] = $this->d;
						$this->load->view('elemen/header',$output);
						$this->load->view('elemen/nav');
						$this->load->view('v_masterpranata/angka_kredit', $data);
						$this->load->view('elemen/footer');
						//redirect($this->pg);
					}else{ // Jika proses upload gagal
				        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				        echo "<script>alert('Harap masukan file sertifikat. ".$upload['error']."');</script>";
	                	redirect($this->pg,'refresh');
				    }
				}else{
					echo "<script>alert('Gagal! Nip : ".$nip." belum terdata.');</script>";
                	redirect('C_angka_kredit','refresh');
				}
			}else{
				redirect($this->pg);	
			}
		}else{
			$this->login();
		}
	}

	public function update()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				//print_r($_POST);die();
				$id = $_POST['idu'];
				$nip = $_POST['nipu'];
				$tahun = $_POST['thn'];
				$tingkat = $_POST['tingkat'];
				$unsur = $_POST['unsur'];
				$sub_unsur = $_POST['sub_unsur'];
				$butir_kegiatan = $_POST['butir_kegiatan'];
				$angka_kredit = $_POST['angka_kredit'];

				$upload = $this->M_angka_kredit->upload();

					//if($upload['result'] == "success"){ // Jika proses upload sukses
				        // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				        $this->M_angka_kredit->edit_angka_kreditNew($upload,$id,$nip,$tahun,$tingkat,$unsur,$sub_unsur,$butir_kegiatan,$angka_kredit);
						//$data['error'] = "";
						//redirect($this->pg, $data);
						// $output['res'] = $this->M_angka_kredit->list_angka_kreditEditNew($id);
						// $this->load->view('elemen/header',$output);
						// $this->load->view('elemen/nav');
						// $this->load->view('v_masterpranata/edit_angka_kredit');
						// $this->load->view('elemen/footer');
						redirect($this->pg);
					// }else{ // Jika proses upload gagal
					//         $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
					// }
				}else{
					redirect($this->pg);	
				}
			}else{
				redirect('home');	
			}
	}
	
	public function delete($id)
	{
		if($this->user_model->getSecure()){
			if($this->d['d']==1){
				$this->M_angka_kredit->delete_angka_kreditNew($id, $data);
				redirect($this->pg);
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}

	//START REVISI CODING NEW 
	function get_unsur(){
        $tingkat=$this->input->post('tingkat');
        $data=$this->M_angka_kredit->get_unsur($tingkat);
        echo json_encode($data);
    }

    function get_sub_unsur(){
        $unsur=$this->input->post('unsur');
        $data=$this->M_angka_kredit->get_SubUnsur($unsur);
        echo json_encode($data);
    }

    function get_butir_kegiatan(){
        $sub_unsur=$this->input->post('sub_unsur');
        $data=$this->M_angka_kredit->get_ButirKegiatan($sub_unsur);
        echo json_encode($data);
    }

    function get_angka_kredit(){
        $butir_kegiatan=$this->input->post('butir_kegiatan');
        $data=$this->M_angka_kredit->get_AngkaKredit($butir_kegiatan);
        echo json_encode($data);
    }



	//END REVISI CODING NEW 
}