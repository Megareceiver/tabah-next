<main>
    <div class="row">
      <!-- TAB 1 -->
      <div class="col s12 m12 l4">
        <div class="section">
          <h4 class="light">Persyaratan Pencairan</h4>
          <p>Anda perlu mempersiapkan berkas untuk diupload berdasarkan persyaratan yang dibutuhkan.</p>

          <ul class="collapsible" data-collapsible="accordion">
            <?php foreach ($daftar_persyaratan as $persyaratan) { ?>
              <?php
                switch ($persyaratan->status) {
                  case 'Sudah' : $color = ""; $status = $persyaratan->status; break;
                  default: $color = "red"; $status = "Belum";
                }
              ?>
              <li>
                <div class="collapsible-header"><?=$persyaratan->nama?><span class="new badge <?=$color?>" data-badge-caption="<?=$status?>"></span></div>
                <div class="collapsible-body white">
                  <?php if ($status != "Belum") { ?>
                  <div class="row">
                    Berkas : <a href="/uploads/permohonan_pencairan/<?=$persyaratan->berkas?>" target="_blank"><?=$persyaratan->berkas?></a>
                  </div>
                  <div class="row">
                    <a href="/kelembagaan/delete_persyaratan/pencairan/<?=$nomor_dokumen?>/<?=$persyaratan->kode_data?>" class="btn-flat grey-text"><i class="material-icons left">delete</i>Hapus berkas</a>
                  </div>
                  <?php } else { ?>
                  <form action="/kelembagaan/upload_persyaratan/pencairan/<?=$nomor_dokumen?>/<?=$persyaratan->kode_data?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                    <p>Upload berkas anda disini (.pdf).</p>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Berkas</span>
                        <input type="file" name="berkas" accept="application/pdf">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field">
                        <button type="submit" class="btn blue darken-2 waves-effect waves-light">Upload berkas</button>
                      </div>
                    </div>
                  </form>
                  <?php } ?>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!-- TAB 1 End -->

      <!-- TAB 2 -->
      <div class="col s12 m12 l8">
        <div class="card">
          <div class="card-content">
            <span class="card-title">RAB Permohonan Pencairan</span>
            <p>Rencana Anggaran Biaya.</p>
            <div class="row">
              <form id="rab" method="post" action="/kelembagaan/rab/pencairan/<?=$nomor_dokumen?>">
                <div class="row">
                  <div class="input-field col s6 l3">
                    <input name="kode_data" type="hidden">
                    <input id="deskripsi-rab" name="uraian" type="text" class="validate" required>
                    <label for="deskripsi-rab">Uraian</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="volume-rab" name="volume" type="number" class="validate number" required>
                    <label for="volume-rab">Volume</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="satuan-rab" name="satuan" type="text" class="validate" required>
                    <label for="satuan-rab">Satuan</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="harga-rab" name="harga" type="text" class="validate currency" required>
                    <label for="harga-rab">Harga</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button type="submit" class="btn blue darken-2 waves-effect waves-light">Masukan</button>
                    <button type="reset" class="btn yellow darken-2 waves-effect waves-light">Batal</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="row">
              <div class="section col s12">
                <table class="responsive-table highlight">
                  <thead>
                    <tr>
                        <th>Uraian</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>&nbsp;</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php if(!empty($daftar_rab)){ $total = 0; ?>
                      <?php foreach ($daftar_rab as $rab) { ?>
                      <?php $total = $total + ($rab->volume * $rab->harga); ?>
                      <tr>
                        <td><a href="#" data-id="<?=$rab->kode_data?>" data-section="#rab" data-reference="<?=$nomor_dokumen?>" class="btn-rab-edit"><?=$rab->uraian?></a></td>
                        <td><?=$rab->volume?></td>
                        <td><?=$rab->satuan?></td>
                        <td><?=number_format($rab->harga)?></td>
                        <td><a href="/kelembagaan/delete_rab/pencairan/<?=$nomor_dokumen?>/<?=$rab->kode_data?>" class="grey-text"><i class="material-icons left">delete</i></a></td>
                      </tr>
                      <?php } ?>
                    <?php }else { ?>
                      <tr>
                        <td colspan="5">
                          <div class="row center grey-text">
                            <i class="material-icons">find_in_page</i>
                            <h6 class="light">Belum ada data.</h6>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php if(isset($total)){ ?>
            <div class="row">
              <div class="section col s12">
                <p>Jumlah keseluruhan</p>
                <h3 class="light">Rp. <?=number_format($total)?></h3>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- TAB 2 End -->
    </div>
</main>
