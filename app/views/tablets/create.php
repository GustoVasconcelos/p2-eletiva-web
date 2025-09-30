<?php require '_header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Nova Tarefa</h2>
    </div>
    <div class="card-body">
        <form action="index.php?action=create" method="POST">
            <?php if (!empty($erros)): ?>
                <div class="alert alert-danger">
                    <strong>Por favor, corrija os erros abaixo:</strong>
                    <ul>
                        <?php foreach ($erros as $erro): ?>
                            <li><?php echo $erro; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="tabDescricao" class="form-label">Descrição</label>
                <input type="text" class="form-control" id="tabDescricao" name="tabDescricao">
            </div>
            <div class="mb-3">
                <label for="tabFabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="tabFabricante" name="tabFabricante">
            </div>
            <div class="mb-3">
                <label for="tabNumeroSerie" class="form-label">Numero de Série</label>
                <input type="text" class="form-control" id="tabNumeroSerie" name="tabNumeroSerie">
            </div>
            <div class="mb-3">
                <label for="tabAcessorios" class="form-label">Acessórios</label>
                <textarea class="form-control" id="tabAcessorios" name="tabAcessorios" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="index.php?action=listar" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require '_footer.php'; ?>