<?
    if($arResult['NEWS_CANON']['PROPERTY_NEWS_CANON_VALUE'] == $arResult['ID']){
        $APPLICATION->SetPageProperty('canonical' , $arResult['NEWS_CANON']['NAME']);
    }
?>