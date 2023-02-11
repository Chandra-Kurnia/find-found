<?= $this->extend('layout/main') ?>

<?= $this->section('main-content') ?>
<div class="dashboard-layout">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-center align-items-center" href="/">
                <img src="/images/find-logo.png" alt="logo" class="d-inline-block align-text-top logo-dashboard">
                <span>Find and Found</span>
            </a>
            <div class="d-flex">
                <a class="nav-link link-navigate active" href="/">Home</a>
                <a class="nav-link link-navigate" href="">Find Stuff</a>
                <a class="nav-link link-navigate" href="">Maps</a>
                <a class="nav-link link-navigate" href="" tabindex="-1" aria-disabled="true">Profile</a>
                <a href="/login" class="btn btn-outline-primary btn-nav">Login</a>
            </div>
        </div>
    </nav>
    <!-- <div class="filter">
        <div class="container d-flex justify-content-between">
            <div class="input-group" style="width: 20%;">
                <select class="form-select filter-select">
                    <option selected>Select Category</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="input-group" style="width: 79%;">
                <input type="text" class="form-control filter-search" placeholder="Search...">
                <button class="btn btn-outline-secondary btn-search">Search</button>
            </div>
        </div>
    </div> -->
    <?= $this->renderSection('dashboard-content') ?>
</div>
<?= $this->endSection() ?>