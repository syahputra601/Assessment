<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model(array('unit_model','M_user'));
		$this->load->library('encrypt');
		$p = $this->system_model->getMenuId('user');
		$this->d = $this->system_model->getPermission($this->session->role,$p);
		$this->pg = 'user';
	}

	//start coding revisi
	public function index(){
		if($this->user_model->getSecure()) {
			if($this->d['r']==1){
				if($this->input->post('Add_User', TRUE) == "AddUser"){
					$nip = $this->input->post('nip', TRUE);
					$username = $this->input->post('username', TRUE);
					$full_name = $this->input->post('full_name', TRUE);
					$password = $this->input->post('password', TRUE);
					$user = $this->input->post('user', TRUE);
					$status = $this->input->post('status', TRUE);
					$cekPersonil = $this->M_user->cekPersonil($nip);
					if($cekPersonil == 1){
						$cekUsername = $this->M_user->cekUsernameAdd($username);
						if($cekUsername == 1){
							echo "<script>alert('Failed, Insert Username : ".$username.". Data Already Exist.');</script>";
                			redirect('User','refresh');
						}elseif($cekUsername == 2){
							//action add
							$var = $this->M_user->addUser($nip,$username,$full_name,$password,$user,$status);
							if($var == 1){
								echo "<script>alert('Success Add User with Username : ".$username."');</script>";
		                		redirect('User','refresh');
							}else{
								echo "<script>alert('Failed Add User with Username : ".$username."');</script>";
		                		redirect('User','refresh');
							}
						}elseif($cekUsername == 3){
							echo "<script>alert('Failed, Insert Username : ".$username.". Data More Than One.');</script>";
                			redirect('User','refresh');
						}else{
							echo "<script>alert('Process Check Username Failed.');</script>";
                			redirect('User','refresh');
						}
					}else{
						echo "<script>alert('Nip : ".$nip." belum terdata.');</script>";
                		redirect('User','refresh');
					}
				}elseif($this->input->post('Update_User', TRUE) == "UpdateUser"){
					$id = $this->input->post('idu', TRUE);
					$nip = $this->input->post('nipu', TRUE);
					$username = $this->input->post('username', TRUE);
					$full_name = $this->input->post('full_name', TRUE);
					$new_password = $this->input->post('new_password', TRUE);
					$user = $this->input->post('user', TRUE);
					$status = $this->input->post('status', TRUE);
					// print_r($_POST);die();
					if($new_password != ""){
						$var = $this->M_user->editUserWithPassword($id,$nip,$username,$full_name,$new_password,$user,$status);
					}else{
						$var = $this->M_user->editUserWithNoPassword($id,$nip,$username,$full_name,$user,$status);
					}
					if($var == 1){
						echo "<script>alert('Success Update User with Username : ".$username."');</script>";
                		redirect('User','refresh');
					}elseif($var == 2){
						echo "<script>alert('Username : ".$username." Already Exist.');</script>";
                		redirect('User','refresh');
					}
					else{
						echo "<script>alert('Failed Action Update.');</script>";
                		redirect('User','refresh');
					}
				}else{
					$output['permit'] = $this->d;
					$data['list_user'] = $this->M_user->list_user();
					$this->load->view('elemen/header',$output);
					$this->load->view('elemen/nav');
					$this->load->view('v_user/user',$data);
					$this->load->view('elemen/footer');
				}
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}

	public function edit($id=''){
		if($this->user_model->getSecure()) {
			if($this->d['w']==1){
				$output['res'] = $this->M_user->list_UserEditNew($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_user/edit_user');
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}

	public function delete($id='')
	{
		if($this->user_model->getSecure()){
			if($this->d['d']==1){
				$this->M_user->deleteUser($id);
				redirect('User');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}

	//end coding revisi

	public function editOLD($id){
		if($this->user_model->getSecure()) {
			if($this->d['w']==1){
				$output['res'] = $this->user_model->list_user($id);
				$this->load->view('elemen/header',$output);
				$this->load->view('elemen/nav');
				$this->load->view('v_user/edit_user');
				$this->load->view('elemen/footer');
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}	
	}
	public function setting(){
		if($this->user_model->getSecure()){
			$output['res'] = $this->user_model->list_user($this->session->idu);
			$this->load->view('elemen/header',$output);
			$this->load->view('elemen/nav');
			$this->load->view('v_user/userpanel');
			$this->load->view('elemen/footer');
		}else{
			$this->load->view('home');
		}
	}
	public function insert()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				$this->form_validation->set_rules('unit_id', 'Unit', 'required');
		
				$this->form_validation->set_rules('role_id', 'Role', 'required');
		
				if ($this->form_validation->run() != FALSE)
		
				{
					$data = array(
			
								'unit_id' => $_POST['unit_id'],
			
								'role_id' => $_POST['role_id'],
			
								'user_fullname' => $_POST['user_fullname'],
			
								'email' => $_POST['email'],
			
								'user_password' => md5($_POST['password']),
			
								'user_name' => $_POST['user_name'],
			
								'notelp' => $_POST['telp'],
			
								'active' => $_POST['active'],
								'created_id' => $this->session->idu
			
							);
					$this->db->insert('users', $data);
					redirect($this->pg);
				}
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}
	public function update()
	{
		if($this->user_model->getSecure()){
			if($this->d['w']==1){
				$data = array(
						  'unit_id' => $_POST['unit_id'],
	  
						  'role_id' => $_POST['role_id'],
	  
						  'user_fullname' => $_POST['user_fullname'],
	  
						  'email' => $_POST['email'],
	  
						  'user_name' => $_POST['user_name'],
	  
						  'notelp' => $_POST['telp'],
	  
						  'active' => $_POST['active'],
		
					);
				if(!empty($_POST['password'])){
					$data['user_password']=md5($_POST['password']);
				}
				$this->db->where('user_id', $_POST['idu']);
				$this->db->update('users', $data);
				redirect($this->pg);
			}else{
				redirect('home');	
			}
		}else{
			$this->login();
		}
	}
	
	public function updatesetting()
	{
		if($this->user_model->getSecure()){
			$data = array(
  
					  'user_fullname' => $_POST['user_fullname'],
  
					  'email' => $_POST['email'],
  
					  'user_name' => $_POST['user_name'],
  
					  'notelp' => $_POST['telp']
	
				);
			if(!empty($_FILES['profpict']['tmp_name'])){
				// $config['upload_path'] = './assets/images/';
				// $config['allowed_types'] = 'gif|jpg|png';
				// $config['max_size'] = 2000;
				// $config['file_name'] = $_FILES['profpict']['name'];
				$lokasi_file    = $_FILES['profpict']['tmp_name'];
				$tipe_file      = $_FILES['profpict']['type'];
				$nama_file      = $_FILES['profpict']['name'];
				//if($this->base_model->getTypeImages($tipe_file)){
					$nmf = $this->base_model->rnamef($nama_file);
					unlink('assets/images/'.$this->session->picture);
					$data['profpict']=$nmf;
					move_uploaded_file($lokasi_file,'assets/images/'.$nmf);
					$_SESSION['picture'] = $nmf;
				//}
				// Load library upload
				// $this->load->library('upload', $config);
				
				// Jika terdapat error pada proses upload maka exit
				// if (!$this->upload->do_upload('profpict')) {
				// 	exit($this->upload->display_errors());
				// }				
			}
			if(!empty($_POST['password'])){
				$data['user_password']=md5($_POST['password']);
			}
				$_SESSION['nmuser'] = $_POST['user_fullname'];
				$_SESSION['email'] = $_POST['email'];
			$this->db->where('user_id', $this->session->idu);
			$this->db->update('users', $data);
			redirect('user/setting');
		}else{
			$this->login();
		}
	}
	public function login() {
		$this->load->view('login');
	}
}