<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level_user')!='admin'){
			redirect('users');
		}
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['title']='daftar pesanan admin';
		$data['hidesearch']='
						  <div class="navbar-fixed navbarpencarian">
					        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
					          <div class="nav-wrapper">
					            <form action="'.base_url('admin/carikodebarang/').'" method="post">
					              <div class="input-field">
					                <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="carikodebarang" class="inputcariberanda" autocomplete="off" placeholder="nama..">
					                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
					                <button class="material-icons teal" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
					              </div>
					            </form>
					          </div>
					        </nav>
					      </div>
							';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['method']='';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		$data['produks']=$this->db->get('produks')->result_array(); //semua data produks
		$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by id_order asc";
		$data['daftarpesanan']=$this->db->query($query)->result_array();
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		// counter keseluruhan
		$querymenunggu="SELECT users.*,produks.*,orders.*, count('status_order') as menunggu from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='menunggu'";
		$data['menunggu']=$this->db->query($querymenunggu)->row_array();
		$querydikonfirmasi="SELECT users.*,produks.*,orders.*, count('status_order') as dikonfirmasi from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dikonfirmasi'";
		$data['dikonfirmasi']=$this->db->query($querydikonfirmasi)->row_array();
		$querydibayar="SELECT users.*,produks.*,orders.*, count('status_order') as dibayar from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dibayar' and notif_baca_order='dibaca'";
		$data['dibayar']=$this->db->query($querydibayar)->row_array();
		$querydalamproses="SELECT users.*,produks.*,orders.*, count('status_order') as dalamproses from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalamproses'";
		$data['dalamproses']=$this->db->query($querydalamproses)->row_array();
		$querydalampengiriman="SELECT users.*,produks.*,orders.*, count('status_order') as dalampengiriman from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalampengiriman'";
		$data['dalampengiriman']=$this->db->query($querydalampengiriman)->row_array();
		$queryselesai="SELECT users.*,produks.*,orders.*, count('status_order') as selesai from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='selesai'";
		$data['selesai']=$this->db->query($queryselesai)->row_array();
		$queryditolak="SELECT users.*,produks.*,orders.*, count('status_order') as ditolak from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='ditolak'";
		$data['ditolak']=$this->db->query($queryditolak)->row_array();
		$querydicancel="SELECT users.*,produks.*,orders.*, count('status_order') as dicancel from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dicancel'";
		$data['dicancel']=$this->db->query($querydicancel)->row_array();
		// var_dump($data['menunggu']);die;
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("admin/daftarpesananadmin",$data);

	}

	public function carikodebarang()
	{
		date_default_timezone_set('Asia/Jakarta');
		$carikodebarang=htmlspecialchars($this->input->post('carikodebarang',true));
		$data['title']='daftar pesanan admin';
		// $data['hidesearch']='
		// 				  <div class="navbar-fixed navbarpencarian">
		// 			        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
		// 			          <div class="nav-wrapper">
		// 			            <form action="'.base_url('admin/carikodebarang/').'" method="post">
		// 			              <div class="input-field">
		// 			                <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="carikodebarang" class="inputcariberanda" autocomplete="off" placeholder="nama..">
		// 			                <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
		// 			                <button class="material-icons teal" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
		// 			              </div>
		// 			            </form>
		// 			          </div>
		// 			        </nav>
		// 			      </div>
		// 					';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='<li class="triggernavbarcari" style="height: 100%"><a href="#" style="right:-10px;display: flex;height:100%;align-items: center;padding:5px;" class="waves-effect waves-grey white"><i class="material-icons teal-text">search</i></a></li>';
		$data['method']='';
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		$data['produks']=$this->db->get('produks')->result_array(); //semua data produks
		if($carikodebarang){
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where kode_order='$carikodebarang' group by id_order order by id_order asc";
			$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
			$data['countnew']=$this->db->query($querynotifikasi)->row_array();
			// counter keseluruhan
			$querymenunggu="SELECT users.*,produks.*,orders.*, count('status_order') as menunggu from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='menunggu' and kode_order='$carikodebarang'";
			$data['menunggu']=$this->db->query($querymenunggu)->row_array();
			$querydikonfirmasi="SELECT users.*,produks.*,orders.*, count('status_order') as dikonfirmasi from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dikonfirmasi' and kode_order='$carikodebarang'";
			$data['dikonfirmasi']=$this->db->query($querydikonfirmasi)->row_array();
			$querydibayar="SELECT users.*,produks.*,orders.*, count('status_order') as dibayar from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dibayar' and kode_order='$carikodebarang'";
			$data['dibayar']=$this->db->query($querydibayar)->row_array();
			$querydalamproses="SELECT users.*,produks.*,orders.*, count('status_order') as dalamproses from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalamproses' and kode_order='$carikodebarang'";
			$data['dalamproses']=$this->db->query($querydalamproses)->row_array();
			$querydalampengiriman="SELECT users.*,produks.*,orders.*, count('status_order') as dalampengiriman from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalampengiriman' and kode_order='$carikodebarang'";
			$data['dalampengiriman']=$this->db->query($querydalampengiriman)->row_array();
			$queryselesai="SELECT users.*,produks.*,orders.*, count('status_order') as selesai from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='selesai' and kode_order='$carikodebarang'";
			$data['selesai']=$this->db->query($queryselesai)->row_array();
			$queryditolak="SELECT users.*,produks.*,orders.*, count('status_order') as ditolak from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='ditolak' and kode_order='$carikodebarang'";
			$data['ditolak']=$this->db->query($queryditolak)->row_array();
			$querydicancel="SELECT users.*,produks.*,orders.*, count('status_order') as dicancel from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dicancel' and kode_order='$carikodebarang'";
			$data['dicancel']=$this->db->query($querydicancel)->row_array();
		}else{
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by id_order asc";
			// counter menu notifikasi
			$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
			$data['countnew']=$this->db->query($querynotifikasi)->row_array();
			// counter keseluruhan
			$querymenunggu="SELECT users.*,produks.*,orders.*, count('status_order') as menunggu from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='menunggu'";
			$data['menunggu']=$this->db->query($querymenunggu)->row_array();
			$querydikonfirmasi="SELECT users.*,produks.*,orders.*, count('status_order') as dikonfirmasi from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dikonfirmasi'";
			$data['dikonfirmasi']=$this->db->query($querydikonfirmasi)->row_array();
			$querydibayar="SELECT users.*,produks.*,orders.*, count('status_order') as dibayar from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dibayar' and notif_baca_order='dibaca'";
			$data['dibayar']=$this->db->query($querydibayar)->row_array();
			$querydalamproses="SELECT users.*,produks.*,orders.*, count('status_order') as dalamproses from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalamproses'";
			$data['dalamproses']=$this->db->query($querydalamproses)->row_array();
			$querydalampengiriman="SELECT users.*,produks.*,orders.*, count('status_order') as dalampengiriman from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalampengiriman'";
			$data['dalampengiriman']=$this->db->query($querydalampengiriman)->row_array();
			$queryselesai="SELECT users.*,produks.*,orders.*, count('status_order') as selesai from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='selesai'";
			$data['selesai']=$this->db->query($queryselesai)->row_array();
			$queryditolak="SELECT users.*,produks.*,orders.*, count('status_order') as ditolak from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='ditolak'";
			$data['ditolak']=$this->db->query($queryditolak)->row_array();
			$querydicancel="SELECT users.*,produks.*,orders.*, count('status_order') as dicancel from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dicancel'";
			$data['dicancel']=$this->db->query($querydicancel)->row_array();
		}
		$data['daftarpesanan']=$this->db->query($query)->result_array();
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		
		// var_dump($datas);die;
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("admin/daftarpesananadmin",$data);	
	}

	public function methodsorting()
	{
		date_default_timezone_set('Asia/Jakarta');
		$datasorting=$this->input->post('sortingdata',true);
		// var_dump($datasorting);die;
		$data['title']='daftar pesanan admin';
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
		$data['profileuser']=$this->db->get_where('users',['id_user'=>$this->session->userdata('id_user')])->row_array(); //data profile user berdasarkan session login
		$data['produks']=$this->db->get('produks')->result_array(); //semua data produks
		$data['method']=$datasorting;
		if($datasorting=='terbaru'){
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by id_order desc";	
		}else if($datasorting=='terbanyak'){
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by themost_order desc";
		}else if($datasorting==''){
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by id_order asc";
		}else{
			$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk group by id_order order by priority_order asc, themost_order desc";
		}
		$data['daftarpesanan']=$this->db->query($query)->result_array();
		// counter menu notifikasi
		$querynotifikasi="SELECT count(*) as countnew from orders where notif_baca_order='belumbaca'";
		$data['countnew']=$this->db->query($querynotifikasi)->row_array();
		// counter keseluruhan
		$querymenunggu="SELECT users.*,produks.*,orders.*, count('status_order') as menunggu from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='menunggu'";
		$data['menunggu']=$this->db->query($querymenunggu)->row_array();
		$querydikonfirmasi="SELECT users.*,produks.*,orders.*, count('status_order') as dikonfirmasi from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dikonfirmasi'";
		$data['dikonfirmasi']=$this->db->query($querydikonfirmasi)->row_array();
		$querydibayar="SELECT users.*,produks.*,orders.*, count('status_order') as dibayar from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dibayar' and notif_baca_order='dibaca'";
		$data['dibayar']=$this->db->query($querydibayar)->row_array();
		$querydalamproses="SELECT users.*,produks.*,orders.*, count('status_order') as dalamproses from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalamproses'";
		$data['dalamproses']=$this->db->query($querydalamproses)->row_array();
		$querydalampengiriman="SELECT users.*,produks.*,orders.*, count('status_order') as dalampengiriman from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dalampengiriman'";
		$data['dalampengiriman']=$this->db->query($querydalampengiriman)->row_array();
		$queryselesai="SELECT users.*,produks.*,orders.*, count('status_order') as selesai from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='selesai'";
		$data['selesai']=$this->db->query($queryselesai)->row_array();
		$queryditolak="SELECT users.*,produks.*,orders.*, count('status_order') as ditolak from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='ditolak'";
		$data['ditolak']=$this->db->query($queryditolak)->row_array();
		$querydicancel="SELECT users.*,produks.*,orders.*, count('status_order') as dicancel from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where status_order='dicancel'";
		$data['dicancel']=$this->db->query($querydicancel)->row_array();
		// var_dump($datas);die;
		$this->load->view("templates/header",$data);
		$this->load->view("templates/navbartop",$data);
		$this->load->view("templates/navbarbottom",$data);
		$this->load->view("templates/sidebar",$data);
		$this->load->view("admin/daftarpesananadmin",$data);
	}

	public function detailpesananadmin($idorder)
	{
		// $data['order']=$this->db->get_where('orders',['id_order'=>$idorder)->row_array(); //data profile user berdasarkan session login
		// $data['produks']=$this->db->get('produks')->result_array(); //semua data produks
		$data['title']='detail pesanan admin';
		$data['geturl']=$idorder;
		// $query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk left join proses on orders.id_order=proses.id_prosesorder left join karyawan on proses.id_proseskaryawan=karyawan.id_karyawan where id_order=$idorder";
		$query="SELECT * from orders join users on orders.id_user_order=users.id_user join produks on orders.id_produk_order=produks.id_produk where id_order=$idorder";
		$data['detailorder']=$this->db->query($query)->row_array();

		$queryproses="SELECT * from orders join proses on orders.id_order=proses.id_prosesorder left join karyawan on proses.id_proseskaryawan=karyawan.id_karyawan where id_order=$idorder";
		$data['detailpenyablon']=$this->db->query($queryproses)->result_array();

		$querycountproses="SELECT count(*) as jumlahpenyablon from orders join proses on orders.id_order=proses.id_prosesorder left join karyawan on proses.id_proseskaryawan=karyawan.id_karyawan where id_order=$idorder group by id_prosesorder";
		$data['jumlahpenyablon']=$this->db->query($querycountproses)->row_array();
		// var_dump($data['jumlahpenyablon']);die;

		$data['karyawan']=$this->db->get('karyawan')->result_array();
		// var_dump($data['detailorder']['status_order']);die;
		if($data['detailorder']['status_order']=='menunggu'){
			$this->db->set('notif_baca_order', 'dibaca');
			$this->db->set('status_order', 'dikonfirmasi');
			$this->db->where('id_order', $idorder);
			$this->db->update('orders');
		}else if($data['detailorder']['status_order']=='dibayar'){
			$this->db->set('notif_baca_order', 'dibaca');
			$this->db->set('status_order', 'dibayar');
			$this->db->where('id_order', $idorder);
			$this->db->update('orders');
		}
		$this->load->view("templates/header",$data);
		$this->load->view("admin/detailpesananadmin",$data);
	}

	public function terimabuktipembayaran($idorder)
	{
		$this->db->set('status_pembayaran_order', 'bayarditerima');
		$this->db->set('notif_bayar_order', 'nopulse');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	public function tolakbuktipembayaran($idorder)
	{
		$this->db->set('status_pembayaran_order', 'bayarditolak');
		$this->db->set('notif_bayar_order', 'nopulse');
		$this->db->set('status_order', 'dibayar');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	public function tambahprioritas($idorder)
	{
		$dataorder=$this->db->get_where('orders',['id_order'=>$idorder])->row_array();
		if($dataorder['priority_order']=='prioritas'){
			$this->db->set('priority_order', 'reguler');
			$this->db->where('id_order', $idorder);
			$this->db->update('orders');
			redirect('admin/detailpesananadmin/'.$idorder);
		}else{
			$this->db->set('priority_order', 'prioritas');
			$this->db->where('id_order', $idorder);
			$this->db->update('orders');
			redirect('admin/detailpesananadmin/'.$idorder);
		}
	}

	public function prosespesanan($idorder)
	{
		$this->db->set('status_order', 'dalamproses');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	public function kirimpesanan($idorder)
	{
		$query="SELECT * from orders join proses on orders.id_order=proses.id_prosesorder left join karyawan on proses.id_proseskaryawan=karyawan.id_karyawan where id_order=$idorder";
		$resultid=$this->db->query($query)->result_array();
		foreach($resultid as $ri){
			$idup=$ri['id_karyawan'];
			$this->db->set('status_karyawan', 'kosong');
			$this->db->where('id_karyawan', $idup);
			$this->db->update('karyawan');
		}
		// var_dump($coba[0]['nama_karyawan']);die;
		$this->db->set('status_order', 'dalampengiriman');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	public function selesaipesanan($idorder)
	{
		$this->db->set('status_order', 'selesai');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	public function tolakorder($idorder)
	{
		$this->db->set('status_order', 'ditolak');
		$this->db->where('id_order', $idorder);
		$this->db->update('orders');
		redirect('admin/detailpesananadmin/'.$idorder);
	}

	// public function bukaorder($idorder)
	// {
	// 	$this->db->set('status_order', 'ditolak');
	// 	$this->db->where('id_order', $idorder);
	// 	$this->db->update('orders');
	// 	redirect('admin/detailpesananadmin/'.$idorder);
	// }

	public function tambahproduk()
	{
		$namaproduk=htmlspecialchars($this->input->post('namaproduk',true));
		$warnaproduk=htmlspecialchars($this->input->post('warnaproduk',true));
		$hargas=htmlspecialchars($this->input->post('hargas',true));
		$ukurans=htmlspecialchars($this->input->post('ukurans',true));
		$hargam=htmlspecialchars($this->input->post('hargam',true));
		$ukuranm=htmlspecialchars($this->input->post('ukuranm',true));
		$hargal=htmlspecialchars($this->input->post('hargal',true));
		$ukuranl=htmlspecialchars($this->input->post('ukuranl',true));
		$hargaxl=htmlspecialchars($this->input->post('hargaxl',true));
		$ukuranxl=htmlspecialchars($this->input->post('ukuranxl',true));
		$hargaxxl=htmlspecialchars($this->input->post('hargaxxl',true));
		$ukuranxxl=htmlspecialchars($this->input->post('ukuranxxl',true));
		$biayasablonproduk=htmlspecialchars($this->input->post('biayasablonproduk',true));
		$deskripsiproduk=htmlspecialchars($this->input->post('deskripsiproduk',true));

		if($_FILES['fotoproduk']['name']){
			if($_FILES['fotoproduk']['size']==''||$_FILES['fotoproduk']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('users/produk');
				return false;
			}else{
				$config['upload_path']          = './assets/img/produk/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotoproduk')){
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('users/produk');
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('users/produk');
						return false;
	            	}
	            }
	            // insert to produks
				$data = array(
				        'id_produk' => null,
				        'foto_produk' => $foto,
				        'nama_produk' => $namaproduk,
				        'deskripsi_produk' => $deskripsiproduk,
				        'biaya_sablon_produk' => $biayasablonproduk
						);
				$this->db->insert('produks', $data);
				$idproduk = $this->db->insert_id();
				// insert to produk color
				$data = array(
				        'id_color' => null,
				        'produk_id_color' => $idproduk,
				        'foto_color' => $foto,
				        'warna_color' => $warnaproduk
						);
				$this->db->insert('produks_color', $data);
				// insert to produk size
				$data = array(
				        'id_size' => null,
				        'produk_id' => $idproduk,
				        'tipe_size' => 'S',
				        'deskripsi_size' => $ukurans,
				        'harga_size' => $hargas
						);
				$this->db->insert('produks_size', $data);
				$data = array(
				        'id_size' => null,
				        'produk_id' => $idproduk,
				        'tipe_size' => 'M',
				        'deskripsi_size' => $ukuranm,
				        'harga_size' => $hargam
						);
				$this->db->insert('produks_size', $data);
				$data = array(
				        'id_size' => null,
				        'produk_id' => $idproduk,
				        'tipe_size' => 'L',
				        'deskripsi_size' => $ukuranl,
				        'harga_size' => $hargal
						);
				$this->db->insert('produks_size', $data);
				$data = array(
				        'id_size' => null,
				        'produk_id' => $idproduk,
				        'tipe_size' => 'XL',
				        'deskripsi_size' => $ukuranxl,
				        'harga_size' => $hargaxl
						);
				$this->db->insert('produks_size', $data);
				$data = array(
				        'id_size' => null,
				        'produk_id' => $idproduk,
				        'tipe_size' => 'XXL',
				        'deskripsi_size' => $ukuranxxl,
				        'harga_size' => $hargaxxl
						);
				$this->db->insert('produks_size', $data);
				// notifikasi berhasil
				$this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>ditambahkan</b>!</span></li>');
				redirect('users/produk');
				return false;
	        }
		}else{
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto tidak boleh <b>kosong</b>!</span></li>');
			redirect('users/produk');
			return false;
		}

	}

	public function editproduk($idproduk)
	{
		$data['title']='edit produk';
		$data['geturl']=$idproduk;
		$data['produk']=$this->db->get_where('produks',['id_produk'=>$idproduk])->row_array(); //data satu produk
		$query="SELECT * from produks join produks_size on produks.id_produk=produks_size.produk_id where id_produk=$idproduk order by FIELD(tipe_size,'S','M','L','XL','XXL')";
		$data['datasize']=$this->db->query($query)->result_array(); //data size
		$data['datacolor']=$this->db->get_where('produks_color',['produk_id_color'=>$idproduk])->result_array(); 
		$data['datacolorbackground']=$this->db->get_where('produks_color',['produk_id_color'=>$idproduk])->row_array();
		$this->load->view('templates/header',$data);
		$this->load->view('admin/editproduk',$data);
	}

	public function updateproduk()
	{
		$namaproduk=htmlspecialchars($this->input->post('namaproduk',true));
		$warnaproduk=htmlspecialchars($this->input->post('warnaproduk',true));
		$hargas=htmlspecialchars($this->input->post('hargaS',true));
		$ukurans=htmlspecialchars($this->input->post('ukuranS',true));
		$hargam=htmlspecialchars($this->input->post('hargaM',true));
		$ukuranm=htmlspecialchars($this->input->post('ukuranM',true));
		$hargal=htmlspecialchars($this->input->post('hargaL',true));
		$ukuranl=htmlspecialchars($this->input->post('ukuranL',true));
		$hargaxl=htmlspecialchars($this->input->post('hargaXL',true));
		$ukuranxl=htmlspecialchars($this->input->post('ukuranXL',true));
		$hargaxxl=htmlspecialchars($this->input->post('hargaXXL',true));
		$ukuranxxl=htmlspecialchars($this->input->post('ukuranXXL',true));
		$biayasablonproduk=htmlspecialchars($this->input->post('biayasablonproduk',true));
		$deskripsiproduk=htmlspecialchars($this->input->post('deskripsiproduk',true));
		// id update
		$ids=htmlspecialchars($this->input->post('idS',true));
		$idm=htmlspecialchars($this->input->post('idM',true));
		$idl=htmlspecialchars($this->input->post('idL',true));
		$idxl=htmlspecialchars($this->input->post('idXL',true));
		$idxxl=htmlspecialchars($this->input->post('idXXL',true));
		$idcolor1=htmlspecialchars($this->input->post('idcolor1',true));
		$idproduk=htmlspecialchars($this->input->post('idprodukurl',true));
		// foto awal
		$fotopertama=$this->db->get_where('produks',['id_produk'=>$idproduk])->row_array();

		if($_FILES['fotoproduk']['name']){
			if($_FILES['fotoproduk']['size']==''||$_FILES['fotoproduk']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
			}else{
				$config['upload_path']          = './assets/img/produk/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotoproduk')){
	            	unlink(FCPATH . '/assets/img/produk/' .$fotopertama['foto_produk']);
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('admin/editproduk/'.$idproduk);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('admin/editproduk/'.$idproduk);
						return false;
	            	}
	            }
	            // update to produks
				$this->db->set('foto_produk', $foto);
				$this->db->set('nama_produk', $namaproduk);
				$this->db->set('deskripsi_produk', $deskripsiproduk);
				$this->db->set('biaya_sablon_produk', $biayasablonproduk);
				$this->db->where('id_produk', $idproduk);
				$this->db->update('produks');
				// insert foto order
				$this->db->set('foto_order', $foto);
				$this->db->where('foto_order', $fotopertama['foto_produk']);
				$this->db->update('orders');
				// insert to produk color
				$this->db->set('foto_color', $foto);
				$this->db->set('warna_color', $warnaproduk);
				$this->db->where('id_color', $idcolor1);
				$this->db->update('produks_color');
				// insert to produk size
				$this->db->set('deskripsi_size', $ukurans);
				$this->db->set('harga_size', $hargas);
				$this->db->where('id_size', $ids);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranm);
				$this->db->set('harga_size', $hargam);
				$this->db->where('id_size', $idm);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranl);
				$this->db->set('harga_size', $hargal);
				$this->db->where('id_size', $idl);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranxl);
				$this->db->set('harga_size', $hargaxl);
				$this->db->where('id_size', $idxl);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranxxl);
				$this->db->set('harga_size', $hargaxxl);
				$this->db->where('id_size', $idxxl);
				$this->db->update('produks_size');

				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>diupdate</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
	        }
		}else{
			$foto=$fotopertama['foto_produk'];
			// update to produks
				$this->db->set('foto_produk', $foto);
				$this->db->set('nama_produk', $namaproduk);
				$this->db->set('deskripsi_produk', $deskripsiproduk);
				$this->db->set('biaya_sablon_produk', $biayasablonproduk);
				$this->db->where('id_produk', $idproduk);
				$this->db->update('produks');
				// insert to produk color
				$this->db->set('foto_color', $foto);
				$this->db->set('warna_color', $warnaproduk);
				$this->db->where('id_color', $idcolor1);
				$this->db->update('produks_color');
				// insert to produk size
				$this->db->set('deskripsi_size', $ukurans);
				$this->db->set('harga_size', $hargas);
				$this->db->where('id_size', $ids);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranm);
				$this->db->set('harga_size', $hargam);
				$this->db->where('id_size', $idm);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranl);
				$this->db->set('harga_size', $hargal);
				$this->db->where('id_size', $idl);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranxl);
				$this->db->set('harga_size', $hargaxl);
				$this->db->where('id_size', $idxl);
				$this->db->update('produks_size');

				$this->db->set('deskripsi_size', $ukuranxxl);
				$this->db->set('harga_size', $hargaxxl);
				$this->db->where('id_size', $idxxl);
				$this->db->update('produks_size');

				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk berhasil <b>diupdate</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
		}

	}

	public function deleteproduk($idproduk)
	{
		$query="SELECT count(*) as jumlahdiorder from orders join produks on orders.id_produk_order=produks.id_produk where id_produk_order=$idproduk group by id_produk_order";
		$datacek=$this->db->query($query)->row_array();
		$querycolor="SELECT count(*) as jumlahcolor from produks_color join produks on produks_color.produk_id_color=produks.id_produk where produk_id_color=$idproduk group by id_produk";
		$datacekcolor=$this->db->query($querycolor)->row_array();
		$fotopertama=$this->db->get_where('produks',['id_produk'=>$idproduk])->row_array();
		// var_dump($datacekcolor['jumlahcolor']);die;
		if($datacek['jumlahdiorder']>0){
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk pernah diorder,tidak dapat dihapus!</span></li>');
			redirect('users/produk');
			return false;	
		}
		if($datacekcolor['jumlahcolor']>1){
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Hapus terlebih dahulu tipe warna produk!</span></li>');
			redirect('users/produk');
			return false;	
		}
		unlink(FCPATH . '/assets/img/produk/' .$fotopertama['foto_produk']);
		$this->db->delete('produks_size',['produk_id' => $idproduk]);
		$this->db->delete('produks_color',['produk_id_color' => $idproduk]);
		$this->db->delete('produks',['id_produk' => $idproduk]);
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Succes produk telah dihapus!</span></li>');
		redirect('users/produk');
		return false;
	}

	public function tambahwarna()
	{

		$idproduk=htmlspecialchars($this->input->post('idprodukwarna',true));
		$namawarna=htmlspecialchars($this->input->post('namawarna',true));

		if($_FILES['fotowarna']['name']){
			if($_FILES['fotowarna']['size']==''||$_FILES['fotowarna']['size']>2048000){
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
			}else{
				$config['upload_path']          = './assets/img/produk/';
	            $config['allowed_types']        = 'jpg|png';
	            $config['max_size']             = 2048;

	            $this->load->library('upload', $config);

	            if($this->upload->do_upload('fotowarna')){
	            	// unlink(FCPATH . '/assets/img/produk/' .$fotopertama['foto_produk']);
	            	$foto=$this->upload->data('file_name');
	            }else{
	            	$error = $this->upload->display_errors('','');
	            	if($error=='The filetype you are attempting to upload is not allowed.'){
	            		$errors=['error'=>'Format file harus JPG,GIF,PNG'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Format file harus <b>JPG,PNG</b>!</span></li>');
						redirect('admin/editproduk/'.$idproduk);
						return false;
	            	}else{
	            		$errors=['error'=>'Max gambar 2MB'];
	            		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Ukuran gambar terlalu besar <b>max 2MB</b>!</span></li>');
						redirect('admin/editproduk/'.$idproduk);
						return false;
	            	}
	            }
	            // insert to produk color
				$data = array(
				        'id_color' => null,
				        'produk_id_color' => $idproduk,
				        'foto_color' => $foto,
				        'warna_color' => $namawarna
						);
				$this->db->insert('produks_color', $data);
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Warna baru berhasil <b>ditambahkan</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
	        }
		}else{
				// notifikasi berhasil
				// $this->session->set_flashdata('newnotiftambah',$idproduk);
				$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto tidak boleh <b>kosong</b>!</span></li>');
				redirect('admin/editproduk/'.$idproduk);
				return false;
		}

	}

	public function hapuswarna()
	{
		$idproduk=$this->input->post('idprodukhapuswarna',true);
		$idhapuswarna=$this->input->post('idhapuswarna',true);
		$fotopertama=$this->db->get_where('produks_color',['id_color'=>$idhapuswarna])->row_array();

		$query="SELECT count(*) as jumlahdiorder from orders join produks on orders.id_produk_order=produks.id_produk where id_produk_order=$idproduk group by id_produk_order";
		$datacek=$this->db->query($query)->row_array();

		$fotocek=$fotopertama['foto_color'];
		$queryw="SELECT count(*) as coba from orders where foto_order='$fotocek'";
		$datacekw=$this->db->query($queryw)->row_array();
		
		if($datacekw['coba']>0){
			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk pernah diorder,tidak dapat dihapus!</span></li>');
			redirect('admin/editproduk/'.$idproduk);
			return false;
		}else{
			unlink(FCPATH . '/assets/img/produk/' .$fotopertama['foto_color']);
			$this->db->where('id_color', $idhapuswarna);
			$this->db->delete('produks_color');

			$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Foto berhasil <b>dihapus</b>!</span></li>');
					redirect('admin/editproduk/'.$idproduk);
			return false;
		}

		// if($datacek['jumlahdiorder']>0){
		// 	$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Produk pernah diorder,tidak dapat dihapus!</span></li>');
		// 	redirect('admin/editproduk/'.$idproduk);
		// 	return false;	
		// }
	}

	public function karyawan()
	{
		$data['title']='halaman karyawan';
		$data['hidesearch']='';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		$data['karyawan']=$this->db->get('karyawan')->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("admin/karyawan",$data);
	}

	public function detailkaryawan($idkaryawan)
	{
		$data['detailkaryawan']=$this->db->get_where('karyawan',['id_karyawan'=>$idkaryawan])->row_array();

		$data['title']='halaman detail karyawan';
		$data['hidesearch']='';
		$data['active']='teal-text text-darken-4';
		$data['fitursearch']='';
		$data['karyawan']=$this->db->get('karyawan')->result_array();
		$this->load->view("templates/header",$data);
		$this->load->view("admin/detailkaryawan",$data);
	}

	public function tambahkaryawan()
	{
		$namakaryawan=$this->input->post('namakaryawan',true);
		$alamatkaryawan=$this->input->post('alamatkaryawan',true);
		$notlpkaryawan=$this->input->post('notlpkaryawan',true);
		$genderkaryawan=$this->input->post('genderkaryawan',true);

		$data = array(
		        'id_karyawan' => null,
		        'nama_karyawan' => $namakaryawan,
		        'alamat_karyawan' => $alamatkaryawan,
		        'notlp_karyawan' => $notlpkaryawan,
		        'gender_karyawan' => $genderkaryawan,
		        'status_karyawan' => 'kosong'
				);
		$this->db->insert('karyawan', $data);
		// notifikasi berhasil
		// $this->session->set_flashdata('newnotiftambah',$idproduk);
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Karyawan baru berhasil <b>ditambahkan</b>!</span></li>');
		redirect('admin/karyawan/');
		return false;
	}

	public function editkaryawan()
	{
		$ideditkaryawan=$this->input->post('ideditkaryawan',true);
		$namakaryawan=$this->input->post('namakaryawanedit',true);
		$alamatkaryawan=$this->input->post('alamatkaryawanedit',true);
		$notlpkaryawan=$this->input->post('notlpkaryawanedit',true);
		$genderkaryawan=$this->input->post('genderkaryawanedit',true);

		$this->db->set('nama_karyawan', $namakaryawan);
		$this->db->set('alamat_karyawan', $alamatkaryawan);
		$this->db->set('notlp_karyawan', $notlpkaryawan);
		$this->db->set('gender_karyawan', $genderkaryawan);
		$this->db->where('id_karyawan', $ideditkaryawan);
		$this->db->update('karyawan');
		// notifikasi berhasil
		// $this->session->set_flashdata('newnotiftambah',$idproduk);
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Karyawan berhasil <b>diedit</b>!</span></li>');
		redirect('admin/detailkaryawan/'.$ideditkaryawan);
		return false;
	}

	public function deletekaryawan($idkaryawan)
	{
		$this->db->delete('karyawan',['id_karyawan' => $idkaryawan]);
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Karyawan berhasil <b>dihapus</b>!</span></li>');
		redirect('admin/karyawan/');
		return false;
	}

	public function pilihkaryawan()
	{
		$idkaryawan=$this->input->post('selectkaryawan',true);
		$idorder=$this->input->post('idorders',true);
		// var_dump($idkaryawan);die;
		$data = array(
		        'id_proses' => null,
		        'id_prosesorder' => $idorder,
		        'id_proseskaryawan' => $idkaryawan
				);
		$this->db->insert('proses', $data);

		$this->db->set('status_karyawan', 'berkerja');
		$this->db->where('id_karyawan', $idkaryawan);
		$this->db->update('karyawan');
		// notifikasi berhasil
		// $this->session->set_flashdata('newnotiftambah',$idproduk);
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Karyawan berhasil <b>ditugaskan</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idorder);
		return false;
	}

	public function batalkaryawan($idorder,$idkaryawan)
	{
		// $querybatal="DELETE from proses where id_prosesorder='$idorder' and id_proseskaryawan='$idkaryawan'";
		// $batalkan=$this->db->query($querybatal)->row_array();
		$this->db->delete('proses',['id_prosesorder' => $idorder,'id_proseskaryawan'=> $idkaryawan]);

		$this->db->set('status_karyawan', 'kosong');
		$this->db->where('id_karyawan', $idkaryawan);
		$this->db->update('karyawan');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Karyawan dibatalkan <b>bertugas</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idorder);
		return false;
	}

	public function tambahjumlahwarna()
	{
		$idorderes=$this->input->post('idorderes',true);
		$jumlahwarna=$this->input->post('jumlahwarna',true);
		$this->db->set('jumlahwarna_order', $jumlahwarna);
		$this->db->where('id_order', $idorderes);
		$this->db->update('orders');
		$this->session->set_flashdata('message','<li class="collection-item new badge orange lighten-4 hideflash" data-badge-caption="" style="padding:10px 20px 10px 20px;font-weight:500;list-style-type:none;border-radius:7px;"><i class="material-icons right close" style="">close</i><span class="">Jumlah warna berhasil <b>ditambahkan</b>!</span></li>');
		redirect('admin/detailpesananadmin/'.$idorderes);
		return false;
	}


}