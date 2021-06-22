<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Linkando arquivos CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!-- Linkando arquivos JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <div class="container">
            <div class="col-md-6">
                
                <h2>Cadastrar Clientes</h2><br/>

                <!-- Criando o formulario de cadastro -->
                <form action="" method="post" name="cadastrarCliente">
                <div class="form-group row">
                    <label for="textNomeCliente" class="col-4 col-form-label">Nome do Cliente:</label> 
                    <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card-o"></i>
                        </div>
                        </div> 
                        <input id="textNomeCliente" name="txtNomeCliente" placeholder="Digite o nome completo" type="text" required="required" aria-describedby="textNomeClienteHelpBlock" class="form-control">
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
                        <input id="textEmailCliente" name="txtEmailCliente" placeholder="Ex: nome@dominio.com.br" type="text" required="required" aria-describedby="textEmailClienteHelpBlock" class="form-control">
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
                        <input id="textTelefoneCliente" name="txtTelefoneCliente" placeholder="(00)0000-0000" type="text" required="required" aria-describedby="textTelefoneClienteHelpBlock" class="form-control">
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
                        <input id="txtSenhaCliente" name="txtSenhaCliente" type="password" class="form-control" required="required" aria-describedby="txtSenhaClienteHelpBlock">
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
                        <input id="txtDateNascCliente" name="txtDateNascCliente" type="date" class="form-control" required="required" aria-describedby="txtDateNascClienteHelpBlock">
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
                    <button name="btnCadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="javascript:void(0)" class="btn btn-secondary" role="button" aria-pressed="true" onclick="clickCancelar()">Cancelar</a>
                    <a href="../Gustavo_Alves/index.php" class="btn btn-secondary" role="button" aria-pressed="true" >Voltar</a>
                    </div>
                </div>
                </form>

            </div>
        </div>
        

        <?php
            require_once('../Gustavo_Alves/ClassPHP/clienteClass.php'); //importar arquivos da classe clientes
            $objCliente = new clienteClass(); //Instanciando o osbejto

            if (isset($_POST['btnCadastrar'])) {

                //Recevbendo os dados preenchido do fomulario
                $nome_cliente = $_POST['txtNomeCliente'];
                $email_cliente = $_POST['txtEmailCliente'];
                $telefone_cliente = $_POST['txtTelefoneCliente'];
                $senha_cliente = $_POST['txtSenhaCliente'];
                $date_nasc_cliente = $_POST['txtDateNascCliente'];
                
                //Enviando os dados para o obejto cliente
                $objCliente->setNome_cliente($nome_cliente);
                $objCliente->setEmail_cliente($email_cliente);
                $objCliente->setTelefone_cliente($telefone_cliente);
                $objCliente->setSenha_cliente($senha_cliente);
                $objCliente->setDate_nasc_cliente($date_nasc_cliente);

                $objCliente->inserirCliente($objCliente); //Chamndo a função para cadatsrar o cliente

                //Impirndo a informação do cadastro realizado.
                echo "<script> 
                if (window.confirm('O cliente $nome_cliente, foi cadastrado com SUCESSO!')) {
                    window.location.href='../Gustavo_Alves/index.php';
                };
                </script>";
            }
        ?>
    </body>
    <!-- Linkando arquivos JS-->
    <script type="text/javascript" src="../Gustavo_Alves/Js/script.js"></script>
</html>