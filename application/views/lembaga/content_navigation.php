<!-- Navigation -->
<nav class="nav-extended blue darken-2">
  <div class="nav-wrapper">
    <div class="row">
      <div class="col s12">
        <ul class="left">
          <li><a href="#" data-activates="slide-out" class="navigation-collapse"><i class="material-icons">menu</i></a></li>
          <li>Kelembagaan</li>
        </ul>
        <ul class="right">
          <li><a href="/kelembagaan/notifikasi"><i class="material-icons">notifications</i></a></li>
          <li><a class="dropdown-button" href="#!" data-activates="dropdown-x"><i class="material-icons">more_vert</i></a></li>
        </ul>
        <ul id="dropdown-x" class="dropdown-content">
          <!-- <li><a href="#"><i class="material-icons">settings</i>Pengaturan</a></li> -->
          <li><a href="#"><i class="material-icons">help</i>Bantuan</a></li>
          <li class="divider"></li>
          <li><a href="/account/logout"><i class="material-icons">exit_to_app</i>Keluar</a></li>
        </ul>
        <ul id="slide-out" class="side-nav">
          <li><div class="user-view">
            <div class="background">
              <img src="/assets/img/bg-1.jpg">
            </div>
            <a href="#!user"><img class="circle" src="/assets/img/bg-2.jpg"></a>
            <a href="#!name"><span class="white-text name"><?=$session_data['nama_lembaga']?></span></a>
            <a href="#!email"><span class="white-text email"><?=$session_data['email_lembaga']?></span></a>
          </div></li>
          <li><a href="/kelembagaan"><i class="material-icons">home</i>Beranda</a></li>
          <li><a href="/kelembagaan/riwayat"><i class="material-icons">history</i>Riwayat Hibah</a></li>
          <li><div class="divider"></div></li>
          <!-- <li><a href="#!"><i class="material-icons">settings</i>Pengaturan</a></li> -->
          <li><a href="#!"><i class="material-icons">help</i>Bantuan</a></li>
          <li><a class="waves-effect" href="/account/logout"><i class="material-icons">exit_to_app</i>Keluar</a></li>
        </ul>
      </div>
    </div>
  </div>

	<?php if(isset($page_option) && $page_option == "index"){ ?>
  <div class="nav-content">
    <div class="container">
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a class="kelembagaan-tab active" href="#awal">Permohonan Awal</a></li>
            <li class="tab"><a class="kelembagaan-tab" href="#pencairan">Permohonan Pencairan</a></li>
            <li class="tab"><a class="kelembagaan-tab" href="#pelaporan">Pelaporan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
	<?php } ?>

	<?php if(isset($page_option) && $page_option == "form-tab"){ ?>
  <div class="nav-content">
    <div class="container">
      <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a class="kelembagaan-tab" href="#deskripsi">Deskripsi</a></li>
            <li class="tab"><a class="kelembagaan-tab" href="#rab">RAB</a></li>
            <li class="tab"><a class="kelembagaan-tab" href="#persyaratan">Persyaratan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
	<?php } ?>
</nav>
<!-- Navigation End -->

<?php if(isset($button_add) && $button_add['state'] === true){ ?>
<!-- Button Add -->
<div class="fixed-action-btn">
  <a id="hibah-add" href="<?=$button_add['url']?>" class="btn-floating btn-large blue waves-effect waves-light modal-trigger">
    <i class="large material-icons">mode_edit</i>
  </a>
</div>
<!-- Button Add End -->
<?php } ?>
