<?php
namespace Factory;

use Entity\Section;
/**
 * Class SectionFactory
 * @package Factory
 */
class SectionFactory
{
    /**
     * @param array $params
     * @return Section
     */
    public static function createFromArray(array $params)
    {
        $Section = new Section();
        if($params['ID'])
            $Section->setId((int)$params['ID']);
        if($params['NAME'])
            $Section->setName(trim($params['NAME']));
        if($params['UF_ARCHIVE'])
            $Section->setArchiven((bool)$params['UF_ARCHIVE']);
        return $Section;
    }
    /**
     * @param array $records
     * @return Section[]
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