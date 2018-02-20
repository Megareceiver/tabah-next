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
          <!-- <p>Hari ini</p>
          <div class="collection">
            <p class="collection-item"><span class="badge">8 menit</span><i class="material-icons left">notifications_none</i>Proposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan Awal</p>
            <p class="collection-item"><span class="badge">50 menit</span><i class="material-icons left">notifications_none</i>Proposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan Awal</p>
          </div>
          <p>Riwayat</p>
          <div class="collection">
            <p class="collection-item"><span class="badge">2 hari</span><i class="material-icons left">notifications_none</i>Proposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan Awal</p>
            <p class="collection-item"><span class="badge">4 hari</span><i class="material-icons left">notifications_none</i>Proposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan Awal</p>
            <p class="collection-item"><span class="badge">4 hari</span><i class="material-icons left">notifications_none</i>Proposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan AwalProposal Permohonan Awal</p>
          </div> -->
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
