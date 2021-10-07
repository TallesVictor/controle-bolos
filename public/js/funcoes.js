document.addEventListener('keypress', function(e) {
    if (e.which == 13) {
        $("#btnPesquisa").click();
    }
}, false);

function loading() {
    $(".preloader").addClass('d-flex');
    $(".preloader").show()
}

function hideLoading() {
    $(".preloader").hide()
    $(".preloader").removeClass('d-flex');
}