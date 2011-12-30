<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Andover Exchange | <?php echo $title; ?></title>
	<meta name="description" content="">

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,regularitalic,bold,bolditalic&amp;v1" rel="stylesheet" type="text/css">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet/less" href="/css/lib/bootstrap.less">
	<script src="/js/less-1.1.3.min.js"></script>
</head>

<body>
		<header class="topbar" data-dropdown="dropdown">
			<div class="topbar-inner">
				<div class="container">
					<h3><a href="/">AndoverExchange [beta]</a></h3>
					<ul class="nav">
						<?php if (Sentry::check()): ?>
						<li class="<?php echo Uri::segment(1) == 'dashboard' ? 'active' : '' ?>"><a href="/dashboard">Dashboard</a></li>
						<?php endif; ?>
						<li class="<?php echo Uri::segment(1) == 'browse' ? 'active' : '' ?>"><a href="/browse">Browse</a></li>
						<li class="<?php echo Uri::segment(1) == 'about' ? 'active' : '' ?>"><a href="/about">About</a></li>
						<?php if (Sentry::check() && Sentry::user()->is_admin()): ?>
						<li class="dropdown" data-dropdown="dropdown">
								<a href="#" class="dropdown-toggle">Administer</a>
								<ul class="dropdown-menu">
									<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>
										<?php
										$section_segment = basename($controller, '.php');
										$section_title = Inflector::pluralize(Inflector::humanize($section_segment));
										?>
										
									<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
										<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
									</li>
									<?php endforeach; ?>
									<li class="divider"></li>
									<li><a href="/user/logout">Logout</a></li>
								</ul>
							</li>
						<?php endif; ?>
					</ul>
					<?php if (Sentry::check()): ?>
						<ul class="nav secondary-nav">
							<li class="dropdown" data-dropdown="dropdown">
								<a href="#" class="dropdown-toggle"><?php echo $user_metadata['first_name'].' '.$user_metadata['last_name']; ?></a>
								<ul class="dropdown-menu">
									<li><a href="#">Preferences</a></li>
									<li><a href="#">Help</a></li>
									<li class="divider"></li>
									<li><a href="/user/logout">Logout</a></li>
								</ul>
							</li>
						</ul>
					<?php endif; ?>
					<?php if (!Sentry::check()): ?>
						<ul class="nav secondary-nav">
							<li><a href="#" data-controls-modal="login-modal">Login</a></li>
						</ul>
					<?php endif; ?>
				</div>
			</div>
	</header>
	<div class="container">
		<?php if (Session::get_flash('success')): ?>
					<div class="alert-message success">
						<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
						</p>
					</div>
				<?php endif; ?>
				<?php if (Session::get_flash('error')): ?>
					<div class="alert-message error">
						<p>
						<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
						</p>
					</div>
		<?php endif; ?>
		<div class="row">
			<div class="span16">
			<?php echo $content; ?>
			</div>
		</div>
		<footer>
		<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
		</footer>
	</div>
	
	<div id="login-modal" class="modal hide fade">
          <div class="modal-header">
            <a href="#" class="close">x</a>
            <h3>Login</h3>
          </div>
          <div class="modal-body">
            <form action="/user/login" method="post">
				<input name="action" value="login" type="hidden">
				<div class="clearfix">
					<label for="username">Username:</label>
					<div class="input">
						<input class="xlarge" name="username" type="text" required="true">
						<span class="help-block">This is your PANet username</span>
					</div>
				</div>
				<div class="clearfix">
					<label for="password">Password:</label>
					<div class="input">
						<input class="xlarge" name="password" placeholder="" type="password" required="true">
						<span class="help-block">Forgot your password? Click <a href="user/reset_password">here</a> to reset it</span>
					</div>
				</div>
				<div class="clearfix">
					<div class="input">
						<input class="btn primary submit-button" type="submit" value="Login">
					</div>
				</div>
				<div class="clearfix">
					<div class="input">
						<div class="fb-login-button" data-show-faces="true" data-max-rows="1"></div>
					</div>
				</div>
			</form>
          </div>
    </div>
	
	<script src="/js/modernizr-2.0.6.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="/js/jquery-1.6.2.min.js"><\/script>')</script>
	<script src="/js/bootstrap-dropdown.js"></script>
	<script src="/js/bootstrap-modal.js"></script>
	<script src="/js/jquery.tablesorter.min.js"></script>
	<script src="/js/scripts.js"></script>
	<div id="fb-root"></div>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '331237286894156',
		  status     : true,
		  cookie     : true,
		  xfbml      : true
		});
	  };

	  (function(d){
		 var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		 js = d.createElement('script'); js.id = id; js.async = true;
		 js.src = "//connect.facebook.net/en_US/all.js";
		 d.getElementsByTagName('head')[0].appendChild(js);
	   }(document));
	</script>
	<script>
	window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
	Modernizr.load({
	  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
	});
	</script>

	<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
  
</body>
</html>