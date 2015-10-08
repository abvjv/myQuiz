
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6"><h1> QuizCreator </h1></div>
        </div>
        
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                <form action="/quiz/save" method="post">
                    <div class="form-group panel panel-default">
                        <div class="panel-body">
                            <label for="quizname"><h3> Choose the Name of the Quiz</h3></label>
                            <input type="text" class="form-control" id="quizname" placeholder="Quizname">
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
                                <input type="radio" name="quiztype" id="multiplechoice" value="vocabulary" checked>
                                Multiple Choice Test
                            </label> 
                        </div>
                    </div>
                    <div class="form-group panel panel-default"> 
                        <div class="panel-body">
                        <h3> Upload CSV File with your Test Questions or Vocabulary </h3>
                        <label for="testfile">  </label>
                        <input type="file" id="testfile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                    

                </form>
            </div>
        </div>
        
    </div>