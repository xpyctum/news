<?php
namespace tests\codeception\Helper;

use Codeception\Module;
use Yii;
use yii\base\InvalidConfigException;
use yii\console\controllers\MigrateController;
use yii\di\Container;

class Migration extends Module
{

    /**
     * @var array|string the application configuration that will be used for creating an application instance for each test.
     * You can use a string to represent the file path or path alias of a configuration file.
     * The application configuration array may contain an optional `class` element which specifies the class
     * name of the application instance to be created. By default, a [[\yii\web\Application]] instance will be created.
     */
    public $appConfig = __DIR__ . '/../../_config/migration.php';

    /** @inheritdoc */
    public function _beforeSuite($settings = [])
    {
        $needDestroyApplication = !\Yii::$app;

        $this->mockApplication();

        $migrateController = new MigrateController('migrate', \Yii::$app);
        $migrateController->migrationPath = '@src/migrations';
        $migrateController->runAction('up', ['interactive' => 0]);

        if ($needDestroyApplication) {
            $this->destroyApplication();
        }
    }

    /** @inheritdoc */
    public function _afterSuite($settings = [])
    {
        $needDestroyApplication = !\Yii::$app;

        $this->mockApplication();

        $migrateController = new MigrateController('migrate', \Yii::$app);
        $migrateController->migrationPath = '@src/migrations';
        $migrateController->runAction('down', ['interactive' => 0]);

        if ($needDestroyApplication) {
            $this->destroyApplication();
        }
    }

    /**
     * Mocks up the application instance.
     * @return \yii\web\Application|\yii\console\Application the application instance
     * @throws InvalidConfigException if the application configuration is invalid
     */
    protected function mockApplication()
    {
        if (isset(Yii::$app)) {
            return;
        }
        Yii::$container = new Container();
        $config = $this->appConfig;
        if (is_string($config)) {
            $configFile = Yii::getAlias($config);
            if (!is_file($configFile)) {
                throw new InvalidConfigException("The application configuration file does not exist: $config");
            }
            $config = require($configFile);
        }
        if (is_array($config)) {
            if (!isset($config['class'])) {
                $config['class'] = 'yii\web\Application';
            }
            return Yii::createObject($config);
        } else {
            throw new InvalidConfigException('Please provide a configuration array to mock up an application.');
        }
    }

    /**
     * Destroys the application instance created by [[mockApplication]].
     */
    protected function destroyApplication()
    {
        if (\Yii::$app) {
            if (\Yii::$app->has('session', true)) {
                \Yii::$app->session->close();
            }
            if (\Yii::$app->has('db', true)) {
                Yii::$app->db->close();
            }
        }
        Yii::$app = null;
        Yii::$container = new Container();
    }
}
