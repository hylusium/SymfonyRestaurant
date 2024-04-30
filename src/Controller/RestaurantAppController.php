<?php

namespace App\Controller;

use App\Entity;
use App\Entity\Avis;
use App\Entity\Client;
use App\Entity\Restaurant;
use App\Entity\Restaurateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RestaurantAppController extends AbstractController
{
    #[Route('/Login', name: 'login')]
    public function Login(): Response
    {
        return $this->render('restaurant_app/login.html.twig', [
            'controller_name' => 'RestaurantAppController',
        ]);
    }
    #[Route('/', name: 'accueil_restaurant_app')]
    public function Accueil(): Response
    {
        return $this->render('restaurant_app/accueil.html.twig', [
            'controller_name' => 'restaurantAppController',
        ]);
    }
    #[Route('/CreateAccount', name: 'CreateAccount')]
    public function CreateAccount(): Response
    {
        return $this->render('restaurant_app/createAccount.html.twig', [
            'controller_name' => 'RestaurantAppController',
        ]);
    }
    #[Route('/RedirectCreate', name: 'redirectCreate')]
    public function RC(EntityManagerInterface $entityManager): Response
    {
        //Add A new Client to database add a field for each value of the $POST[] data
        $client = new Client();
        $client->setNom($_POST['nom']);
        $client->setPrenom($_POST['prenom']);
        $client->setLogin($_POST['username']);
        $client->setPassword($_POST['password']);
        $entityManager->persist($client);
        $entityManager->flush();

        return $this->render('restaurant_app/RedirectAfterCreatAccount.html.twig', [
            'controller_name' => 'restaurantAppController',
        ]);
    }
    #[Route('/Account', name: 'Account')]
    public function Account(SessionInterface $session): Response
    {
        $user = $session->get('user');

        return $this->render('restaurant_app/Account.html.twig', [
            'controller_name' => 'restaurantAppController',
            'user' => $user,
        ]);
    }

    #[Route('/Login/redirectLogin', name: 'redirectLogin')]
    public function RL(EntityManagerInterface $entityManager, SessionInterface $session): Response
    {

        $userConnected = $entityManager->getRepository(Client::class)->findOneBy(array('Login' => $_POST['UserName']));
        $Password = $entityManager->getRepository(Client::class)->findOneBy(array('Password' => $_POST['Password']));

        if (!$userConnected && !$Password) {
            return $this->render('restaurant_app/Login.html.twig', [
                'controller_name' => 'restaurantAppController'
            ]);
        }

        $session->set('user', $userConnected);

        return $this->render('restaurant_app/redirectLogin.html.twig', [
            'controller_name' => 'restaurantAppController',
            'userConnected' => $userConnected,
            'password' => $Password,
        ]);
    }
    #[Route('/NRe', name: 'newRestaurant')]
    public function NRe(EntityManagerInterface $entityManager): Response
    {
        $idRestaurateurExist = 1; // Remplacez par l'ID du restaurateur existant
        $restaurateurExist = $entityManager->getRepository(Restaurant::class)->find($idRestaurateurExist);
        $idclientExist = 2;
        $clientExist = $entityManager->getRepository(Client::class)->find($idclientExist);

        //Add A new Client to database add a field for each value of the $POST[] data
        $restaurateur = new Avis();
        $restaurateur->setCommentaire("ouais les burgouzz sont bouillant c'est trop bon je recommande!");
        $restaurateur->setIdRestaurant($restaurateurExist);
        $restaurateur->setIdClient($clientExist);
        $restaurateur->setNote(4);
        $entityManager->persist($restaurateur);
        $entityManager->flush();

        return $this->render('restaurant_app/Accueil.html.twig', [
            'controller_name' => 'restaurantAppController',
        ]);
    }
}
