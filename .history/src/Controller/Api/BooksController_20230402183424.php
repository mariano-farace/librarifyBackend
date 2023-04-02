<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
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
   * @Route("/books", name="books")
   */
  public function list(Request $request, BookRepository $bookRepository): Response
  {

    $books = $bookRepository->findAll();
    $booksAsArray = [];

    foreach ($books as $book) {
      $booksAsArray[] = [

        "id" => $book->getId(),
        "title" => $book->getTitle(),
        "image" => $book->getImage()
      ];
    };

    $response = new JsonResponse();
    $response->setData(["succes" => true, "data" => $booksAsArray]);
    return $response;
  }
  /**
   * @Route("/book/create", name="create_book")
   */
  public function createBook(Request $request, EntityManagerInterface $em)
  {
    $book = new Book();
    $response = new JsonResponse();
    $title = $request->get("title", null);
    if (empty($title)) {
      $response->setData(["success" => false, "data" => null, "error" => "title can not be emty"]);
      return $response;
    }

    $book->setTitle($title);
    $em->persist($book);
    $em->flush();
    $response->setData(["success" => true, "data" => [

      [
        "id" => $book->getId(),
        "tittle" => $book->getTitle()
      ],

    ]]);

    return $response;
  }
}
