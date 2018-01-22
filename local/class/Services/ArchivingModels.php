<?php
namespace Services;

use Repository\ModelsCarsRepository;
use Repository\ModelsCarsArchiveRepository;
use Entity\Section;
use Entity\SectionArchive;
use Entity\ModelsCars;

class ArchivingModels
{

    protected $sectionid;

    public function __construct($sectionid)
    {
        $this->sectionid=$sectionid;
    }

    public function SetArchived()
    {
        $ModelsCarsRepository=new ModelsCarsRepository();
        $ModelsCarsArchiveRepository=new ModelsCarsArchiveRepository();
        $Section=$ModelsCarsRepository->getSection($this->sectionid);
        if($Section->isArchiven())
        {
            $Elements=$ModelsCarsRepository->GetList($this->sectionid);

            $SectionArchive=new SectionArchive();
            $SectionArchive->setName($Section->getName()." (".date('Y-m-d H:i:s').")");
            $id=$ModelsCarsArchiveRepository->addSection($SectionArchive);
            if($id>0){
                foreach ($Elements as $el)
                {
                    $Model = new ModelsCars();
                    $Model->setName($el->getName()." архивная копия от ".date('Y-m-d'));
                    $Model->setModel($el->getModel());
                    $Model->setMark($el->getMark());
                    $Model->setPhoto($el->getPhoto());
                    $Model->setSection($id);
                    $ModelsCarsArchiveRepository->add($Model);
                }
            }
        }
    }
}