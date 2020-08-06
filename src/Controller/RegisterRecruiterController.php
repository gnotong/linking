<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Recruiter;
use App\Form\RegisterRecruiterType;
use App\UseCase\RegisterRecruiter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RegisterRecruiterController extends AbstractController
{
    private RegisterRecruiter $registerRecruiter;

    public function __construct(RegisterRecruiter $registerRecruiter) {
        $this->registerRecruiter = $registerRecruiter;
    }


    /**
     * @Route("/recruiter/register", name="recruiter_register")
     */
    public function __invoke(Request  $request)
    {
        $recruiter = new Recruiter();

        $form = $this->createForm(RegisterRecruiterType::class, $recruiter);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->registerRecruiter->execute($recruiter);
            return $this->redirectToRoute('index');
        }

        return $this->render('ui/register_recruiter.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

