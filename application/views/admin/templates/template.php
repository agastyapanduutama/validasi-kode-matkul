<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Bingkaikodeku</title>
    <meta name="baseUrl" content="<?= base_url() ?>">
    <meta name="menu" content="<?= (isset($menu)) ? $menu : null ?>">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/perfect-scrollbar.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/widgets/chat.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/assets/images/favicon.svg" type="image/x-icon">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->
    <!-- Summernote -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/summernote-bs4.min.css"> -->
</head>

<body>
    <div id="app">
        <?php include('sidebar.php') ?>
        <div id="main" class="">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="fas fa-bars"></i>
                </a>
            </header>       

            <div class="main-panel">
                <div class="col-12 col-md-12 order-md-1 order-last">
                    <h5><?= $title ?></h5>
                </div>
                <div class="content">
                    <div class="page-inner">
                        <?php $this->load->view($konten) ?>
                    </div>
                </div>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?= date('Y') ?> &copy; Bingkaikodeku</p>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/admin//assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url() ?>assets/admin//assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/admin//assets/js/core/bootstrap.min.js"></script>

    <!-- <script src="<?= base_url() ?>assets/admin/assets/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?= base_url() ?>assets/admin/assets/js/mazer.js"></script>



    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>assets/admin/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/datatable/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/datatable/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/datatable/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script src="<?= base_url() ?>assets/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/apexcharts.js"></script>

    <script>
        $(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imgView').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#gambar").change(function() {
                readURL(this);
            });
        });
    </script>

    <script>
        $('#summernote').summernote({
            height: "300px",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        <?php if ($this->uri->segment(2) == "donasi") {
            $upload =  base_url('admin/donasi/upload/image');
            $delete =  base_url('admin/donasi/delete/image');
        } else {
            $upload =  base_url('admin/berita/upload/image');
            $delete =  base_url('admin/berita/delete/image');
        }
        ?>

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?= $upload ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?= $delete ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }

         $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable()
            $('#example3').DataTable()
            $('#example4').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        });
    </script>

    
    <?php if(isset($kunjungan)):?>
    <script>
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled:false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity:1
            },
            plotOptions: {
            },
            series: [{
                name: 'Kunjungan',
                data: [
                    <?php foreach ($kunjungan as $k):?>
                        <?= $k->jumlah?>,
                    <?php endforeach?>
                ]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: [
                    <?php foreach ($kunjungan as $k):?>
                        "<?= $this->req->getBulan($k->bulan)?>",
                    <?php endforeach?>
                ],
            },
        }
        


        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);

        chartProfileVisit.render();
    </script>
    <?php endif?>

    <script src="<?= base_url() ?>assets/admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <script src="<?= base_url('assets/js/page/admin.js') ?>"></script>
    <?= (isset($script)) ? "<script src='" . base_url() . "assets/js/page/" . $script . ".js'></script>" : '' ?>
</body>

</html>