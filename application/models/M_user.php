<?php
  class M_user extends CI_model {
	  	public function __construct() {
			parent::__construct();
			$this->load->database();
		}

	//start coding revisi
	public function list_user() {  
		$this->db->select('*');
		$this->db->from('users');
		//if(!empty($id)){ $this->db->where('user_id',$id); }
		return $this->db->get()->result();
	}

	public function deleteUser($id=''){
		$this->db->where('user_id',$id);
		return $this->db->delete('users');
	}

	public function list_UserEditNew($id='') {
        $this->db->where('user_id', $id);
        $result = $this->db->get('users')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

	public function cekUsernameEdit($username='',$id=''){
        $cekUsername = $this->db->query("SELECT * FROM users where user_name ='".$username."'")->num_rows();
        //echo $this->db->last_query();
        //print_r($cekUsername);die();
        //Get data username
        $getIdUsername = "SELECT user_id FROM users WHERE user_name = '" . $this->db->escape_str($username) . "' ";
        $query = $this->db->query($getIdUsername);
        $getIdUsername = $query->result();

        foreach ($getIdUsername as $value) {
            $IDUser = $value->user_id;
        }

        if($cekUsername == 0 OR $id == $IDUser){//jika data tidak ada yang sama
            $varUsernameEdit = 0;
            return $varUsernameEdit;
        }
        // elseif($cekUsername == 0 OR $id != $IDUser){//jika data ada = 1 atau lebih
        //     $varUsernameTwo = 2;
        //     return $varUsernameTwo;
        // }
        else{//jka action cek username gagal
            $varUsernameEdit = 1;
            return $varUsernameEdit;
        }
	}

    public function editUserWithPassword($id,$nip,$username,$full_name,$new_password,$user,$status){
    	$varUsernameEdit = $this->cekUsernameEdit($username,$id);
    	//print_r($varUsernameEdit);die();
    	if($varUsernameEdit == 0){//jika data tidak ada yang sama
    		$NEWpassword = md5($new_password);
			$data = array(
					"nip" => $nip,
					"user_name" => $username,
					"user_fullname" => $full_name,
					"user_password" => $NEWpassword,
					"role_id" => $user,
					"active" => $status
				);
			$this->db->where('user_id',$id);
			$insertEditUser = $this->db->update('users',$data);
			if($insertEditUser == 1){
				$var = 1;
    			return $var;
			}else{
				$var = 0;
    			return $var;
			}
    	}else{
    		$var = 2;
    		return $var;
    	}
	}

	public function editUserWithNoPassword($id,$nip,$username,$full_name,$user,$status){
		$varUsernameEdit = $this->cekUsernameEdit($username,$id);
    	if($varUsernameEdit == 0){//jika dat tidak ada yang sama
    		$data = array(
					"nip" => $nip,
					"user_name" => $username,
					"user_fullname" => $full_name,
					"role_id" => $user,
					"active" => $status
				);
			$this->db->where('user_id',$id);
			$insertEditUser = $this->db->update('users',$data);
			// print_r($insertEditUser);die();
			if($insertEditUser == 1){
				$var = 1;
    			return $var;
			}else{
				$var = 0;
    			return $var;
			}
    	}else{
    		$var = 2;
    		return $var;
    	}
	}

	public function cekPersonil($nip=''){
		$cekPersonil = $this->db->query("SELECT * FROM personil where nip ='".$nip."'")->num_rows();
		if($cekPersonil == 1){
			$var = 1;
			return $var;
		}else{
			$var = 0;
			return $var;
		}
	}

	public function cekUsernameAdd($username=''){
		$cekUsername = $this->db->query("SELECT * FROM users where user_name ='".$username."'")->num_rows();
		if($cekUsername == 1){
			$var = 1;
			return $var;
		}
		elseif($cekUsername < 2 OR $cekUsername == 0){//jika data ada == 1
			$var = 2;
			return $var;
		}
		elseif($cek > 1){//jika data lebih dari 1
            $var = 3;
            return $var;
        }else{//jika process pengecekan gagal
            $var = 0;
            return $var;
        }
	}

	public function addUser($nip,$username,$full_name,$password,$user,$status){
		$md5_password = md5($password);
			$data = array(
					"nip" => $nip,
					"user_name" => $username,
					"user_fullname" => $full_name,
					"user_password" => $md5_password,
					"role_id" => $user,
					"active" => $status
				);
		return $this->db->insert('users',$data);
	}

	//end coding revisi

		public function add_user($data){
			return $this->db->insert('users',$data);
		}

		public function edit_user($param,$data){
			$this->db->where('user_id',$param);
			return $this->db->update('users',$data);
		}

		
  }
  
 
 