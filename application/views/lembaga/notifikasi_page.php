<main>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4 class="light">Pemberitahuan</h4>
        <?php if(!empty($data_notifikasi)){ ?>
          <p>Riwayat</p>
          <div class="collection">
          <?php foreach ($data_notifikasi as $value) { ?>
            <p class="collection-item"><span class="badge"><?=$this->public_function->time_elapsed_string($value->created_date)?></span><i class="material-icons left">notifications_none</i><?=$value->teks?></p>
          <?php }?>
          </div>
        <?php } else { ?>
        <div class="section">
          <div class="row center grey-text">
            <i class="material-icons large">notifications_off</i>
            <h6 class="light">Belum ada pemberitahuan saat ini.</h6>
          </div>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
</main>
