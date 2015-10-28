<?php

class quiz_model extends CI_Model{
    
    // save Quiz to database
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
   
   //Helper function for save() to write Vocabulary data into Database
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
   
   // helper function for getVoc() to get the Id of a specific quiz
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
   
   // Get all quizzes stored in db, for a given username
   public function getQuizzesByUsername($sUsername){
       $sQuery = 'SELECT * FROM quiz WHERE username LIKE ?';
       $result = $this->db->query($sQuery, array($sUsername));
       $aResult = $result->result_array();
       
       return $aResult;
   }
   
   // Get the Quizdata for Display
   public function getQuizData($sUserName, $sQuizname, $type){
       
       //get QuizId
       $quizId = $this->getQuizId($sUserName, $sQuizname);
       
       // check quiztype
       if($type == 'vocabulary'){
           $aQuizData['data'] = $this->getVocabulary($quizId);
       } else if($type == 'multiplechoice'){
           $aQuizData['data'] = $this->getMc($quizId);
       } else{
           exit('There was an error - Quiz type not valid');
       }
       // continue here by fetching the data
       
       $aQuizData['quizname']= $sQuizname;
       $aQuizData['type'] = $type;
       return $aQuizData;
   }
   
   
   private function getMc($quizId){
       
       //get MC Questions
       $sQuery = 'SELECT * FROM mc_question m, quiz_to_questions q  WHERE q.quizid=? AND q.questionid = m.id';
       $result = $this->db->query($sQuery, $quizId);
       
       if($result->num_rows()>0){
           foreach($result->result() as $row){
               $aData['id'] = $row->id;
               $aData['question'] = $row->question;
               $aData['answer1'] = $row->answer1;
               $aData['answer2'] = $row->answer2;
               $aData['answer3'] = $row->answer3;
               $aData['answer4'] = $row->answer4;
               $aData['correct'] = $row->answer4;
               $aData['random'] = $this->picRandom(1,4);
               $aResult[] = $aData;
           }
       }
       $aResult = $result->result_array();
       return $aResult;
   }
   
   private function getVocabulary($quizId){
       //get Vocabulary
       $sQuery = 'SELECT * FROM vocabulary v, quiz_to_questions q  WHERE q.quizid=? AND q.questionid = v.id';
       //echo $sQuery; exit;
       $result = $this->db->query($sQuery, $quizId);
       
       if($result->num_rows()>0){
           foreach($result->result() as $row){
               $aData['id'] = $row->id;
               $aData['vocabulary'] = $row->vocabulary;
               $aData['translation'] = $row->translation;
               $aData['random'] = $this->picRandom(1,2);
               $aResult[] = $aData;
           }
       }
       return $aResult;
   }
   
   private function picRandom($min, $max){
       $random = rand($min, $max);
       
       return $random;
   }
}