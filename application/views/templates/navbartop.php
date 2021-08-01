<?php if($title=='beranda'){ ?>     
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left teal-text">
            <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/rgb/STIKER.png'); ?>">
           <span style="font-family: 'Nosifer', cursive;font-size:;"><span class="red-text">R</span><span class="green-text">G</span><span class="blue-text">B</span></span> <span style="line-height:30px;font-size:12px;font-style:italic;">Sablon</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;margin-right: -20px">
            <?= $fitursearch; ?>
          <div class="mobile hide-on-med-and-down">
            <li class="grey lighten-2"><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">home</i>beranda</a></li>
            <li><a href="<?= base_url('users/produk'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">storefront</i>Produk</a></li>
          <?php if($this->session->userdata('level_user')=='admin'){ ?>
            <li><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">shopping_basket</i>Pesanan 
              <?php if($countnew['countnew']<=0){echo "";}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
              <?php } ?>
            </a></li>
          <?php } ?>
          <?php if($this->session->userdata('level_user')=='user'){ ?>
            <li><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">shopping_cart</i>Pesanan 
              <!-- <?php if($countnew['countnew']<=0){echo "";}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
              <?php } ?> -->
            </a></li>
          <?php } ?>
            <!-- <li><a href="sass.html" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">textsms</i>Chat <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px">20</span></a></li> -->
          </div>
            <li style="height: 100%;"><a style="display: flex;height:100%;align-items: center;" data-target="slide-out" class="sidenav-trigger waves-effect waves-grey white"><img style="border:2px solid #009688;" class="circle" width="35" height="35px" src="<?=base_url('assets/img/users/').$profileuser['foto_user']; ?>"></a></li>
          </ul>
        </div>
        </nav>
      </div>
      <!-- <?=$hidesearch; ?> -->
<?php }else if($title=='produk'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left teal-text">
          <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/rgb/STIKER.png'); ?>">
          <span style="font-family: 'Nosifer', cursive;font-size:;"><span class="red-text">R</span><span class="green-text">G</span><span class="blue-text">B</span></span> <span style="line-height:30px;font-size:12px;font-style:italic;">Sablon</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;margin-right: -20px">
            <?= $fitursearch; ?>
          <div class="mobile hide-on-med-and-down">
            <li><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">home</i>beranda</a></li>
            <li class="grey lighten-2"><a href="<?= base_url('users/produk'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">storefront</i>Produk</a></li>
          <?php if($this->session->userdata('level_user')=='admin'){ ?>
            <li><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">shopping_basket</i>Pesanan 
              <?php if($countnew['countnew']<=0){echo "";}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
              <?php } ?>
            </a></li>
          <?php } ?>
          <?php if($this->session->userdata('level_user')=='user'){ ?>
            <li><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">shopping_cart</i>Pesanan 
            </a></li>
          <?php } ?>
          </div>
            <li style="height: 100%;"><a style="display: flex;height:100%;align-items: center;" data-target="slide-out" class="sidenav-trigger waves-effect waves-grey white"><img style="border:2px solid #009688;" class="circle" width="35" height="35px" src="<?=base_url('assets/img/users/').$profileuser['foto_user']; ?>"></a></li>
          </ul>
        </div>
        </nav>
      </div>
      <!-- <?=$hidesearch; ?> -->
<?php }else if($title=='daftar pesanan'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left teal-text">
          <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/rgb/STIKER.png'); ?>">
          <span style="font-family: 'Nosifer', cursive;font-size:;"><span class="red-text">R</span><span class="green-text">G</span><span class="blue-text">B</span></span> <span style="line-height:30px;font-size:12px;font-style:italic;">Sablon</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;margin-right: -20px">
            <?= $fitursearch; ?>
          <div class="mobile hide-on-med-and-down">
            <li><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">home</i>beranda</a></li>
            <li><a href="<?= base_url('users/produk'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">storefront</i>Produk</a></li>
          <?php if($this->session->userdata('level_user')=='admin'){ ?>
            <li class="grey lighten-2"><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">shopping_basket</i>Pesanan 
              <?php if($countnew['countnew']<=0){echo "";}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
              <?php } ?>
            </a></li>
          <?php } ?>
          <?php if($this->session->userdata('level_user')=='user'){ ?>
            <li class="grey lighten-2"><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">shopping_cart</i>Pesanan 
            </a></li>
          <?php } ?>
          </div>
            <li style="height: 100%;"><a style="display: flex;height:100%;align-items: center;" data-target="slide-out" class="sidenav-trigger waves-effect waves-grey white"><img style="border:2px solid #009688;" class="circle" width="35" height="35px" src="<?=base_url('assets/img/users/').$profileuser['foto_user']; ?>"></a></li>
          </ul>
        </div>
        </nav>
      </div>
      <!-- <?=$hidesearch; ?> -->
<?php }else if($title=='daftar pesanan admin'){ ?>
      <div class="navbar-fixed navbarmenu">
      <nav class="white z-depth-0 navbar-fixed naik" style="border-bottom: 1px solid #ddd;top: 0px;">
        <div class="nav-wrapper">
          <!-- <a href="#" data-target="slide-out" class="sidenav-trigger show-on-medium-and-up"><i class="material-icons blue-text">menu</i></a> -->
          <a href="#!" style="display: flex;height:100%;align-items: center;font-size:22px;padding-left:5px" class="brand-logo left teal-text">
          <img style="margin-right: 5px" class="" width="30" height="30" src="<?=base_url('assets/img/rgb/STIKER.png'); ?>">
          <span style="font-family: 'Nosifer', cursive;font-size:;"><span class="red-text">R</span><span class="green-text">G</span><span class="blue-text">B</span></span> <span style="line-height:30px;font-size:12px;font-style:italic;">Sablon</span></a>
          <ul class="right" style="display: flex;align-items: center;height: 100%;margin-right: -20px">
            <?= $fitursearch; ?>
          <div class="mobile hide-on-med-and-down">
            <li><a href="<?= base_url(); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">home</i>beranda</a></li>
            <li><a href="<?= base_url('users/produk'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text left">storefront</i>Produk</a></li>
          <?php if($this->session->userdata('level_user')=='admin'){ ?>
            <li class="grey lighten-2"><a href="<?= base_url('admin'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">shopping_basket</i>Pesanan 
              <?php if($countnew['countnew']<=0){echo "";}else{ ?>
              <span class="btn-floating pulse red z-depth-2 white-text center" style="border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
              <?php } ?>
            </a></li>
          <?php } ?>
          <?php if($this->session->userdata('level_user')=='user'){ ?>
            <li class="grey lighten-2"><a href="<?= base_url('users/daftarpesanan'); ?>" class="grey-text"><i style="font-size:30px" class="material-icons teal-text text-darken-4 left">shopping_cart</i>Pesanan 
            </a></li>
          <?php } ?>
          </div>
            <li style="height: 100%;"><a style="display: flex;height:100%;align-items: center;" data-target="slide-out" class="sidenav-trigger waves-effect waves-grey white"><img style="border:2px solid #009688;" class="circle" width="35" height="35px" src="<?=base_url('assets/img/users/').$profileuser['foto_user']; ?>"></a></li>
          </ul>
        </div>
        </nav>
      </div>
      <!-- <?=$hidesearch; ?> -->
<?php } ?>