<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container py-3">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card mb-4 shadow-lg">
                <div class="card-body">
                    <?php if (session()->getFlashdata('err-update-forums')) : ?>
                        <div class="alert alert-danger mt-3 text-left">
                            <?= session()->getFlashdata('err-update-forums') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/update-forum/<?= $forum['forum_id'] ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <h2>Update Forum</h2>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 m-auto">
                                <p class="mb-0">Label</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" name="status" required>
                                        <option>-- Pilih Label --</option>
                                        <?php foreach ($statuses as $statues) : ?>
                                            <option value="<?= $statues['status_id'] ?>" <?= $statues['status_id'] == $forum['status_id'] ? "selected" : "" ?>><?= $statues['status_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 m-auto">
                                <p class="mb-0">Kategori</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <select class="form-control" name="category" required>
                                        <option>-- Pilih Kategori --</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['category_id'] ?>" <?= $category['category_id'] == $forum['category_id'] ? "selected" : "" ?>><?= $category['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 m-auto">
                                <p class="mb-0">Nama Forum</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nama Forum" name="title" value="<?= $forum['title'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Deskripsi Forum</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" placeholder="Deskripsi Forum" required name="description"><?= $forum['description'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Foto barang / forum</p>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <input multiple type="file" id="gambar-forum" name="images[]" class="form-control">
                                </div>
                                <div class="row mt-3" id="preview-gambar-forum">
                                    <?php foreach ($photos as $photo) : ?>
                                        <div class="col-4">
                                            <img src="<?= $photo['path'] ?>" alt="<?= $photo['path'] ?>" class="img-thumbnail">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Lokasi (Latitude - Longitude)</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="hidden" name="latitude" id="input-latitude" value="<?= $forum['latitude'] ?>">
                                <input type="hidden" name="longitude" id="input-longitude" value="<?= $forum['longitude'] ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Latitude" disabled id="latitude-detail" value="<?= $forum['latitude'] ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Longitude" disabled id="longitude-detail" value="<?= $forum['longitude'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" name="" id="forum-edit" value="edit">
                        <div id="map" style="height: 300px;"></div>
                        <div class="d-flex w-100 justify-content-end mt-3">
                            <button class="btn btn-primary" type="submit">Update Forum</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>