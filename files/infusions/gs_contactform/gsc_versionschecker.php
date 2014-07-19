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
    $new_version = $file_content['0']['tag_name'];
    //DEBUG
    //$new_version = 1.0;
}

//// Testsequenz für Versionsüberprüfung ////
$data18 = dbarray(dbquery("SELECT *  FROM " . DB_GSC_SETTINGS . ""));

$gsc_version = $data18['version'];
$ausgabe = '';
if (version_compare($new_version, $gsc_version, '<=') AND $new_version > 0) {
    $ausgabe = "
	  <table cellpadding='0' cellspacing='1'>
	  <tr>
	  <td><img src='" . INFUSIONS . "gs_contactform/images/version.gif' alt='up to date' title='" . $locale['gsc303'] . "(V." . $new_version . ")'/></td>
	  </tr>
	  </table>";
} elseif ($gsc_version < $locale['gsc001']) {
	require_once INFUSIONS . "gs_contactform/update/gsc_update.php";
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
    $ausgabe = "<br /><span class='gsc_negative'>" . $locale['gsc305'] . "!<br /></span><span style='font-weight: bold;'>" . $locale['gsc304'] . "</span> <a href='http://gul-sonic.github.io/gs_contactform/' target='_blank' title='" . $locale['gsc306'] . "'><span style='font-weight: bold;'>" . $locale['gsc306'] . "</span></a><br /><br />";
}

echo "<div align='center'>" . $ausgabe . "</div>";

?>