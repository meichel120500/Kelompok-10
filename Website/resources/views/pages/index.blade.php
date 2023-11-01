<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Personal - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href=" {{ asset('assets/favicon.ico') }}" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="p-3 mb-2 bg-warning-subtle text-emphasis-warning">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning-subtle text-emphasis-warning py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php"><span class="fw-bolder text-primary">KELOMPOK 10</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cek_Saldo.php">Cek Saldo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                            </div>
                            <h1 class="display-3 fw-bolder mb-5">
                                <span class="text-gradient d-inline">#SEMUABISA</span>
                            </h1>
                            <p class="text-xxl-end fw-bolder">
                                "Dunia penuh peluang. Bagikan momen ketika kamu mengatasi rintangan dan mencapai
                                prestasi dengan hastag #SEMUABISA"
                            </p>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-around mt-5 mt-xxl-0">
                            <div>
                                <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
                                <!-- Watch a tutorial on how to do this on YouTube (link)-->
                                <img class="profile-img" src="assets/Pic.png" alt="..." />

                                <!-- END of SVG dots-->
                            </div>

                            <!-- END of SVG dots-->
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </header>
        <!-- About Section-->
    </main>
    <!-- Footer-->
    <footer class="bg-warning-subtle text-emphasis-warning py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="text-center">
                    <div class="small m-0">Copyright @2023 Kelompok 10 - Rakamin Academy</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
