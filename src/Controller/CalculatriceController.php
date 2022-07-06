<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatriceController extends AbstractController
{
    #[Route('/calculatrice', name: 'app_calculatrice_index')]
    public function index(): Response
    {
        return $this->render('calculatrice/index.html.twig');
    }

    #[Route('/calculatrice/additionner/{x}/{y}', name: 'app_calculatrice_additionner')]
    public function additionner(int $x, int $y): Response
    {
        // calculer la total
        $total = $x + $y;

        // afficher la page de l'addition
        return $this->render('calculatrice/additionner.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }

    #[Route('/calculatrice/soustraire/{x}/{y}', name: 'app_calculatrice_soustraire')]
    public function soustraire(int $x, int $y): Response
    {
        // Calcule du résultat
        $total = $x - $y;

        // affichage de la page html
        return $this->render('calculatrice/soustraire.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }

    #[Route('/calculatrice/multiplier/{x}/{y}', name: 'app_calculatrice_multiplier')]
    public function multiplier(int $x, int $y): Response
    {
        // Calcule du résultat
        $total = $x * $y;

        // affichage de la page html
        return $this->render('calculatrice/multiplier.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }

    #[Route('/calculatrice/diviser/{x}/{y}', name: 'app_calculatrice_diviser')]
    public function diviser(int $x, int $y): Response
    {
        // Calcule du résultat
        $total = $x / $y;

        // affichage de la page html
        return $this->render('calculatrice/diviser.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }

    #[Route('/calculatrice/puissance/{x}/{y}', name: 'app_calculatrice_puissance')]
    public function puissance(int $x, int $y): Response
    {
        // Calcule du résultat
        $total = pow($x, $y);

        // affichage de la page html
        return $this->render('calculatrice/puissance.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }

    #[Route('/calculatrice/modulo/{x}/{y}', name: 'app_calculatrice_modulo')]
    public function modulo(int $x, int $y): Response
    {
        // Calcule du résultat
        $total = $x % $y;

        // affichage de la page html
        return $this->render('calculatrice/puissance.html.twig', [
            'x' => $x,
            'y' => $y,
            'total' => $total,
        ]);
    }
}