<?php
require __DIR__ . "/BaseVista.php";
?>
<html lang="es">

    <head>
        <title>Ejemplo</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="<?php echo $bower; ?>/bootstrap/dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $bower; ?>/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $bower; ?>/jquery-ui/jquery-ui.js"></script> 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $bower; ?>/bootstrap/dist/css/bootstrap.css">

        <!--
    <script type="text/javascript">
    $().ready(function(){
    
        $("#f_usuario").validate({
            rules: {
                usuario: {
                     required: true,
                     minlength: 3,
                     maxlength: 20,
    
                },
                contrasenia:{
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                usuario: {
                    required: "Campo obligatorio",
                    minlength: "Longitud minima 3 carácteres",
                    maxlength: "Longitud maxima 20 carácteres"
                },
                contrasenia : {
                    required: "Campo obligatorio",
                    minlength: "Longitud minima 3 carácteres"
                    
                }
            }
         });
     });
    </script>
    
    <style>
            #commentForm {
                width: 500px;
            }
            #commentForm label {
                width: 250px;
            }
            #commentForm label.error, #commentForm input.submit {
                margin-left: 253px;
            }
            #signupForm {
                width: 670px;
            }
            #signupForm label.error {
                margin-left: 10px;
                width: auto;
                display: inline;
            }
        </style>
        -->
        <script>
            $().ready(function () {
                $("#Nacimiento").datepicker();
            });
        </script>
    </head>
    <body>
        <!-- Mostrar Contenido Variable -->
