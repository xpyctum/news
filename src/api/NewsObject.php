<?php

/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */
namespace roboapp\news\api;

use roboapp\news\models\News as NewsModel;

class NewsObject
{
    /** @var NewsModel */
    protected $model;

    /**
     * Generates PageObject, attaching all settable properties to the child object
     *
     * @param NewsModel $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return NewsModel
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->getModel()->getAttribute('slug');
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getModel()->getAttribute('title');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getModel()->getAttribute('description');
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getModel()->getAttribute('content');
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->getModel()->getAttribute('image');
    }

    /**
     * @return bool
     */
    public function hasImage()
    {
        return (bool) $this->getModel()->getAttribute('image');
    }

    /**
     * @return int
     */
    public function getUpdatedTimeUTC()
    {
        return $this->getModel()->getAttribute('updated_at');
    }

    /**
     * @return int
     */
    public function getCreatedTimeUTC()
    {
        return $this->getModel()->getAttribute('created_at');
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getModel()->getAttribute('status');
    }
}
