<div class="container">

	<div class="card shadow pb-3">

		<div class="card-header">

			<div class="row">
				<div class="col-6">
					<h3 class="mb-0 text-gray-800">Cadastro</h3>
				</div>
				<div class="col-6 d-flex justify-content-end">
					<a href="<?php echo base_url('users'); ?>" class="btn btn-primary">
						Relatório
					</a>
				</div>
			</div>

		</div>

		<div class="card-body">

			<form method="post">

				<?php

				if (is_array($data) && count($data) > 0) {
					extract($data);
				}

				if (is_array($errors) && count($errors) > 0) {
					echo "<div class='alert alert-danger'>" . implode("<br />", $errors) . "</div>";
				}

				if ((is_string($success) && strlen($success) > 0) || ($success === true)) {
					$success = ($success === true) ? "Dados gravados com sucesso." : $success;
					echo "<div class='alert alert-success msg-success text-center'>{$success}</div>";
				}

				?>

				<input type="hidden" name="action" value="<?php echo $action; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<div class="row">

					<div class="col-6 mb-3">
						<label for="name" class="form-label">Nome Completo</label>
						<input type="text" name="name" id="name"
							   value="<?php echo $name; ?>" class="form-control" required/>
					</div>

					<div class="col-6 mb-3">
						<label for="email" class="form-label">E-mail</label>
						<input type="email" name="email" id="email"
							   value="<?php echo $email; ?>" class="form-control" required/>
					</div>

					<div class="col-6 mb-3">
						<label for="username" class="form-label">Nome do Login</label>
						<input type="text" name="username" id="username"
							   value="<?php echo $username; ?>" class="form-control" required/>
					</div>

					<?php if ($action == "create") { ?>

						<div class="col-6 mb-3">
							<label for="password" class="form-label">Senha</label>
							<input type="password" name="password" id="password"
								   value="<?php echo $password; ?>" class="form-control" aria-describedby="passwordHelp"
								   required/>
							<div id="passwordHelp" class="form-text">
								8 caracteres mínimo, contendo pelo menos 1 letra e 1 número.
							</div>
						</div>

					<?php } ?>

					<div class="col-6 mb-3">
						<label for="zipcode" class="form-label">CEP</label>
						<input type="text" name="zipcode" id="zipcode"
							   value="<?php echo $zipcode; ?>" class="form-control cep" required/>
					</div>

				</div>

				<div class="row">
					<div class="col-12 d-flex justify-content-end">
						<button type="submit" class="btn btn-primary">
							Salvar
						</button>
					</div>

				</div>

			</form>

		</div>
	</div>

</div>
