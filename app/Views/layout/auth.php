<?= $this->extend('layout/main') ?>

<?= $this->section('main-content') ?>

<div class="container-fluid w-100 d-flex justify-content-center align-items-center auth-container">
    <div class="card w-25 card-auth shadow-lg d-flex pt-4 pb-4" style="width: 18rem;">
        <div class="container d-flex justify-content-center align-items-center">
            <img src="/images/find-logo.png" class="logo-auth">
        </div>
        <div class="card-body">
            <?= $this->renderSection('auth-content') ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>