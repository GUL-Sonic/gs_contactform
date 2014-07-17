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
   
add_to_head("<script type='text/javascript'>
    function gsc_ask_first(link){
        return window.confirm('" . $locale['gsc144'] . "');
    }
</script>");

add_to_head("<link rel='stylesheet' href='" . INFUSIONS . "gs_contactform/css/gsc.css' type='text/css'/>\n");

?>