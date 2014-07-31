<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                            			|
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

if (!iADMIN){
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

opentable('<center>'.$locale['gsc160'].'</center>');

require_once "gsc_navigation.php";

closetable();

opentable('<center>'.$locale['gsc163'].'</center>');

if (isset($_POST['save'])) {
    if ($_POST['sub_name'] == '') {
    echo $ngespeichert;
    } else { dbquery("INSERT " . DB_GSC_SUBJECT . " SET
	sub_name = '" . stripinput($sub_name) . "'");
	redirect(FUSION_SELF);
	}	
	}

if (isset($_POST['update'])) {
	if ($_POST['sub_name'] == '') {
	echo $ngespeichert; 
	} else { dbquery("UPDATE " . DB_GSC_SUBJECT . " SET
	sub_name = '" . stripinput($sub_name) . "' WHERE id='$edit'");
	redirect(FUSION_SELF);
    }
	}
	
if ((isset($_GET['del'])) != '') {
    $del = $_GET['del'];
    dbquery("DELETE FROM " . DB_GSC_SUBJECT . " WHERE ID='$del'");
    redirect(FUSION_SELF);
    }	

if ((isset($_GET['edit'])) != '') {
    $edit = $_GET['edit'];
    $update = dbarray(dbquery("SELECT * FROM " . DB_GSC_SUBJECT . " WHERE id='$edit'"));
    $sub_name = $update['sub_name'];
	}
	echo "
	<form name='fieldform' method='POST' action='".FUSION_SELF."'>
	<table border='1' style='vertical-align: top; margin: 0px auto;' width='400px'>
	
	<tr>
	<td width='200px'>" . $locale['gsc072'] . "</td>
	<td class='tbl1'><input name='sub_name' class='textbox' value='$sub_name' maxlength='100' style='width:98%;'></td>
	</tr>";
	if ($edit != "") {
    echo "<td align='center' class='tbl2' colspan='2'><input type='hidden' name='edit' value='$edit'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>";
	} else {
    echo "<td align='center' class='tbl2' colspan='2'><input type='submit' name='save' class='button' value='" . $locale['gsc151'] . "'></td></tr>";
	}
	echo "
	</table>
	</form><br><br>";	


$result = dbquery("SELECT * FROM " . DB_GSC_SUBJECT . " ORDER BY sub_name");
	if (dbrows($result) > 0) {
    echo"<table align='center' class='tbl-border' width='400px'>
	<tr>
	<td class='tbl2' align='center'><strong>" . $locale['gsc072'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc202'] . "</strong></td>
	</tr>";
    while ($data13 = dbarray($result)) {
        $cell_color = ($i % 2 == 0 ? "tbl1" : "tbl2");
        $i++;
        echo"<tr>
        <td class='$cell_color' align='center' width='150px'>" . $data13['sub_name'] . "</td>
        <td class='$cell_color' align='center'width='120px'><a href='" . FUSION_SELF . "?edit=" . $data13['id'] . "'><img src='".INFUSIONS."gs_contactform/images/edit.png' alt='" . $locale['gsc140'] . "' title='" . $locale['gsc140'] . "'></img></a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<a href='" . FUSION_SELF . "?del=" . $data13['id'] . "' onclick='return gsc_ask_first(this)'><img src='".INFUSIONS."gs_contactform/images/delete.png' alt='" . $locale['gsc143'] . "' title='" . $locale['gsc143'] . "'></img></a>";
        echo"</td></tr>";
    }
	echo"</table>";
} else {
    echo $keintrag;
}	
closetable();

//include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include "gsc_copyright.php";

require_once THEMES . "templates/footer.php";
?> 