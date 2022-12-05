$(document).ready(function () {

	setTimeout(function () {
		$('.msg-success').slideUp();
	}, 5000);


	$('.cep').mask('99999-999');

	$(".btn-delete").on('click', function () {

		const url = $(this).data('url');
		const id = $(this).data('id');

		if (!id || !url) {
			return;
		}

		Swal.fire({
			title: 'Deseja realmente excluir esse registro?',
			reverseButtons: true,
			showCancelButton: true,
			confirmButtonColor: '#C82333',
			confirmButtonText: 'Excluir',
			cancelButtonText: "Cancelar",
		}).then(async (result) => {
			if (result.value) {
				const registroExcluido = await $.post(`${baseUrl}${url}`, {id});
				registroExcluido.error ? Swal.fire('Ops, erro ao excluir!', '', 'error') : $(`.data-${id}`).remove();
			}
		})

	});
});
