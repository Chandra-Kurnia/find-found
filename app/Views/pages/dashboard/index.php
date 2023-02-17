<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container mt-5">
    <div class="row">
        <?php if (isset($categories)) : ?>
            <?php foreach ($categories as $category) : ?>
                <div class="col">
                    <div class="card card-category" style="width: 18rem;">
                        <div class="container d-flex justify-content-center align-items-center rounded-circle p-5">
                            <img src="<?= $category['photo'] ?>" alt="..." width="150px">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $category['category_name'] ?></h5>
                            <p class="card-text"><?= $category['description'] ?></p>
                            <a href="/forums/<?= $category['category_id'] ?>" class="btn btn-primary w-75">Select</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?= $this->endSection() ?>