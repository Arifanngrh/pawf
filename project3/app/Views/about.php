<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyBlog - About</title>

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

		/* CARD DARK GLASS */
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
			margin-bottom: 10px;
			color: #38bdf8;
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
		<h1>About Me</h1>
		<p>Kenalan lebih dekat tentang saya</p>
	</div>

	<!-- CONTENT -->
	<div class="container">
		<div class="row g-4">

			<div class="col-md-4">
				<div class="p-4 dark-card h-100">
					<h5 class="section-title">👤 Siapa Aku</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur.</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="p-4 dark-card h-100">
					<h5 class="section-title">💡 Bisa Apa Aku</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur.</p>
				</div>
			</div>

			<div class="col-md-4">
				<div class="p-4 dark-card h-100">
					<h5 class="section-title">🚀 Bagaimana Aku</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur.</p>
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
