      <!-- menu sidenave -->
      <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
          <div class="background teal">
            <!-- <img src="images/office.jpg"> -->
          </div>
          <a href="#user"><img style="border:2px solid white;" class="circle materialboxed" src="<?=base_url('assets/img/users/').$profileuser['foto_user']; ?>"></a>
          <a href="#name"><span class="white-text name"><?=$profileuser['nama_user']; ?></span></a>
          <a href="#email"><span class="white-text email"><?=$profileuser['email_user']; ?></span></a>
        </div></li>
        <li><a href="<?=base_url('users/editprofil'); ?>"><i class="material-icons">account_box</i>Profil</a></li>
        <li><a href="<?=base_url('users/gantipassword'); ?>"><i class="material-icons">vpn_key</i>Ubah Password</a></li>
        <!-- <li><a href="#!"><i class="material-icons">vpn_lock</i>Php</a></li>
        <li><a href="#!"><i class="material-icons">folder</i>MySql</a></li>
        <li><a href="#!"><i class="material-icons">whatshot</i>JavaScript</a></li> -->
        <li><a href="<?= base_url('auth/logout'); ?>"><i class="material-icons">exit_to_app</i>Keluar</a></li>
        <li><div class="divider"></div></li>
      <?php if($this->session->userdata('level_user')=='admin'): ?>
        <li><a class="waves-effect" href="<?=base_url('admin/karyawan'); ?>">Kelola Karyawan</a></li>
      <?php endif; ?>
        <li><a class="waves-effect" href="<?=base_url('users/about'); ?>">About</a></li>
      </ul>

      <!-- <?php if($title=='beranda'){ ?>
      <div class="row" style="max-width:1000px;">
      <?php } ?> -->