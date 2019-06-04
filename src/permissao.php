<?php

class ItemPermissao {

    private $tipoPermissao

    private $url

    public function __construct($tipoPermissao, $url) {
        $this->tipoPermissao = $tipoPermissao;
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }

    public function getTipoPermissao(){
        return $this->tipoPermissao;
    }

    public function possuiPermissao($tipoPermissao){
        return in_array($tipoPermissao, $this->tipoPermissao);
    }
}

?>

<?php

define('Administrativo','Doze', true);
define('Lider','Lider', true);
define('Comprometido','comprometido', true);

$tipoPermissaoTodos = array(Administrativo, Lider, Comprometido);
$tipoPermissaoAdministracao = array(Administrativo);
$tipoPermissaoLider = array(Lider);
$tipoPermissaoComprometido = array(Comprometido);

$arrayPrimissao = array(
    'action_discipulo.php' => new ItemPermissao('action_discipulo.php', $tipoPermissaoTodos);
    'action_macro.php' => new ItemPermissao('action_macro.php', $tipoPermissaoTodos);
    'action_presenca.php' => new ItemPermissao('action_presenca.php', $tipoPermissaoTodos);
    'action_usuario.php' => new ItemPermissao('action_usuario.php', $tipoPermissaoTodos);
    'administrativo.php' => new ItemPermissao('administrativo.php', $tipoPermissaoTodos);
    'cadastro_discipulo.php' => new ItemPermissao('cadastro_discipulo.php', $tipoPermissaoTodos);
    'cadastro_macro.php' => new ItemPermissao('cadastro_macro.php', $tipoPermissaoTodos);
    'cadastro_Usuario.php' => new ItemPermissao('cadastro_Usuario.php', $tipoPermissaoTodos);
    'editar_discipulo.php' => new ItemPermissao('editar_discipulo.php', $tipoPermissaoTodos);
    'editar_macro.php' => new ItemPermissao('editar_macro.php', $tipoPermissaoTodos);
    'estudos.html' => new ItemPermissao('estudos.html', $tipoPermissaoTodos);
    'lista_macro.php' => new ItemPermissao('lista_macro.php', $tipoPermissaoTodos);
    'lista_membro.php' => new ItemPermissao('lista_membro.php', $tipoPermissaoTodos);
    'lista_presenca.php' => new ItemPermissao('lista_presenca.php', $tipoPermissaoTodos);
    'lista_usuario.php' => new ItemPermissao('lista_usuario.php', $tipoPermissaoTodos);
)
 
$path_parts = pathinfo( __FILE__ );
$paginaAtual = $path_parts['basename'];
$nivelAcessoUsuario = $_SESSION['niveisacesso'];

$itemPermissao = $arrayPrimissao[$paginaAtual];

if($itemPermissao->possuiPermissao($nivelAcessoUsuario)){
    //POSSUI PERMISSAO
}else{
    //NÃO POSSUI PERMISSAO
}

function possuiPermissao($paginaAtual)
{
    $nivelAcessoUsuario = $_SESSION['niveisacesso'];
    $itemPermissao = $arrayPrimissao[$paginaAtual];

    return $itemPermissao->possuiPermissao($nivelAcessoUsuario);
}

function ObterPaginaPrincipal()
{
    $nivelAcessoUsuario = $_SESSION['niveisacesso'];

    $paginaPrincipal = array(
        Administrativo => 'administrativo.php',
        Administrativo => 'administrativo.php',
        Lider => 'lider.php'
    )

    return $paginaPrincipal[$nivelAcessoUsuario];
}

?>