<?= $this->extend('layout/dashboard') ?>

<?= $this->section('dashboard-content') ?>
<div class="container d-flex justify-content-center align-items-center rounded-circle mt-5">
    <div class="bg-white border rounded-5" style="width: 80%; padding: 15px">

        <div class="card w-100">
            <div class="d-flex justify-content-between pt-3 px-3">
                <p class="small mb-0">Dibuat oleh <strong><?= $forum['username'] ?></strong> pada <?= date('d F, Y', strtotime($forum['created_at'])) ?> Pukul <?= date('H:i', strtotime($forum['created_at'])) ?></p>
                <div class="d-flex justify-content-end align-items-center">
                    <?php if ($forum['user_id'] == session()->get('user_id') || session()->get('role_name') == 'admin') : ?>
                        <?php if ($forum['status_name'] != 'Ditutup') : ?>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasi-tutup-forum">Tutup Forum</button>
                        <?php endif; ?>
                    <?php endif; ?>
                    <span class="badge bg-success h-100 d-flex align-items-center" style="font-size: 15px; margin-left: 3px;"><?= strtoupper($forum['status_name']) ?></span>
                    <!-- Modal konfirmasi tutup forum -->
                    <div id="konfirmasi-tutup-forum" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Konten modal-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Tutup Forum ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Anda yakin ingin menutup forum ini ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                    <form action="/close-forum/<?= $forum['forum_id'] ?>" method="post">
                                        <button type="submit" class="btn btn-danger">Tutup</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-start pt-3 px-3">
                <?php foreach ($photos as $photo) : ?>
                    <div class="col-4 d-flex justify-content-center mt-1">
                        <img data-bs-toggle="modal" data-bs-target="#modalImage-<?= $photo['photo_id'] ?>" src="<?= $photo['path'] ?>" alt="img-forums" width="100%" style="cursor: pointer;">
                    </div>
                    <div class="modal fade" id="modalImage-<?= $photo['photo_id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Preview Image</h5>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= $photo['path'] ?>" alt="img" style="width: 100%">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="card-body">
                <h5 class="card-title"><?= $forum['title'] ?></h5>
                <p class="card-text"><?= $forum['description'] ?></p>
            </div>
        </div>

        <div class="card" style="width: 100%;">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto py-3">

                    <?php if ($forum['status_name'] != 'Ditutup') : ?>
                        <form action="/post-comment/<?= $forum['forum_id'] ?>" method="post" style="width: 100%;">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Berkomentar ..." name="comment">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    <?php else : ?>
                        <div class="alert alert-info text-center" role="alert">
                            Forum ini telah ditutup.
                        </div>
                    <?php endif; ?>

                    <?php if (count($comments) > 0) : ?>
                        <?php foreach ($comments as $comment) : ?>
                            <div class="chat-box py-3">
                                <div class="message-box">
                                    <div class="message-sender d-flex">
                                        <div class="sender-image" style="margin-right: 10px;">
                                            <img src="<?= $comment['profile_photo'] ?>" class="rounded-circle" width="45px">
                                        </div>
                                        <div class="sender-info">
                                            <p class="sender-name mb-0" style="font-weight: 600"><?= $comment['username'] ?></p>
                                            <p class="sent-time mb-0" style="font-size: small; color:grey;"><?= date('H:i', strtotime($comment['created_at'])) ?></p>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        <p style="margin-bottom: 0;"><?= $comment['comment'] ?></p>
                                        <div class="mt-0">
                                            <?php if (session()->get('role_name') == 'admin') : ?>
                                                <button class="btn-control-comment">Edit</button>
                                                <button class="btn-control-comment" data-bs-toggle="modal" data-bs-target="#konfirmasi-hapus-<?= $comment['comment_id'] ?>">Hapus</button>
                                            <?php elseif (session()->get('user_id') == $comment['user_id']) : ?>
                                                <button class="btn-control-comment">Edit</button>
                                                <button class="btn-control-comment" data-bs-toggle="modal" data-bs-target="#konfirmasi-hapus-<?= $comment['comment_id'] ?>">Hapus</button>
                                            <?php else : ?>
                                                <button class="btn-control-comment">Report</button>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Modal konfirmasi hapus komen -->
                                        <div id="konfirmasi-hapus-<?= $comment['comment_id'] ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Konten modal-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus komen ?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus komentar ini ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                                        <form action="/delete-comment/<?= $comment['comment_id'] ?>/<?= $forum['forum_id'] ?>" method="post">
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-info text-center" role="alert">
                            Tidak ada komentar saat ini.
                        </div>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>