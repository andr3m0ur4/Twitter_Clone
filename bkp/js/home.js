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
					$('#tweets').html('')
					atualizarTweets()
				}
			})
		}
	})

	function atualizarTweets() {

		// carregar os tweets
		$.ajax({

			url: './get_tweet.php',
			method: 'post',

			success: function(data) {
				var tweets = JSON.parse(data)

				tweets.forEach(function(tweet) {
					var a = $('<a href="#"></a>')
					a.addClass('list-group-item list-group-item-action')
					a.appendTo('#tweets')

					var h4 = $('<h4></h4>')
					h4.html(tweet['usuario'] + ' ')
					h4.appendTo(a)

					var small = $('<small></small>')
					small.html(' - ' + tweet['data_inclusao_formatada'])
					small.appendTo(h4)

					var p = $('<p></p>')
					p.html(tweet['tweet'])
					p.appendTo(a)
				})
			}
		})
	}

	atualizarTweets()
})
