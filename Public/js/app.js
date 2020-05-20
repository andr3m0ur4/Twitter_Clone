// Função para aguardar o carregamento do documento na página
$(document).ready(() => {
	
	// Verifica se os campos de usuário e senha foram devidamente preenchidos
	$('#btn_login').click(() => {

		let campo_vazio = false

		if ($('#email').val() == '') {
			$('#email').addClass('is-invalid')
			campo_vazio = true
		} else {
			$('#email').removeClass('is-invalid')
		}

		if ($('#senha').val() == '') {
			$('#senha').addClass('is-invalid')
			campo_vazio = true
		} else {
			$('#senha').removeClass('is-invalid')
		}

		if (campo_vazio) {
			return false
		}
		
	})

	// se o botão foi clicado
	$('#btn_tweet').click(e => {

		e.preventDefault()

		// verificar se o campo de texto possui caracteres
		if ($('#txt_tweet').val().length > 0) {
			
			$.ajax({

				url: '/tweet',
				method: 'post',
				data: $('#form_tweet').serialize(),

				success: dados => {
					$('#txt_tweet').val('')
					$('#tweets').html('')
					atualizarTweets()
				}
			})
		}
	})

	function atualizarTweets() {

		// carregar os tweets
		$.ajax({

			url: '/get_tweets',
			method: 'post',
			dataType: 'json',

			success: tweets => {

				tweets.forEach(tweet => {
					let div_row = $('<div></div>')
					div_row.addClass('row tweet')
					div_row.appendTo('#tweets')

					let div_col = $('<div></div>')
					div_col.addClass('col')
					div_col.appendTo(div_row)

					let p1 = $('<p></p>')
					p1.appendTo(div_col)

					let p2 = $('<p></p>')
					p2.html(tweet.tweet)
					p2.appendTo(div_col)

					let strong = $('<strong></strong>')
					strong.html(tweet.nome)
					strong.appendTo(p1)

					let small = $('<small></small>')
					small.appendTo(p1)

					let span = $('<span></span>')
					span.addClass('text text-muted')
					span.html(` - ${tweet.data}`)
					span.appendTo(small)

					let br = $('<br>')
					br.appendTo(div_col)

					if (tweet.id_usuario == id_usuario) {
						let form = $('<form></form>')
						form.attr({
							'method': 'post',
							'action': `/remover_tweet?id_tweet=${tweet.id}`
						})
						form.appendTo(div_col)

						let div_flex = $('<div></div>')
						div_flex.addClass('col d-flex justify-content-end')
						div_flex.appendTo(form)

						let button = $('<button></button>')
						button.attr('type', 'submit')
						button.addClass('btn btn-danger')
						button.html('<small>Remover</small>')
						button.appendTo(div_flex)
					}
				})
			}
		})
	}
	
	if (location.pathname == '/timeline') {
		atualizarTweets()
	}

	$('#btn_pesquisar').click(e => {
		e.preventDefault()

		// verificar se o campo de texto possui caracteres
		if ($('#txt_nome').val().length > 0) {
			
			$.ajax({

				url: '/get_pessoas',
				method: 'get',
				data: $('#form_procurar_pessoas').serialize(),
				dataType: 'json',

				success: dados => {
					manipularElementos(dados)
				}
			})
		}
	})

	function manipularElementos(usuarios) {
		$('#pessoas').html('')
		
		usuarios.forEach(usuario => {
			let div_row = $('<div></div>')
			div_row.addClass('row mb-2')
			div_row.appendTo($('#pessoas'))

			let div_col = $('<div></div>')
			div_col.addClass('col')
			div_col.appendTo(div_row)

			let div_card = $('<div></div>')
			div_card.addClass('card')
			div_card.appendTo(div_col)

			let div_body = $('<div></div>')
			div_body.addClass('card-body')
			div_body.appendTo(div_card)

			let div_row2 = $('<div></div>')
			div_row2.addClass('row')
			div_row2.appendTo(div_body)

			let col_1 = $('<div></div>')
			col_1.addClass('col-md-6')
			col_1.html(usuario.nome)
			col_1.appendTo(div_row2)

			let col_2 = $('<div></div>')
			col_2.addClass('col-md-6 d-flex justify-content-end')
			col_2.appendTo(div_row2)

			let div = $('<div></div>')
			div.appendTo(col_2)

			let button1 = $('<button></button>')
			button1.attr({
				'type': 'button',
				'data-id-usuario': usuario.id,
				'id': `seguir_${usuario.id}`,
			})
			button1.addClass('btn btn-success btn_seguir')
			button1.html('Seguir')
			button1.appendTo(div)

			let button2 = $('<button></button>')
			button2.attr({
				'type': 'button',
				'data-id-usuario': usuario.id,
				'id': `deixar_de_seguir_${usuario.id}`,
			})
			button2.addClass('btn btn-danger btn_deixar_seguir')
			button2.html('Deixar de seguir')
			button2.appendTo(div)

			if (usuario.seguindo_sn == 0) {
				button2.hide()
			}

			if (usuario.seguindo_sn == 1) {
				button1.hide()
			}
		})

		$('.btn_seguir').click(e => {
			e.preventDefault()
			
			let id_usuario = $(e.target).data('id-usuario')
			
			$(`#seguir_${id_usuario}`).hide()
			$(`#deixar_de_seguir_${id_usuario}`).show()

			$.ajax({

				url: '/acao',
				method: 'get',
				data: {
					acao: 'seguir',
					id_usuario: id_usuario
				},

				success: data => {
					
				}
			})
		})

		$('.btn_deixar_seguir').click(e => {
			e.preventDefault()
			let id_usuario = $(e.target).data('id-usuario')

			$(`#deixar_de_seguir_${id_usuario}`).hide()
			$(`#seguir_${id_usuario}`).show()

			$.ajax({

				url: '/acao',
				method: 'get',
				data: {
					acao: 'deixar_de_seguir',
					id_usuario: id_usuario },

				success: data => {
					
				}
			})
		})
	}
})
