$(document).ready(function(){
    $('#dataTable_filter label input').attr("placeholder", "Type here to search");
    $('#dataTable_filter label').append('<i class="fas fa-search thesearch"></i>');

    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});