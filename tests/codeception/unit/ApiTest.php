<?php
namespace tests\codeception;

use roboapp\news\api\News;
use tests\codeception\_fixtures\NewsFixture;
use yii\data\Pagination;

class ApiTest extends \Codeception\Test\Unit
{
    /**
     * @var \tests\codeception\UnitTester
     */
    protected $tester;

    public function _fixtures()
    {
        return ['news' => NewsFixture::class];
    }

    public function testObjectNews()
    {
        /** @var $news \roboapp\news\models\News */
        $news = $this->tester->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');

        $pageObject = News::get($news->slug);

        $this->assertEquals($news->slug, $pageObject->getSlug());
        $this->assertEquals($news->title, $pageObject->getTitle());
        $this->assertEquals($news->description, $pageObject->getDescription());
        $this->assertEquals($news->content, $pageObject->getContent());
        $this->assertEquals($news->image, $pageObject->getImage());
        $this->assertEquals($news->status, $pageObject->getStatus());
        $this->assertEquals($news->created_at, $pageObject->getCreatedTimeUTC());
        $this->assertEquals($news->updated_at, $pageObject->getUpdatedTimeUTC());

        $this->assertEquals($news, $pageObject->getModel());
    }

    public function testHasNews()
    {
        /** @var $news \roboapp\news\models\News */
        $news = $this->tester->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');
        $this->assertTrue(News::has($news->slug));
    }

    public function testAllNews()
    {
        /** @var $news \roboapp\news\models\News */
        $news = $this->tester->grabFixture('news')->getModel('lorem_ipsum_dolor_sit_amet');

        $allNews = News::all();
        $allNewsByCondition = News::all(null, null, ['title' => $news->title]);
        $allNewsByPagination = News::all(new Pagination(['page' => 2, 'pageSize' => 1]));

        $this->assertEquals(2, count($allNews));
        $this->assertEquals(1, count($allNewsByCondition));
        $this->assertEquals('ut_enim_ad_minim_veniam', $allNewsByPagination[0]->getSlug());
    }

    public function testLastNews()
    {
        $lastNews = News::last();

        $this->assertEquals('ut_enim_ad_minim_veniam', $lastNews[0]->getSlug());
    }

    public function testNotExistsPage()
    {
        $this->assertFalse(News::has('slug-not-exists'));
    }
}
