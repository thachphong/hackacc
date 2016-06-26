
<html lang="en" id="site" dir="ltr">
	<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Your invoices">
        <meta name="author" content="Phalcon Team">
        <link rel='stylesheet' id='Roboto-css'  href='http://fonts.googleapis.com/css?family=Roboto' type='text/css' media='all' />        
        {{ stylesheet_link('templateadm/css/jquery.modal.css') }}
        {{ stylesheet_link('templateadm/css/bootstrap.min.css') }}
        {{ javascript_include('templateadm/js/jquery-1.10.2.min.js') }}
        {{ javascript_include('templateadm/js/bootstrap.min.js') }}
        {{ javascript_include('templateadm/js/jquery.modal.js') }}
        
    </head>
	<body>		
        <!--<div id="page">-->
        <nav class="navbar navbar-fixed-top navbar-inverse" style="position: relative">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand logo" href="index" ></a>
        </div>      
        <div class="collapse navbar-collapse"><div class="navbar-header">    
        	<a class="navbar-brand" href="#">Video Hay</a>    
        	</div>
        	<ul class="nav navbar-nav navbar-left">
	        	<li><a href="/hackacc/index/index">Home</a></li>
	        	<li><a href="/hackacc/download/index">Hot</a></li>
        	</ul>
        </div>      </div><!-- /.container -->
      
    </nav>
        <!--</div>-->
        <div align="center">
		{{ content() }}

	

		</div>
			
		<!--<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
		    
		<div class="container">
		    <div class="navbar-text pull-left">Copy right 2016</div>
		</div>
		</div>-->
	</body>
</html>
