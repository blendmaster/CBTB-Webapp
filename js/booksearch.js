$(function () {
	$('#search-button').click(function () {
		$.get('https://www.googleapis.com/books/v1/volumes', $('#search-form').serialize(), function (data) {
			var results = $('#search-results');
			results.empty();
			data.items.forEach(function (book) {
				results.append('<li>'+book.volumeInfo.title+'</li>');
			});
		}, 'jsonp');
		return false; //prevent form submission
	});
});

