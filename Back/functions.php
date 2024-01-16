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
        $user = $this->getDoctrine()->getRepository(UserDocument::class)->findOneBy(["nom_prenom"=> $full_name]);
        return $this->json($user);
    }

    /**
     * @Route("/users", name="add_user", methods={"POST"})
     */
    public function addUser(Request $request): JsonResponse
    {
        $data = $request->getContent();
        $user = [
            "nom" => $request."nom",
            "prenom" => $request."prenom",
            "poste" => $request."poste",
            "equipe" => $request."equipe",
            "agence" => $request."agence",
            "photo_pro" => $request."photo_pro",
            "photo_fun" => $request."photo_fun",
            "nom_prenom" => $request."nom_prenom"
        ];
        $data += $user;
        $this->setContent($data);
        return $this->json(['message' => 'User added successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="edit_user", methods={"PUT"})
     */
    public function editUser(string $full_name, Request $request): JsonResponse
    {
        $data = $this->getDoctrine()->getRepository(UserDocument::class)->findOneBy([''=> $full_name]);
        $user = [
            "nom" => $request."nom",
            "prenom" => $request."prenom",
            "poste" => $request."poste",
            "equipe" => $request."equipe",
            "agence" => $request."agence",
            "photo_pro" => $request."photo_pro",
            "photo_fun" => $request."photo_fun",
            "nom_prenom" => $request."nom_prenom"
        ];
        $data += $user;
        $this->setContent($data);        
        return $this->json(['message' => 'User edited successfully']);
    }

    /**
     * @Route("/users/{full_name}", name="delete_user", methods={"DELETE"})
     */
    public function deleteUser(string $full_name): JsonResponse
    {
        $data = $this->getDoctrine()->delete('', [''=> $full_name]);
        return $this->json(['message' => 'User deleted successfully']);
    }
}
