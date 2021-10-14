
<!-- Modal Bolos -->
<!--    Cadastrar Bolo-->
<div class="modal fade" id="modalCadBolos" tabindex="-1" aria-labelledby="modalCadastrarBolo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Bolo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCadastrarBolo"  enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nomeCB" name="nome" placeholder="Nome do bolo"
                            aria-describedby="nome" required>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Gramas</span>
                            <input type="text" class="form-control money" id="pesoCB" name="peso" placeholder="Peso do bolo"
                                aria-describedby="peso" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control money" id="valorCB" name="valor" placeholder="Valor do bolo"
                            aria-describedby="valor" required>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control number" id="quantidadeCB" name="quantidade" placeholder="Quantidade do bolo"
                            aria-describedby="quantidade" rows="4" required>
                    </div>
                    <div id="alertCB">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--    Editar Bolo-->
<div class="modal fade" id="modalEdiBolos" tabindex="-1" aria-labelledby="modalEditarBolo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Bolo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEditarBolo"  enctype="multipart/form-data">
                <input type="hidden" name="id" id="boloEB">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nomeEB" name="nome" placeholder="Nome do bolo"
                            aria-describedby="nome" required>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Gramas</span>
                            <input type="text" class="form-control money" id="pesoEB" name="peso" placeholder="Peso do bolo"
                                aria-describedby="peso" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control money" id="valorEB" name="valor" placeholder="Valor do bolo"
                            aria-describedby="valor" required>
                        </div>
                        
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control number" id="quantidadeEB" name="quantidade" placeholder="Quantidade do bolo"
                            aria-describedby="quantidade" rows="4" required>
                    </div>
                    <div id="alertEB">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Emails -->
<!--    Cadastrar Email-->
<div class="modal fade" id="modalCadEmails" tabindex="-1" aria-labelledby="modalCadastrarBolo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCadastrarEmail"  enctype="multipart/form-data">
                <input type="hidden" name="bolo" id="boloCE">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nomeCE" name="nome" placeholder="Nome"
                            aria-describedby="nome" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="emailCE" name="email" placeholder="E-mail"
                            aria-describedby="email" required>
                    </div>
                    <div id="alertCE">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>