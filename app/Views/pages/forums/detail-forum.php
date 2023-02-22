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
                <div class="col-lg-8 col-md-10 mx-auto py-3">
                    <div class="chat-box py-3">
                        <div class="message-box">
                            <div class="message-sender d-flex">
                                <div class="sender-image" style="margin-right: 10px;">
                                    <img src="/images/user.png" class="rounded-circle" width="45px">
                                </div>
                                <div class="sender-info">
                                    <p class="sender-name mb-0" style="font-weight: 600">Useraaa1</p>
                                    <p class="sent-time mb-0" style="font-size: small; color:grey;">12:30 PM</p>
                                </div>
                            </div>
                            <div class="message-content">
                                <p style="margin-bottom: 0;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim perspiciatis animi labore temporibus dolores impedit maxime placeat eius culpa molestias voluptas, dolore assumenda. Iusto delectus quidem doloremque, quisquam hic aut?</p>
                                <div class="mt-0">
                                    <!-- <a href="" style="color:grey;">edit</a>
                                    <a href="" style="color:grey;">hapus</a> -->
                                    <button class="btn-control-comment">Edit</button>
                                    <button class="btn-control-comment">Hapus</button>
                                    <button class="btn-control-comment">Report</button>
                                </div>
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