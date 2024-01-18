<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\UserDocument;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/users/{full_name}", name="get_user", methods={"GET"})
     */
    public function getObject(string $full_name): JsonResponse
    {
        return $this->json($this->entityManager->getRepository(UserDocument::class)->findOneBy(["nom_prenom" => $full_name]));
    }
    /**
     * @Route("/users", name="add_user", methods={"POST"})
     */
    public function addUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $user = [
            "nom" => $data["nom"],
            "prenom" => $data["prenom"],
            "poste" => $data["poste"],
            "equipe" => $data["equipe"],
            "agence" => $data["agence"],
            "photo_pro" => $data["photo_pro"],
            "photo_fun" => $data["photo_fun"],
            "nom_prenom" => $data["nom_prenom"]
        ];

        $this->entityManager->persist($user)->flush();

        return $this->json(['message' => 'User added successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="edit_user", methods={"PUT"})
     */
    public function editUser(string $full_name, Request $request): JsonResponse
    {
        $user = $this->entityManager->getRepository(UserDocument::class)->findOneBy(['nom_prenom' => $full_name]);

        if (!$user) {
            return $this->json(['error' => 'User not found'], 404);
        }

        $data = json_decode($request->getContent(), true);

        $user->setNom($data["nom"]);
        $user->setPrenom($data["prenom"]);
        $user->setPoste($data["poste"]);
        $user->setEquipe($data["equipe"]);
        $user->setAgence($data["agence"]);
        $user->setPhotoPro($data["photo_pro"]);
        $user->setPhotoFun($data["photo_fun"]);
        $user->setNomPrenom($data["nom_prenom"]);

        $this->entityManager->flush();

        return $this->json(['message' => 'User edited successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="delete_user", methods={"DELETE"})
     */
    public function deleteUser(string $full_name): JsonResponse
    {
        $user = $this->entityManager->getRepository(UserDocument::class)->findOneBy(['nom_prenom' => $full_name]);
        
        if (!$user) {
            return $this->json(['error' => 'User not found'], 404);
        }

        $this->entityManager->remove($user)->flush();

        return $this->json(['message' => 'User deleted successfully']);
    }

    public function getData(): JsonResponse
    {
        $allUsers = $this->doctrine->getRepository(UserDocument::class)->findAll();

        $formattedUsers = [];

        foreach ($allUsers as $user) {
            $formattedUsers[] = [
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                "poste" => $user->getPoste(),
                "equipe" => $user->getEquipe(),
                "agence" => $user->getAgence(),
                "photo_pro" => $user->getPhotoPro(),
                "photo_fun" => $user->getPhotoFun(),
                "nom_prenom" => $user->getNomPrenom(),
            ];
        }

        return $this->json($formattedUsers);
    }

    public function get_data_search_bar(string $start_with): JsonResponse
    {
        $allUsers = $this->doctrine->getRepository(UserDocument::class)->findBy(["nom_prenom" => new \MongoDB\BSON\Regex('^'.$start_with)]);

        $formattedUsers = [];

        foreach ($allUsers as $user) {
            $formattedUsers[] = [
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                "poste" => $user->getPoste(),
                "equipe" => $user->getEquipe(),
                "agence" => $user->getAgence(),
                "photo_pro" => $user->getPhotoPro(),
                "photo_fun" => $user->getPhotoFun(),
                "nom_prenom" => $user->getNomPrenom(),
            ];
        }

        return $this->json($formattedUsers);
    }
}