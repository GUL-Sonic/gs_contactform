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

if (!checkrights("GSC") || !defined("iAUTH") || !isset($_GET['aid']) || $_GET['aid'] != iAUTH)
    redirect("../../index.php");
	
if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";	
include_once INFUSIONS . "gs_contactform/gsc_functions.php";
include_once INFUSIONS . "gs_contactform/gsc_var.php";

opentable($locale['gsc160']);

require_once "gsc_navigation.php";

closetable();

opentable($locale['gsc161']);

if (isset($_POST['update'])) {
    dbquery("UPDATE " . DB_GSC_SETTINGS . " SET
	form_header = '" . stripinput((isset($_POST['admin_text']) ? $_POST['admin_text'] : "")) . "',
	email_to = '" . stripinput((isset($_POST['email_to']) ? $_POST['email_to'] : "")) . "',
	email_answer = '" . stripinput((isset($_POST['email_answer']) ? $_POST['email_answer'] : "")) . "',
	pm_to = '" . stripinput((isset($_POST['pm_to']) ? $_POST['pm_to'] : "")) . "',
	geb_show = '" . stripinput((isset($_POST['geb_show']) ? 1 : 0)) . "',
	geb_requ = '" . stripinput((isset($_POST['geb_requ']) ? 1 : 0)) . "',
	firma_show = '" . stripinput((isset($_POST['firma_show']) ? 1 : 0)) . "',
	firma_requ = '" . stripinput((isset($_POST['firma_requ']) ? 1 : 0)) . "',
	position_show = '" . stripinput((isset($_POST['position_show']) ? 1 : 0)) . "',
	position_requ = '" . stripinput((isset($_POST['position_requ']) ? 1 : 0)) . "',
	adress_show = '" . stripinput((isset($_POST['adress_show']) ? 1 : 0)) . "',
	adress_requ = '" . stripinput((isset($_POST['adress_requ']) ? 1 : 0)) . "',
	plzort_show = '" . stripinput((isset($_POST['plzort_show']) ? 1 : 0)) . "',
	plzort_requ = '" . stripinput((isset($_POST['plzort_requ']) ? 1 : 0)) . "',
	tel_show = '" . stripinput((isset($_POST['tel_show']) ? 1 : 0)) . "',
	tel_requ = '" . stripinput((isset($_POST['tel_requ']) ? 1 : 0)) . "',
	mobil_show = '" . stripinput((isset($_POST['mobil_show']) ? 1 : 0)) . "',
	mobil_requ = '" . stripinput((isset($_POST['mobil_requ']) ? 1 : 0)) . "',
	fax_show = '" . stripinput((isset($_POST['fax_show']) ? 1 : 0)) . "',
	fax_requ = '" . stripinput((isset($_POST['fax_requ']) ? 1 : 0)) . "',
	web_show = '" . stripinput((isset($_POST['web_show']) ? 1 : 0)) . "',
	web_requ = '" . stripinput((isset($_POST['web_requ']) ? 1 : 0)) . "',
	userdef1_show = '" . stripinput((isset($_POST['userdef1_show']) ? 1 : 0)) . "',
	userdef1_requ = '" . stripinput((isset($_POST['userdef1_requ']) ? 1 : 0)) . "',
	userdef2_show = '" . stripinput((isset($_POST['userdef2_show']) ? 1 : 0)) . "',
	userdef2_requ = '" . stripinput((isset($_POST['userdef2_requ']) ? 1 : 0)) . "',
	userdef3_show = '" . stripinput((isset($_POST['userdef3_show']) ? 1 : 0)) . "',
	userdef3_requ = '" . stripinput((isset($_POST['userdef3_requ']) ? 1 : 0)) . "',
	userdef4_show = '" . stripinput((isset($_POST['userdef4_show']) ? 1 : 0)) . "',
	userdef4_requ = '" . stripinput((isset($_POST['userdef4_requ']) ? 1 : 0)) . "' WHERE id='1'");
	echo $gespeichert;
    }

echo"<form name='gsc_settings' method='post' enctype='multipart/form-data' action='" . FUSION_SELF . $aidlink . "'>";

$data6 = dbarray(dbquery("SELECT *  FROM " . DB_GSC_SETTINGS . ""));
$result = dbquery("SELECT * FROM " . DB_USERS . " ORDER BY user_level DESC, user_name ASC");

echo"<table border='1' style='vertical-align: top; margin: 0px auto;' width='350px'>
	<tr>
	<td class='tbl1'><center><strong>" . $locale['gsc260'] ."</strong></center></td>
	</tr>
	
	<tr>
	<td><textarea name='admin_text' style='width:98%' rows='5' maxlength='250' onkeyup='count1(event)' class='textbox'>".$data6['form_header']."</textarea></td>
	</tr>
	
	<tr>
	<td><div align='right'>
	<input name='admin_rest' style='text-align:center' size='3' onfocus='if(this.blur)this.blur()'> ". $locale['gsc080'] . "
	
	<script language='JavaScript'>

         var max = 250;

         document.gsc_settings.admin_rest.value = max;
         document.gsc_settings.admin_text.focus();

         function count1(e) {

            if (!e.which) keyCode = event.keyCode; // ie5+ op5+
            else keyCode = e.which; // nn6+

            if (document.gsc_settings.admin_text.value.length<max+1) document.gsc_settings.admin_rest.value = max-document.gsc_settings.admin_text.value.length;
            else {
               document.gsc_settings.admin_text.value = document.gsc_settings.admin_text.value.substring(0,max);
               document.gsc_settings.admin_rest.value = 0;
            }
         }
      </script>
	
	</div>
	</td>
	</tr>
	<tr>
	<td class='tbl1'><center><strong>" . $locale['gsc261'] ."</strong></center></td>
	</tr>
	<tr>
	<td><input type='text' name='email_to' style='width:98%;' maxlength='40' class='textbox' value='".$data6['email_to']."' placeholder='" . $settings['siteemail'] ."' /></td>
	</tr>
	<tr>
	<td class='tbl1'><center><strong>" . $locale['gsc262'] ."</strong></center></td>
	</tr>
	<tr>
	<td><input type='text' name='email_answer' style='width:98%;' maxlength='40' class='textbox' value='".$data6['email_to']."' placeholder='" . $settings['siteemail'] ."' /></td>
	</tr>
	<tr>
	<td class='tbl1'><center><strong>" . $locale['gsc263'] ."</strong></center></td>
	</tr>
	<tr>
	<td><select name='pm_to' class='textbox' style='width:100%;'>\n
	<option " . ($data6['pm_to'] == '0' ? " selected" : "")." value='0'>".$locale['gsc264']."</option>\n";
	while ($data19 = dbarray($result)) { echo"
	<option " . ($data6['pm_to'] == $data19['user_id'] ? " selected" : "")." value='" . $data19['user_id'] . "'>".$data19['user_name']."</option>\n";}
		echo "</select></td>
	</tr></table>";

echo"<table class='tbl-border' width='350px' style='vertical-align: top; margin: 0px auto;'>";
echo"	<tr>
			<td class='tbl1' width='200px'><strong><center>" . $locale['gsc180'] . "</center></strong></td>
			<td class='tbl1'><strong><center>" . $locale['gsc181'] . "</center></strong></td>
			<td class='tbl1'><strong><center>" . $locale['gsc182'] . "</center></strong></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc060'] . "</td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc184'] . "</center></font></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc061'] . "</td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc062'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['geb_show'] == 1) ? "checked='checked'" : "") . " name='geb_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['geb_requ'] == 1) ? "checked='checked'" : "") . " name='geb_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc063'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['firma_show'] == 1) ? "checked='checked'" : "") . " name='firma_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['firma_requ'] == 1) ? "checked='checked'" : "") . " name='firma_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc064'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['position_show'] == 1) ? "checked='checked'" : "") . " name='position_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['position_requ'] == 1) ? "checked='checked'" : "") . " name='position_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc065'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['adress_show'] == 1) ? "checked='checked'" : "") . " name='adress_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['adress_requ'] == 1) ? "checked='checked'" : "") . " name='adress_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc066'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['plzort_show'] == 1) ? "checked='checked'" : "") . " name='plzort_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['plzort_requ'] == 1) ? "checked='checked'" : "") . " name='plzort_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc067'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['tel_show'] == 1) ? "checked='checked'" : "") . " name='tel_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['tel_requ'] == 1) ? "checked='checked'" : "") . " name='tel_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc068'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['mobil_show'] == 1) ? "checked='checked'" : "") . " name='mobil_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['mobil_requ'] == 1) ? "checked='checked'" : "") . " name='mobil_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc069'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['fax_show'] == 1) ? "checked='checked'" : "") . " name='fax_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['fax_requ'] == 1) ? "checked='checked'" : "") . " name='fax_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc070'] . "</td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc071'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['web_show'] == 1) ? "checked='checked'" : "") . " name='web_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['web_requ'] == 1) ? "checked='checked'" : "") . " name='web_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>";
		
		$data7 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='1'"));
		if ($data7['field_name'] !='') { echo "
		<tr>
			<td class='tbl1' width='200px'>" . $data7['field_name'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef1_show'] == 1) ? "checked='checked'" : "") . " name='userdef1_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef1_requ'] == 1) ? "checked='checked'" : "") . " name='userdef1_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>";}
		
		$data8 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='2'"));
		if ($data8['field_name'] !='') { echo "
		<tr>
			<td class='tbl1' width='200px'>" . $data8['field_name'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef2_show'] == 1) ? "checked='checked'" : "") . " name='userdef2_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef2_requ'] == 1) ? "checked='checked'" : "") . " name='userdef2_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>";}
		
		$data9 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='3'"));
		if ($data9['field_name'] !='') { echo "
		<tr>
			<td class='tbl1' width='200px'>" . $data9['field_name'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef3_show'] == 1) ? "checked='checked'" : "") . " name='userdef3_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef3_requ'] == 1) ? "checked='checked'" : "") . " name='userdef3_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>";}
		
		$data10 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='4'"));
		if ($data10['field_name'] !='') { echo "
		<tr>
			<td class='tbl1' width='200px'>" . $data10['field_name'] . "</td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef4_show'] == 1) ? "checked='checked'" : "") . " name='userdef4_show' value='1' style='width:10px; text-align:center'></center></td>
			<td class='tbl1'><center><input type='checkbox' " . (($data6['userdef4_requ'] == 1) ? "checked='checked'" : "") . " name='userdef4_requ' value='1' style='width:10px; text-align:center'></center></td>
		</tr>";}
		
		echo "
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc072'] . "</td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
		</tr>
		<tr>
			<td class='tbl1' width='200px'>" . $locale['gsc073'] . "</td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
			<td class='tbl1'><font color='green'><center>" . $locale['gsc183'] . "</center></font></td>
		</tr>
			<td align='center' class='tbl2' colspan='0'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
		</table></form>";

closetable();
		
include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include "gsc_copyright.php";

require_once THEMES . "templates/footer.php";
?> 