$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.money').mask("#.##0,00", { reverse: true });
    $('.number').mask("0000", { reverse: true });

    hideLoading();
    formCadastrarBolo();
    formEditarBolo();
    tableBolos();
});

function tableBolos() {
    const settings = {
        // bInfo: false,
        paging: false,
        orderCellsTop: true,
        // scrollX: true,
        // scrollY: '50vh',
        // scrollCollapse: false,
        destroy: true,
        "language": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        },
        initComplete: function() {

            // $('div.dataTables_scrollHeadInner thead tr#filterbox td').each(function() {
            //     $(this).html('<input class="form-control filter-search"  id="' + $(this).index() + '" onchange="busca(this)" type="text">');
            // });
        }
    };
    const table = $('#tableBolos').DataTable(settings);
}

function listAll() {

    loading();

    $.ajax({
        type: "GET",
        url: 'bolos',
        success: function(data) {
            listBolos(data);
        },
        error: function(xhr) {
            //     let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
            //                 ${xhr.responseText}
            //             </div>
            // `;
            //     $("#htmlBolos").html(html);
            hideLoading();
        }
    });
}

function listBolos(data) {
    let html = '';
    for (let i = 0; i < data.length; i++) {
        const element = data[i];

        html += `<tr>
                        <td>${element.id}</td>
                        <td>${element.nome}</td>
                        <td>${maskMoney(element.peso)}</td>
                        <td>${maskMoney(element.valor)}</td>
                        <td>${element.quantidade}</td>
                        <td>
                            <i class="fas fa-pencil-alt cursor" onclick="editBolo(${element.id})" title="Editar o ${element.nome}"></i>
                            <i class="fas fa-trash-alt cursor"  onclick="deleteBolo(${element.id})" title="Apagar o ${element.nome} "></i>
                            <i class="fas fa-envelope cursor"   onclick="modalCadEmails(${element.id})" title="Cadastrar e-mail no ${element.nome} "></i>
                        </td>
                    </tr>`;
    }
    $("#tbodyBolos").html(html);
    hideLoading();
}

function formCadastrarBolo() {

    $("#formCadastrarBolo").submit(function(e) {
        e.preventDefault();
        loading();
        $.ajax({
            type: "GET",
            url: "bolos/create",
            data: $(this).serialize(),
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#alertCB").html(`<div class="alert text-center alert-success" role="alert">
                                     Bolo <b>${$("#nomeCB").val()}</b> cadastrado com sucesso!
                                    </div>`);
                hideLoading();
                setTimeout(() => {
                    $("#modalCadBolos").modal('hide');
                }, 1300);
                listBolos(data);
            },
            error: function(xhr) {
                $("#alertCB").html(`<div class="alert text-center alert-danger" role="alert">
               Erro ao cadastrar: ${xhr.responseText}
               </div>`);
                hideLoading();
            }
        });

    });
}

function editBolo(id) {
    $.ajax({
        type: "GET",
        url: "bolos/" + id,
        data: $(this).serialize(),
        cache: false,
        processData: false,
        contentType: false,
        success: function(data) {
            $("#boloEB").val(data.id);
            $("#nomeEB").val(data.nome);
            $("#pesoEB").val(maskMoney(data.peso));
            $("#valorEB").val(maskMoney(data.valor));
            $("#quantidadeEB").val(data.quantidade);
            $("#imagemEB").val(data.imagem);
            $("#modalEdiBolos").modal('show');
            hideLoading();
        },
        error: function(xhr) {
            $("#alertCB").html(`<div class="alert text-center alert-danger" role="alert">
           Erro ao buscar: ${xhr.responseText}
           </div>`);
            hideLoading();
        }
    });
}

function formEditarBolo() {
    $("#formEditarBolo").submit(function(e) {
        e.preventDefault();
        loading();
        const id = $("#boloEB").val();
        $.ajax({
            type: "PUT",
            url: "bolos/" + id + "?" + $(this).serialize(),
            // data: $(this).serialize(),
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#alertEB").html(`<div class="alert text-center alert-success" role="alert">
                                 Bolo <b>${$("#nomeCB").val()}</b> Editado com sucesso!
                                </div>`);
                hideLoading();
                setTimeout(() => {
                    $("#modalEdiBolos").modal('hide');
                }, 1300);
                listBolos(data);
            },
            error: function(xhr) {
                $("#alertEB").html(`<div class="alert text-center alert-danger" role="alert">
           Erro ao editar: ${xhr.responseText}
           </div>`);
                hideLoading();
            }
        });
    });
}

function deleteBolo(id) {

    loading();

    $.ajax({
        type: "DELETE",
        url: `bolos/${id}`,
        success: function(data) {
            listBolos(data);
        },
        error: function(xhr) {
            //     let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
            //                 ${xhr.responseText}
            //             </div>
            // `;
            //     $("#htmlBolos").html(html);
            hideLoading();
        }
    });
}