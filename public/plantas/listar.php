<a href="/sistema_plantas/plantas/formulario">Cadastrar Nova Planta</a> | <a href="/sistema_plantas/usuarios/lista">Listar Usuários</a> | <a href="/sistema_plantas/cuidados/lista">Listar Cuidados</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome Científico</th>
            <th>Nome Popular</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parametro as $planta) { ?>
            <tr>
                <td><?= $planta["id"] ?></td>
                <td><?= $planta["nome_cientifico"] ?></td>
                <td><?= $planta["nome_popular"] ?></td>
                <td>
                    <a href="/sistema_plantas/plantas/formularioalterar?id=<?= $planta["id"] ?>">Alterar</a>
                    <a href="/sistema_plantas/plantas/excluir?id=<?= $planta["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
            </tr>
        <?php } ?>
    </tbody>
</table>