<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform                           			|
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

opentable('<center>'.$locale['gsc162'].'</center>');

if (isset($_POST['update'])) {
	if ($_POST['field_name'] == '' || $_POST['field_place'] == '' || $_POST['field_err'] == '') {
	echo $ngespeichert; }
	else { dbquery("UPDATE " . DB_GSC_FIELDS . " SET
	field_name = '" . stripinput($field_name) . "',
	field_place = '" . stripinput($field_place) . "',
	field_err = '" . stripinput($field_err) . "' WHERE id='$edit'");
	redirect(FUSION_SELF);
    }
	}
	
if ((isset($_GET['del'])) != '') {
    $del = $_GET['del'];
	dbquery("UPDATE " . DB_GSC_FIELDS . " SET
	field_name = '',
	field_place = '',
	field_err = '' WHERE id='$del'");
	redirect(FUSION_SELF);
    }	

if ((isset($_GET['edit'])) != '') {
    $edit = $_GET['edit'];
    $update = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='$edit'"));
    $field_name = $update['field_name'];
    $field_place = $update['field_place'];
    $field_err = $update['field_err']; 

	echo "
	<form name='fieldform' method='POST' action='".FUSION_SELF."'>
	<table border='1' style='vertical-align: top; margin: 0px auto;' width='600px'>
	
	<tr>
	<td width='200px'>" . $locale['gsc220'] . "</td>
	<td class='tbl1'><input name='field_name' class='textbox' value='$field_name' maxlength='100' style='width:100%;'></td>
	</tr>
	
	<tr>
	<td width='200px'>" . $locale['gsc221'] . "</td>
	<td class='tbl1'><input name='field_place' class='textbox' value='$field_place' maxlength='100' style='width:100%;'></td>
	</tr>

	<tr>
	<td width='200px'>" . $locale['gsc222'] . "</td>
	<td class='tbl1'><input name='field_err' class='textbox' value='$field_err' maxlength='100' style='width:100%;'></td>
	</tr>
	<td align='center' class='tbl2' colspan='2'><input type='hidden' name='edit' value='$edit'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
	</table>
	</form><br><br>";
	}

$result = dbquery("SELECT * FROM " . DB_GSC_FIELDS . " ORDER BY id");
	
    echo"<table align='center' class='tbl-border' width='100%'>
	<tr>
	<td class='tbl2' align='center'><strong>" . $locale['gsc220'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc221'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc222'] . "</strong></td>
	<td class='tbl2' align='center'><strong>" . $locale['gsc202'] . "</strong></td>
	</tr>";
    while ($data12 = dbarray($result)) {
        $cell_color = ($i % 2 == 0 ? "tbl1" : "tbl2");
        $i++;
        echo"<tr>";
		if (empty($data12['field_name'])) { echo "
		<td class='$cell_color' align='center' width='150px'>" . $locale['gsc223'] . "</td>";}
		else { echo "
        <td class='$cell_color' align='center' width='150px'>" . $data12['field_name'] . "</td>";}
		if (empty($data12['field_place'])) { echo "
		<td class='$cell_color' align='center' width='150px'>" . $locale['gsc221'] . "</td>";}
		else {echo "
		<td class='$cell_color' align='center' width='150px'>" . $data12['field_place'] . "</td>";}
		if (empty($data12['field_err'])) { echo "
		<td class='$cell_color' align='center' width='300px'>" . $locale['gsc224'] . "</td>";}
		else { echo "
		<td class='$cell_color' align='center' width='300px'>" . $data12['field_err'] . "</td>";}
		if (empty($data12['field_name'])) { echo "
		<td class='$cell_color' align='center'width='120px'><a href='" . FUSION_SELF . "?edit=" . $data12['id'] . "'>" . $locale['gsc151'] . "</a></td>";}
		else { echo "
        <td class='$cell_color' align='center'width='120px'><a href='" . FUSION_SELF . "?edit=" . $data12['id'] . "'><img src='".INFUSIONS."gs_contactform/images/edit.png' alt='" . $locale['gsc140'] . "' title='" . $locale['gsc140'] . "'></img></a>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='" . FUSION_SELF . "?del=" . $data12['id'] . "' onclick='return gsc_ask_first(this)'><img src='".INFUSIONS."gs_contactform/images/delete.png' alt='" . $locale['gsc143'] . "' title='" . $locale['gsc143'] . "'></img></a></td>";}
        echo"</tr>";
    }
	echo"</table>";
	
closetable();

//include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include "gsc_copyright.php";

require_once THEMES . "templates/footer.php";
?> 