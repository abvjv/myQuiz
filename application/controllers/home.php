<?php

class Home extends CI_Controller{
    
    public function index(){
        
        $data['main_view'] = "home_view";
        
        // lädt den "home_view" auf der layouts/main.php page
        $this->load->view('layouts/main', $data);
    }

    
    
    
}



?>