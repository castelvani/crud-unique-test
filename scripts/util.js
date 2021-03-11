function avisar(msg) {
    jQuery('.toast').hide();

    jQuery('.toast_mostra').append(`
    <div role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" class="toast hide" data-autohide="true">
        <div class="toast-header">
            <strong class="mr-auto">Atenção!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            ${msg}
        </div>
    </div>`);

    jQuery('.toast').toast('show');
}