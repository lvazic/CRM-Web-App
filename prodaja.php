<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  } 
  label{margin-top: 10px;}
  .help-inline-error{color:red;}
</style>


	
	
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dodavanje leadova
                            <small>Unošenje novih potencijalnih klijenata</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-inbox"></i> Formular za dodavanje leada
                            </li>
                        </ol>
                    </div>
					
					
					
                </div>
                <!-- /.row -->

				
				
				<div class="container" style="padding-left: 0px; padding-right: 95px;">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Unesite podatke o novom leadu kroz dva koraka!</h3>
    </div>
    <div class="panel-body">
      <form role= "form" name="basicform" id="basicform" method="post" style="padding-left: 0px; padding-right: 95px;">
        
        <div id="sf1" class="frm">
          <fieldset>
            <legend>Korak 1 od 2 - Podaci o kompaniji</legend>

            <div class="form-group">
                                <label>Naziv</label>
                                <input class="form-control" name="imekompanije">
                                <p class="help-block">Unesite pun naziv kompanije (po APR-u)</p>
                            </div>
							<div class="form-group">
                                <label>Telefon</label>
                                <input class="form-control" name="telefonkompanije">
                                <p class="help-block">Telefon kompanije</p>
                            </div>
							
							<div class="form-group">
                                <label>Email:</label>
                                <input class="form-control" name="emailkompanije">
                                <p class="help-block">Opšti email za kontakt</p>
                            </div>
							
							<div class="form-group">
                                <label>Websajt:</label>
                                <input class="form-control" name="websajtkompanije">
                                <p class="help-block">Websajt kompanije</p>
                            </div>
							
							<div class="form-group">
                                <label>Potencijal</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="potencijal" id="optionsRadios1" value="nizak" checked>Nizak
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="potencijal" id="optionsRadios2" value="srednji">Srednji
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="potencijal" id="optionsRadios3" value="visok">Visok
                                    </label>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label>Delatnost</label>
                                <select class="form-control" name="delatnost" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
								<p class="help-block">Šifra delatnosti po zvaničnom šifarniku</p>
                            </div>
							
							<div class="form-group">
                                <label>Napomene</label>
                                <textarea class="form-control" rows="3" name="napomenekompanije"></textarea>
								<p class="help-block">Sve što smatrate korisnim za znati</p>
                            </div>
							
			
            <div class="clearfix" style="height: 10px;clear: both;"></div>


            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-primary open1" type="button">Dalje <span class="fa fa-arrow-right"></span></button> 
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend>Korak 2 of 2 - podaci o kontakt osobi</legend>

 <div class="form-group">
                                <label>Ime</label>
                                <input class="form-control" name="imeosobe">
                                <p class="help-block">Unesite ime kontakt osobe</p>
                            </div>
							
							 <div class="form-group">
                                <label>Prezime</label>
                                <input class="form-control" name="prezimeosobe">
                                <p class="help-block">Unesite prezime kontakt osobe</p>
                            </div>
							
							<div class="form-group">
                                <label>Telefon</label>
                                <input class="form-control" name="telefonosobe">
                                <p class="help-block">Unesite telefon kontakt osobe</p>
                            </div>
							
							<div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="emailosobe">
                                <p class="help-block">Unesite email kontakt osobe</p>
                            </div>
            <div class="form-group">
                                <label>Napomene</label>
                                <textarea class="form-control" rows="3" name="napomeneosobe"></textarea>
								<p class="help-block">Sve što smatrate korisnim za znati</p>
                            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>



            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Nazad</button> 
                <button class="btn btn-primary open2" name = "slanje" type="submit">Dodaj </button> 
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>

          </fieldset>
        </div>

        
      </form>
    </div>
  </div>


</div>
				
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jquery.validate.js"></script>
	<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        imekompanije: {
          required: true,
          minlength: 2,
          maxlength: 100
        },
        telefonkompanije: {
          required: true,
          minlength: 2,
          maxlength: 20,
        },
        emailkompanije: {
          required: true,
          minlength: 5,
		  email: true,
          maxlength: 30,
        },
		imeosobe: {
          required: true,
          minlength: 2,
          maxlength: 100
        },
		prezimeosobe: {
          required: true,
          minlength: 2,
          maxlength: 100
        },
		telefon: {
          required: true,
          minlength: 2,
          maxlength: 100
        },

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
	  else v.focusInvalid();
    });
	
	

    
     $("#basicform").submit(function(e) {
      if (v.form()) {
		  
		   var $this = $(this);
  e.preventDefault();
        $("#loader").show();
		var formData = $("#basicform").serialize;
		console.log(formData);
		
		 $.ajax({
      type: "POST",
      url: "php/addLead.php",
      data: $this.serialize() + '&ajax=true',
      cache: false,
      success: function(data) {
		  setTimeout(function(){
			$("#basicform").html('<h3>' + data + '</h3>');
         }, 1000);
                  console.log("dodato" + data);
      }
  });
		
		console.log($("#basicform"));
	//	$.post('php/addLead.php',formData,formSent);

	
	
	
         
        return false;
      }
	  else v.focusInvalid();
    }); 

    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });
	
	    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

  });
</script>






</body>

</html>
