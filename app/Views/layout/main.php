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
            // Event ketika input file dipilih
            $('#gambar-forum').change(function(e) {
                // Menghapus semua gambar yang sudah ditampilkan
                $('#preview-gambar-forum').empty();

                // Looping gambar yang dipilih
                for (let i = 0; i < e.target.files.length; i++) {
                    let file = e.target.files[i];
                    let reader = new FileReader();

                    // Menampilkan gambar saat sudah terbaca
                    reader.onload = function(e) {
                        $('#preview-gambar-forum').append(`
                            <div class="col-4">
                            <img src="${e.target.result}" class="img-thumbnail">
                            </div>
                        `);
                    }

                    reader.readAsDataURL(file);
                }
            });

            $('#dropify').dropify();
        });
    </script>
</body>

</html>