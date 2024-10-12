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

class M_angka_kredit extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//parent::Model();
        $this->load->database();
	}
	public function list_angka_kredit($id=null,$par=null,$args=null){
		$this->db->select('id,nip,tahun,format(periode1,0) ak1,format(periode2,0) ak2,format(total,0) jumlah');
		$this->db->from('master_pranata a');
		$this->db->order_by('id','desc');
		if(!empty($id)){ $this->db->where('id',$id); }
		if(!empty($par)){ if($par=='y'){ $par=0; }$this->db->where('unit_parent',$par); }
		if(!empty($args) && is_array($args)){ $this->db->where_in('id',$args); }
		$this->db->order_by('id', 'ASC');
		return $this->db->get();
	}
	public function add_angka_kredit($data){
		return $this->db->insert('master_pranata',$data);
	}
	public function edit_angka_kredit($param,$data){
		$this->db->where('id',$param);
		return $this->db->update('master_pranata',$data);
	}
	
	public function delete_angka_kredit($param){
		$this->db->where('id',$param);
		return $this->db->delete('master_pranata');
	}

	//START CODING REVISI NEW
	function get_unsur($tingkat=''){
        $hasil=$this->db->query("SELECT * FROM master_unsur WHERE tingkat = '$tingkat' ");
        //print_r($hasil);die();
        //ORDER BY master_unsur.kd_unsur ASC
        return $hasil->result();
    }

    function get_SubUnsur($unsur=''){
        $hasil=$this->db->query("SELECT * FROM master_subunsur WHERE kd_unsur = '$unsur' ");
        //print_r($hasil);die();
        //ORDER BY master_unsur.kd_unsur ASC
        return $hasil->result();
    }

    function get_ButirKegiatan($sub_unsur=''){
        $hasil=$this->db->query("SELECT * FROM master_butir_kegiatan WHERE kd_subunsur = '$sub_unsur' ");
        //print_r($hasil);die();
        //ORDER BY master_unsur.kd_unsur ASC
        return $hasil->result();
    }

    function get_AngkaKredit($butir_kegiatan=''){
        $hasil=$this->db->query("SELECT * FROM master_butir_kegiatan WHERE kd_butirkegiatan = '$butir_kegiatan' ");
        //print_r($hasil);die();
        //ORDER BY master_unsur.kd_unsur ASC
        return $hasil->result();
    }

    public function list_angka_kreditNew() {
    	$ROLE = $this->session->role;
    	$NIP = $this->session->nip;
    	if($ROLE == 3){
    		$this->db->where('nip', $NIP);
    		$result = $this->db->get('master_pranatas')->result();
    		return $result;
    	}else{
    		$result = $this->db->get('master_pranatas')->result();
    		return $result;
    	}
        //$result = $this->db->get('master_pranatas')->result();
        // echo $this->db->last_query();
        // die();
        
    }

    public function select_DataUnsur($tingkat='') {
        $this->db->where('tingkat', $tingkat);
        $result = $this->db->get('master_unsur')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

     public function select_DataSubUnsur($sub_unsur='') {
        $this->db->where('sub_unsur', $sub_unsur);
        $result = $this->db->get('master_subunsur')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

     public function select_DataButirKegiatan($sub_unsur='') {
     	$getSubUnsur=$this->db->query("SELECT * FROM master_subunsur WHERE sub_unsur = '$sub_unsur' ");
		foreach ($getSubUnsur->result() as $row_subunsur) {
			$SUB_UNSUR = $row_subunsur->kd_subunsur;
		}

        $this->db->where('kd_subunsur', $SUB_UNSUR);
        $result = $this->db->get('master_butir_kegiatan')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

	public function edit_angka_kreditNew($upload='',$id='',$nip='',$tahun='',$tingkat='',$unsur='',$sub_unsur='',$butir_kegiatan='',$angka_kredit=''){
		//print_r($angka_kredit);die();

			// 'nama_file' => $upload['file']['file_name'],
	  //    	'ukuran_file' => $upload['file']['file_size'],
	  //    	'tipe_file' => $upload['file']['file_type']
		$this->db->where('id',$id);
	    $query = $this->db->get('master_pranatas');
	    $row = $query->row();
	    $SERTIFIKAT = $row->sertifikat;

		if($upload['file']['file_name'] != ''){
			$filename = $upload['file']['file_name'];
		}else{
			$filename = $SERTIFIKAT;
		}

		

		//start get data unsur
		$getUnsur=$this->db->query("SELECT * FROM master_unsur WHERE kd_unsur = '$unsur' ");
		foreach ($getUnsur->result() as $row_unsur) {
			$UNSUR = $row_unsur->unsur;
		}
		//end get data unsur

		//start get data sub unsur
		$getSubUnsur=$this->db->query("SELECT * FROM master_subunsur WHERE kd_subunsur = '$sub_unsur' ");
		foreach ($getSubUnsur->result() as $row_sub_unsur) {
			$SUB_UNSUR = $row_sub_unsur->sub_unsur;
		}
		//end get data sub unsur

		//start get data butir kegiatan
		$getButirKegiatan=$this->db->query("SELECT * FROM master_butir_kegiatan WHERE kd_butirkegiatan = '$butir_kegiatan' ");
		foreach ($getButirKegiatan->result() as $row_butir_kegiatan) {
			$BUTIR_KEGIATAN = $row_butir_kegiatan->butir_kegiatan;
			$ANGKA_KREDIT = $row_butir_kegiatan->angka_kredit;
		}
		//end get data butir kegiatan

			$data = array(
					"nip" => $nip,
					"tahun" => $tahun,
					"tingkat" => $tingkat,
					"unsur" => $UNSUR,
					"sub_unsur" => $SUB_UNSUR,
					"butir_kegiatan" => $BUTIR_KEGIATAN,
					"angka_kredit" => $angka_kredit,
					"sertifikat" => $filename//$upload['file']['file_name']
				);
		$this->db->where('id',$id);
		return $this->db->update('master_pranatas',$data);
	}

	public function add_angka_kreditNew($upload='',$nip='',$tahun='',$tingkat='',$unsur='',$sub_unsur='',$butir_kegiatan='',$angka_kredit=''){
		//print_r($angka_kredit);die();

			// 'nama_file' => $upload['file']['file_name'],
	  //    	'ukuran_file' => $upload['file']['file_size'],
	  //    	'tipe_file' => $upload['file']['file_type']

		//start get data unsur
		$getUnsur=$this->db->query("SELECT * FROM master_unsur WHERE kd_unsur = '$unsur' ");
		foreach ($getUnsur->result() as $row_unsur) {
			$UNSUR = $row_unsur->unsur;
		}
		//end get data unsur

		//start get data sub unsur
		$getSubUnsur=$this->db->query("SELECT * FROM master_subunsur WHERE kd_subunsur = '$sub_unsur' ");
		foreach ($getSubUnsur->result() as $row_sub_unsur) {
			$SUB_UNSUR = $row_sub_unsur->sub_unsur;
		}
		//end get data sub unsur

		//start get data butir kegiatan
		$getButirKegiatan=$this->db->query("SELECT * FROM master_butir_kegiatan WHERE kd_butirkegiatan = '$butir_kegiatan' ");
		foreach ($getButirKegiatan->result() as $row_butir_kegiatan) {
			$BUTIR_KEGIATAN = $row_butir_kegiatan->butir_kegiatan;
			$ANGKA_KREDIT = $row_butir_kegiatan->angka_kredit;
		}
		//end get data butir kegiatan

		//start add total or update total for laporan
		$replaceAngkaKredit = str_replace(',', '.', $angka_kredit);
		$cekNip=$this->db->query("SELECT * FROM laporan_angka_kredit WHERE nip='$nip'");
        if($cekNip->num_rows() == 1){//jika data nip sudah ada
        	//start coding get data total in table laporan angka kredit
        	$getAngkaKredit=$this->db->query("SELECT * FROM laporan_angka_kredit WHERE nip = '$nip' ");
			foreach ($getAngkaKredit->result() as $row_angka_kredit) {
				$TOTAL = $row_angka_kredit->total;
			}
        	//end coding get data total in table laporan angka kredit
        	$sumTotal = $replaceAngkaKredit + $TOTAL;
        	$replaceSumTotal = str_replace('.', ',', $sumTotal);
        	$dataUpdateLaporan = array(
					"nip" => $nip,
					"total" => $replaceSumTotal
				);
			$this->db->where('nip',$nip);
			$this->db->update('laporan_angka_kredit',$dataUpdateLaporan);
        }else{//jika data nip belum ada
        	$dataAddLaporan = array(
					"nip" => $nip,
					"total" => $replaceAngkaKredit
				);
		 	$this->db->insert('laporan_angka_kredit',$dataAddLaporan);
        }
		//end add total or update total for laporan		

			$data = array(
					"nip" => $nip,
					"tahun" => $tahun,
					"tingkat" => $tingkat,
					"unsur" => $UNSUR,
					"sub_unsur" => $SUB_UNSUR,
					"butir_kegiatan" => $BUTIR_KEGIATAN,
					"angka_kredit" => $angka_kredit,
					"sertifikat" => $upload['file']['file_name']
				);
		return $this->db->insert('master_pranatas',$data);
	}

    public function list_angka_kreditEditNew($id='') {
        $this->db->where('id', $id);
        $result = $this->db->get('master_pranatas')->result();
        // echo $this->db->last_query();
        // die();
        return $result;
    }

	public function delete_angka_kreditNew($param){
		$this->db->where('id',$param);
	    $query = $this->db->get('master_pranatas');
	    $row = $query->row();
	    unlink("./sertifikat/$row->sertifikat");
		$this->db->where('id',$param);		
		return $this->db->delete('master_pranatas');
	}

	// Fungsi untuk melakukan proses upload file
  	public function upload(){
	    $config['upload_path'] = './sertifikat/';
	    $config['allowed_types'] = 'jpg|png|jpeg|pdf';
	    $config['max_size']  = '2048';
	    $config['remove_space'] = TRUE;
	  
	    $this->load->library('upload', $config); // Load konfigurasi uploadnya
	    if($this->upload->do_upload('sertifikat')){ // Lakukan upload dan Cek jika proses upload berhasil
	      // Jika berhasil :
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }else{
	      // Jika gagal :
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
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

	//END CODING REVISI NEW

}