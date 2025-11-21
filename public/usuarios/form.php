<form method="POST" action="/sistema_plantas/usuarios/<?= isset($parametro) ? 'alterar' : 'inserir' ?>">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?= isset($parametro) ? $parametro[0]["nome"] : '' ?>" />
    <br>
    <label>Email:</label>
    <input type="email" name="email" value="<?= isset($parametro) ? $parametro[0]["email"] : '' ?>" />
    <br>
    <?php if (isset($parametro)) { ?>
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>" />
    <?php } ?>
    <input type="submit" value="Enviar" />
</form>