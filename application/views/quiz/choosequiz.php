
<div class="container" id="bg-img-container">
    <div class="row" id="top-row">
        <div class="col-md-offset-3 col-md-6">
            <h1>  Your Quizzes <?php echo $username?> </h1>
        </div>
    </div>
    
    <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>No.</th>
                    <th>Quizname</th>
                    <th>Quiztype</th>
                    <th>Start Quiz</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //counter
                    $i = 1;
                    
                    //String for Submit Form and Button
                    $sHtmlFormString = '<form action="/quiz/start" method="post">';
                    $sHtmlFormString .= '<div class="form-group">';
                    $sHtmlFormString.= '<input type="hidden" name="username" value="' .$username . '">';
                    $sHtmlFormString.= '<input type="hidden" name="type" value="placeholder_type">';
                    $sHtmlFormString.= '<input type="hidden" name="quizname" value="placeholder_name">';
                    $sHtmlFormString.= '<button class="btn btn-default">Start!</button></form></div>';
                    
                    foreach($quizdata as $quiz){
                                               
                        $sHtmlFormString = preg_replace('/name=\"type\" value=\".*?\"/', 'name="type" value="'. $quiz['type'].'"' , $sHtmlFormString);
                        $sHtmlFormString = preg_replace('/name=\"quizname\" value=\".*?\"/', 'name="quizname" value="'. $quiz['name'].'"' , $sHtmlFormString);
                                     
                        echo '<tr class="active">';
                        echo '<td>'. $i .' </td>';
                        echo '<td>' . $quiz["name"] . '</td>';
                        echo '<td>' . $quiz["type"] . '</td>';
                        echo '<td>' . $sHtmlFormString . '</td>';
                        echo '</tr>';
                        $i++;
                    }
                    
                ?>    
            </tbody>
        </table>    
    </div>
</div>         
                            
                        
                            
                        



