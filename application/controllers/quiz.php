<?php

    class quiz extends CI_Controller{
        
        //landing Page
        public function index(){
            $this->load->view('layouts/main');
            $this->load->view('layouts/footer');
        }
        
        //Create new quiz
        public function create(){
            $this->load->view('layouts/main');
            $this->load->view('quiz/createquiz');
            $this->load->view('layouts/footer');
        }
        
        //Save the new quiz
        public function save(){
            //validate data
            $this->form_validation->set_rules('quizname', 'Quizname', 'trim|required|min_length[7]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[7]');
            if(empty($_FILES['testfile']['name'])){
                $this->form_validation->set_rules('testfile', 'Document', 'required|max_length[50]');            
            }
            
            //redirect if validation is not successful
            if($this->form_validation->run()==FALSE){
                $data = array(
                    'errors' => validation_errors()
                );

                // session with errors
                $this->session->set_flashdata($data);
                redirect('quiz/create');
            } else {
                
                // Save Data for model 
                //File contents
                $string = file($_FILES['testfile']['tmp_name']);

                //creating data array
                $aData['filecontent']= $string;
                
                // Name of the quiz
                if(isset($_POST['quizname'])){
                    $aData['quizname']= strip_tags($_POST['quizname']);
                } 
                // Type of the quiz
                if(isset($_POST['quiztype'])){
                    $aData['quiztype']= strip_tags($_POST['quiztype']);
                }
                
                if(isset($_POST['username'])){
                    $aData['username']= strip_tags($_POST['username']);
                }
            }
            
            $quiz = new quiz_model;
            $bSuccess = $quiz->save($aData);
            
            // load views    
            $this->load->view('layouts/main');
            if($bSuccess){
                $this->load->view('quiz/create_success');
            } else{
                $this->load->view('quiz/create_failure');
            }
            
            $this->load->view('layouts/footer');
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