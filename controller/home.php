<!-- extends base class -->
<?php
require_once 'base.php';

class HomeController extends Controller {
    public function index() {
        $this->render('home', ['items' => $this->model('ShoppingList')->getItems()]);
    }
}