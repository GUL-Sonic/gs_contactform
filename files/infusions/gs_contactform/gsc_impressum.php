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
require_once THEMES."templates/admin_header.php";

if (!iADMIN){
    redirect("../../index.php");
}

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";
include INFUSIONS . "gs_contactform/gsc_var.php";
include INFUSIONS . "gs_contactform/gsc_functions.php";

opentable('<center>'.$locale['gsc160'].'</center>');

require_once "gsc_navigation.php";

closetable();
	
opentable("<center>".$locale['gsc165']."</center>");

// Fehlerbehandlung //
if(isset($_POST['update']) && !$_POST['impr_head']) {$err_head=1;} else{$err_head=0;}
if(isset($_POST['update']) && !$_POST['impr_name']) {$err_name=1;} else{$err_name=0;}
if(isset($_POST['update']) && (!$_POST['impr_str'] OR !$_POST['impr_hnr'])) {$err_adress=1;} else{$err_adress=0;}
if(isset($_POST['update']) && (!$_POST['impr_plz'] OR !$_POST['impr_ort'])) {$err_plzort=1;} else{$err_plzort=0;}
if(isset($_POST['update']) && !$_POST['impr_email']) {$err_email=1;} else{$err_email=0;}
if(isset($_POST['update']) && !preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $_POST['impr_email'])) {$err_email=1;} else{$err_email=0;}

