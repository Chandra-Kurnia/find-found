<?= $this->extend('layout/auth') ?>

<?= $this->section('auth-content') ?>

<!-- <div class="text-center pb-4">
    <h5 class="card-title">Register</h5>
</div> -->
<?php if (session()->getFlashdata('err-auth')) : ?>
    <div class="alert alert-danger pt-4" role="alert">
        <?= session()->getFlashdata('err-auth') ?>
    </div>
<?php endif; ?>
<form method="post" action="/register">
    <?= csrf_field() ?>
    <div class="mb-3">
        <input type="input" class="form-control auth-input" placeholder="Name" name="name" value="<?= old('name') ?>" required>
    </div>
    <div class="mb-3">
        <input type="email" class="form-control auth-input" placeholder="Email" name="email" value="<?= old('email') ?>" required>
    </div>
    <div class="mb-3">
        <input type="input" class="form-control auth-input" placeholder="Username" name="username" value="<?= old('username') ?>" required>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control auth-input" placeholder="Password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100 btn-auth">Register</button>
    <div class=" text-center pt-3">
        <span>Already have account ? <a href="/login">Login</a></span>
    </div>
</form>

<?= $this->endSection() ?>