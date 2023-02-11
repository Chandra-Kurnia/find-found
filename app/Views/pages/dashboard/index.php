<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle">
                    <img src="/images/electronic.png" alt="..." width="200px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Elektronik</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle">
                    <img src="/images/wallet.png" alt="..." width="200px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Dompet</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle">
                    <img src="/images/suitcases.png" alt="..." width="200px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Tas/totebag/koper</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle">
                    <img src="/images/more.png" alt="..." width="200px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Lain - lain</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
    <?= $this->endSection() ?>