if (isset($_POST['update'])) {
	if (($err_head !=0) || ($err_name !=0) || ($err_adress !=0) || ($err_plzort !=0) || ($err_email !=0)) {
	echo $ngespeichert; 
	} else {
	dbquery("UPDATE " . DB_GSC_IMPRESSUM . " SET
	firm_firma = '" . stripinput($_POST['firm_firma']) . "',
	firm_logo = '" . stripinput($_POST['firm_logo']) . "',
	firm_name = '" . stripinput($_POST['firm_name']) . "',
	firm_str = '" . stripinput($_POST['firm_str']) . "',
	firm_hnr = '" . stripinput($_POST['firm_hnr']) . "',
	firm_plz = '" . stripinput($_POST['firm_plz']) . "',
	firm_ort = '" . stripinput($_POST['firm_ort']) . "',
	firm_tel_vor = '" . stripinput($_POST['firm_tel_vor']) . "',
	firm_tel_nr = '" . stripinput($_POST['firm_tel_nr']) . "',
	firm_mobil_vor = '" . stripinput($_POST['firm_mobil_vor']) . "',
	firm_mobil_nr = '" . stripinput($_POST['firm_mobil_nr']) . "',
	firm_fax_vor = '" . stripinput($_POST['firm_fax_vor']) . "',
	firm_fax_nr = '" . stripinput($_POST['firm_fax_nr']) . "',
	firm_email = '" . stripinput($_POST['firm_email']) . "',
	firm_ustid = '" . stripinput($_POST['firm_ustid']) . "',
	firm_title_1 = '" . stripinput($_POST['firm_title_1']) . "',
	firm_field_1 = '" . stripinput($_POST['firm_field_1']) . "',
	firm_title_2 = '" . stripinput($_POST['firm_title_2']) . "',
	firm_field_2 = '" . stripinput($_POST['firm_field_2']) . "',
	firm_title_3 = '" . stripinput($_POST['firm_title_3']) . "',
	firm_field_3 = '" . stripinput($_POST['firm_field_3']) . "',
	firm_title_4 = '" . stripinput($_POST['firm_title_4']) . "',
	firm_field_4 = '" . stripinput($_POST['firm_field_4']) . "',
	firm_title_5 = '" . stripinput($_POST['firm_title_5']) . "',
	firm_field_5 = '" . addslash($_POST['firm_field_5']) . "',
	impr_head = '" . stripinput($_POST['impr_head']) . "',
	impr_name = '" . stripinput($_POST['impr_name']) . "',
	impr_str = '" . stripinput($_POST['impr_str']) . "',
	impr_hnr = '" . stripinput($_POST['impr_hnr']) . "',
	impr_plz = '" . stripinput($_POST['impr_plz']) . "',
	impr_ort = '" . stripinput($_POST['impr_ort']) . "',
	impr_tel_vor = '" . stripinput($_POST['impr_tel_vor']) . "',
	impr_tel_nr = '" . stripinput($_POST['impr_tel_nr']) . "',
	impr_mobil_vor = '" . stripinput($_POST['impr_mobil_vor']) . "',
	impr_mobil_nr = '" . stripinput($_POST['impr_mobil_nr']) . "',
	impr_fax_vor = '" . stripinput($_POST['impr_fax_vor']) . "',
	impr_fax_nr = '" . stripinput($_POST['impr_fax_nr']) . "',
	impr_email = '" . stripinput($_POST['impr_email']) . "' WHERE id='1'");
	
	echo $gespeichert;
	
	$result = dbquery("SELECT link_url FROM ".DB_SITE_LINKS." WHERE link_url='infusions/gs_contactform/impressum.php'");
	$data = dbarray($result);
	if (($data['link_url']) != "infusions/gs_contactform/impressum.php") {
	echo "<center>" . $locale['gsc380'] . "&nbsp;<strong>infusions/gs_contactform/impressum.php</strong></center><br>";
	echo "<center>" . $locale['gsc384'] . "<a href='".INFUSIONS."gs_contactform/gsc_links.php".$aidlink."&action=new3'><strong>" . $locale['gsc385'] . "</strong></a></center><br>";
	}
} 
}
	
$data21 = dbarray(dbquery("SELECT * FROM " . DB_GSC_IMPRESSUM . " WHERE id='1'"));
	 $firm_firma = $data21['firm_firma'];
	 $firm_logo = $data21['firm_logo'];
	 $firm_name = $data21['firm_name'];
	 $firm_str = $data21['firm_str'];
	 $firm_hnr = $data21['firm_hnr'];
	 $firm_plz = $data21['firm_plz'];
	 $firm_ort = $data21['firm_ort'];
	 $firm_tel_vor = $data21['firm_tel_vor'];
	 $firm_tel_nr = $data21['firm_tel_nr'];
	 $firm_mobil_vor = $data21['firm_mobil_vor'];
	 $firm_mobil_nr = $data21['firm_mobil_nr'];
	 $firm_fax_vor = $data21['firm_fax_vor'];
	 $firm_fax_nr = $data21['firm_fax_nr'];
	 $firm_email = $data21['firm_email'];
	 $firm_ustid = $data21['firm_ustid'];
	 $firm_title_1 = $data21['firm_title_1'];
	 $firm_field_1 = $data21['firm_field_1'];
	 $firm_title_2 = $data21['firm_title_2'];
	 $firm_field_2 = $data21['firm_field_2'];
	 $firm_title_3 = $data21['firm_title_3'];
	 $firm_field_3 = $data21['firm_field_3'];
	 $firm_title_4 = $data21['firm_title_4'];
	 $firm_field_4 = $data21['firm_field_4'];
	 $firm_title_5 = $data21['firm_title_5'];
	 $firm_field_5 = $data21['firm_field_5'];
	 $impr_head = $data21['impr_head'];
	 $impr_name = $data21['impr_name'];
	 $impr_str = $data21['impr_str'];
	 $impr_hnr = $data21['impr_hnr'];
	 $impr_plz = $data21['impr_plz'];
	 $impr_ort = $data21['impr_ort'];
	 $impr_tel_vor = $data21['impr_tel_vor'];
	 $impr_tel_nr = $data21['impr_tel_nr'];
	 $impr_mobil_vor = $data21['impr_mobil_vor'];
	 $impr_mobil_nr = $data21['impr_mobil_nr'];
	 $impr_fax_vor = $data21['impr_fax_vor'];
	 $impr_fax_nr = $data21['impr_fax_nr'];
	 $impr_email = $data21['impr_email'];

// Meldungen bei fehlerhafter Eingabe //
	if($err_head==1) {
	echo"<div class='admin-message'>" . $locale['gsc343'] . "</div>";
	}
	if($err_name==1) {
	echo"<div class='admin-message'>" . $locale['gsc121'] . "</div>";
	}
	if($err_adress==1) {
	echo"<div class='admin-message'>" . $locale['gsc125'] . "</div>";
	}
	if($err_plzort==1) {
	echo"<div class='admin-message'>" . $locale['gsc126'] . "</div>";
	}
	if($err_email==1) {
	echo"<div class='admin-message'>" . $locale['gsc130'] . "</div>";
	}

	echo "
	<form name='imprform' method='POST' action='".FUSION_SELF."'>
	<table border='1' style='vertical-align: top; margin: 0px auto;'>
	<tr>
	<td width='200px'>" . $locale['gsc063'] .":</td>
	<td> <textarea name='firm_firma' rows='4' style='width:250px' maxlength='250' class='textbox' placeholder='" . $locale['gsc063'] . "'>" . $firm_firma . "</textarea></td>
	</tr>
	
	<tr>
	<td width='200px'>" . $locale['gsc078'] .":</td>
	<td> <input type='text' name='firm_logo' style='width:250px' maxlength='100' class='textbox' value='" . $firm_logo . "' placeholder='../../images/php-fusion-logo.png' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc061'] .":</td>
	<td> <input type='text' name='firm_name' style='width:250px' maxlength='100' class='textbox' value='" . $firm_name . "' placeholder='" . $locale['gsc061'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc065'] .":</td>
	<td> <input type='text' name='firm_str' style='width:202px;' maxlength='40' class='textbox' value='" . $firm_str . "' placeholder='" . $locale['gsc074'] ."' />
	<input type='text' name='firm_hnr' style='width:35px;' maxlength='10' class='textbox' value='" . $firm_hnr . "' placeholder='" . $locale['gsc075'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc066'] .":</td>
	<td> <input type='text' name='firm_plz' style='width:35px;' maxlength='10' class='textbox' value='" . $firm_plz . "' placeholder='" . $locale['gsc076'] ."' />
	<input type='text' name='firm_ort' style='width:202px;' maxlength='40' class='textbox' value='" . $firm_ort . "' placeholder='" . $locale['gsc077'] ."' /></td>
	</tr>

	<tr>
	<td>" . $locale['gsc067'] .":</td>
	<td> <input type='text' name='firm_tel_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $firm_tel_vor . "' placeholder='+49 12345' />
	<input type='text' name='firm_tel_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $firm_tel_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc068'] .":</td>
	<td> <input type='text' name='firm_mobil_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $firm_mobil_vor . "' placeholder='+49 12345' />
	<input type='text' name='firm_mobil_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $firm_mobil_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc069'] .":</td>
	<td> <input type='text' name='firm_fax_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $firm_fax_vor . "' placeholder='+49 12345' />
	<input type='text' name='firm_fax_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $firm_fax_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc070'] .":</td>
	<td> <input type='text' name='firm_email' style='width:250px;' maxlength='40' class='textbox' value='" . $firm_email . "' placeholder='email@domain.org' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc342'] .":</td>
	<td> <input type='text' name='firm_ustid' style='width:250px;' maxlength='40' class='textbox' value='" . $firm_ustid . "' placeholder='DE999999999' /></td>
	</tr>
	
	<tr>
	<td> <input type='text' name='firm_title_1' style='width:90%;' maxlength='100' class='textbox' value='" . $firm_title_1 . "' placeholder='" . $locale['gsc223'] ."' />&nbsp;:</td>
	<td> <input type='text' name='firm_field_1' style='width:250px;' maxlength='100' class='textbox' value='" . $firm_field_1 . "' placeholder='" . $locale['gsc223'] ."' /></td>
	</tr>
	
	<tr>
	<td> <input type='text' name='firm_title_2' style='width:90%;' maxlength='100' class='textbox' value='" . $firm_title_2 . "' placeholder='" . $locale['gsc223'] ."' />&nbsp;:</td>
	<td> <input type='text' name='firm_field_2' style='width:250px;' maxlength='100' class='textbox' value='" . $firm_field_2 . "' placeholder='" . $locale['gsc223'] ."' /></td>
	</tr>
	
	<tr>
	<td> <input type='text' name='firm_title_3' style='width:90%;' maxlength='100' class='textbox' value='" . $firm_title_3 . "' placeholder='" . $locale['gsc223'] ."' />&nbsp;:</td>
	<td> <input type='text' name='firm_field_3' style='width:250px;' maxlength='100' class='textbox' value='" . $firm_field_3 . "' placeholder='" . $locale['gsc223'] ."' /></td>
	</tr>
	
	<tr>
	<td> <input type='text' name='firm_title_4' style='width:90%;' maxlength='100' class='textbox' value='" . $firm_title_4 . "' placeholder='" . $locale['gsc223'] ."' />&nbsp;:</td>
	<td> <input type='text' name='firm_field_4' style='width:250px;' maxlength='100' class='textbox' value='" . $firm_field_4 . "' placeholder='" . $locale['gsc223'] ."' /></td>
	</tr>
	
	<tr>
	<td> <input type='text' name='firm_title_5' style='width:90%;' maxlength='100' class='textbox' value='" . $firm_title_5 . "' placeholder='" . $locale['gsc223'] ."' />&nbsp;:</td>
	<td> <input type='text' name='firm_field_5' style='width:250px;' maxlength='500' class='textbox' value='" . stripslashes($firm_field_5) . "' placeholder='" . $locale['gsc346'] ."' /></td>
	</tr>
	
	</table>
	
	<br><br>
	
	<table border='1' style='vertical-align: top; margin: 0px auto;'>
	<tr>
	<td width='200px'>" . $locale['gsc340'] .":<font color='red'>*</font></td>
	<td><textarea name='impr_head' rows='4' style='width:250px' maxlength='250' class='textbox' placeholder='" . $locale['gsc341'] . "'";
	if($err_head==1) {echo 'style="background-color:#FFDDDD"' ;}
	echo">" . $impr_head . "</textarea></td>
	</tr>
	<tr>
	<td>" . $locale['gsc061'] .":<font color='red'>*</font></td>";
	if($err_name==1) {echo "<td> <input type='text' name='impr_name' style='width:250px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='" . $impr_name . "' placeholder='" . $locale['gsc061'] ."' /></td>";}
	else {echo "<td> <input type='text' name='impr_name' style='width:250px;' maxlength='40' class='textbox' value='" . $impr_name . "' placeholder='" . $locale['gsc061'] ."' /></td>";}
	echo"
	</tr>
	
	<tr>
	<td>" . $locale['gsc065'] .":<font color='red'>*</font></td>";
	if($err_adress==1) {echo "
	<td> <input type='text' name='impr_str' style='width:202px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='" . $impr_str . "' placeholder='" . $locale['gsc074'] ."' />
	<input type='text' name='impr_hnr' style='width:35px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='" . $impr_hnr . "' placeholder='" . $locale['gsc075'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='impr_str' style='width:202px;' maxlength='40' class='textbox' value='" . $impr_str . "' placeholder='" . $locale['gsc074'] ."' />
	<input type='text' name='impr_hnr' style='width:35px;' maxlength='10' class='textbox' value='" . $impr_hnr . "' placeholder='" . $locale['gsc075'] ."' /></td>";}
	echo"</tr>
	
	<tr>
	<td>" . $locale['gsc066'] .":<font color='red'>*</font></td>";
	if($err_plzort==1) {echo "
	<td> <input type='text' name='impr_plz' style='width:35px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='" . $impr_plz . "' placeholder='" . $locale['gsc076'] ."' />
	<input type='text' name='impr_ort' style='width:202px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='". $impr_ort . "' placeholder='" . $locale['gsc077'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='impr_plz' style='width:35px;' maxlength='5' class='textbox' value='" . $impr_plz . "' placeholder='" . $locale['gsc076'] ."' />
	<input type='text' name='impr_ort' style='width:202px;' maxlength='40' class='textbox' value='" . $impr_ort . "' placeholder='" . $locale['gsc077'] ."' /></td>";}
	echo"</tr>

	<tr>
	<td>" . $locale['gsc067'] .":</td>
	<td><input type='text' name='impr_tel_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $impr_tel_vor . "' placeholder='+49 12345' />
	<input type='text' name='impr_tel_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $impr_tel_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc068'] .":</td>
	<td> <input type='text' name='impr_mobil_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $impr_mobil_vor . "' placeholder='+49 12345' />
	<input type='text' name='impr_mobil_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $impr_mobil_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc069'] .":</td>
	<td> <input type='text' name='impr_fax_vor' style='width:70px;' maxlength='10' class='textbox' value='" . $impr_fax_vor . "' placeholder='+49 12345' />
	<input type='text' name='impr_fax_nr' style='width:70px;' maxlength='40' class='textbox' value='" . $impr_fax_nr . "' placeholder='" . $locale['gsc076'] ."' /></td>
	</tr>
	
	<tr>
	<td>" . $locale['gsc070'] .":<font color='red'>*</font></td>";
	if($err_email==1) {echo "<td> <input type='text' name='impr_email' style='width:250px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='" . $impr_email . "' placeholder='email@domain.org' /></td>";}
	else {echo "<td> <input type='text' name='impr_email' style='width:250px;' maxlength='40' class='textbox' value='" . $impr_email . "' placeholder='email@domain.org' /></td>";}
	echo"
	</tr>
	
	<tr>
	<td align='center' class='tbl2' colspan='0'><input type='submit' name='update' class='button' value='" . $locale['gsc141'] . "'></td>
	</tr>
	
	</table></form><br><br>
	<center>" . $locale['gsc084'] . "</center>";

closetable();

//include_once INFUSIONS . "gs_contactform/gsc_versionschecker.php";

include INFUSIONS . "gs_contactform/gsc_copyright.php";

require_once THEMES."templates/footer.php";
?>