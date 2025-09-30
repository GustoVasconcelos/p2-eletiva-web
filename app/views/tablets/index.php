<?php require '_header.php'; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Tablets</h2>
        <a href="index.php?action=create" class="btn btn-primary">Cadastrar Tablet</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Fabricante</th>
                    <th>Numero de Série</th>
                    <th>Acessórios</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($tablet = $tablets->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tablet['tab_descricao']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tab_fabricante']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tab_numeroserie']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tab_acessorios']); ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $tablet['tab_cod']; ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?action=delete&id=<?php echo $tablet['tab_cod']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '_footer.php'; ?>