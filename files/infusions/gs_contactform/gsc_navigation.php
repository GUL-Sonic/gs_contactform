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
 if (!defined("IN_FUSION") || !IN_FUSION) 
	die("Access denied!");

require_once "../../maincore.php";

echo"
<table border='0' style='vertical-align: top; margin: 0px auto;' width='100%'>
<tr>
<td><center>
<a href='" . INFUSIONS . "gs_contactform/gsc_settings_panel.php" . $aidlink."'><input type='submit' value='" . $locale['gsc161'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_fields.php'><input type='submit' value='" . $locale['gsc162'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_cats.php'><input type='submit' value='" . $locale['gsc163'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_messages.php'><input type='submit' value='" . $locale['gsc164'] . "'></a></center></td>
</tr>
<tr>
<td><hr /><center>
<a href='" . INFUSIONS . "gs_contactform/gsc_ueber.php'><input type='submit' value='" . $locale['gsc320'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_impressum.php'><input type='submit' value='" . $locale['gsc165'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_disclaimer.php'><input type='submit' value='" . $locale['gsc167'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_agb.php'><input type='submit' value='" . $locale['gsc168'] . "'></a>
<a href='" . INFUSIONS . "gs_contactform/gsc_links.php" . $aidlink."'><input type='submit' value='Links'></a>
<a href='" . INFUSIONS . "gs_contactform/credits.php'><input type='submit' value='" . $locale['gsc169'] . "'></a></center></td>
</tr>
</table>";

?>
