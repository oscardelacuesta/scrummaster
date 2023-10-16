
<?php
// Verificar si la sesión está iniciada
// Requiere el archivo de funciones
require_once "functions.php";

// Validar el acceso con el nivel requerido (por ejemplo, 1 para usuarios normales, 2 para administradores, etc.)
//$entrada  = validarAcceso(1);
?>

<?php require_once 'header.php'; ?>


<?php
session_start();

//Esta funciona
//require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolGrid/koolgrid.php";
//require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolGrid/ext/datasources/MySQLiDataSource.php";

?>



<?php

require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolAjax/koolajax.php";
$koolajax->scriptFolder = $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolAjax";

require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolGrid/koolgrid.php";
require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolGrid/ext/datasources/MySQLiDataSource.php";
require $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolCalendar/koolcalendar.php";
$db_con = mysqli_connect($servername,$username,$password,$dbname);

$ds = new MySQLiDataSource($db_con);//This $db_con link has been created inside KoolPHPSuite/Resources/runexample.php
$ds->SelectCommand = "select orderNumber,orderDate,status,comments from orders";
$ds->UpdateCommand = "update orders set orderDate='@orderDate', status='@status', comments='@comments' where orderNumber=@orderNumber";
$ds->DeleteCommand = "delete from orders where orderNumber=@orderNumber";

$grid = new KoolGrid("grid");
$grid->scriptFolder = $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolGrid";
$grid->styleFolder="default";
$grid->Localization->Load("KoolPHPSuite/KoolControls/KoolGrid/localization/es.xml");
$grid->AjaxEnabled = true;
$grid->DataSource = $ds;
$grid->MasterTable->Pager = new GridPrevNextAndNumericPager();
$grid->Width = "1024px";
$grid->ColumnWrap = true;
$grid->AllowEditing = true;
$grid->AllowDeleting = true;
$grid->PageSize = 20;
$grid->AllowFiltering = true;

$column = new GridBoundColumn();
$column->DataField = "orderNumber";
$column->ReadOnly = true;
$grid->MasterTable->AddColumn($column);

$column = new GridDateTimeColumn();
$column->DataField = "orderDate";
$column->HeaderText = "OrderNumber";
$column->FormatString = "d M, Y";
//Assign datepicker for GridDateTimeColumn, this is optional.
$column->Picker = new KoolDatePicker();
$column->Picker->Localization->Load("KoolPHPSuite/KoolControls/KoolCalendar/localization/es.xml");
$column->Picker->scriptFolder = $KoolControlsFolder."KoolPHPSuite/KoolControls/KoolCalendar";
$column->Picker->styleFolder = "default";
$column->Picker->DateFormat = "d M, Y";

$grid->MasterTable->AddColumn($column);

$column = new GridDropDownColumn();
$column->DataField = "status";
$column->HeaderText = "Status";
$column->AddItem("In Process");
$column->AddItem("On Hold");
$column->AddItem("Disputed");
$column->AddItem("Cancelled");
$column->AddItem("Resolved");
$column->AddItem("Shipped");
$grid->MasterTable->AddColumn($column);

$column = new GridTextAreaColumn();
$column->DataField = "comments";
$column->HeaderText = "Comments";
$column->Width = "600px";
$column->BoxHeight = "200px";
$grid->MasterTable->AddColumn($column);

$column = new GridEditDeleteColumn();
$column->Align = "center";
$grid->MasterTable->AddColumn($column);

$grid->MasterTable->EditSettings->Mode = "Inline";//"Inline" is default value;

$grid->Process();
?>


















?>

<body>

    <div id="wrapper">

   

     <?php require_once 'menu.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>de SCRUM4MASTER - visión general</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>

                        <ol class ="caption">
                            <div class="text">
                                <form id="form1" method="post">

                                <?php echo $koolajax->Render();?>
                                <?php echo $grid->Render();?>
                                </form>
                            </div>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->




                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Información</strong> panel<a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">En desarrollo </a> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php require_once 'footer.php'; ?>
   

</body>

</html>
