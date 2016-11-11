<?php
namespace tests\codeception\_fixtures;

use yii\test\ActiveFixture;

class NewsFixture extends ActiveFixture
{
    public $modelClass = 'roboapp\news\models\News';

    protected function getData()
    {
        return [
            'lorem_ipsum_dolor_sit_amet' => [
                'slug' => 'lorem_ipsum_dolor_sit_amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'created_at' => time(),
                'updated_at' => time(),
            ],
            'ut_enim_ad_minim_veniam' => [
                'slug' => 'ut_enim_ad_minim_veniam',
                'title' => 'Ut enim ad minim veniam',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.​',
                'created_at' => time(),
                'updated_at' => time()
            ],
        ];
    }
}
