<!DOCTYPE html>

<head>


<?php
session_start();
if(empty($_SESSION['imeprezime']))
{
header('Location: login.php');
}
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM Aplikacija - Adresar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <script src="js/jquery.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<!-- Include one of jTable styles. -->
<link href="jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
 
<!-- Include jTable script file. -->
<script src="jtable/jquery.jtable.min.js" type="text/javascript"></script>
<script src="jtable/jquery.jtable.rs.js" type="text/javascript"></script>

 <script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "fade",
        duration: 500
      },
      hide: {
        effect: "fade",
        duration: 500
      }
    });
 
  });
  </script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#PregledContainer').jtable({
            title: 'Kontakti',

			 selecting: true, //Enable selecting
      //      multiselect: true, //Allow multiple selecting
      //      selectingCheckboxes: true,
		//	paging: true, //Enable paging
            pageSize: 10, //Set page size (default: 10)
        //    sorting: true, //Enable sorting
      //      defaultSorting: 'imeprezime ASC', //Set default sorting
            actions: {
                listAction: 'php/getAllContacts.php',
   //             createAction: '/GettingStarted/CreatePerson',
    //            updateAction: 'php/takeLeads.php',
   //             deleteAction: '/GettingStarted/DeletePerson',
            },
					rowInserted: function (event, data) {
   data.row.find('.jtable-edit-command-button').hide();
},

			toolbar: {
    items: [{
    //    icon: '/images/pdf.png',
        text: 'Preuzmi Excel',
        click: function () {
			     window.location = 'php/getContactsExcel.php';



        }
    }]
},

            fields: {
                fid: {
                    key: true,
                    list: false
                },
				koid: {
                    key: true,
                    list: false
                },
                imeprezime: {
                    title: 'Ime i prezime',
                    width: '15%',
					edit: false
                },
                telefon: {
                    title: 'Telefon',
                    width: '15%',
					edit: false
					
                },
                email: {
                    title: 'Email',
                    width: '15%',
                    create: false,
                    edit: false
                },
				naziv: {
                    title: 'Kompanija',
                    width: '30%',
                    create: false,
					edit: false
                },
            }
        });
		$('#PregledContainer').jtable('load');
		

    });
</script>


</head>

<body>

    <div id="wrapper">

         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CRM Aplikacija</a>
            </div>
           
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['imeprezime']?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="licnipodaci.php"><i class="fa fa-fw fa-user"></i> Lični podaci</a>
                        </li>
						<?php if($_SESSION['admin'] == true) echo
						"<li>
                            <a href=\"komercijalisti.php\"=><i class=\"fa fa-fw fa-institution\"></i> Komercijalisti</a>
                        </li>";
                      ?>
                        <li class="divider"></li>
                        <li>
                            <a href="php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Kontrolna tabla</a>
                    </li>
					
					<li>
                        <a href="novilead.php"><i class="fa fa-fw fa-edit"></i> Dodavanje leadova</a>
                    </li>
					
					<li>
                        <a href="preuzimanje.php"><i class="fa fa-fw fa-inbox"></i> Preuzimanje leadova</a>
                    </li>
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-search"></i> Pregled <i class="fa fa-fw fa-arrows-v"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="mojileadovi.php">Moji leadovi</a>
                            </li>
                            <li>
                                <a href="mojiaccounti.php">Moji accounti</a>
                            </li>
							<li>
                                <a href="prodajapoaccountu.php">Prodaja po accountu</a>
                            </li>
                        </ul>
                    </li>
					
					<li>
                        <a href="novaprodaja.php"><i class="fa fa-fw fa-eur"></i> Dodavanje prodaje</a>
                    </li>
                    
					
					<li class="active">
                        <a href="kontakti.php"><i class="fa fa-fw fa-user"></i> Kontakti</a>
                    </li>
					
					<li>
                        <a href="zalihe.php"><i class="fa fa-fw fa-dropbox"></i> Pregled zaliha</a>
                    </li>
					
					<li>
                        <a href="mapa.php"><i class="fa fa-fw fa-map-marker"></i> Mapa magacina</a>
                    </li>
                                       
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Adresar
                            <small>Svi uneti kontakti</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i>  Adresar svih kontakata
                            </li>

                        </ol>
						<div id="PregledContainer"></div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
