<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Swindon Town Raffle System</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo Config::get('URL'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo Config::get('URL'); ?>css/styles.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="<?php echo Config::get('URL'); ?>dashboard">Swindon Town FC</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
	  
	<?php if (Session::userIsLoggedIn()) : ?>
	
	  <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="javascript:void(null);">
		  <?php if (isset($this->user_avatar_file)) { ?>
                                    <img class="avatar" width="20px;" height="20px;" src="<?= $this->user_avatar_file; ?>" />
                                <?php } ?>
			<?= $this->user_name; ?> <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
          <li><a href="<?php echo Config::get('URL'); ?>dashboard">My dashboard</a></li>
            <li><a href="<?php echo Config::get('URL'); ?>login/myDetails">My details</a></li>
			<li >
                        <a href="<?php echo Config::get('URL'); ?>login/editAvatar">Edit my avatar</a>
                    </li>
			
				<li>
                        <a href="<?php echo Config::get('URL'); ?>login/editusername">Edit my username</a>
                    </li>
                    <li>
                        <a href="<?php echo Config::get('URL'); ?>login/edituseremail">Edit my email</a>
                    </li>
					
			<li><a href="<?php echo Config::get('URL'); ?>login/logout">Sign out</a></li>
          </ul>
        </li>
			<?php endif; ?>	
                </ul>
				
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

		
		
		
		