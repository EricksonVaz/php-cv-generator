<?php

namespace app\models;

class Competencia
{
    public string $tecnologia;
    public string $nivel;
    public string $versao;

    public function __construct($tecnologia, $nivel, $versao)
    {
        $this->tecnologia = Curriculum::cleanInput($tecnologia);
        $this->nivel = Curriculum::cleanInput($nivel);
        $this->versao = Curriculum::cleanInput($versao);
    }
}
