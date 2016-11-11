<?php
namespace tests\codeception;

use roboapp\news\api\News;
use tests\codeception\_fixtures\NewsFixture;

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

    public function testNotExistsPage()
    {
        $this->assertFalse(News::has('slug-not-exists'));
    }
}
