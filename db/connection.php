<?php 

class Database {
    private $host = 'localhost';
    private $db_name = 'tcc-mmm';
    private $username = 'root';
    private $password = '';

    public $conn;

    /**
     * Estabelece e retorna a conexão PDO.
     * @return PDO O objeto de conexão PDO.
     */
    public function getConnection(){
        $this->conn = null;
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";

        $options = [
            // CRUCIAL: Faz com que o PDO lance exceções em caso de erro SQL (melhor tratamento)
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
            
            // Define o padrão de fetch para array associativo
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
            
            // Desliga a emulação de prepared statements (mais seguro e eficiente para MySQL)
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
        }
        catch (PDOException $exception) {
            die("Erro de conexão: " . $exception->getMessage());
        }
        
        return $this->conn;
    }
}
?>