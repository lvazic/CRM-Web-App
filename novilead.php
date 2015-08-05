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

    <title>CRM Aplikacija - Dodavanje leadova</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
    <script src="js/jquery.js"></script>

<script>
$.getJSON("php/getDelatnost.php", function(result) {
    var options = $("#delatnosti");
$.each(result, function() {
    options.append($("<option />").val(this.did).text(this.naziv));
});
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
					
					<li  class="active">
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
                            Dodavanje leadova
                            <small>Unošenje novih potencijalnih klijenata</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Formular za dodavanje leada
                            </li>
                        </ol>
						
									<div>
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
                                <select class="form-control" id="delatnosti" name="delatnost" >
                                  
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
					
					
					
                </div>
                <!-- /.row -->

				
				
	
				
				
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
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
      url: "php/addLead.php?kid=<?php echo $_SESSION['kid']?>",
      data: $this.serialize() + '&ajax=true',
      cache: false,
      success: function(data) {
		  setTimeout(function(){
			$("#basicform").html('<h3>' + data + '</h3>');
         }, 1000);
                  console.log("dodato" + data);
      }
  });
		

	
	
	
         
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
