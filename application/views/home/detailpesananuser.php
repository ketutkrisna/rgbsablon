
    <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
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
			  <div class="card z-depth-2 teal indipemesanan" style="width:99%;margin:1px auto;left:0;right:0;border-radius:7px;">
			  	<div class="card-image">
			  		<div class="customgambar center">
			  			<!-- <h5 style="padding:140px 10px 140px 10px;">Silahkan upload custom desain anda pada form dibawah!</h5> -->
			        <?php if($detailorder['warna_order']=='custom'){ ?>
                <img class="materialboxed" src="<?=base_url('assets/img/customproduk/').$detailorder['foto_order']; ?>" style="border-radius:7px;"> 
              <?php }else{ ?>
                <img class="materialboxed" src="<?=base_url('assets/img/produk/').$detailorder['foto_order']; ?>" style="border-radius:7px;"> 
              <?php } ?>
			          <!-- <a href="#modaltambahwarna" style="top:0;right:0;border-radius:0 7px 0 7px;height:50px;width:50%;font-size:15px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 blue modal-trigger"><i class="material-icons left" style="font-size:30px;margin:0">add_photo_alternate</i> <span style="margin-left:-50px">Lihat pemesan</span></a> -->
			          <!-- <a href="#modalinfouser" style="top:0;right:0;border-radius:0 7px 0 7px;height:45px;width:60px;font-size:15px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 blue modal-trigger"><i class="material-icons left" style="font-size:30px;">contact_phone</i></a> -->
                <?php if($detailorder['status_order']=='ditolak'||$detailorder['status_order']=='dicancel'){}else{ ?>
			          <a href="#modalinfobayar" style="top:0px;right:0;border-radius:0 7px 0 7px;height:45px;width:60px;" class="btn-floating halfway-fab waves-effect waves-light modal-trigger <?php if($detailorder['notif_bayar_order']=='pulse'){echo'orange z-depth-4';}else{echo'pulse red z-depth-4';} ?>"><i class="material-icons" style="font-size:40px">local_atm</i></a>
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
					<ul class="collection" style="margin-top:-20px">
            <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['nama_user']; ?></span>Nama</li>
            <li class="collection-item" style="font-size:20px"><span class="badge" style="font-size:20px"><?=$detailorder['kode_order']; ?></span>Kode Order</li>
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
				  		<li class="collection-item teal white-text" style="font-size:20px">
				  			<p>Telepon : <?=$detailorder['telepon_order']; ?></p><br>
				  			<span>Alamat :<br> <?=$detailorder['alamat_order']; ?></span>
				  		</li>
				    </ul>

          <?php if($detailorder['status_order']=='menunggu'||$detailorder['status_order']=='dikonfirmasi'||$detailorder['status_order']=='dibayar'){ ?>
            <?php if($detailorder['status_pembayaran_order']=='bayarditerima'){}else{ ?>
              <a onclick="return confirm('Pilih Ok untuk cancel pesanan!');" href="<?=base_url('users/batalpesan/'.$geturl); ?>" class="btn red right">Cancel</a>
            <?php } ?>
          <?php } ?>
				   <!--  <?php if($detailorder['status_pembayaran_order']=='bayarditerima'&&$detailorder['status_order']=='dibayar'){ ?>
				    	<a href="<?=base_url('admin/prosespesanan/'.$geturl); ?>" class="btn blue right">Proses sekarang</a>
					<?php } ?>
					<?php if($detailorder['status_order']=='dalamproses'){ ?>
				    	<a href="<?=base_url('admin/kirimpesanan/'.$geturl); ?>" class="btn blue right">Kirim sekarang</a>
					<?php } ?>
					<?php if($detailorder['status_order']=='dalampengiriman'){ ?>
				    	<a href="<?=base_url('admin/selesaipesanan/'.$geturl); ?>" class="btn blue right">selesai sekarang</a>
					<?php } ?>
					<?php if($detailorder['status_order']=='selesai'){ ?>
				    	<button class="btn disabled right">Selesai</button>
					<?php } ?> -->

			    </div>
			    </div>

			  </div>
			</div>
		</div>

		  <!-- Modal Trigger -->
  <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->

  <!-- Modal Structure -->
  <!-- <div id="modalinfouser" class="modal">
    <div class="modal-content" style="margin-top:-20px">
      <h5>Informasi Pemesan</h5>
      <img src="<?=base_url('assets/img/users/'.$detailorder['foto_user']); ?>" width="100%">
      <ul class="collection">
      	<li class="collection-item" style="font-size:20px"><b>Nama :</b> <?=$detailorder['nama_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Tgl Lahir :</b> <?=$detailorder['tanggallahir_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Jenis Kelamin :</b> <?=$detailorder['jeniskelamin_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>No.tlp :</b> <?=$detailorder['nomertelepon_user']; ?></li>
      	<li class="collection-item" style="font-size:20px"><b>Alamat :</b> <?=$detailorder['alamat_user']; ?></li>
      </ul>
    </div> -->
    <!-- <div class="modal-footer"> -->
      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
    <!-- </div> -->
  </div>

  <!-- Modal Structure -->
  <div id="modalinfobayar" class="modal">
    <div class="modal-content" style="margin-top:-20px;overflow-x:hidden;">
      <h5>Upload Bukti Pembayaran</h5>

      <p style="margin-bottom: -10px;"><b>Cara Pembayaran</b></p>

      <p style="text-align: justify;">Untuk terus mempermudah metode pembayaran bagi para customer RGB Sablon, kini kami menyediakan berbagai alternatif metode pambayaran, yaitu:</p>
      <!-- <ul> -->
        <div class="container">
        <li>Mobile Banking</li>
        <li>Internet Banking</li>
        <li>SMS Banking</li>
        <li>Phone Banking</li>
        <li>ATM</li>
        <li>Transfer Bank</li>
        </div>
      <!-- </ul> -->

      <p style="margin-bottom: -0px"><b>Rekening Pembayaran Bank Lokal</b></p>

      <table class="striped s">
        <tbody>
          <tr>
            <td>Nama Bank</td>
            <td>: <span style="padding-left: 20px;font-weight: bold;">BCA</span></td>
          </tr>
          <tr>
            <td>Atas Nama</td>
            <td>: <span style="padding-left: 20px;font-weight: bold;">Wayan Hardiante</span></td>
          </tr>
          <tr>
            <td>No. Rekening</td>
            <td>: <span style="padding-left: 20px;font-weight: bold;">0231-4218-49</span></td>
          </tr>
        </tbody>
      </table>

      <!-- <p style="margin-bottom: -10px"><b>Upload Bukti Pembayaran</b></p> -->

      <!-- <p>Silahkan upload bukti pembayaran anda dibawah ini :</p> -->

      <?php if($detailorder['pembayaran_order']=='belum'){ ?>
      	<!-- <p class="">Belum upload bukti pembayaran</p> -->
        <p class="red-text">Belum melakukan pembayaran, silahkan upload bukti pembayaran anda dibawah ini :</p>
      <?php }else{ ?>
        <?php if($detailorder['status_pembayaran_order']=='bayarditolak'){ ?>
          <p class="red-text">Bukti pembayaran anda ditolak, silahkan upload kembali bukti pembayaran yang sesuai! :</p>
        <?php }else if($detailorder['status_pembayaran_order']=='bayarditerima'){ ?>
          <p class="green-text">Bukti pembayaran anda diterima! :</p>
        <?php }else{ ?>
          <p class="blue-text">Bukti pembayaran anda telah diupload, tunggu konfirmasi penerimaan dari admin! :</p>
        <?php } ?>
        <img class="materialboxed" src="<?=base_url('assets/img/buktibayar/'.$detailorder['pembayaran_order']); ?>" width="100%">
      <?php } ?>

      <?php if($detailorder['status_pembayaran_order']=='bayarditerima'){}else{ ?>
      <form action="<?=base_url('users/uploadbuktibayar'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idorderuser" value="<?=$detailorder['id_order']; ?>">
        <div class="file-field input-field">
          <div class="btn blue">
            <span>File</span>
            <input type="file" name="fotobuktibayar" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload bukti pembayaran">
          </div>
        </div>
        <button class="btn-small blue right" style="margin-top:10px;" type="submit" name="uploadbuktibayar">Upload</button>
      </form>
      <?php } ?>
    </div>
	    <!-- <?php if($detailorder['status_order']=='dibatalkan'||$detailorder['status_order']=='selesai'){}else{ ?> -->
	    <div class="modal-footer">
	    	<!-- <a href="<?=base_url('admin/terimabuktipembayaran/'.$geturl); ?>" class="btn blue">Terima</a> -->
	    	<!-- <a href="<?=base_url('admin/tolakbuktipembayaran/'.$geturl); ?>" class="btn red">Tolak</a> -->
	    </div>
		<!-- <?php } ?> -->
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