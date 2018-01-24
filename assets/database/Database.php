<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 19/11/2017
 * Time: 20:30
 */

// classe de conexão com banco de dados
 class Database {
    // não permite existência de uma instância da classe 'Database'
    public function __construct(){
        // comentário
    }

     // função de conexão com o banco
    public function conectar($config){
        // verifica se existe o arquivo de configurações do BD
        if(file_exists("config/{$config}.ini")){
            $db = parse_ini_file("config/{$config}.ini");
        }else{
            throw new Exception("O arquivo {$config} não foi encontrado para conexão com a base de dados.");
        }

        // faz a leitura das informações contida no arquivo de configuração
        $port       =   isset($db['port'])      ? $db['port']       : NULL;
        $host       =   isset($db['host'])      ? $db['host']       : NULL;
        $driver     =   isset($db['driver'])    ? $db['driver']     : NULL;
        $database   =   isset($db['database'])  ? $db['database']   : NULL;
        $username   =   isset($db['username'])  ? $db['username']   : NULL;
        $password   =   isset($db['password'])  ? $db['password']   : NULL;

        // verifica qual o tipo de driver de banco de dados a ser utilizado
        switch ($driver){
            case 'mysql':
                $port = $port ? $port : '3306';
                $conn = new PDO("mysql:host={$host};port={$port};dbname={$database}", $username, $password);
                break;
        }
        // definição para que o PDO lance exceções na ocorrência de erros
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}