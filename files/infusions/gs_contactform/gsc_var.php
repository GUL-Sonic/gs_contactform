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

if (!defined("IN_FUSION") || !IN_FUSION)
   die("Access denied!");
   
 if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}
 
// Variablendefinition contactform.php//
$gsc_ip = getenv("REMOTE_ADDR");
$gsc_name = (isset($_POST['gsc_name'])) ? $_POST['gsc_name'] : "";
$geb = (isset($_POST['geb'])) ? $_POST['geb'] : "";
$firma = (isset($_POST['firma'])) ? $_POST['firma'] : "";
$position = (isset($_POST['position'])) ? $_POST['position'] : "";
$adress = (isset($_POST['adress'])) ? $_POST['adress'] : "";
$plzort = (isset($_POST['plzort'])) ? $_POST['plzort'] : "";
$tel = (isset($_POST['tel'])) ? $_POST['tel'] : "";
$mobil = (isset($_POST['mobil'])) ? $_POST['mobil'] : "";
$fax = (isset($_POST['fax'])) ? $_POST['fax'] : "";

$web = (isset($_POST['web'])) ? $_POST['web'] : "";
$userdef1 = (isset($_POST['userdef1'])) ? $_POST['userdef1'] : "";
$userdef2 = (isset($_POST['userdef2'])) ? $_POST['userdef2'] : "";
$userdef3 = (isset($_POST['userdef3'])) ? $_POST['userdef3'] : "";
$userdef4 = (isset($_POST['userdef4'])) ? $_POST['userdef4'] : "";

$email_kopie = (isset($_POST['email_kopie'])) ? 1 : 0; 

$gsc_geb_tag = (isset($_POST['gsc_geb_tag'])) ? $_POST['gsc_geb_tag'] : "";
$gsc_geb_mon = (isset($_POST['gsc_geb_mon'])) ? $_POST['gsc_geb_mon'] : "";
$gsc_geb_jahr = (isset($_POST['gsc_geb_jahr'])) ? $_POST['gsc_geb_jahr'] : "";

$gsc_firma = (isset($_POST['gsc_firma'])) ? $_POST['gsc_firma'] : "";
$gsc_position = (isset($_POST['gsc_position'])) ? $_POST['gsc_position'] : "";
$gsc_str = (isset($_POST['gsc_str'])) ? $_POST['gsc_str'] : "";
$gsc_hnr = (isset($_POST['gsc_hnr'])) ? $_POST['gsc_hnr'] : "";
$gsc_plz = (isset($_POST['gsc_plz'])) ? $_POST['gsc_plz'] : "";
$gsc_ort = (isset($_POST['gsc_ort'])) ? $_POST['gsc_ort'] : "";

$gsc_tel_vor = (isset($_POST['gsc_tel_vor'])) ? $_POST['gsc_tel_vor'] : "";
$gsc_tel_nr = (isset($_POST['gsc_tel_nr'])) ? $_POST['gsc_tel_nr'] : "";

$gsc_mobil_vor = (isset($_POST['gsc_mobil_vor'])) ? $_POST['gsc_mobil_vor'] : "";
$gsc_mobil_nr = (isset($_POST['gsc_mobil_nr'])) ? $_POST['gsc_mobil_nr'] : "";

$gsc_fax_vor = (isset($_POST['gsc_fax_vor'])) ? $_POST['gsc_fax_vor'] : "";
$gsc_fax_nr = (isset($_POST['gsc_fax_nr'])) ? $_POST['gsc_fax_nr'] : "";

$gsc_email = (isset($_POST['gsc_email'])) ? $_POST['gsc_email'] : "";

$gsc_web = (isset($_POST['gsc_web'])) ? $_POST['gsc_web'] : "";
$gsc_userdef1 = (isset($_POST['gsc_userdef1'])) ? $_POST['gsc_userdef1'] : "";
$gsc_userdef2 = (isset($_POST['gsc_userdef2'])) ? $_POST['gsc_userdef2'] : "";
$gsc_userdef3 = (isset($_POST['gsc_userdef3'])) ? $_POST['gsc_userdef3'] : "";
$gsc_userdef4 = (isset($_POST['gsc_userdef4'])) ? $_POST['gsc_userdef4'] : "";

