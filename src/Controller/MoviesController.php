<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'movies')] 
    public function index(MovieRepository $movieRepository): Response
    {

        $movies = $movieRepository->findAll();
        // $movies = ["Avengers: Endgame", "Inception", "Loki", "Black Widow"];

        dd($movies);
       return $this->render('index.html.twig');
    }




    /**
     * oldMethod
     *  defaults: ['name' => null],  methods: ['GET' , 'HEAD']
     * @Route("/old", name="old")
     */
    // public function oldMethod(): Response
    // {
    //        return $this->json([
    //         'message' => 'Welcome to your old route method!',
    //         'path' => 'src/Controller/MoviesController.php',
    //        ]);
    // }
}
