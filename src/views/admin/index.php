<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

/* @var $this yii\web\View */
/* @var $data yii\data\ActiveDataProvider */
/* @var $context roboapp\news\controllers\AdminController */
/* @var $module roboapp\news\Module */

use roboapp\news\Module;
use yii\helpers\Url;

$context = $this->context;
$module = $context->module;

$this->title = $module->getTitle();
?>

<?= $this->render('_menu') ?>

<?php if ($data->count > 0) : ?>
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="50">#</th>
            <th><?= Module::t('Title') ?></th>
            <th><?= Module::t('Slug') ?></th>
            <th width="30"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data->models as $item) : ?>
            <tr>
                <td>
                    <?= $item->primaryKey ?>
                </td>
                <td>
                    <a href="<?= Url::to(['/admin/' . $module->id . '/admin/edit', 'id' => $item->primaryKey]) ?>">
                        <?= $item->title ?>
                    </a>
                </td>
                <td>
                    <?= $item->slug ?>
                </td>
                <td>
                    <a href="<?= Url::to(['/admin/' . $module->id . '/admin/delete', 'id' => $item->primaryKey]) ?>"
                       class="glyphicon glyphicon-remove confirm-delete"
                       title="<?= Module::t('Delete item') ?>"></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination
    ]) ?>
<?php else : ?>
    <p><?= Module::t('No records found') ?></p>
<?php endif; ?>