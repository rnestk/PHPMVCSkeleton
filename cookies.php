<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
//print_r($_COOKIE);

if(isset($_COOKIE['check'])){
    header('Location:index.php');
}else{
   

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WYŁĄCZONE COOKIES!</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <script type="text/javascript" src="src/js/mainScript.js" ></script>
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap-3.2.0-dist/js/bootstrap.js" />

        <link rel="stylesheet" type="text/css" href="src/css/bootstrap-3.2.0-dist/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="src/css/mainStyle.css" />

    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="">

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="#">PHPMVCSkeleton</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li><img src="src/img/logo.php.gif" width="75" /></li>
         
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
        
        <div>
            <h2 style="color: red; margin-left: 50px;">Aby korzystać z serwisu, proszę właczyć pliki cookies w przeglądarce.</h2>
        </div>
        </br>
        <div>
            <a style="margin-left: 50px;" href="index.php">Przejdź do strony głównej</a>
        </div>
        
    </body>
    
</html>

        

       



<?php
}


