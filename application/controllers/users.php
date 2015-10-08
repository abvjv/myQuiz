<?php

    class Users extends CI_Controller{
    
        public function login(){
                               // Regeln für Username: Leerzeichen l+r weg|Pflichtfeld|min 3 Zeichen|
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
            //echo $_POST['username'];
            
            if($this->form_validation->run()==FALSE){
                $data = array(
                    'errors' => validation_errors()
                );
           
            
            // session die sich selbst löscht
            $this->session->set_flashdata($data);
            redirect('home');
            // Session starten / beenden
            //$this->session->set_userdata();
            //$this->session->unset_userdata();

            //CI input post funktion
            //echo $this->input->post('username');
            } else {
            
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                
                $user_id = $this->user_model->login_user($username, $password);
            
                if($user_id){
                    $user_data = array(
                        'user_id' => $user_id,
                        'username'=> $username,
                        'logged_in' => true
                    );
                $this->session->set_userdata($user_data);
                
                $this->session->set_flashdata('login_success', 'You are now logged in');
                
                redirect('home/index');
                
                
                } else{
                    
                    $this->session->set_flashdata('login_failed', 'you are not logged in');
                    redirect('home/index');
                }
        }
        
    /*    public function show($user_id){
            // lade user model
            //$this->load->model('user_model');
            //Alternativ: config/autoload.php + unten einfügen: autoload['model'] = array('user_model');

            // hole Daten aus Funktion des Models (autoload.php)
            $result = $this->user_model->get_users($user_id, 'rico');
            
            //Speichern der Daten aus
            $data['result'] = $result;
            
            //Laden des Views + Einfügen von Daten aus Model --> Ausgabe in view mit php
            $this->load->view('user_view', $data);
        
            
        }
        
        public function insert(){
            
            $username = "peter";
            $password = "secret";
            
            $this->user_model->create_users([
                'username' => $username,
                'password' => $password
            ]);
        }
        
        public function update(){
            // Update der User Daten mit Daten aus associativem Array des Users mit id = $id
            $id =3;
            $username = "william";
            $password = "not so secret";
            
            $this->user_model->update_users([
                'username' => $username,
                'password' => $password
            ], $id);
        } 
        
        
        public function delete(){
            $id = 3;
            $this->user_model->delete_users($id);
            
                    
        }
     * 
     */
    }
}
?>

