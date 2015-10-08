<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User View</title>
    </head>
    <body>
        <h1>
    <?php
    
            foreach($result as $obj){
                echo $obj->id . ' ', $obj->username . ' ', $obj->password . '<br/>';
            }
    ?>   
        </h1>
    </body>
</html>





