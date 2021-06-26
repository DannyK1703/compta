<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {
	private $filename = "import_data"; 
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('SiswaModel');
	}
	public function index(){
		$data['siswa'] = $this->SiswaModel->view();
		$data['siswa_n1']= $this->SiswaModel->view2();
		$this->load->view('view', $data);
	}
	public function bilant_A(){
		$data['siswa'] = $this->SiswaModel->viewA();
		$data['siswa_n1']= $this->SiswaModel->view2B();
		
		$date=array();
		$art=array();
		$i=0;
		if($data['siswa']!=null){
			foreach($data['siswa'] as $n){
				
				$int= $n->intitule;
				$brut=$n->sold_I_deb;
				if($data['siswa_n1']!=null){
					$m=0;
						foreach($data['siswa_n1'] as $n1){
							if($n->intitule==$n1->intitule){
								
								$o=0;
								$m=0;
									foreach($date as $f){
										if($f["intitule"]==$int){
											$o=1;
											
										}
									}
									if($o==0){
										
										$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_deb,"Exercice_31_12_n_1"=>$n1->sold_F_deb);
										
										array_push($date,$r);
										
										
										$o=0;
										$m=1;
										break;
									}
									
									$i++;

							}else{
								
								$o=0;
									$t=array("intitule"=>$n1->intitule,"Exercice_31_12_n_1"=>$n1->sold_F_deb);
									array_push($art,$t);
									
									foreach($date as $f){
										if($f["intitule"]==$int){
											$o=1;
										}
									}
									if($o==0){
										$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_deb);
										
										array_push($date,$r);
										break;
									}
									
							}
						}}
						else{
							$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_deb);
							array_push($date,$r);
							
						}
					}
			
		
		
		
		foreach($art as $ar){
			
	
			$m=$ar["intitule"];
			$u=array();
			
			
			foreach( $date as $d ){
				
				
				$intitule=$d['intitule'];
				
				if($ar["intitule"] != $d['intitule']){
					
					$u=$ar;
				}else if($ar["intitule"] == $d['intitule']){
					
					$u=array();
					break;
				}
			}
			if($u!=array()){
				
				array_push($date,$u);
				
			}
		}

			foreach($date as $dat){
				$this->SiswaModel->addBilant_A($dat);
			}
		
	}}
	public function bilant_P(){
		$data['siswa'] = $this->SiswaModel->view2A();
		$data['siswa_n1']= $this->SiswaModel->viewB();
		
		$date=array();
		$art=array();
		$i=0;
		if($data['siswa']!=null){
			foreach($data['siswa'] as $n){
				
				$int= $n->intitule;
				$brut=$n->sold_I_cred;
				if($data['siswa_n1']!=null){
					$m=0;
						foreach($data['siswa_n1'] as $n1){
							if($n->intitule==$n1->intitule){
								
								$o=0;
								$m=0;
									foreach($date as $f){
										if($f["intitule"]==$int){
											$o=1;
											
										}
									}
									if($o==0){
										
										$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_cred,"Exercice_31_12_n_1"=>$n1->sold_F_cred);
										
										array_push($date,$r);
										
										
										$o=0;
										$m=1;
										break;
									}
									
									$i++;

							}else{
								
								$o=0;
									$t=array("intitule"=>$n1->intitule,"Exercice_31_12_n_1"=>$n1->sold_F_cred);
									array_push($art,$t);
									
									foreach($date as $f){
										if($f["intitule"]==$int){
											$o=1;
										}
									}
									if($o==0){
										$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_cred);
										
										array_push($date,$r);
										break;
									}
									
							}
						}}
						else{
							$r=array("intitule"=>$int,"Exercice_31_12_n"=>$n->sold_F_cred);
							array_push($date,$r);
							
						}
					}
			
		
		
		
		foreach($art as $ar){
			
	
			$m=$ar["intitule"];
			$u=array();
			
			
			foreach( $date as $d ){
				
				
				$intitule=$d['intitule'];
				
				if($ar["intitule"] != $d['intitule']){
					
					$u=$ar;
				}else if($ar["intitule"] == $d['intitule']){
					
					$u=array();
					break;
				}
			}
			if($u!=array()){
				
				array_push($date,$u);
				
			}
		}

			foreach($date as $dat){
				$this->SiswaModel->addBilant_P($dat);
			}
		
	}}
	public function genererBilants(){
		$this->bilant_A();
		$this->bilant_P();
		$this->voirBilants();
	}
	public function voirBilants(){
		$bA["bilant_A"]=$this->SiswaModel->bilantA();
		$bA["bilant_B"]=$this->SiswaModel->bilantP();
		$this->load->view('bilants',$bA);
	}
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->SiswaModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('form', $data);
	}
	public function form2(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->SiswaModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('form2', $data);
	}
	public function resultat(){
		$bil['bilant_a']=$this->SiswaModel->bilantA();
		$bil['bilant_p']=$this->SiswaModel->bilantP();
		$date=array();
		foreach($bil['bilant_a'] as $bil_a){
			$data=array(
				'intitule'=>$bil_a->intitule,
				'net_n'=>$bil_a->Exercice_31_12_n,
				'net_n_1'=>$bil_a->Exercice_31_12_n_1
			);
			array_push($date,$data);
		}
		foreach($bil['bilant_p'] as $bil_p){
			$data=array(
				'intitule'=>$bil_p->intitule,
				'net_n'=>$bil_p->Exercice_31_12_n,
				'net_n_1'=>$bil_p->Exercice_31_12_n_1
			);
			array_push($date,$data);
		}
		foreach($date as $d){
			$this->SiswaModel->addRtat($d);
			var_dump($d);echo '<br/><br/><br/>';
		}
	}
	public function import($type){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					
					'compte'=>$row['A'], // Insert data nis dari kolom A di excel
					'intitule'=>$row['B'], // Insert data nama dari kolom B di excel
					'sold_I_deb'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'sold_I_cred'=>$row['D'], // Insert data alamat dari kolom D di excel
					'mvm_deb'=>$row['E'],
					'mvm_cred'=>$row['F'],
					'sold_F_deb'=>$row['G'], // Insert data alamat dari kolom D di excel
					'sold_F_cred'=>$row['H'], // Insert data alamat dari kolom D di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping  compte	intitule	sold_I_deb	sold_I_cred	sold_F_deb	sold_F_cred
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		if($type=='n-1'){
			$table='balance_n';
		}elseif($type=='n'){
			$table='balance';
		}
		$this->SiswaModel->delete_multiple($table);
		$this->SiswaModel->insert_multiple($data,$table);
		if($type=='n-1'){
			$this->genererBilants();
			 }
			if($type=='n'){
				redirect("siswa/form2");
			}// Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
