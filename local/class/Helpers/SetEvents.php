<?php
namespace Helpers;

use Services\ArchivingModels;

class SetEvents
{

    public static function init()
    {
        \AddEventHandler("iblock", "OnAfterIBlockSectionUpdate", Array("Helpers\SetEvents", "OnAfterIBlockSectionUpdateHandler"));
        \AddEventHandler("iblock", "OnAfterIBlockSectionAdd", Array("Helpers\SetEvents", "OnAfterIBlockSectionAddHandler"));
    }

    public static function OnAfterIBlockSectionUpdateHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"]==IBLOCK_MODELS_CARS && $arFields["RESULT"])
            self::initArchivingModels($arFields["ID"]);
    }

    function OnAfterIBlockSectionAddHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"]==IBLOCK_MODELS_CARS && $arFields["ID"]>0)
            self::initArchivingModels($arFields["ID"]);
    }

    private static function initArchivingModels($id)
    {
        $ArchivingModels=new ArchivingModels($id);
        $ArchivingModels->SetArchived();
    }

}