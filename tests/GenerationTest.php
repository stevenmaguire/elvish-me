<?php

class GenerationTest extends TestCase {

    /**
     * @return void
     */
    public function test_default_count_of_items_is_returned_when_no_count_provided()
    {
        $type = 'paragraph';
        $count = 5;
        $crawler = $this->client->request('GET', '/'.$type);

        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertViewHas('types');
        $this->assertViewHas('type', $type);
        $this->assertCount($count, $crawler->filter('blockquote>p'));
    }

    /**
     * @return void
     */
    public function test_expected_count_of_items_is_returned_when_count_provided()
    {
        $type = 'paragraph';
        $count = 7;
        $crawler = $this->client->request('GET', '/'.$type.'/'.$count);

        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertViewHas('types');
        $this->assertViewHas('type', $type);
        $this->assertCount($count, $crawler->filter('blockquote>p'));
    }

}
