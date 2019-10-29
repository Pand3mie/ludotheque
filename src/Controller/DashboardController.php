<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JeuxRepository;

class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(JeuxRepository $jeuxRepository) :Response
    {
        $dateMaj = $jeuxRepository->findLastMaj();
        $now = new \DateTime('now');
        $endDate = new \DateTime($dateMaj[0]['max_date']);
        $interval = $endDate->diff($now);
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'dayofmaj' => $interval,
        ]);
    }
    /**
     * @Route("/profil", name="profil")
     */
    public function Profil(Request $request)
    {
        return $this->render('user/profil.html.twig');
    }
}

