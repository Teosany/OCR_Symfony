<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class TwigController extends AbstractController
{
    #[Route('/twig/hello/{name}', name: "Zozor")]
    public function helloWorld(string $name)
    {
        return $this->render('twig/hello.html.twig', [
            'name' => $name
        ]);
    }
}