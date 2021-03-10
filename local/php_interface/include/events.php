<?
AddEventHandler("main", "OnBuildGlobalMenu", "OnBuildGlobalHandler");
function OnBuildGlobalHandler(&$aGlobalMenu, &$aModuleMenu)
{
    global $USER;
    if(in_array(5,$USER->GetUserGroupArray())) {
        foreach ($aGlobalMenu as $k => $v) {
            if ($k != 'global_menu_content') unset($aGlobalMenu[$k]);
        }
        foreach ($aModuleMenu as $k => $v) {
            if ($v['items_id'] != 'menu_iblock_/news') unset($aModuleMenu[$k]);
        }
    }
}
