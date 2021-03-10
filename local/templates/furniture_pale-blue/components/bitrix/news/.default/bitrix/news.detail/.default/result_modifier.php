<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!$canIblockID = (int) $arParams['CANONICAL_IBLOCK_ID']){
    return false;
}else{
    $arSelect = Array("ID", "NAME", 'PROPERTY_NEWS_CANON');
    $arFilter = Array("IBLOCK_ID"=>$arParams['CANONICAL_IBLOCK_ID'] , 'PROPERTY_NEWS_CANON_VALUE' => $arResult['ID']);
    $res_canon = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res_canon->GetNext()){
        $arResult['NEWS_CANON'] = $ob;
        $this->getComponent()->SetResultCacheKeys(array('NEWS_CANON'));
    }
}
