<!DOCTYPE html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>Whistle Blowing System - Login</title>
<meta name="description" content="">
<meta name="author" content="">
<?php
    $base = base_url();
    $css = $base . 'assets/css/';
    $js = $base . 'assets/js/';
    $lib = $base . 'assets/lib/';
    $i = $base . 'assets/images/';
    ?>

<link rel="stylesheet" href="<?php echo $css; ?>login.css" type="text/css" />
<script type="text/javascript" src="<?php echo $js; ?>login.js"></script>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>

<div class="container">
<div class="flat-form">
<div id="login" class="form-action show">
<h1>Whistle Blowing System</h1>
<p style="font-size:18px;">PT Perkebunan Nusantara I</p>
<?php if (isset($_GET['status'])): ?>
<p style="color:#de4949;">Username atau Password Anda salah.</p>
<?php else:?>
<p>Please login here.</p>
<?php endif; ?>
<form name="flogin" method="POST" action="<?php echo $base; ?>login/do_login">
<ul>
<li>
<input type="text" id="username" name="username" placeholder="Username" />
</li>
<li>
<input type="password" id="password" name="password" placeholder="Password" />
</li>
<li>
<input type="submit" value="Login" class="button" />
</li>
</ul>
</form>


</div>
<!--/#login.form-action-->
</div>
</div>
</body>
</html>


