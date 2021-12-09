<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header("Content-Type: text/html; charset=UTF-8", true);

require_once('../model/Pessoa.php');
require_once('../dao/PessoaDAO.php');

$dao = null;

try {
    $obj = new Pessoa();
    $obj->nome = $_POST["nome"];
    $obj->email = $_POST["email"];
    $obj->idade = $_POST["idade"];
    $obj->datanasc = $_POST["datanasc"];
    $obj->Escolaridade = $_POST["esc"];
    $obj->formacao = $_POST["form"];



    if ($obj->validarCampos()) {
        $dao = new PessoaDAO();
        $codigo = $dao->insert($obj);
        if (!empty($codigo)) {
            echo $codigo;
        }
    } else {
        header('Error', true, 422);
        echo "Dados inválidos";
    }
} catch (Exception $e) {
    header('Erro', true, 500);
    echo $e->getMessage();
}
