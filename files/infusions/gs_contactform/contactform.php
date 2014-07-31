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
require_once THEMES."templates/header.php";

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";
include INFUSIONS . "gs_contactform/gsc_var.php";

// Captchaabfrage einbinden //
$_CAPTCHA_IS_VALID = false;
	include INCLUDES."captchas/".$settings['captcha']."/captcha_check.php";
	
opentable("<center>".$locale['gsc000']."</center>");

$data = dbarray(dbquery("SELECT * FROM " . DB_GSC_SETTINGS . ""));
$data1 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='1'"));
$data2 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='2'"));
$data3 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='3'"));
$data4 = dbarray(dbquery("SELECT * FROM " . DB_GSC_FIELDS . " WHERE id='4'"));

// Fehlerbehandlung //
if($gsc_senden && !$gsc_ip) {$err_ip=1;} else{$err_ip=0;}
if($gsc_senden && !$gsc_name) {$err_name=1;} else{$err_name=0;}
if($data['geb_requ'] == 1) {if($gsc_senden && (!$gsc_geb_tag OR !$gsc_geb_mon OR !$gsc_geb_jahr)) {$err_geb=1;} else{$err_geb=0;}}
if($data['firma_requ'] == 1) {if($gsc_senden && !$gsc_firma) {$err_firma=1;} else{$err_firma=0;}}
if($data['position_requ'] == 1) {if($gsc_senden && !$gsc_position) {$err_position=1;} else{$err_position=0;}}
if($data['adress_requ'] == 1) {if($gsc_senden && (!$gsc_str OR !$gsc_hnr)) {$err_adress=1;} else{$err_adress=0;}}
if($data['plzort_requ'] == 1) {if($gsc_senden && (!$gsc_plz OR !$gsc_ort)) {$err_plzort=1;} else{$err_plzort=0;}}
if($data['tel_requ'] == 1) {if($gsc_senden && (!$gsc_tel_vor OR !$gsc_tel_nr)) {$err_tel=1;} else{$err_tel=0;}}
if($data['mobil_requ'] == 1) {if($gsc_senden && (!$gsc_mobil_vor OR !$gsc_mobil_nr)) {$err_mobil=1;} else{$err_mobil=0;}}
if($data['fax_requ'] == 1) {if($gsc_senden && (!$gsc_fax_vor OR !$gsc_fax_nr)) {$err_fax=1;} else{$err_fax=0;}}
if($gsc_senden && !$gsc_email) {$err_email=1;} else{$err_email=0;}
if($gsc_senden && !preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $gsc_email)) {$err_email=1;} else{$err_email=0;}
if($gsc_web != "") {if($gsc_senden && preg_match("!^(http|https)+(://)+([a-z0-9\.-]{3,})\.[a-z]{2,12}$!i",$gsc_web)) {$err_url=0;} else{$err_url=1;}}
if($data['web_requ'] == 1) {if($gsc_senden && !$gsc_web) {$err_web=1;} else{$err_web=0;}}
if($data['userdef1_requ'] == 1) {if($gsc_senden && !$gsc_userdef1) {$err_userdef1=1;} else{$err_userdef1=0;}}
if($data['userdef2_requ'] == 1) {if($gsc_senden && !$gsc_userdef2) {$err_userdef2=1;} else{$err_userdef2=0;}}
if($data['userdef3_requ'] == 1) {if($gsc_senden && !$gsc_userdef3) {$err_userdef3=1;} else{$err_userdef3=0;}}
if($data['userdef4_requ'] == 1) {if($gsc_senden && !$gsc_userdef4) {$err_userdef4=1;} else{$err_userdef4=0;}}
if($gsc_senden && !$gsc_betreff) {$err_betreff=1;} else{$err_betreff=0;}
if($gsc_senden && !$gsc_text) {$err_text=1;} else{$err_text=0;}
if($gsc_senden && $_CAPTCHA_IS_VALID == false) {$err_captcha=1;} else {$err_captcha=0;} 

