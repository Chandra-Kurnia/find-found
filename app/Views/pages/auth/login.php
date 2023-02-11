<?= $this->extend('layout/auth') ?>

<?= $this->section('auth-content') ?>

<!-- <div class="text-center pb-4">
    <h5 class="card-title">Welcome Back</h5>
    <p class="font-weight-light">Please Login</p>
</div> -->
<?php if (session()->getFlashdata('err-auth')) : ?>
    <div class="alert alert-danger pt-4" role="alert">
        <?= session()->getFlashdata('err-auth') ?>
    </div>
<?php endif; ?>
<form method="post" action="/login">
    <?= csrf_field() ?>
    <div class="mb-3">
        <input type="username" class="form-control auth-input" placeholder="Username" name="username" value="<?= old('username') ?>">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control auth-input" placeholder="Password" name="password">
    </div>
    <button type="submit" class="btn btn-primary w-100 btn-auth">Login</button> 
    <div class=" text-center pt-3">
        <span>Dont have account ? <a href="/register">Register</a></span>
    </div>
</form>
<!-- <div class="text-center pt-5 d-flex flex-column">
    <a href="">Forgot Password?</a>
    <a href="">Create Account</a>
</div> -->

<?= $this->endSection() ?>