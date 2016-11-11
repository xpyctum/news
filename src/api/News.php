<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */
namespace roboapp\news\api;

use roboapp\news\models\News as NewsModel;
use yii\base\Object;

/**
 * Class News API
 *
 * @author iRipVanWinkle <iripvanwinkle@gmail.com>
 */
class News extends Object
{
    /** @var static */
    private static $instance;

    protected $newsCache = [];

    /**
     * @return static
     */
    protected static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Get page by slug
     *
     * @return NewsObject[]
     * @internal param string $slug
     */
    public static function all()
    {

    }

    /**
     * Get page by slug
     * @param $slug string
     * @return null|NewsObject
     */
    public static function get($slug)
    {
        if (!array_key_exists($slug, self::getInstance()->newsCache)) {
            self::getInstance()->newsCache[$slug] = self::getInstance()->findPage($slug);
        }

        return self::getInstance()->newsCache[$slug];
    }

    /**
     * Check existence the page by slug
     * @param $slug string
     * @return bool
     */
    public static function has($slug)
    {
        return self::get($slug) !== null;
    }

    /**
     * @param $slug string
     * @return null|NewsObject
     */
    protected function findPage($slug)
    {
        /**
         * @var $modelQuery \yii\db\ActiveQuery
         * @var $page NewsModel
         */
        $modelQuery = forward_static_call([\Yii::createObject(NewsModel::class), 'find']);
        $page = $modelQuery->where(['slug' => $slug])->one();

        return $page ? new NewsObject($page) : null;
    }
}
