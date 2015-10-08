<?php

    class quiz extends CI_Controller{
        
        public function index(){
            $this->load->view('layouts/main');
            
            $this->load->view('layouts/footer');
        }
        
        public function create(){
            $this->load->view('layouts/main');
            $this->load->view('quiz/createquiz');
            $this->load->view('layouts/footer');
        }
        
        public function save(){
            echo 'save';
        }
        
        public function delete($quizId){
            echo 'delete';
        }
        
        public function edit($quizId){
            echo 'edit';
        }
        
        public function start($quizId){
            echo 'start';
        }
    }