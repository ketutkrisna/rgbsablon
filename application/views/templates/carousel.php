<div class="row" style="max-width:1000px;">
  <div class="row" style="margin-top:10px;">
    <div class="col s12">

      <div class="carousel naik center carouselup" style="height:350px;">
        <div class="carousel-fixed-item center" style="padding-top:255px;">
          <a class="btn btn-large waves-effect teal z-depth-2" href="<?=base_url('users/produk'); ?>" style="width:80%;border-radius:5px;border:2px solid white;">PESAN SEKARANG</a>
        </div>

        <div class="col s12">
        <?php foreach($produkterlaris as $pt): ?>
          <div class="carousel-item teal white-text z-depth-2 center" href="#one!" style="border-radius:10px;border:2px solid white;height:90%;width:99%;margin:1px auto;left:0;right:0;background-image:url('<?=base_url('assets/img/produk/'.$pt['foto_produk']); ?>');background-size:300px;background-repeat:no-repeat;background-position:center;">
            <h2 style="text-shadow:2px 2px 1px #111"><?=$pt['nama_produk']; ?></h2>
            <span class="white-text" style="font-size:20px;text-shadow:2px 2px 1px #111"><?=$pt['deskripsi_produk']; ?></span><br>
            <!-- <i class="material-icons orange-text">star_rate</i><span class="white-text" style="font-size:20px;margin-bottom:15px"><?=$pt['jumlahselesai'].' kali diorder'; ?></span> -->
           <!--  <div class="carousel-fixed-item center">
              <a class="btn waves-effect white grey-text darken-text-2">pesan sekarang</a>
            </div> -->
          </div>
        <?php endforeach; ?>
        </div>

      </div>

    </div>
  </div>