<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"PARAMETERS" => array(
		"NEWS_IBLOCK_ID" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_CAT_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
        "CODE_IBLOCK_AUTHOR" => array(
			"NAME" => GetMessage("CODE_IBLOCK_AUTHOR_MESS"),
			"TYPE" => "STRING",
		),
        "USER_PROP_CODE" => array(
			"NAME" => GetMessage("USER_PROP_CODE_MESS"),
			"TYPE" => "STRING",
		),
        "CACHE_TIME"  =>  Array("DEFAULT"=>36000000),
    ),
);