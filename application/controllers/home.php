<?php

class Home extends CI_Controller{
    
    public function index(){
        
        $this->load->view('layouts/main');
        $this->load->view('layouts/lp');
        $this->load->view('layouts/footer');
    }

    
    
    
}



?>