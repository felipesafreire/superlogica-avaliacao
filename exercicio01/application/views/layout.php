<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exercicio 01 - Cadastro</title>

	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">

	<script>
		const baseUrl = '<?= base_url(); ?>';
	</script>
</head>
<body>

<main>
	<?php $this->load->view($page); ?>
</main>

<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-mask/mask.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.js'); ?>"></script>
</body>
</html>
