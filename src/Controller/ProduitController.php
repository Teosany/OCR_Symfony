<?php
namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit')]
    public function produit(): Response
    {
        return $this->render('produit.html.twig', ['class' => Article::class]);
    }
}