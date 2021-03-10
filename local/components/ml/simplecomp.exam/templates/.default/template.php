<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<!--<pre>--><?//var_dump($arResult)?><!--</pre>-->
<p><b><?='Авторы и новости'?></b></p>
<ul>
    <?foreach($arResult['USERS'] as $userKey => $userVal):?>
        <li><?= '[' . $userKey . ']'. ' - ' . $userVal['NAME'];?>
            <ul>
                <?foreach($userVal['NEWS'] as $newsElem):?>
                    <li>
                        <?= ' - ' . $arResult['NEWS'][$newsElem]['NEWS_NAME']?>
                    </li>
                <?endforeach;?>
            </ul>
        </li>
    <?endforeach;?>
</ul>
