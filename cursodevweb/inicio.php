<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto MVC - GH</title>

    <link rel="stylesheet" href="src/exemplo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<?php
    require_once ('MVC/model/Pessoa.php');
    require_once ('MVC/dao/PessoaDAO.php');

    //criamos uma nova instancia do objeto DAO
    //fizemos isso pois o objeto contem todas as ações que fizemos no banco
    $pessoaDao = new PessoaDAO();
            //VERIFICAR SE O ID NÃO É VAZIO
            if (!empty($_GET['id'])) {
                $obj = $pessoaDao->getById($_GET['id']);
            } else {
                $obj = new Pessoa();
            }
?>

<body>
    <div class="wrapper">
        <h1>Cadastro</h1>

        <div class="menu">
            <a href="inicio.php" class="destaque">Cadastro</a>
            <a href="lista.php">Lista</a>
            <a href="index.php">Inicio</a>
        </div>

        <h2>Novo cadastro</h2>
    
        <form autocomplete="off">
            <input id="id" name="id" type="hidden" value="<?php echo $obj->id ?>">
            <input type="text" id="nome" name="nome" placeholder="Digite seu Nome!" value="<?php echo $obj->nome ?>" required>
            <input type="email" id="email" name="email" placeholder="Digite seu E-mail!" value="<?php echo $obj->email ?>" required>
            <input type="date" id="datanasc" name="datanasc" placeholder="Data Nascimento" value="<?php echo $obj->datanasc ?>" required>
            <input type="tel" id="telefone" name="telefone" placeholder="Telefone - (xx) xxxxxxxxx" value="<?php echo $obj->telefone ?>" required>
            
            <button id="btnEnviar" type="button">Enviar</button>
        </form>
    </div>
</body>

<script src="src/exemplo.js"></script>

</html>