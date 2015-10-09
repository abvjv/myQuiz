<?php

class quiz_model extends CI_Model{
    
    public function save($aData){
        

        $sQuizType = $aData['quiztype'];
       
        // processing MC 
        if($sQuizType == 'multiplechoice'){

            $bSuccess = $this->saveMc($aData);
            return $bSuccess;

        } else if($sQuizType == 'vocabulary'){
            
            $bSuccess = $this->saveVoc($aData);
            return $bSuccess;
        }   
   }
   
   // Under COnstruction
   private function saveMc($aData){
        //data
        $sQuizName = $aData['quizname'];
        $sUserName = $aData['username'];
        $aFileData = $aData['filecontent'];
        
        foreach($aFileData as $data){
                
            $aMcData = explode(';', $data);
            $sQuestion = strip_tags($aMcData['0']);
            $aAnswer['1'] = strip_tags($aMcData['1']);
            $aAnswer['2'] = strip_tags($aMcData['2']);
            $aAnswer['3'] = strip_tags($aMcData['3']);                
            $aAnswer['4'] = strip_tags($aMcData['4']);
            $iCorrect = (int) strip_tags($aMcData['5']);
        
            echo $aAnswer['3'];
        }
   }
   
   private function saveVoc($aData){
        //data
        $sQuizName = $aData['quizname'];
        $sUserName = $aData['username'];
        $sQuizType = $aData['quiztype'];
        $aFileData = $aData['filecontent'];
        
        //check if this quiz exists already
        $sQuery = "SELECT * FROM quiz WHERE(username LIKE ? AND name LIKE ?)";
        $result = $this->db->query($sQuery, array($sUserName, $sQuizName));
        if($result->num_rows()>0){
            // Quiz already exists
            
        } else{
            //Create Quiz in DB
            $sQuery = 'INSERT INTO quiz(name, username, type) VALUES(?,?,?)';
            $this->db->query($sQuery, array($sQuizName, $sUserName, $sQuizType));
        }
        
        $quizId = (int) $this->getQuizId($sUserName, $sQuizName);

        foreach($aFileData as $data){
            
            $aVocData = explode(';', $data);
            $sVocab = $aVocData['0'];
            $sTranslation = $aVocData['1'];       
   
        
            $sQuery = 'INSERT INTO vocabulary(vocabulary, translation) VALUES(?,?)';
            $this->db->query($sQuery, array($sVocab, $sTranslation));
            // save Id of the inserted question / vocabularies
            $questionId = (int) $this->db->insert_id();
            
            //Insert into connecting Database
            $sQuery = 'INSERT INTO quiz_to_questions(quizid, questionid) VALUES(?,?)';
            $this->db->query($sQuery, array($quizId, $questionId));
        }      
    return true;   
   }
   
   private function getQuizId($sUserName, $sQuizName){
       $sQuery = "SELECT id FROM quiz WHERE(username LIKE ? AND name LIKE ?)";
       $res = $this->db->query($sQuery, array($sUserName, $sQuizName));
       $row = $res->result();
       foreach($row as $id){
           
            if(!empty($id->id)){
                return $id->id;
            } else{
                die("There was an error");
            }       
        }
   }
}