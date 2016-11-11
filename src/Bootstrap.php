<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

namespace roboapp\news;


use roboapp\news\models\News;
use yii\base\BootstrapInterface;
use yii\i18n\PhpMessageSource;

/**
 * News module bootstrap class.
 *
 * @author iRipVanWinkle <iripvanwinkle@gmail.com>
 */
class Bootstrap implements BootstrapInterface
{
    /** @var array Model's map */
    public $modelClass = News::class;

    /** @inheritdoc */
    public function bootstrap($app)
    {
        if (!\Yii::$container->has(News::class)) {
            \Yii::$container->set(News::class, $this->modelClass);
        }

        if (!isset($app->get('i18n')->translations[Module::$moduleName . '*'])) {
            $app->get('i18n')->translations[Module::$moduleName . '*'] = [
                'class' => PhpMessageSource::class,
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}
