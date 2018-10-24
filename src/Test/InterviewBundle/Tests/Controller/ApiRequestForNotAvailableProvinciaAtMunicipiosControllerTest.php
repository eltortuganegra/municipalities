<?php

namespace Test\InterviewBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiRequestForNotAvailableProvinciaAtMunicipiosControllerTest extends WebTestCase
{
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testItShouldReturn404HttpCodeWhenUsersRequestForBerlin()
    {
        // Arrange
        $this->client->request('GET', '/api/municipios/Berlin');

        // Act
        $requestStatusCode = $this->client->getResponse()->getStatusCode();

        // Assert
        $this->assertEquals(404, $requestStatusCode);
    }



}