<?php
namespace tests\codeception;

use roboapp\news\models\News;
use tests\codeception\_fixtures\NewsFixture;

class createCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'news' => NewsFixture::class
        ]);
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function createWithEmptySlugTest(FunctionalTester $I)
    {
        $I->amOnPage(['news/admin/create']);

        $I->submitForm('form', $this->formParams('', '', ''));
        $I->see('Slug cannot be blank.', '.help-block');
        $I->see('Title cannot be blank.', '.help-block');
    }

    public function createWithAlreadyUsedSlugTest(FunctionalTester $I)
    {
        /** @var News $about */
        $about = $I->grabFixture('news')->getModel('ut_enim_ad_minim_veniam');

        $I->amOnPage(['news/admin/create']);

        $I->submitForm('form', $this->formParams($about->slug, $about->title, $about->description));
        $I->see('Slug "ut_enim_ad_minim_veniam" has already been taken.', '.help-block');
    }

    public function createTest(FunctionalTester $I)
    {
        $I->amOnPage(['news/admin/create']);

        $I->submitForm('form', $this->formParams(
            'duis_aute_irure_dolor',
            'Duis aute irure dolor',
            'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'
        ));

        $I->seeInField('News[slug]', 'duis_aute_irure_dolor');
        $I->seeInField('News[title]', 'Duis aute irure dolor');
        $I->seeInField('News[description]', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');
    }

    private function formParams($slug, $title, $description)
    {
        return [
            'News[slug]' => $slug,
            'News[title]' => $title,
            'News[description]' => $description,
        ];
    }
}
