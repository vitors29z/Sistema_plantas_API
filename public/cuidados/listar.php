<a href="/sistema_plantas/cuidados/formulario">Cadastrar Novo Cuidado</a> | <a href="/sistema_plantas/plantas/lista">Listar Plantas</a> | <a href="/sistema_plantas/usuarios/lista">Listar Usuários</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Planta</th>
            <th>Tipo de Cuidado</th>
            <th>Frequência (dias)</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parametro as $cuidado) { ?>
            <tr>
                <td><?= $cuidado["id"] ?></td>
                <td><?= $cuidado["usuario_id"] ?></td>
                <td><?= $cuidado["planta_id"] ?></td>
                <td><?= $cuidado["tipo_cuidado"] ?></td>
                <td><?= $cuidado["frequencia"] ?></td>
                <td>
                    <a href="/sistema_plantas/cuidados/formularioalterar?id=<?= $cuidado["id"] ?>">Alterar</a>
                    <a href="/sistema_plantas/cuidados/excluir?id=<?= $cuidado["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
</table>