// Função para aguardar o carregamento do documento na página
$(document).ready(function() {

	// se o botão foi clicado
	$('#btn_pesquisar').click(function() {

		// verificar se o campo de texto possui caracteres
		if ($('#txt_nome').val().length > 0) {
			
			$.ajax({

				url: './get_pessoas.php',
				method: 'post',
				data: $('#form_procurar_pessoas').serialize(),

				success: function(data) {
					$('#pessoas').html('')

					var pessoas = JSON.parse(data)
					
					pessoas.forEach(function(pessoa) {
						var a = $('<a href="#"></a>')
						a.addClass('list-group-item list-group-item-action')
						a.appendTo('#pessoas')

						var strong = $('<strong></strong>')
						strong.html(pessoa['usuario'])
						strong.appendTo(a)

						var small = $('<small></small>')
						small.html(' - ' + pessoa['email'])
						small.appendTo(a)

						var div = $('<div></div>')
						div.addClass('float-right')
						div.appendTo(a)

						var button = $('<button>Seguir</button>')
						button.addClass('btn btn-outline-secondary')
						button.attr('type', 'button')
						button.appendTo(div)
					})
				}
			})
		}
	})
})
