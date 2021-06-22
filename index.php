<!DOCTYPE html>
<html>
    <head>
        <title>Lista dos Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Linkando arquivos CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../Gustavo_Alves/CSS/estilo.css" media="screen">
        <link rel="stylesheet" href="../Gustavo_Alves/CSS/estilo.css">
    </head>
    <body>
        <div class="container">
            <div class="col-md-6">
                
                <h2>Lista dos Clientes</h2><br/>

                <!-- Criando a tabela com os dados dos clientes cadastrados-->
                <table class="tabelaClientes" id='tabelaClientes'>
                    <thead>
                    <!-- Criando o cabeçalho da tabela -->
                        <tr>
                        <th scope="col"> # </th>
                        <th scope="col"> Nome </th>
                        <th scope="col"> Email </th>
                        <th scope="col"> Telefone </th>
                        <th scope="col"> Senha </th>
                        <th scope="col"> Data de Nascimento </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("../Gustavo_Alves/ClassPHP/clienteClass.php"); //importar arquivos da classe clientes
                            $objCliente = new clienteClass(); //Instanciando o osbejto
        
                            $tableCliente = $objCliente->retClientes(); //Chamndo a função para retorar os dados de todos os clientes cadastrados
                            $max = sizeof($tableCliente); //pegando o numero maximo do Array
        
                            for ($i = 0; $i < $max; $i++) {
                                //pegando os dados dos clientes de cada possição do array
                        ?>
                        <tr>
                            <td scope="row"><?php echo $tableCliente[$i]["id_cliente"]; ?></td>
                            <td><?php echo $tableCliente[$i]["nome_cliente"]; ?></td>
                            <td><?php echo $tableCliente[$i]["email_cliente"]; ?></td>
                            <td><?php echo $tableCliente[$i]["telefone_cliente"]; ?></td>
                            <td><?php echo $tableCliente[$i]["senha_cliente"]; ?></td>
                            <td><?php echo $tableCliente[$i]["data_nasc_cliente"]; ?></td>
                        </tr>

                        <?php  
                            } ?> 
                    </tbody>
                </table>
                <br/>
                <!-- Botões principais do sistema-->
                <div class="form-group row">
                    <div class="offset-4 col-8">
                    <a href="../Gustavo_Alves/cadastrarCliente.php" class="btn btn-secondary" role="button" aria-pressed="true">Cadastrar</a>
                    <a href="javascript:void(0)" class="btn btn-secondary" role="button" aria-pressed="true" onclick="clickAlterar()">Alterar</a>
                    <a href="javascript:void(0)" class="btn btn-secondary" role="button" aria-pressed="true" onclick="clickDeletar()">Deletar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Linkando arquivos JS-->
    <script type="text/javascript" src="../Gustavo_Alves/Js/script.js"></script>
</html>