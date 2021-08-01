<div class="row" style="max-width:1000px;"><!-- buka maxwidth-->

  <div class="row">
  <div class="col s12 naik" style="margin-bottom:-10px;margin-top: 10px;">
    <div class="card grey lighten-5 z-depth-1" style="border-radius:7px;border:2px solid #009688;width:99%;margin:1px auto;left:0;right:0;">
      <div class="card-content center" style="padding: 10px">
        <!-- <span class="card-title center">RGB Sablon Adalah?</span> -->
        <!-- <i class="material-icons" style="font-size:3rem;margin-top:-10px">local_library</i> -->
        <span style="font-size: 20px;font-weight: bold;">Daftar Produk</span>
      </div>
    </div>
  </div>
  </div>

  <div class="naik rubahpersen" style="padding-bottom: 15px;width:99%;margin:1px auto;left:0;right:0;">
    <div class="row"><!-- buka max tinggi -->
    <!-- flash data -->
    <div class="col s12">
      <?=$this->session->flashdata('message'); ?>
    </div>
    <!-- tutup flash data -->
    <?php foreach($produks as $produk): ?>
    <div class="col s6 m4 l3">
      <div class="card z-depth-2 hoverable" style="border-radius:7px;">
        <div class="card-image waves-effect waves-block waves-light" style="border-radius:7px;">
          <img class="activator" height="180" src="<?=base_url('assets/img/produk/').$produk['foto_produk']; ?>">
          <!-- button actions produk -->
          <?php if($this->session->userdata('level_user')=='admin'): ?>
          <a href="<?=base_url('admin/editproduk/').$produk['id_produk']; ?>" style="top:0;left:0;border-radius:0 0 7px 0;" class="btn-floating halfway-fab waves-effect waves-light z-depth-0 blue"><i class="material-icons">edit</i></a>
          <a onclick="return confirm('Pilih Ok untuk hapus!');" href="<?=base_url('admin/deleteproduk/').$produk['id_produk']; ?>" style="top:0;right:0;border-radius:0 0 0 7px;" class="btn-floating halfway-fab waves-effect waves-light z-depth-0 red"><i class="material-icons">delete</i></a>
          <?php endif; ?>
          <span class="card-title white-text left" style="padding:5px;margin:5px;background-color:rgba(0,0,0,.5);border-radius:5px;line-height:20px;font-size:17px;"><?= $produk['nama_produk']; ?></span>
        </div>
        <div class="card-content" style="padding: 5px">
          <!-- <span class="card-title grey-text text-darken-4">Kaos</span> -->
          <p><a href="<?= base_url('users/pesanproduk/').$produk['id_produk']; ?>" class="btn-small" style="width: 100%">Pesan 
            <!-- <i class="material-icons right">send</i> -->
          </a></p>
        </div>
        <div class="card-reveal" style="padding: 5px">
          <span class="card-title grey-text text-darken-4">Deskripsi<i class="material-icons right" style="margin-top: 8px">close</i></span>
          <p><?= $produk['deskripsi_produk']; ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  </div><!-- tutup max tinggi -->
  </div>
  
  <!-- <div class="row naik"> -->
  <?php if($this->session->userdata('level_user')=='admin'): ?>
    <div class="fixed-action-btn" style="bottom: 70px">
      <a class="btn-floating btn-large blue waves-effect waves-grey z-depth-2 modal-trigger" href="#modaltambahproduk">
        <i class="large material-icons white-text" style="font-size:25px;">library_add</i>
      </a>
    </div>
  <?php endif; ?>
  <!-- </div> -->
  <!-- <div style="height: 500px"></div> -->

  <!-- Modal Structure tambah produk-->
  <div id="modaltambahproduk" class="modal">
    <div class="modal-content">

      <h5 style="margin-top:-10px">Tambah Produk</h5>
      <form action="<?=base_url('admin/tambahproduk/'); ?>" method="post" enctype="multipart/form-data">
        <div class="file-field input-field">
          <div class="btn blue">
            <span>File</span>
            <input type="file" name="fotoproduk" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload foto produk">
          </div>
        </div>
        <!-- <div class="row"> -->
        <div class="input-field">
          <input id="lastnama" type="text" class="validate" name="namaproduk" required>
          <label for="lastnama">Nama produk</label>
        </div>
        <div class="input-field">
          <input id="lastwarna" type="text" class="validate" name="warnaproduk" required>
          <label for="lastwarna">Warna produk</label>
        </div>
        <!-- ukuran size -->
        <div class="row">
          <div class="input-field col s6" style="margin-top:5px">
            <span class="blue prefix white-text center" style="height:81%;font-size:25px;margin-top:-5px">S</span>
            <input id="icon_prefix1" type="number" value="0" class="center" name="hargas" required>
            <label for="icon_prefix1">Harga</label>
          </div>
          <div class="input-field col s6" style="margin-top:5px">
            <input id="icon_prefix2" type="text" class="center" name="ukurans" required>
            <label for="icon_prefix2">Ukuran P x L</label>
          </div>
        </div>
        <div class="row">
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
        </div>
        <!-- ahir ukuran size -->
        <div class="input-field" style="margin-top:-20px">
          <input id="biayasablon" type="text" class="validate" name="biayasablonproduk" required>
          <label for="biayasablon">Biaya sablon</label>
        </div>
        <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name="deskripsiproduk"></textarea>
          <label for="textarea1">Deskripsi produk</label>
        </div>
        <button class="btn waves-effect waves-light right blue" type="submit" name="tambah">Tambah</button>
      <!-- </div> -->
      </form>

    </div>
    <div class="modal-footer" style="margin-top:-20px">
      <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
    </div>
  </div>
  <!-- tutup modal tambah produk -->


    </div>
      <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

      $('.sidenav').sidenav({
        'edge':'right'
      });
      $('.materialboxed').materialbox();
      $('.slider').slider({
        'height':300
      });
      $('.modal').modal();
      $('.dropdown-trigger').dropdown();
      $('.materialboxed').materialbox();

      $('.close').on('click',function(){
        $('.hideflash').fadeOut();
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