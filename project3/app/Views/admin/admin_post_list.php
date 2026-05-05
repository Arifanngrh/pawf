<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - MyBlog</title>

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
            padding: 100px 20px 40px;
            text-align: center;
        }

        .hero h1 {
            color: #38bdf8;
            font-weight: bold;
        }

        /* TABLE CARD */
        .table-card {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 20px;
            border: 1px solid rgba(56, 189, 248, 0.2);
            backdrop-filter: blur(10px);
            padding: 20px;
        }

        table {
            color: #e2e8f0;
        }

        thead {
            color: #38bdf8;
        }

        tr {
            transition: 0.2s;
        }

        tr:hover {
            background: rgba(56, 189, 248, 0.05);
        }

        /* BADGE */
        .badge-published {
            background: #22c55e;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
        }

        .badge-draft {
            background: #64748b;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
        }

        /* BUTTON */
        .btn-action {
            border-radius: 50px;
        }

        /* MODAL */
        .modal-content {
            background: #0f172a;
            color: #e2e8f0;
            border: 1px solid rgba(56, 189, 248, 0.2);
        }

        /* FOOTER */
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

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
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
                        <a href="<?= base_url('admin/post/new') ?>"
                           class="btn btn-outline-info btn-action px-3">
                           + New Post
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin/setting') ?>">Setting</a>
                    </li>

                    <li class="nav-item">
                        <?php if (logged_in()) : ?>
                            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                        <?php else: ?>
                            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                        <?php endif; ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <h1>📊 Admin Blog</h1>
        <p>Kelola semua postingan kamu di sini</p>
    </div>

    <!-- TABLE -->
    <div class="container">
        <div class="table-card">

            <table class="table table-borderless align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 0; foreach($posts as $post): $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>

                        <td>
                            <strong><?= $post['title'] ?></strong><br>
                            <small style="color:#94a3b8;">
                                <?= date('d M Y', strtotime($post['created_at'])) ?>
                            </small>
                        </td>

                        <td>
                            <?php if($post['status'] === 'published'): ?>
                                <span class="badge-published">Published</span>
                            <?php else: ?>
                                <span class="badge-draft">Draft</span>
                            <?php endif ?>
                        </td>

                        <td class="text-end">
                            <a href="<?= base_url('admin/post/'.$post['id'].'/preview') ?>"
                               class="btn btn-sm btn-outline-light btn-action" target="_blank">
                               👁
                            </a>

                            <a href="<?= base_url('admin/post/'.$post['id'].'/edit') ?>"
                               class="btn btn-sm btn-outline-info btn-action">
                               ✏️
                            </a>

                            <button type="button"
                                data-href="<?= base_url('admin/post/'.$post['id'].'/delete') ?>"
                                onclick="confirmToDelete(this)"
                                class="btn btn-sm btn-outline-danger btn-action">
                                🗑
                            </button>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- MODAL DELETE -->
    <div id="confirm-dialog" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <h5>Hapus Post?</h5>
                <p>Data akan hilang permanen.</p>

                <div class="d-flex justify-content-end gap-2">
                    <button id="delete-button" class="btn btn-danger"
                        onclick="window.location.href=this.dataset.href">
                        Delete
                    </button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmToDelete(el) {
            document.getElementById("delete-button")
                .setAttribute("data-href", el.dataset.href);

            var modal = new bootstrap.Modal(
                document.getElementById('confirm-dialog')
            );
            modal.show();
        }
    </script>

    <!-- FOOTER -->
    <div class="container py-5">
        <footer class="text-center border-top pt-4 mt-5">
            <p>&copy; <?= Date('Y') ?> MyBlog Admin</p>
        </footer>
    </div>

    <!-- JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>

