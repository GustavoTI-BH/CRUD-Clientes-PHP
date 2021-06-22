<?php

class clienteClass {

    //Criando as varaiveis
    private $id_cliente;
    private $nome_cliente;
    private $email_cliente;
    private $telefone_cliente;
    private $senha_cliente;
    private $date_nasc_cliente;

    //criando os atributos Gets e Sets
    function getId_cliente() {
        return $this->id_cliente;
    }

    function getNome_cliente() {
        return $this->nome_cliente;
    }

    function getEmail_cliente() {
        return $this->email_cliente;
    }

    function getTelefone_cliente() {
        return $this->telefone_cliente;
    }

    function getSenha_cliente() {
        return $this->senha_cliente;
    }

    function getDate_nasc_cliente() {
        return $this->date_nasc_cliente;
    }

    function setId_cliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    function setNome_cliente($nome_cliente) {
        $this->nome_cliente = $nome_cliente;
    }

    function setEmail_cliente($email_cliente) {
        $this->email_cliente = $email_cliente;
    }

    function setTelefone_cliente($telefone_cliente) {
        $this->telefone_cliente = $telefone_cliente;
    }

    function setSenha_cliente($senha_cliente) {
        $this->senha_cliente = $senha_cliente;
    }

    function setDate_nasc_cliente($date_nasc_cliente) {
        $this->date_nasc_cliente = $date_nasc_cliente;
    }

    //------------------- METODOS CRUD ------------------
    //Importa arquivos de classe e instanciar conexao
    //ja informando os dados de conexão

    //Função para retornar dos dados dos clientes cadastrados
    public function retClientes() {

        //importar arquivos da classe e instancias
        //conexaoClass já informando os dados de conexão
        require_once('conexaoClass.php');
        $objConexao = new conexaoClass("localhost", "root", "", "teste_basico");
        
        // chama metodos da classe conexão que permite retornar dados
        $tableClientes = $objConexao->retornarDados("SELECT * FROM clientes;");

        //retormar matriz com os dados encontrados
        return  $tableClientes;    
    }
    
    //Função para retornar dos dados do cliente que são alterados
    public function retClienteEditar($id_cliente) {

        //importar arquivos da classe e instancias
        //conexaoClass já informando os dados de conexão
        require_once('conexaoClass.php');
        $objConexao = new conexaoClass("localhost", "root", "", "teste_basico");
        
        // chama metodos da classe conexão que permite retornar dados
        $tableCliente = $objConexao->retornarDados("SELECT * FROM clientes WHERE id_cliente = '$id_cliente';");

        //retormar matriz com os dados encontrados
        return $tableCliente;    
    }

    //Função para cadatsrar os dados do cliente
    public function inserirCliente($objCliente) {
        //importar arquivos da classe e instancias ConexaoClass
        //ja informando os dados de conexão
        require_once('conexaoClass.php');
        $objConexao = new conexaoClass("localhost", "root", "", "teste_basico");

        //Apenas para simplificar a criação da query
        $nome_cliente = $objCliente->getNome_cliente();
        $email_cliente = $objCliente->getEmail_cliente();
        $telefone_cliente = $objCliente->getTelefone_cliente();
        $senha_cliente = $objCliente->getSenha_cliente();
        $date_nasc_cliente = $objCliente->getDate_nasc_cliente();

        // chama metodos de calsse conexão que permite executar
        $objConexao->executarComandoSQL("INSERT INTO `clientes` (`nome_cliente`, `email_cliente`, `telefone_cliente`, `senha_cliente`,`data_nasc_cliente`) 
        VALUES ('$nome_cliente', '$email_cliente', '$telefone_cliente','$senha_cliente', '$date_nasc_cliente');");
        
        return TRUE;
    }

    //Função para editar os dados do cliente cadastrado
    public function editarCliente($objCliente) {
        
        //importar arquivos da classe e instancias ConexaoClass
        //ja informando os dados de conexão
        require_once('conexaoClass.php');
        $objConexao = new conexaoClass("localhost", "root", "", "teste_basico");

        //Apenas para simplificar a criação da query
        $id_cliente = $objCliente->getId_cliente();
        $nome_cliente = $objCliente->getNome_cliente();
        $email_cliente = $objCliente->getEmail_cliente();
        $telefone_cliente = $objCliente->getTelefone_cliente();
        $senha_cliente = $objCliente->getSenha_cliente();
        $date_nasc_cliente = $objCliente->getDate_nasc_cliente();
        
        // chama metodos de calsse conexão que permite executar
        $objConexao->executarComandoSQL("UPDATE clientes SET `nome_cliente`='$nome_cliente', `email_cliente`='$email_cliente', `telefone_cliente`='$telefone_cliente', 
            `senha_cliente`='$senha_cliente', `data_nasc_cliente`='$date_nasc_cliente' WHERE `id_cliente` = '$id_cliente';");

        return TRUE;
    }

    //Função para deletar o cliente cadastrado
    public function deletarCliente($id_cliente) {
        //importar arquivos da classe e instancias ConexaoClass
        //ja informando os dados de conexão

        require_once('conexaoClass.php');
        $objConexao = new conexaoClass("localhost", "root", "", "teste_basico");

        //Apenas para simplificar a criação da query
        $id_cliente = $objCliente->getId_cliente();

        // chama metodos de calsse conexão que permite executar
        $objConexao->executarComandoSQL("DELETE FROM clientes WHERE `id_cliente` = '$id_cliente';");
        
        return TRUE;
    }

   
}
