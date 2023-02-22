<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container d-flex justify-content-center align-items-center rounded-circle mt-5">
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
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Deskrpsi Dari Barang"></textarea>
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
</div>

<?= $this->endSection() ?>