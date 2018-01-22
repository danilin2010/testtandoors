<?
namespace Repository;

use \Bitrix\Main\Loader;
use \Factory\ModelsCarsFactory;
use Entity\ModelsCars;

/**
* Базовый класс репозитория инфоблоков
*/
abstract class IblockRepository
{
    protected $iblockid;

    public function __construct()
    {
        Loader::includeModule('iblock');
    }

    public function getSection($id)
    {
        $arFilter = Array('IBLOCK_ID'=>$this->iblockid,'ID'=>$id);
        $db_list = \CIBlockSection::GetList(Array("SORT"=>"ASC"),$arFilter, false,array("ID","NAME","UF_ARCHIVE"));
        if($ar_result = $db_list->GetNext())
            return $this->getObjSection($ar_result);
    }

    public function addSection($obj)
    {
        $bs = new \CIBlockSection;
        $arFields = $this->getParamSection ($obj);
        $ID = $bs->Add($arFields);
        return $ID;
    }

    public function getParamSection ($obj)
    {
        return Array(
            "ACTIVE" => "Y",
            "IBLOCK_ID" => $this->iblockid,
            "NAME" => $obj->GetName(),
        );
    }

    public function GetList($SectionId)
    {
        $result=array();
        $arFilter = array(
            "IBLOCK_ID" => $this->iblockid,
            "SECTION_ID" => $SectionId,
        );
        $arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID", "PROPERTY_MARK", "PROPERTY_MODEL", "PROPERTY_PHOTO");
        $res = \CIBlockElement::GetList(Array(), $arFilter, false,false, $arSelect);
        while($ob = $res->GetNext())
            $result[]=$ob;
        return ModelsCarsFactory::createFromCollection($result);
    }

    public function add(ModelsCars $obj)
    {
        $el = new \CIBlockElement;
        $PROP = array();
        $PROP["MARK"] = $obj->getMark();
        $PROP["MODEL"] = $obj->getModel();
        $PROP["PHOTO"] = \CFile::MakeFileArray($obj->getPhoto());
        $arLoadProductArray = Array(
            "IBLOCK_SECTION_ID" => $obj->getSection(),
            "IBLOCK_ID"      => $this->iblockid,
            "PROPERTY_VALUES"=> $PROP,
            "NAME"           => $obj->getName(),
            "ACTIVE"         => "Y",
        );
        $el->Add($arLoadProductArray);
    }

    abstract public function getObjSection ($ar_result);
}