<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FormController extends AbstractController
{
    #[Route('/form/new')]
    public function new(Request $request, ValidatorInterface $validator, LoggerInterface $logger): Response
    {
        $article = new Article();
        $article->setTitle('Hello world');
        $article->setContent('Un très court article.');
        $article->setAuthor('Zozor');

//        $validator = Validation::createValidator();
//        $violations = $validator->validate($article->getContent(), [
//            new Length(['min' => 10]),
//            new NotBlank(),
//        ]);
//
//        if (0 != count($violations)) {
//            foreach ($violations as $violation) {
//                echo $violation->getMessage(). '<br>';
//            }
//        }

//        $errors = $validator->validate($article);
//
//        if (count($errors) > 0) {
//            $errorsString = (string)$errors;
//
//            return new Response($errorsString);
//        }


        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
//        dd($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($article);
        }

        return $this->render('new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
