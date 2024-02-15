<!-- extends base class -->
<?php
require_once 'base.php';

class HomeController extends Controller {
    // index handles all actions for the home page ie. add/edit/delete
    public function index() {

        $this->checkPost();
        $this->render('home', ['items' => $this->model('ShoppingList')->getItems()]);
    }

    // check for post
    public function checkPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // check action type
            if ($_POST['action'] == 'create') {
                $this->checkAddItem($_POST);
            } else if ($_POST['action'] == 'edit') {
                $this->checkEditItemTitle($_POST);
            } else if ($_POST['action'] == 'check') {
                $this->checkEditItemToggle($_POST);
            } else if ($_POST['action'] == 'delete') {
                $this->checkDeleteItem($_POST);
            }
        }
    }

    // handler for post request
    public function checkAddItem($data) {
        // sanitize post array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // init data array
        $data = [
            'product_title' => trim($_POST['product_title']),
            'product_title_err' => ''
        ];
        // validate product title
        if (empty($data['product_title'])) {
            $data['product_title_err'] = 'Please enter product title';
        }
        // if no errors
        if (empty($data['product_title_err'])) {
            // add item via model
            if ($this->model('ShoppingList')->addItem($data)) {
                // redirect to home
                header('location: /');
            } else {
                die('Something went wrong');
            }
        } else {
            // render view with errors
            $this->render('home', $data);
        }
    }

    // handler for edit request
    public function checkEditItemTitle($data) {
        // init data array
        $data = [
            'id' => $data['id'],
            'product_title' => $data['product_title']
        ];
        // update item via model
        if (!$this->model('ShoppingList')->editItemTitle($data)) {
           
            die('Something went wrong');
        }
    }
    // handler for edit request
    public function checkEditItemToggle($data) {
        var_dump($data);
        // init data array
        $data = [
            'id' => $data['id'],
            'is_checked' => $data['is_checked']
        ];
        // update item via model
        if (!$this->model('ShoppingList')->toggleCheckedItem($data)) {

            die('Something went wrong');
        }
    }
    // handler for delete request
    public function checkDeleteItem($data) {
        var_dump($data);
        // delete item via model
        if (!$this->model('ShoppingList')->deleteItem($data['id'])) {
            die('Something went wrong');
        }
    }

}