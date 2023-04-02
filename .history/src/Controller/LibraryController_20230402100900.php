<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LibraryController extends AbstractController
{
  /**
   * @Route("/library/list", name="library")
   */
  public function list(): Response
  {
    $response = new JsonResponse();
    $response->setData(["succes" => true, "data" => [

      [
        "id" => 1,
        "tittle" => "hacia rutas salvajes"
      ]

    ]]);
    return $response;
  }
}
