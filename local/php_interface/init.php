<?
var_dump($_SERVER['DOCUMENT_ROOT']);
if(file_exists($_SERVER['DOCUMENT_ROOT']. '/local/php_interface/include/events.php')){
    require_once($_SERVER['DOCUMENT_ROOT']. '/local/php_interface/include/events.php');
}
?>