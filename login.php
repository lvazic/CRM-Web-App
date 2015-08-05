<!DOCTYPE html>
<html>
<head>

<?php
// include('php/loginHandler.php'); // Includes Login Script

if(isset($_SESSION['imeprezime'])){
header("location: index.php");
}
?>


    <meta charset="utf-8" />
    <title>CRM - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>
body { 
  background: url(http://www.lafarge.com/sites/mediacenter/files/pl045396.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.panel-default {
opacity: 0.9;
margin-top:80px;
}
.form-group.last { margin-bottom:0px; }
</style>



<body>


<div class="container">

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span>  CRM - Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="loginform" method="post" action="php/loginHandler.php">
                    <div class="form-group">
                        <label for="inputText3" class="col-sm-3 control-label">
                            Ime</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="ime" id="inputText3" placeholder="Ime">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Lozinka</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="lozinka" id="inputPassword3" placeholder="Lozinka">
                        </div>
						 

                    </div>

                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" id="submitbtn" class="btn btn-success btn-sm">
                                Login</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    </form>

            </div>
        </div>
    </div>
</div>

	<script type="text/javascript" src="jquery.validate.js"></script>
	<script type="text/javascript">
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#loginform").validate({
      rules: {
        ime: {
          required: true,
        },
        lozinka: {
          required: true,
        },

      },
      errorElement: "span",
      errorClass: "help-inline-error",
	   submitHandler: function(form) {
    form.submit();
  }
    });

    
     $("#loginform").submit(function(e) {
      if (v.form()) {
		  
		   var $this = $(this);
        $("#loader").show();
		var formData = $("#loginform").serialize;
		console.log(formData);
	
	
         
        return false;
      }
	  else v.focusInvalid();
    }); 

  });
</script>

</div>


</body>
</html>