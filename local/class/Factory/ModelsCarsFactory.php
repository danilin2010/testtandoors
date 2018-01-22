<?php
namespace Factory;

use Entity\ModelsCars;
/**
 * Class ModelsCarsFactory
 * @package Factory
 */
class ModelsCarsFactory
{
    /**
     * @param array $params
     * @return ModelsCars
     */
    public static function createFromArray(array $params)
    {
        $ModelsCars = new ModelsCars();
        if($params['ID'])
            $ModelsCars->setId((int)$params['ID']);
        if($params['NAME'])
            $ModelsCars->setName(trim($params['NAME']));
        if($params['PROPERTY_MARK_VALUE'])
            $ModelsCars->setMark(trim($params['PROPERTY_MARK_VALUE']));
        if($params['PROPERTY_MODEL_VALUE'])
            $ModelsCars->setModel(trim($params['PROPERTY_MODEL_VALUE']));
        if($params['PROPERTY_PHOTO_VALUE'])
            $ModelsCars->setPhoto((int)$params['PROPERTY_PHOTO_VALUE']);
        if($params['IBLOCK_SECTION_ID'])
            $ModelsCars->setSection((int)$params['IBLOCK_SECTION_ID']);
        return $ModelsCars;
    }
    /**
     * @param array $records
     * @return ModelsCars[]
     */
    public static function createFromCollection(array $records)
    {
        $output = [];
        array_map(function ($item) use (&$output) {
            $output[] = self::createFromArray($item);
        }, $records);
        return $output;
    }
}