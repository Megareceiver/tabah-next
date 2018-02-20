<main>
  <div class="container">
    <div class="row">

      <!-- TAB 1 -->
      <div id="awal" class="col s12 m10 offset-m1">
        <ul class="collapsible popout" data-collapsible="accordion">

          <?php if(!empty($data_permohonan_awal)){ ?>
            <?php foreach ($data_permohonan_awal as $value) { ?>
              <?php
                switch ($value->status) {
                  case 'Draft'      : $color = "yellow darken-2"; $state = "active"; break;
                  case 'Verifikasi' : $color = "red"; $state = "active"; break;
                  case 'Menunggu'   : $color = "blue"; $state = "active"; break;
                  case 'Selesai'    : $color = ""; $state = ""; break;
                  default: $color = ""; $state = "";
                }
              ?>
              <li>
                <div class="collapsible-header <?=$state?>"><i class="material-icons">receipt</i><?=$value->judul?><span class="new badge <?=$color?>" data-badge-caption="<?=$value->status?>"></span></div>
                <div class="collapsible-body white">
                  <div class="section">
                    <h6 class="light">Informasi</h6>
                    <div class="collection">
                      <a href="/kelembagaan/add/awal/<?=$value->nomor_dokumen?>" class="collection-item"><span class="badge">#<?=$value->nomor_dokumen?></span>Nomor Dokumen</a>
                      <p class="collection-item modal-trigger"><span class="badge">Rp. <?=number_format($value->nominal)?></span>Total Pengajuan</p>
                      <p class="collection-item"><?=$value->latar_belakang?></p>
                      <p class="collection-item grey-text">Dibuat <?=$this->public_function->time_elapsed_string($value->created_date)?></p>

                      <?php if(!empty($value->changed_date)){ ?>
                      <p class="collection-item grey-text">Diubah <?=$this->public_function->time_elapsed_string($value->changed_date)?></p>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="section">
                    <h6 class="light">Persyaratan</h6>
                    <div class="collection">
                      <?php $daftar_persyaratan = $this->Kelembagaan_model->get_persyaratan($value->nomor_dokumen, "permohonan_awal_persyaratan", "permohonan"); ?>
                      <?php foreach ($daftar_persyaratan as $persyaratan) { ?>
                        <?php
                          switch ($persyaratan->status) {
                            case 'Sudah' : $color = ""; $status = $persyaratan->status; break;
                            default: $color = "red"; $status = "Belum";
                          }
                        ?>

                        <?php if($status == "Belum") { ?>
                        <a href="/kelembagaan/add/awal/<?=$value->nomor_dokumen?>" class="collection-item"><span class="badge new <?=$color?>" data-badge-caption="<?=$status?>"></span><?=$persyaratan->nama?></a>
                        <?php } else { ?>
                        <p class="collection-item"><span class="badge new <?=$color?>" data-badge-caption="<?=$status?>"></span><?=$persyaratan->nama?></p>
                        <?php } ?>

                      <?php } ?>
                    </div>
                  </div>
                  <?php if(!empty($value->catatan)) { ?>
                  <div class="section">
                    <h6 class="light">Catatan Revisi</h6>
                    <p class="red-text"><?=$value->catatan?></p>
                  </div>
                  <?php } ?>
                  <?php if($value->status != "Selesai") { ?>
                  <div class="section">
                    <a href="/kelembagaan/send/awal/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">receipt</i>Kirim</a>
                    <a href="#form-awal" data-id="<?=$value->nomor_dokumen?>" data-section="#form-awal" data-target="awal" class="btn white btn-flat waves-effect waves-grey modal-trigger"><i class="material-icons left">mode_edit</i>Ubah</a>
                    <a href="/kelembagaan/add/awal/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">check</i>Lengkapi</a>
                    <a href="/kelembagaan/delete/awal/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">delete</i>Hapus</a>
                  </div>
                  <?php } ?>
                </div>
              </li>
            <?php } ?>
          <?php } else{ ?>
            <div class="section">
              <div class="row center grey-text">
                <h4 class="light">Oops, Data tidak ditemukan!</h4>
                <i class="material-icons large">find_in_page</i>
                <h6 class="light">Anda data membuat data baru dengan menekan tombol "+" dikanan-bawah layar Anda, <br/>jika terjadi kesalahan mohon hubungi sekretariat kami.</h6>
              </div>
            </div>
          <?php } ?>
        </ul>
      </div>
      <!-- TAB 1 End -->

      <!-- TAB 2 -->
      <div id="pencairan" class="col s12 m10 offset-m1">
        <ul class="collapsible popout" data-collapsible="accordion">
          <?php if(!empty($data_permohonan_pencairan)){ ?>
            <?php foreach ($data_permohonan_pencairan as $value) { ?>
              <?php
                switch ($value->status) {
                  case 'Draft'      : $color = "yellow darken-2"; $state = "active"; break;
                  case 'Verifikasi' : $color = "red"; $state = "active"; break;
                  case 'Menunggu'   : $color = "blue"; $state = "active"; break;
                  case 'Selesai'    : $color = ""; $state = ""; break;
                  default: $color = ""; $state = "";
                }
              ?>
              <li>
                <div class="collapsible-header <?=$state?>"><i class="material-icons">monetization_on</i><?=$value->judul?><span class="new badge <?=$color?>" data-badge-caption="<?=$value->status?>"></span></div>
                <div class="collapsible-body white">
                  <div class="section">
                    <h6 class="light">Informasi</h6>
                    <div class="collection">
                      <a href="/kelembagaan/add/pencairan/<?=$value->nomor_dokumen?>" class="collection-item"><span class="badge">#<?=$value->nomor_dokumen?></span>Nomor Dokumen</a>
                      <p class="collection-item modal-trigger"><span class="badge">Rp. <?=number_format($value->nominal)?></span>Total Pengajuan</p>
                      <p class="collection-item"><?=$value->latar_belakang?></p>
                      <p class="collection-item grey-text">Dibuat <?=$this->public_function->time_elapsed_string($value->created_date)?></p>

                      <?php if(!empty($value->changed_date)){ ?>
                      <p class="collection-item grey-text">Diubah <?=$this->public_function->time_elapsed_string($value->changed_date)?></p>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="section">
                    <h6 class="light">Persyaratan</h6>
                    <div class="collection">
                      <?php $daftar_persyaratan = $this->Kelembagaan_model->get_persyaratan($value->nomor_dokumen, "permohonan_pencairan_persyaratan", "pencairan"); ?>
                      <?php foreach ($daftar_persyaratan as $persyaratan) { ?>
                        <?php
                          switch ($persyaratan->status) {
                            case 'Sudah' : $color = ""; $status = $persyaratan->status; break;
                            default: $color = "red"; $status = "Belum";
                          }
                        ?>

                        <?php if($status == "Belum") { ?>
                        <a href="/kelembagaan/add/pencairan/<?=$value->nomor_dokumen?>" class="collection-item"><span class="badge new <?=$color?>" data-badge-caption="<?=$status?>"></span><?=$persyaratan->nama?></a>
                        <?php } else { ?>
                        <p class="collection-item"><span class="badge new <?=$color?>" data-badge-caption="<?=$status?>"></span><?=$persyaratan->nama?></p>
                        <?php } ?>

                      <?php } ?>
                    </div>
                  </div>
                  <?php if(!empty($value->catatan)) { ?>
                  <div class="section">
                    <h6 class="light">Catatan Revisi</h6>
                    <p class="red-text"><?=$value->catatan?></p>
                  </div>
                  <?php } ?>
                  <?php if($value->status != "Selesai") { ?>
                  <div class="section">
                    <a href="/kelembagaan/send/pencairan/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">receipt</i>Kirim</a>
                    <a href="#form-pencairan" data-id="<?=$value->nomor_dokumen?>" data-section="#form-pencairan" data-target="pencairan" class="btn white btn-flat waves-effect waves-grey modal-trigger"><i class="material-icons left">mode_edit</i>Ubah</a>
                    <a href="/kelembagaan/add/pencairan/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">check</i>Lengkapi</a>
                    <a href="/kelembagaan/delete/pencairan/<?=$value->nomor_dokumen?>" class="btn white btn-flat waves-effect waves-grey"><i class="material-icons left">delete</i>Hapus</a>
                  </div>
                  <?php } ?>
                </div>
              </li>
            <?php } ?>
          <?php } else{ ?>
            <div class="section">
              <div class="row center grey-text">
                <h4 class="light">Oops, Data tidak ditemukan!</h4>
                <i class="material-icons large">find_in_page</i>
                <h6 class="light">Anda data membuat data baru dengan menekan tombol "+" dikanan-bawah layar Anda, <br/>jika terjadi kesalahan mohon hubungi sekretariat kami.</h6>
              </div>
            </div>
          <?php } ?>
        </ul>
      </div>
      <!-- TAB 2 End -->

      <!-- TAB 3 -->
      <div id="pelaporan" class="col s12 m10 offset-m1">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="material-icons">class</i>Laporan Hibah 2<span class="new badge" data-badge-caption="Selesai"></span></div>
            <div class="collapsible-body white">
              <div class="section">
                <h6 class="light">Informasi</h6>
                <div class="collection">
                  <p class="collection-item"><span class="badge">#proposal1234888</span>Nomor Dokumen</p>
                  <p class="collection-item"><span class="badge">Rp. 20,000,000</span>Total Pencairan</p>
                  <p class="collection-item">Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.</p>
                  <p class="collection-item grey-text">5 hari yang lalu</p>
                </div>
              </div>
              <div class="section">
                <h6 class="light">Persyaratan</h6>
                <div class="collection">
                  <p class="collection-item"><span class="badge new" data-badge-caption="sudah"></span>Laporan (.pdf)</p>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- TAB 3 End -->

    </div>
  </div>
</main>

<!-- Modals -->
<div id="form-awal" class="modal">
  <div class="modal-content">
    <h4 class="card-title light">Permohonan Awal</h4>
    <p>Harap diperhatikan bahwa semua komponen wajib diisi.</p>
    <div class="row">
      <form method="post" action="/kelembagaan/draft/awal">
        <div class="row">
          <div class="input-field col s6">
            <input name="nomor_dokumen" type="hidden">
            <input id="judul" name="judul" type="text" class="validate" required>
            <label for="judul">Judul Proposal</label>
          </div>
          <div class="input-field col s6">
            <input id="nominal" name="nominal" terbilang-name="nominal_terbilang" type="text" class="validate" required>
            <label for="nominal">Nominal</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea" name="latar_belakang" class="materialize-textarea" required></textarea>
            <label for="textarea">Latar Belakang</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p><blockquote><i name="nominal_terbilang"></i></blockquote></p>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn blue darken-2 waves-effect waves-light">Draft</button>
            <a href="#!" class="btn red modal-action modal-close waves-effect waves-light">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="form-pencairan" class="modal">
  <div class="modal-content">
    <h4 class="card-title light">Permohonan Pencairan</h4>
    <p>Harap diperhatikan bahwa semua komponen wajib diisi.</p>
    <div class="row">
      <form method="post" action="/kelembagaan/draft/pencairan">
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <select name="nomor_dokumen_awal" required>
              <option value="" disabled selected>Pilih</option>
              <?php if(!empty($data_permohonan_awal_active)){ ?>
                <?php foreach ($data_permohonan_awal_active as $value) { ?>
                <option value="<?=$value->nomor_dokumen?>"><?=$value->judul?></option>
                <?php } ?>
              <?php } ?>
            </select>
            <label>Proposal Permohonan Awal</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input name="nomor_dokumen" type="hidden">
            <input id="judul-pencairan" name="judul" type="text" class="validate" required>
            <label for="judul-pencairan">Judul Proposal</label>
          </div>
          <div class="input-field col s6">
            <input id="nominal-pencairan" name="nominal" terbilang-name="nominal_terbilang" type="text" class="validate" required>
            <label for="nominal-pencairan">Nominal</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea-pencairan" name="latar_belakang" class="materialize-textarea" required></textarea>
            <label for="textarea-pencairan">Latar Belakang</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p><blockquote><i name="nominal_terbilang"></i></blockquote></p>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn blue darken-2 waves-effect waves-light">Draft</button>
            <a href="#!" class="btn red modal-action modal-close waves-effect waves-light">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="form-pelaporan" class="modal">
  <div class="modal-content">
    <h4 class="card-title light">Pelaporan</h4>
    <p>Harap diperhatikan bahwa semua komponen wajib diisi.</p>
    <div class="row">
      <form>
        <div class="row">
          <div class="input-field col s12 m6 l6">
            <select name="nomor_dokumen_pencairan" required>
              <option value="" disabled selected>Pilih</option>
              <?php if(!empty($data_permohonan_pencairan_active)){ ?>
                <?php foreach ($data_permohonan_pencairan_active as $value) { ?>
                <option value="<?=$value->nomor_dokumen?>"><?=$value->judul?></option>
                <?php } ?>
              <?php } ?>
            </select>
            <label>Proposal Permohonan Pencairan</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12 l6">
            <input id="judul" type="text" class="validate" required>
            <label for="judul">Judul Laporan</label>
          </div>
        </div>
        <div class="row">
          <div class="file-field input-field col s12 m12 l6">
            <p>Upload berkas Anda disini (.pdf).</p>
            <div class="btn">
              <span>File</span>
              <input type="file" accept="application/pdf">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn blue darken-2">Kirim Laporan</button>
            <a href="#!" class="btn red modal-action modal-close waves-effect waves-light">Batal</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modals End -->
