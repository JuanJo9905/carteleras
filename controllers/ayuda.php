<?php

class Ayuda extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje ="";
        
    }
    function render(){
        $this->view->render('ayuda/index');
    }
}
?>