<form method="POST" action="/sistema_plantas/plantas/<?= isset($parametro) ? 'alterar' : 'inserir' ?>">
    <label>Nome Científico:</label>
    <input type="text" name="nome_cientifico" value="<?= isset($parametro) ? $parametro[0]["nome_cientifico"] : '' ?>" />
    <br>
    <label>Nome Popular:</label>
    <input type="text" name="nome_popular" value="<?= isset($parametro) ? $parametro[0]["nome_popular"] : '' ?>" />
    <br>
    <?php if (isset($parametro)) { ?>
        <input type="hidden" name="id" value="<?= $parametro[0]["id"] ?>" />
    <?php } ?>
    <input type="submit" value="Enviar" />
</form>