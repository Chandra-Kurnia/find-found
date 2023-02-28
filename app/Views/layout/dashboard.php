<?= $this->extend('layout/main') ?>

<?= $this->section('main-content') ?>
<div class="dashboard-layout mt-5 pt-3">
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-center align-items-center" href="/">
                <img src="/images/find-logo.png" alt="logo" class="d-inline-block align-text-top logo-dashboard">
                <span>Find and Found</span>
            </a>
            <div class="d-flex">
                <!-- <a class="nav-link link-navigate active" href="/">Home</a>
                <a class="nav-link link-navigate" href="">Find Stuff</a>
                <a class="nav-link link-navigate" href="">Maps</a>
                <a class="nav-link link-navigate" href="" tabindex="-1" aria-disabled="true">Profile</a> -->
                <?php if (!session()->get('IS_LOGIN')) : ?>
                    <a href="/login" class="btn btn-outline-primary btn-nav">Login</a>
                <?php else : ?>
                    <form action="/logout" method="post">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="dropdown">
                                <!-- <button class="btn btn-secondary d-flex" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                                </button> -->
                                <div style="width: 30px; height: 30px; cursor:pointer" id="dropdownProfile" data-bs-toggle="dropdown">
                                    <img src="<?= session()->get('profile_photo') ?>" class=" w-100 h-100 rounded-circle">
                                </div>
                                <ul class="dropdown-menu" aria-labelledby="dropdownProfile">
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    <li>
                                        <!-- <a class="dropdown-item" href="#">Logout</a> -->
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('dashboard-content') ?>
</div>
<?= $this->endSection() ?>