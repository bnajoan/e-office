<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Masuk</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet">
<link href="<?php echo base_url("assets/css/styles.css");?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>">

<!--[if lt IE 9]>
<script src="<?php echo base_url("assets/js/html5shiv.js");?>"></script>
<script src="<?php echo base_url("assets/js/respond.min.js");?>"></script>
<![endif]-->

<style id="glyphs-style" type="text/css">
    .glyph{
        fill:currentColor;
        display:inline-block;
        margin-left:auto;
        margin-right:auto;
        position:relative;
        text-align:center;
        vertical-align:middle;
        width:70%;
        height:70%;
    }

    .glyph.sm{width:30%;height:30%;}
    .glyph.md{width:50%;height:50%;}
    .glyph.lg{height:100%;width:100%;}
    .glyph-svg{width:100%;height:100%;}
    .glyph-svg .fill{fill:inherit;}
    .glyph-svg .line{stroke:currentColor;stroke-width:inherit;}
    .glyph.spin{animation: spin 1s linear infinite;}

    @-webkit-keyframes spin {
        from { transform:rotate(0deg); }
        to { transform:rotate(360deg); }
    }
    @-moz-keyframes spin {
        from { transform:rotate(0deg); }
        to { transform:rotate(360deg); }
    }
    @keyframes spin {
        from { transform:rotate(0deg); }
        to { transform:rotate(360deg); }
    }
</style>
</head>

<body>

	<div class="">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
                    <h3><b>E-Office</b>Manado v1.0</h3>
                </div>
				<div class="panel-body">
                    <b>Login ke akun anda</b><hr style="margin: 10px 0;" />
					<form role="form" action="" method="POST" class="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
                            <?php if(isset($_GET["err"])): ?>
                            <div class="alert bg-danger" role="alert">
                                Login gagal! Periksa username atau password <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                            <?php endif;?>
							<button type="submit" name="btnSubmit" class="btn btn-success"><i class="fa fa-sign-in fa-lg"></i> Login</button>
						</fieldset>
					</form>
				</div>
                <div class="panel-footer">

                </div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="<?php echo base_url("assets/js/jquery-1.11.1.min.js");?>"></script>
	<script src="<?php echo base_url("assets/js/bootstrap.min.js");?>"></script>
</body>

</html>
