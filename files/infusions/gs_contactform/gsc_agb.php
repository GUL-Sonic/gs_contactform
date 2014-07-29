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
require_once "../../maincore.php";
require_once THEMES . "templates/admin_header_mce.php";

if (!iADMIN) {
    redirect("../../index.php");
}

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";
include INFUSIONS . "gs_contactform/gsc_functions.php";
include INFUSIONS . "gs_contactform/gsc_var.php";

if ($settings['tinymce_enabled']) {
	echo "<script language='javascript' type='text/javascript'>advanced();</script>\n";
} else {
	require_once INCLUDES."html_buttons_include.php";
}

opentable('<center>'.$locale['gsc160'].'</center>');

require_once "gsc_navigation.php";

closetable();
	
opentable('<center>'.$locale['gsc168'].'</center>');
	
	if (isset($_POST['update'])) {
	dbquery("UPDATE " . DB_SETTINGS . " SET settings_value = '" . addslash($_POST['license_agreement']) . "' WHERE settings_name='license_agreement'");
	dbquery("UPDATE " . DB_SETTINGS . " SET settings_value = '" . time() . "' WHERE settings_name='license_lastupdate'");
	
	echo $gespeichert;
	
	$result = dbquery("SELECT link_url FROM ".DB_SITE_LINKS." WHERE link_url='infusions/gs_contactform/agb.php'");
	$data = dbarray($result);
	if (($data['link_url']) != "infusions/gs_contactform/agb.php") {
	echo "<center>" . $locale['gsc383'] . "<strong>infusions/gs_contactform/agb.php</strong></center><br>";
	echo "<center>" . $locale['gsc384'] . "<a href='".INFUSIONS."gs_contactform/gsc_links.php".$aidlink."&action=new1'><strong>" . $locale['gsc385'] . "</strong></a></center><br>";
	}
}

$settings2 = array();
$result = dbquery("SELECT * FROM ".DB_SETTINGS);
while ($data = dbarray($result)) {
	$settings2[$data['settings_name']] = $data['settings_value'];
}

$license_agreement = $settings2['license_agreement'];

echo "
	<form name='inputform' method='POST' action='".FUSION_SELF."'>	
	<table border='0' style='vertical-align: top; margin: 0px auto;' width='618px'>
	<tr>
	<td align='center'><textarea name='license_agreement' cols='92' rows='15' class='textbox'>".phpentities(stripslashes($license_agreement))."</textarea></td>
	</tr>";
	
	if (!$settings['tinymce_enabled']) {
	echo "<tr><td class='tbl'>\n";
	echo "<input type='button' value='".$locale['gsc153']."' class='button' onclick=\"insertText('license_agreement', '&lt;!--PAGEBREAK--&gt;');\" />\n";
	echo "<input type='button' value='&lt;?php?&gt;' class='button' onclick=\"addText('license_agreement', '&lt;?php\\n', '\\n?&gt;');\" />\n";
	echo "<input type='button' value='&lt;p&gt;' class='button' onclick=\"addText('license_agreement', '&lt;p&gt;', '&lt;/p&gt;');\" />\n";
	echo "<input type='button' value='&lt;br /&gt;' class='button' onclick=\"insertText('license_agreement', '&lt;br /&gt;');\" />\n";
	echo display_html("inputform", "license_agreement", true)."</td>\n";
	echo "</tr>\n";
	}
	echo "
	
	<tr>
	<td align='center' class='tbl2' colspan='0'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
	</tr>
	</table></form>";

closetable();

include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include INFUSIONS . "gs_contactform/gsc_copyright.php";

require_once THEMES."templates/footer.php";