	  <div class="navbar-fixed navbarpencarian">
        <nav class="white z-depth-0" style="border-radius:0 0 30px 30px;top: -1px;">
          <div class="nav-wrapper">
            <form action="<?=base_url('admin/carikodebarang'); ?>" method="post">
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

	  <div class="row naik">
	  <div class="col s12" style="margin-bottom:-10px;margin-top: 10px;">
	    <div class="card grey lighten-5 z-depth-1" style="border-radius:7px;border:2px solid #009688;width:99%;margin:1px auto;left:0;right:0;">
	      <div class="card-content center" style="padding: 10px">
	        <!-- <span class="card-title center">RGB Sablon Adalah?</span> -->
	        <!-- <i class="material-icons" style="font-size:3rem;margin-top:-10px">local_library</i> -->
	        <span style="font-size: 20px;font-weight: bold;">Daftar Pesanan</span>
	      </div>
	    </div>
	  </div>
	  </div> 
	
	<div class="rubahpersen naik" style="width:99%;margin:1px auto;left:0;right:0;overflow-x:hidden;padding-bottom:20px">

<?php if($menunggu['menunggu']<=0&&$dikonfirmasi['dikonfirmasi']<=0&&$dibayar['dibayar']<=0&&$dalamproses['dalamproses']<=0&&$dalampengiriman['dalampengiriman']<=0&&$selesai['selesai']<=0&&$ditolak['ditolak']<=0&&$dicancel['dicancel']<=0){ ?>
	<h5 class="center">Tidak ada data!</h5>
<?php }else{ ?>

	<div class="col s12" style="">
		<div class="row">
			<div class="col s12" style="padding:0;margin-bottom:-50px">	
	    	<!-- form metode -->
		    <form action="<?= base_url('admin/methodsorting'); ?>" method="post">
		    <div class="row right">
		      <div class="input-field col s8" style="padding:0;">
		      	<?php if($method=='terbaru'){ ?>
				    <select name="sortingdata">
				      <option value="" disabled>Sorting</option>
				      <option value="terbaru" selected>Terbaru</option>
				      <!-- <option value="terbanyak">Terbanyak</option> -->
				      <option value="prioritas">Prioritas</option>
				    </select>
				<?php }else if($method=='terbanyak'){ ?>
					<select name="sortingdata">
				      <option value="" disabled>Sorting</option>
				      <option value="terbaru">Terbaru</option>
				      <!-- <option value="terbanyak" selected>Terbanyak</option> -->
				      <option value="prioritas">Prioritas</option>
				    </select>
				<?php }else if($method=='prioritas'){ ?>
					<select name="sortingdata">
				      <option value="" disabled>Sorting</option>
				      <option value="terbaru">Terbaru</option>
				      <!-- <option value="terbanyak">Terbanyak</option> -->
				      <option value="prioritas" selected>Prioritas</option>
				    </select>
				<?php }else{ ?>
					<select name="sortingdata">
				      <option value="" disabled selected>Sorting</option>
				      <option value="terbaru">Terbaru</option>
				      <!-- <option value="terbanyak">Terbanyak</option> -->
				      <option value="prioritas">Prioritas</option>
				    </select>
				<?php } ?>
			    <!-- <label>Materialize Select</label> -->
			  </div>
			  <div class="input-field col s4 right" style="padding:0">
			  	<button style="margin-top:5px;" class="btn" type="submit">Ok</button>
			  </div>
			</form>
			</div>
		</div>
	</div>

<?php if($countnew['countnew']<=0){}else{ ?>
	  	<!-- jenis notifikasi -->
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">fiber_new</i><span class="left" style="margin-left:-10px">Pesanan baru</span></span>
	  <!-- list pembungkus -->
	  <ul class="collection z-depth-2" style="border-radius:5px">
	<!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['notif_baca_order']=='belumbaca'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar teal lighten-5">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <!-- <span>Status</span> : 
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <i class="material-icons circle <?php if($dp['status_pembayaran_order']=='belumbayar'){echo'';}else{echo'green accent-3';} ?> tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="menunggu" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i> -->
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <!-- <a href="#!" class="secondary-content"><i class="material-icons orange-text">grade</i></a> -->
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	<!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($dikonfirmasi['dikonfirmasi']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">assignment</i><span class="left" style="margin-left:-10px">Pesanan dikonfirmasi</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='dikonfirmasi' && $dp['notif_baca_order']=='dibaca'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dibayar" style="left: 147px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">attach_money</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikonfirmasi" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  <!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($dibayar['dibayar']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">local_atm</i><span class="left" style="margin-left:-10px">Pesanan dibayar</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='dibayar' && $dp['notif_baca_order']=='dibaca'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <?php if($dp['status_pembayaran_order']=='bayarditolak'){ ?>
		    <i class="material-icons circle tooltipped red" data-position="top" data-tooltip="ditolak" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>	
		    <?php }else{ ?>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
			<?php } ?>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikonfirmasi" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  <!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($dalamproses['dalamproses']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">pending_actions</i><span class="left" style="margin-left:-10px">Pesanan dalam pengerjaan</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='dalamproses'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikonfirmasi" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  <!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($dalampengiriman['dalampengiriman']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">local_shipping</i><span class="left" style="margin-left:-10px">Pesanan dalam pengiriman</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='dalampengiriman'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
	         <i class="material-icons circle tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle green accent-3  tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikonfirmasi" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  <!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($selesai['selesai']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">done_outline</i><span class="left" style="margin-left:-10px">Pesanan selesai</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='selesai'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
	         <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="selesai" style="left: 230px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">done_all</i>
	         <i class="material-icons circle green accent-3  tooltipped" data-position="top" data-tooltip="dikirim" style="left: 202px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">airport_shuttle</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dalam proses" style="left: 174px;height: 22px;width: 22px;line-height: 22px;font-weight:bold;">sync</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dibayar" style="left:147px;height:22px;width:22px;line-height:22px;font-weight:bold;">attach_money</i>
		    <i class="material-icons circle green accent-3 tooltipped" data-position="top" data-tooltip="dikonfirmasi" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">hourglass_empty</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_pembayaran_order']=='belumbayar'){
	      		echo"Belum melakukan pembayaran";
	      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
	      		echo "Pembayaran anda tolak";
	      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
	      		echo "Pembayaran diterima";
	      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
	      		echo "Silahkan konfirmasi pembayaran";
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  <!-- </div> -->

	  <!-- <div class="col s12 naik" style="margin-top:5px"> -->
<?php if($ditolak['ditolak']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">delete_forever</i><span class="left" style="margin-left:-10px">Pesanan ditolak</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='ditolak'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
		    <i class="material-icons circle red tooltipped" data-position="top" data-tooltip="ditolak" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_order']=='ditolak'){
	      		echo "Anda telah menolak pesanan ini";
	      	}else{
		      	if($dp['status_pembayaran_order']=='belumbayar'){
		      		echo"Belum melakukan pembayaran";
		      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
		      		echo "Pembayaran anda tolak";
		      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
		      		echo "Pembayaran diterima";
		      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
		      		echo "Silahkan konfirmasi pembayaran";
		      	}
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>

<?php if($dicancel['dicancel']<=0){}else{ ?>
	  	<span class="naik" style="font-weight:bold;margin:-15px 0 5px 0;margin-left:12px"><i class="material-icons teal-text left">cancel</i><span class="left" style="margin-left:-10px">Pesanan dicancel</span></span>
	  <ul class="collection z-depth-2" style="border-radius:5px">
	    <!-- looping pesanan masuk -->
	<?php foreach($daftarpesanan as $dp): ?>
		<!-- kondisi new order -->
		<?php if($dp['status_order']=='dicancel'): ?>
	  	<!-- list data pesanan masuk -->
	    <li class="collection-item avatar">
	      <!-- informasi data pesanan masuk -->
	      <img src="<?=base_url('assets/img/users/'.$dp['foto_user']); ?>" alt="" class="circle">
	      <span class="title"><b><?=$dp['nama_user'];?></b></span> <span>memesan <?php if($dp['warna_order']=='custom'){echo "custom ".$dp['nama_produk'];}else{echo $dp['nama_produk'];} ?> <b><?=$dp['themost_order'];?></b> Pcs <?php if($dp['warna_order']=='custom'){echo "dengan ".$dp['jumlahwarna_order']." warna";} ?>
	      	(<?php 
	      		if($dp['themost_order']>=1&&$dp['themost_order']<=50){
	      			echo "Kecil";
	      		}else if($dp['themost_order']>=51&&$dp['themost_order']<=200){
	      			echo "Sedang";
	      		}else if($dp['themost_order']>=201&&$dp['themost_order']<=500){
	      			echo "Besar";
	      		}else{
	      			echo "Sangat besar";
	      		}
	      	?>)</span>
	      <p class="grey-text"><?=date('d F Y H:i', strtotime($dp['tanggal_order'])); ?> <br>
	         <span>Status</span> : 
		    <i class="material-icons circle orange tooltipped" data-position="top" data-tooltip="dicancel" style="left:120px;height:22px;width:22px;line-height:22px;font-weight:bold;">clear</i>
	      </p>
	      <!-- notif bukti pembayaran -->
	      <span class="" style="font-size:11px;color:#757575;padding:3px 0 3px -3px;">
	      	<?php if($dp['status_order']=='dicancel'){
	      		echo "Pesanan telah dicancel";
	      	}else{
		      	if($dp['status_pembayaran_order']=='belumbayar'){
		      		echo"Belum melakukan pembayaran";
		      	}else if($dp['status_pembayaran_order']=='bayarditolak'){
		      		echo "Pembayaran anda tolak";
		      	}else if($dp['status_pembayaran_order']=='bayarditerima'){
		      		echo "Pembayaran diterima";
		      	}else if($dp['status_pembayaran_order']=='sudahbayar'){
		      		echo "Silahkan konfirmasi pembayaran";
		      	}
	      	} ?>
	      </span>
	      <!-- link url detail pesanan -->
	      <span class="right badge blue white-text">
	      	<a href="<?=base_url('admin/detailpesananadmin/'.$dp['id_order']); ?>" class="white-text">Details</a>
	      </span>
	      <!-- icons prioritas -->
	      <?php if($dp['priority_order']=='prioritas'){ ?>
	      	<a href="#!" class="secondary-content"><i class="material-icons orange-text tooltipped" data-position="top" data-tooltip="prioritas">grade</i></a>
	  	  <?php }else{ ?>
	  	  	<a href="#!" class="secondary-content"><i class="material-icons grey-text tooltipped" data-position="top" data-tooltip="non prioritas">grade</i></a>
	  	  <?php } ?>
	    </li><!-- tutup list -->
		<?php endif; ?><!-- tutup if menunggu -->
	<?php endforeach; ?>
	  </ul>
<?php } ?>
	  </div>


<?php } ?>

	</div>


</div><!-- maxwidth tutup -->
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
    	$('.modal').modal();
    	$('select').formSelect();

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