<!-- Modal -->
<div class="modal fade" id="modalCadastrarNoticia" tabindex="-1" aria-labelledby="modalCadastrarNoticia" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar Notícia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCadastrarNoticia" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor da notícia"
                            aria-describedby="autor" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título da notícia"
                            aria-describedby="titulo" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria da notícia"
                            aria-describedby="categoria" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="texto" name="texto" placeholder="Texto da notícia"
                            aria-describedby="texto" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <div id="imagem" class="form-text">Imagem da notícia</div>
                        <input type="file" class="form-control" id="imagem" name="img" placeholder="Título da notícia"
                            aria-describedby="imagem" required>
                    </div>
                    <div id="alertCN">
                        
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
