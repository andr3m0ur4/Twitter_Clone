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
					manipularElementos(JSON.parse(data))
				}
			})
		}
	})

	// função para manipular os dados recebidos do servidor dentro de elementos
	function manipularElementos(pessoas) {
		$('#pessoas').html('')
		
		pessoas.forEach(function(pessoa) {
			var esta_seguindo_usuario_sn = pessoa['id_usuario_seguidor'] != null ? 'S' : 'N'
			var btn_seguir_display = 'block'
			var btn_deixar_seguir_display = 'block'

			if (esta_seguindo_usuario_sn == 'N') {
				btn_deixar_seguir_display = 'none'
			} else {
				btn_seguir_display = 'none'
			}

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

			var button1 = $('<button>Seguir</button>')
			button1.addClass('btn btn-outline-secondary btn_seguir')
			button1.attr({
				type: 'button',
				'data-id-usuario': pessoa['id'],
				id: 'seguir_' + pessoa['id']
			})
			button1.css('display', btn_seguir_display)
			button1.appendTo(div)

			var button2 = $('<button>Deixar de seguir</button>')
			button2.addClass('btn btn-primary btn_deixar_seguir')
			button2.attr({
				type: 'button',
				'data-id-usuario': pessoa['id'],
				id: 'deixar_seguir_' + pessoa['id']
			})
			button2.css('display', btn_deixar_seguir_display)
			button2.appendTo(div)
		})

		$('.btn_seguir').click(function() {
			var id_usuario = $(this).data('id-usuario')
			
			$('#seguir_' + id_usuario).hide()
			$('#deixar_seguir_' + id_usuario).show()

			$.ajax({

				url: './seguir.php',
				method: 'post',
				data: { seguir_id_usuario: id_usuario },

				success: function(data) {
					
				}
			})
		})

		$('.btn_deixar_seguir').click(function() {
			var id_usuario = $(this).data('id-usuario')

			$('#deixar_seguir_' + id_usuario).hide()
			$('#seguir_' + id_usuario).show()

			$.ajax({

				url: './deixar_seguir.php',
				method: 'post',
				data: { deixar_seguir_id_usuario: id_usuario },

				success: function(data) {
					
				}
			})
		})
	}
})
