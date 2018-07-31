<?php
if(!isset($_SESSION["user_id"])){
  if(isset($_GET["view"]) AND $_GET["view"]!=""){
    Core::redir("./");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>.: INVENET :.</title>

    <!-- Bootstrap CSS -->    
    <link href="na-res/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="na-res/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="na-res/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="na-res/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="na-res/css/owl.carousel.css" type="text/css">
    <link href="na-res/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="na-res/css/fullcalendar.css">
    <link href="na-res/css/widgets.css" rel="stylesheet">
    <link href="na-res/css/style.css" rel="stylesheet">
    <link href="na-res/css/style-responsive.css" rel="stylesheet" />
    <link href="na-res/css/xcharts.min.css" rel=" stylesheet"> 
    <link href="na-res/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="na-res/css/pie.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
    <script src="js/jquery-1.10.2.js"></script>
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="./" class="logo">INVE <span class="lite">NET</span><small class="logo"> | 1.0</small></a>
            <!--logo end-->

<?php if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=""):?>
<?php 
$u=null;
if( isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=""){
  $u = Empleado::getById($_SESSION["user_id"]);
 
$user = $u->username;
$fullname = $u->nombre ." ".$u->apellido  ;
  }?>

          
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->           
                <ul class="nav pull-right top-menu">
                    
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username"><?php echo "[".$user."] "."| ".$fullname; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="index.php?view=configuracion"><i class="icon_profile"></i> Cambiar contraseña</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Salir</a>
                            </li>                        
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
<?php else:?>
<?php endif; ?>

      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>

<?php 
$u=null;
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"]!=""):
  $u = Empleado::getById($_SESSION["user_id"]);

?>


        <?php if($u->admin): ?>
        

          <div id="sidebar"  class="nav-collapse ">

              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.php?view=principal">
                          <i class="icon_house_alt"></i>
                          <span>Panel</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Ventas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=venta">Venta</a></li>                          
                          <li><a class="" href="index.php?view=ventas">Historial</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_datareport_alt"></i>
                          <span>Devoluciones</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=devolucion">Devolucion</a></li>                          
                          <li><a class="" href="index.php?view=devoluciones">Historial</a></li>
                      </ul>
                  </li>       
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>Surtidos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=surtido">Surtido</a></li>                          
                          <li><a class="" href="index.php?view=surtidos">Historial</a></li>
                      </ul>
                  </li>       
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_check"></i>
                          <span>Articulos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=articulos">Catálogo</a></li>                          
                          <li><a class="" href="index.php?view=categorias">Categorías</a></li>
                      </ul>
                  </li>       

                  <li>
                      <a class="" href="index.php?view=inventario">
                          <i class="icon_pencil"></i>
                          <span>Inventario</span>
                      </a>
                  </li>
                  
                  <li>
                      <a class="" href="index.php?view=caja">
                          <i class="icon_box-selected"></i>
                          <span>Caja</span>
                      </a>
                  </li>


                  <li>
                      <a class="" href="index.php?view=clientes">
                          <i class="icon_profile"></i>
                          <span>Clientes</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="index.php?view=proveedores">
                          <i class="icon_group"></i>
                          <span>Proveedores</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Reportes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="./index.php?view=reporteventa">Ventas</a></li> <li><a class="" href="./index.php?view=reportedevolucion">Devoluciones</a></li>                         
                          <li><a class="" href="index.php?view=reportes">Inventario</a></li>
                      </ul>
                  </li>       
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_lock_alt"></i>
                          <span>Admin</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=usuarios">Usuarios</a></li>                          
                        
                      </ul>
                  </li>       
                                 
              </ul>
              
          </div>
    <?php endif;?>

    <?php if($u->contador):?>
        <div id="sidebar"  class="nav-collapse ">
              
              <ul class="sidebar-menu">                

              <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Ventas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                                                    
                          <li><a class="" href="index.php?view=ventas">Historial</a></li>
                      </ul>
                  </li>       

                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_datareport_alt"></i>
                          <span>Devoluciones</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                                                    
                          <li><a class="" href="index.php?view=devoluciones">Historial</a></li>
                      </ul>
                  </li>       

<li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>Surtidos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                                                    
                          <li><a class="" href="index.php?view=surtidos">Historial</a></li>
                      </ul>
                  </li>       
                  

              <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Reportes</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          


                          <li><a class="" href="./index.php?view=reporteventa">Ventas</a></li> <li><a class="" href="./index.php?view=reportedevolucion">Devoluciones</a></li>                   
                          <li><a class="" href="index.php?view=reportes">Inventario</a></li>
                      
                      </ul>

                  </li>       
        </div>
<?php endif;?>

        <?php if($u->vendedor):?>

          <div id="sidebar"  class="nav-collapse ">

              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.php?view=principal">
                          <i class="icon_house_alt"></i>
                          <span>Panel</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Ventas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=venta">Venta</a></li>                          
                          <li><a class="" href="index.php?view=ventas">Historial</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_datareports_alt"></i>
                          <span>Devoluciones</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=devolucion">Devolucion</a></li>                          
                          <li><a class="" href="index.php?view=devoluciones">Historial</a></li>
                      </ul>
                  </li>       
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_piechart"></i>
                          <span>Surtidos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=surtido">Surtido</a></li>                          
                          <li><a class="" href="index.php?view=surtidos">Historial</a></li>
                      </ul>
                  </li>       
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_check"></i>
                          <span>Articulos</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="index.php?view=articulos">Catálogo</a></li>                          
                          <li><a class="" href="index.php?view=categorias">Categorías</a></li>
                      </ul>
                  </li>       

                  <li>
                      <a class="" href="index.php?view=inventario">
                          <i class="icon_pencil"></i>
                          <span>Inventario</span>
                      </a>
                  </li>
                  
                 


                  <li>
                      <a class="" href="index.php?view=clientes">
                          <i class="icon_profile"></i>
                          <span>Clientes</span>
                      </a>
                  </li>

                  <li>
                      <a class="" href="index.php?view=proveedores">
                          <i class="icon_group"></i>
                          <span>Proveedores</span>
                      </a>
                  </li>

                  
                 
                                 
              </ul>
              
          </div>
    <?php endif;?>


<?php endif;?>

      </aside>
      <!--sidebar end-->
      
  </section>

  
  <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
    
<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("acceso");
?>
  </section>


                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>

      <!--main content end-->



<!-- Javasscript que se usan en las vistas que necesitan reportes en pdf -->

    <script src="js/jspdf.js"></script>
    <script src="js/jquery-2.1.3.js"></script>
    <script src="js/pdfFromHTML.js"></script>

    <!-- javascripts -->
    <script src="na-res/js/jquery.js"></script>
    <script src="na-res/js/jquery-ui-1.10.4.min.js"></script>
    <script src="na-res/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="na-res/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="na-res/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="na-res/js/jquery.scrollTo.min.js"></script>
    <script src="na-res/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/na-res/js/jquery.knob.js"></script>
    <script src="na-res/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="na-res/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="na-res/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="na-res/js/calendar-custom.js"></script>
    <script src="na-res/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="na-res/js/jquery.customSelect.min.js" ></script>
    <script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="na-res/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="na-res/js/sparkline-chart.js"></script>
    <script src="na-res/js/easy-pie-chart.js"></script>
    <script src="na-res/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="na-res/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="na-res/js/xcharts.min.js"></script>
    <script src="na-res/js/jquery.autosize.min.js"></script>
    <script src="na-res/js/jquery.placeholder.min.js"></script>
    <script src="na-res/js/gdp-data.js"></script>  
    <script src="na-res/js/morris.min.js"></script>
    <script src="na-res/js/sparklines.js"></script>    
    <script src="na-res/js/charts.js"></script>
    <script src="na-res/js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
    $(function(){
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
    });



  </script>

  </body>
</html>
<!--
 Based on INVENTIO created by EVILNAPSIS, this new project has changes in database and you can have different users levels , return or repayment and bootstrap theme used on views is NICE ADMIN .

-->