// Função para aguardar o carregamento do documento na página
$(document).ready(function() {

	// Verifica se os campos de usuário e senha foram devidamente preenchidos
	$('#btn_login').click(function() {

		var campo_vazio = false

		if ($('#campo_usuario').val() == '') {
			$('#campo_usuario').addClass('is-invalid')
			campo_vazio = true
		} else {
			$('#campo_usuario').removeClass('is-invalid')
		}

		if ($('#campo_senha').val() == '') {
			$('#campo_senha').addClass('is-invalid')
			campo_vazio = true
		} else {
			$('#campo_senha').removeClass('is-invalid')
		}

		if (campo_vazio) {
			return false
		}
		
	})
})
