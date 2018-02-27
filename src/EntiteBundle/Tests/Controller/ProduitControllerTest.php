<?php

namespace EntiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProduitControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/produit/ajouter');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/produit/supprimer');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/produit/modifier');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/produit/list');
    }

}
