  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- google font -->
      <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&family=Farsan&family=Faster+One&family=Monoton&family=Nosifer&display=swap" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>daftar akun</title>
      <style>
        html,body, .row{
          height:98%;
        }
        body{
          background-color:#009688;
        }
        img[alt*="www.000webhost.com"]{
          display:none
        }
      </style>
    </head>

    <body>

    <div class="navbar-fixed">
    <nav class="z-depth-0 teal">
      <div class="nav-wrapper" style="max-width:1000px;width:97%;margin:1px auto;left:0;right:0;">
        <img style="margin-left: 5px;margin-top:10px;line-height:20px;" class="" width="40" height="40" src="<?=base_url('assets/img/rgb/STIKER.png'); ?>">
        <a href="#" class="brand-logo left"><span style="font-family: 'Nosifer', cursive;line-height:20px;font-size:30px;margin-left:40px"><span class="red-text">R</span><span class="green-text">G</span><span class="blue-text">B</span></span> <span style="line-height:30px;font-size:15px;font-style:italic;">Sablon</span></a>
      </div>
    </nav>
    </div>

    <div class="row" style="max-width:1000px;display:flex;align-items:center;">

      
      <div class="batastepi" style="border-radius:10px;width:99%;margin:1px auto;left:0;right:0;">

        <div class="col s12 center" style="align-items:center;">
        <h5 class="header white-text" style="margin:20px;font-size:19px">Daftar Akun RGB</h5>
        <div class="card horizontal z-depth-2" style="border-radius:10px">
          <!-- <div class="card-image">
            <img src="https://lorempixel.com/100/190/nature/6">
          </div> -->
          <div class="card-stacked">
            <div class="card-content">
              <div class="row center">
                <div class="row">
                  <div class="col s12">
                  <?= $this->session->flashdata('pesan'); ?>
                  </div>
                    <form class="col s12" action="<?= base_url('auth/daftar'); ?>" method="post">
                    <div class="row">
                      <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('namadaftar')){echo "margin-bottom:-10px;";} ?>">
                        <input id="fullname" type="text" name="namadaftar" class="validate" value="<?= set_value('namadaftar'); ?>" autocomplete="off">
                        <label for="fullname">Nama Lengkap</label>
                        <?= form_error('namadaftar','<span class="red-text right">', '</span>'); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('namadaftar')){echo "margin-bottom:-10px;";} ?>">
                        <input id="tgllahir" type="text" class="datepicker" name="tgllahirdaftar" value="<?= set_value('tgllahirdaftar'); ?>" autocomplete="off">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <?= form_error('tgllahirdaftar','<span class="red-text right">', '</span>'); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12" style="margin-top:-10px;<?php if(form_error('jeniskelamindaftar')){echo "margin-bottom:-10px;";} ?>">
                        <select name="jeniskelamindaftar">
                          <option value="" disabled selected>Jenis Kelamin</option>
                          <option value="laki-laki">Laki-laki</option>
                          <option value="perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jeniskelamindaftar','<span class="red-text right">','</span>'); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('emaildaftar')){echo "margin-bottom:-10px;";} ?>">
                        <input id="email" type="email" name="emaildaftar" class="validate" value="<?= set_value('emaildaftar'); ?>" autocomplete="off">
                        <label for="email">Email</label>
                        <?= form_error('emaildaftar','<span class="red-text right">','</span>'); ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6" style="margin-top: -10px">
                        <input id="password1" type="password" name="pdaftar1" class="validate">
                        <label for="password1">Password</label>
                      </div>
                      <div class="input-field col s6" style="margin-top: -10px">
                        <input id="password2" type="password" name="pdaftar2" class="validate">
                        <label for="password2">Confirm password</label>
                        <?= form_error('pdaftar1','<span class="red-text right">','</span>'); ?>
                      </div>
                    </div>
                    <div class="center">
                      <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action" style="width: 100%;margin-bottom:20px">DAFTAR
                      </button>
                    </div>
                  </form>
                        <a href="<?=base_url('auth'); ?>">Sudah punya akun? Login sekarang!</a>
                  </div>
              </div>
            </div>
            <!-- <div class="card-action">
              <a href="#">This is a link</a>
            </div> -->
          </div>
        </div>
      </div>
      
      <!-- <div class="row">
        <div class="col s12 white-text center-align" style="margin-top:20px;">
          <h5>DAFTAR</h5>
        </div> 
      </div>

      <div class="container" style="padding-bottom: 30px">

      <div class="row" style="max-width: 1000px;">
        <form class="col s12" action="<?= base_url('auth/daftar'); ?>" method="post">
          <div class="row">
            <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('namadaftar')){echo "margin-bottom:-10px;";} ?>">
              <input id="fullname" type="text" name="namadaftar" class="validate" value="<?= set_value('namadaftar'); ?>" autocomplete="off">
              <label for="fullname">Nama Lengkap</label>
              <?= form_error('namadaftar','<span class="red-text right">', '</span>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('namadaftar')){echo "margin-bottom:-10px;";} ?>">
              <input id="tgllahir" type="text" class="datepicker" name="tgllahirdaftar" value="<?= set_value('tgllahirdaftar'); ?>" autocomplete="off">
              <label for="tgllahir">Tanggal Lahir</label>
              <?= form_error('tgllahirdaftar','<span class="red-text right">', '</span>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12" style="margin-top:-10px;<?php if(form_error('jeniskelamindaftar')){echo "margin-bottom:-10px;";} ?>">
              <select name="jeniskelamindaftar">
                <option value="" disabled selected>Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
              <?= form_error('jeniskelamindaftar','<span class="red-text right">','</span>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12" style="margin-top: -10px;<?php if(form_error('emaildaftar')){echo "margin-bottom:-10px;";} ?>">
              <input id="email" type="email" name="emaildaftar" class="validate" value="<?= set_value('emaildaftar'); ?>" autocomplete="off">
              <label for="email">Email</label>
              <?= form_error('emaildaftar','<span class="red-text right">','</span>'); ?>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6" style="margin-top: -10px">
              <input id="password1" type="password" name="pdaftar1" class="validate">
              <label for="password1">Password</label>
            </div>
            <div class="input-field col s6" style="margin-top: -10px">
              <input id="password2" type="password" name="pdaftar2" class="validate">
              <label for="password2">Confirm password</label>
              <?= form_error('pdaftar1','<span class="red-text right">','</span>'); ?>
            </div>
          </div>
          <div class="center">
            <button class="btn-large waves-effect waves-light blue darken-3" type="submit" name="action" style="width: 100%">DAFTAR
            </button>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col s12 center-align">
          <span><a href="<?= base_url('auth'); ?>">Login!</a></span>
        </div> 
      </div>

      </div> -->
      
</div><!-- tutup batastepi -->

    </div><!-- tutup maxwidth -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){


        $('.close').on('click',function(){
          $('.hideflash').fadeOut();
        });
        $('.datepicker').datepicker({
          'format':'yyyy-mm-dd'
        });
        $('select').formSelect();

        // var input = document.getElementById('ok');
        // // input.type = 'file';
        // input.onchange = function(e) { 
        //    // getting a hold of the file reference
        //    var file = e.target.files[0]; 
        //    // setting up the reader
        //    var reader = new FileReader();
        //    reader.readAsDataURL(file); // this is reading as data url
        //    // here we tell the reader what to do when it's done reading...
        //    reader.onload = readerEvent => {
        //       var content = readerEvent.target.result; // this is the content!
        //       $('.gr').attr('src',content);
        //    }
        // }


      });
    </script>
    </body>
  </html>