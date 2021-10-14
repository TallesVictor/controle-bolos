$(document).ready(function() {

    hideLoading();
    formCadastrarEmail();
});

function sendEmail(param) {

    loading();

    $.ajax({
        type: "GET",
        url: `emails/form`,
        data: param,
        success: function(data) {
            hideLoading();
        },
        error: function(xhr) {
            let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
                            ${xhr.responseText}
                        </div>
            `;
            $("#alertCE").html(html);
            hideLoading();
        }
    });
}


function formCadastrarEmail() {

    $("#formCadastrarEmail").submit(function(e) {
        e.preventDefault();
        loading();
        $.ajax({
            type: "GET",
            url: "emails/create",
            data: $(this).serialize(),
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#alertCE").html(`<div class="alert text-center alert-success" role="alert">
                                     Seu email  <b>${$("#nomeCE").val()}</b>, foi cadastrado com sucesso!
                                    </div>`);
                hideLoading();
                setTimeout(() => {
                    $("#modalCadEmails").modal('hide');
                }, 1300);
            },
            error: function(xhr) {
                $("#alertCE").html(`<div class="alert text-center alert-danger" role="alert">
               Erro ao cadastrar: ${xhr.responseText}
               </div>`);
                hideLoading();
            }
        });

    });
}


function modalCadEmails(id) {
    $("#boloCE").val(id);
    $("#modalCadEmails").modal('show');
}