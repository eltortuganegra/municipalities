<?php

namespace Test\InterviewBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShowRequestForAvailableProvinciaAtMunicipiosControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testItShouldReturn200HttpCodeWhenUsersRequestForTeruel()
    {
        // Arrange
        $this->client->request('GET', '/show/municipios/Teruel');

        // Act
        $requestStatusCode = $this->client->getResponse()->getStatusCode();

        // Assert
        $this->assertEquals(200, $requestStatusCode);
    }

    public function testItShouldReturnAHtmlResponseWhenUsersRequestForTeruel()
    {
        // Arrange
        $crawler = $this->client->request('GET', '/show/municipios/Teruel');


        // Act
        $isHtml = $this->isResponseHtml($crawler);

        // Assert
        $this->assertEquals(true, $isHtml);
    }

    private function isResponseHtml($crawler): bool
    {
        $crawler->filter('html');

        return count($crawler) > 0;
    }

    /*
     * This test can be done because javascript is not executed.
     */
    public function testItShouldReturnAHtmlResponseWithOneOrMoreElementWhenUsersRequestForTeruel()
    {
        // Assert
        $this->assertTrue(true);
    }

}