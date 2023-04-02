<?php

use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class BooksController extends AbstractFOSRestController
{

  /**
   * @Rest\Get(path="/books")
   * @Rest\View(serializerGroups={""},serializerEnableMaxDepthChecks=true)
   */

  public function getActions(Request $request)
  {
  }
}
