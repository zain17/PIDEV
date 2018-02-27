<?php

namespace ProfilBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilisateurControllerTest extends WebTestCase
{
    public function testAjouter()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/utilisateur/ajouter');
    }

    public function testSupprimer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/utilisateur/supprimer');
    }

    public function testModifier()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/utilisateur/modifier');
    }

    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/utilisateur/list');
    }

}
