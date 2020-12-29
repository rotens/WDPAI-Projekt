<?php 

session_start();
require_once 'AppController.php';

class DefaultController extends AppController 
{
    
    public function index() {
        if (isset($_SESSION['user'])) {
            $this->render('home'); 
        } 
        else {
            $this->render('login');
        }
    }

    public function home() {
        if (isset($_SESSION['user'])){
            $this->render('home'); 
        } 
        else {
            $this->render('login');
        }
    }

    public function user() {
        if (isset($_SESSION['user'])){
            $this->render('user'); 
        } 
        else {
            $this->render('login');
        }
    }

    public function search() {
        if (isset($_SESSION['user'])){
            $this->render('search'); 
        } 
        else {
            $this->render('login');
        } 
    }

    public function statistics() {
        if (isset($_SESSION['user'])){
            $this->render('statistics'); 
        } 
        else {
            $this->render('login');
        }
    }

    public function change_password() {
        if (isset($_SESSION['user'])){
            $this->render('change_password'); 
        } 
        else {
            $this->render('login');
        } 
    }
}