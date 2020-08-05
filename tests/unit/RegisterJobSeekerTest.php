<?php

declare(strict_types=1);

namespace App\Tests\unit;

use App\Adapter\InMemory\Repository\JobSeekerRepository;
use App\Entity\JobSeeker;
use App\UseCase\RegisterJobSeeker;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;

class RegisterJobSeekerTest extends TestCase
{
    public function testSuccessFulRegistration()
    {
        $useCase = new RegisterJobSeeker(new JobSeekerRepository());

        $jobSeeker = (new JobSeeker())
            ->setPlainPassword('123')
            ->setEmail('email@email.com')
            ->setFirstName('John')
            ->setLastName('Doe');

        $this->assertEquals($jobSeeker, $useCase->execute($jobSeeker));
    }

    /**
     * @dataProvider getBadJobSeekers
     */
    public function testBadJobSeeker(JobSeeker $jobSeeker)
    {
        $useCase = new RegisterJobSeeker(new JobSeekerRepository());

        $this->expectException(LazyAssertionException::class);

        $useCase->execute($jobSeeker);
    }

    public function getBadJobSeekers(): \Generator
    {
        yield [
            (new JobSeeker())
                ->setEmail('email@email.com')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
        yield [
            (new JobSeeker())
                ->setPlainPassword('123')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
        yield [
            (new JobSeeker())
                ->setPlainPassword('123')
                ->setEmail('email@email.com')
                ->setLastName('Doe')
        ];
        yield [
            (new JobSeeker())
                ->setPlainPassword('123')
                ->setEmail('email@email.com')
                ->setFirstName('John')
        ];
        yield [
            (new JobSeeker())
                ->setPlainPassword('123')
                ->setEmail('email.email.com')
                ->setFirstName('John')
                ->setLastName('Doe')
        ];
    }

}
