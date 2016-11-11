<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */
namespace roboapp\news\models;

use roboapp\news\Module;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * Page ActiveRecord model
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $delete_at
 *
 * @author iRipVanWinkle <iripvanwinkle@gmail.com>
 */
class News extends ActiveRecord
{
    /** @inheritdoc */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /** @inheritdoc */
    public function rules()
    {
        return [
            // Required
            [['slug', 'title'], 'required'],
            // Unique
            ['slug', 'unique'],
            // String
            ['slug', 'string', 'max' => 127],
            [['title', 'image'], 'string', 'max' => 256],
            [['content', 'description'], 'string']
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'slug' => Module::t('Slug'),
            'title' => Module::t('Title'),
            'description' => Module::t('Description'),
            'content' => Module::t('Content'),
            'image' => Module::t('Image'),
            'status' => Module::t('Status'),
            'created_at' => Module::t('Create'),
            'updated_at' => Module::t('Update'),
            'deleted_at' => Module::t('Delete'),
        ];
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
            ]
        ];
    }

    /**
     * Search model
     *
     * @return ActiveDataProvider
     */
    public function search()
    {
        return new ActiveDataProvider([
            'query' => static::find()
        ]);
    }
}
