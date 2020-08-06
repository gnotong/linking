<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\JobSeeker;
use App\Form\RegisterJobSeekerType;
use App\UseCase\RegisterJobSeeker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterJobSeekerController extends AbstractController
{
    private RegisterJobSeeker $registerJobSeeker;

    public function __construct(RegisterJobSeeker $registerJobSeeker) {
        $this->registerJobSeeker = $registerJobSeeker;
    }


    /**
     * @Route("/job-seeker/register", name="job_seeker_register")
     */
    public function __invoke(Request  $request)
    {
        $jobSeeker = new JobSeeker();

        $form = $this->createForm(RegisterJobSeekerType::class, $jobSeeker);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->registerJobSeeker->execute($jobSeeker);
            return $this->redirectToRoute('index');
        }

        return $this->render('ui/register_job_seeker.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

