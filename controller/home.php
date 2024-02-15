<!-- extends base class -->
<?php
require_once 'base.php';
require_once __DIR__ . '/../model/shopping-list.php';

class HomeController extends Controller {
    public function index() {
        $this->render('home', ['title' => 'Shopping List']);
    }
}