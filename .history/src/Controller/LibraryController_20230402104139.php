<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LibraryController extends AbstractController
{
  private $logger;

  public function __construct(LoggerInterface $logger)
  {
    $this->logger = $logger;
  }
  /**
   * @Route("/library/list", name="library")
   */
  public function list(Request $request): Response
  {
    $response = new JsonResponse();
    $response->setData(["succes" => true, "data" => [

      [
        "id" => 1,
        "tittle" => "hacia rutas salvajes"
      ],
      [
        "id" => 2,
        "tittle" => "E nombre del viento"
      ]

    ]]);
    return $response;
  }
}
