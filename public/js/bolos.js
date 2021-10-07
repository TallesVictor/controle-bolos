$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    hideLoading();
    formCadastrarNoticia();

});


function htmlNoticias() {
    let noticias = $("#noticias").val();
    let html = '';
    loading();
    if (!noticias.trim()) {
        listAll();
    } else {
        $.ajax({
            type: "GET",
            url: `/noticia/search/${noticias}`,
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    html += corpoNoticia(element);
                }
                $("#htmlNoticias").html(html);
                hideLoading();
            },
            error: function(xhr) {
                let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
                                    ${xhr.responseText}
                                </div>
                    `;
                $("#htmlNoticias").html(html);
                hideLoading();
            }
        });

    }
}

function abrirNoticia(id) {
    let html = '';
    loading();
    $.ajax({
        type: "GET",
        url: `/noticia/${id}`,
        success: function(data) {
            for (let i = 0; i < data.length; i++) {
                const element = data[i];
                let texto = element.texto;
                let categoria = capitalizeFirstLetter(element.categoria);
                let modificado = element.updated_at.substr(0, 10).split('-');
                modificado = modificado[2] + "/" + modificado[1] + "/" + modificado[0];
                html += `<div class="col-md-12 col-sm-12 col-xs-12 pt-2 pb-3">
                                   <div class="card p-3">
                                     <label class="text-primary cursor" onclick="listAll()"><i class="fas fa-arrow-circle-left"></i> Voltar</label>
                                     <label class="text-secondary fs-6">${categoria}</label>
                                     <h2 class=" text-center">${element.titulo}</h2>
                                     <hr class="m-1">
                                         <img class="m-auto p-1 shadow-sm" style="border-radius: 10px;width: 25rem;"
                                             src="/${element.img}" alt="${element.titulo}">
                                         <div class="card-body">
                                             <p class="card-text"> ${texto}</p>

                                             <p class="text-end text-secondary fw-lighter fst-italic"" >Autor: ${element.autor}  |   Modificado em ${modificado}</p>
                                         </div>
                                     </div>
                              </div>`;
            }
            $("#htmlNoticias").html(html);
            hideLoading();
        },
        error: function(xhr) {
            let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
                                    ${xhr.responseText}
                                </div>
                    `;
            $("#htmlNoticias").html(html);
            hideLoading();
        }
    });
}

function listAll() {
    let html = '';
    loading();
    if ($("#noticias").val().trim()) {
        htmlNoticias();
    } else {
        $.ajax({
            type: "GET",
            url: `/noticia`,
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    let texto = element.texto.substr(0, 150) + "...";
                    html += corpoNoticia(element);
                }
                $("#htmlNoticias").html(html);
                hideLoading();
            },
            error: function(xhr) {
                let html = `<div class="col pt-2 pb-3 mt-4 alert-danger text-center">
                            ${xhr.responseText}
                        </div>
            `;
                $("#htmlNoticias").html(html);
                hideLoading();
            }
        });
    }
}

function corpoNoticia(element) {
    let texto = element.texto.substr(0, 300) + "...";
    let categoria = capitalizeFirstLetter(element.categoria);

    let html = `<div class="col-md-10 col-sm-10 col-xs-12 pt-2 pb-3">
                    <div class="row bg-white shadow-sm border rounded zoom">
                         <div class="col-md-3">
                             <img class="m-auto p-1 shadow-sm" style="border-radius: 10px;width: 100%;"
                             src="/${element.img}" alt="${element.titulo}">
                         </div>
                         <div class="col-md">
                             <div class="row pt-2">
                                 <label class="text-secondary">${categoria}</label>
                             </div>
                             <div class="row px-3">
                                <h3 class="fs-2 text-primary cursor" onclick="abrirNoticia(${element.id})"> ${element.titulo}</h3>
                                 <p class="card-text"> ${texto}...</p>
                                 <button class="btn btn-outline-primary w-100" onclick="abrirNoticia(${element.id})">Saber
                                     Mais</button>
                             </div>
                         </div>
                     </div>
                 </div>
            `;

    return html;

}


function capitalizeFirstLetter(string) {
    string = string.toLowerCase();
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function formCadastrarNoticia() {

    $("#formCadastrarNoticia").submit(function(e) {
        e.preventDefault();
        loading();

        $.ajax({
            type: "POST",
            url: "create",
            data: new FormData(this),
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#alertCN").html(`<div class="alert text-center alert-success" role="alert">
                                     Cadastrado com sucesso!
                                    </div>`);
                hideLoading();
            },
            error: function(xhr) {
                $("#alertCN").html(`<div class="alert text-center alert-danger" role="alert">
               Erro ao cadastrar: ${xhr.responseText}
               </div>`);
                hideLoading();
            }
        });

    });
}