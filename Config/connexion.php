<?php

try {
		$access=new pdo("mysql:host=localhost;dbname=monochop; charset=utf8", "root", "");
 
        $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        // $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (Exception $e) 
{
	$e->getMessage();
}


?>