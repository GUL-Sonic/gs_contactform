<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                                 	|
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

if ($settings['tinymce_enabled']) {
	echo "<script language='javascript' type='text/javascript'>advanced();</script>\n";
} else {
	require_once INCLUDES."html_buttons_include.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";	
include INFUSIONS . "gs_contactform/gsc_functions.php";
include INFUSIONS . "gs_contactform/gsc_var.php";

opentable('<center>'.$locale['gsc160'].'</center>');

require_once "gsc_navigation.php";

closetable();

opentable('<center>'.$locale['gsc320'].'</center>');

if (isset($_POST['update'])) {
    dbquery("UPDATE " . DB_GSC_ABOUT . " SET
	title = '" . stripinput($_POST['title']) . "',
	about = '" . addslash($_POST['about']) . "' WHERE id='1'");
	echo $gespeichert;
	
	$result = dbquery("SELECT link_url FROM ".DB_SITE_LINKS." WHERE link_url='infusions/gs_contactform/ueber.php'");
	$data = dbarray($result);
	if (($data['link_url']) != "infusions/gs_contactform/ueber.php") {
	echo "<center>" . $locale['gsc381'] . "<strong>\"" . $_POST['title'] . "\"</strong>" . $locale['gsc382'] . "<strong>infusions/gs_contactform/ueber.php</strong></center><br>";
	echo "<center>" . $locale['gsc384'] . "<a href='".INFUSIONS."gs_contactform/gsc_links.php".$aidlink."&action=new4'><strong>" . $locale['gsc385'] . "</strong></a></center><br>";
	}
}
$data20 = dbarray(dbquery("SELECT * FROM " . DB_GSC_ABOUT . " WHERE id='1'"));	
	$title = $data20['title'];
	$about = $data20['about'];

echo "<form name='inputform' method='POST' action='".FUSION_SELF."'>
	<table border='0' style='vertical-align: top; margin: 0px auto;' width='618px'>
	<tr>
	<td class='tbl' align='center'><strong>" . $locale['gsc321'] . "</strong></td>
	</tr>
	
	<tr>
	<td class='tbl'><input type='text' name='title' value='".$title."' class='textbox' style='width:99%;'></td>
	</tr>
	
	<tr>
	<td valign='top' class='tbl' align='center'><strong>" . $locale['gsc322'] . "</strong></td>
	</tr>
	
	<tr>
	<td class='tbl'><textarea name='about' cols='92' rows='15' class='textbox'>".phpentities(stripslashes($about))."</textarea></td>
	</tr>";
	
	if (!$settings['tinymce_enabled']) {
	echo "<tr><td class='tbl'>\n";
	echo "<input type='button' value='".$locale['gsc153']."' class='button' onclick=\"insertText('about', '&lt;!--PAGEBREAK--&gt;');\" />\n";
	echo "<input type='button' value='&lt;?php?&gt;' class='button' onclick=\"addText('about', '&lt;?php\\n', '\\n?&gt;');\" />\n";
	echo "<input type='button' value='&lt;p&gt;' class='button' onclick=\"addText('about', '&lt;p&gt;', '&lt;/p&gt;');\" />\n";
	echo "<input type='button' value='&lt;br /&gt;' class='button' onclick=\"insertText('about', '&lt;br /&gt;');\" />\n";
	echo display_html("inputform", "about", true)."</td>\n";
	echo "</tr>\n";
	}
	echo "
	
	<tr>
	<td align='center' class='tbl2' colspan='0'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
	</tr>
	</table></form>";
	
closetable();
		
include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include "gsc_copyright.php";

require_once THEMES . "templates/footer.php";
?>