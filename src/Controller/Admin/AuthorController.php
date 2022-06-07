<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/admin/auteurs/nouveau', name: 'app_admin_author_create')]
    public function create(Request $request, AuthorRepository $repository): Response
    {
        // Tester si le formulaire a était envoyé
        if ($request->isMethod('POST')) {
            // Récupérer les données du formulaire
            $name = $request->request->get('name');
            $description = $request->request->get('description');
            $imageUrl = $request->request->get('imageUrl');

            // Créer l'auteur à partir des données du formulaire
            $author = new Author();
            $author->setName($name);
            $author->setDescription($description);
            $author->setImageUrl($imageUrl);

            // enregistrer l'auteur grâce au répository
            $repository->add($author, true);

            // Rediriger l'utilisateur vers la liste des auteurs
            return $this->redirectToRoute('app_admin_author_list');
        }

        // afficher le formulaire (la page twig)
        return $this->render('admin/author/create.html.twig');
    }

    #[Route('app_admin_author_list', name: 'app_admin_author_list')]
    public function list(AuthorRepository $repository): Response
    {
        // Récupérer les auteurs depuis la base de donnés
        $authors = $repository->findAll();

        // Afficher la page HTML
        return $this->render('admin/author/list.html.twig', [
            'authors' => $authors,
        ]);
    }
}
