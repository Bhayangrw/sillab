<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sillab</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}

    <!-- MetisMenu CSS -->
	{{ HTML::style('assets/bower_components/metisMenu/dist/metisMenu.min.css') }}

    <!-- Custom CSS -->
	{{ HTML::style('assets/dist/css/sb-admin-2.css') }}

    <!-- Custom Fonts -->
	{{ HTML::style('assets/bower_components/font-awesome/css/font-awesome.min.css') }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center"><b>Login Sillab</b></h3>
                    </div>
                    <div class="panel-body">
					{{ Form::open(array('url' => 'login')) }}
                    
					<div class="input-group">
					<font color="red">
						{{ $errors->first('email') }}
                    </p></font>
					</div>
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></div>
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Email')) }}
					</div>
					</p>
					
					<div class="input-group">
					<font color="red"><p>
						{{ $errors->first('password') }}
                    </p><font>
					</div>
					<div class="input-group">
					<div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
						{{ Form::password('password', array('class' => 'form-control','placeholder'=>'Password')) }}
					</div>
					</p>
                    </br>
						{{ Form::submit('Login', array('class' => 'btn btn-success btn-block')) }}
					</p>
					{{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
   {{ HTML::script('assets/bower_components/jquery/dist/jquery.min.js') }}
    <!-- Bootstrap Core JavaScript -->
	{{ HTML::script('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    <!-- Metis Menu Plugin JavaScript -->
	{{ HTML::script('assets/bower_components/metisMenu/dist/metisMenu.min.js') }}
    <!-- Custom Theme JavaScript -->
	{{ HTML::script('assets/dist/js/sb-admin-2.js') }}
	{{ HTML::script('assets/apps.js') }}

</body>

</html>
