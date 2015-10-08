<?php

class User_model extends CI_Model{
    
    public function login_user($username, $password){
        $this->db->where([
            'username' => $username,
            'password' => $password
        ]);
        $query = $this->db->get('users');
    
        if($query->num_rows()==1){
            return $query->row('0')->id;
        } else{
            return false;
        }
    
        
    //Alt.:
    // $this->db->where('username', $username);
    // $this->db->where('password', $password);    
        
    }

    
    
    public function get_users($user_id, $username){
        
        //Datenbankverbindung variante 1
    /*  $config['hostname'] ='localhost';
        $config['user'] = 'root';
        $config['password'] = '';
        $config['database'] = 'errand_db';
        
        $connection = $this->load->database($config);
     */
        
        $this->db->where([
            'id'=> $user_id,
            'username' => $username
            ]);
       // $this->db->where('id', $user_id); // vordefinierte Where Funktion in CI
        
        $query = $this->db->get('users');  // vordefiniert, holt alle User
        
        return $query->result();     // gibt Ergebnis als Array von Objekten zurück
     
        //Alternativ (besser!): 
        //1. In database.php Datenbankdaten eintragen in $db['default']
        //2. In autoload.php: $autoload['libraries'] = array('database');
        
        
        
        //$query = $this->db->query("SELECT * FROM users");
        
        //return $query->num_fields();     //Anzahl Felder columns
        // return $query->num_rows();      //Anzahl Datensätze rows
        
        //Alternativ:
        
    }
    
    public function create_users($data){
        
        $this->db->insert('users', $data);      //users = Tabelle   $data = Datensatz
      }

      public function update_users($data, $id){
          
          $this->db->where(['id' => $id]);
          $this->db->update('users', $data);
      }
      
      public function delete_users($id){
          $this->db->where(['id' => $id]);
          $this->db->delete('users');
      }
      
    }

?>
