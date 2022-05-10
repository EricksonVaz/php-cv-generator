<?php

namespace app\models;

class Projecto
{
    public string $nome;
    public string $data;
    public string $contexto;

    public function __construct($nome, $data, $contexto)
    {
        $this->nome = Curriculum::cleanInput($nome);
        $this->data = Curriculum::cleanInput($data);
        $this->contexto = Curriculum::cleanInput($contexto);
    }
}
