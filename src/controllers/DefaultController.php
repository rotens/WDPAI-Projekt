<?php 

require_once 'AppController.php';

class DefaultController extends AppController 
{
    
    public function index() {
        $this->render('login');
    }

    public function main() {
        $this->render('main');
    }

    public function user() {
        $this->render('user');
    }

    public function search() {
        $this->render('search');
    }

    public function statistics() {
        $this->render('statistics');
    }
}