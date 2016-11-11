<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

/* @var $this yii\web\View */
/* @var $context yii\base\Controller */

use roboapp\news\Module;
use yii\helpers\Url;

$context = $this->context;

$action = $context->action->id;
$module = $context->module->id;
?>
<ul class="nav nav-pills">
    <li <?= ($action === 'index') ? 'class="active"' : '' ?>>
        <a href="<?= Url::to(['/admin/' . $module]) ?>">
            <?php if ($action === 'edit') : ?>
                <i class="glyphicon glyphicon-chevron-left font-12"></i>
            <?php endif; ?>
            <?= Module::t('List') ?>
        </a>
    </li>
    <li <?= ($action === 'create') ? 'class="active"' : '' ?>>
        <a href="<?= Url::to(['/admin/' . $module . '/admin/create']) ?>"><?= Module::t('Create') ?></a>
    </li>
</ul>
<br/>