<?php
class Upload
{
    private $arquivo;
    private $pasta;

    function __construct($arquivo, $pasta)
    {
        $this->arquivo = $arquivo;
        $this->pasta   = $pasta;
    }

    private function getExtensao()
    {
        //retorna a extensao da imagem
        $ext = explode('.', $this->arquivo['name']);
        return $extensao = strtolower(end($ext));
    }

    private function ehImagem($extensao)
    {
        $extensoes = array('gif', 'jpeg', 'jpg', 'png');     // extensoes permitidas
        if (in_array($extensao, $extensoes)) {
            return true;
        } else {
            return false;
        }
    }

    private function ehDocWord($extensao)
    {
        $extensoes = array('docx', 'odt');     // extensoes permitidas
        if (in_array($extensao, $extensoes)) {
            return true;
        } else {
            return false;
        }
    }

    private function ehPdf($extensao)
    {
        $extensoes = array('pdf');     // extensoes permitidas
        if (in_array($extensao, $extensoes)) {
            return true;
        } else {
            return false;
        }
    }

    private function ehCompactado($extensao)
    {
        $extensoes = array('rar', 'zip');     // extensoes permitidas
        if (in_array($extensao, $extensoes)) {
            return true;
        } else {
            return false;
        }
    }

    public function salvarImagem()
    {
        $extensao = $this->getExtensao();
        if ($this->ehImagem($extensao)) {
            //gera um nome unico para a imagem em funcao do tempo
            $novo_nome = "imagenUser" . time() . '.' . $extensao;
            //localizacao do arquivo 
            $destino = $this->pasta . $novo_nome;
            //move o arquivo
            if (!move_uploaded_file($this->arquivo['tmp_name'], $destino)) {
                if ($this->arquivo['error'] == 1) {
                    return "Tamanho excede o permitido";
                } else {
                    return "Erro " . $this->arquivo['error'];
                }
            }
            if ($this->ehImagem($extensao)) {
                list($tipo, $atributo) = getimagesize($destino); //pega a largura, altura, tipo e atributo da imagem
            }
            return $destino;
        }
        echo '<script type="text/javascript">alert("Arquivo não é imagem");</script>';
    }

    public function salvarDocWord()
    {
        $extensao = $this->getExtensao();
        if ($this->ehDocWord($extensao)) {
            //gera um nome unico para a imagem em funcao do tempo
            $novo_nome = time() . '.' . $extensao;
            //localizacao do arquivo 
            $destino = $this->pasta . $novo_nome;
            //move o arquivo
            if (!move_uploaded_file($this->arquivo['tmp_name'], $destino)) {
                if ($this->arquivo['error'] == 1) {
                    return "Tamanho excede o permitido";
                } else {
                    return "Erro " . $this->arquivo['error'];
                }
            }
            if ($this->ehImagem($extensao)) {
                list($tipo, $atributo) = getimagesize($destino); //pega a largura, altura, tipo e atributo da imagem
            }
            return $destino;
        }
        echo '<script type="text/javascript">alert("Arquivo não é imagem");</script>';
    }
}
