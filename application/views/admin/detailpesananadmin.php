
    <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('admin'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Detail pesanan</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">Detail pesanan</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

    <div class="row" style="max-width:1000px;display:flex;align-items:center;"> <!-- awal maxwidth -->
    <div class="row persenwidht naik" style="padding-bottom: 15px;width:99%;margin:1px auto;left:0;right:0;">

		
    	<div class="row" style="margin-top:10px"><!-- customize -->
			<!-- <span class="card-title left" style="font-weight:bold;margin:5px 0 5px 0;font-size:20px;margin-left:23px;margin-bottom:5px;"><span class="left" style=""><?= $produk['nama_produk']; ?></span></span> -->
			<div class="col s12">
		      <?=$this->session->flashdata('message'); ?>
		    </div>
			<div class="col s12">
			  <div class="card z-depth-2 teal indipemesanan" style="width:99%;margin:1px auto;left:0;right:0;border-radius:7px 7px 0 0;">
			  	<div class="card-image">
			  		<div class="customgambar center">
			  			<!-- <h5 style="padding:140px 10px 140px 10px;">Silahkan upload custom desain anda pada form dibawah!</h5> -->
              <?php if($detailorder['warna_order']=='custom'){ ?>
			          <img class="materialboxed" src="<?=base_url('assets/img/customproduk/').$detailorder['foto_order']; ?>" style="border-radius:7px 7px 0 0;"> 
              <?php }else{ ?>
                <img class="materialboxed" src="<?=base_url('assets/img/produk/').$detailorder['foto_order']; ?>" style="border-radius:7px 7px 0 0;"> 
              <?php } ?>
			          <!-- <a href="#modaltambahwarna" style="top:0;right:0;border-radius:0 7px 0 7px;height:50px;width:50%;font-size:15px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 blue modal-trigger"><i class="material-icons left" style="font-size:30px;margin:0">add_photo_alternate</i> <span style="margin-left:-50px">Lihat pemesan</span></a> -->
              <?php if($detailorder['warna_order']=='custom'){ ?>
                <a download href="<?=base_url('assets/img/customproduk/').$detailorder['foto_order']; ?>" style="top:0;left:0;border-radius:7px 0px 7px 0;height:45px;width:60px;font-size:15px;background-color:rgba(0,0,0,0);" class="btn-floating halfway-fab waves-effect waves-light z-depth-0"><i class="material-icons left grey-text" style="font-size:30px;text-shadow:2px 2px 1px black">get_app</i></a>
              <?php } ?>
			          <a href="#modalinfouser" style="top:0;right:0;border-radius:0 7px 0 7px;height:45px;width:60px;font-size:15px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 blue modal-trigger"><i class="material-icons left" style="font-size:30px;">contact_phone</i></a>
              <?php if($detailorder['status_order']=='ditolak'){}else{ ?>
			          <a href="#modalinfobayar" style="top:60px;right:0;border-radius:0 7px 0 7px;height:45px;width:60px;" class="btn-floating halfway-fab waves-effect waves-light modal-trigger <?php if($detailorder['notif_bayar_order']=='pulse'){echo'pulse orange z-depth-4';}else{echo'red z-depth-4';} ?>"><i class="material-icons" style="font-size:40px">local_atm</i></a>
              <?php } ?>
              <?php if($detailorder['warna_order']=='custom'){ ?>
                <a href="#modalinfowarna" style="top:120px;right:0;border-radius:0 7px 0 7px;height:45px;width:60px;font-size:15px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 teal modal-trigger"><i class="material-icons left" style="font-size:30px;">color_lens</i></a>
              <?php } ?>
			        </div>
			          <span href="#modalinfoproduk" class="card-title white-text modal-trigger left" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:27px;font-weight:bold;text-shadow:2px 2px 1px black">
                  <?php if($detailorder['warna_order']=='custom'){
                      echo "Custom ".$detailorder['nama_produk'];
                    }else{
                      echo $detailorder['nama_produk'];
                    } ?>   
                  <i class="material-icons white-text right" style="margin-left:5px;">touch_app</i>
                </span>
			    </div>

			    <div class="card-content white" style="border-radius:0 0 7px 7px;padding:0;margin-top:20px">
			    <div id="test8" style="min-height:300px;">
			    <?php 
			    	$s=$detailorder['s_order'];
			    	$m=$detailorder['m_order'];
			    	$l=$detailorder['l_order'];
			    	$xl=$detailorder['xl_order'];
			    	$xxl=$detailorder['xxl_order'];
			    	$arrayukuran=[$s,$m,$l,$xl,$xxl];
			    	$arraytipe=['S','M','L','XL','XXL'];
			    ?>
					<ul class="collection" style="margin-top:-20px;">
            <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['nama_user']; ?></span>Nama</li>
            <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['kode_order']; ?></span>Kode Order</li>
          <?php if($detailorder['jumlahwarna_order']<=0){}else{ ?>
            <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['jumlahwarna_order']; ?></span>Jumlah Warna</li>
          <?php } ?>
					<?php for($i=0;$i<count($arrayukuran);$i++): ?>
						<?php if($arrayukuran[$i]==0){ ?>

						<?php }else{ ?>
				      		<li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$arrayukuran[$i]; ?> pcs</span>Ukuran <?=$arraytipe[$i]; ?></li>
				  	<?php } ?>
				  <?php endfor; ?>
				  		<li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['themost_order']; ?> pcs</span>Semua Pesanan</li>
          <?php if($detailorder['warna_order']=='custom'): ?>
              <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=number_format($detailorder['biaya_sablon_produk'], 0, ".", "."); ?>/pcs</span>Biaya Sablon</li>
          <?php endif; ?>
				  		<li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?= 'Rp '.number_format($detailorder['total_order'], 0, ".", "."); ?></span>Total Harga</li>
              <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['status_order']; ?></span>Status</li>
          <?php if($detailorder['warna_order']=='custom'){ ?>
            <?php if($detailorder['jumlahwarna_order']<=0){}else{ ?>
              <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px">
                <?php 
                  if($detailorder['jumlahwarna_order']==1){
                    $estimasi=ceil($detailorder['themost_order']/50);
                  }else if($detailorder['jumlahwarna_order']==2){
                    $estimasi=ceil($detailorder['themost_order']/40);
                  }else if($detailorder['jumlahwarna_order']==3){
                    $estimasi=ceil($detailorder['themost_order']/30);
                  }else if($detailorder['jumlahwarna_order']==4){
                    $estimasi=ceil($detailorder['themost_order']/20);
                  }else if($detailorder['jumlahwarna_order']==5){
                    $estimasi=ceil($detailorder['themost_order']/15);
                  }else if($detailorder['jumlahwarna_order']==6){
                    $estimasi=ceil($detailorder['themost_order']/10);
                  }else{
                    $estimasi=ceil($detailorder['themost_order']/5);
                  }

                  if($detailorder['themost_order']>=1&&$detailorder['themost_order']<=50){
                    echo $estimasi." hari(Kecil)";
                  }else if($detailorder['themost_order']>=51&&$detailorder['themost_order']<=200){
                    echo $estimasi." hari(Sedang)";
                  }else if($detailorder['themost_order']>=201&&$detailorder['themost_order']<=500){
                    echo $estimasi." hari(Besar)";
                  }else{
                    echo $estimasi." hari(Sangat besar)";
                  }
                  // if($detailorder['themost_order']>=1&&$detailorder['themost_order']<=50){
                  //   echo "2 hari(Kecil)";
                  // }else if($detailorder['themost_order']>=51&&$detailorder['themost_order']<=200){
                  //   echo "5 hari(Sedang)";
                  // }else if($detailorder['themost_order']>=201&&$detailorder['themost_order']<=500){
                  //   echo "7 hari(Besar)";
                  // }else{
                  //   echo "15 hari++(Sangat besar)";
                  // }
                ?>
              </span>Estimasi</li>
            <?php } ?>
          <?php }else{ ?>
              <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px">
                <?php 
                  if($detailorder['themost_order']>=1&&$detailorder['themost_order']<=50){
                    echo "1 hari(Kecil)";
                  }else if($detailorder['themost_order']>=51&&$detailorder['themost_order']<=200){
                    echo "2 hari(Sedang)";
                  }else if($detailorder['themost_order']>=201&&$detailorder['themost_order']<=500){
                    echo "3 hari(Besar)";
                  }else{
                    echo "4 hari++(Sangat besar)";
                  }
                ?>
              </span>Estimasi</li>
          <?php } ?>
              <!-- <?php if(empty($jumlahpenyablon['jumlahpenyablon'])){}else{ ?>
              <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=ceil($detailorder['themost_order']/($jumlahpenyablon['jumlahpenyablon']*10)); ?> hari</span>Estimasi Waktu Pengerjaan</li>
              <?php } ?> -->
              <li class="collection-item teal white-text" style="font-size:20px">
				  			<p>Telepon : <?=$detailorder['telepon_order']; ?></p><br>
				  			<span>Alamat :<br> <?=$detailorder['alamat_order']; ?></span>
				  		</li>
				    </ul>

            <?php if($detailorder['status_order']=='dibayar'||$detailorder['status_order']=='dalamproses'||$detailorder['status_order']=='dalampengiriman'||$detailorder['status_order']=='selesai'): ?>
            <?php if($detailorder['status_pembayaran_order']=='bayarditerima'): ?>  
            <ul class="collapsible z-depth-0" style="margin-top:-15px;">
              <li>
                <div class="collapsible-header"><span style="font-size:18px;font-weight:bold;">Karyawan yang ditugaskan</span><i class="material-icons teal-text right" style="margin-left:5px;">touch_app</i></div>
                <div class="collapsible-body">
                  <!-- <ul class="collection with-header">
                    <li class="collection-header"><h4>First Names</h4></li>
                    <?php foreach($detailpenyablon as $dp): ?>
                    <li class="collection-item">1.<?=$dp['nama_karyawan']; ?></li>
                    <?php endforeach; ?>
                  </ul> -->
              <?php if(empty($jumlahpenyablon['jumlahpenyablon'])){echo "Belum ada karyawan yang dimasukan!";}else{ ?>
                  <table style="margin-top:-15px">
                    <thead>
                      <tr>
                          <th style="padding:5px">No</th>
                          <th style="padding:5px">Nama</th>
                          <th style="padding:5px">No.Tlp</th>
                          <?php if($detailorder['status_order']=='dibayar'||$detailorder['status_order']=='dalamproses'): ?>
                          <th style="padding:5px">Action</th>
                          <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($detailpenyablon as $dp): ?>
                      <tr>
                        <td style="padding:5px"><?=$i++; ?></td>
                        <td style="padding:5px"><?=$dp['nama_karyawan']; ?></td>
                        <td style="padding:5px"><?=$dp['notlp_karyawan']; ?></td>
                        <?php if($detailorder['status_order']=='dibayar'||$detailorder['status_order']=='dalamproses'): ?>
                        <td style="padding:5px"><a onclick="return confirm('Pilih OK untuk membatalkan!');" href="<?=base_url('admin/batalkaryawan/'.$detailorder['id_order'].'/'.$dp['id_karyawan']); ?>"><button class="red white-text">batal</button></a></td>
                        <?php endif; ?>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
              <?php } ?>

                  <?php if($detailorder['status_order']=='dibayar'||$detailorder['status_order']=='dalamproses'): ?>
                  <form action="<?=base_url('admin/pilihkaryawan/'); ?>" method="post">
                    <input type="hidden" name="idorders" value="<?=$detailorder['id_order']; ?>">
                    <div class="input-field">
                      <select name="selectkaryawan">
                        <option value="" disabled selected>Pilih karyawan</option>
                        <?php foreach($karyawan as $krwn): ?>
                        <?php if($krwn['status_karyawan']=='kosong'){ ?>
                          <option value="<?=$krwn['id_karyawan']; ?>"><?=$krwn['nama_karyawan']; ?></option>
                        <?php }else{ ?>
                          <option value="<?=$krwn['id_karyawan']; ?>" disabled><?=$krwn['nama_karyawan']; ?></option>
                        <?php } ?>
                        <?php endforeach; ?>
                      </select>
                      <!-- <label>Materialize Select</label> -->
                    </div>
                    <button class="btn-small" type="submit" name="penyablon">Tugaskan</button>
                  </form>
                  <?php endif; ?>
                </div>
              </li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>

          <?php if($detailorder['status_pembayaran_order']=='bayarditerima'&&$detailorder['status_order']=='dibayar'||$detailorder['status_pembayaran_order']=='bayarditerima'&&$detailorder['status_order']=='dalamproses'): ?>
            <!-- <div class="row">
              <div class="col s12"> -->
            <?php if($detailorder['priority_order']=='prioritas'){ ?>
              <a onclick="return confirm('Pilih Ok untuk batalkan prioritas!');" href="<?=base_url('admin/tambahprioritas/'.$geturl); ?>" class="btn red left">Batalkan prioritas</a>
            <?php }else{ ?>
              <a onclick="return confirm('Pilih Ok untuk jadikan prioritas!');" href="<?=base_url('admin/tambahprioritas/'.$geturl); ?>" class="btn orange left">Prioritaskan</a>
            <?php } ?>
              <!-- </div>
            </div> -->
          <?php endif; ?>

          <!-- <?php if($detailorder['status_pembayaran_order']=='belumbayar'||$detailorder['status_pembayaran_order']=='sudahbayar'){ ?>
            <?php if($detailorder['status_order']=='ditolak'){ ?> -->
              <!-- <a href="<?=base_url('admin/bukaorder/'.$geturl); ?>" class="btn green right">Buka</a> -->
            <!-- <?php }else{ ?>
              <a href="<?=base_url('admin/tolakorder/'.$geturl); ?>" class="btn red right">Tolak/tutup</a>
            <?php } ?>
          <?php } ?> -->
          <?php if($detailorder['status_order']=='dikonfirmasi'||$detailorder['status_order']=='dibayar'||$detailorder['status_order']=='ditolak'){ ?>
            <?php if($detailorder['status_pembayaran_order']=='bayarditerima'||$detailorder['status_order']=='ditolak'){ ?>
              <!-- <a href="<?=base_url('admin/bukaorder/'.$geturl); ?>" class="btn green right">Buka</a> -->
            <?php }else{ ?>
              <a onclick="return confirm('Pilih Ok untuk tolak pesanan ini!');" href="<?=base_url('admin/tolakorder/'.$geturl); ?>" class="btn red right">Tolak</a>
            <?php } ?>
          <?php } ?>

				  <?php if($detailorder['status_pembayaran_order']=='bayarditerima'&&$detailorder['status_order']=='dibayar'){ ?>
            <?php if(empty($jumlahpenyablon['jumlahpenyablon'])){ ?>
              <a onclick="return alert('Silahkan pilih karyawan dahulu!');" href="#!" class="btn blue right disabled">Proses sekarang</a>
            <?php }else{ ?>
				    	<a onclick="return confirm('Pilih Ok untuk proses pengerjaan!');" href="<?=base_url('admin/prosespesanan/'.$geturl); ?>" class="btn blue right">Proses sekarang</a>
            <?php } ?>
					<?php } ?>
					<?php if($detailorder['status_order']=='dalamproses'){ ?>
				    	<a onclick="return confirm('Pilih Ok untuk proses pengiriman!');" href="<?=base_url('admin/kirimpesanan/'.$geturl); ?>" class="btn blue right">Kirim sekarang</a>
					<?php } ?>
					<?php if($detailorder['status_order']=='dalampengiriman'){ ?>
				    	<a  onclick="return confirm('Pilih Ok untuk konfirmasi telah selesai!');" href="<?=base_url('admin/selesaipesanan/'.$geturl); ?>" class="btn blue right">selesai sekarang</a>
					<?php } ?>
					<?php if($detailorder['status_order']=='selesai'){ ?>
				    	<button class="btn disabled right">Selesai</button>
					<?php } ?>

			    </div>
			    </div>

			  </div>
			</div>
		</div>

		  <!-- Modal Trigger -->
  <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->

  <!-- Modal Structure -->
  <div id="modalinfouser" class="modal">
    <div class="modal-content" style="margin-top:-20px">
      <h5>Informasi Pemesan</h5>
      <img src="<?=base_url('assets/img/users/'.$detailorder['foto_user']); ?>" width="100%">
      <ul class="collection">
        <li class="collection-item" style="font-size:20px"><b>Id User :</b> <?=$detailorder['id_pelanggan']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Nama :</b> <?=$detailorder['nama_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Tgl Lahir :</b> <?=$detailorder['tanggallahir_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Jenis Kelamin :</b> <?=$detailorder['jeniskelamin_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>No.Tlp :</b> <?=$detailorder['nomertelepon_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Alamat :</b> <?=$detailorder['alamat_user']; ?></li>
      </ul>
    </div>
    <!-- <div class="modal-footer"> -->
      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
    <!-- </div> -->
  </div>

  <!-- Modal Structure -->
  <div id="modalinfoproduk" class="modal">
    <div class="modal-content" style="margin-top:-20px">
      <h5>Informasi Produk</h5>
      <ul class="collection" style="padding:0;">
        <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['nama_produk']; ?></span>Nama</li>
      <?php
        $iddetailproduk=$detailorder['id_produk_order'];
        $query="SELECT * from produks join produks_size on produks.id_produk=produks_size.produk_id where id_produk=$iddetailproduk order by FIELD(tipe_size,'S','M','L','XL','XXL')";
        $detailsize=$this->db->query($query)->result_array();
      ?>
      <?php foreach($detailsize as $ds): ?>
        <?php if($ds['harga_size']==0){}else{ ?>
          <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px">Rp <?=number_format($ds['harga_size'], 0, ".", "."); ?>/pcs</span><?=$ds['tipe_size']; ?></li>
        <?php } ?>
      <?php endforeach; ?>
        <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px">Rp <?=number_format($detailorder['biaya_sablon_produk'], 0, ".", "."); ?>/pcs</span>Sablon</li>
        <li class="collection-item" style="font-size:20px"><span>Deskripsi :</span><br><span style="font-size:20px"><?=$detailorder['deskripsi_produk']; ?></span></li>
      </ul>
    </div>
    <!-- <div class="modal-footer"> -->
      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
    <!-- </div> -->
  </div>

   <!-- Modal tambah warna -->
      <div id="modalinfowarna" class="modal">
        <div class="modal-content">
          <h5 style="margin-top:-10px">Ubah jumlah warna</h5>
          <form action="<?=base_url('admin/tambahjumlahwarna'); ?>" method="post">
            <input type="hidden" name="idorderes" value="<?=$detailorder['id_order']; ?>">
            <div class="input-field">
              <input id="namawarna" type="number" class="validate" name="jumlahwarna" value="0" required>
              <label for="namawarna">Jumlah warna</label>
            </div>
            <button class="btn waves-effect waves-light right blue" type="submit" name="tambahwarna">OK</button>
          </form>
        </div>
        <div class="modal-footer" style="margin-top:-20px">
          <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
        </div>
      </div>

  <!-- Modal Structure -->
  <div id="modalinfobayar" class="modal">
    <div class="modal-content" style="margin-top:-20px">
      <h5>Bukti Pembayaran</h5>
      <?php if($detailorder['pembayaran_order']=='belum'){ ?>
      	<p class="red-text"><?=$detailorder['nama_user']; ?> belum upload bukti pembayaran!</p>
      <?php }else{ ?>
        <?php if($detailorder['status_pembayaran_order']=='bayarditolak'){ ?>
          <p class="red-text">Bukti pembayaran telah anda tolak! :</p>
        <?php }else if($detailorder['status_pembayaran_order']=='bayarditerima'){ ?>
          <p class="green-text">Bukti pembayaran telah anda terima, silahkan lanjutkan keproses pengerjaan! :</p>
        <?php }else{ ?>
          <p class="blue-text">Bukti pembayaran baru masuk! :</p>
        <?php } ?>
      <img class="materialboxed" src="<?=base_url('assets/img/buktibayar/'.$detailorder['pembayaran_order']); ?>" width="100%">
    </div>
	    <?php if($detailorder['status_order']=='ditolak'||$detailorder['status_order']=='selesai'||$detailorder['status_order']=='dicancel'){}else{ ?>
	    <div class="modal-footer">
	    	<a href="<?=base_url('admin/terimabuktipembayaran/'.$geturl); ?>" class="btn blue">Terima</a>
	    	<a href="<?=base_url('admin/tolakbuktipembayaran/'.$geturl); ?>" class="btn red" style="margin-right:10px">Tolak</a>
	      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
	    </div>
		  <?php } ?>
     <?php } ?>
  </div>

 

		

	</div><!-- tutup persenwidth -->
	</div> <!-- tutup maxwidth -->


    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

      	var base_url='<?=base_url(); ?>';
      	var id_url='<?=$geturl; ?>';
	    $('.sidenav').sidenav({
	    	'edge':'right'
	    });
      $('.collapsible').collapsible();
	    $('.materialboxed').materialbox();
    	$('.slider').slider({
    		'height':300,
    		'indicators':false
    	});
    	$('.carousel').carousel({
    		// 'dist':10,
    		'indicators':true,
    		'padding':70,
    		'fullWidth':true,
    		'noWrap':true,
    		// 'shift':10
    	});
    	$('.tabs').tabs({
    		'swipeable':true,
    		// 'responsiveThreshold':50
    	});
    	$('.modal').modal();
    	$('select').formSelect();

      $('.close').on('click',function(){
        $('.hideflash').fadeOut();
      });

	  // var position = $(window).scrollTop();
   //    $(window).scroll(function() {
   //        var wwidth = $(window).width();
   //        var scroll = $(window).scrollTop();
   //        if(wwidth>600){
   //          respon=-65;
   //        }else{
   //          respon=-55;
   //        }
   //        if(scroll > position) {
   //            $('.bawah').css({
   //              'margin-bottom':'-55px'
   //            });
   //            $('.naik').css({
   //              'transform':'translate(0,'+respon+'px)',
   //              'transition':'.5s'
   //            });
   //        } else {
   //            $('.bawah').css({
   //              'margin-bottom':'0px'
   //            });
   //            $('.naik').css({
   //              'transform':'translate(0,0px)',
   //              'transition':'.5s'
   //            });
   //        }
   //        position = scroll;
   //    });

      // 	$('.navbarmenu').show();
      // 	$('.navbarpencarian').hide();
      // $('.triggernavbarcari').on('click',function(){
      // 	$('.navbarmenu').hide();
      // 	$('.navbarpencarian').fadeIn();
      // 	$('.inputcariberanda').focus()
      // });

      // $('.closepencarian').on('click',function(){
      // 	$('.navbarmenu').fadeIn();
      // 	$('.navbarpencarian').hide();
      // });
      // rubah angka
      function rubah(angka){
	    var reverse = angka.toString().split('').reverse().join(''),
	    ribuan = reverse.match(/\d{1,3}/g);
	    ribuan = ribuan.join('.').split('').reverse().join('');
	    return ribuan;
	  }
      //select warna baju
  //     $('.okpilih').change(function(event){
		// var val=$('.okpilih').val();
		// var ambilimg = $('.ambilimg'+val).data('icon');
		// $('.gantifotoselect').attr('src',ambilimg)
	 //  });

  //     $('.hidecustomize').hide();
	 //  $('.btncustomize').on('click',function(){
	 //  	$('.hidecustomize').fadeIn(1000);
	 //  	$('.hideoriginal').hide();
	 //  });
	 //  $('.btnkembali').on('click',function(){
	 //  	$('.hidecustomize').hide();
	 //  	$('.hideoriginal').fadeIn(1000);
	 //  });

   //    $('#button').on('click', function() {
	  //   $('#file-input').trigger('click');
	  // });

	  // var input = document.getElementById('pilihcustom');
   //      // input.type = 'file';
   //      input.onchange = function(e) { 
   //         // getting a hold of the file reference
   //         var file = e.target.files[0]; 
   //         // setting up the reader
   //         var reader = new FileReader();
   //         reader.readAsDataURL(file); // this is reading as data url
   //         // here we tell the reader what to do when it's done reading...
   //         reader.onload = readerEvent => {
   //            var content = readerEvent.target.result; // this is the content!
   //            $('.customgambar').html('<img class="gantifotoselect" src="'+content+'" style="border-radius:7px;">');
   //         }
   //      }


	  });
    </script>
    </body>
  </html>