<?php if($title=='beranda'){ ?>
    <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-around;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons grey lighten-2 teal-text text-darken-4" style="font-size:30px;font-weight:bold;">home</i>
                <!-- <span class="teal-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url('users/produk'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">storefront</i>
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <?php if($this->session->userdata('level_user')=='admin'){ ?>
                  <a href="<?= base_url('admin'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_basket</i>
                  <?php if($countnew['countnew']<=0){echo "";}else{ ?>
                    <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
                  <?php } ?>
                  </a>
                <?php } ?>
                <?php if($this->session->userdata('level_user')=='user'){ ?>
                  <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_cart</i>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
<?php }else if($title=='produk'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
        <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
          <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-around;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">home</i>
                <!-- <span class="teal-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url('users/produk'); ?>"><i class="material-icons grey lighten-2 teal-text text-darken-4" style="font-size:30px;font-weight:bold;">storefront</i>
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <?php if($this->session->userdata('level_user')=='admin'){ ?>
                  <a href="<?= base_url('admin'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_basket</i>
                  <?php if($countnew['countnew']<=0){echo "";}else{ ?>
                    <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
                  <?php } ?>
                  </a>
                <?php } ?>
                <?php if($this->session->userdata('level_user')=='user'){ ?>
                  <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_cart</i>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
<?php }else if($title=='daftar pesanan'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-around;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">home</i>
                <!-- <span class="teal-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url('users/produk'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">storefront</i>
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <?php if($this->session->userdata('level_user')=='admin'){ ?>
                  <a href="<?= base_url('admin'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_basket</i>
                  <?php if($countnew['countnew']<=0){echo "";}else{ ?>
                    <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
                  <?php } ?>
                  </a>
                <?php } ?>
                <?php if($this->session->userdata('level_user')=='user'){ ?>
                  <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons grey lighten-2 teal-text text-darken-4" style="font-size:30px;font-weight:bold;">shopping_cart</i>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
<?php }else if($title=='daftar pesanan admin'){ ?>
      <div class="navbar-fixed oke show-on-medium-and-down hide-on-med-and-up">
      <nav class="white z-depth-0" style="border-top: 1px solid #ccc;bottom: -1px;">
        <div class="nav-wrapper">
            <div class="" style="display: flex;justify-content: space-around;padding:0 0px 0 0px;">
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url(); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">home</i>
                <!-- <span class="teal-text" style="top: 18px;position: absolute;left: -10px;">beranda</span> -->
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <a href="<?= base_url('users/produk'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">storefront</i>
                </a>
              </div>
              <div class="waves-effect waves-grey btn white z-depth-0" style="position: relative;height: 100%;border:0;width: 100%;padding:0">
                <?php if($this->session->userdata('level_user')=='admin'){ ?>
                  <a href="<?= base_url('admin'); ?>"><i class="material-icons grey lighten-2 teal-text text-darken-4" style="font-size:30px;font-weight:bold;">shopping_basket</i>
                  <?php if($countnew['countnew']<=0){echo "";}else{ ?>
                    <span class="btn-floating pulse red z-depth-2" style="top:-58px;right:-13px;border-radius:4px;width:20px;height:20px;line-height:20px"><?=$countnew['countnew']; ?></span>
                  <?php } ?>
                  </a>
                <?php } ?>
                <?php if($this->session->userdata('level_user')=='user'){ ?>
                  <a href="<?= base_url('users/daftarpesanan'); ?>"><i class="material-icons teal-text" style="font-size:30px;font-weight:bold;">shopping_cart</i>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
<?php } ?>


