<?php

namespace App\Controller;

use App\Entity\Book;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;





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
  /**
   * @Route("/book/create", name="create_book")
   */
  public function createBook(Request $request, EntityManagerInterface $em)
  {
    $book = new Book();
    $title = $request->get("title");
    $book->setTitle($title);
    $em->persist($book);
    $em->flush();
    $response = new JsonResponse();
    $response->setData(["succes" => true, "data" => [

      [
        "id" => $book->getId(),
        "tittle" => $book->getTitle()
      ],


    ]]);
    return $response;
  }
}
