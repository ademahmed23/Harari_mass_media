<?php
use PHPUnit\Framework\TestCase;
use App\Support\FeedReader;

class FeedReaderTest extends TestCase
{
    /** @test */
    public function it_can_be_created_with_valid_url()
    {
        $validUrl = 'https://www.bbc.com';
        $feedReader = new FeedReader($validUrl);
        $this->assertInstanceOf(FeedReader::class, $feedReader);
    }
}
