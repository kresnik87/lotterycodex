<?php

namespace App\Controller;

use App\Interfaces\ScrapInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScrapController extends AbstractController
{
    public function __construct(protected ScrapInterface $scrapService)
    {
    }

    #[Route('/scrap', name: 'app_scrap')]
    public function scrapService(): Response
    {
        $url = "https://www.euromillones.com.es/resultados-anteriores.html";
        $data = $this->scrapService->getData($url,25);
        return new JsonResponse($data);
    }
}
