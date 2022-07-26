$(document).ready(function() {
    $('body')
        .on('click', '.areaAdmin', function(e) {
            e.preventDefault();
            var a = $(this).attr('page');

            admin.loadPage($(this).attr('page'));

        })
})