<?
namespace Repository;

use Factory\SectionArchiveFactory;

/**
* Репозиторий Модели авто
*/
class ModelsCarsArchiveRepository extends IblockRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockid=IBLOCK_MODELS_CARS_ARCHIVE;
    }

    public function getObjSection ($array)
    {
        return SectionArchiveFactory::createFromArray($array);
    }

}