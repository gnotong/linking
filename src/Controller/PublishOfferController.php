<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Offer;
use App\Form\PublishOfferType;
use App\UseCase\PublishOffer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PublishOfferController extends AbstractController
{
    private PublishOffer $publishOffer;

    public function __construct(PublishOffer $publishOffer) {
        $this->publishOffer = $publishOffer;
    }


    /**
     * @Route("/offer/publish", name="offer_publish")
     */
    public function __invoke(Request  $request)
    {
        $offer = new Offer();

        $offer->setRecruiter($this->getUser());

        $form = $this->createForm(PublishOfferType::class, $offer);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->publishOffer->execute($offer);
            return $this->redirectToRoute('index');
        }

        return $this->render('ui/publish_offer.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

