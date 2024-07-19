<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Krisis Energi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
</head>

<body>
    <div class="row flex justify-content-center m-0 bg-dark-subtle">
        <div class="col-lg-6 col-sm-6 shadow py-3 px-4 bg-dark">
            <div style="position: relative; background-image: url(img/bg-header.jpg); background-size: cover; background-position-y: 60%; border-radius: 11px;">
                <div class="text-center mb-3 pb-2">
                    <div style="position: absolute; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.7); width: 100%; height: 100%; border-radius: 11px;"></div>
                    <div style="position: relative;" class="text-center">
                        <h1 class="fw-bold pt-3 text-light">Pusat Informasi Krisis Energi</h1>
                        <p class="mb-1 text-light">Husni Aripin | 2206700012</p>
                        <div class="w-100 d-flex justify-content-center gap-3">
                            <a href="https://www.instagram.com/husni.arfn/" target="_blank" class="text-decoration-none fw-bold text-primary fs-5"><i class="bi bi-instagram"></i></a>
                            <a href="https://github.com/Arfn-18" target="_blank" class="text-decoration-none fw-bold text-primary fs-5"><i class="bi bi-github"></i></a>
                            <a href="https://www.linkedin.com/in/husni-aripin-65714b261/" target="_blank" class="text-decoration-none fw-bold text-primary fs-5"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top py-4">
                <p class="mb-2" style="text-align: justify;">Krisis energi adalah situasi di mana pasokan energi tidak mencukupi untuk memenuhi permintaan yang ada, yang dapat disebabkan oleh berbagai faktor seperti keterbatasan sumber daya alam, gangguan produksi, kebijakan politik, atau bencana alam. Krisis ini dapat menyebabkan peningkatan harga energi, pemadaman listrik, dan dampak negatif pada ekonomi serta kehidupan sehari-hari masyarakat.</p>
                <a href="#" class="text-decoration-none fw-bold text-primary">Selengkapnya</a>
            </div>

            <!-- data table -->
            <div class="border-top py-4" id="dataTable">
                <h3 class="fw-bold mb-3">Table Data</h3>
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" style="cursor: pointer;">
                            <li class="nav-item">
                                <a class="nav-link" id="negara" onclick="loadPage('negara')">Negara</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sumber_energi" onclick="loadPage('sumber_energi')">Sumber</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="krisis_energi" onclick="loadPage('krisis_energi')">Krisis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="view_keputusan" onclick="loadPage('view_keputusan')">View</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div id="pageContent"></div>

                        <!-- <?php include $page; ?> -->
                    </div>
                </div>
            </div>

            <!-- <div class="border-top py-4" id="rataRata">
                <h3 class="fw-bold">Data View Keputusan</h3>
                <?php include 'view_keputusan.php'; ?>
            </div> -->
            <div class="border-top text-center pt-4">
                <p class="p-0 m-0">&copy;2024 Krisis Energi. All Rights Reserved.</p>
                <p>Husni Aripin | 2206700012</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="script.js"></script>

</body>

</html>