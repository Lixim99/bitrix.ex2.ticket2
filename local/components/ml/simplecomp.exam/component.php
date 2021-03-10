<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

if(!Loader::includeModule("iblock"))
{
	ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
	return;
}

if(!$userAdditProperty = trim($arParams['USER_PROP_CODE'])) return false;
if(!$IbProperty = trim($arParams['CODE_IBLOCK_AUTHOR'])) return false;
if(!$newsIbID = (int) $arParams['NEWS_IBLOCK_ID']) return false;

GLOBAL $USER;

if(!$USER->GetID()){
    return false;
}

if($this->startResultCache(false,$USER->GetID())) {

    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();

    // user
    $arOrderUser = array("id");
    $sortOrder = "asc";
    $arFilterUser = array(
        "ACTIVE" => "Y",
        "!ID" => $USER->GetID(),
        $userAdditProperty => $arUser[$userAdditProperty],
    );
    $arUsers = array();
    $rsUsers = CUser::GetList($arOrderUser, $sortOrder, $arFilterUser, array('SELECT' => array($userAdditProperty)));
    while ($arUserUn = $rsUsers->Fetch()) {
        $arUsers[$arUserUn['ID']] = array(
            'NAME' => $arUserUn['LOGIN'],
            'NEWS' => array(),
        );
    }



    //iblock elements
    $arSelectElems = array(
        "ID",
        "IBLOCK_ID",
        "NAME",
        "DATE_ACTIVE_FROM",
        "PROPERTY_" . $IbProperty,
        "IBLOCK_ID",
    );
    $arFilterElems = array(
        "IBLOCK_ID" => $newsIbID,
        "ACTIVE" => "Y",
        'PROPERTY_'.$IbProperty => array_keys($arUsers),
        '!PROPERTY_' . $IbProperty => $USER->GetID(),
    );
    $arSortElems = array(
        "NAME" => "ASC"
    );

    $arNews = array();
    $rsElements = CIBlockElement::GetList($arSortElems, $arFilterElems, false, false, $arSelectElems);
    while ($arElement = $rsElements->GetNextElement()) {
        $arNew = $arElement->GetFields();
        $arNew['PROPERTIES'] = $arElement->GetProperties();
        if(!in_array($USER->GetID(),$arNew['PROPERTIES']['NEWS_AUTHOR']['VALUE'])){
            if(!isset($arNew[$arNeW['ID']])){
                $arNews[$arNew['ID']] = array(
                    'NEWS_NAME' => $arNew['NAME'],
                    'DATE_ACTIVE_FROM' => $arNew['DATE_ACTIVE_FROM'],
                );
            }
            $arUsers[$arNew['PROPERTY_'. $IbProperty . '_VALUE']]['NEWS'][] = $arNew['ID'];
        }
    }

    $arResult['USERS'] = $arUsers;
    $arResult['NEWS'] = $arNews;
    $arResult['NEWS_COUNT'] = count($arNews);
    $arResult['IBLOCK_ID'] = $newsIbID;

    $this->SetResultCacheKeys(array("NEWS_COUNT","IBLOCK_ID"));
    $this->includeComponentTemplate();
}

$res = CIBlock::GetByID($arResult['IBLOCK_ID']);
$ar_res = $res->GetNext();
$this->AddIncludeAreaIcon(
    array(
        'URL'   => '/bitrix/admin/iblock_element_admin.php?IBLOCK_ID=' . $arResult['IBLOCK_ID'] . '&type='. $ar_res['IBLOCK_TYPE_ID'] .'&lang=ru&find_el_y=Y&clear_filter=Y&apply_filter=Y',
        'TITLE' => getMessage('DB_IN_ADMIN'),
        "IN_PARAMS_MENU" => true
    )
);

$APPLICATION->SetPageProperty('h1', getMessage('NEWS_H1') .  $arResult['NEWS_COUNT']);
$APPLICATION->SetPageProperty('title', getMessage('NEWS_TITLE') . $arResult['NEWS_COUNT']);
?>