
<div class="container" id="bg-img-container">
    <div class="row" id="top-row">
        <div class="col-md-offset-3 col-md-6">
            <h1> <?php echo $quizname;?> </h1>

        </div>
    </div>


    <div class="col-md-offset-3 col-md-6">
        
        <h2> Hier steht die Frage </h2>
        <br/>
        <form action="/quiz/evaluate" method="post">
            <div class="row">  
                <div class="col-md-3">
                    <div class="answer btn btn-primary" id="answer1">Antwort 1</div>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <div class="answer btn btn-primary" id="answer2">Antwort 2</div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="answer btn btn-primary" id="answer3">Antwort 3</div>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <div class="answer btn btn-primary" id="answer4">Antwort 4</div>
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary" value="submit" >Submit</button>
            
        </form>
    </div>
    
    
    
    <div class="col-md-offset-3 col-md-6">
        <h2> Vocabulary Test</h2>                
        <form action="/quiz/evaluate" method="post">
            <div class="form-group">
                <div class="row">  
                    <div class=" col-md-3">
                        
                        <input type="text" readonly="readonly" class="vocabulary form-control" id="vocabulary" value=" <?php echo 'test'; ?>"></input>
                    </div>
                    <div class="col-md-3 seperator"> <=> </div>
                    <div class="col-md-3">
                        <input type="text" class="vocanswer form-control" id="vocanswer" placeholder="enter translation"></input>
                    </div>
                </div>
                <br>
            <button type="submit" class="btn btn-primary" value="submit" >Submit</button>
            </div>
        </form>
    </div>

</div>
                
                   
                        
                            
                        
                            
                        




