<!DOCTYPE html>
<html>
<head>
	<title>Reign of Kings Calculator</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="114x114" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="144x144" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="60x60" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="120x120" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="76x76" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="152x152" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon-196x196.png" sizes="196x196">
	<link rel="icon" type="image/png" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#2d89ef">
	<meta name="msapplication-TileImage" content="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/mstile-144x144.png">
	<meta name="msapplication-square70x70logo" content="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/mstile-70x70.png">
	<meta name="msapplication-square150x150logo" content="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/mstile-150x150.png">
	<meta name="msapplication-square310x310logo" content="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/mstile-310x310.png">
	<meta name="msapplication-wide310x150logo" content="//d36hxw7jlqf0i5.cloudfront.net/mo/icon/mstile-310x50.png">
	<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<link rel="stylesheet" type="text/css" href="//s1.parkshade.com/rok/css/rok.css">
</head>
<body>
	<div class="container tcenter mb1">
		<h1>Reign of Kings Calculator</h1>
		<div class="row mt1 mb1">
			<div class="col-md-1 status">
				<div class="affix">
					<i class="fa fa-check"></i><br>
					<span class="hidden-xs remain">2,000</span>
				</div>
				<div class="visible-xs">
					<span class="remain">2,000</span> Points Remaining
				</div>
			</div>
			<div class="col-md-11 group rel">
				<div class="item">
					<input id="cash" type="number" value="2000" min="0" step="1" required="required">
					<label>Total Points</label>
				</div>
				<div class="item">
					<input id="build_per" type="number" value="25" min="0" step="1" required="required">
					<label>Build Cost Percentage</label>
				</div>
				<?php foreach($neon as $name => $tmp): ?>
					<div class="item material">
						<input type="number" min="0" step="1" data-item="<?php echo $name; ?>" required="required">
						<label>
							<?php echo $name; ?>
							<span class="spent hide" data-item="<?php echo $name; ?>"></span>
						</label>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		Made with <i class="fa fa-heart"></i> by <a href="http://mauriceprosper.com">Maurice Prosper</a> on <a href="https://github.com/mothepro/RoK-Calc"><i class="fa fa-github-alt"></i></a>.
	</div>

	<script defer type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script defer type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
	<script defer type="text/javascript" src="//s1.parkshade.com/rok/js/rok.js"></script>
 	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-48191613-5', 'auto');
	ga('send', 'pageview');
	</script>
</body>
</html>
