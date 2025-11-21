<a href="/sistema_plantas/usuarios/formulario">Cadastrar Novo Usuário</a> | <a href="/sistema_plantas/plantas/lista">Listar Plantas</a> | <a href="/sistema_plantas/cuidados/lista">Listar Cuidados</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parametro as $usuario) { ?>
            <tr>
                <td><?= $usuario["id"] ?></td>
                <td><?= $usuario["nome"] ?></td>
                <td><?= $usuario["email"] ?></td>
                <td>
                    <a href="/sistema_plantas/usuarios/formularioalterar?id=<?= $usuario["id"] ?>">Alterar</a>
                    <a href="/sistema_plantas/usuarios/excluir?id=<?= $usuario["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>