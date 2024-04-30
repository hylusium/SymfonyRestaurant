<?php

namespace App\Controller;

use App\Entity;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\Data;

class DbController extends AbstractController
{
    #[Route("/Client", name: "create_client")]
    public function CreateClient(EntityManagerInterface $entityManager): Response
    {
        $client = new Client();
        $client->setNom('Malar');
        $client->setPrenom('Gauthier');
        $client->setLogin('palupa');
        $client->setPassword('Palupa128');

        $entityManager->persist($client);
        $entityManager->flush();

        return new Response('saved new product with id ' . $client->getId());
    }

    #[Route('/Client/{id}', name: 'show_client')]
    public function ShowClient(EntityManagerInterface $entityManager, int $id): Response
    {

        $client = $entityManager->getRepository(Client::class)->find($id);
        if (!$client) {
            throw $this->createNotFoundException(
                'no Client found for id : ' . $id
            );
        }
        return $this->render('restaurant_app/login.html.twig', [
            'controller_name' => 'DbController',
        ]);
    }
}
