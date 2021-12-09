<?php

class Pessoa
{

    public $id;
    public $nome;
    public $email;
    public $datanasc;
    public $telefone;

    public function __construct()
    {
        $this->id = 0;
        $this->nome = "";
        $this->email = "";
        $this->datanasc = "";
        $this->telefone = "";
    }

    public function validarCampos()
    {
        if (strlen($this->nome) < 3) {
            return false;
        }
        if (strlen($this->email) == 0) {
            return false;
        }
        if (strlen($this->datanasc) == 0) {
            return false;
        }
        return true;
    }

}
