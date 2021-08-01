
    <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/produk'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Pesan Produk</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">Pesan Produk</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

    <div class="row" style="max-width:1000px;display:flex;align-items:center;"> <!-- awal maxwidth -->
    <div class="row persenwidht" style="padding-bottom: 15px;width:99%;margin:1px auto;left:0;right:0;">

		<div class="row naik hideoriginal" style="margin-top:10px"><!-- kembali ke awal polos -->
			<!-- <span class="card-title left" style="font-weight:bold;margin:5px 0 5px 0;font-size:20px;margin-left:23px;margin-bottom:5px;"><span class="left" style=""><?= $produk['nama_produk']; ?></span></span> -->
			<div class="col s12">
			  <div class="card z-depth-2 teal indipemesanan" style="width:99%;margin:1px auto;left:0;right:0;border-radius:7px;">
			  	<div class="card-image">
			          <!-- <img class="gantifotoselect" src="<?=base_url('assets/img/produk/').$produk['foto_produk']; ?>" style="border-radius:7px;"> -->
			          <div class="carousel carousel-slider center">
			          <?php foreach($datacolor as $dslide): ?>
					    <div class="carousel-item teal white-text" href="#one!" style="border-radius:7px;padding:0">
					    	<img class="gantifotoselect" src="<?=base_url('assets/img/produk/').$dslide['foto_color']; ?>" style="border-radius:7px;">
					      	<h2 class="orange-text" style="position: absolute;top:0;font-weight:bold;text-shadow:1px 1px 1px black;right:10px"><?=$dslide['warna_color']; ?></h2>
					    </div>
					  <?php endforeach; ?>
					  </div>

			          <span class="card-title white-text left" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:27px;font-weight:bold;text-shadow:2px 2px 1px black"><?= $produk['nama_produk']; ?></span>
			          <button id="button" class="card-title teal white-text z-depth-2 btncustomize" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:17px;top:0;height:40px;border:2px solid white;">Customize</button>
			          <!-- <span class="card-title">Mobile Apps</span> -->
			        </div>
			    <!-- <div class="card-content teal  white-text">
			      <span class="card-title center">Kenapa RGB Sablon?</span>
			      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
			    </div> -->
			    <div class="card-tabs">
			      <ul class="tabs tabs-fixed-width grey lighten-3" style="border-radius:7px 7px 0 0;">
			        <li class="tab"><a href="#test4" class="black-text">Detail size</a></li>
			        <li class="tab"><a class="active black-text" href="#test5">Pesan</a></li>
			        <li class="tab"><a href="#test6" class="black-text">Deskripsi</a></li>
			      </ul>
			    </div>
			    <div class="card-content white" style="border-radius:0 0 7px 7px;">
			      <div id="test4" style="min-height:300px">
			      	  <table style="margin-top:-20px" class="centered">
				        <thead>
				          <tr>
				              <th>Varian</th>
				              <th>Ukuran</th>
				              <th>Harga</th>
				          </tr>
				        </thead>
				        <tbody>
				        <?php foreach($datasize as $size): ?>
				          <tr>
				        <?php if($size['harga_size']<=0){}else{ ?>
				            <td><?= $size['tipe_size']; ?></td>
				            <td><?= $size['deskripsi_size']; ?></td>
				            <td><?= 'Rp '.number_format($size['harga_size'], 0, ".", "."); ?></td>
				        <?php } ?>
				          </tr>
				      	<?php endforeach; ?>
				        </tbody>
				      </table>
			      </div>
			      <div id="test5" style="min-height:300px;">
					   <div class="row">
					    <form class="col s12" action="<?=base_url('users/kirimorder'); ?>" method="post">
					    	<input type="hidden" name="idprodukorder" value="<?=$geturl; ?>">
				    	  <div class="input-field">
						    <select class="icons okpilih" name="idwarnacolororder" required>
						      <option value="" disabled selected>Pilih Warna</option>
						    <?php foreach($datacolor as $color): ?>
						      <option value="<?=$color['id_color']; ?>" class="ambilimg<?= $color['id_color']; ?>" data-icon="<?= base_url('assets/img/produk/').$color['foto_color']; ?>"><?= $color['warna_color']; ?></option>
						    <?php endforeach; ?>
						    </select>
						    <label>Pilih Warna</label>
						  </div>
					      <div class="row">
					      <?php foreach($datasize as $dsinput): ?>
					      	<?php if($dsinput['harga_size'] <= 0){ ?>
					      		<input type="hidden" value="0" class="center jumlah<?=$dsinput['tipe_size']; ?>" name="ukuran<?=$dsinput['tipe_size']; ?>order">
					      	<?php }else{ ?>
					      		<div class="input-field col s4">
						          <span class="blue prefix white-text center" style="height:76%;font-size:25px;margin-top:-3px"><?=$dsinput['tipe_size']; ?></span>
						          <input id="icon_prefix<?=$dsinput['tipe_size']; ?>" type="number" value="0" class="center jumlah<?=$dsinput['tipe_size']; ?>" name="ukuran<?=$dsinput['tipe_size']; ?>order" required>
						          <label for="icon_prefix<?=$dsinput['tipe_size']; ?>">PCS</label>
						        </div>
					      	<?php } ?>
					        <!-- <div class="input-field col s4">
					          <span class="blue prefix white-text center" style="height:76%;font-size:25px;margin-top:-3px"><?=$dsinput['tipe_size']; ?></span>
					          <input <?php if($dsinput['harga_size'] <= 0){echo'disabled';}else{echo'';} ?> id="icon_prefix<?=$dsinput['tipe_size']; ?>" type="number" value="0" class="center jumlah<?=$dsinput['tipe_size']; ?>" required>
					        <?php if($dsinput['harga_size'] <= 0){ ?>
					          <label for="icon_prefix<?=$dsinput['tipe_size']; ?>">Kosong</label>
					        <?php }else{ ?>
					          <label for="icon_prefix<?=$dsinput['tipe_size']; ?>">PCS</label>
					        <?php } ?>
					        </div> -->
					      <?php endforeach; ?>
					        <!-- <div class="input-field col s4">
					          <span class="blue prefix white-text center" style="height:76%;font-size:25px;">M</span>
					          <input id="icon_prefix1" type="text" value="0" class="center jumlahm" required>
					          <label for="icon_prefix1">Jumlah</label>
					        </div>
					        <div class="input-field col s4">
					          <span class="blue prefix white-text center" style="height:76%;font-size:25px;">L</span>
					          <input id="icon_prefix2" type="text" value="0" class="center jumlahl" required>
					          <label for="icon_prefix2">Jumlah</label>
					        </div>
					        <div class="input-field col s4">
					          <span class="blue prefix white-text center" style="height:76%;font-size:25px;">XL</span>
					          <input id="icon_prefix3" type="text" value="0" class="center jumlahxl" required>
					          <label for="icon_prefix3">Jumlah</label>
					        </div>
					        <div class="input-field col s4">
					          <span class="blue prefix white-text center" style="height:76%;font-size:25px;">XXL</span>
					          <input id="icon_prefix4" type="text" value="0" class="center jumlahxxl" required>
					          <label for="icon_prefix4">Jumlah</label>
					        </div> -->
					      </div>
					      <div class="row">
					        <div class="input-field col s12" style="margin-top:-20px;">
					          <input id="notlp" type="number" name="notlporder" class="validate" required>
					          <label for="notlp">No.Tlp</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12" style="margin-top:-20px">
					          <input id="alamat" type="text" name="alamatorder" class="validate" required>
					          <label for="alamat">Alamat</label>
					        </div>
					      </div>
					      <input type="hidden" name="totalorder" class="tampungtotal">
					      <div class="row">
					      	<div class="col s12" style="margin-top:-20px">
					        <span style="font-size:18px;" class="totalhargapolos"></span>
					        </div>
					      </div>
					    <?php if($this->session->userdata('level_user')=='user'){ ?>
					      <div class="row">
					      	<div class="col s12">
					        <button style="width:100%" type="submit" name="kirimorder" class="btn-large blue">Kirim</button>
					        </div>
					      </div>
					    <?php } ?>
					    </form>
					  </div>
			      </div>
			      <div id="test6" style="text-align: center;min-height:300px">
			      	<p><?= $produk['deskripsi_produk']; ?></p>
			      </div>
			    </div>
			  </div>
			</div>
		</div>

		<div class="row naik hidecustomize" style="margin-top:10px"><!-- customize -->
			<!-- <span class="card-title left" style="font-weight:bold;margin:5px 0 5px 0;font-size:20px;margin-left:23px;margin-bottom:5px;"><span class="left" style=""><?= $produk['nama_produk']; ?></span></span> -->
			<div class="col s12">
			  <div class="card z-depth-2 teal indipemesanan" style="width:99%;margin:1px auto;left:0;right:0;border-radius:7px;">
			  	<div class="card-image">
			  		<div class="customgambar center">
			  			<h5 style="padding:140px 10px 140px 10px;">Silahkan upload custom desain anda!<br>harap sesuaikan dengan jenis barang yang anda custom</h5>
			          <!-- <img class="gantifotoselect" src="<?=base_url('assets/img/produk/').$produk['foto_produk']; ?>" style="border-radius:7px;"> -->
			        </div>
			          <span class="card-title white-text left" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:27px;font-weight:bold;text-shadow:2px 2px 1px black"><?= 'Custom '.$produk['nama_produk']; ?></span>
			          <button id="button" class="card-title red white-text z-depth-2 btnkembali" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:17px;top:0;height:40px;border:2px solid white;">Kembali</button>
			          <!-- <span class="card-title">Mobile Apps</span> -->
			        </div>
			    <!-- <div class="card-content teal  white-text">
			      <span class="card-title center">Kenapa RGB Sablon?</span>
			      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
			    </div> -->
			    <div class="card-tabs">
			      <ul class="tabs tabs-fixed-width grey lighten-3" style="border-radius:7px 7px 0 0;">
			        <li class="tab"><a href="#test7" class="black-text">Detail size</a></li>
			        <li class="tab"><a class="active black-text" href="#test8">Pesan</a></li>
			        <li class="tab"><a href="#test9" class="black-text">Deskripsi</a></li>
			      </ul>
			    </div>
			    <div class="card-content white" style="border-radius:0 0 7px 7px;">
			      <div id="test7" style="min-height:300px">
			      	  <table style="margin-top:-20px" class="centered">
				        <thead>
				          <tr>
				              <th>Varian</th>
				              <th>Ukuran</th>
				              <th>Harga</th>
				          </tr>
				        </thead>
				        <tbody>
				        <?php foreach($datasize as $size): ?>
				          <tr>
				        <?php if($size['harga_size']<=0){}else{ ?>
				            <td><?= $size['tipe_size']; ?></td>
				            <td><?= $size['deskripsi_size']; ?></td>
				            <td><?= 'Rp '.number_format($size['harga_size'], 0, ".", "."); ?></td>
				        <?php } ?>
				          </tr>
				      	<?php endforeach; ?>
				      	  	<td>Biaya sablon</td>
				      	  	<td></td>
				      	  	<td>Rp <?=number_format($produk['biaya_sablon_produk'], 0, ".", "."); ?></td>
				        </tbody>
				      </table>
			      </div>
			      <div id="test8" style="min-height:300px;">
					   <div class="row">
					    <form class="col s12" action="<?=base_url('users/kirimordercustom'); ?>" method="post" enctype="multipart/form-data">
					    	<input type="hidden" name="idprodukcustom" value="<?=$geturl; ?>">
				    	  	<div class="file-field input-field">
						      <div class="btn blue">
						        <span>File</span>
						        <input type="file" class="pilihcustom" id="pilihcustom" name="customfoto"  multiple>
						      </div>
						      <div class="file-path-wrapper">
						        <input class="file-path validate" type="text" placeholder="Upload desain custome" required>
						      </div>
						    </div>
					      <div class="row">
					      <?php foreach($datasize as $dsinput): ?>
					      	<?php if($dsinput['harga_size'] <= 0){ ?>
					      		<input type="hidden" value="0" class="center customjumlah<?=$dsinput['tipe_size']; ?>" name="customukuran<?=$dsinput['tipe_size']; ?>order">
					      	<?php }else{ ?>
					      		<div class="input-field col s4">
						          <span class="blue prefix white-text center" style="height:76%;font-size:25px;margin-top:-3px"><?=$dsinput['tipe_size']; ?></span>
						          <input id="icon_prefixct<?=$dsinput['tipe_size']; ?>" type="number" value="0" class="center customjumlah<?=$dsinput['tipe_size']; ?>" name="customukuran<?=$dsinput['tipe_size']; ?>order" required>
						          <label for="icon_prefixct<?=$dsinput['tipe_size']; ?>">PCS</label>
						        </div>
					      	<?php } ?>
					      <?php endforeach; ?>
					      </div>
					      <div class="row">
					        <div class="input-field col s12" style="margin-top:-20px;">
					          <input id="notlpcustom" type="text" class="validate" name="customnotlp" required>
					          <label for="notlpcustom">No.Tlp</label>
					        </div>
					      </div>
					      <div class="row">
					        <div class="input-field col s12" style="margin-top:-20px">
					          <input id="alamatcustom" type="text" class="validate" name="customalamat" required>
					          <label for="alamatcustom">Alamat</label>
					        </div>
					      </div>
					      <input type="hidden" name="customtotalorder" class="customtampungtotal">
					      <div class="row">
					      	<div class="col s12" style="margin-top:-20px">
					        <span style="font-size:18px;" class="customtotalharga"></span>
					        </div>
					      </div>
					    <?php if($this->session->userdata('level_user')=='user'){ ?>
					      <div class="row">
					      	<div class="col s12">
					        <button style="width:100%" type="submit" name="pesancustom" class="btn-large blue">Kirim</button>
					        </div>
					      </div>
					  	<?php } ?>
					    </form>
					  </div>
			      </div>
			      <div id="test9" style="text-align: center;min-height:300px">
			      	<p><?= $produk['deskripsi_produk']; ?></p>
			      	<hr>
			      	<p style="text-align:left;">
			      		<b>Ketentuan</b> :<br>
			      		<span>1. Dengan custom desain maka akan dikenakan biaya tambahan sesuai produk yang dipesan.</span><br>
			      		<span>2. Perhatikan desain yang anda upload harus sesuai dengan jenis produk!<br>
			      			Contoh:Jika anda pesan pada kaos polos lengan pendek, maka upload lah desain dengan lengan pendek agar pesanan anda tidak ditolak.
			      		</span>
			      	</p>
			      </div>
			    </div>
			  </div>
			</div>
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
    		// 'swipeable':true,
    		// 'responsiveThreshold':50
    	});
    	$('select').formSelect();

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

      	$('.navbarmenu').show();
      	$('.navbarpencarian').hide();
      $('.triggernavbarcari').on('click',function(){
      	$('.navbarmenu').hide();
      	$('.navbarpencarian').fadeIn();
      	$('.inputcariberanda').focus()
      });

      $('.closepencarian').on('click',function(){
      	$('.navbarmenu').fadeIn();
      	$('.navbarpencarian').hide();
      });
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

      $('.hidecustomize').hide();
	  $('.btncustomize').on('click',function(){
	  	$('.hidecustomize').show();
	  	$('.hideoriginal').hide();
	  });
	  $('.btnkembali').on('click',function(){
	  	$('.hidecustomize').hide();
	  	$('.hideoriginal').show();
	  });

   //    $('#button').on('click', function() {
	  //   $('#file-input').trigger('click');
	  // });

	  var input = document.getElementById('pilihcustom');
        // input.type = 'file';
        input.onchange = function(e) { 
           // getting a hold of the file reference
           var file = e.target.files[0]; 
           // setting up the reader
           var reader = new FileReader();
           reader.readAsDataURL(file); // this is reading as data url
           // here we tell the reader what to do when it's done reading...
           reader.onload = readerEvent => {
              var content = readerEvent.target.result; // this is the content!
              $('.customgambar').html('<img class="gantifotoselect" src="'+content+'" style="border-radius:7px;">');
           }
        }

    // ajax menghitung total
        $('.jumlahS').on('keyup',function(){
          var jumlahS=$('.jumlahS').val();
          var jumlahM=$('.jumlahM').val();
          var jumlahL=$('.jumlahL').val();
          var jumlahXL=$('.jumlahXL').val();
          var jumlahXXL=$('.jumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var S=data[0]['harga_size']*jumlahS;
	        	var M=data[1]['harga_size']*jumlahM;
	        	var L=data[2]['harga_size']*jumlahL;
	        	var XL=data[3]['harga_size']*jumlahXL;
	        	var XXL=data[4]['harga_size']*jumlahXXL;
	        	var totalharga=S+M+L+XL+XXL;
	        	var totalpcs=jumlahS+jumlahM+jumlahL+jumlahXL+jumlahXXL;
	        	$('.tampungtotal').val(totalharga);
	        	$('.tampungtotalpcs').val(totalpcs);
	        	$('.totalhargapolos').text('Total Rp:'+rubah(totalharga));
	        }
	      });
        });

        $('.jumlahM').on('keyup',function(){
          var jumlahS=$('.jumlahS').val();
          var jumlahM=$('.jumlahM').val();
          var jumlahL=$('.jumlahL').val();
          var jumlahXL=$('.jumlahXL').val();
          var jumlahXXL=$('.jumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var S=data[0]['harga_size']*jumlahS;
	        	var M=data[1]['harga_size']*jumlahM;
	        	var L=data[2]['harga_size']*jumlahL;
	        	var XL=data[3]['harga_size']*jumlahXL;
	        	var XXL=data[4]['harga_size']*jumlahXXL;
	        	var totalharga=S+M+L+XL+XXL;
	        	$('.totalhargapolos').text('Total Rp:'+rubah(totalharga));
	        	$('.tampungtotal').val(totalharga);
	        }
	      });
        });

        $('.jumlahL').on('keyup',function(){
          var jumlahS=$('.jumlahS').val();
          var jumlahM=$('.jumlahM').val();
          var jumlahL=$('.jumlahL').val();
          var jumlahXL=$('.jumlahXL').val();
          var jumlahXXL=$('.jumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var S=data[0]['harga_size']*jumlahS;
	        	var M=data[1]['harga_size']*jumlahM;
	        	var L=data[2]['harga_size']*jumlahL;
	        	var XL=data[3]['harga_size']*jumlahXL;
	        	var XXL=data[4]['harga_size']*jumlahXXL;
	        	var totalharga=S+M+L+XL+XXL;
	        	$('.totalhargapolos').text('Total Rp:'+rubah(totalharga));
	        	$('.tampungtotal').val(totalharga);
	        }
	      });
        });

        $('.jumlahXL').on('keyup',function(){
          var jumlahS=$('.jumlahS').val();
          var jumlahM=$('.jumlahM').val();
          var jumlahL=$('.jumlahL').val();
          var jumlahXL=$('.jumlahXL').val();
          var jumlahXXL=$('.jumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var S=data[0]['harga_size']*jumlahS;
	        	var M=data[1]['harga_size']*jumlahM;
	        	var L=data[2]['harga_size']*jumlahL;
	        	var XL=data[3]['harga_size']*jumlahXL;
	        	var XXL=data[4]['harga_size']*jumlahXXL;
	        	var totalharga=S+M+L+XL+XXL;
	        	$('.totalhargapolos').text('Total Rp:'+rubah(totalharga));
	        	$('.tampungtotal').val(totalharga);
	        }
	      });
        });

        $('.jumlahXXL').on('keyup',function(){
          var jumlahS=$('.jumlahS').val();
          var jumlahM=$('.jumlahM').val();
          var jumlahL=$('.jumlahL').val();
          var jumlahXL=$('.jumlahXL').val();
          var jumlahXXL=$('.jumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var S=data[0]['harga_size']*jumlahS;
	        	var M=data[1]['harga_size']*jumlahM;
	        	var L=data[2]['harga_size']*jumlahL;
	        	var XL=data[3]['harga_size']*jumlahXL;
	        	var XXL=data[4]['harga_size']*jumlahXXL;
	        	var totalharga=S+M+L+XL+XXL;
	        	$('.totalhargapolos').text('Total Rp:'+rubah(totalharga));
	        	$('.tampungtotal').val(totalharga);
	        }
	      });
        });
    // tutup ajax menghitung total

    // ajax menghitung total custom
        $('.customjumlahS').on('keyup',function(){
          var ctjumlahS=$('.customjumlahS').val();
          var ctjumlahM=$('.customjumlahM').val();
          var ctjumlahL=$('.customjumlahL').val();
          var ctjumlahXL=$('.customjumlahXL').val();
          var ctjumlahXXL=$('.customjumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var ctS=data[0]['harga_size']*ctjumlahS;
	        	var ctM=data[1]['harga_size']*ctjumlahM;
	        	var ctL=data[2]['harga_size']*ctjumlahL;
	        	var ctXL=data[3]['harga_size']*ctjumlahXL;
	        	var ctXXL=data[4]['harga_size']*ctjumlahXXL;
	        	var biayasablon=data[0]['biaya_sablon_produk'];
	        	var totalhargact=ctS+ctM+ctL+ctXL+ctXXL;
	        	var totalpcs=Number(ctjumlahS)+Number(ctjumlahM)+Number(ctjumlahL)+Number(ctjumlahXL)+Number(ctjumlahXXL);
	        	var hargasablon=totalpcs*biayasablon;
	        	var hargadealcustom=totalhargact+hargasablon;
	        	$('.customtampungtotal').val(hargadealcustom);
	        	$('.customtotalharga').text('Total Rp:'+rubah(hargadealcustom));
	        }
	      });
        });

        $('.customjumlahM').on('keyup',function(){
          var ctjumlahS=$('.customjumlahS').val();
          var ctjumlahM=$('.customjumlahM').val();
          var ctjumlahL=$('.customjumlahL').val();
          var ctjumlahXL=$('.customjumlahXL').val();
          var ctjumlahXXL=$('.customjumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var ctS=data[0]['harga_size']*ctjumlahS;
	        	var ctM=data[1]['harga_size']*ctjumlahM;
	        	var ctL=data[2]['harga_size']*ctjumlahL;
	        	var ctXL=data[3]['harga_size']*ctjumlahXL;
	        	var ctXXL=data[4]['harga_size']*ctjumlahXXL;
	        	var biayasablon=data[0]['biaya_sablon_produk'];
	        	var totalhargact=ctS+ctM+ctL+ctXL+ctXXL;
	        	var totalpcs=Number(ctjumlahS)+Number(ctjumlahM)+Number(ctjumlahL)+Number(ctjumlahXL)+Number(ctjumlahXXL);
	        	var hargasablon=totalpcs*biayasablon;
	        	var hargadealcustom=totalhargact+hargasablon;
	        	$('.customtampungtotal').val(hargadealcustom);
	        	$('.customtotalharga').text('Total Rp:'+rubah(hargadealcustom));
	        }
	      });
        });

        $('.customjumlahL').on('keyup',function(){
          var ctjumlahS=$('.customjumlahS').val();
          var ctjumlahM=$('.customjumlahM').val();
          var ctjumlahL=$('.customjumlahL').val();
          var ctjumlahXL=$('.customjumlahXL').val();
          var ctjumlahXXL=$('.customjumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var ctS=data[0]['harga_size']*ctjumlahS;
	        	var ctM=data[1]['harga_size']*ctjumlahM;
	        	var ctL=data[2]['harga_size']*ctjumlahL;
	        	var ctXL=data[3]['harga_size']*ctjumlahXL;
	        	var ctXXL=data[4]['harga_size']*ctjumlahXXL;
	        	var biayasablon=data[0]['biaya_sablon_produk'];
	        	var totalhargact=ctS+ctM+ctL+ctXL+ctXXL;
	        	var totalpcs=Number(ctjumlahS)+Number(ctjumlahM)+Number(ctjumlahL)+Number(ctjumlahXL)+Number(ctjumlahXXL);
	        	var hargasablon=totalpcs*biayasablon;
	        	var hargadealcustom=totalhargact+hargasablon;
	        	$('.customtampungtotal').val(hargadealcustom);
	        	$('.customtotalharga').text('Total Rp:'+rubah(hargadealcustom));
	        }
	      });
        });

        $('.customjumlahXL').on('keyup',function(){
          var ctjumlahS=$('.customjumlahS').val();
          var ctjumlahM=$('.customjumlahM').val();
          var ctjumlahL=$('.customjumlahL').val();
          var ctjumlahXL=$('.customjumlahXL').val();
          var ctjumlahXXL=$('.customjumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var ctS=data[0]['harga_size']*ctjumlahS;
	        	var ctM=data[1]['harga_size']*ctjumlahM;
	        	var ctL=data[2]['harga_size']*ctjumlahL;
	        	var ctXL=data[3]['harga_size']*ctjumlahXL;
	        	var ctXXL=data[4]['harga_size']*ctjumlahXXL;
	        	var biayasablon=data[0]['biaya_sablon_produk'];
	        	var totalhargact=ctS+ctM+ctL+ctXL+ctXXL;
	        	var totalpcs=Number(ctjumlahS)+Number(ctjumlahM)+Number(ctjumlahL)+Number(ctjumlahXL)+Number(ctjumlahXXL);
	        	var hargasablon=totalpcs*biayasablon;
	        	var hargadealcustom=totalhargact+hargasablon;
	        	$('.customtampungtotal').val(hargadealcustom);
	        	$('.customtotalharga').text('Total Rp:'+rubah(hargadealcustom));
	        }
	      });
        });

        $('.customjumlahXXL').on('keyup',function(){
          var ctjumlahS=$('.customjumlahS').val();
          var ctjumlahM=$('.customjumlahM').val();
          var ctjumlahL=$('.customjumlahL').val();
          var ctjumlahXL=$('.customjumlahXL').val();
          var ctjumlahXXL=$('.customjumlahXXL').val();
          $.ajax({
	        url: base_url+'users/ajaxs',
	        method: "POST",
	        data: {idproduk : id_url},
	        dataType: "json",
	        success:function(data){
	        	var ctS=data[0]['harga_size']*ctjumlahS;
	        	var ctM=data[1]['harga_size']*ctjumlahM;
	        	var ctL=data[2]['harga_size']*ctjumlahL;
	        	var ctXL=data[3]['harga_size']*ctjumlahXL;
	        	var ctXXL=data[4]['harga_size']*ctjumlahXXL;
	        	var biayasablon=data[0]['biaya_sablon_produk'];
	        	var totalhargact=ctS+ctM+ctL+ctXL+ctXXL;
	        	var totalpcs=Number(ctjumlahS)+Number(ctjumlahM)+Number(ctjumlahL)+Number(ctjumlahXL)+Number(ctjumlahXXL);
	        	var hargasablon=totalpcs*biayasablon;
	        	var hargadealcustom=totalhargact+hargasablon;
	        	$('.customtampungtotal').val(hargadealcustom);
	        	$('.customtotalharga').text('Total Rp:'+rubah(hargadealcustom));
	        }
	      });
        });
        // tutup total custom


	  });
    </script>
    </body>
  </html>