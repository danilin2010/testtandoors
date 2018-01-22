<?php
namespace Entity;

/**
 * Class ModelsCars
 * @package Entity\Section
 */
class ModelsCars
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
     * @var string $mark
     */
    private $mark;

    /**
     * @var string $model
     */
    private $model;

    /**
     * @var int $photo
     */
    private $photo;

    /**
     * @var int $section
     */
    private $section;

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
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @param string $mark
     */
    public function setMark($mark)
    {
        $this->mark = $mark;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param int $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return int
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param int $section
     */
    public function setSection($section)
    {
        $this->section = $section;
    }
}