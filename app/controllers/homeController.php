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


}