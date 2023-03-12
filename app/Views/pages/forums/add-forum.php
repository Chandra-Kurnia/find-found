<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<!-- <div class="container d-flex justify-content-center align-items-center rounded-circle mt-5">
    <div class="bg-white border rounded-5" style="width: 80%; padding: 15px">
        <h3>Buat Forum</h3>
        <form>
            <div class="form-group mb-3">
                <label for="exampleFormControlSelect1">Pilih Label</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Dicari</option>
                    <option>Ditemukan</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlSelect1">Pilih Kategori</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Elektronik</option>
                    <option>Dompet</option>
                    <option>Tas/totebag/koper</option>
                    <option>Lain - lain</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Nama Forum</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Forum">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Deskrpsi Dari Barang"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlFile1">Foto Barang</label>
                <input multiple type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlInput1">Lokasi Ditemukan / Lokasi Hilang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Lokasi barang">
            </div>
            <div class="form-group mb-3 mt-5">
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div> -->

<!-- new add -->
<div class="container py-3">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="card mb-4 shadow-lg">
                <div class="card-body">
                    <?php if (session()->getFlashdata('err-add-forums')) : ?>
                        <div class="alert alert-danger mt-3 text-left">
                            <?= session()->getFlashdata('err-add-forums') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/add-forum" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <h2>Tambah Forum</h2>
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
                                            <option value="<?= $statues['status_id'] ?>"><?= $statues['status_name'] ?></option>
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
                                            <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
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
                                    <input type="text" class="form-control" placeholder="Nama Forum" name="title" required>
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
                                    <textarea class="form-control" rows="3" placeholder="Deskripsi Forum" required name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Foto barang / forum</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- <div class="form-group">
                                    <input multiple type="file" id="gambar-forum" name="images[]" class="form-control" required>
                                </div> -->
                                <div class="drop-zone" onclick="handleFileSelect(event)" ondragover="handleDragOver(event)" ondrop="handleFileSelect(event)">
                                    <p>Click atau drag and drop gambar</p>
                                </div>
                                <div class="row mt-3" id="preview-gambar-forum">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <p class="mb-0">Lokasi (Latitude - Longitude)</p>
                            </div>
                            <div class="col-9">
                                <input type="hidden" name="latitude" id="input-latitude">
                                <input type="hidden" name="longitude" id="input-longitude">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Latitude" disabled id="view-latitude">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Longitude" disabled id="view-longitude">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="map" style="height: 300px;"></div>
                        <div class="d-flex w-100 justify-content-end mt-3">
                            <button class="btn btn-primary" type="submit">Simpan Forum</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let previewImagesContainer = document.getElementById("preview-gambar-forum");

    function handleFileSelect(event) {
        console.log(event);
        event.stopPropagation();
        event.preventDefault();
        let files = event.dataTransfer ? event.dataTransfer.files : event.target.files;

        for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();

            reader.onload = function(event) {
                let img = document.createElement("img");
                img.className = "preview-image";
                img.src = event.target.result;
                previewImagesContainer.appendChild(img);
            };

            reader.readAsDataURL(files[i]);
        }
    }

    function handleDragOver(event) {
        event.stopPropagation();
        event.preventDefault();
        event.dataTransfer.dropEffect = "copy";
    }

    function previewImages() {

        for (let i = 0; i < files.length; i++) {
            let reader = new FileReader();

            reader.onload = function(event) {
                let img = document.createElement("img");
                img.className = "preview-image";
                img.src = event.target.result;
                previewImagesContainer.appendChild(img);
            };

            reader.readAsDataURL(files[i]);
        }
    }
</script>
<?= $this->endSection() ?>