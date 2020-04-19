// Função para aguardar o carregamento do documento na página
$(document).ready(function() {

	// se o botão foi clicado
	$('#btn_tweet').click(function() {

		// verificar se o campo de texto possui caracteres
		if ($('#txt_tweet').val().length > 0) {
			
			$.ajax({

				url: './inclui_tweet.php',
				method: 'post',
				data: $('#form_tweet').serialize(),

				success: function(data) {
					$('#txt_tweet').val('')
				}
			})
		}
	})
})
