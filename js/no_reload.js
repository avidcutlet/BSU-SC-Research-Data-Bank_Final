document.getElementById("myInput")
    .addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
    event.preventDefault();
        document.getElementById("submit-search").click();
    }
});

$('#submit-search').click(function() {
    var val1 = $('#myInput').val();
    $.ajax({
        type: 'POST',
        url: 'no_reload_function.php',
        data: { query: val1 },
        success: function(response) {
            $('#livesearch').html(response);
        }
    });
});