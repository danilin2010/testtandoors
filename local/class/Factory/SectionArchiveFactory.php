<?php
namespace Factory;

use Entity\SectionArchive;
/**
 * Class SectionFactoryArchive
 * @package Factory
 */
class SectionArchiveFactory
{
    /**
     * @param array $params
     * @return SectionArchive
     */
    public static function createFromArray(array $params)
    {
        $Section = new SectionArchive();
        if($params['ID'])
            $Section->setId((int)$params['ID']);
        if($params['NAME'])
            $Section->setName(trim($params['NAME']));
        return $Section;
    }
    /**
     * @param array $records
     * @return SectionArchive[]
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