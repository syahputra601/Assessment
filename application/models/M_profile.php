<?php	if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP 5
 *
 * Application System Environment (X-ASE)
 * laxono :  Rapid Development Framework (http://www.laxono.us)
 * Copyright 2011-2015.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource system_model.php
 * @copyright Copyright 2011-2015, laxono.us.
 * @author blx
 * @package 
 * @subpackage	
 * @since Agustus 2018, 
 * @version 
 * @modifiedby 
 * @lastmodified	
 *
 *
 */

class M_profile extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		//parent::Model();
        $this->load->database();
	}

	public function getDataProfil(){
		$nip = $this->session->nip;
		// $this->db->where('nip', $nip);
  //       $result = $this->db->get('users')->result();
  //       // echo $this->db->last_query();
  //       // die();
  //       return $result;

        // $this->db->select('tahun,a.nip,nama,nama_pangkat,a.kd_jabatan,a.kd_pangkat,nama_jabatan,d.tingkat,d.unsur,d.sub_unsur,d.butir_kegiatan,d.angka_kredit,e.total');
        $this->db->select('a.nama,d.nip,a.tgl_lahir,d.notelp,d.alamat,d.gender,d.email,c.nama_pangkat,c.golongan,b.nama_jabatan,a.bidang,a.kd_pangkat,a.kd_jabatan');
		$this->db->from('jabatan b ,pangkat c,personil a, users d');
		$this->db->where('a.kd_jabatan=b.kd_jabatan and a.kd_jabatan NOT IN ("PR")');
		$this->db->where('a.kd_pangkat=c.kd_pangkat and a.kd_pangkat NOT IN ("PR")');
		$this->db->where('a.nip=d.nip and a.nip='.$nip.' ');
		//$this->db->group_by('d.nip');
		//$this->db->order_by('d.id ASC');
		$result = $this->db->get('')->result();;
		//print_r($result);die();
		return $result;
	}

	public function select_DataPangkat() {
        // $this->db->where('sub_unsur', $sub_unsur);
        $result = $this->db->get('pangkat')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

    public function select_DataJabatan() {
        // $this->db->where('sub_unsur', $sub_unsur);
        $result = $this->db->get('jabatan')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }


	public function UpdateDataProfile($nip='',$nama_lengkap='',$tanggal_lahir='',$no_telepon='',$alamat='',$gender='',$email='',$pangkat='',$jabatan='',$bidang=''){
		//print_r($angka_kredit);die();

		$dataPersonil = array(
					"tgl_lahir" => $tanggal_lahir,
					"kd_jabatan" => $jabatan,
					"kd_pangkat" => $pangkat,
					"bidang" => $bidang
				);
		$this->db->where('nip',$nip);
		$this->db->update('personil',$dataPersonil);

			$dataUsers = array(
					"gender" => $gender,
					"notelp" => $no_telepon,
					"alamat" => $alamat,
					"email" => $email
				);
		$this->db->where('nip',$nip);
		return $this->db->update('users',$dataUsers);
	}

}