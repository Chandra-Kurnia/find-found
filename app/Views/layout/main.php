<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/dist/css/dropify.css" rel="stylesheet">
    <link href="/dist/fonts/dropify.woff" rel="stylesheet">

    <title>Find & Found</title>
</head>

<body>
    <?= $this->renderSection('main-content') ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script script src="https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="/dist/js/dropify.js"></script>
    <script src="/js/main.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"></script>
    <script>
        $(document).ready(function() {
            // Pilih gambar update
            $('#add-image-forum').change(async (e) => {
                try {
                    for (let i = 0; i < e.target.files.length; i++) {
                        // Upload file satu per satu
                        let file = e.target.files[i];
                        let forumId = $('#forum_id').val();
                        const formData = new FormData();
                        formData.append('file', file);
                        formData.append('forum_id', forumId);

                        const resp = await fetch('/upload-image', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Access-Control-Allow-Origin': '*'
                            }
                        });

                        const respJson = await resp.json();

                        let reader = new FileReader();

                        // Menampilkan gambar saat sudah terbaca
                        reader.onload = function(e) {
                            $('#preview-gambar-forum').append(`
                                <div class="col-4 img-forum-container" id="${respJson.idImage}">
                                    <div class="control-forum-container">
                                        <span class="btn btn-primary button-control-forum-image" data-bs-toggle="modal" data-bs-target="#preview-modal-${respJson.idImage}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </span>
                                        <span class="btn btn-danger button-control-forum-image" data-bs-toggle="modal" data-bs-target="#modal-delete-${respJson.idImage}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <img src="${e.target.result}" class="img-thumbnail">
                                </div>

                                <!-- Modal Delete -->
                                <div class="modal fade" id="modal-delete-${respJson.idImage}" tabindex="-1" aria-labelledby="modal-label-${respJson.idImage}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-label-${respJson.idImage}">Delete gambar</h5>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda ingin menghapus gambar ini ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger" onclick="handleDeleteImage(${respJson.idImage})">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Preview -->
                                <div class="modal fade" id="preview-modal-${respJson.idImage}" tabindex="-1" aria-labelledby="previewModal${respJson.idImage}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="previewModal${respJson.idImage}">Preview Image</h5>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="${e.target.result}" alt="${e.target.result}" class="img-thumbnail" id="${respJson.idImage}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }

                        reader.readAsDataURL(file);
                    }
                } catch (err) {
                    console.log(err);
                }
            })

            $('#dropify').dropify();
        });
    </script>
</body>

</html>