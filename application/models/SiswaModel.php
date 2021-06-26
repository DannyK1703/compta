<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SiswaModel extends CI_Model {
	public function view(){
		return $this->db->get('balance')->result(); 
	}
	public function view2(){
		return $this->db->get('balance_n')->result(); 
	}
	public function bilantA(){
		return $this->db->get('bilant_a')->result(); 
	}
	public function bilantP(){
		return $this->db->get('bilant_p')->result();
	}
	public function viewA(){
		$this->db->select("intitule,sold_I_deb,sold_F_deb");
		$this->db->from('balance');
		$data=array();
		$a=$this->db->get()->result();
		foreach($a as $i){
			if($i->sold_F_deb!=0){
				array_push($data,$i);
			}
		}
		return $data; 
	}
	public function rtat(){
		$this->db->select("intitule,Exercice_31_12_n,Exercice_31_12_n_1");
		$this->db->from('bilant_a');
		$data=array();
		$a=$this->db->get()->result();
		$this->db->select("intitule,Exercice_31_12_n,Exercice_31_12_n_1");
		$this->db->from('bilant_p');
		$b=$this->db->get()->result();
		foreach($a as $i){
				array_push($data,$i);
		}
		foreach($b as $j){
			array_push($data,$j);
		}
		return $data; 
	}
	public function viewB(){
		$this->db->select("intitule,sold_I_cred,sold_F_cred");
		$this->db->from('balance');
		$data=array();
		$a=$this->db->get()->result();
		foreach($a as $i){
			if($i->sold_F_cred!=0){
				array_push($data,$i);
			}
		}
		return $data; 
	}
	public function view2A(){
		$this->db->select("intitule,sold_I_cred,sold_F_cred");
		$this->db->from('balance_n');
		$data=array();
		$a=$this->db->get()->result();
		foreach($a as $i){
			if($i->sold_F_cred!=0){
				array_push($data,$i);
			}
		}
		return $data; // Tampilkan semua data yang ada di tabel siswa
	}
	public function view2B(){
		$this->db->select("intitule,sold_I_deb,sold_F_deb");
		$this->db->from('balance_n');
		$data=array();
		$a=$this->db->get()->result();
		foreach($a as $i){
			if($i->sold_F_deb!=0){
				array_push($data,$i);
			}
		}
		return $data; // Tampilkan semua data yang ada di tabel siswa
	}
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		 
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function insert_multiple($data,$table){
		$this->db->insert_batch($table, $data);
	}
	public function delete_multiple($table){
		$this->db->empty_table($table);
		

	}
	public function addBilant_A($date){
		$a=$this->bilantA();
		$i=0;
		foreach($a as $chose){
			if($date['intitule']==$chose->intitule){
				$this->db->set($date);
				$this->db->where(array('intitule'=>$date['intitule']));
				$this->db->update('bilant_a');
				$i=1;
				break;
			}else{
				$i=0;
			}
		}
		if($i==0){
				$this->db->insert('bilant_a', $date);
			}
				
	}
	public function addBilant_P($date){
		$p=$this->bilantP();
		$i=0;

		foreach($p as $chose){
			
			if($date['intitule']==$chose->intitule){
				$this->db->set($date);
				$this->db->where(array('intitule'=>$date['intitule']));
				$this->db->update('bilant_p');
				$i=1;
				break;
			}else{
				$i=0;
			}
		}
		if($i==0){
				$this->db->insert('bilant_p', $date);
		}
		
	}
	public function addRtat($date){
				/*
			$this->db->set($date);
			
			$this->db->where(array('intitule'=>$date['intitule']));
			$this->db->update('resultat);

		*/
		$this->db->insert('resultat', $date);
	}

}
