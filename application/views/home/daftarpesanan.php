	 <div class="navbar-fixed navbarpencarian">
    <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
      <div class="nav-wrapper">
        <form action="<?=base_url('users/carikodebaranguser'); ?>" method="post">
          <div class="input-field">
            <input style="border-radius:31px;border:1px solid #ddd" id="search" type="search" name="carikodebarang" class="inputcariberanda" autocomplete="off" placeholder="masukan kode order">
            <label class="label-icon" for="search"><i class="material-icons closepencarian">close</i></label>
            <button class="material-icons teal" type="submit" name="carikirim" style="height:100%;border:0;right:0;padding-right:10px;padding-left:10px;color:white;border-radius: 0 30px 30px 0"><i class="material-icons caridatanotifikasi">search</i></button>
          </div>
        </form>
      </div>
    </nav>
  </div>

  	<div class="row naik" style="max-width:1000px;"><!-- buka maxwidth-->

	  <div class="row">
	  <div class="col s12 naik" style="margin-bottom:-10px;margin-top: 10px;">
	    <div class="card grey lighten-5 z-depth-1" style="border-radius:7px;border:2px solid #009688;width:99%;margin:1px auto;left:0;right:0;">
	      <div class="card-content center" style="padding: 10px">
	        <!-- <span class="card-title center">RGB Sablon Adalah?</span> -->
	        <!-- <i class="material-icons" style="font-size:3rem;margin-top:-10px">local_library</i> -->
	        <span style="font-size: 20px;font-weight: bold;">Daftar Pesanan</span>
	      </div>
	    </div>
	  </div>
	  </div> 
	
	<div class="rubahpersen" style="width:99%;margin:1px auto;left:0;right:0;padding-bottom:20px;">

<?php if($countuser['countpesanan']<=0){ ?>
    <h5 class="center">Tidak ada data!</h5>
<?php }else{ ?>
	  <div class="col s12 naik">
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">fact_check</i><span class="left" style="margin-left:-10px">Pesanan anda</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
		<?php foreach($daftarpesananuser as $dpu): ?>
	    <li class="collection-item avatar">
	      <img src="<?=base_url('assets/img/users/'.$dpu['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b>Anda</b></span> <span>memesan <?php if($dpu['warna_order']=='custom'){echo "custom ".$dpu['nama_produk'];}else{echo $dpu['nama_produk'];} ?> <b><?=$dpu['themost_order']; ?></b> Pcs</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dpu['tanggal_order'])); ?> <br>
	        <span>Status</span> :
	        <?php if($dpu['status_order']=='menunggu' || $dpu['status_order']=='dikonfirmasi'){ ?> 
		        <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
		        <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
			    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
			    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
			    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
			<?php }else if($dpu['status_order']=='dibayar'){ ?>
				<i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
		        <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
			    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
			    <?php if($dpu['status_pembayaran_order']=='bayarditolak'){ ?>
			    <i class="material-icons circle tooltipped red" data-position="top" data-tooltip="ditolak" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>	
			    <?php }else{ ?>
			    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
				  <?php } ?>
			    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
			<?php }else if($dpu['status_order']=='dalamproses'){ ?>
          <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
          <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
			<?php }else if($dpu['status_order']=='dikirim'){ ?>
          <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
			<?php }else if($dpu['status_order']=='selesai'){ ?>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
          <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
			<?php }else if($dpu['status_order']=='ditolak'){ ?>
          <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="ditolak" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
      <?php }else if($dpu['status_order']=='dicancel'){ ?>
          <i class="material-icons circle orange tooltipped" data-position="top" data-tooltip="dicancel" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
      <?php } ?>	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
          <?php if($dpu['status_order']=='ditolak'){
            echo "Pesanan anda telah ditolak!";
          }else if($dpu['status_order']=='dicancel'){
            echo "Pesanan telah anda cancel!";
          }else{
  	      	if($dpu['status_pembayaran_order']=='belumbayar'){
  	      		echo"Silahkan lakukan pembayaran";
  	      	}else if($dpu['status_pembayaran_order']=='bayarditolak'){
  	      		echo "Bukti pembayaran anda ditolak";
  	      	}else if($dpu['status_pembayaran_order']=='bayarditerima'){
  	      		echo "Pembayaran anda diterima";
  	      	}else if($dpu['status_pembayaran_order']=='sudahbayar'){
  	      		echo "Tunggu konfirmasi Admin";
  	      	} 
          } ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('users/detailpesananuser/'.$dpu['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- <a href="#!" class="secondary-content"><i class="material-icons">double_arrow</i></a> -->
	    </li>
		<?php endforeach; ?>
	  </ul>
	  </div>
<?php } ?>

	</div><!-- rubah persen -->


	</div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

	    $('.sidenav').sidenav({
	    	'edge':'right'
	    });
	    $('.tooltipped').tooltip();
	    $('.materialboxed').materialbox();
    	$('.slider').slider({
    		'height':300,
    		'indicators':false
    	});
    	$('.carousel').carousel({
    		// 'dist':10,
    		// 'indicators':true,
    		'padding':55,
    		'fullWidth':true,
    		'noWrap':true,
    		// 'shift':10
    	});
    	$('.tabs').tabs({
    		'swipeable':true,
    		// 'responsiveThreshold':50
    	});

	  var position = $(window).scrollTop();
      $(window).scroll(function() {
          var wwidth = $(window).width();
          var scroll = $(window).scrollTop();
          if(wwidth>600){
            respon=-65;
          }else{
            respon=-55;
          }
          if(scroll > position) {
              $('.bawah').css({
                'margin-bottom':'-55px'
              });
              $('.naik').css({
                'transform':'translate(0,'+respon+'px)',
                'transition':'.5s'
              });
          } else {
              $('.bawah').css({
                'margin-bottom':'0px'
              });
              $('.naik').css({
                'transform':'translate(0,0px)',
                'transition':'.5s'
              });
          }
          position = scroll;
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

	  });
    </script>
    </body>
  </html>