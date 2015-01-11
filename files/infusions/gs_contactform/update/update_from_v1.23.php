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
 
 require_once "../../../maincore.php";

// Check: iAUTH and $aid
if (!defined("iAUTH") || $_GET['aid'] != iAUTH) redirect("../../index.php");

// Includes
require_once INFUSIONS."gs_contactform/infusion_db.php";

// Check: Admin Rights
if (!iADMIN) redirect("index.php");

// Header
	require_once THEMES."templates/header.php";

// Language Files
if (file_exists(INFUSIONS."gs_contactform/locale/".$settings['locale'].".php")) {
	include INFUSIONS."gs_contactform/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."gs_contactform/locale/German.php";
}

// MySQL database functions
function dbquery_gsc_update($query) {
	$result = @mysql_query($query);
	if (!$result) {
		//echo mysql_error();
		return false;
	} else {
		return $result;
	}
}

opentable($locale['gsc306'].": v1.23 => v1.24");

$mysql[] = "ALTER TABLE ".DB_GSC_SETTINGS." ADD agb_show BOOL NOT NULL";

$mysql[] = "UPDATE ".DB_GSC_SETTINGS." SET version='1.24'";

$mysql[] = "UPDATE ".DB_INFUSIONS." SET inf_version='1.24' WHERE inf_folder='gs_contactform'";

$errors = 0;
foreach($mysql as $query) {

		if(dbquery_gsc_update($query)) {
			$res = "<b>".$locale['gsc307']."</b>";
		} else {
			$errors++;
			$res = "<b>".$locale['gsc308'].":</b>&nbsp;";
			$res .= mysql_error();
		}

	echo "<br /><code>".htmlentities($query)."</code>";

	echo "<br />".$res."<br />";

}

if($errors) {
	echo "<p><font color='red'><b>".$locale['gsc309'].": ".$errors."</b></font></p>";
} else {
	echo "<p><p>&nbsp;</p>";
	echo "<p align='center'><font color='green'><b>".$locale['gsc310']."</b></font></p>";
	echo "<p><p>&nbsp;</p>";
}
echo "<br /><a href='".INFUSIONS."gs_contactform/gsc_settings_panel.php".$aidlink."'>".$locale['gsc311']."</a><br /><br />";

closetable();

// Footer
	require_once THEMES."templates/footer.php";
?>