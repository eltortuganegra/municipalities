<?php

namespace Test\InterviewBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiRequestForAvailableProvinciaAtMunicipiosControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testItShouldReturn200HttpCodeWhenUsersRequestForTeruel()
    {
        // Arrange
        $this->client->request('GET', '/api/municipios/Teruel');

        // Act
        $requestStatusCode = $this->client->getResponse()->getStatusCode();

        // Assert
        $this->assertEquals(200, $requestStatusCode);
    }

    public function testItShouldReturnAJsonResponseWhenUsersRequestForTeruel()
    {
        // Arrange
        $this->client->request('GET', '/api/municipios/Teruel');
        $content = $this->client->getResponse()->getContent();

        // Act
        $isJson = $this->isResponseJson($content);


        // Assert
        $this->assertEquals(true, $isJson);
    }

    private function isResponseJson(string $content): bool
    {
        json_decode($content);

        return json_last_error() == JSON_ERROR_NONE;
    }

    public function testItShouldReturnAJsonResponseWithOneOrMoreElementWhenUsersRequestForTeruel()
    {
        // Arrange
        $this->client->request('GET', '/api/municipios/Teruel');
        $content = $this->client->getResponse()->getContent();
        $municipios = json_decode($content);

        // Act
        $totalMunicipios = count($municipios);

        // Assert
        $this->assertGreaterThan(0, $totalMunicipios);
    }

}