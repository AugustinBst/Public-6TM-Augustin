<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Document\UserDocument;

class UserController extends AbstractController
{
    /**
     * @Route("/users/{full_name}", name="get_user", methods={"GET"})
     */
    public function getUser(string $full_name): JsonResponse
    {
        return $this->json($this->getDoctrine()->getRepository(UserDocument::class)->findOneBy(["nom_prenom"=> $full_name]));
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
        $data = array_merge($data, $user);

        $this->getDoctrine()->getManager()->persist($data)->flush();

        return $this->json(['message' => 'User added successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="edit_user", methods={"PUT"})
     */
    public function editUser(string $full_name, Request $request): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(UserDocument::class)->findOneBy([''=> $full_name]);

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

        $this->getDoctrine()->getManager()->flush();

        return $this->json(['message' => 'User edited successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="delete_user", methods={"DELETE"})
     */
    public function deleteUser(string $full_name): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(UserDocument::class)->findOneBy(['nom_prenom' => $full_name]);
        
        if (!$user) {
            return $this->json(['error' => 'User not found'], 404);
        }

        $this->getDoctrine()->getManager()->remove($user)->flush();

        return $this->json(['message' => 'User deleted successfully']);
    }
}
