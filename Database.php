<?php

class Database
{
    public $connection;

    /**
     * Constructor for Database class
     *
     * @param array $config Configuration array containing database connection details
     * @return void
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [ // NOSONAR S2003
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];

        try {
            $this->connection = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}"); // NOSONAR S2003
        }
    }

    /**
     * Query the database
     *
     * @param string $query SQL query string
     * @return PDOStatement
     */
    public function query($query, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);

            foreach ($params as $param => $value) {
                $stmt->bindValue(":" . $param, $value);
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Query failed: {$e->getMessage()}"); // NOSONAR S2003
        }
    }
}