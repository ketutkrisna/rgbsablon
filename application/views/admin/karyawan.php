<!-- <body> -->
      <!-- navbar -->
      <div class="navbar-fixed">
        <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
          <div class="nav-wrapper">
            <div class="container">
              <span class=""><a href="<?= base_url('users'); ?>"><i class="material-icons left teal-text">arrow_back</i></a></span>
              <span class="brand-logo hide-on-small-and-down center teal-text">Karyawan</span>
              <span class="brand-logo show-on-small hide-on-med-and-up center teal-text" style="font-size: 18px">Karyawan</span>
            <ul id="nav-mobile" class="left hide-on-med-and-down">
            </ul>
            </div>
          </div>
        </nav>
      </div>

      
      <div class="container">
        <div class="row">

          <!-- <div class="row">
            <div class="col s12" style="margin-top:20px"> -->
              <div class="col s12">
                <?=$this->session->flashdata('message'); ?>
              </div> 

              <ul class="collection with-header">
                <li class="collection-header center"><h5>Daftar Karyawan</h5></li>
                <?php $i=1; foreach($karyawan as $krw): ?>
                  <li class="collection-item"><div><?=$i++; ?>. <?=$krw['nama_karyawan']; ?><a href="<?=base_url('admin/detailkaryawan/').$krw['id_karyawan']; ?>" class="secondary-content"><i class="material-icons blue-text" style="font-weight:bold;">near_me</i></a></div></li>
                <?php endforeach; ?>
              </ul>

           <!--  </div>
          </div> -->

        </div>
      </div>

      <div class="fixed-action-btn">
        <a class="btn-floating btn-large blue waves-effect waves-grey z-depth-2 modal-trigger" href="#modaltambahkaryawan">
          <i class="large material-icons white-text" style="font-size:25px;">group_add</i>
        </a>
      </div>

      <!-- Modal Structure tambah produk-->
      <div id="modaltambahkaryawan" class="modal">
        <div class="modal-content">

          <h5 style="margin-top:-10px">Tambah Karyawan</h5>
          <form action="<?=base_url('admin/tambahkaryawan/'); ?>" method="post">
            <!-- <div class="row"> -->
            <div class="input-field">
              <input id="lastnama" type="text" class="validate" name="namakaryawan" required>
              <label for="lastnama">Nama karyawan</label>
            </div>
            <div class="input-field">
              <input id="lastwarna" type="text" class="validate" name="alamatkaryawan" required>
              <label for="lastwarna">Alamat karyawan</label>
            </div>
            <div class="input-field">
              <input id="lasttlp" type="text" class="validate" name="notlpkaryawan" required>
              <label for="lasttlp">No.tlp karyawan</label>
            </div>
            <div class="input-field col s12">
              <select name="genderkaryawan">
                <option value="" disabled selected>Pilih Gender</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              <!-- <label>Materialize Select</label> -->
            </div>
            <!-- ukuran size -->
            <button class="btn waves-effect waves-light right blue" type="submit" name="tambah">Tambah</button>
          <!-- </div> -->
          </form>

        </div>
        <div class="modal-footer" style="margin-top:-20px">
          <!-- <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a> -->
        </div>
      </div>
      <!-- tutup modal tambah produk -->

     
      

      <!-- Compiled and minified JavaScript -->
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){

            // $('.sidenav').sidenav();
            $('.modal').modal();
            $('.materialboxed').materialbox();
            $('.datepicker').datepicker({
              format:'yyyy-mm-dd'
            });
            $('select').formSelect();
            $('.close').on('click',function(){
              $('.hideflash').fadeOut();
            });
            $('.goback').on('click',function(){
              parent.history.back();
              return false;
            });
            $('.bataleditinfoakun').hide();
            $('.hideeditinput').hide();
            $('.editinfoakun').on('click',function(){
              $('.infoakunhide').fadeOut();
              $('.bataleditinfoakun').fadeIn();
              $('.editinfoakun').fadeOut();
              $('.hideeditinput').show();
            });
            $('.bataleditinfoakun').on('click',function(){
              $('.infoakunhide').fadeIn();
              $('.bataleditinfoakun').fadeOut();
              $('.editinfoakun').fadeIn();
              $('.hideeditinput').hide();
            });

        });
      </script>
    </body>
  </html>