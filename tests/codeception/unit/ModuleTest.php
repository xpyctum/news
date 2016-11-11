<?php
namespace tests\codeception;

use yii\base\InvalidConfigException;

class ModuleTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\codeception\UnitTester
     */
    protected $tester;

    public function testModule()
    {
        $application = new \yii\web\Application([
            'id' => 'yii2-user-test',
            'basePath' => dirname(__DIR__),
            'bootstrap' => [
                \roboapp\news\Bootstrap::class,
            ],
            'modules' => [
                'news' => [
                    'class' => \roboapp\news\Module::class,
                    'imageLoaderOptions' => [
                        'uploadUrl' => '#'
                    ]
                ]
            ],
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'sqlite::memory:'
                ],
            ]
        ]);

        $this->assertInstanceOf(\roboapp\news\Module::class, $application->getModule('news'));
    }

    public function testInvalidConfigException()
    {
        $this->tester->expectException(InvalidConfigException::class, function () {
            $application = new \yii\web\Application([
                'id' => 'yii2-user-test',
                'basePath' => dirname(__DIR__),
                'bootstrap' => [
                    \roboapp\news\Bootstrap::class,
                ],
                'modules' => [
                    'news' => [
                        'class' => \roboapp\news\Module::class,
                        'imageLoaderOptions' => []
                    ]
                ],
                'components' => [
                    'db' => [
                        'class' => 'yii\db\Connection',
                        'dsn' => 'sqlite::memory:'
                    ],
                ]
            ]);

            $application->getModule('news');
        });
    }
}
