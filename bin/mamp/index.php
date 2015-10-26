<?php

include_once 'php/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

		<title><?php echo appName(); ?></title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<!-- Custom styles for this template -->
		<link href="css/style.css" rel="stylesheet">
    
<?php if($page == "home" || $page == "faq") { 
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
{
		include_once('../phpMyAdmin/config.inc.php');
}
else
{
	if ($configObject->app == "MAMP")
	{
		include_once('/Applications/MAMP/bin/phpMyAdmin/config.inc.php');
	}
	else 
	{
		include_once('/Library/Application Support/appsolute/MAMP PRO/phpMyAdmin/config.inc.php');
	}
}
?>
		<link href="css/screen.css" rel="stylesheet">
<?php } else if($page == "phpinfo") { ?>
		<style>
			table {border-collapse: collapse;}
			.center {text-align: center;}
			.center table { margin-left: auto; margin-right: auto; text-align: left;}
			.center th { text-align: center !important; }
			td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
			h1 {font-size: 150%;}
			h2 {font-size: 125%;}
			.p {text-align: left;}
			.e {background-color: #ccccff; font-weight: bold; color: #000000;}
			.h {background-color: #9999cc; font-weight: bold; color: #000000;}
			.v {background-color: #cccccc; color: #000000;}
			.vr {background-color: #cccccc; text-align: right; color: #000000;}
			img {float: right; border: 0px;}
			hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
		</style>
<?php } ?>
	</head>
<!-- NAVBAR
================================================== -->
	<body>
		<div class="navbar-wrapper">
			<div class="container">
				<div class="navbar navbar-inverse navbar-static-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li<?php if($page=="home") { ?> class="active"<?php } ?>><a href="index.php?language=<?php echo $language; ?>"><?php echo tr("Start"); ?></a></li>
							<?php $myWebsite='http://localhost:8888'; if($myWebsite!='') { echo '<li><a class="navbar-brand" href="' . $myWebsite . '" target="_blank">' . tr('My Website') . '</a></li>'; } ?>
							<li<?php if($page=="phpinfo") { ?> class="active"<?php } ?>><a href="index.php?language=<?php echo $language; ?>&amp;page=phpinfo">phpInfo</a></li>
							<li<?php if (strpos('apc eaccelerator xcache phpmyadmin sqlitemanager phpliteadmin', $page) !== false) { ?> class="active dropdown"<?php } else { ?> class="dropdown" <?php } ?>>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo tr("Tools") ?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?php if(extension_loaded('apc')): ?>
										<li<?php if($page=="apc") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "apc.php"; ?>">APC</a></li>									<?php endif ?>
									<?php if(extension_loaded('eAccelerator')): ?>
										<li<?php if($page=="eaccelerator") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "eaccelerator.php"; ?>">eAccelerator</a></li>									<?php endif ?>
									<?php if(extension_loaded('XCache')): ?>
										<li<?php if($page=="xcache") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "xcache-admin/"; ?>">XCache</a></li>									<?php endif ?>
									<?php if(version_compare(PHP_VERSION, '5.3.0', '>=')) { ?>
										<li<?php if($page=="phpmyadmin") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "phpmyadmin.php?lang=".tr("phpMyAdminLanguage"); ?>">phpMyAdmin</a></li>									<?php } ?>
									<?php if(version_compare(PHP_VERSION, '5.2.0', '>=') and version_compare(PHP_VERSION, '5.4.0', '<')) { ?>
										<li<?php if($page=="sqlitemanager") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "/SQLiteManager/"; ?>">SQLite Manager</a></li>									<?php } ?>
									<li<?php if($page=="phpliteadmin") { ?> class="active"<?php } ?>><a target="_blank" href="<?php echo "/phpLiteAdmin/"; ?>">phpLiteAdmin</a></li>								</ul>
							</li>
							<li<?php if($page=="faq") { ?> class="active"<?php } ?>><a href="index.php?page=faq&amp;language=<?php echo $language; ?>"><?php echo tr("FAQ"); ?></a></li>
							<li><a class="navbar-brand" href="http://www.mamp.info/en/mamp-pro/index.html" target="_blank"><?php printf(tr("%s Website"),appName()); ?></a></li>
							<?php $myFavLink=''; if($myFavLink!='') { echo '<li><a class="navbar-brand" href="' . $myFavLink . '" target="_blank">' . tr('My favorite Link') . '</a></li>'; } ?>
						</ul><!-- end left -->
						<ul class="nav navbar-nav navbar-right">
						<?php if (1 != is_bought()){ ?>
							<li class="btn-buy"><a style="color:white;" href="<?php echo buyLink(); ?>" target="_blank"><?php echo tr("Buy MAMP PRO"); ?></a></li>
						<?php } else { ?>
							<li><a style="margin-top:10px; margin-right:10px;padding:0;" href="http://www.appsolute.de" target="_blank"><img src="images/appsolute-logo-transparent.png" height="30" style="margin:0;padding:0;"/></a></li>
						<?php } ?>
						</ul><!-- end right -->
					</div><!-- end collapse -->
				</div><!-- end navbar -->
			</div><!-- end container -->
		</div><!-- end navbar-wrapper -->

<?php if($page == "phpinfo") { ?>
		<div class="top85">
			<?php echo $phpinfo; ?>
		</div>
<?php } else if($page == "phpmyadmin") { ?>
      <?php print iFrame("phpmyadmin.php?lang=".tr("phpMyAdminLanguage")); ?>
<?php } else if($page == "sqlitemanager") { ?>
      <?php print iFrame("/SQLiteManager/"); ?>
<?php } else if($page == "phpliteadmin") { ?>
      <?php print iFrame("/phpLiteAdmin/"); ?>
<?php } else if($page == "apc") { ?>
      <?php print iFrame("apc.php"); ?>
<?php } else if($page == "eaccelerator") { ?>
      <?php print iFrame("eaccelerator.php"); ?>
<?php } else if($page == "xcache") { ?>
      <?php print iFrame("xcache-admin/"); ?>
<?php } else if ($page == "faq") { ?>
                
                <div class="container top85">
                    <div class="frame">
                        <h1><?php echo tr("FAQ"); ?></h1>
                        <dl>
                           <dt><?php echo tr("Which programs are installed?"); ?></dt>
                           <dd><ul>
							<?php
						    $faqPath = "includes/faq_".$configObject->app.".php";
						    foreach ($configObject->components as $component)
						    {
						        echo '<li>'.htmlspecialchars($component->name)." ".htmlspecialchars($component->version),'</li>';
						    }?>
                           </ul></dd>
<?php include($faqPath); ?>                            
                        </dl>
                    </div>
                </div>
                
<?php } else { ?>
      
    <!-- Carousel
    ================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">  
 <?php

	$feed = getFeed();
	$items = createItemsForCarouselFromFeedObject($feed);
        $currVersion = isset($feed->currentVersion) ? $feed->currentVersion : $configObject->version;
        $newsItems = isset($feed->news) ? $feed->news : array();
 	
 ?>
		<!-- Indicators -->
<?php if (count($items) > 0) { ?>                            
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<?php for ($i=0; $i<count($items);$i++) { ?>        
				<li data-target="#myCarousel" data-slide-to="<?php echo (1+$i); ?>"></li>
<?php } ?>
			</ol>
<?php } ?>                
			<div class="carousel-inner">
				<div class="item active carousel-back-green">
					<div class="carousel-caption">
						<div class="container">
							<table border="0">
								<tr>
									<td width="30%" class="hidden-xs">
										<img src="images/mampLogoCarouselLeft.png" style="width:100%">
									</td>
									<td>
										<h1><?php echo tr("Welcome!"); ?></h1>
										<h2><?php printf(tr("%s has been installed successfully."),appName()); ?></h2>
									</td>
									<td width="30%" class="hidden-xs">
										<img src="images/checkmarkCarouselRight.png" style="width:100%">
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
<?php foreach ($items as $item) {  ?>        
				<div class="item<?php echo isset($item->backgroundClass) ? " ".$item->backgroundClass : ""; ?>"<?php echo isset($item->backgroundImage) ? ' style="background-image:url('.$item->backgroundImage.');background-repeat:repeat;"' : ''; ?>>
					<div class="carousel-caption">
						<div class="container">
							<table border="0">
								<tr>
									<td width="30%" class="hidden-xs">
										<img src="<?php print $item->leftImage;?>" style="width:100%">
									</td>
									<td<?php echo isset($item->paddingTop) ?  ' style="padding-top:'.$item->paddingTop.';"' : ''; ?>>
										<?php print $item->centerHTML; ?>
									</td>
									<td width="30%" class="hidden-xs">
										<img src="<?php print $item->rightImage;?>" style="width:100%">
									</td>
								</tr>
							</table>
						</div> 
					</div>
				</div>
<?php } ?>
			</div>
		</div><!-- /.carousel -->

		<div class="container marketing">
			<div class="row">
				<div class="col-lg-6">
					<div class="frame">
						<h2>PHP</h2>
						<p><?php printf(tr('%sphpinfo%s shows the current configuration of PHP.'), a('phpinfo'),'</a>'); ?></p><br>
						<h2>MySQL</h2>

						<p><?php printf(tr('MySQL can be administered with %sphpMyAdmin%s.'), a('phpmyadmin'),'</a>'); ?></p>
						<p><?php echo tr("To connect to the MySQL Server from your own scripts use the following connection parameters:"); ?></p>
						<table class="mysql">
							<tr>
								<th><?php echo tr("Host"); ?></th>
								<td><?php echo $cfg['Servers'][1]['host']; ?></td>
							</tr>
							<tr>
								<th><?php echo tr("Port"); ?></th>
								<td><?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : "3306"; ?></td>
							</tr>
							<tr>
								<th><?php echo tr("User"); ?></th>
								<td><?php echo $cfg['Servers'][1]['user']; ?></td>
							</tr>
							<tr>
								<th><?php echo tr("Password"); ?></th>
								<td><?php echo $cfg['Servers'][1]['password']; ?></td>
							</tr>
							<tr>
								<th><?php echo tr("Socket"); ?></th>
								<td>/Applications/MAMP/tmp/mysql/mysql.sock</td>
							</tr>
						</table>

<br>
<h3><?php echo tr("Examples:"); ?></h3>

<ul class="nav nav-pills" role="tablist">
  <li class="active"><a href="#php" role="tab" data-toggle="tab">PHP <= 5.5.x</a></li>
  <li><a href="#php56" role="tab" data-toggle="tab">PHP >= 5.6.x</a></li>
  <li><a href="#python" role="tab" data-toggle="tab">Python</a></li>
  <li><a href="#perl" role="tab" data-toggle="tab">Perl</a></li>
</ul>

<div class="tab-content">

<div class="tab-pane active" id="php">
<br>
<pre>
$user = '<?php echo $cfg['Servers'][1]['user']; ?>';
$password = '<?php echo $cfg['Servers'][1]['password']; ?>';
$db = 'inventory';
$host = 'localhost';
$port = <?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : "3306" ?>;

$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);
$db_selected = mysql_select_db(
   $db, 
   $link
);
</pre>

<?php if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') { ?>
<p><?php echo tr("or using an UNIX Socket:"); ?></p>
<pre>
$user = '<?php echo $cfg['Servers'][1]['user']; ?>';
$password = '<?php echo $cfg['Servers'][1]['password']; ?>';
$db = 'inventory';
$socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';

$link = mysql_connect(
   $socket, 
   $user, 
   $password
);
$db_selected = mysql_select_db(
   $db, 
   $link
);
</pre>
<?php } ?>
</div> <!-- PHP tab pane -->
  
<div class="tab-pane" id="php56">
<br>
<pre>
$user = '<?php echo $cfg['Servers'][1]['user']; ?>';
$password = '<?php echo $cfg['Servers'][1]['password']; ?>';
$db = 'inventory';
$host = 'localhost';
$port = <?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : 3306 ?>;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
</pre>

<?php if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') { ?>
<p><?php echo tr("or using an UNIX Socket:"); ?></p>
<pre>
$user = '<?php echo $cfg['Servers'][1]['user']; ?>';
$password = '<?php echo $cfg['Servers'][1]['password']; ?>';
$db = 'inventory';
$host = '127.0.0.1';
$port = <?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : 3306 ?>;
$socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host,
   $user, 
   $password, 
   $db,
   $port,
   $socket
);
</pre>
<?php } ?>
</div> <!-- PHP 5.6 tab pane -->
  
<div class="tab-pane" id="python">
<br>
<pre>import mysql.connector

config = {
  'user': '<?php echo $cfg['Servers'][1]['user']; ?>',
  'password': '<?php echo $cfg['Servers'][1]['password']; ?>',
  'host': 'localhost:<?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : "3306" ?>',
  'database': 'inventory',
  'raise_on_warnings': True,
}

link = mysql.connector.connect(**config)
</pre>

<?php if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN') { ?>
<p><?php echo tr("or using an UNIX Socket:"); ?></p>
<pre>import mysql.connector

config = {
  'user': '<?php echo $cfg['Servers'][1]['user']; ?>',
  'password': '<?php echo $cfg['Servers'][1]['password']; ?>',
  'unix_socket': '/Applications/MAMP/tmp/mysql/mysql.sock',
  'database': 'inventory',
  'raise_on_warnings': True,
}

link = mysql.connector.connect(**config)
</pre>
<?php } ?>
</div> <!-- Python tab pane -->
  
<div class="tab-pane" id="perl">
<br>
<pre>
use DBI;
 
my $user = '<?php echo $cfg['Servers'][1]['user']; ?>';
my $password = '<?php echo $cfg['Servers'][1]['password']; ?>';
my $db = 'inventory';

my $link = DBI->connect(
   "DBI:mysql:database=$db", 
   $user, 
   $password
);
</pre>

<p><?php echo tr("or connecting via network:"); ?></p>

<pre>
use DBI;
 
my $user = '<?php echo $cfg['Servers'][1]['user']; ?>';
my $password = '<?php echo $cfg['Servers'][1]['password']; ?>';
my $db = 'inventory';
my $host = 'localhost';
my $port = <?php echo $cfg['Servers'][1]['port'] ? $cfg['Servers'][1]['port'] : "3306" ?>;

my $link = DBI->connect(
   "DBI:mysql:database=$db;host=$host;port=$port", 
   $user, 
   $password
);
</pre>
</div> <!-- Perl tab pane -->
</div> <!-- tab content -->

					</div>        
					<div class="frame">
						<a href="http://www.appsolute.de" target="_blank"><img src="images/appsolute-logo.png" alt="appsolute GmbH"/></a><br />
						<?php printf(tr("<b>MAMP</b> and <b>MAMP PRO</b> are developed and distributed by %s."),'<a href="http://www.appsolute.de" target="_blank">appsolute GmbH</a>'); ?><br /><br />
						
						<?php 
							$arrStr = ''; foreach ($configObject->components as $value) { $arrStr = $arrStr . '•' . $value->name; } 
							if (strpos($arrStr, 'Nginx') !== false) { echo '<img src="images/4logos.png" alt="Apache, Nginx, MySQL, PHP"/>';
							} else { echo '<img src="images/4logos_no_nginx.png" alt="Apache, MySQL, PHP"/>'; }
						?> 
						
					</div>
				</div><!-- /.col-lg-6 -->
				<div class="col-lg-6">
					<div class="frame">
						<h2><?php printf(tr('%s Version'),appName()); ?></h2>
<?php if (version_compare($configObject->version, $currVersion, '<')) { ?>
						<h4><?php echo $configObject->version . '&nbsp;&rarr;&nbsp;'; ?><a href="http://www.mamp.info/en/downloads/#mac"><?php printf(tr('Update (%s) available!'), $feed->currentVersion); ?></a></h4>
<?php } else { ?> 
						<h4><?php echo $configObject->version; ?>&nbsp;&rarr;&nbsp;<?php echo tr('Your version is up-to-date.'); ?></h4>
<?php } ?>  
					</div>
					<div class="frame">          
						<h2><?php echo tr('News'); ?></h2>
						<ul class="news">
<?php foreach($newsItems as $newsItem) { ?>
                                                    <li><div class="headline"><a href="<?php print $newsItem->link; ?>" target="_blank"><?php print $newsItem->headline; ?></a></div><?php print $newsItem->text; ?></li>
<?php } ?>
<?php if (count($newsItems) == 0) { ?>
                                                    <li><div class="headline"><?php echo tr('No News available at the moment!'); ?></div></li>
<?php } ?>                                                    
                                                </ul>
					</div>
				</div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			<!-- FOOTER -->
			<footer style="margin-top:40px;">
				<p class="pull-right"><a href="#"><?php echo tr("Back to top"); ?></a></p>
				<p>&copy; 2013, 2014 <a href="http://www.appsolute.de">appsolute GmbH</a></p>
			</footer>
		</div><!-- /.container -->

<?php } ?>
	    <!-- Bootstrap core JavaScript
    	================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
<?php if($page == "home") { ?>        
	    <script type="text/javascript">
	
			function checkNeedsUpdate()
			{
				$.get( "feed/needsUpdate.txt", function( data ) {
				if (data == 1)
				{
					location.reload();
				}});
			}
	
			setTimeout(function(){checkNeedsUpdate();},2000);

    	</script>
<?php } ?>
	</body>
</html>
<?php 

downloadFeed();
write_tr(); 

?>