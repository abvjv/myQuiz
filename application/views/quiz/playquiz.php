
<div class="container" id="bg-img-container">
    <div class="row" id="top-row">
        <div class="col-md-offset-3 col-md-6">
            <h1> <?php echo $quizname;?> </h1>

        </div>
    </div>
    
    <div class="col-md-offset-3 col-md-6">
        

    
    <?php    

        if($type == 'multiplechoice'){
            echo '<form action="/quiz/evaluate" method="post">';
            $i = 1;
            
            foreach($data as $question){
                //check display
                if($i>1){
                    $class=' invisibleMc';
                } else {
                    $class='';
                }

                echo '<div class="mcContainer'. $class . '" id="mcContainer' . $i . '">';
                echo '<h2>' . $question['question'] . '</h2><br/>';
                echo '<div class="row">';  
                echo '<div class="col-md-3">';
                echo '<div class="answer btn btn-primary" id="answer1">' .$question['answer1'].'</div></div>';
                echo '<div class="col-md-3 col-md-offset-3">';
                echo '<div class="answer btn btn-primary" id="answer2">' .$question['answer2'].'</div></div></div>';
                echo '<br><div class="row"><div class="col-md-3">';
                echo '<div class="answer btn btn-primary" id="answer3">' .$question['answer3'].'</div></div>';
                echo '<div class="col-md-3 col-md-offset-3">';
                echo '<div class="answer btn btn-primary" id="answer4">' .$question['answer4'].'</div>';

                echo '<input class="invisibleMc" id="q'. $i .'answer1" type="radio" name="question_' . $i .'" value="1">';
                echo '<input class="invisibleMc" id="q'. $i .'answer2" type="radio" name="question_' . $i .'" value="2">';
                echo '<input class="invisibleMc" id="q'. $i .'answer3" type="radio" name="question_' . $i .'" value="3">';
                echo '<input class="invisibleMc" id="q'. $i .'answer4" type="radio" name="question_' . $i .'" value="4">';
                echo '</div></div><br/><div class="confirmAnswer btn btn-primary" id="confirm' . $i .'"> Confirm Answer </div>';
                echo '</div>';
                $i++;

            }
            
            echo '<br><button type="submit" class="btn btn-primary invisibleMc" id="mcSubmit" value="submit" >Get your Results</button>';
            echo '</form>';
        }
            ?>     
    </div>
    
<?php  

    if($type=='vocabulary'){

        echo '<div class="col-md-offset-3 col-md-6">';
        echo '<form action="/quiz/evaluate" method="post">';
        
        $j = 0;
        $iMax = 5;
        $arrayMax = count($data);
        $sections = ceil($arrayMax/$iMax);
        
        echo '<h2> Vocabulary Test</h2>';
        
        for($i =1; $i<=$sections; $i++){
            
            if($i>1){
                $class=' invisibleVoc';
            } else {
                $class='';
            }
            
            // Section div
            echo '<div class="vocContainer'. $class . '" id="vocContainer' . $i . '">';
            //Form Group
            echo '<div class="form-group">';
            
            while($j<$iMax*$i && !($j>= $arrayMax)){
                
            // randomize given Vocabulary                
                if($data[$j]['random'] ==1){
                    $vocabulary = $data[$j]['vocabulary'];
                } else{
                    $vocabulary = $data[$j]['translation'];
                }
                
                
                echo '<div class="row">';
                    echo '<div class=" col-md-3">';
                        echo '<input type="text" readonly="readonly" class="vocabulary form-control" id="vocabulary_' . $i .'" value="'. $vocabulary . '">';
                    echo '</div>';
                    echo '<div class="col-md-3 seperator"> - ';
                    echo '</div>';
                    echo '<div class="col-md-3">';
                        echo '<input type="text" class="vocanswer form-control" id="vocanswer_' . $i .'" placeholder="enter translation">';
                    echo '</div>';
                echo '</div><br>';
            
                if(($j+1)%$iMax == 0 || $j+1 == $arrayMax){


                echo '<br/><div class="vocConfirmAnswer btn btn-primary" id="vocConfirm' . $i .'"> Confirm Answer </div><br></div></div>';

                } else{
                    //echo '</div>';
                    //echo '</div>';
                }
                $j++;
            }

        }
        
        // End Form
        echo '<button type="submit" id="vocSubmit" class="btn btn-primary invisibleVoc" value="submit">Get your Results</button>';
        echo '</form></div>';
    }    
        
?>
    </div>

                   
                        
                            
                        
                            
                        




