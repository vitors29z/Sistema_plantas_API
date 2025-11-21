<?php
?>
<form method="POST" action="/sistema_plantas/cuidados/<?= isset($parametro['cuidado']) ? 'alterar' : 'inserir' ?>">
    <label>Usuário:</label>
    <select name="usuario_id">
        <?php foreach ($parametro["usuarios"] as $usuario) { ?>
            <option value="<?= $usuario["id"] ?>" <?= (isset($parametro["cuidado"]) && $parametro["cuidado"][0]["usuario_id"] == $usuario["id"]) ? 'selected' : '' ?>>
                <?= $usuario["nome"] ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <label>Planta:</label>
    <select name="planta_id">
        <?php foreach ($parametro["plantas"] as $planta) { ?>
            <option value="<?= $planta["id"] ?>" <?= (isset($parametro["cuidado"]) && $parametro["cuidado"][0]["planta_id"] == $planta["id"]) ? 'selected' : '' ?>>
                <?= $planta["nome_popular"] ?>
            </option>
        <?php } ?>
    </select>
    <br>
    <label>Tipo de Cuidado:</label>
    <input type="text" name="tipo_cuidado" value="<?= isset($parametro["cuidado"]) ? $parametro["cuidado"][0]["tipo_cuidado"] : '' ?>" />
    <br>
    <label>Frequência (dias):</label>
    <input type="number" name="frequencia" value="<?= isset($parametro["cuidado"]) ? $parametro["cuidado"][0]["frequencia"] : '' ?>" />
    <br>
    <?php if (isset($parametro["cuidado"])) { ?>
        <input type="hidden" name="id" value="<?= $parametro["cuidado"][0]["id"] ?>" />
    <?php } ?>
    <input type="submit" value="Enviar" />
</form>