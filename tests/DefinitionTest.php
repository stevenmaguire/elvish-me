<?php

class DefinitionTest extends TestCase {

    /**
     * @return void
     */
    public function test_no_results_found_when_keyword_not_provided()
    {
        $crawler = $this->client->request('GET', '/define');

        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertViewHas('types');
        $this->assertViewHas('keyword', null);
        $this->assertViewHas('definition', null);
    }

    /**
     * @return void
     */
    public function test_no_results_found_when_non_elvish_keyword_provided()
    {
        $keyword = 'homer';
        $crawler = $this->client->request('GET', '/define/'.$keyword);

        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertViewHas('types');
        $this->assertViewHas('keyword', $keyword);
        $this->assertViewHas('definition', null);
    }

    /**
     * @return void
     */
    public function test_results_found_when_elvish_keyword_provided()
    {
        $keyword = 'Atani';
        $definition = "Quenya for 'Father-of-Man. See Adan.";
        $crawler = $this->client->request('GET', '/define/'.$keyword);

        $this->assertTrue($this->client->getResponse()->isOk());
        $this->assertViewHas('types');
        $this->assertViewHas('keyword', $keyword);
        $this->assertViewHas('definition', null);
    }

    /**
     * @return void
     */
    public function test_redirected_to_get_when_posted()
    {
        $keyword = 'homer';
        $crawler = $this->client->request('POST', '/define', ['keyword' => $keyword]);

        $this->assertRedirectedToRoute('define', ['keyword' => $keyword]);
    }

}
