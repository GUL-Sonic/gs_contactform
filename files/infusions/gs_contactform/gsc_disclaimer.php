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
	
opentable('<center>'.$locale['gsc166'].'</center>');

if (isset($_POST['update'])) {
	dbquery("UPDATE " . DB_GSC_IMPRESSUM . " SET
	impr_disclaimer_agb = '" . stripinput($_POST['impr_disclaimer_agb']) . "',
	impr_disclaimer = '" . addslash($_POST['impr_disclaimer']) . "',
	impr_timestamp = '" . time() . "'WHERE id='1'");
	
	echo $gespeichert;
	
	$result = dbquery("SELECT link_url FROM ".DB_SITE_LINKS." WHERE link_url='infusions/gs_contactform/disclaimer.php'");
	$data = dbarray($result);
	if (($data['link_url']) != "infusions/gs_contactform/disclaimer.php") {
	echo "<center>" . $locale['gsc383'] . "<strong>infusions/gs_contactform/disclaimer.php</strong></center><br>";
	echo "<center>" . $locale['gsc384'] . "<a href='".INFUSIONS."gs_contactform/gsc_links.php".$aidlink."&action=new2'><strong>" . $locale['gsc385'] . "</strong></a></center><br>";
	}
}

$data22 = dbarray(dbquery("SELECT * FROM " . DB_GSC_IMPRESSUM . " WHERE id='1'"));

$impr_disclaimer = $data22['impr_disclaimer'];

echo "
	<form name='inputform' method='POST' action='".FUSION_SELF."'>
	<table class='tbl-border' border='0' style='vertical-align: top; margin: 0px auto;'>
	<tr>
	<td class='tbl1' align='center'><input type='radio' " . (($data22['impr_disclaimer_agb'] == 1) ? "checked='checked'" : "") . " name='impr_disclaimer_agb' value='1' style='width:10px; text-align:center'></td>
	<td>" . $locale['gsc360'] . "</td>
	</tr>
	<tr>
	<td class='tbl1' align='center'><input type='radio' " . (($data22['impr_disclaimer_agb'] == 2) ? "checked='checked'" : "") . " name='impr_disclaimer_agb' value='2' style='width:10px; text-align:center'></td>
	<td>" . $locale['gsc361'] . "</td>
	</tr>
	<tr>
	<td class='tbl1' align='center'><input type='radio' " . (($data22['impr_disclaimer_agb'] == 3) ? "checked='checked'" : "") . " name='impr_disclaimer_agb' value='3' style='width:10px; text-align:center'></td>
	<td>" . $locale['gsc362'] . "</td>
	</tr>
	<tr>
	<td class='tbl1' align='center'><input type='radio' " . (($data22['impr_disclaimer_agb'] == 4) ? "checked='checked'" : "") . " name='impr_disclaimer_agb' value='4' style='width:10px; text-align:center'></td>
	<td>" . $locale['gsc363'] . "</td>
	</tr>
	</table>";
closetable();

opentable("<center>".$locale['gsc167']."</center>");
echo "	
	<table border='0' style='vertical-align: top; margin: 0px auto;' width='618px'>
	<tr>
	<td align='center'><textarea name='impr_disclaimer' cols='92' rows='15' class='textbox'>" . phpentities(stripslashes($impr_disclaimer)) . "</textarea></td>
	</tr>";
	
	if (!$settings['tinymce_enabled']) {
	echo "<tr><td class='tbl'>\n";
	echo "<input type='button' value='".$locale['gsc153']."' class='button' onclick=\"insertText('impr_disclaimer', '&lt;!--PAGEBREAK--&gt;');\" />\n";
	echo "<input type='button' value='&lt;?php?&gt;' class='button' onclick=\"addText('impr_disclaimer', '&lt;?php\\n', '\\n?&gt;');\" />\n";
	echo "<input type='button' value='&lt;p&gt;' class='button' onclick=\"addText('impr_disclaimer', '&lt;p&gt;', '&lt;/p&gt;');\" />\n";
	echo "<input type='button' value='&lt;br /&gt;' class='button' onclick=\"insertText('impr_disclaimer', '&lt;br /&gt;');\" />\n";
	echo display_html("inputform", "impr_disclaimer", true)."</td>\n";
	echo "</tr>\n";
	}
	echo "
	
	<tr>
	<td align='center' class='tbl2' colspan='0'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
	</tr>
	</table></form>";

closetable();

//include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include INFUSIONS . "gs_contactform/gsc_copyright.php";

require_once THEMES."templates/footer.php";
?>