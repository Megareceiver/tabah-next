<main>
  <div class="container">
    <div class="row">

      <!-- TAB 1 -->
      <div id="deskripsi" class="col s12 m6 offset-m3 l6 offset-l3">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Proposal</span>
            <p>Harap diperhatikan bahwa semua komponen wajib diisi.</p>
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="judul" type="text" class="validate" required>
                    <label for="judul">Judul Proposal</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <textarea id="textarea" class="materialize-textarea" required></textarea>
                    <label for="textarea">Latar Belakang</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="nominal" terbilang-name="nominal_terbilang" type="text" class="validate" required>
                    <label for="nominal">Nominal</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <p><blockquote><i name="nominal_terbilang"></i></blockquote></p>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button type="submit" class="btn blue darken-2">Kirim Proposal</button>
                    <button type="reset" class="btn red">Batal</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- TAB 1 End -->

      <!-- TAB 2 -->
      <div id="rab" class="col s12 m6 offset-m3 l6 offset-l3">
        <div class="card">
          <div class="card-content">
            <span class="card-title">RAB</span>
            <p>Rencana Anggaran Biaya.</p>
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="deskripsi-rab" type="text" class="validate" required>
                    <label for="deskripsi-rab">Uraian</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s6">
                    <input id="volume-rab" type="number" class="validate number" required>
                    <label for="volume-rab">Volume</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="satuan-rab" type="text" class="validate" required>
                    <label for="satuan-rab">Satuan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="harga-rab" type="text" class="validate currency" required>
                    <label for="harga-rab">Harga</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button type="submit" class="btn blue darken-2">Kirim Proposal</button>
                    <button type="reset" class="btn red">Batal</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- TAB 2 End -->

      <!-- TAB 3 -->
      <div id="persyaratan" class="col s12 m10 offset-m1">
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
