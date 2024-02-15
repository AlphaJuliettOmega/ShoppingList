<!-- simple db pdo wrapper -->
<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'shoppinglistdb';
    private $dbh;
    private $error;
    private $stmt;
    
    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        // Create a new PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error; // Display the error message
        }
    }

    // Prepare statement with query
    public function query($query)
    {
        if ($this->dbh) {
            $this->stmt = $this->dbh->prepare($query);
        } else {
            echo "Database connection is not established.";
        }
    }

    // Execute the prepared statement with error handling
    public function execute()
    {
        try {
            return $this->stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

    // Bind values for safe query handling
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Get result set as array of objects
    public function resultSet() {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
}