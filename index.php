<?php include("includes/header.php"); ?>
<style>
	body {
		background: #f4f6f8;
		font-family: Arial, sans-serif;
		margin: 0;
	}
	.container-index {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		min-height: 80vh;
	}
	h1 {
		color: black;
		font-size: 2.5rem;
		margin-bottom: 18px;
		text-shadow: 0 2px 8px rgba(0,0,0,0.08);
	}
	.login-link {
		display: inline-block;
		padding: 12px 32px;
		background: #1976d2;
		color: #fff;
		border-radius: 8px;
		font-size: 1.2rem;
		text-decoration: none;
		box-shadow: 0 2px 8px rgba(0,0,0,0.08);
		transition: background 0.2s;
		margin-top: 10px;
	}
	.login-link:hover {
		background: #1565c0;
	}
	.desc {
		color: #555;
		font-size: 1.1rem;
		margin-bottom: 24px;
		text-align: center;
		max-width: 400px;
	}
</style>
<div class="container-index">
	<h1>Sistema de Pañol</h1>
	<div class="desc">Bienvenido al sistema de gestión de Pañol. Administra usuarios, ítems y préstamos de manera sencilla y segura.</div>
	<a href="public/login.php" class="login-link">Iniciar Sesión</a>
</div>
<?php include("includes/footer.php"); ?>
