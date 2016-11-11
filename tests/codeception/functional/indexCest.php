<?php
namespace tests\codeception;

use tests\codeception\_fixtures\NewsFixture;

class indexCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'news' => NewsFixture::class
        ]);
    }

    // tests
    public function indexNewsTest(FunctionalTester $I)
    {
        $news1 = $I->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');
        $news2 = $I->grabFixture('news')->getModel('ut_enim_ad_minim_veniam');

        $I->amOnPage(['news/admin/index']);

        $I->see($news1->title);
        $I->see($news2->title);
    }
}
