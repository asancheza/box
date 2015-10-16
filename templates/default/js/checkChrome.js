$( document ).ready(function() {
    $('#modalChromeExtension').on('hidden.bs.modal', function () {
        $.cookie("ladderrChromeExtensionShow", "exist", { expires: 365, path: '/' });
    });

    var isChrome = window.chrome;

    if (isChrome) {
        if ( $.cookie("ladderrChromeExtensionShow") != "exist" ) {
            $('#modalChromeExtension').modal('show');
        }
    }

});