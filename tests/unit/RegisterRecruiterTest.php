<?php

declare(strict_types=1);

namespace App\Tests\unit;

use App\Adapter\InMemory\Repository\RecruiterRepository;
use App\Entity\Recruiter;
use App\UseCase\RegisterRecruiter;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;

class RegisterRecruiterTest extends TestCase
{
    public function testSuccessFulRegistration()
    {
        $useCase = new RegisterRecruiter(new RecruiterRepository());

        $recruiter = (new Recruiter())
            ->setCompanyName('Company')
            ->setPlainPassword('123')
            ->setEmail('email@email.com')
            ->setFirstName('John')
            ->setLastName('Doe');

        $this->assertEquals($recruiter, $useCase->execute($recruiter));
    }

    /**
     * @dataProvider getBadRecruiters
     */
    public function testBadRecruiter(Recruiter $recruiter)
    {
        $useCase = new RegisterRecruiter(new RecruiterRepository());

        $this->expectException(LazyAssertionException::class);

        $useCase->execute($recruiter);
    }

    public function getBadRecruiters(): \Generator
    {
        yield [
            (new Recruiter())
                ->setPlainPassword('123')
                ->setEmail('email@email.com')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
        yield [
            (new Recruiter())
                ->setPlainPassword('123')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
        yield [
            (new Recruiter())
                ->setPlainPassword('123')
                ->setEmail('email@email.com')
                ->setLastName('Doe')
        ];
        yield [
            (new Recruiter())
                ->setPlainPassword('123')
                ->setEmail('email@email.com')
                ->setFirstName('John')
        ];
        yield [
            (new Recruiter())
                ->setPlainPassword('123')
                ->setEmail('email.email.com')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
    }

}
