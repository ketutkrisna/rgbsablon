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
      <title>Login rgb</title>
      <style>
        html,body, .row{
          height:90%;
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
        <h5 class="header white-text" style="margin:20px">Login Member RGB</h5>
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
                    <form class="col s12" action="<?=base_url('auth'); ?>" method="post">
                      <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">account_circle</i>
                          <input id="icon_prefix" type="email" name="email" class="validate" value="<?= set_value('email'); ?>" required>
                          <label for="icon_prefix">Email</label>
                        </div>
                        <div class="input-field col s12">
                          <i class="material-icons prefix">lock</i>
                          <input id="icon_password" type="password" name="password" class="validate" required>
                          <label for="icon_password">Password</label>
                        </div>
                        <div class="col s12">
                          <button style="width:100%" class="btn-large waves-effect waves-light" type="submit" name="login">login
                            <!-- <i class="material-icons right">send</i> IWin2[7-Egvg]xHM   R1XdKw-tZ!JqCOvH rgb:uW9ELISw-unCoAda X{EMVEy)h1BvXydd-->
                          </button>
                        </div>
                      </div>
                    </form>
                        <a href="<?=base_url('auth/daftarakun'); ?>">Belum punya akun? Daftar sekarang!</a>
                  </div>
              </div>
            </div>
            <!-- <div class="card-action">
              <a href="#">This is a link</a>
            </div> -->
          </div>
        </div>
      </div>

      <!-- <form action="" method="post" enctype="multipart/form-data">
        Pilih file: <input id="myInput" type="file" style="{{visibility: 'hidden'}}" webkitdirectory directory multiple/>
        <input type="submit" name="upload" value="upload" />
    </form>  -->

    <!-- <input type="file" id="ok" name="">
    <div id="contente"></div>
    <img class="gr" src=""> -->

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