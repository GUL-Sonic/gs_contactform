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
<table border='0' style='vertical-align: top; margin: 0px auto;' width='500px'>
<tr>
<td><a href='" . INFUSIONS . "gs_contactform/gsc_settings_panel.php" . $aidlink."'><input type='submit' value='" . $locale['gsc161'] . "'></a</td>
<td><a href='" . INFUSIONS . "gs_contactform/gsc_fields.php'><input type='submit' value='" . $locale['gsc162'] . "'></a</td>
<td><a href='" . INFUSIONS . "gs_contactform/gsc_cats.php'><input type='submit' value='" . $locale['gsc163'] . "'></a</td>
<td><a href='" . INFUSIONS . "gs_contactform/gsc_messages.php'><input type='submit' value='" . $locale['gsc164'] . "'></a</td>
</tr></table>";

?>
