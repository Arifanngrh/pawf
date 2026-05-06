<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - MyBlog</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #020617);
            color: #e2e8f0;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(15, 23, 42, 0.9) !important;
            backdrop-filter: blur(10px);
        }

        /* HERO */
        .hero {
            padding: 120px 20px 40px;
            text-align: center;
        }

        .hero h1 {
            color: #38bdf8;
            font-weight: bold;
        }

        /* FORM CARD */
        .editor-card {
            background: rgba(15, 23, 42, 0.85);
            border-radius: 20px;
            border: 1px solid rgba(56, 189, 248, 0.2);
            backdrop-filter: blur(10px);
            padding: 30px;
            margin-bottom: 50px;
        }

        label {
            color: #94a3b8;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(2, 6, 23, 0.7);
            border: 1px solid rgba(56, 189, 248, 0.2);
            color: #e2e8f0;
        }

        .form-control:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
            background: rgba(2, 6, 23, 0.9);
            color: #fff;
        }

        /* Styling Preview Gambar */
        .current-image-preview {
            max-width: 200px;
            border-radius: 10px;
            border: 2px solid rgba(56, 189, 248, 0.3);
            margin-bottom: 10px;
            display: block;
        }

        .form-control::file-selector-button {
            background: #1e293b;
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.2);
            border-radius: 5px;
            margin-right: 10px;
        }

        textarea {
            min-height: 250px;
        }

        /* BUTTON */
        .btn-publish {
            background: #38bdf8;
            border: none;
            color: #020617;
            border-radius: 50px;
            font-weight: bold;
        }

        .btn-publish:hover {
            background: #0ea5e9;
            transform: translateY(-2px);
            transition: 0.2s;
        }

        .btn-draft {
            border-radius: 50px;
        }

        .btn-back {
            border-radius: 50px;
        }

        footer {
            color: #64748b;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url() ?>">MyBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('admin/post') ?>">Blog</a>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item">
                        <a href="<?= base_url('admin/post') ?>" class="btn btn-outline-light btn-back px-3">
                            ← Back
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <h1>✏️ Edit Post</h1>
        <p>Perbarui konten dan gambar artikel kamu</p>
    </div>

    <!-- FORM -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <!-- Tampilkan Error Validasi Jika Ada -->
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger mb-4" style="background: rgba(220, 38, 38, 0.2); border: 1px solid #ef4444; color: #fecaca;">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <div class="editor-card">
                    <!-- ACTION diarahkan ke method edit dengan ID, jangan lupa multipart/form-data -->
                    <form action="<?= base_url('admin/post/'.$post['id'].'/edit') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $post['id'] ?>" />

                        <div class="mb-4">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control form-control-lg"
                                value="<?= old('title', $post['title']) ?>" required>
                        </div>

                        <!-- INPUT GAMBAR -->
                        <div class="mb-4">
                            <label>Feature Image</label>
                            <?php if (!empty($post['image'])): ?>
                                <div class="mb-2">
                                    <small class="text-info d-block mb-2">Current Image:</small>
                                    <img src="<?= base_url('uploads/' . $post['image']) ?>" alt="Preview" class="current-image-preview">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar. (Max 2MB)</small>
                        </div>

                        <div class="mb-4">
                            <label>Content</label>
                            <textarea name="content" class="form-control"><?= old('content', $post['content']) ?></textarea>
                        </div>

                        <div class="d-flex gap-2 pt-3 border-top border-secondary mt-4">
                            <button type="submit" name="status" value="published"
                                class="btn btn-publish px-5 py-2">
                                🚀 Update Post
                            </button>

                            <button type="submit" name="status" value="draft"
                                class="btn btn-secondary btn-draft px-4 py-2">
                                💾 Save as Draft
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container py-5">
        <footer class="text-center border-top border-secondary pt-4 mt-5">
            <p>&copy; <?= date('Y') ?> MyBlog Admin Panel</p>
        </footer>
    </div>

    <!-- JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>