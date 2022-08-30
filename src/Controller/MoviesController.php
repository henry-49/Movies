<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies')] 
    public function index(): Response
    {

        // findAll()  - SELECT * FROM movies;
        // find() - SELECT * FROM movies WHERE id = ?;
        // findBy()  - SELECT * FROM movies ORDER BY id DESC;
        // findOneBy()  - SELECT * FROM movies WHERE id = ? AND title ='The Dark Knight' ORDER BY id DESC;
        // count()  - SELECT COUNT() FROM movies WHERE id = 7;

        $repository = $this->em->getRepository(Movie::class);
        $movies = $repository->getClassName();

        // $movies = $repository->count(['id' => 7]);
        // $movies = $repository->findOneBy(['id' => 7, 'title' => 'The Dark Knight'], ['id' => 'DESC']);
        // $movies = $repository->findBy([], ['id' => 'DESC']);
        // $movies = $repository->find(7);
       // $movies = $movieRepository->findAll();
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
