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
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Fabricante</th>
                    <th>Numero de Série</th>
                    <th>Acessórios</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($tablet = $tablets->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tablet['tabCod']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tabDescricao']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tabFabricante']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tabNumeroSerie']); ?></td>
                        <td><?php echo htmlspecialchars($tablet['tabAcessorios']); ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $tablet['id']; ?>" class="btn btn-sm btn-info">Editar</a>
                            <a href="index.php?action=delete&id=<?php echo $tablet['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '_footer.php'; ?>