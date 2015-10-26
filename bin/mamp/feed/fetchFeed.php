<?php

if (!(isset($argv[1]) && isset($argv[2]) && isset($argv[3])))
{
	exit("usage: php fetchFeed.php APP_NAME LANGUAGE FILE_NAME\ne.g. php fetchFeed.php MAMPPRO German home.json\n");
}

$endpoint = "http://www.mamp.info/feed";
$urlTemplate = "%s/%s/%s/%s/feed/%s";


$os =  (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')  ? "win" : "mac";

$app = $argv[1];
$language = $argv[2];
$file = $argv[3];
$debug = isset($argv[4]) && $argv[4];
$url = sprintf($urlTemplate,$endpoint,$os,$app,$language,$file);

$json = file_get_contents($url);
$feed = json_decode($json);

if (!$feed )
{
    exit();
}

$feedDir = dirname(__FILE__);
$rootDir = realpath($feedDir ."/..");

$feedPath = $feedDir."/".$language."/".$file;
$needsUpdatePath = $feedDir."/needsUpdate.txt";

foreach ($feed->carousel->all as $item) 
{
	if (isset($item->leftImage))
	{
		getImageFromServer($endpoint, $item->leftImage);
	}
	if (isset($item->rightImage))
	{
		getImageFromServer($endpoint, $item->rightImage);
	}
	if (isset($item->backgroundImage))
	{
		getImageFromServer($endpoint, $item->backgroundImage);
	}
}

foreach ($feed->carousel->buy as $item) 
{
	if (isset($item->leftImage))
	{
		getImageFromServer($endpoint, $item->leftImage);
	}
	if (isset($item->rightImage))
	{
		getImageFromServer($endpoint, $item->rightImage);
	}
	if (isset($item->backgroundImage))
	{
		getImageFromServer($endpoint, $item->backgroundImage);
	}
}

foreach ($feed->carousel->upgrade as $item) 
{
	if (isset($item->leftImage))
	{
		getImageFromServer($endpoint, $item->leftImage);
	}
	if (isset($item->rightImage))
	{
		getImageFromServer($endpoint, $item->rightImage);
	}
	if (isset($item->backgroundImage))
	{
		getImageFromServer($endpoint, $item->backgroundImage);
	}
}

$_writeIt = true;
if (file_exists($feedPath))
{
	$contents = file_get_contents($feedPath);
	if ($contents == $json)
	{
		$_writeIt = false;
	}
}

if ($_writeIt)
{
	file_put_contents($feedPath,$json);
	file_put_contents($needsUpdatePath,"1");
}
else
{
	file_put_contents($needsUpdatePath,"0");
}


function getImageFromServer($endpoint,$img)
{
	global $debug,$rootDir;
	if (substr($img,0,5) == "feed/")
	{
		$imagePath = $rootDir . "/" . $img;
		if (!file_exists($imagePath))
		{
			$url = $endpoint."/".substr($img,5);
			if ($debug) echo "fetching: $url\n";
			$image = file_get_contents($url);
			if ($image)
			{
				if ($debug) echo "writing: $imagePath\n";
				file_put_contents($imagePath,$image);
			}
		}
	}
}