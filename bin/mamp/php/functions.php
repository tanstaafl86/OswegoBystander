<?php

if( !function_exists('json_decode') ) {
 	include_once(dirname(__FILE__)."/JSON.php");
    function json_decode($data) {
        $json = new Services_JSON();
        return( $json->decode($data) );
    }
}

// available Languages
$arr_languages = (array) array('English', 'German', 'Italian', 'Japanese', 'ru', 'Spanish', 'French');
$language = (isset($_REQUEST['language'])) ? $_REQUEST['language'] : 'English';
if (!in_array($language, $arr_languages)) {
    $language = 'English';
}


$transFile = dirname(__FILE__) . "/../translate/" . $language . ".json";
if (file_exists($transFile)) {
    $GLOBALS["MAMP_TRANSLATE"] = json_decode(file_get_contents($transFile));
}

// get page
$page = isset($_GET["page"]) ? $_GET["page"] : "home";

// if its phpinfo use output buffering to get phpinfo code
if ($page == "phpinfo") {
    ob_start();
    phpinfo();
    $phpinfoOrig = ob_get_contents();
    ob_end_clean();
    //  grap contents of body tag
    $phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfoOrig);
}

// reset update flag
file_put_contents('feed/needsUpdate.txt', "0");


// read config file and create config object
$config = @file_get_contents(dirname(__FILE__) . "/../mamp.conf.json");
$configObject = $config ? json_decode($config) : null;

// prepare for sqlite manager
$arr_sqllite_manager_languages = (array) array('French' => '1', 'English' => '2', 'German' => '4', 'Japanese' => '5', 'Italian' => '6', 'Spanish' => '10');
setCookie('SQLiteManager_currentLangue', $arr_sqllite_manager_languages[$language], NULL, '/');

function iFrame($url) {
    print '<div class="container fullheight">
<div class="tablecontainer">
    <div class="tablerow">
        <div class="tablecell"><iframe style="width:100%;height:100%;" src="' . $url . '"></iframe></div>
    </div>
    </div>
</div>';
}

function downloadFeed() {
 
    global $language, $configObject;
    $filename = "home.json";
    $phpPath = getPHPCLIPath();
    $phpScriptPath = realpath(dirname(__FILE__) . "/../feed/fetchFeed.php");
    
	if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
	{
		$cmd = $phpPath . ' "' . $phpScriptPath . '" ' . $configObject->app . " $language $filename > nil &";
	}
	else
	{
		$cmd = $phpPath . ' "' . $phpScriptPath . '" ' . $configObject->app . " $language $filename > /dev/null &";
	}
    
	$output = array();
    $exit = 0;

    exec($cmd, $output, $exit);
	
    return $exit == 0;
}

function tr($englishText) {
    $learn = false;  // set to true to generate a json file with the strings of a page. At the end of the page you have to insert  write_tr();
    if ($learn) {
        if (!isset($GLOBALS['TR_LEARN'])) {
            $GLOBALS['TR_LEARN'] = array();
        }

        $GLOBALS['TR_LEARN'][$englishText] = $englishText;
    } else if (isset($GLOBALS["MAMP_TRANSLATE"])) {
        if (isset($GLOBALS["MAMP_TRANSLATE"]->$englishText)) {
            return $GLOBALS["MAMP_TRANSLATE"]->$englishText;
        }
    }

    return $englishText;
}

function write_tr() {
    if (isset($GLOBALS['TR_LEARN'])) {
        $tr_file = json_encode($GLOBALS['TR_LEARN'], JSON_PRETTY_PRINT);
        file_put_contents(str_replace(".", "_", basename(__FILE__)) . "_tr.json", $tr_file);
    }
}

// returns true if $needle is a substring of $haystack
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

function getPHPCLIPath() {
	$vistaornewwer = true;
	
	$osver = php_uname();
	
	if(contains("Windows NT 5.1", $osver) || contains("Windows XP", $osver))
	{
		//windows xp
		$vistaornewwer = false;
	}
	else if(contains("Windows NT 5.2", $osver))
	{
		//windows 2003
		$vistaornewwer = false;
	}
	else if(contains("Windows NT 5.0", $osver) || contains("Windows 2000", $osver))
	{
		//windows 2000
		$vistaornewwer = false;
	}
	
	if((strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'))
	{
		$path = realpath(__DIR__ . DIRECTORY_SEPARATOR .'../../php'); 
	}
	else
	{
		$path = "/Applications/MAMP/bin/php";
	}
	
    $folder = "";

    $d = dir($path);

    while (false !== ($entry = $d->read())) {
		if((strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'))
		{
			if (substr($entry, 0, 3) == "php" && is_dir($path . "\\" . $entry)) {
				if ($entry > $folder) {				
					if($entry > 'php5.4.9' && ($vistaornewwer==false))
					{
						//do not set php folder
					}
					else
					{
						$folder = $entry;
					}					
				}
			}			
		}
		else
		{
			if (substr($entry, 0, 3) == "php" && is_dir($path . "/" . $entry)) {
				if ($entry > $folder) {
					$folder = $entry;
				}
			}
		}
    }
	$d->close();

    if ($folder === "") {
        return false;
    }
	
	if((strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'))
	{
		$execpath = $path . "/" . $folder . "/php.exe";
	}
	else
	{
		$execpath = $path . "/" . $folder . "/bin/php";
	}

    return $execpath;
}

function getFeed() {
    global $language;
    $feedName = "home.json";
    $feedPath = 'feed/' . $language . '/' . $feedName;
    $feed = null;
    $path = realpath(dirname(__FILE__) . "/../" . $feedPath);
    if (file_exists($path)) {
        $json = file_get_contents($path);
        $feed = json_decode($json);
    }
    return $feed;
}

function createItemsForCarouselFromFeedObject($feed) {
    global $configObject;
    $items = array();
    if (isset($feed->carousel)) {
        foreach ($feed->carousel->all as $item) {
            $items[] = $item;
        }
        if (!is_bought()) {
            foreach ($feed->carousel->buy as $item) {
                $items[] = $item;
            }
        }
        $parts = explode(".", $feed->currentVersion);

        if (isset($parts[0])) {
            $majorversion = $parts[0];
            $currVer = $configObject->version;
            $parts = explode(".", $currVer);
            if (isset($parts[0])) {
                $majorversionCurrent = $parts[0];
                if (abs($majorversion) > abs($majorversionCurrent)) {
                    foreach ($feed->carousel->upgrade as $item) {
                        $items[] = $item;
                    }
                }
            }
        }
    }
    return $items;
}

// checks if user has bought mamp
function is_bought() {
    global $configObject;
    if ($configObject->app == "MAMP") {
        return false;
    }
    $i_bought = false;
    if (file_exists(dirname(__FILE__) . '/../bought')) {
        $i_bought = (int) file_get_contents(dirname(__FILE__) . '/../bought');
    }
    return $i_bought;
}

function appName() {
    global $configObject;

    if ($configObject->app == "MAMPPRO") {
        return "MAMP PRO";
    }
    return "MAMP";
}

function a($page) {
    global $language;
    return '<a href="index.php?page=' . $page . '&amp;language=' . $language . '">';
}

function buyLink()
{
	if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
		return "http://www.mamp.info/winstore";
	} else {
		return "http://www.mamp.info/macstore";
	}
}