$gsc_text = (isset($_POST['gsc_text'])) ? $_POST['gsc_text'] : "";
$gsc_senden = (isset($_POST['gsc_senden'])) ? $_POST['gsc_senden'] : "";
$gsc_betreff = (isset($_POST['gsc_betreff'])) ? $_POST['gsc_betreff'] : "";

$geb_show = (isset($_POST['geb_show'])) ? $_POST['geb_show'] : "";
$geb_requ = (isset($_POST['geb_requ'])) ? $_POST['geb_requ'] : "";

$field_name = (isset($_POST['field_name'])) ? $_POST['field_name'] : "";
$field_place = (isset($_POST['field_place'])) ? $_POST['field_place'] : "";
$field_err = (isset($_POST['field_err'])) ? $_POST['field_err'] : "";

$sub_name = (isset($_POST['sub_name'])) ? $_POST['sub_name'] : "";

$edit = (isset($_POST['edit'])) ? $_POST['edit'] : "";
$del = (isset($_POST['del'])) ? $_POST['del'] : "";

$err_ip = (isset($_POST['err_ip'])) ? $_POST['err_ip'] : "";
$err_name = (isset($_POST['err_name'])) ? $_POST['err_name'] : "";
$err_geb = (isset($_POST['err_geb'])) ? $_POST['err_geb'] : "";
$err_firma = (isset($_POST['err_firma'])) ? $_POST['err_firma'] : "";
$err_position = (isset($_POST['err_position'])) ? $_POST['err_position'] : "";
$err_adress = (isset($_POST['err_adress'])) ? $_POST['err_adress'] : "";
$err_plzort = (isset($_POST['err_plzort'])) ? $_POST['err_plzort'] : "";
$err_tel = (isset($_POST['err_tel'])) ? $_POST['err_tel'] : "";
$err_mobil = (isset($_POST['err_mobil'])) ? $_POST['err_mobil'] : "";
$err_fax = (isset($_POST['err_fax'])) ? $_POST['err_fax'] : "";
$err_email = (isset($_POST['err_email'])) ? $_POST['err_email'] : "";
$err_web = (isset($_POST['err_web'])) ? $_POST['err_web'] : "";
$err_userdef1 = (isset($_POST['err_userdef1'])) ? $_POST['err_userdef1'] : "";
$err_userdef2 = (isset($_POST['err_userdef2'])) ? $_POST['err_userdef2'] : "";
$err_userdef3 = (isset($_POST['err_userdef3'])) ? $_POST['err_userdef3'] : "";
$err_userdef4 = (isset($_POST['err_userdef4'])) ? $_POST['err_userdef4'] : "";
$err_betreff = (isset($_POST['err_betreff'])) ? $_POST['err_betreff'] : "";
$err_text = (isset($_POST['err_text'])) ? $_POST['err_text'] : "";
$err_captcha = (isset($_POST['err_captcha'])) ? $_POST['err_captcha'] : "";

// Variablendefinition gsc_settings_panel.php
$email_to = (isset($_POST['email_to'])) ? $_POST['email_to'] : "";
$email_answer = (isset($_POST['email_answer'])) ? $_POST['email_answer'] : "";
$pm_to = (isset($_POST['pm_to'])) ? $_POST['pm_to'] : "";

// Variablendefinition spezieller Funktionen //
$gespeichert = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_positive'>" . $locale['gsc142'] . "</span></td></tr>\n</table>\n";
$ngespeichert = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc149'] . "</span></td></tr>\n</table>\n";
$geloescht = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_positive'>" . $locale['gsc145'] . "</span></td></tr>\n</table>\n";
$ngeloescht = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc146'] . "</span></td></tr>\n</table>\n";
$keintrag = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'><tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc147'] . "</span></td></tr></table>\n";
$doppelt = "<table cellpadding='0' cellspacing='1' class='tbl-border tbl_gsc'>\n<tr><td class='tbl2'><span class='gsc_negative'>" . $locale['gsc150'] . "</span></td></tr>\n</table>\n";
$required = "<span class='gsc_require'>*</span>";
 
 ?>