<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

/* @var $model roboapp\news\models\News */

use roboapp\news\Module;

$this->title = Module::t('Edit news');
?>
<?= $this->render('_menu') ?>
<?= $this->render('_form', ['model' => $model]);
