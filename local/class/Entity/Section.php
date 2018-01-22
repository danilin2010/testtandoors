<?php
namespace Entity;

/**
 * Class Section
 * @package Entity\Section
 */
class Section
{

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var bool $archive
     */
    private $archive;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isArchiven()
    {
        return $this->archive;
    }

    /**
     * @param bool $archive
     */
    public function setArchiven($archive)
    {
        $this->archive = $archive;
    }

}