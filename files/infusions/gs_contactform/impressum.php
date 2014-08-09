<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: contact.php
| Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../../maincore.php";
require_once THEMES."templates/header.php";

if (file_exists(INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php")) {
    include INFUSIONS . "gs_contactform/locale/" . $settings['locale'] . ".php";
} else {
    include INFUSIONS . "gs_contactform/locale/German.php";
}

include INFUSIONS . "gs_contactform/infusion_db.php";
include INFUSIONS . "gs_contactform/gsc_functions.php";

$data22 = dbarray(dbquery("SELECT * FROM " . DB_GSC_IMPRESSUM . " WHERE id='1'"));

opentable('<center>' . $locale['gsc165'] . '</center>');

echo " <table border='0' style='vertical-align: top; margin: 0px auto;' width='100%'>";

if($data22['firm_firma'] != "") { echo "
	<tr>
	<td>
	<strong>" . nl2br($data22['firm_firma']) . "</strong>
	<br>" . $data22['firm_name'] . "
	<br>" . $data22['firm_str'] . " " . $data22['firm_hnr'] . "
	<br>" . $data22['firm_plz'] . " " . $data22['firm_ort'] . "
	<br>&nbsp;";
	
if(($data22['firm_tel_vor'] != "") OR ($data22['firm_tel_nr'] != "")) { echo "	
	<br>" . $locale['gsc067'] . ": " . $data22['firm_tel_vor'] . "-" . $data22['firm_tel_nr'];
}

if(($data22['firm_mobil_vor'] != "") OR ($data22['firm_mobil_nr'] != "")) { echo "	
	<br>" . $locale['gsc068'] . ": " . $data22['firm_mobil_vor'] . "-" . $data22['firm_mobil_nr'];
}

if(($data22['firm_fax_vor'] != "") OR ($data22['firm_fax_nr'] != "")) { echo "	
	<br>" . $locale['gsc069'] . ": " . $data22['firm_fax_vor'] . "-" . $data22['firm_fax_nr'];
}

if($data22['firm_email'] != "") { echo "
	<br><a href='mailto:" . $data22['firm_email'] . "'><strong>" . $locale['gsc345'] . "</strong></a>";
}

echo" <br>&nbsp;";

if($data22['firm_ustid'] != "") { echo "	
	<br>" . $locale['gsc342'] . ": " . $data22['firm_ustid'];
}

if($data22['firm_field_1'] != "") { echo "	
	<br>" . $data22['firm_title_1'] . ": " . $data22['firm_field_1'];
}

if($data22['firm_field_2'] != "") { echo "	
	<br>" . $data22['firm_title_2'] . ": " . $data22['firm_field_2'];
}

if($data22['firm_field_3'] != "") { echo "	
	<br>" . $data22['firm_title_3'] . ": " . $data22['firm_field_3'];
}

if($data22['firm_field_4'] != "") { echo "	
	<br>" . $data22['firm_title_4'] . ": " . $data22['firm_field_4'];
}

if($data22['firm_field_5'] != "") { echo "	
	<br>" . $data22['firm_title_5'] . ": " . stripslashes($data22['firm_field_5']);
}

echo" <br>&nbsp;</td>";
if($data22['firm_logo'] != "") { echo "	
	<td rowspan='2'><img style='float: right; width: 200px;' src='" . $data22['firm_logo'] . "'></td></tr>";
}
echo "</tr>";
} else {
if($data22['firm_logo'] != "") { echo "	
	<tr><td></td><td rowspan='2'><img style='float: right; width: 200px;' src='" . $data22['firm_logo'] . "'></td></tr>";
}
}	

	echo "
	<tr>
	<td><strong>" . nl2br($data22['impr_head']) . "</strong>
	<br>" . $data22['impr_name'] . "
	<br>" . $data22['impr_str'] . " " . $data22['impr_hnr'] . "
	<br>" . $data22['impr_plz'] . " " . $data22['impr_ort'] . "
	<br>&nbsp;";
	
if(($data22['impr_tel_vor'] != "") OR ($data22['impr_tel_nr'] != "")) { echo "
	<br>" . $locale['gsc067'] . ": " . $data22['impr_tel_vor'] . "-" . $data22['impr_tel_nr'];
}
	
if(($data22['impr_mobil_vor'] != "") OR ($data22['impr_mobil_nr'] != "")) { echo "	
	<br>" . $locale['gsc068'] . ": " . $data22['impr_mobil_vor'] . "-" . $data22['impr_mobil_nr'];
}

if(($data22['impr_fax_vor'] != "") OR ($data22['impr_fax_nr'] != "")) { echo "	
	<br>" . $locale['gsc069'] . ": " . $data22['impr_fax_vor'] . "-" . $data22['impr_fax_nr'];
}
echo "<br><a href='mailto:" . $data22['impr_email'] . "'><strong>" . $locale['gsc345'] . "</strong></a></td>
	</tr>	
	</table>";
closetable();

if(($data22['impr_disclaimer_agb'] == 1) OR $data22['impr_disclaimer_agb'] == 2) {

opentable('<center>' . $locale['gsc167'] . ' </center>');

echo "<center>" . $locale['gsc344'] . " " . ucfirst(showdate("longdate", $data22['impr_timestamp']))."</center><br>";

echo stripslashes($data22['impr_disclaimer']);

closetable();
}

if(($data22['impr_disclaimer_agb'] == 1) OR $data22['impr_disclaimer_agb'] == 3) {

opentable('<center>' . $locale['gsc168'] . ' </center>');
$settings2 = array();
$result = dbquery("SELECT * FROM ".DB_SETTINGS);
while ($data = dbarray($result)) {
	$settings2[$data['settings_name']] = $data['settings_value'];
}

echo "<center>" . $locale['gsc344'] . " " . ucfirst(showdate("longdate", $settings['license_lastupdate']))."</center><br>";

echo stripslashes($settings2['license_agreement']);

closetable();
}

echo "<table align='right' border='0'><tr><td align='right' colspan='0'><a href='mailto:gul-sonic@online.de' title='Copyright by GUL-Sonic'>&copy;</a></td></tr></table>";

require_once THEMES."templates/footer.php";
?>
