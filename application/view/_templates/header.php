<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Swindon Town FC - Online Raffle</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="<?php echo Config::get('URL'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="<?php echo Config::get('URL'); ?>/css/font-awesome.min.css" rel="stylesheet">
    
    <link href="<?php echo Config::get('URL'); ?>/css/main.css" rel="stylesheet"> 
    <link href="<?php echo Config::get('URL'); ?>/css/main-responsive.css" rel="stylesheet"> 
    
    <link href="<?php echo Config::get('URL'); ?>/css/pages/dashboard.css" rel="stylesheet">
	<link href="<?php echo Config::get('URL'); ?>/css/pages/faq.css" rel="stylesheet">
	<link href="<?php echo Config::get('URL'); ?>/css/pages/login.css" rel="stylesheet">
	<link href="<?php echo Config::get('URL'); ?>/css/pages/plans.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/hint.css/1.3.2/hint.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/hint.css/1.3.2/hint.min.css">
	
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
  </head>
  
  
  
  <body>
	
<div class="navbar navbar-fixed-top navbar-inverse">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
						<a class="brand" href="dashboard">Swindon Town FC</a>
			<?php if (!Session::userIsLoggedIn()) : ?>
			
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					
					<li class="">
						
						<a href="javascript:;"><i class="icon-chevron-left"></i> Swindon Town FC Website</a>
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
			<?php endif; ?>
			<?php if (Session::userIsLoggedIn()) : ?>
			<div class="nav-collapse">
			
				<ul class="nav pull-right">
					<!--<li>
						<a href="#"><span class="badge badge-warning">7</span></a>
					</li>
					
					<li class="divider-vertical"></li>-->
					
					<li class="dropdown">
						
						<a data-toggle="dropdown" class="dropdown-toggle " href="#">
							<?php if (isset($this->user_avatar_file)) { ?>
                                    <img class="avatar" width="20px;" height="20px;" src="<?= $this->user_avatar_file; ?>" />
                                <?php } ?>
							<?= $this->user_name; ?> <b class="caret"></b>							
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="account"><i class="icon-user"></i> Account Settings  </a>
							</li>
							
							<li class="divider"></li>
							
							<li>
								<a href="./"><i class="icon-off"></i> Logout</a>
							</li>
						</ul>
					</li>
				</ul>
				
			</div> <!-- /nav-collapse -->
			
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->




<div id="content">
	
	<div class="container">
		
		<div class="row">
			
			<div class="span3">
				
				<div class="account-container">
				
					<div class="account-avatar">
					  <?php if (isset($this->user_avatar_file)) { ?>
						<img src="<?= @$this->user_avatar_file; ?>" alt="" class="thumbnail" />
						<?php } ?>
					</div> <!-- /account-avatar -->
					<div class="account-details">
					
						<span class="account-name"><?= @$this->user_name; ?></span>
						
						<span class="account-role">Administrator</span>
						
						<span class="account-actions">
							<a href="account">My Account</a>
						</span>
					
					</div> <!-- /account-details -->
				
				</div> <!-- /account-container -->
				
				<hr />
				
				<ul id="main-nav" class="nav nav-tabs nav-stacked">
					<li <?= (@$this->page == 'dashboard') ? 'class="active"' : ''; ?>>
						<a href="dashboard">
							<i class="icon-home"></i>
							Dashboard 		
						</a>
					</li>
					
					<li <?= (@$this->page == 'raffle_listing') ? 'class="active"' : ''; ?>>
						<a href="raffle">
							<i class="icon-th-list"></i>
							Raffle Listing		
						</a>
					</li>

					<li <?= (@$this->page == 'my_raffles') ? 'class="active"' : ''; ?>>
						<a href="./account.html">
							<i class="icon-user"></i>
							My Raffles							
						</a>
					</li>
					
					<li <?= (@$this->page == 'faq') ? 'class="active"' : ''; ?>>
						<a href="./faq.html">
							<i class="icon-pushpin"></i>
							FAQ	
						</a>
					</li>
				</ul>	
				
				<hr />
				
				<div class="sidebar-extra">
					<p></p>
				</div> <!-- .sidebar-extra -->
				
				<br />
		
			</div> <!-- /span3 -->
		  <?php endif; ?>
		  
		

		
		