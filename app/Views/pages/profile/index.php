<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<section>
    <div class="container py-3">
        <form action="/update-profile" method="post" enctype="multipart/form-data">
            <div class="row">
                <?= csrf_field() ?>
                <div class="col-lg-4">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-body text-center">
                            <img src="<?= session()->get('profile_photo') ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <!-- <input type="file" class="dropify" id="dropify" data-default-file="" name="profile_photo" required> -->
                            <h5 class="my-3"><?= session()->get('username') ?></h5>
                            <p class="text-muted">Welcome <?= session()->get('username') ?>, you are <?= session()->get('role_name') ?></p>
                            <p class="text-muted mb-4">Hello <?= session()->get('username') ?>, you can edit your profile here. Please be wise in using your username and profile photo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-body">

                            <h2>My Profile</h2>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Username</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="input-profile" value="<?= session()->get('username') ?>" name="username">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="input-profile" value="<?= session()->get('name') ?>" name="name">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex w-100 justify-content-end">
                                <button class="btn btn-primary" type="submit">Save Profile</button>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-4 shadow-lg">
                        <div class="card-body">
                            <h2>My Forums</h2>
                            <hr>
                            <div class="row">

                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>