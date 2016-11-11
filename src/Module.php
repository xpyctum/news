<?php
/**
 * @link https://github.com/roboapp
 * @copyright Copyright (c) 2016 Roboapp
 * @license [MIT License](https://opensource.org/licenses/MIT)
 */

namespace roboapp\news;

use roboapp\fileloader\FileLoader;
use roboapp\redactor\Redactor;
use yii\base\InvalidConfigException;
use yii\base\Module as BaseModule;

/**
 * This is the main module class for the roboapp/page.
 *
 * @method string getIcon()
 *
 * @author iRipVanWinkle <iripvanwinkle@gmail.com>
 */
class Module extends BaseModule
{
    /** @var string */
    public static $moduleName = 'news';

    /** @var string */
    public $defaultRoute = 'admin';

    /** @var string The module icon in admin panel */
    public $icon = 'align-justify';

    /** @var string The module title in admin panel */
    public $title = 'News';

    /** @var array Model map */
    public $modelMap = [];

    /**
     * @var array Setting redactor
     *
     * 'clientOptions' => [
     *    'minHeight' => 400,
     *    'imageUpload' => Url::to(['storage/file/upload']),
     *    'plugins' => ['fullscreen']
     * ]
     */
    public $redactorOptions = [];

    /**
     * @var array Setting redactor
     *
     * 'clientOptions' => [
     *    'uploadUrl' => Url::to('storage/file/upload'),
     *
     * ]
     */
    public $imageLoaderOptions = [];

    /** @inheritdoc */
    public function init()
    {
        parent::init();

        if (!array_key_exists('uploadUrl', $this->imageLoaderOptions)) {
            $message = "The 'imageLoaderOptions' property must contain 'uploadUrl' property.";
            throw new InvalidConfigException($message, 500);
        }

        \Yii::$container->set(Redactor::class, $this->redactorOptions);
        \Yii::$container->set(FileLoader::class, $this->imageLoaderOptions);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return static::t($this->title);
    }

    /**
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($message, $params = [], $language = null)
    {
        return \Yii::t(static::$moduleName, $message, $params, $language);
    }
}
