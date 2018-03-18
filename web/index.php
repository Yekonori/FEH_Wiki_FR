<?php 

require_once __DIR__ . '/../app.php';

if( $uri == '/' ){
	index();
}else {
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Cette page n\'existe pas</h1></body></html>';
}