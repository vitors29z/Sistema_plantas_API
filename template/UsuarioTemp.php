<?php
namespace template;

class UsuarioTemp implements ITemplate {
    public function cabecalho() {
        echo "<div>Acoes</div>";
    }

    public function rodape() {
        echo "<div></div>";
    }

    public function layout($caminho, $parametro = null) {
        $this->cabecalho();
        include $_SERVER["DOCUMENT_ROOT"] . "\\sistema_plantas" . $caminho;
        $this->rodape();
    }
}