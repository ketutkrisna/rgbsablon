<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('level_user')){
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title']='beranda';
		$data['hidesearch']='';
		// $data['hidesearch']='
		// 				  <div class="navbar-fixed navbarpencarian">
		// 			        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
		// 			          <div class="nav-wrapper">
		// 			            <form action="" method="post">
		// 			              <div class="input-field">
		// 			                <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="inputcariberanda" class="inputcariberanda" autocomplete="off" placeholder="nama..">
		// 			                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
		// 			                <button class="material-icons teal" type="submit" name="caridatanotifikasi" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
		// 			              </div>
		// 			            </form>
		// 			          </div>
		// 			        </nav>
		// 			      </div>
		// 					';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		// $data['fitursearch']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		// $query="SELECT produks.*, orders.*, count(status_order) as jumlahselesai from orders left join produks on orders.id_produk_order=produks.id_produk group by id_produk order by id_produk desc";
		$query="SELECT * from produks order by id_produk desc limit 5";
		$data['produkterlaris']=$this->db->query($query)->result_array();
		// var_dump($data['produkterlaris']);die;
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("templates/carousel",$data);
		$this->load->view("home/beranda",$data);
	}

	public function produk()
	{
		$data['title']='produk';
		$data['hidesearch']='';
		// $data['hidesearching']='
		// 				  <div class="navbar-fixed navbarpencarian">
		// 			        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
		// 			          <div class="nav-wrapper">
		// 			            <form action="" method="post">
		// 			              <div class="input-field">
		// 			                <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="inputcariberanda" class="inputcariberanda" autocomplete="off" placeholder="nama..">
		// 			                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
		// 			                <button class="material-icons teal" type="submit" name="caridatanotifikasi" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
		// 			              </div>
		// 			            </form>
		// 			          </div>
		// 			        </nav>
		// 			      </div>
		// 					';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		// $data['fitursearching']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		// $query="SELECT produks.*, orders.*, count(status_order='selesai') as jumlahselesai from orders left join produks on orders.id_produk_order=produks.id_produk group by id_produk";
		$query="SELECT * from produks order by id_produk desc";
		$data['produks']=$this->db->query($query)->result_array(); //semua data produks
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("home/produk",$data);
	}

	public function pesanproduk($idproduk)
	{
		$data['title']='pesan produk';
		$data['geturl']=$idproduk;
		$data['produk']=$this->db->get_where('produks',['id_produk'=>$idproduk])->row_array(); //data satu produk
		$query="SELECT * from produks join produks_size on produks.id_produk=produks_size.produk_id where id_produk=$idproduk order by FIELD(tipe_size,'S','M','L','XL','XXL')";
		$data['datasize']=$this->db->query($query)->result_array(); //data size
		$data['datacolor']=$this->db->get_where('produks_color',['produk_id_color'=>$idproduk])->result_array(); //data warna
		// $data['datacolor']=$this->db->get_where('produks_size',['produk_id_color'=>$idproduk])->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("home/pesanproduk",$data);
	}

	public function about()
	{
		$data['title']='about us';
		$data['hidesearch']='';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		$this->load->view("templates/header",$data);
		$this->load->view("home/about",$data);
	}

	public function editprofil()
	{
		$data['title']='edit profil';
		$data['hidesearch']='';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		$this->load->view("templates/header",$data);
		$this->load->view("home/editprofil",$data);
	}

	public function editakun()
	{
		$userid=$this->session->userdata('id_user');
		$namaakun=htmlspecialchars(strtolower($this->input->post('namaakun',true)));
		$tlpakun=htmlspecialchars($this->input->post('tlpakun',true));
		$lahirakun=htmlspecialchars($this->input->post('lahirakun',true));
		$kelaminakun=htmlspecialchars($this->input->post('kelaminakun',true));
		$emailakun=htmlspecialchars(strtolower($this->input->post('emailakun',true)));
		$alamatakun=htmlspecialchars(strtolower($this->input->post('alamatakun',true)));
		$fotouserlama=$this->db->get_where('users',['id_user'=>$userid])->row_array();

		// $querymax = "SELECT max(id_pelanggan) as maxkode FROM users";
		// $datahasil = $this->db->query($querymax)->row_array();
		// $kodebooking= $datahasil['maxkode'];
		// $noUrut = (int) substr($kodebooking, 4, 9);
		// $noUrut++;
		// $rgb = "USER";
		// $newKodeBooking = $rgb . sprintf("%04s", $noUrut);

		// var_dump($newKodeBooking);die;

		$namanull=trim($namaakun);
	    if(empty($namanull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Nama</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $namabaru = preg_replace('/\s+/', ' ', $namanull);
	    }
	    $tlpnull=trim($tlpakun);
	    if(empty($tlpnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>No.telepon</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $tlpbaru = preg_replace('/\s+/', ' ', $tlpnull);
	    }
	    $lahirnull=trim($lahirakun);
	    if(empty($lahirnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Tanggal lahir</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $lahirbaru = preg_replace('/\s+/', ' ', $lahirnull);
	    }
	    $kelaminnull=trim($kelaminakun);
	    if(empty($kelaminnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Jenis kelamin</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $kelaminbaru = preg_replace('/\s+/', ' ', $kelaminnull);
	    }
	    $alamatnull=trim($alamatakun);
	    if(empty($alamatnull)){
	      	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Alamat</b> tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/editprofil');
			return false;
	    }else{
	      $alamatbaru = preg_replace('/\s+/', ' ', $alamatnull);
	    }

	    if($_FILES['fotoakun']['name']){
			if($_FILES['fotoakun']['size']==''||$_FILES['fotoakun']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/editprofil');
				return false;
			}else{
				$config['upload_path']          = './assets/img/users/';
	            $config['allowed_types']        = 'gif|jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotoakun')){
	            	if($fotouserlama['foto_user'] != '0.default.png'){
	            		unlink(FCPATH . '/assets/img/users/' .$fotouserlama['foto_user']);
	            	}
	            	$foto=$this->upload->data('file_name');
					$this->db->set('foto_user', $foto);
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,GIF,PNG</b>!</span></li>');
						redirect('users/editprofil');
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/editprofil');
						return false;
	            	}
	            }
			}
		}else{
			$foto=$fotouserlama['foto_user'];
		}

		// $this->db->set('id_pelanggan', $newKodeBooking);
		$this->db->set('foto_user', $foto);
		$this->db->set('nama_user', $namabaru);
		$this->db->set('alamat_user', $alamatbaru);
		$this->db->set('nomertelepon_user', $tlpbaru);
		$this->db->set('jeniskelamin_user', $kelaminbaru);
		$this->db->set('tanggallahir_user', $lahirbaru);
		// $this->db->set('email_user', $emailbaru);
		$this->db->where('id_user', $userid);
		$this->db->update('users');

		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Informasi akun berhasil <b>diedit</b>!</span></li>');
		redirect('users/editprofil');
		return false;

	}

	public function gantipassword()
	{
		$data['title']='ganti password';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		$this->load->view("templates/header",$data);
		$this->load->view("home/setpassword",$data);	
	}

	public function setpassword()
	{
		$data['title']='ganti password';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		$userid=$this->session->userdata('id_user');
		$passwordlama=htmlspecialchars($this->input->post('passwordlama',true));
		$matchpassword=$this->db->get_where('users',['id_user'=>$userid])->row_array();
		// var_dump($matchpassword);die;

		$this->form_validation->set_rules('passwordlama','passwordlama','trim|required',
			[
				'required'=>'Password harus diisi'
			]);
		$this->form_validation->set_rules('passwordbaru','Password','trim|required|min_length[5]|matches[passwordconfirm]',[
				'required'=>'Password harus diisi',
				'min_length'=>'Panjang password min 5 karakter',
				'matches'=>'Confirm password tidak sama'
			]);
		$this->form_validation->set_rules('passwordconfirm','confirmpassword','trim|required|matches[passwordbaru]',
			[
				'required'=>'Password harus diisi',
				'matches'=>'Confirm password tidak sama'
			]);

		if ($this->form_validation->run() == FALSE){
			// $this->load->view('users/setpassword',$data);
			$this->load->view("templates/header",$data);
			$this->load->view("home/setpassword",$data);
		}else{
			if($matchpassword['password_user']!=$passwordlama){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Gagal</b> passwod lama salah!</span></li>');
				redirect('users/setpassword');
				// $this->load->view("templates/header",$data);
				// $this->load->view("home/setpassword",$data);
				return false;
			}else{
				$this->db->set('password_user', htmlspecialchars($this->input->post('passwordbaru',true)));
				$this->db->where('id_user', $userid);
				$this->db->update('users');
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class=""><b>Success</b> passwod berhasil diubah!</span></li>');
				redirect('users/setpassword');
				// $this->load->view("templates/header",$data);
				// $this->load->view("home/setpassword",$data);
				return false;
			}
		}
	}

	public function kirimorder()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$idprodukorder=htmlspecialchars($this->input->post('idprodukorder',true));
		$idwarnacolororder=htmlspecialchars($this->input->post('idwarnacolororder',true));
		$ukuranSorder=htmlspecialchars($this->input->post('ukuranSorder',true));
		$ukuranMorder=htmlspecialchars($this->input->post('ukuranMorder',true));
		$ukuranLorder=htmlspecialchars($this->input->post('ukuranLorder',true));
		$ukuranXLorder=htmlspecialchars($this->input->post('ukuranXLorder',true));
		$ukuranXXLorder=htmlspecialchars($this->input->post('ukuranXXLorder',true));
		$notlporder=htmlspecialchars($this->input->post('notlporder',true));
		$alamatorder=htmlspecialchars($this->input->post('alamatorder',true));
		$tanggalorder=date('Y-m-d H:i:s');
		// var_dump($tanggalorder);die;
		$totalorder=htmlspecialchars($this->input->post('totalorder',true));
		$totalpcs=$ukuranSorder+$ukuranMorder+$ukuranLorder+$ukuranXLorder+$ukuranXXLorder;

		$colorgambar=$this->db->get_where('produks_color',['id_color'=>$idwarnacolororder])->row_array();
		$fotocolor=$colorgambar['foto_color'];
		$warnacolor=$colorgambar['warna_color'];

		$querymax = "SELECT max(kode_order) as maxkode FROM orders";
		$datahasil = $this->db->query($querymax)->row_array();
		$kodebooking= $datahasil['maxkode'];
		$noUrut = (int) substr($kodebooking, 3, 9);
		$noUrut++;
		$rgb = "RGB";
		$newKodeBooking = $rgb . sprintf("%04s", $noUrut);

		$data = array(
				        'id_order' => null,
				        'kode_order' => $newKodeBooking,
				        'id_user_order' => $iduser,
				        'id_produk_order' => $idprodukorder,
				        's_order' => $ukuranSorder,
				        'm_order' => $ukuranMorder,
				        'l_order' => $ukuranLorder,
				        'xl_order' => $ukuranXLorder,
				        'xxl_order' => $ukuranXXLorder,
				        'foto_order' => $fotocolor,
				        'warna_order' => $warnacolor,
				        'telepon_order' => $notlporder,
				        'alamat_order' => $alamatorder,
				        'tanggal_order' => $tanggalorder,
				        'total_order' => $totalorder,
				        'pembayaran_order' => 'belum',
				        'priority_order' => 'reguler',
				        'themost_order' => $totalpcs,
				        'status_pembayaran_order' => 'belumbayar',
				        'status_order' => 'menunggu',
				        'notif_baca_order' => 'belumbaca',
				        'notif_bayar_order' => 'nopulse',
				        'jumlahwarna_order' => 0
						);
		$this->db->insert('orders', $data);
		$idproduk = $this->db->insert_id();

		$this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>ditambahkan</b>!</span></li>');
		redirect('users/daftarpesanan');
		return false;
	}

	public function kirimordercustom()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		// var_dump($_POST);die;
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$idprodukorder=htmlspecialchars($this->input->post('idprodukcustom',true));
		// $idwarnacolororder=htmlspecialchars($this->input->post('idwarnacolororder',true));
		$ukuranSorder=htmlspecialchars($this->input->post('customukuranSorder',true));
		$ukuranMorder=htmlspecialchars($this->input->post('customukuranMorder',true));
		$ukuranLorder=htmlspecialchars($this->input->post('customukuranLorder',true));
		$ukuranXLorder=htmlspecialchars($this->input->post('customukuranXLorder',true));
		$ukuranXXLorder=htmlspecialchars($this->input->post('customukuranXXLorder',true));
		$notlporder=htmlspecialchars($this->input->post('customnotlp',true));
		$alamatorder=htmlspecialchars($this->input->post('customalamat',true));
		$tanggalorder=date('Y-m-d H:i:s');
		$totalorder=htmlspecialchars($this->input->post('customtotalorder',true));
		$totalpcs=$ukuranSorder+$ukuranMorder+$ukuranLorder+$ukuranXLorder+$ukuranXXLorder;

		// $colorgambar=$this->db->get_where('produks_color',['id_color'=>$idwarnacolororder])->row_array();
		// $fotocolor=$colorgambar['foto_color'];
		// $warnacolor=$colorgambar['warna_color'];

		$querymax = "SELECT max(kode_order) as maxkode FROM orders";
		$datahasil = $this->db->query($querymax)->row_array();
		$kodebooking= $datahasil['maxkode'];
		$noUrut = (int) substr($kodebooking, 3, 9);
		$noUrut++;
		$rgb = "RGB";
		$newKodeBooking = $rgb . sprintf("%04s", $noUrut);

		if($_FILES['customfoto']['name']){
			if($_FILES['customfoto']['size']==''||$_FILES['customfoto']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/pesanproduk'.$idprodukorder);
				return false;
			}else{
				$config['upload_path']          = './assets/img/customproduk/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('customfoto')){
	            	// unlink(FCPATH . '/assets/img/produk/' .$fotopertama['foto_produk']);
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/pesanproduk'.$idprodukorder);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/pesanproduk'.$idprodukorder);
						return false;
	            	}
	            }

	            $data = array(
				        'id_order' => null,
				        'kode_order' => $newKodeBooking,
				        'id_user_order' => $iduser,
				        'id_produk_order' => $idprodukorder,
				        's_order' => $ukuranSorder,
				        'm_order' => $ukuranMorder,
				        'l_order' => $ukuranLorder,
				        'xl_order' => $ukuranXLorder,
				        'xxl_order' => $ukuranXXLorder,
				        'foto_order' => $foto,
				        'warna_order' => 'custom',
				        'telepon_order' => $notlporder,
				        'alamat_order' => $alamatorder,
				        'tanggal_order' => $tanggalorder,
				        'total_order' => $totalorder,
				        'pembayaran_order' => 'belum',
				        'priority_order' => 'reguler',
				        'themost_order' => $totalpcs,
				        'status_pembayaran_order' => 'belumbayar',
				        'status_order' => 'menunggu',
				        'notif_baca_order' => 'belumbaca',
				        'notif_bayar_order' => 'nopulse'
						);
				$this->db->insert('orders', $data);
				$idproduk = $this->db->insert_id();

				$this->session->set_flashdata('newnotiftambah',$idproduk);
						$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>ditambahkan</b>!</span></li>');
				redirect('users/daftarpesanan');
				return false;
	        }
		}else{
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto tidak boleh <b>kosong</b>!</span></li>');
				redirect('users/pesanproduk'.$idprodukorder);
				return false;
		}
	}

	public function batalpesan($idorder)
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		$iduser=$this->session->userdata('id_user');
		$this->db->set('status_order', 'dicancel');
		$this->db->where('id_order', $idorder);
		$this->db->where('id_user_order', $iduser);
		$this->db->update('orders');
		redirect('users/detailpesananuser/'.$idorder);
	}

	public function uploadbuktibayar()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		$idorder=$this->input->post('idorderuser',true);
		$fotopertama=$this->db->get_where('orders',['id_order'=>$idorder])->row_array();
		// var_dump($fotopertama['pembayaran_order']);die;

		if($_FILES['fotobuktibayar']['name']){
			if($_FILES['fotobuktibayar']['size']==''||$_FILES['fotobuktibayar']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/detailpesananuser/'.$idorder);
				return false;
			}else{
				$config['upload_path']          = './assets/img/buktibayar/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotobuktibayar')){
	            	if($fotopertama['pembayaran_order']=='belum'){

	            	}else{
	            		unlink(FCPATH . '/assets/img/buktibayar/' .$fotopertama['pembayaran_order']);	
	            	}
	            		$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/detailpesananuser/'.$idorder);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/detailpesananuser/'.$idorder);
						return false;
	            	}
	            }
	            // update to produks
				$this->db->set('pembayaran_order', $foto);
				$this->db->set('status_pembayaran_order', 'sudahbayar');
				$this->db->set('status_order', 'dibayar');
				$this->db->set('notif_bayar_order', 'pulse');
				$this->db->where('id_order', $idorder);
				$this->db->update('orders');

				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Bukti pembayaran berhasil <b>diupload</b>!</span></li>');
				redirect('users/detailpesananuser/'.$idorder);
				return false;
	        }
		}else{
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>diupdate</b>!</span></li>');
				redirect('users/detailpesananuser/'.$idorder);
				return false;
		}

		// redirect('users/detailpesananuser/'.$idorder);
	}

	// request ajak pesanan
	public function ajaxs()
	{
		$idproduk=$this->input->post('idproduk',true);
		$query="SELECT * from produks_size join produks on produks_size.produk_id=produks.id_produk where produk_id=$idproduk group by id_size order by FIELD(tipe_size,'S','M','L','XL','XXL')";
		$datajsonsize=$this->db->query($query)->result_array();
		echo json_encode($datajsonsize);
	}
	// tutup reques ajak pesanan

	public function daftarpesanan()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$data['title']='daftar pesanan';
		$data['hidesearch']='
						  <div class="navbar-fixed navbarpencarian">
					        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
					          <div class="nav-wrapper">
					            <form action="" method="post">
					              <div class="input-field">
					                <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="inputcariberanda" class="inputcariberanda" autocomplete="off" placeholder="nama..">
					                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
					                <button class="material-icons teal" type="submit" name="caridatanotifikasi" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
					              </div>
					            </form>
					          </div>
					        </nav>
					      </div>
							';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array();
		$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where id_user_order=$iduser group by id_order order by id_order desc";
		$data['daftarpesananuser']=$this->db->query($query)->result_array();
		// counter pesanan user
		$querycountuser="SELECT count(*) as countpesanan from orders where id_user_order=$iduser";
		$data['countuser']=$this->db->query($querycountuser)->row_array();
		// echo $data['countuser']['countpesanan'];die;
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("home/daftarpesanan",$data);
	}

	public function carikodebaranguser()
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		date_default_timezone_set('Asia/Jakarta');
		$iduser=$this->session->userdata('id_user');
		$data['title']='daftar pesanan';
		$carikodebarang=htmlspecialchars($this->input->post('carikodebarang',true));
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['method']='';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		// $data['produks']=$this->db->get('produks')->result_array(); //semua data produks
		if($carikodebarang){
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where id_user_order=$iduser and kode_order='$carikodebarang' group by id_order order by id_order desc";
			// counter pesanan user
			$querycountuser="SELECT kode_order,id_user_order, count(id_user_order) as countpesanan from orders where id_user_order=$iduser and kode_order='$carikodebarang'";
			$data['countuser']=$this->db->query($querycountuser)->row_array();
			// var_dump($data['countuser'])die;
		}else{
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where id_user_order=$iduser group by id_order order by id_order desc";
			// counter pesanan user
			$querycountuser="SELECT count(*) as countpesanan from orders where id_user_order=$iduser";
			$data['countuser']=$this->db->query($querycountuser)->row_array();
		}
		$data['daftarpesananuser']=$this->db->query($query)->result_array();
		// counter menu notifikasi
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("home/daftarpesanan",$data);
	}

	public function detailpesananuser($idorder)
	{
		if($this->session->userdata('level_user')!='user'){
			redirect('users');
		}
		$data['title']='detail pesanan user';
		$data['geturl']=$idorder;
		$iduser=$this->session->userdata('id_user');
		$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where id_order=$idorder and id_user_order=$iduser";
		$data['detailorder']=$this->db->query($query)->row_array();
		// var_dump($data['detailorder']['status_order']);die;
		// if($data['detailorder']['status_order']=='menunggu'){
		// 	$this->db->set('notif_baca_order', 'dibaca');
		// 	$this->db->set('status_order', 'dikonfirmasi');
		// 	$this->db->where('id_order', $idorder);
		// 	$this->db->update('orders');
		// }else if($data['detailorder']['status_order']=='dibayar'){
		// 	$this->db->set('notif_baca_order', 'dibaca');
		// 	$this->db->set('status_order', 'dibayar');
		// 	$this->db->where('id_order', $idorder);
		// 	$this->db->update('orders');
		// }
		$this->load->view("templates/header",$data);
		$this->load->view("home/detailpesananuser",$data);	
	}

	// public function tmp()
	// {
	// 	var_dump($_FILES);
	// }

}