<?php

declare(strict_types=1);

namespace App\Tests\integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterJobSeekerTest extends WebTestCase
{
    public function testSuccessFulRegistration()
    {
        $client = static::createClient();

        $router = $client->getContainer()->get('router');

        $crawler = $client->request(
            Request::METHOD_POST,
            $router->generate('job_seeker_register')
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->filter('form')->form([
            'register[firstName]' => 'John',
            'register[lastName]' => 'Doe',
            'register[email]' => 'email@email.com',
            'register[plainPassword]' => '123456'
        ]);

        $client->submit($form);
        $this->assertResponseStatusCodeSame(Response::HTTP_FOUND);
    }

    /**
     * @dataProvider getFormData
     */
    public function testBadRequest(array $formData)
    {
        $client = static::createClient();

        $router = $client->getContainer()->get('router');

        $crawler = $client->request(
            Request::METHOD_POST,
            $router->generate('job_seeker_register')
        );

        $this->assertResponseStatusCodeSame(Response::HTTP_OK);

        $form = $crawler->filter('form')->form($formData);

        $client->submit($form);
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function getFormData(): \Generator
    {
        yield [[
           'register[firstName]' => '',
           'register[lastName]' => 'Doe',
           'register[email]' => 'email@email.com',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => '',
           'register[email]' => 'email@email.com',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => 'Doe',
           'register[email]' => '',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => 'Doe',
           'register[email]' => 'email@email.com',
           'register[plainPassword]' => ''
       ]];
        yield [[
           'register[lastName]' => 'Doe',
           'register[email]' => 'email@email.com',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[email]' => 'email@email.com',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => 'Doe',
           'register[plainPassword]' => '123456'
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => 'Doe',
           'register[email]' => 'email@email.com',
       ]];
        yield [[
           'register[firstName]' => 'John',
           'register[lastName]' => 'Doe',
           'register[email]' => 'fail',
           'register[plainPassword]' => '123456'
       ]];
    }
}
