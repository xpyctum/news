<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

/* @var $this yii\web\View */
/* @var $model roboapp\news\models\News */

use roboapp\fileloader\FileLoader;
use roboapp\news\Module;
use roboapp\redactor\Redactor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'options' => ['class' => 'model-form']
]); ?>

<?= $form->field($model, 'title') ?>
<?= $form->field($model, 'description')->textarea() ?>
<?= $form->field($model, 'content')->widget(Redactor::class) ?>
<?= $form->field($model, 'image')->widget(FileLoader::class) ?>
<?= $form->field($model, 'slug') ?>
<?php /* TODO: improve status */ ?>

<?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end();
