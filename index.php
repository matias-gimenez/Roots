<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> 
        <link rel="stylesheet" type="text/css" href="css/estilos.css" /> 
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" /> 
        <title>Roots mochilas</title>
        <link rel="icon" type="image/png" href="image/verde.png" sizes="32x32" />

        <script src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
        <script type="text/javascript" src="js/jquery.floatnumber.js"></script>
        <script type="text/javascript" src="js/AjaxUpload.2.0.min.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/select2.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('#div_inicio').data("opcion",1); //
            $('#id_container').load("seguridad/login.php");
            $('#div_nomusuario').data("userid",1);
        });

        </script>
    </head>

    <body>

        <div class="wrapper">
            <div class="content">
                
                <!--// Sector del icono del cargando...//-->
                <div class="spiner" id="div_centrado" style="display:none">
                    <div class="ball1"></div>
                </div>

                <!-- Barra de Navegacion-->
                <header></header>

                <!--Contenedor principal-->
                <div class="container-fluid" id="id_container"></div>

                <div id="div_temp" style="display:none"></div>

                <div id="div_msgerror"></div>

                <div id="div_ingreso"></div>
                <div id="div_acceso"></div>
                <div id="div_inicio" align="center"></div>
            </div> <!--//content//-->

            <footer class="footer">
                <div class="container-fluid" >
                    <p class="text-center font-footer" >Sistema de Gestión</p>
                </div>
            </footer>
        </div> <!--//wrapper//-->

        <div id="modal_aviso" class="modal fade" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modal_aviso_close">&times;</button>
                        <h4 class="modal-title">Aviso</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-warning" id="id_modal_aviso"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="modal_aviso_ok">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



