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

    // Get result set as array of objects
    public function resultSet() {
        $this->stmt->execute();
        echo $this->stmt->rowCount() . " records found";
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
}