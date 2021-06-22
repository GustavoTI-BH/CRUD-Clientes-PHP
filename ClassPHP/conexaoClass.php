<?php

class ConexaoClass extends mysqli {

    public $host, $user, $passaword,
            $database, $conection;

    public function __construct($host, $user, $passaword, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->passaword = $passaword;
        $this->database = $database;
        $this->connect_me();
    }

    private function connect_me() {
        $this->conection = $this->
                connect($this->host, $this->user, $this->passaword, $this->database);

        if ($this->connect_error) {
            die($this->connect_error);
        }
    }

    public function retornarDados($comandoSql = "")  {
        
         $result = $this->query($comandoSql);
         
         if($this->error){
             return $this->error;
         } else {
             $index = 0;
             while ($row = $result->fetch_assoc()){
                 $data[$index] = $row;
                 $index++;
             }
             return $data;
         }
        
    }
    
    public function executarComandoSQL($comandoSql = "") {
        
        $this->query($comandoSql);
        if($this->error){
            echo '\n deu erro!';
            $erro = $this->error;
            return $erro;
        }else{
            return;
        }
        
    }
}
?>


