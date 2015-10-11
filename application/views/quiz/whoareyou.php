<div class="container" id="bg-img-container">
    <div class="row" id="top-row">
        <div class="col-md-offset-3 col-md-6"><h1>Search for your quizzes </h1>
            <form action="/quiz/choose" method="post" enctype="multipart/form-data">
                <div class="form-group panel panel-default">
                    <div class="panel-body">
                        <label for="username"><h3> Enter your Username to search for saved Quizzes</h3></label>
                        <input type="text" name="username" class="form-control" id="quizname" placeholder="Username" required="required">
                    </div>
                
                <button type="submit" class="btn btn-primary" value="submit" id="submitbutton">Submit</button>
                </div>
            </form>
         </div>        
    </div>
</div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

