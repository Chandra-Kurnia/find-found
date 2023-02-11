<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card card-category" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle p-5">
                    <img src="/images/electronic.png" alt="..." width="150px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Elektronik</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/forums/elektronik" class="btn btn-primary w-75">Select</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-category" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle p-5">
                    <img src="/images/wallet.png" alt="..." width="150px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Dompet</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/forums/dompet" class="btn btn-primary w-75">Select</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-category" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle p-5">
                    <img src="/images/suitcases.png" alt="..." width="150px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Tas / Totebag / Koper</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/forums/totebag" class="btn btn-primary w-75">Select</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-category" style="width: 18rem;">
                <div class="container d-flex justify-content-center align-items-center rounded-circle p-5">
                    <img src="/images/more.png" alt="..." width="150px">
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Lain - Lain</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/forums/more" class="btn btn-primary w-75">Select</a>
                </div>
            </div>
        </div>
        <div>
        </div>
    </div>
    <?= $this->endSection() ?>