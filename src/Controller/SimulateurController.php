<?php

declare(strict_types=1);

namespace App\Controller;

use App\Contracts\Service\SimulateurServiceInterface;
use App\DTO\SimulateurDTO;
use App\Form\SimulateurType;
use App\ViewModel\SimulateurVM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/simulateur', name: 'app_simulateur')]
class SimulateurController extends AbstractController
{
    #[Route('/', name: '_index')]
    public function index(
        Request $request,
        SimulateurServiceInterface $simulateurService
    ): Response {
        return $this->render('simulateur/index.html.twig');
    }
}
