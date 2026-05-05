<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #020617);
            min-height: 100vh;
            color: #e2e8f0;
        }

        /* HERO */
        .hero {
            padding: 120px 20px 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #38bdf8;
        }

        .hero p {
            color: #94a3b8;
        }

        /* CARD */
        .dark-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 18px;
            border: 1px solid rgba(56, 189, 248, 0.2);
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .dark-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(56, 189, 248, 0.2);
            border-color: #38bdf8;
        }

        .section-title {
            font-weight: 600;
            color: #38bdf8;
        }

        /* BUTTON */
        .btn-custom {
            background: #38bdf8;
            border: none;
            color: #020617;
            border-radius: 50px;
            padding: 10px 25px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: #0ea5e9;
            transform: scale(1.05);
        }

        /* FOOTER */
        footer {
            color: #64748b;
        }
    </style>
</head>

<body>

    <?= $this->include('layouts/navbar'); ?>

    <!-- HERO -->
    <div class="hero">
        <h1>Selamat Datang</h1>
        <p>Belajar coding & berbagi pengalaman 🚀</p>
        <a href="<?= base_url('post') ?>" class="btn btn-custom mt-3">Lihat Blog</a>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 dark-card h-100">
                    <h5 class="section-title">💻 Mulai ngoding PHP</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 dark-card h-100">
                    <h5 class="section-title">🎨 Paham CSS & JS</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 dark-card h-100">
                    <h5 class="section-title">🔥 CodeIgniter Seru</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- FOOTER -->
    <div class="container py-5">
        <footer class="text-center border-top pt-4 mt-5">
            <p>&copy; <?= Date('Y') ?> MyBlog Gndrng</p>
        </footer>
    </div>

    <!-- JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>
