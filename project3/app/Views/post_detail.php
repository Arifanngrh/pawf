<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title'] ?> - MyBlog</title>

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
            font-size: 2.8rem;
            font-weight: bold;
            color: #38bdf8;
        }

        /* POST CARD */
        .post-card {
            background: rgba(15, 23, 42, 0.7);
            border-radius: 20px;
            border: 1px solid rgba(56, 189, 248, 0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
        }

        .post-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #38bdf8;
        }

        .post-meta {
            font-size: 0.9rem;
            color: #94a3b8;
            margin-bottom: 20px;
        }

        .post-content {
            line-height: 1.8;
            color: #cbd5f5;
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
        <h1>Blog Detail</h1>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="post-card">

                    <div class="post-title">
                        <?= esc($post['title']) ?>
                    </div>

                    <div class="post-meta">
                        ✍️ <?= esc($post['author']) ?> • <?= esc($post['created_at']) ?>
                    </div>

                    <?php if (! empty($post['image'])) : ?>
                        <div class="mb-4 text-center">
                            <img src="<?= base_url('uploads/' . $post['image']) ?>" alt="<?= esc($post['title']) ?>" class="img-fluid rounded">
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <?= nl2br(esc($post['content'])) ?>
                    </div>

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
