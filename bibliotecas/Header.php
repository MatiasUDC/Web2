<?php
require __DIR__ . "/BaseVista.php";
?>
<html lang="es">

    <head>
        <title>Primer Practico</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="<?php echo $bower; ?>/bootstrap/dist/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo $bower; ?>/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $bower; ?>/jquery-validation/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="<?php echo $bower; ?>/jquery-ui/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $bower; ?>/bootstrap/dist/css/bootstrap.css">

        <script type="text/javascript">
            $().ready(function () {
            jQuery.validator.addMethod('selectcheck', function (value) {
            return (value != '0');
            }, "Campo obligatorio");
                    $("#formulario").validate({
            rules: {
            nombre: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
            },
                    apellido: {
                    required: true,
                            minlength: 3,
                            maxlength: 20
                    },
                    fecha_nacimiento: {
                    required: true,
                            dpDate: true
                    },
                    nacionalidad: {
                    selectcheck: true
                    }
            },
                    messages: {
                    nombre: {
                    required: "Campo obligatorio",
                            minlength: "Longitud minima 3 carácteres",
                            maxlength: "Longitud maxima 20 carácteres"
                    },
                            apellido: {
                            required: "Campo obligatorio",
                                    minlength: "Longitud minima 3 carácteres",
                                    maxlength: "Longitud maxima 20 carácteres"
                            },
                            fecha_nacimiento: {
                            required: "Campo obligatorio"
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
        <script>
                    $().ready(function () {
            $("#nacimiento").datepicker({
            dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true});
            });
        </script>
    </head>
    <body>
        <!-- Mostrar Contenido Variable -->
