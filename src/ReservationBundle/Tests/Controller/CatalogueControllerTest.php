<?php

namespace ReservationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CatalogueControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/catalogue/ajouter');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/catalogue/supprimer');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/catalogue/modifier');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/catalogue/list');
    }

}
