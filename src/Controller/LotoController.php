<?php

namespace App\Controller;

use App\Contracts\Service\LotoServiceInterface;
use App\DTO\LotoDTO;
use App\Form\LotoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LotoController extends AbstractController
{
    #[Route('/loto', name: 'app_loto')]
    public function index(
        Request $request,
        LotoServiceInterface $lotoService
    ): Response {
        $dto = new LotoDTO();
        $lotoForm = $this->createForm(LotoType::class, $dto);
        $lotoForm->handleRequest($request);
        $vm = null;
        if ($lotoForm->isSubmitted() && $lotoForm->isValid()) {
            $vm = $lotoService::getResult($dto);
        }
        return $this->render('loto/index.html.twig', [
            'form' => $lotoForm->createView(),
            'vm' => $vm
        ]);
    }
}
