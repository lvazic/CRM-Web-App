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

    <title>CRM Aplikacija - Moji leadovi</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/sb-admin.css" rel="stylesheet">
	<link href="jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <script src="js/jquery.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script>

    <script src="js/bootstrap.min.js"></script>
	

<link href="jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
 

<script src="jtable/jquery.jtable.min.js" type="text/javascript"></script>
<script src="jtable/jquery.jtable.rs.js" type="text/javascript"></script>

<style>
.kontakt-dugme {
opacity: 0.5;
}
.kontakt-dugme:hover {
opacity: 0.8;
}
</style>


<script type="text/javascript">
    $(document).ready(function () {
        $('#PregledContainer').jtable({
            title: 'Moji leadovi',

			 selecting: true, //Enable selecting
		//	 sorting: true,
			 defaultSorting: 'potencijal DESC',
            actions: {
                listAction: 'php/getAssignedLeads.php?kid=<?php echo $_SESSION['kid']?>',
   //             createAction: '/GettingStarted/CreatePerson',
                updateAction: 'php/UpdateAssignedLead.php',
    //            deleteAction: '/GettingStarted/DeletePerson',
            },
			toolbar: {
    items: [{
    //    icon: '/images/pdf.png',
        text: 'Preuzmi Excel',
        click: function () {
            window.location = 'php/getMyLeadsExcel.php?kid=<?php echo $_SESSION['kid']?>';
        }
    }]
},
            fields: {
                fid: {
                    key: true,
                    list: false
                },
				kontakt: {
                    title: '',
                    width: '2%',
                    sorting: false,
                    edit: false,
                    create: false,
					
                    display: function (data) {
                        //Create an image that will be used to open child table
                        var $img = $('<img class="kontakt-dugme" src="jtable/phone_metro.png" title="Pregledaj kontakt osobe" />');
                        //Open child table when user clicks the image
                        $img.click(function () {
                            $('#PregledContainer').jtable('openChildTable',
                                    $img.closest('tr'),
                                    {
                                        title: data.record.naziv + ' - Kontakt osobe',
                                        actions: {
                                            listAction: 'php/GetContacts.php?firma=' + data.record.fid,
                                            deleteAction: 'php/DeleteContact.php',
                                            updateAction: 'php/updateContact.php',
                                            createAction: 'php/addContact.php'
                                        },
                                        fields: {
                                            kontaktfid: {
                                                type: 'hidden',
                                                defaultValue: data.record.fid
                                            },
                                            koid: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            ime: {
                                                title: 'Ime',
                                                width: '15%',
                                                
                                            },
                                            prezime: {
                                                title: 'Prezime',
                                                width: '15%'
                                            },
                                            telefon: {
                                                title: 'Telefon',
                                                width: '15%',
                                            },
											email: {
                                                title: 'Email',
                                                width: '15%',
                                            },
											napomene: {
                                                title: 'Napomene',
                                                width: '20%',
                                            },
											
                                        }
                                    }, function (data) { //opened handler
                                        data.childTable.jtable('load');
                                    });
                        });
                        //Return image to show on the person row
                        return $img;
                    }
                },
                naziv: {
                    title: 'Naziv',
                    width: '15%'
                },
				telefon: {
                    title: 'Telefon',
                    width: '15%'
                },
				email: {
                    title: 'Email',
                    width: '15%'
                },
                websajt: {
                    title: 'Websajt',
                    width: '15%'
                },
                potencijal: {
                    title: 'Potencijal',
                    width: '15%',
					options: [ 'visok', 'srednji', 'nizak' ]
                },
				status: {
                    title: 'Status',
                    width: '15%',
					options: [ 'u razmatranju', 'dodeljen', 'odbačen' ]
                },
				napomene: {
                    title: 'Napomene',
                    width: '30%',
                },
				delatnost: {
                    title: 'Delatnost',
                    width: '15%',
					edit: false
                },
				dodao: {
                    title: 'Dodao',
                    width: '30%',
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
                            <li class="active">
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
                    
					
					<li>
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
                            Moji leadovi
                            <small>Leadovi koje ste preuzeli</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-inbox"></i>  Preuzeti leadovi iz poola
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
