<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>

<div class="container mt-5">
  <a href="/add-forum" class="btn btn-primary mb-3">Tambah Forum</a>
  <?php if (count($forums) > 0) : ?>
    <?php foreach ($forums as $forum) : ?>
      <div class="card mb-3" style="border-radius: 15px;">
        <div class="card-body p-4">
          <div class="row">
            <div class="col-2 d-flex justify-content-center">
              <img src="/images/wallet.png" alt="avatar" class="img-fluid">
            </div>
            <div class="col-10">
              <div class="d-flex justify-content-between">
                <h3 class="mb-3"><?= $forum['title'] ?></h3>
                <span class="badge bg-success h-100"><?= strtoupper($forum['status_name']) ?></span>
              </div>
              <p class="small mb-0">Dibuat oleh <strong><?= $forum['username'] ?></strong> pada <?= date('d F, Y', strtotime($forum['created_at'])) ?> Pukul <?= date('H:i', strtotime($forum['created_at'])) ?></p>
              <hr class="my-4">
              <div class="d-flex justify-content-start align-items-center">
                <a href="/detail-forum/<?= $forum['forum_id'] ?>" class="btn btn-primary" style="margin-right: 5px;">Menuju forum</a>
                <?php if (session()->get('role_name') == 'admin') : ?>
                  <a href="/edit-forum/<?= $forum['forum_id'] ?>" class="btn btn-warning" style="margin-right: 5px;">Edit forum</a>
                  <a href="#" class="btn btn-danger">Hapus forum</a>
                <?php endif; ?>
                <span class="ms-3 me-4">|</span>
                <span>
                  <?= $forum['description'] ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else : ?>
    <div class="row">
      <div class="col">
        <nav class="bg-light rounded-3 p-3 mb-4">
          <div>
            Forums Untuk Kategori "<?= $category['category_name'] ?>" Tidak Ditemukan
          </div>
        </nav>
      </div>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>