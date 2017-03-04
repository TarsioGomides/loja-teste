<?php session_start();//Só de garantia, caso não tenha iniciado em outro lugar ?>
<!--
Serve para tratar usuários:
1 - Não logados tentando acessar alguma funcionalidade
2 - Que tentam logar com informações não existentes
3 - Que logaram com sucesso
-->
<?php
    function mostraAlerta($tipo) {
        if(isset($_SESSION[$tipo])) {
?>
            <p class="alert-<?=$tipo?>"><?=$_SESSION[$tipo]?></p>
<?php
            //após renderizar a mensagem acima, apaga esse campo da sessão, para não ficar aparecendo sempre
            unset($_SESSION[$tipo]);
        }
    }
?>
