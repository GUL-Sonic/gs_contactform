<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                                		|
 | Author:   GUL-Sonic											|
 | web		 http://www.germanys-united-legends.de 				|
 | Email	 gul-sonic@online.de 								|
 +--------------------------------------------------------------+
 | This program is released as free software under the			|
 | Affero GPL license. You can redistribute it and/or			|
 | modify it under the terms of this license which you			|
 | can read by viewing the included agpl.txt or online			|
 | at www.gnu.org/licenses/agpl.html. Removal of this			|
 | copyright header is strictly prohibited without				|
 | written permission from the original author(s).				|
 +--------------------------------------------------------------*/

 if (!defined("IN_FUSION") || !IN_FUSION)
   die("Access denied!");
   
 // Updateprüfung mit cURL //
 function cURLcheck() {
    if (function_exists("curl_exec"))
        return "curl";
    elseif (file_get_contents(__FILE__))
        return "file_get";
    else
        return false;
}

function getTag($use, $url) {
    if ($use === "curl") {
        $ch = curl_init();
        $timeout = 5; // 0 wenn kein Timeout
        $t_vers = curl_version();
        curl_setopt($ch, CURLOPT_USERAGENT, 'curl/' . $t_vers['version']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_content = curl_exec($ch);
        curl_close($ch);
        return $file_content = json_decode($file_content, true);
    } elseif ($use === "file_get") {
        $url = "https://api.github.com/repos/GUL-Sonic/gs_contactform/releases";
        $options = array('http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT']));
        $context = stream_context_create($options);
        $file_content = file_get_contents($url, false, $context);
        return $file_content = json_decode($file_content, true);
    }
}

if (cURLcheck()) {
    $url = "https://api.github.com/repos/GUL-Sonic/gs_contactform/releases";
    $file_content = getTag(cURLcheck(), $url);
	if (isset($file_content['0'])){
    $new_version = $file_content['0']['tag_name'];
	//DEBUG
    //$new_version = "";
    } else {
	$new_version = "";
	}	
}

// Updateprüfung mit fsockopen //
function latest_gsc_version()
{
	$url = "http://germanys-united-legends.de/gsc_version/version.txt";
	$url_p = @parse_url($url);
	$host = $url_p['host'];
	$port = isset($url_p['port']) ? $url_p['port'] : 80;

	$fp = @fsockopen($url_p['host'], $port, $errno, $errstr, 5);
	if(!$fp) return false;

	@fputs($fp, 'GET '.$url_p['path'].' HTTP/1.1'.chr(10));
	@fputs($fp, 'HOST: '.$url_p['host'].chr(10));
	@fputs($fp, 'Connection: close'.chr(10).chr(10));

	$response = @fgets($fp, 1024);
	$content = @fread($fp,1024);
	$content = preg_replace("#(.*?)text/plain(.*?)$#is","$2",$content);
	@fclose ($fp);

	$content = preg_replace("/X-Pad: avoid browser bug/si", "", $content);

	if(preg_match("#404#",$response)) return false;
	else return trim($content);
}
	$version_new = latest_gsc_version();
	//DEBUG
    //$version_new = "";

// Updateprüfung Ausgabe //
$data18 = dbarray(dbquery("SELECT *  FROM " . DB_GSC_SETTINGS . ""));

$gsc_version = $data18['version'];
$ausgabe = '';
if (version_compare($new_version, $gsc_version, '<=') AND $new_version > 0) {
    $ausgabe = "
	  <table border ='1' cellpadding='0' cellspacing='1'>
	  <tr>
	  <td align='center'><img src='" . INFUSIONS . "gs_contactform/images/version.gif' alt='up to date' title='" . $locale['gsc303'] . "(V." . $new_version . ")'/></td>
	  </tr>
	  </table>";
} 

else {
    if (!empty($new_version)) {
        $ausgabe = "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td><img src='" . INFUSIONS . "gs_contactform/images/version_old.gif' alt='old version' /></td>
	<td><span class='gsc_negative'>" . $locale['gsc302'] . ": " . $gsc_version . "</span><br />
	<span class='gsc_positive'>" . $locale['gsc301'] . ": " . $new_version . "</span><br />
	<span style='font-weight: bold;'>" . $locale['gsc304'] . ": </span><a href='http://gul-sonic.github.io/gs_contactform/' target='_blank' title='" . $locale['gsc306'] . "'><span style='font-weight: bold;'>" . $locale['gsc306'] . "</span></a></td>
	</tr>
	</table>";
    }
}
if (empty($new_version)) {
	if(function_exists('fsockopen')) {

	if (version_compare($version_new, $gsc_version, '<=') AND $version_new > 0) {
    $ausgabe = "
	  <table border ='1' cellpadding='0' cellspacing='1'>
	  <tr>
	  <td align='center'><img src='" . INFUSIONS . "gs_contactform/images/version.gif' alt='up to date' title='" . $locale['gsc303'] . "(V." . $version_new . ")'/></td>
	  </tr>
	  </table>";
	} 
	
	else {
	if (!empty($version_new)) {
        $ausgabe = "
	<table cellpadding='0' cellspacing='1'>
	<tr>
	<td><img src='" . INFUSIONS . "gs_contactform/images/version_old.gif' alt='old version' /></td>
	<td><span class='gsc_negative'>" . $locale['gsc302'] . ": " . $gsc_version . "</span><br />
	<span class='gsc_positive'>" . $locale['gsc301'] . ": " . $version_new . "</span><br />
	<span style='font-weight: bold;'>" . $locale['gsc304'] . ": </span><a href='http://gul-sonic.github.io/gs_contactform/' target='_blank' title='" . $locale['gsc306'] . "'><span style='font-weight: bold;'>" . $locale['gsc306'] . "</span></a></td>
	</tr>
	</table>";
    }
	}
	}
	if (empty($version_new)) {
    $ausgabe = "<br /><span class='gsc_negative'>" . $locale['gsc305'] . "!<br /></span><span style='font-weight: bold;'>" . $locale['gsc304'] . "</span> <a href='http://gul-sonic.github.io/gs_contactform/' target='_blank' title='" . $locale['gsc306'] . "'><span style='font-weight: bold;'>" . $locale['gsc306'] . "</span></a><br /><br />";
}
}
if ($gsc_version < $locale['gsc001']) {
	require_once INFUSIONS . "gs_contactform/update/gsc_update.php";
}
echo "<div align='center'>" . $ausgabe . "</div>";

?>
