<?= $this->extend('layout/auth') ?>

<?= $this->section('auth-content') ?>

<div class="text-center pb-4">
    <h5 class="card-title">Register</h5>
    <!-- <p class="font-weight-light">Please Login</p> -->
</div>
<?php if (session()->getFlashdata('err-auth')) : ?>
    <div class="alert alert-danger pt-4" role="alert">
        <?= session()->getFlashdata('err-auth') ?>
    </div>
<?php endif; ?>
<form method="post" action="/login">
    <?= csrf_field() ?>
    <div class="mb-3">
        <input type="input" class="form-control auth-input" placeholder="Name" name="name" value="<?= old('name') ?>">
    </div>
    <div class="mb-3">
        <input type="email" class="form-control auth-input" placeholder="Email" name="email" value="<?= old('email') ?>">
    </div>
    <div class="mb-3">
        <input type="input" class="form-control auth-input" placeholder="Username" name="username" value="<?= old('username') ?>">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control auth-input" placeholder="Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary w-100 btn-auth">Register</button>
    <!-- <a href="/login" class="btn btn-success w-100 btn-auth mt-1 d-flex align-items-center justify-content-center">
        <span>Login</span>
    </a> -->
    <div class=" text-center pt-3">
        <span>Already have account ? <a href="/login">Login</a></span>
    </div>
</form>
<!-- <div class="text-center pt-5 d-flex flex-column">
    <a href="">Forgot Password?</a>
    <a href="">Create Account</a>
</div> -->

<?= $this->endSection() ?>