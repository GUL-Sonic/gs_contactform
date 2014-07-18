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
require_once THEMES . "templates/admin_header.php";

include INFUSIONS . "gs_contactform/infusion_db.php";
include_once INFUSIONS . "gs_contactform/gsc_functions.php";
include INFUSIONS . "gs_contactform/gsc_var.php";

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

if (!iADMIN){
    redirect("../../login.php");
}
	
opentable($locale['gsc160']);

require_once "gsc_navigation.php";

closetable();

opentable($locale['gsc164']);

$data14 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='1'"));
$data15 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='2'"));
$data16 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='3'"));
$data17 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='4'"));

if ((isset($_GET['return'])) != '') {
	redirect(FUSION_SELF);
	}
	
if ((isset($_GET['edit'])) != '') {
    $edit = $_GET['edit'];
    $update = dbarray(dbquery("SELECT * FROM " . DB_GSC_CONTACT . " WHERE id='$edit'"));
    $gsc_ip = $update['gsc_ip'];
    $gsc_name = $update['gsc_name'];
	$gsc_geb = $update['gsc_geb'];
	$gsc_firma = $update['gsc_firma'];
	$gsc_position = $update['gsc_position'];
	$gsc_adress = $update['gsc_adress'];
	$gsc_plzort = $update['gsc_plzort'];
	$gsc_tel = $update['gsc_tel'];
	$gsc_mobil = $update['gsc_mobil'];
	$gsc_fax = $update['gsc_fax'];
    $gsc_email = $update['gsc_email'];
	$gsc_web = $update['gsc_web'];
	$gsc_userdef1 = $update['gsc_userdef1'];
	$gsc_userdef2 = $update['gsc_userdef2'];
	$gsc_userdef3 = $update['gsc_userdef3'];
	$gsc_userdef4 = $update['gsc_userdef4'];
    $gsc_betreff = $update['gsc_betreff'];
	$gsc_text = $update['gsc_nachricht'];  

	echo "
	<form name='contactform' method='POST' action='".FUSION_SELF."'>
	<table border='1' style='vertical-align: top; margin: 0px auto;' width='450px'>
	
	<tr>
	<td width='200px'>" . $locale['gsc060'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_ip . "</font></td>
	</tr>
	
	<tr>
	<td width='200px'>" . $locale['gsc061'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_name . "</font></td>
	</tr>";
	
	if($gsc_geb !="..") { echo "
	<tr>
	<td width='200px'>" . $locale['gsc062'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_geb. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_firma)) { echo "
	<tr>
	<td width='200px'>" . $locale['gsc063'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_firma. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_position)) { echo "
	<tr>
	<td width='200px'>" . $locale['gsc064'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_position. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_adress)) { echo "
	<tr>
	<td width='200px'>" . $locale['gsc065'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_adress. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_plzort)) { echo "
	<tr>
	<td width='200px'>" . $locale['gsc066'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_plzort. "</font></td>
	</tr>";
	}
	
	if($gsc_tel !="-") { echo "
	<tr>
	<td width='200px'>" . $locale['gsc067'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_tel. "</font></td>
	</tr>";
	}
	
	if($gsc_mobil !="-") { echo "
	<tr>
	<td width='200px'>" . $locale['gsc068'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_mobil. "</font></td>
	</tr>";
	}
	
	if($gsc_fax !="-") { echo "
	<tr>
	<td width='200px'>" . $locale['gsc069'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_fax. "</font></td>
	</tr>";
	}
	
	echo "
	<tr>
	<td width='200px'>" . $locale['gsc070'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'><a href='mailto:" . $gsc_email . "'>" . $gsc_email . "</a></font></td>
	</tr>";
	
	if(!empty($gsc_web)) { echo "
	<tr>
	<td width='200px'>" . $locale['gsc071'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'><a href='" . $gsc_web. "' target='_blank'>" . $gsc_web. "</a></font></td>
	</tr>";
	}
	
	if(!empty($gsc_userdef1)) { echo "
	<tr>
	<td width='200px'>" . $data14['field_name'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_userdef1. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_userdef2)) { echo "
	<tr>
	<td width='200px'>" . $data15['field_name'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_userdef2. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_userdef3)) { echo "
	<tr>
	<td width='200px'>" . $data16['field_name'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_userdef3. "</font></td>
	</tr>";
	}
	
	if(!empty($gsc_userdef4)) { echo "
	<tr>
	<td width='200px'>" . $data17['field_name'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_userdef4. "</font></td>
	</tr>";
	}
	
	echo "
	<tr>
	<td width='200px'>" . $locale['gsc072'] . "</td>
	<td style='background-color:#FFFFFF;'><font color='black'>" . $gsc_betreff . "</font></td>
	</tr>

	<tr>
	<td width='200px'>" . $locale['gsc073'] . "</td>
	<td><textarea name='gs_text' cols='38' rows='10' maxlength='1000' readonly class='textbox'>" . $gsc_text . "</textarea></td>
	</tr>
	
	<tr>
	<td align='center' class='tbl2' colspan='2'><input type='submit' name='return' class='button' value='" . $locale['gsc152'] . "'></td>
	</tr>
	
	</table>
	</form><br><br>";	
	}

if ((isset($_GET['del'])) != '') {
    $del = $_GET['del'];
        dbquery("DELETE FROM " . DB_GSC_CONTACT . " WHERE ID='$del'");
        echo $geloescht;
    } 
	
$result = dbquery("SELECT * FROM " . DB_GSC_CONTACT . " ORDER BY gsc_timestamp DESC");
if (dbrows($result) > 0) {
    echo"<table align='center' class='tbl-border' width='100%'>
	<tr>
	<td class='tbl2' align='center'><strong>" . $locale['gsc060'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc070'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc072'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc201'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc202'] . "</strong></td>
	</tr>";
    while ($data11 = dbarray($result)) {
        $cell_color = ($i % 2 == 0 ? "tbl1" : "tbl2");
        $i++;
        echo"<tr>
        <td class='$cell_color' align='center'>" . $data11['gsc_name'] . "</td>
		<td class='$cell_color' align='center'> <a href='mailto:" . $data11['gsc_email'] . "'>" . $data11['gsc_email'] . "</a></td>
		<td class='$cell_color' align='center'>" . $data11['gsc_betreff'] . "</td>
		<td class='$cell_color' align='center'> " . date('d.n.Y', $data11['gsc_timestamp'])."<br>um ". date('H:i', $data11['gsc_timestamp']) . "</td>
        <td class='$cell_color' align='center'><a href='" . FUSION_SELF . "?edit=" . $data11['id'] . "'>" . $locale['gsc148'] . "</a>";
        echo " -- <a href='" . FUSION_SELF . "?del=" . $data11['id'] . "' onclick='return gsc_ask_first(this)'>" . $locale['gsc143'] . "</a>";
        echo"</td></tr>";
    }
    echo"</table>";
} else {
    echo $keintrag;
}
		
closetable();

include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include "gsc_copyright.php";

require_once THEMES . "templates/footer.php";
?> 