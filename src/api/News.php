<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */
namespace roboapp\news\api;

use roboapp\news\models\News as NewsModel;
use yii\base\Object;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

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
     * Get all news
     *
     * @param array|\yii\data\Pagination|null $pagination
     * @param array|\yii\data\Sort|null $sort
     * @param array $where
     * @return NewsObject[]
     * @internal param string $slug
     */
    public static function all($pagination = null, $sort = null, $where = [])
    {
        $items = [];
        $query = NewsModel::find();

        if (!empty($where)) {
            $query->andFilterWhere($where);
        }

        $adp = new ActiveDataProvider([
            'query' => $query,
            'sort' => $sort ?: [],
            'pagination' => $pagination ?: []
        ]);

        foreach ($adp->getModels() as $model) {
            $items[] = new NewsObject($model);
        }

        return $items;
    }

    /**
     * Get last news
     *
     * @param array|\yii\data\Pagination|null $pagination
     * @param array $where
     * @return NewsObject[]
     */
    public static function last($pagination = null, $where = [])
    {
        $sort = new Sort([
            'attributeOrders' => [
                'created_at' => SORT_DESC
            ]
        ]);

        return static::all($pagination, $sort, $where);
    }

    /**
     * Get news by slug
     * @param $slug string
     * @return null|NewsObject
     */
    public static function get($slug)
    {
        if (!array_key_exists($slug, self::getInstance()->newsCache)) {
            self::getInstance()->newsCache[$slug] = self::getInstance()->findNews($slug);
        }

        return self::getInstance()->newsCache[$slug];
    }

    /**
     * Check existence the news by slug
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
    protected function findNews($slug)
    {
        /**
         * @var $modelQuery \yii\db\ActiveQuery
         * @var $news NewsModel
         */
        $modelQuery = forward_static_call([\Yii::createObject(NewsModel::class), 'find']);
        $news = $modelQuery->where(['slug' => $slug])->one();

        return $news ? new NewsObject($news) : null;
    }
}
