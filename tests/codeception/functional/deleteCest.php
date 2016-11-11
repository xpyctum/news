<?php
namespace tests\codeception;

use roboapp\news\models\News;
use tests\codeception\_fixtures\NewsFixture;

class deleteCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'news' => NewsFixture::class
        ]);
    }

    // tests
    public function deletePageTest(FunctionalTester $I)
    {
        /**
         * @var $news1 News
         * @var $news2 News
         */
        $news1 = $I->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');
        $news2 = $I->grabFixture('news')->getModel('ut_enim_ad_minim_veniam');

        $I->amOnPage(['news/admin/delete', 'id' => $news1->id]);

        $I->dontSee($news1->title);
        $I->see($news2->title);
    }
}