if($gsc_senden && ($err_ip !=1) && ($err_name !=1)  && ($err_name !=1) && ($err_geb !=1) && ($err_firma !=1) && ($err_position !=1) && ($err_adress !=1) && ($err_plzort !=1) && ($err_tel !=1) && ($err_mobil !=1) && ($err_fax !=1)&& ($err_email !=1) && ($err_url !=1) && ($err_web !=1) && ($err_userdef1 !=1) && ($err_userdef2 !=1) && ($err_userdef3 !=1) && ($err_userdef4 !=1) && $gsc_betreff && $gsc_text && $_CAPTCHA_IS_VALID) {
$message = nl2br($gsc_text);
if ($gsc_geb_tag && $gsc_geb_mon && $gsc_geb_jahr) { 
$geb= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc062]:</b></td><td>$gsc_geb_tag . $gsc_geb_mon . $gsc_geb_jahr</td>
</tr>";
}
if ($gsc_firma) { 
$firma= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc063]:</b></td><td>$gsc_firma</td>
</tr>";
}
if ($gsc_position) { 
$position= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc064]:</b></td><td>$gsc_position</td>
</tr>";
}
if ($gsc_str && $gsc_hnr) { 
$adress= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc065]:</b></td><td>$gsc_str $gsc_hnr</td>
</tr>";
}
if ($gsc_plz && $gsc_ort) { 
$plzort= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc066]:</b></td><td>$gsc_plz $gsc_ort</td>
</tr>";
}
if ($gsc_tel_vor && $gsc_tel_nr) { 
$tel= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc067]:</b></td><td>$gsc_tel_vor - $gsc_tel_nr</td>
</tr>";
}
if ($gsc_mobil_vor && $gsc_mobil_nr) { 
$mobil= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc068]:</b></td><td>$gsc_mobil_vor - $gsc_mobil_nr</td>
</tr>";
}
if ($gsc_fax_vor && $gsc_fax_nr) { 
$fax= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc069]:</b></td><td>$gsc_fax_vor - $gsc_fax_nr</td>
</tr>";
}
if ($gsc_web) { 
$web= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc071]:</b></td><td><a href='$gsc_web'>$gsc_web</a></td>
</tr>";
}
if ($gsc_userdef1) { 
$userdef1= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$data1[field_name]:</b></td><td>$gsc_userdef1</td>
</tr>";
}
if ($gsc_userdef2) { 
$userdef2= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$data2[field_name]:</b></td><td>$gsc_userdef2</td>
</tr>";
}
if ($gsc_userdef3) { 
$userdef3= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$data3[field_name]:</b></td><td>$gsc_userdef3</td>
</tr>";
}
if ($gsc_userdef4) { 
$userdef4= "
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$data4[field_name]:</b></td><td>$gsc_userdef4</td>
</tr>";
}
$nachricht ="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<table width='500px' cellpadding='2' cellspacing='2' class='tbl article_idx_cat_name'>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
</tr>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc100]</b></td><td>$gsc_name</td>
</tr>
$geb
$firma
$position
$adress
$plzort
$tel
$mobil
$fax
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc070]:</b></td><td><a href='mailto:$gsc_email'>$gsc_email</a></td>
</tr>
$web
$userdef1
$userdef2
$userdef3
$userdef4
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc072]:</b></td><td>$gsc_betreff</td>
</tr>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td><b>$locale[gsc073]:</b></td>
</tr>
</table>
<table>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td>$message</td>
</tr>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td width='20px' valign='top'>&nbsp;</td>
<td>$locale[gsc041] <b>$gsc_ip</b> $locale[gsc042]</td>
</tr>
</table>";

require_once INCLUDES."sendmail_include.php";

		if (sendemail($settings['siteusername'],$data['email_to'],$gsc_name,$gsc_email,$locale['gsc040'] . $gsc_betreff,$nachricht,'html')) { 
		$msg_mail = $locale['gsc043'];
	}	else {
		$msg_mail = $locale['gsc044'];
	}

