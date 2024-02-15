<!-- base Controller class to extend from with render methods and access to pdo -->
<?php
class Controller {
    // protected $db;
    // protected $view;
    protected $model;
    public function __construct() {
        // figure out how to SQL here:
        // $this->db = new Database;
    }
    public function model($model) {
        require_once '../app/model/' . $model . '.php';
        return new $model();
    }
    // render function displays specified view files with data
    public function render($view, $data = []) {
        require_once __DIR__ . '/../view/' . $view . '.php';
    }

    
}
?>