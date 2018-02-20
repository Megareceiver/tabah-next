<main>
    <div class="row">
      <!-- TAB 1 -->
      <div class="col s12 m12 l4">
        <div class="section">
          <h4 class="light">Persyaratan Pencairan</h4>
          <p>Anda perlu mempersiapkan berkas untuk diupload berdasarkan persyaratan yang dibutuhkan.</p>

          <ul class="collapsible" data-collapsible="accordion">
            <li>
              <div class="collapsible-header">Proposal (.pdf)<span class="new badge red" data-badge-caption="belum"></span></div>
              <div class="collapsible-body white">
                <p>Upload berkas anda disini (.pdf).</p>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Berkas</span>
                    <input type="file" accept="application/pdf">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="collapsible-header">Surat Permohonan (.pdf)<span class="new badge red" data-badge-caption="belum"></span></div>
              <div class="collapsible-body white">
                <p>Upload berkas anda disini (.pdf).</p>
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Berkas</span>
                    <input type="file" accept="application/pdf">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- TAB 1 End -->

      <!-- TAB 2 -->
      <div class="col s12 m12 l8">
        <div class="card">
          <div class="card-content">
            <span class="card-title">RAB Pencairan</span>
            <p>Rencana Anggaran Biaya.</p>
            <div class="row">
              <form>
                <div class="row">
                  <div class="input-field col s6 l3">
                    <input id="deskripsi-rab" type="text" class="validate" required>
                    <label for="deskripsi-rab">Uraian</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="volume-rab" type="number" class="validate number" required>
                    <label for="volume-rab">Volume</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="satuan-rab" type="text" class="validate" required>
                    <label for="satuan-rab">Satuan</label>
                  </div>
                  <div class="input-field col s6 l3">
                    <input id="harga-rab" type="text" class="validate currency" required>
                    <label for="harga-rab">Harga</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <button type="submit" class="btn blue darken-2 waves-effect waves-light">Masukan</button>
                    <button type="button" class="btn red waves-effect waves-light">Hapus</button>
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
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td><a href="#">Alvin</a></td>
                      <td>Eclair</td>
                      <td>$0.87</td>
                      <td>$0.87</td>
                    </tr>
                    <tr>
                      <td><a href="#">Alan</a></td>
                      <td>Jellybean</td>
                      <td>$3.76</td>
                      <td>$3.76</td>
                    </tr>
                    <tr>
                      <td><a href="#">Jonathan</a></td>
                      <td>Lollipop</td>
                      <td>$7.00</td>
                      <td>$7.00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- TAB 2 End -->
    </div>
</main>
