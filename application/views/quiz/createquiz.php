    
    <div class="container" id="bg-img-container">
        <div class="row" id="top-row-create" >
            <div class="col-md-offset-3 col-md-6"><h2> QuizCreator </h2></div>
        
        
            <div class="col-md-offset-3 col-md-9">
                <div class="alert-danger round"><?php 
                    if($this->session->flashdata('errors')){
                        echo $this->session->flashdata('errors');
                    }
                echo '</div>';
                ?>
                    
                <form action="/quiz/save" method="post" enctype="multipart/form-data">
                    <div class="form-group panel panel-default">
                        <div class="panel-body">
                            <label for="quizname"><h3> Choose the Name of the quiz and your Username</h3></label>
                            <input type="text" name="quizname" class="form-control" id="quizname" placeholder="Quizname">
                        </div>
                        <div class="panel-body">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                            <span id="helpBlock" class="help-block"> The quiz will be saved for your username </span>
                        </div>
                    </div>
                    <div class="form-group panel panel-default">
                        <div class="panel-body">
                            <h3> Choose the Type of the Quiz</h3>
                            <label>
                                <input type="radio" name="quiztype" id="vocabulary" value="vocabulary" checked>
                                Vocabulary Test
                            </label><br/>
                            <label>
                                <input type="radio" name="quiztype" id="multiplechoice" value="multiplechoice" checked>
                                Multiple Choice Test
                            </label> 
                        </div>
                    </div>
                    <div class="form-group panel panel-default"> 
                        <div class="panel-body">
                            <h3> Upload CSV File with your MC Questions or Vocabulary </h3>
                            <label for="testfile">  </label>
                            <input type="file" name="testfile" id="testfile" accept=".csv"/>
                            <span id="helpBlock" class="help-block"> File must be .csv </span>
                            <span class="help-block"> Format for Vocabulary: vocabulary1;translation1 example: sledgehammer;Vorschlaghammer </span>
                            <span class="help-block"> Format for MC: "question;answer1;answer2;answer3;answer4;number of correct answer" | example: "What is the Capital of Germany?;Bonn;Berlin;Hamburg;Munich;2"</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                </form>
            </div>
        </div>       
    </div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/functions.js"></script>