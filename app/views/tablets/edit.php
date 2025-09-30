
<?php require '_header.php'; ?>

<div class="card">
    <div class="card-header">
        <h2>Editar Tablet</h2>
    </div>
    <div class="card-body">
        <form action="index.php?action=edit&id=<?php echo $tablet['tab_cod']; ?>" method="POST">
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
                <label for="tabDescricao" class="form-label">Descricao</label>
                <input type="text" class="form-control" id="tabDescricao" name="tabDescricao" value="<?php echo htmlspecialchars($tablet['tab_descricao']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tabFabricante" class="form-label">Fabricante</label>
                <input class="form-control" id="tabFabricante" name="tabFabricante" value="<?php echo htmlspecialchars($tablet['tab_fabricante']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tabNumeroSerie" class="form-label">Numero Serie</label>
                <input class="form-control" id="tabNumeroSerie" name="tabNumeroSerie" value="<?php echo htmlspecialchars($tablet['tab_numeroserie']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="tabAcessorios" class="form-label">Acessorios</label>
                <textarea class="form-control" id="tabAcessorios" name="tabAcessorios" rows="3"><?php echo htmlspecialchars($tablet['tab_acessorios']); ?></textarea>
            </div>

            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="index.php?action=listar" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php require '_footer.php'; ?>
