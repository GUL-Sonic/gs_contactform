<?php
/*--------------------------------------------------------------+
 | PHP-Fusion 7 Content Management System             			|
 +--------------------------------------------------------------+
 | Copyright © 2002 - 2014 Nick Jones                 			|
 | http://www.php-fusion.co.uk/                       			|
 +--------------------------------------------------------------+
 | Infusion: gs_contactform      	                           	|
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
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (!defined("DB_GSC_CONTACT")) {
	define("DB_GSC_CONTACT", DB_PREFIX."gsc_contact");
}
if (!defined("DB_GSC_SUBJECT")) {
	define("DB_GSC_SUBJECT", DB_PREFIX."gsc_subject");
}
if (!defined("DB_GSC_FIELDS")) {
	define("DB_GSC_FIELDS", DB_PREFIX."gsc_fields");
}
if (!defined("DB_GSC_SETTINGS")) {
	define("DB_GSC_SETTINGS", DB_PREFIX."gsc_settings");
}
?>