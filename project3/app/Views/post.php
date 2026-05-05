<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyBlog - Blog</title>

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

		/* CARD */
		.blog-card {
			background: rgba(15, 23, 42, 0.7);
			border-radius: 18px;
			border: 1px solid rgba(56, 189, 248, 0.2);
			backdrop-filter: blur(10px);
			transition: 0.3s;
			padding: 20px;
			height: 100%;
		}

		.blog-card:hover {
			transform: translateY(-6px);
			box-shadow: 0 10px 25px rgba(56, 189, 248, 0.2);
			border-color: #38bdf8;
		}

		.blog-title {
			font-size: 1.2rem;
			font-weight: 600;
			color: #38bdf8;
			text-decoration: none;
		}

		.blog-title:hover {
			text-decoration: underline;
		}

		.blog-excerpt {
			color: #94a3b8;
			margin-top: 10px;
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
		<h1>Blog</h1>
		<p>Artikel terbaru & pengalaman coding 🚀</p>
	</div>

	<!-- CONTENT -->
	<div class="container">
		<div class="row g-4">

			<?php foreach ($posts as $post) : ?>
				<div class="col-md-4">
					<div class="blog-card">

						<a href="/post/<?= $post['slug'] ?>" class="blog-title">
							<?= $post['title'] ?>
						</a>

						<p class="blog-excerpt">
							<?= substr(strip_tags($post['content']), 0, 120) ?>...
						</p>

						<a href="/post/<?= $post['slug'] ?>" class="btn btn-sm btn-outline-info mt-2">
							Read More →
						</a>

					</div>
				</div>
			<?php endforeach ?>

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