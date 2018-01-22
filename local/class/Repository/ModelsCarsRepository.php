<?
namespace Repository;

use Factory\SectionFactory;

/**
* Репозиторий Модели авто
*/
class ModelsCarsRepository extends IblockRepository
{
    public function __construct()
    {
        parent::__construct();
        $this->iblockid=IBLOCK_MODELS_CARS;
    }

    public function getObjSection ($array)
    {
        return SectionFactory::createFromArray($array);
    }

}