<!DOCTYPE html>
<html>
    <head>
        <title>Alterar Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Linkando arquivos CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-- Linkando arquivos JS-->
        <script type="text/javascript" src="../Gustavo_Alves/Js/script.js"></script>

        <div class="container">
            <div class="col-md-6">
                
                <h2>Alterar Clientes</h2><br/>

                <?php
                    require_once("../Gustavo_Alves/ClassPHP/clienteClass.php"); //importar arquivos da classe clientes
                    $objCliente = new clienteClass(); //Instanciando o osbejto

                    $id_cliente = $_GET['id_cliente']; //Recebendo o id do cliente enviado via link

                    $tableCliente = $objCliente->retClienteEditar($id_cliente); //Chamndo a função para retorar os dados de todos os clientes cadastrados
                    $max = sizeof($tableCliente);  //pegando o numero maximo do Array

                    for ($i = 0; $i < $max; $i++) {
                        //pegando os dados dos clientes de cada possição do array
                ?>

                    <!-- Criando o formulario de cadastro -->
                    <form action="" method="post" name="AlterarCliente">
                    <div class="form-group row">
                        <label for="textNomeCliente" class="col-4 col-form-label">Nome do Cliente:</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card-o"></i>
                            </div>
                            </div> 
                            <input id="textNomeCliente" name="txtNomeCliente" placeholder="Digite o nome completo" value = "<?php echo $tableCliente[$i]["nome_cliente"] ?>" type="text" required="required" aria-describedby="textNomeClienteHelpBlock" class="form-control">
                        </div> 
                        <span id="textNomeClienteHelpBlock" class="form-text text-muted">Campo obrigatório!</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="textEmailCliente" class="col-4 col-form-label">E-mail do Cliente:</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            </div> 
                            <input id="textEmailCliente" name="txtEmailCliente" placeholder="Ex: nome@dominio.com.br" value = "<?php echo $tableCliente[$i]["email_cliente"] ?>" type="text" required="required" aria-describedby="textEmailClienteHelpBlock" class="form-control">
                        </div> 
                        <span id="textEmailClienteHelpBlock" class="form-text text-muted">Campo obrigatório!</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="textTelefoneCliente" class="col-4 col-form-label">Telefone do Cliente:</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </div>
                            </div> 
                            <input id="textTelefoneCliente" name="txtTelefoneCliente" placeholder="(00)0 0000-0000" value = "<?php echo $tableCliente[$i]["telefone_cliente"] ?>" type="text" required="required" aria-describedby="textTelefoneClienteHelpBlock" class="form-control">
                        </div> 
                        <span id="textTelefoneClienteHelpBlock" class="form-text text-muted">Campo obrigatório!</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtSenhaCliente" class="col-4 col-form-label">Senha do Cliente:</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-500px"></i>
                            </div>
                            </div> 
                            <input id="txtSenhaCliente" name="txtSenhaCliente" value = "<?php echo $tableCliente[$i]["senha_cliente"] ?>" type="password" class="form-control" required="required" aria-describedby="txtSenhaClienteHelpBlock">
                        </div> 
                        <span id="txtSenhaClienteHelpBlock" class="form-text text-muted">Campo Obrigatório!</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtDateNascCliente" class="col-4 col-form-label">Data de Nasc. do Cliente:</label> 
                        <div class="col-8">
                        <div class="input-group date">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-calendar"></i>
                            </div>
                            </div>
                            <input id="txtDateNascCliente" name="txtDateNascCliente" value = "<?php echo $tableCliente[$i]["data_nasc_cliente"] ?>" type="date" class="form-control" required="required" aria-describedby="txtDateNascClienteHelpBlock">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div> 
                        <span id="txtDateNascClienteHelpBlock" class="form-text text-muted">Campo Obrigatório</span>
                        </div>
                    </div>
                    <!-- Botões principais do sistema-->
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                        <button name="btnAlterar" type="submit" class="btn btn-primary">Alterar</button>
                        <a href="javascript:void(0)" class="btn btn-secondary" role="button" aria-pressed="true" onclick="clickCancelar()">Cancelar</a>
                        <a href="../Gustavo_Alves/index.php" class="btn btn-secondary" role="button" aria-pressed="true" >Voltar</a>
                        </div>
                    </div>
                    </form>
                <?php
                    };
                ?>

            </div>
        </div>
        

        <?php
            require_once('../Gustavo_Alves/ClassPHP/clienteClass.php'); //importar arquivos da classe clientes
            $objCliente = new clienteClass(); //Instanciando o osbejto

            if (isset($_POST['btnAlterar'])) {
                
                //Recevbendo os dados preenchido do fomulario
                $nome_cliente = $_POST['txtNomeCliente'];
                $email_cliente = $_POST['txtEmailCliente'];
                $telefone_cliente = $_POST['txtTelefoneCliente'];
                $senha_cliente = $_POST['txtSenhaCliente'];
                $date_nasc_cliente = $_POST['txtDateNascCliente'];
                
                //Enviando os dados para o obejto cliente
                $objCliente->setId_cliente($id_cliente);
                $objCliente->setNome_cliente($nome_cliente);
                $objCliente->setEmail_cliente($email_cliente);
                $objCliente->setTelefone_cliente($telefone_cliente);
                $objCliente->setSenha_cliente($senha_cliente);
                $objCliente->setDate_nasc_cliente($date_nasc_cliente);

                $objCliente->editarCliente($objCliente); //Chamndo a função para autorizar os dados do cliente

                //Impirndo a informação do cadastro realizado.
                echo "<script> 
                if (window.confirm('Os dados do cliente $nome_cliente, foi alterado com SUCESSO!')) {
                    window.location.href='../Gustavo_Alves/index.php';
                };
                </script>";
            }
        ?>
    </body>
</html>