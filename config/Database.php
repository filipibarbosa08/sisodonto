<?php
class Database {
    private static $dbHost = 'localhost';
    private static $dbName = 'odonto';
    private static $dbUser = 'root';
    private static $dbPass = '1234';
    private static $connection = null;

    // Impede instâncias de serem criadas diretamente
    private function __construct() {}

    // Conecta ao banco de dados usando PDO
    public static function conectar() {
        if (self::$connection == null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,
                    self::$dbUser,
                    self::$dbPass
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

    // Fecha a conexão
    public static function desconectar() {
        self::$connection = null;
    }
}
?>
