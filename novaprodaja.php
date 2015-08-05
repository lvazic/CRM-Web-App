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

    <title>CRM Aplikacija - Dodavanje prodaje</title>

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
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>



<script>
$.getJSON("php/getProducts.php", function(result) {
    var options = $("#proizvod");
$.each(result, function() {
    options.append($("<option />").val(this.pid).text(this.naziv));
});
});

</script>



<script>
$.getJSON("php/getAccountsForSale.php?kid=<?php echo $_SESSION['kid']?>", function(result) {
    var options = $("#account");
$.each(result, function() {
    options.append($("<option />").val(this.fid).text(this.naziv));
});
});

</script>


<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  
  
  
  function sumOfColumns(tableID, columnIndex, hasHeader) {
  var tot = 0;
  $("#" + tableID + " tr" + (hasHeader ? ":gt(0)" : ""))
  .children("td:nth-child(" + columnIndex + ")")
  .each(function() {
    tot += parseInt($(this).html());
	console.log(tot);
  });
  return tot;
}
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
					
					<li class="active">
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
                            Nova prodaja
                            <small>Unos nove prodaje</small>
                        </h1>
						
						
						<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i>  Podaci o accountu
                            </li>

                        </ol>
						<form id="faktura" name="faktura" method="post">
											<p><b> Account</b><select class="account form-control" id="account" name="account" ></p>
											</select>
											<p><b>Datum:</b> <input type="text" name="datum" class="datum form-control" id="datepicker"></p>
											<p><b>Napomene:</b> <textarea class="napomene form-control" rows="3" name="napomene"></textarea></p>
											
											
											</br>
						
						<ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-money"></i>  Stavke prodaje
                            </li>

                        </ol>
						
					<table class="table table-striped table-bordered table-condensed" id="stavkepor" name="stavkepor">
  <tr>
    <th class="tg-031e">Proizvod</th>
    <th class="tg-031e">Cena</th>
    <th class="tg-031e">Količina</th>
    <th class="tg-031e">Zbir</th>
  </tr>
  <tr class="item-row">
    <td><select class="proizvod form-control" id="proizvod" name="proizvod[]" ></td>
    <td><input class="cena form-control" id="cena" type="text" readonly></td>
    <td><input class="kolicina form-control" id="kolicina" name="kolicina[]" type="text" value=""></td>
    <td><input class="sum form-control" id="sum"  type="text" value="0" readonly></td>
  </tr>
</table>
				<p> Total<input class="total form-control" id="total" type="text" value="0" readonly><p>
                <button class="btn btn-primary open2" name = "slanje" type="submit">Sačuvaj prodaju </button> 
				 <button class="btn" id="dodavanje" name="dodavanje" type="button">Dodaj stavku </button>
				 
				               


</form>

<script>
$('#proizvod').on('change', function() {
	var polje = this;
  var pid = this.value;
  $.getJSON("php/getProducts.php", function(result) {
    var options = $("#proizvod");
$.each(result, function() {
	if (this.pid == pid) {
  //  $("#cena").val(this.cena);
	$(polje).parents('tr.item-row').find('td input.cena').val(this.cena);
	}
});
});
})


$('#kolicina').on('change', function() {
	var polje2 = this;
  var kol = this.value;
  var cena = $(polje2).parents('tr.item-row').find('td input.cena').val();

  $(polje2).parents('tr.item-row').find('td input.sum').val(kol*cena);
 // $('#sum').val(kol*$('#cena').val());
  
  var sum = 0;
$('.sum').each(function(){
    sum += parseFloat($(this).val()); 
});
  $('#total').val(sum);
  
  
})

$(document).ready(function() {
    $("#dodavanje").click(function(){
var row = $('#stavkepor tbody > tr:last').clone(true);            
    row.insertAfter('#stavkepor tbody > tr:last');
   return false;           
    });
	

});


</script>


		<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit



	var HTMLstorage = $("#faktura").html();
	

    
     $("#faktura").submit(function(e) {
		  
		   var $this = $(this);
  e.preventDefault();
		var formData = $("#faktura").serialize;
		console.log(formData);
		
		 $.ajax({
      type: "POST",
      url: "php/addSales.php",
      data: $this.serialize() + '&ajax=true',
      cache: false,
      success: function(data) {
		  
		  

		  $("#faktura").html('<h3>' + data + '</h3>' +'<button class="unos btn" id="noviunos" name="noviunos" type="button">Dodaj novu prodaju </button>');
				  console.log("dodato" + data);

      }
  });
		

	
	
	
         
        return false;
      
    }); 
	
	$('#faktura').on('click', '.unos', function() {
			console.log("prolaz");
$("#faktura").html(HTMLstorage);

   return false;           
    });

  });
</script>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</div>
</body>

</html>
