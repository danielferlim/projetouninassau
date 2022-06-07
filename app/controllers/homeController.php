<?php
// Namespace dos controllers
namespace Controllers;
// Views que chamaremos
use Views\mainView;

// Classe do controller
class homeController{

    public function index(){
    mainView::render('index');
    }

    public function formTicket(){    
    mainView::render('formTicket');
    }

    public function creatingTicket(){    
        mainView::render('creatingTicket');
    }

    public function followTicket(){    
        mainView::render('followTicket');
    }

    public function adminLogin(){
        mainView::renderAdmin('adminLogin');
    }

    public function adminLogout(){
        mainView::renderAdmin('adminLogout');
    }

    public function adminConsole(){
        mainView::renderAdmin('adminConsole');
    }

    public function adminRegister(){
        mainView::renderAdmin('adminRegister');
    }

    public function adminActions(){
        mainView::renderAdmin('adminActions');
    }

    public function tableauOne(){
        mainView::renderAdmin('tableauOne');
    }


}