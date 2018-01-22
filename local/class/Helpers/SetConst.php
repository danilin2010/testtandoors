<?php

namespace Helpers;
use Bitrix\Main\Loader;
use Bitrix\Main\Data\Cache;

class SetConst{

    public static function init()
    {
        self::IblockConst();
    }

    private static function IblockConst(){
        /**
         * Определение констант кодов инфоблоков
         * Правило определения: все небуквенные символы заменяются на "_", получившаяся строка переводится в верхний регистр.
         */
        $cache = Cache::createInstance();
        $cacheTime = 30*60;
        $cacheId = 'IblockConst';
        $cacheDir = 'const';
        $arResult = array();
        if ($cache->initCache($cacheTime, $cacheId, $cacheDir)) {
            $arResult = $cache->getVars();
        } elseif ($cache->startDataCache()) {
            if (Loader::includeModule('iblock'))
            {
                $cIBlock = \CIBlock::GetList();
                while($items = $cIBlock->Fetch())
                {
                    $code = "iblock_".trim($items['CODE']);
                    $id = (int) $items['ID'];
                    $arResult[$id]=$code;
                }
            }
            $cache->endDataCache($arResult);
        }
        foreach ($arResult as $id=>$code)
            self::initConst($id,$code);
    }

    private static function initConst($id,$code)
    {
        if (!empty($code))
        {
            $const = preg_replace('/\W/', '_', $code);
            $const = mb_convert_case($const, MB_CASE_UPPER);
            if (!defined($const))
                define($const, $id);
        }
    }

}