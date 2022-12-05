<div class="container">

	<div class="card shadow">

		<div class="card-header">

			<div class="row">
				<div class="col-6">
					<h3 class="mb-0 text-gray-800">Relatório</h3>
				</div>
				<div class="col-6 d-flex justify-content-end">
					<a href="<?php echo base_url('users/create'); ?>" class="btn btn-primary">
						Cadastro
					</a>
				</div>
			</div>

		</div>

		<div class="card-body">

			<div class="table-responsive">

				<table class="table table-bordered mb-0" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Info(s)</th>
						<th class="text-center" width="150">Ações</th>
					</tr>
					</thead>
					<tbody>
					<?php

					foreach ($users as $user) {
						$user["zipcode"] = zipcodeMask($user["zipcode"]);

						echo "
							<tr class='data-{$user["id"]}'>
								<td>
									<strong>Nome: </strong> {$user["name"]} <br/>
									<strong>E-mail: </strong> {$user["email"]} <br/>
									<strong>Login: </strong> {$user['username']} <br/>
									<strong>CEP: </strong> {$user["zipcode"]}
								</td>
								<td class='text-center' style='vertical-align: middle'>
									<a href='" . base_url("users/edit/{$user['id']}") . "' class='btn btn-sm btn-primary'>
										Editar
									</a> &nbsp; 
									<button type='button' class='btn btn-sm btn-danger btn-delete' data-id='{$user["id"]}' data-url='users/destroy'> 
										Excluir
									</button>
								</td>
							</tr>
                        ";
					}
					
					if (empty($users)) {
						echo '<tr><td colspan="200" class="text-center" >Nenhum registro encontrado.</td></tr>';
					}

					?>
					</tbody>
				</table>

			</div>

		</div>
	</div>

</div>
