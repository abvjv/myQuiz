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
                //set Cookie for user recognition
                $time = time()+60*60*24*30; //30 Tage Laufzeit
                $cookie = array(
                    'name' => 'username',
                    'value' => $aData['username'],
                    'expire' => $time,
                );
  
                set_cookie($cookie);
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
        
        //Quiz löschen
        public function delete($quizId){
            echo 'delete';
        }
        
        // Quiz bearbeiten
        public function edit($quizId){
            echo 'edit';
        }
        
        // Auswahl eines Quizzes
        public function choose(){
            
            // Header + Nav
            $this->load->view('layouts/main');
            
            // load quiz model
            $quiz = new quiz_model;
            
            //if username cookie is set load quiz overview for this user
            //

            
            if(get_cookie('username')){
                
                // get Quizzes from db
                $aQuizData = $quiz->getQuizzesByUsername(get_cookie('username'));
                
                $aData = array(
                    
                    'username' => get_cookie('username'),
                    'quizdata' => $aQuizData
                );
                $this->load->view('quiz/choosequiz', $aData);
                
            } else {
                // check username
                $this->load->view('quiz/whoareyou');                
            }
            $this->load->view('layouts/footer');
            
            // if username is set -> create Cookie and load saved quizzes
            if(isset($_POST['username']) && $_POST['username']!='' && strlen($_POST['username'])>=6){
                
                $time = time()+60*60*24*30; //30 Tage Laufzeit
                $cookie = array(
                    'name' => 'username',
                    'value' => $_POST['username'],
                    'expire' => $time,
                );
                set_cookie($cookie);
                
                $aQuizData = $quiz->getQuizzesByUsername($_POST['username']);
                
                $aData = array(
                    'username' => $_POST['username'],
                    'quizdata' => $aQuizData                      
                );
                
                
                $this->load->view('quiz/choosequiz', $aData);
            }
                        
        }
        
        public function start(){
            
            $username = $_POST['username'];
            $quizname = $_POST['quizname'];
            $type = $_POST['type'];
            
            $user = new quiz_model();
            
            // Here Call to Model function to retrieve the Quizdetails
            $aQuiz->getQuizData($userName, $quizname);

            // continue here by Loading view with submitted Data
        }
    }