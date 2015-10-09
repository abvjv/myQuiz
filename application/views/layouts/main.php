<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyQuiz</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>

</head>
<body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"> Toggle navigation </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/home">MyQuiz</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="">Home<span class="sr-only">(current)</span></a></li>                       
                        <li> <a href="<?php echo base_url();?>profile">Profile<span class="sr-only"></span></a></li>
                        <li> <a href="<?php echo base_url();?>quiz/create">Create<span class="sr-only"></span></a></li>                        
                        <li> <a href="<?php echo base_url();?>profile">Quiz<span class="sr-only"></span></a></li>
                        <li> <a href="<?php echo base_url();?>contact">Contact<span class="sr-only"></span></a></li>
                    </ul>
                    
                    <form class="navbar-form navbar-right" role="login" action="/user/login" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username"/>
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            <button class="btn-default btn" type="submit">Login</button>
                        </div>                    
               
                    </form>

                </div>                    
            </div>
        </nav>