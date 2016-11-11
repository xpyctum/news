<?php
namespace tests\codeception;

use tests\codeception\_fixtures\NewsFixture;

class editCest
{

    /** @var \roboapp\news\models\News */
    private $controlNews;

    public function _before(FunctionalTester $I)
    {
        $I->haveFixtures([
            'news' => NewsFixture::class
        ]);

        $this->controlNews = $I->grabFixture('news')->getModel('ut_enim_ad_minim_veniam');
    }

    // tests
    public function editWithEmptySlugTest(FunctionalTester $I)
    {
        $I->amOnPage(['news/admin/edit', 'id' => $this->controlNews->id]);

        $I->submitForm('form', $this->formParams('', '', ''));
        $I->see('Slug cannot be blank.', '.help-block');
        $I->see('Title cannot be blank.', '.help-block');
    }

    public function editWithAlreadyUsedSlugTest(FunctionalTester $I)
    {
        /** @var $news \roboapp\news\models\News */
        $news = $I->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');
        $I->amOnPage(['news/admin/edit', 'id' => $this->controlNews->id]);

        $I->submitForm('form', $this->formParams($news->slug, $news->title, $news->description));
        $I->see('Slug "' . $news->slug . '" has already been taken.', '.help-block');
    }

    public function editTest(FunctionalTester $I)
    {
        $I->amOnPage(['news/admin/edit', 'id' => $this->controlNews->id]);

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
