<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    #[Route('/hello/{name}', name: "hello")]
    public function hello(string $name)
    {
        return $this->render('hello.html.twig', [
            'name' => $name
        ]);
    }
}