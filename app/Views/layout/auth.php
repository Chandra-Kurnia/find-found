<?= $this->extend('layout/main') ?>

<?= $this->section('main-content') ?>

<div class="container-fluid w-100 d-flex justify-content-center align-items-center auth-container bg-primary">
    <div class="card w-25 card-auth" style="width: 18rem;">
        <div class="card-body">
            <?= $this->renderSection('auth-content') ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>