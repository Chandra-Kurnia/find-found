<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>

<div class="container mt-5">
  <a href="/add-forum" class="btn btn-primary mb-3">Tambah Forum</a>
  <div class="row">
    <div class="col-24">
      <div class="card mb-3 py-4" style="width: 100%;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="container d-flex justify-content-center align-items-center rounded-circle">
              <img src="/images/wallet.png" alt="..." width="180px">
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Ditemukan - Dompet Coklat</h5>
              <p class="card-text">lokasi di temukan dan ciri - ciri barang yang ditemukan.</p>
              <p class="card-text"><small class="text-muted">Tanggal pertama kali pos</small></p>
              <a href="/detail-forum" class="btn btn-primary">menuju forum</a>
              <?php if (session()->get('role_name') == 'admin') : ?>
                <a href="#" class="btn btn-warning">edit forum</a>
                <a href="#" class="btn btn-danger">hapus forum</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="rounded-circle m-5 fixed-bottom mr-2 mb-2 shadow-lg">
      <a href="/add-forum" class="btn-lg btn-success rounded-circle position-fixed border-0" style="bottom: 100px; right: 50px;">
        +
      </a>
  </div> -->
</div>

<?= $this->endSection() ?>