<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container d-flex justify-content-center align-items-center rounded-circle mt-5">
    <div class="bg-white border rounded-5" style="width: 80%; padding: 15px">

        <div class="card" style="width: 100%;">
            <div class="d-flex justify-content-center align-items-center rounded-circle">
                <img src="/images/wallet.png" alt="..." width="180px">
            </div>

            <div class="card-body">
                <h5 class="card-title">Nama Barang</h5>
                <p class="card-text">
                    Deskripsi barang
                    Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>

        <div class="card" style="width: 100%;">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="chat-box">
                        <div class="message-box">
                            <div class="message-sender d-flex">
                                <div class="sender-image">
                                    <img src="https://via.placeholder.com/40x40" class="rounded-circle">
                                </div>
                                <div class="sender-info">
                                    <p class="sender-name mb-0">User1</p>
                                    <p class="sent-time mb-0">12:30 PM</p>
                                </div>
                            </div>
                            <div class="message-content">
                                <p>ini kan barang yang hilang</p>
                            </div>
                        </div>
                        <div class="message-box">
                            <div class="message-sender d-flex">
                                <div class="sender-image">
                                    <img src="https://via.placeholder.com/40x40" class="rounded-circle">
                                </div>
                                <div class="sender-info">
                                    <p class="sender-name mb-0">User2</p>
                                    <p class="sent-time mb-0">12:31 PM</p>
                                </div>
                            </div>
                            <div class="message-content">
                                <p>Iya ini barangnya hilang</p>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Write your message here">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>