if($email_kopie ==1) {	
	if (sendemail($gsc_name,$gsc_email,$settings['sitename'],$data['email_answer'],$locale['gsc046'] . $settings['sitename'] ." ". $locale['gsc072'] . ": " . $gsc_betreff,$nachricht,'html')) { 
		$msg_mail = $locale['gsc043'];
	}	else {
		$msg_mail = $locale['gsc044'];
	}
}	

dbquery("INSERT " . DB_GSC_CONTACT . " SET
	gsc_ip = '" . stripinput($gsc_ip) . "',
	gsc_name = '" . stripinput($gsc_name) . "',
	gsc_geb = '" . stripinput($gsc_geb_tag.".".$gsc_geb_mon.".".$gsc_geb_jahr) . "',
	gsc_firma = '" . stripinput($gsc_firma) . "',
	gsc_position = '" . stripinput($gsc_position) . "',
	gsc_adress = '" . stripinput($gsc_str." ".$gsc_hnr) . "',
	gsc_plzort = '" . stripinput($gsc_plz." ".$gsc_ort) . "',
	gsc_tel = '" . stripinput($gsc_tel_vor."-".$gsc_tel_nr) . "',
	gsc_mobil = '" . stripinput($gsc_mobil_vor."-".$gsc_mobil_nr) . "',
	gsc_fax = '" . stripinput($gsc_fax_vor."-".$gsc_fax_nr) . "',
	gsc_email = '" . stripinput($gsc_email) . "',
	gsc_web = '" . stripinput($gsc_web) . "',
	gsc_userdef1 = '" . stripinput($gsc_userdef1) . "',
	gsc_userdef2 = '" . stripinput($gsc_userdef2) . "',
	gsc_userdef3 = '" . stripinput($gsc_userdef3) . "',
	gsc_userdef4 = '" . stripinput($gsc_userdef4) . "',
	gsc_betreff = '" . stripinput($gsc_betreff) . "',
	gsc_nachricht = '" . stripinput($gsc_text) . "',
	gsc_timestamp = '" . time() . "'");
	
$pm_subject = $locale['gsc100'] . " " . $gsc_name;
$pm_message = $locale['gsc101'];

dbquery("INSERT INTO ".$db_prefix."messages (message_to, message_from, message_subject, message_message, message_smileys, message_read, message_datestamp, message_folder) 
				  VALUES( '".$data['pm_to']."', '1', '".$pm_subject."', '<br>".$pm_message."', 'n', '0', '".time()."', '0')");
}

// Anfrage als Email senden //
if(isset($msg_mail)) {
echo "<center><strong>".$msg_mail."</strong></center>";
}

// Meldungen bei fehlerhafter Eingabe //
else {
	if($err_ip==1) {
	echo"<div class='admin-message'>" . $locale['gsc120'] . "</div>";
	}
	if($err_name==1) {
	echo"<div class='admin-message'>" . $locale['gsc121'] . "</div>";
	}
	if($err_geb==1) {
	echo"<div class='admin-message'>" . $locale['gsc122'] . "</div>";
	}
	if($err_firma==1) {
	echo"<div class='admin-message'>" . $locale['gsc123'] . "</div>";
	}
	if($err_position==1) {
	echo"<div class='admin-message'>" . $locale['gsc124'] . "</div>";
	}
	if($err_adress==1) {
	echo"<div class='admin-message'>" . $locale['gsc125'] . "</div>";
	}
	if($err_plzort==1) {
	echo"<div class='admin-message'>" . $locale['gsc126'] . "</div>";
	}
	if($err_tel==1) {
	echo"<div class='admin-message'>" . $locale['gsc127'] . "</div>";
	}
	if($err_mobil==1) {
	echo"<div class='admin-message'>" . $locale['gsc128'] . "</div>";
	}
	if($err_fax==1) {
	echo"<div class='admin-message'>" . $locale['gsc129'] . "</div>";
	}
	if($err_email==1) {
	echo"<div class='admin-message'>" . $locale['gsc130'] . "</div>";
	}
	if($err_url==1) {
	echo"<div class='admin-message'>" . $locale['gsc135'] . "</div>";
	}
	if($err_web==1) {
	echo"<div class='admin-message'>" . $locale['gsc131'] . "</div>";
	}
	if($err_userdef1==1) {
	echo"<div class='admin-message'>" . $data1['field_err'] . "</div>";
	}
	if($err_userdef2==1) {
	echo"<div class='admin-message'>" . $data2['field_err'] . "</div>";
	}
	if($err_userdef3==1) {
	echo"<div class='admin-message'>" . $data3['field_err'] . "</div>";
	}
	if($err_userdef4==1) {
	echo"<div class='admin-message'>" . $data4['field_err'] . "</div>";
	}
	if($err_betreff==1) {
	echo"<div class='admin-message'>" . $locale['gsc132'] . "</div>";
	}
	if($err_text==1) {
	echo"<div class='admin-message'>" . $locale['gsc133'] . "</div>";
	}
	if($err_captcha==1) {
	echo"<div class='admin-message'>" . $locale['gsc134'] . "</div>";
	}

	echo"
	<center><strong>" . nl2br($data['form_header']) ;
	if(iMEMBER) {
		if($data['pm_to'] !=0) {
			echo" <br><br>" . $locale['gsc021'] . "<a href='".BASEDIR."messages.php?msg_send=".$data['pm_to']."' title='" . $locale['gsc022'] . "'>" . $locale['gsc022'] . "</a>" . $locale['gsc023'];
		} 
			}
	
	echo"</strong></center>
	<br>";

	echo "
	<form name='contactform' method='POST' action='".FUSION_SELF."'>
	<table border='0' style='vertical-align: top; margin: 0px auto;'>
	
	<tr>
	<td>" . $locale['gsc060'] .":</td>";
	if($err_ip==1) {echo "<td>" . $locale['gsc120'] . "</td>";}
	else {echo "<td>".$gsc_ip."</td>";}
	echo"
	</tr>
	
	<tr>
	<td>" . $locale['gsc061'] .":<font color='red'>*</font></td>";
	if($err_name==1) {echo "<td> <input type='text' name='gsc_name' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_name."' placeholder='" . $locale['gsc061'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_name' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_name."' placeholder='" . $locale['gsc061'] ."' /></td>";}
	echo"
	</tr>";
	
	if ($data['geb_show'] == 1){ echo "
	<tr>";
	if ($data['geb_requ'] == 1){ echo "
	<td>" . $locale['gsc062'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc062'] .":</td>";}
	echo "<td>";
		if($err_geb==1) { 
		echo "<select name='gsc_geb_tag' class='textbox' style='background-color:#FFDDDD;'>\n<option> </option>\n"; for ($i=1;$i<=31;$i++) { echo "<option".($gsc_geb_tag == $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		echo ".";
		echo "<select name='gsc_geb_mon' class='textbox' style='background-color:#FFDDDD;'>\n<option> </option>\n"; for ($i=1;$i<=12;$i++) { echo "<option".($gsc_geb_mon== $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		echo ".";
		echo "<select name='gsc_geb_jahr' class='textbox' style='background-color:#FFDDDD;'>\n<option></option>\n"; for ($i=date(1940);$i<=date("Y");$i++) { echo "<option".($gsc_geb_jahr == $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		}
		else { 
		echo "<select name='gsc_geb_tag' class='textbox'>\n<option> </option>\n"; for ($i=1;$i<=31;$i++) { echo "<option".($gsc_geb_tag == $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		echo ".";
		echo "<select name='gsc_geb_mon' class='textbox'>\n<option> </option>\n"; for ($i=1;$i<=12;$i++) { echo "<option".($gsc_geb_mon== $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		echo".";
		echo "<select name='gsc_geb_jahr' class='textbox'>\n<option></option>\n"; for ($i=date(1940);$i<=date("Y");$i++) { echo "<option".($gsc_geb_jahr == $i ? " selected='selected'" : "").">".$i."</option>\n"; } echo "</select>";
		}
		echo "<td>
	</tr>";
	}
	
	if ($data['firma_show'] == 1){ echo "
	<tr>";
	if ($data['firma_requ'] == 1){ echo "
	<td>" . $locale['gsc063'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc063'] .":</td>";}
	if($err_firma==1) {echo "<td> <input type='text' name='gsc_firma' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_firma."' placeholder='" . $locale['gsc063'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_firma' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_firma."' placeholder='" . $locale['gsc063'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['position_show'] == 1){ echo "
	<tr>";
	if ($data['position_requ'] == 1){ echo "
	<td>" . $locale['gsc064'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc064'] .":</td>";}
	if($err_position==1) {echo "<td> <input type='text' name='gsc_position' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_position."' placeholder='" . $locale['gsc064'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_position' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_position."' placeholder='" . $locale['gsc064'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['adress_show'] == 1){ echo "
	<tr>";
	if ($data['adress_requ'] == 1){ echo "
	<td>" . $locale['gsc065'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc065'] .":</td>";}
	if($err_adress==1) {echo "
	<td> <input type='text' name='gsc_str' style='width:150px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_str."' placeholder='" . $locale['gsc074'] ."' />
	<input type='text' name='gsc_hnr' style='width:40px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='".$gsc_hnr."' placeholder='" . $locale['gsc075'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='gsc_str' style='width:150px;' maxlength='100' class='textbox' value='".$gsc_str."' placeholder='" . $locale['gsc074'] ."' />
	<input type='text' name='gsc_hnr' style='width:40px;' maxlength='10' class='textbox' value='".$gsc_hnr."' placeholder='" . $locale['gsc075'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['plzort_show'] == 1){ echo "
	<tr>";
	if ($data['plzort_requ'] == 1){ echo "
	<td>" . $locale['gsc066'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc066'] .":</td>";}
	if($err_plzort==1) {echo "
	<td> <input type='text' name='gsc_plz' style='width:40px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='".$gsc_plz."' placeholder='" . $locale['gsc076'] ."' />
	<input type='text' name='gsc_ort' style='width:150px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_ort."' placeholder='" . $locale['gsc077'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='gsc_plz' style='width:40px;' maxlength='10' class='textbox' value='".$gsc_plz."' placeholder='" . $locale['gsc076'] ."' />
	<input type='text' name='gsc_ort' style='width:150px;' maxlength='100' class='textbox' value='".$gsc_ort."' placeholder='" . $locale['gsc077'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['tel_show'] == 1){ echo "
	<tr>";
	if ($data['tel_requ'] == 1){ echo "
	<td>" . $locale['gsc067'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc067'] .":</td>";}
	if($err_tel==1) {echo "
	<td> <input type='text' name='gsc_tel_vor' style='width:70px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='".$gsc_tel_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_tel_nr' style='width:70px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='".$gsc_tel_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='gsc_tel_vor' style='width:70px;' maxlength='10' class='textbox' value='".$gsc_tel_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_tel_nr' style='width:70px;' maxlength='40' class='textbox' value='".$gsc_tel_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['mobil_show'] == 1){ echo "
	<tr>";
	if ($data['mobil_requ'] == 1){ echo "
	<td>" . $locale['gsc068'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc068'] .":</td>";}
	if($err_mobil==1) {echo "
	<td> <input type='text' name='gsc_mobil_vor' style='width:70px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='".$gsc_mobil_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_mobil_nr' style='width:70px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='".$gsc_mobil_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='gsc_mobil_vor' style='width:70px;' maxlength='10' class='textbox' value='".$gsc_mobil_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_mobil_nr' style='width:70px;' maxlength='40' class='textbox' value='".$gsc_mobil_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['fax_show'] == 1){ echo "
	<tr>";
	if ($data['fax_requ'] == 1){ echo "
	<td>" . $locale['gsc069'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc069'] .":</td>";}
	if($err_fax==1) {echo "
	<td> <input type='text' name='gsc_fax_vor' style='width:70px; background-color:#FFDDDD;' maxlength='10' class='textbox' value='".$gsc_fax_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_fax_nr' style='width:70px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='".$gsc_fax_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	else {echo "
	<td> <input type='text' name='gsc_fax_vor' style='width:70px;' maxlength='10' class='textbox' value='".$gsc_fax_vor."' placeholder='+49 12345' />
	<input type='text' name='gsc_fax_nr' style='width:70px;' maxlength='40' class='textbox' value='".$gsc_fax_nr."' placeholder='" . $locale['gsc076'] ."' /></td>";}
	echo"<tr>";
	}
	
	echo "
	<tr>
	<td>" . $locale['gsc070'] .":<font color='red'>*</font></td>";
	if($err_email==1) {echo "<td> <input type='text' name='gsc_email' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_email."' placeholder='email@domain.org' /></td>";}
	else {echo "<td> <input type='text' name='gsc_email' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_email."' placeholder='email@domain.org' /></td>";}
	echo"
	</tr>";
	
	if ($data['web_show'] == 1){ echo "
	<tr>";
	if ($data['web_requ'] == 1){ echo "
	<td>" . $locale['gsc071'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $locale['gsc071'] .":</td>";}
	if(($err_web== 1) OR ($err_url== 1)) {echo "<td> <input type='text' name='gsc_web' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_web."' placeholder='http://yourdomain.org' /></td>";}
	else {echo "<td> <input type='text' name='gsc_web' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_web."' placeholder='http://yourdomain.org' /></td>";}
	echo"<tr>";
	}
	
	if ($data['userdef1_show'] == 1){ echo "
	<tr>";
	if ($data['userdef1_requ'] == 1){ echo "
	<td>" . $data1['field_name'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $data1['field_name'] .":</td>";}
	if($err_userdef1==1) {echo "<td> <input type='text' name='gsc_userdef1' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_userdef1."' placeholder='" . $data1['field_place'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_userdef1' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_userdef1."' placeholder='" . $data1['field_place'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['userdef2_show'] == 1){ echo "
	<tr>";
	if ($data['userdef2_requ'] == 1){ echo "
	<td>" . $data2['field_name'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $data2['field_name'] .":</td>";}
	if($err_userdef2==1) {echo "<td> <input type='text' name='gsc_userdef2' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_userdef2."' placeholder='" . $data2['field_place'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_userdef2' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_userdef2."' placeholder='" . $data2['field_place'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['userdef3_show'] == 1){ echo "
	<tr>";
	if ($data['userdef3_requ'] == 1){ echo "
	<td>" . $data3['field_name'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $data3['field_name'] .":</td>";}
	if($err_userdef3==1) {echo "<td> <input type='text' name='gsc_userdef3' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_userdef3."' placeholder='" . $data3['field_place'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_userdef3' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_userdef3."' placeholder='" . $data3['field_place'] ."' /></td>";}
	echo"<tr>";
	}
	
	if ($data['userdef4_show'] == 1){ echo "
	<tr>";
	if ($data['userdef4_requ'] == 1){ echo "
	<td>" . $data4['field_name'] .":<font color='red'>*</font></td>";}
	else { echo "
	<td>" . $data4['field_name'] .":</td>";}
	if($err_userdef4==1) {echo "<td> <input type='text' name='gsc_userdef4' style='width:200px; background-color:#FFDDDD;' maxlength='100' class='textbox' value='".$gsc_userdef4."' placeholder='" . $data4['field_place'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_userdef4' style='width:200px;' maxlength='100' class='textbox' value='".$gsc_userdef4."' placeholder='" . $data4['field_place'] ."' /></td>";}
	echo"<tr>";
	}
	
	$result = dbquery("SELECT * FROM " . DB_GSC_SUBJECT . " ORDER BY sub_name");
	if (dbrows($result) > 0) {
	echo" 
	<tr>
	<td>" . $locale['gsc072'] .":<font color='red'>*</font></td>";
    
	if($err_betreff==1) { echo "
	<td><select name='gsc_betreff' class='textbox' style='background-color:#FFDDDD; width:203px;'>\n
	<option> </option>\n";
	while ($data5 = dbarray($result)) { echo"
		<option".($gsc_betreff == $data5['sub_name'] ? " selected='selected'" : "").">".$data5['sub_name']."</option>\n";} 
		echo"</select></td>";
	} else { echo "
	<td><select name='gsc_betreff' class='textbox' style='width:203px;'>\n
	<option> </option>\n";
	while ($data5 = dbarray($result)) { echo"
		<option".($gsc_betreff == $data5['sub_name'] ? " selected='selected'" : "").">".$data5['sub_name']."</option>\n";}
		echo "</select></td>";
	}
	echo " </tr>";
	} else {
	echo" 
	<tr>
	<td>" . $locale['gsc072'] .":<font color='red'>*</font></td>";
	if($err_betreff==1) {echo "<td> <input type='text' name='gsc_betreff' style='width:200px; background-color:#FFDDDD;' maxlength='40' class='textbox' value='".$gsc_betreff."' placeholder='" . $locale['gsc072'] ."' /></td>";}
	else {echo "<td> <input type='text' name='gsc_betreff' style='width:200px;' maxlength='40' class='textbox' value='".$gsc_betreff."' placeholder='" . $locale['gsc072'] ."' /></td>";}
	echo"
	</tr>";
	}

	echo"
	<tr>
	<td>" . $locale['gsc073'] .":<font color='red'>*</font></td>
	<td><textarea name='gsc_text' cols='48' rows='10' maxlength='1000' onkeyup='count1(event)' class='textbox'";
	if($err_text==1) {echo 'style="background-color:#FFDDDD"' ;}
	
// Textarea mit Eingabebeschränkung //
	echo">".$gsc_text."</textarea></td>
	</tr>
	
	<tr>
	<td></td>
	<td><div align='right'>
	<input name='gsc_rest' style='text-align:center' size='3' onfocus='if(this.blur)this.blur()'> ". $locale['gsc080'] . "
	
	<script language='JavaScript'>

         var max = 1000;

         document.contactform.gsc_rest.value = max;
         document.contactform.gsc_text.focus();

         function count1(e) {

            if (!e.which) keyCode = event.keyCode; // ie5+ op5+
            else keyCode = e.which; // nn6+

            if (document.contactform.gsc_text.value.length<max+1) document.contactform.gsc_rest.value = max-document.contactform.gsc_text.value.length;
            else {
               document.contactform.gsc_text.value = document.contactform.gsc_text.value.substring(0,max);
               document.contactform.gsc_rest.value = 0;
            }
         }
      </script>
	
	</div>
	<br><br></td>
	</tr>

	<tr>
	<td>" . $locale['gsc081'] . "</td>\n
	<td>";
	
// Captcha //
	include INCLUDES."captchas/".$settings['captcha']."/captcha_display.php";
	if (!isset($_CAPTCHA_HIDE_INPUT) || (isset($_CAPTCHA_HIDE_INPUT) && !$_CAPTCHA_HIDE_INPUT)) {
		echo "</td>\n</tr>\n<tr>";
		echo "<td>".$locale['gsc082']."</td>\n";
		echo "<td class='tbl'>";
		echo "<input type='text' id='captcha_code' name='captcha_code' class='textbox' autocomplete='off' style='width:100px' />";
	}
	echo "</td>\n</tr>\n
	<br></table>
	<table border='0' style='vertical-align: top; margin: 0px auto;'>
	<tr>
	<td class='tbl1'><center><input type='checkbox' " . (($email_kopie == 1) ? "checked='checked'" : "") . " name='email_kopie' value='1' style='width:10px; text-align:center'></center></td><td>".$locale['gsc045']."</td>
	<tr>
	<br></table>
	<center><input type='submit' name='gsc_senden' value='" . $locale['gsc083'] . "' class='button' /></center>
	</form><br><br>
	<center>" . $locale['gsc084'] . "</center>";
}

closetable();

echo "<table align='right' border='0'><tr><td align='right' colspan='0'><a href='mailto:gul-sonic@online.de' title='Copyright by GUL-Sonic'>&copy;</a></td></tr></table>";

require_once THEMES."templates/footer.php";
?>