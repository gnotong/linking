<?php

declare(strict_types=1);

namespace App\Tests\unit;

use App\Adapter\InMemory\Repository\OfferRepository;
use App\Entity\Offer;
use App\UseCase\PublishOffer;
use Assert\LazyAssertionException;
use PHPUnit\Framework\TestCase;

class PublishOfferTest extends TestCase
{
    public function testSuccessFulRegistration()
    {
        $useCase = new PublishOffer(new OfferRepository());

        $offer = (new Offer())
            ->setCompanyDescription('offer description')
            ->setJobDescription('job description')
            ->setLocation('location')
            ->setMaxSalary(35000)
            ->setMinSalary(29000)
            ->setMissions('offer missions')
            ->setName('Offer name')
            ->setProfile('offer profile')
            ->setRemote(true)
            ->setTasks('offer tasks')
            ->setSoftSkills('offer soft skills');

        $this->assertEquals($offer, $useCase->execute($offer));
    }

    /**
     * @dataProvider getBadOffers
     */
    public function testBadOffer(Offer $offer)
    {
        $useCase = new PublishOffer(new OfferRepository());

        $this->expectException(LazyAssertionException::class);

        $useCase->execute($offer);
    }

    public function getBadOffers(): \Generator
    {
        yield [
            (new Offer())
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setRemote(true)
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setTasks('offer tasks')
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setSoftSkills('offer soft skills')
        ];
        yield [
            (new Offer())
                ->setCompanyDescription('offer description')
                ->setJobDescription('job description')
                ->setLocation('location')
                ->setMaxSalary(35000)
                ->setMinSalary(29000)
                ->setMissions('offer missions')
                ->setName('Offer name')
                ->setProfile('offer profile')
                ->setRemote(true)
                ->setTasks('offer tasks')
        ];
    }

}
