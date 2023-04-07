<?php

namespace App\Controller\Api;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BooksController extends AbstractFOSRestController
{

  /**
   * @Rest\Get(path="/books")
   * @Rest\View(serializerGroups={"book"},serializerEnableMaxDepthChecks=true)
   */

  public function getAction(BookRepository $bookRepository)
  {
    return $bookRepository->findAll();
  }


  /**
   * @Rest\Post(path="/books")
   * @Rest\View(serializerGroups={"book"},serializerEnableMaxDepthChecks=true)
   */

  public function postAction(Request $request, BookRepository $bookRepository, EntityManagerInterface $em)
  {
    $book = new Book();
    $form = $this->createForm(BookFormType::class, $book );
    $form->handleRequest(($request))
    



    // $response = new JsonResponse();
    // $title = $request->get("title", null);
    // if (empty($title)) {
    //   $response->setData(["success" => false, "data" => null, "error" => "title can not be emty"]);
    //   return $response;
    // }

    // $book->setTitle($title);
    // $em->persist($book);
    // $em->flush();
    // $response->setData(["success" => true, "data" => [

    //   [
    //     "id" => $book->getId(),
    //     "tittle" => $book->getTitle()
    //   ],

    // ]]);

    // return $response;




    // return $bookRepository->findAll();
  }
}
