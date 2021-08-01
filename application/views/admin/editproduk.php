
    <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users/produk'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Edit Produk</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">Edit Produk</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

    <div class="row" style="max-width:1000px;display:flex;align-items:center;"> <!-- awal maxwidth -->
    <div class="row persenwidht" style="padding-bottom: 15px;width:99%;margin:1px auto;left:0;right:0;">

		

		<div class="row naik hidecustomize" style="margin-top:10px"><!-- customize -->
			<!-- <span class="card-title left" style="font-weight:bold;margin:5px 0 5px 0;font-size:20px;margin-left:23px;margin-bottom:5px;"><span class="left" style=""><?= $produk['nama_produk']; ?></span></span> -->
			<div class="col s12">
		      <?=$this->session->flashdata('message'); ?>
		    </div>
			<div class="col s12">
			  <div class="card z-depth-2 teal indipemesanan" style="width:99%;margin:1px auto;left:0;right:0;border-radius:7px;">
			  	<div class="card-image">
			  		<div class="customgambar center">
			  			<!-- <h5 style="padding:140px 10px 140px 10px;">Silahkan upload custom desain anda pada form dibawah!</h5> -->
			          <!-- <img class="gantifotoselect materialboxed" src="<?=base_url('assets/img/produk/').$produk['foto_produk']; ?>" style="border-radius:7px;"> -->
			          <div class="carousel carousel-slider center">
			          <?php foreach($datacolor as $dslide): ?>
					    <div class="carousel-item teal white-text" href="#one!" style="border-radius:7px;padding:0">
					    	<img class="gantifotoselect" src="<?=base_url('assets/img/produk/').$dslide['foto_color']; ?>" style="border-radius:7px;">
					      <h2 class="orange-text" style="position: absolute;top:0;font-weight:bold;text-shadow:1px 1px 1px black;left:10px"><?=$dslide['warna_color']; ?></h2>
					    </div>
					  <?php endforeach; ?>
					  </div>

			          <a href="#modaltambahwarna" style="top:0;right:0;border-radius:0 7px 0 7px;height:50px;width:70px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-2 blue modal-trigger"><i class="material-icons" style="font-size:40px">add_photo_alternate</i></a>
			          <a href="#modalhapuswarna" style="top:70px;right:0;border-radius:0 7px 0 7px;height:50px;width:70px;" class="btn-floating halfway-fab waves-effect waves-light modal-trigger z-depth-2 red"><i class="material-icons" style="font-size:40px">delete_sweep</i></a>
			        </div>
			          <span class="card-title white-text left" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:27px;font-weight:bold;text-shadow:2px 2px 1px black"><?=$produk['nama_produk']; ?></span>
			          <!-- <span class="white-text" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;position: absolute;right:0;bottom:0;border:2px solid white;">
			          	<img class="gantifotoselect materialboxed" src="<?=base_url('assets/img/produk/').$produk['foto_produk']; ?>" style="border-radius:7px;height:70px;width:60px">
			          </span> -->
			          <!-- <button id="button" class="card-title red white-text z-depth-2 btnkembali" style="padding:5px 5px 10px 5px;margin:5px;border-radius:5px;line-height:20px;font-size:17px;top:0;height:40px;border:2px solid white;">Kembali</button> -->
			          <!-- <span class="card-title">Mobile Apps</span> -->
			        </div>
			    <!-- <div class="card-content teal  white-text">
			      <span class="card-title center">Kenapa RGB Sablon?</span>
			      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
			    </div> -->
			    <!-- <div class="card-tabs"> -->
			      <!-- <ul class="tabs tabs-fixed-width grey lighten-3" style="border-radius:7px 7px 0 0;"> -->
			        <!-- <li class="tab"><a href="#test7" class="black-text">Detail size</a></li> -->
			        <!-- <li class="tab"><a class="black-text" href="#test8">Pesan</a></li> -->
			        <!-- <li class="tab"><a href="#test9" class="black-text">Deskripsi</a></li> -->
			      <!-- </ul> -->
			    <!-- </div> -->
			    <div class="card-content white" style="border-radius:0 0 7px 7px;">
			      
			    <div id="test8" style="min-height:650px;">
					   <!-- <div class="row"> -->
					<form action="<?=base_url('admin/updateproduk/'); ?>" method="post" enctype="multipart/form-data">
			        <div class="file-field input-field">
			          <div class="btn blue">
			            <span>File</span>
			            <input type="file" class="pilihcustom" id="pilihcustom" name="fotoproduk" multiple>
			          </div>
			          <div class="file-path-wrapper">
			            <input class="file-path validate" type="text" placeholder="Ganti foto produk">
			          </div>
			        </div>
			        <!-- <div class="row"> -->
			        <input type="hidden" name="idprodukurl" value="<?=$geturl; ?>">
			        <input type="hidden" name="idcolor1" value="<?=$datacolorbackground['id_color']; ?>">
			        <div class="input-field">
			          <input id="lastnama" type="text" class="validate" value="<?=$produk['nama_produk']; ?>" name="namaproduk" required>
			          <label for="lastnama">Nama produk</label>
			        </div>
			        <div class="input-field">
			          <input id="lastwarna" type="text" class="validate" value="<?=$datacolorbackground['warna_color']; ?>" name="warnaproduk" required>
			          <label for="lastwarna">Warna produk</label>
			        </div>
			        <!-- ukuran size -->
			    <?php foreach($datasize as $dsize): ?>
			        <div class="row" style="margin-bottom:-20px">
			        	<input type="hidden" name="id<?=$dsize['tipe_size']; ?>" value="<?=$dsize['id_size']; ?>">
			          <div class="input-field col s6" style="margin-top:5px;margin-bottom:-20px">
			            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px"><?=$dsize['tipe_size']; ?></span>
			            <input id="icon_prefix1<?=$dsize['tipe_size']; ?>" type="number" value="<?=$dsize['harga_size']; ?>" class="center" name="harga<?=$dsize['tipe_size']; ?>" required>
			            <label for="icon_prefix1<?=$dsize['tipe_size']; ?>">Harga</label>
			          </div>
			          <div class="input-field col s6" style="margin-top:5px">
			            <input id="icon_prefix2<?=$dsize['tipe_size']; ?>" type="text" value="<?=$dsize['deskripsi_size'] ?>" class="center" name="ukuran<?=$dsize['tipe_size']; ?>" required>
			            <label for="icon_prefix2<?=$dsize['tipe_size']; ?>">Ukuran P x L</label>
			          </div>
			        </div>
			    <?php endforeach; ?>
			        <!-- <div class="row">
			          <div class="input-field col s6" style="margin-top:-20px">
			            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px">M</span>
			            <input id="icon_prefix3" type="number" value="0" class="center" name="hargam" required>
			            <label for="icon_prefix3">Harga</label>
			          </div>
			          <div class="input-field col s6" style="margin-top:-20px">
			            <input id="icon_prefix4" type="text" class="center" name="ukuranm" required>
			            <label for="icon_prefix4">Ukuran P x L</label>
			          </div>
			        </div>
			        <div class="row">
			          <div class="input-field col s6" style="margin-top:-20px">
			            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px">L</span>
			            <input id="icon_prefix5" type="number" value="0" class="center" name="hargal" required>
			            <label for="icon_prefix5">Harga</label>
			          </div>
			          <div class="input-field col s6" style="margin-top:-20px">
			            <input id="icon_prefix6" type="text" class="center" name="ukuranl" required>
			            <label for="icon_prefix6">Ukuran P x L</label>
			          </div>
			        </div>
			        <div class="row">
			          <div class="input-field col s6" style="margin-top:-20px">
			            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px">XL</span>
			            <input id="icon_prefix7" type="number" value="0" class="center" name="hargaxl" required>
			            <label for="icon_prefix7">Harga</label>
			          </div>
			          <div class="input-field col s6" style="margin-top:-20px">
			            <input id="icon_prefix8" type="text" class="center" name="ukuranxl" required>
			            <label for="icon_prefix8">Ukuran P x L</label>
			          </div>
			        </div>
			        <div class="row">
			          <div class="input-field col s6" style="margin-top:-20px">
			            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px">XXL</span>
			            <input id="icon_prefix9" type="number" value="0" class="center" name="hargaxxl" required>
			            <label for="icon_prefix9">Harga</label>
			          </div>
			          <div class="input-field col s6" style="margin-top:-20px">
			            <input id="icon_prefix10" type="text" class="center" name="ukuranxxl" required>
			            <label for="icon_prefix10">Ukuran P x L</label>
			          </div>
			        </div> -->
			        <!-- ahir ukuran size -->
			        <div class="input-field" style="margin-top:15px">
			          <input id="biayasablon" type="text" class="validate" value="<?=$produk['biaya_sablon_produk']; ?>" name="biayasablonproduk" required>
			          <label for="biayasablon">Biaya sablon</label>
			        </div>
			        <div class="input-field" style="margin-top:20px">
			          <textarea id="textarea1" class="materialize-textarea" name="deskripsiproduk"><?=$produk['deskripsi_produk']; ?></textarea>
			          <label for="textarea1">Deskripsi produk</label>
			        </div>
			        <div class="row" style="margin-bottom:0px;">
			        <button class="btn waves-effect waves-light right blue" type="submit" name="update">Update</button>
			        </div>
			      <!-- </div> -->
			      </form>
					  <!-- </div> -->
			    </div>

			    </div>
			  </div>
			</div>
		</div>

		  <!-- Modal tambah warna -->
		  <div id="modaltambahwarna" class="modal">
		    <div class="modal-content">
		      <h5 style="margin-top:-10px">Tambah warna baru</h5>
		      <form action="<?=base_url('admin/tambahwarna'); ?>" method="post" enctype="multipart/form-data">
		      	<input type="hidden" name="idprodukwarna" value="<?=$produk['id_produk']; ?>">
		      	<div class="file-field input-field">
		          <div class="btn blue">
		            <span>File</span>
		            <input type="file" class="inputwarna" id="inputwarna" name="fotowarna" multiple>
		          </div>
		          <div class="file-path-wrapper">
		            <input class="file-path validate" type="text" placeholder="Upload warna">
		          </div>
		        </div>
		        <div class="input-field">
		          <input id="namawarna" type="text" class="validate" name="namawarna" required>
		          <label for="namawarna">Warna</label>
		        </div>
		        <button class="btn waves-effect waves-light right blue" type="submit" name="tambahwarna">OK</button>
		      </form>
		    </div>
		    <div class="modal-footer" style="margin-top:-20px">
		      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
		    </div>
		  </div>

		  <!-- Modal hapus warna -->
		  <div id="modalhapuswarna" class="modal">
		    <div class="modal-content">
		      <h5 style="margin-top:-10px">Hapus Warna</h5>
		      <form action="<?=base_url('admin/hapuswarna'); ?>" method="post">
		      	  <!-- <input type="hidden" name="idhapuswarna" value=""> -->
		      	  <input type="hidden" name="idprodukhapuswarna" value="<?=$produk['id_produk']; ?>">
			      <div class="input-field">
				    <select class="icons okhapuswarna" name="idhapuswarna" required>
				      <option value="" disabled selected>Pilih Warna</option>
				    <?php foreach($datacolor as $color): ?>
				    <?php if($color['foto_color']==$produk['foto_produk']){echo "";}else{ ?>
				      <option value="<?=$color['id_color']; ?>" class="ambilimg<?= $color['id_color']; ?>" data-icon="<?= base_url('assets/img/produk/').$color['foto_color']; ?>"><?= $color['warna_color']; ?></option>
				  	<?php } ?>
				    <?php endforeach; ?>
				    </select>
				    <!-- <label>Pilih Warna</label> -->
				  </div>
		        <button class="btn waves-effect waves-light right red" type="submit" name="tambahwarna">Hapus</button>
		      </form>
		    </div>
		    <div class="modal-footer" style="margin-top:-20px">
		      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
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
    		'swipeable':true,
    		// 'responsiveThreshold':50
    	});
    	$('select').formSelect();
    	$('.modal').modal();

    	$('.close').on('click',function(){
	      $('.hideflash').fadeOut();
	    });

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
      $('.okpilih').change(function(event){
		var val=$('.okpilih').val();
		var ambilimg = $('.ambilimg'+val).data('icon');
		$('.gantifotoselect').attr('src',ambilimg)
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


	  });
    </script>
    </body>
  </html>