<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header("Content-Type: text/html; charset=UTF-8", true);

require_once('../model/Pessoa.php');
require_once('../dao/PessoaDAO.php');

$dao = null;

try {

    if (!empty($_POST["id"])) {
        $dao = new PessoaDAO();
        $obj = $dao->getById($_POST["id"]);

        //PRIMEIRO VERIFICAR SE O OBJETO NÃO ESTA VAZIO
        if (!empty($obj)) {
            $obj = new Pessoa();
            $obj->nome = $_POST["nome"];
            $obj->email = $_POST["email"];
            $obj->idade = $_POST["idade"];
            $obj->datanasc = $_POST["datanasc"];
            $obj->Escolaridade = $_POST["esc"];
            $obj->formacao = $_POST["form"];

            if ($obj->validarCampos()) {
                $dao = new PessoaDAO();
                $codigo = $dao->update($obj);
                if (!empty($código)) {
                    echo $codigo;
                }
            } else {
            }
        } else {
        }
    } else {
    }
} catch (Exception $e) {
    header('Erro', true, 500);
    echo $e->getMessage();
}
