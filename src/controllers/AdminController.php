<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */
namespace roboapp\news\controllers;

use roboapp\crud\Create;
use roboapp\crud\Delete;
use roboapp\crud\Index;
use roboapp\crud\Update;
use roboapp\news\models\News;
use roboapp\news\Module;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Allows you to administrate pages.
 *
 * @author iRipVanWinkle <iripvanwinkle@gmail.com>
 */
class AdminController extends Controller
{
    /** @inheritdoc */
    public function actions()
    {
        return [
            'index' => [
                'class' => Index::class,
                'searchModel' => News::class,
                'nameVariableDataProvider' => 'data'
            ],
            'create' => [
                'class' => Create::class,
                'newModel' => News::class,
                'successMessage' => Module::t('New is create.'),
                'redirectTo' => function (News $model) {
                    return Url::to(['edit', 'id' => $model->id]);
                }
            ],
            'edit' => [
                'class' => Update::class,
                'findModel' => [$this, 'findModel'],
                'view' => 'edit',
                'successMessage' => Module::t('New saved.')
            ],
            'delete' => [
                'class' => Delete::class,
                'findModel' => [$this, 'findModel'],
                'successMessage' => Module::t('Page deleted.'),
                'redirectTo' => ['index']
            ]
        ];
    }

    /**
     * @param int|null $id
     * @return News
     */
    public function findModel($id = null)
    {
        $model = \Yii::createObject(News::class);
        return $id !== null ? forward_static_call([$model, 'findOne'], $id) : $model;
    }
}
