<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"ml:simplecomp.exam", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"NEWS_IBLOCK_ID" => "1",
		"CODE_IBLOCK_AUTHOR" => "NEWS_AUTHOR",
		"USER_PROP_CODE" => "UF_AUTHOR_TYPE"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>