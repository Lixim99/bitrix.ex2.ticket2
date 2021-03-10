<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult['ITEMS'] as $item):?>
    <?if($item['PROPERTIES']['NAME_ENG']['VALUE'] && $item['PROPERTIES']['PREVIEW_ENG']['VALUE']):?>
        <p> <?=$item['DATE_ACTIVE_FROM'] .' <b>'. $item['PROPERTIES']['NAME_ENG']['VALUE']
            . '</b></br>' . $item['PROPERTIES']['PREVIEW_ENG']["VALUE"]['TEXT'] ?></p>
    <?endif;?>
<?endforeach;?>
