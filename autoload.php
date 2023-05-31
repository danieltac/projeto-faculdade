<?php
spl_autoload_register(
    function( string $nomeCompletoDaClasse)
    {
        $caminhoCompleto = str_replace('Back\\Faculdade','..\src', $nomeCompletoDaClasse);
        $caminhoArquivo = str_replace('\\', '/', $caminhoCompleto);

        
        $caminhoArquivo .= ".php";

        if(file_exists($caminhoArquivo)){
            echo $caminhoArquivo;
            require_once $caminhoArquivo;
        }
    }
);