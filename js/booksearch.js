$(function () {
	$('#search-button').click(function () {
        $('#search-button').val("Searching...").attr('disabled', true);
        $('#search-results').slideUp().empty();
        if($('#search-query').val() === '') return false;
        $("<table/>").addClass('display').appendTo('#search-results').dataTable( {
            bProcessing: true,
            sAjaxSource: 'https://www.googleapis.com/books/v1/volumes',
            fnServerData: function (src, data, callback) {
               $.get(src, $('#search-form').serialize(), function(data,textStatus,jqXHR) {
                    //'fix' google's incomplete data
                    data.items.forEach(function (book) {
                        if( book.saleInfo.retailPrice == undefined ) {
                            book.saleInfo.retailPrice = { amount: '?' };
                        }
                        if( book.volumeInfo.authors == undefined ) {
                            book.volumeInfo.authors = ["unknown"];
                        }
                    });
                    callback(data,textStatus,jqXHR);    
               }, 'jsonp'); 
            },
            sAjaxDataProp: "items",
            aoColumns: [
             { sTitle: "Select", fnRender: function(r) {
                return "<a href='#form' data-title='"+r.aData.volumeInfo.title+"' data-author='"+r.aData.volumeInfo.authors+"' data-isbn='"+r.aData.volumeInfo.industryIdentifiers[0].identifier+"' data-price='"+r.aData.saleInfo.retailPrice.amount+"' class='select-book'>Select</data>";
             }},
             { sWidth: "52px", bSortable: false, fnRender: function(r) {
                if( r.aData.volumeInfo.imageLinks ) {
                    return "<img src='"+r.aData.volumeInfo.imageLinks.smallThumbnail+"' />"
                } else {
                    return "";
                }
             }},
             { sTitle: "Title", mDataProp: "volumeInfo.title" },
             { sTitle: "Author", mDataProp: "volumeInfo.authors" },
             { sTitle: "Price", mDataProp: "saleInfo.retailPrice.amount" },
             { sTitle: "ISBN", mDataProp: "volumeInfo.industryIdentifiers.0.identifier" },
             { sTitle: "Info", fnRender: function(r) {
                return "<a href='"+r.aData.volumeInfo.infoLink+"' target='_blank' >More Info</a>";}
             }
            ],
            bPaginate: false,
            bLengthChange: false,
            fnInitComplete: function () {
                $('.select-book').click( function(e) {
                   var book = $(e.target);
                   $("#title").val(book.data('title'));
                   $("#author").val(book.data('author'));
                   $("#ISBN").val(book.data('isbn'));
                   $("#price").val(book.data('price'));
                   $('#add-book-form').effect("highlight",{},3000);
                });
            }
        });
        $('#search-results').slideDown();
        $('#search-button').val("Search").attr('disabled', false);
		return false; //prevent form submission
	});
});

