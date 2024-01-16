<?php
// src/Controller/YourController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class YourController extends AbstractController
{
    /**
     * @Route("/your-action", name="your_action")
     */
    public function yourAction(): JsonResponse
    {
        $data = [
            'message' => 'Hello, World!',
            'timestamp' => time()
        ];

        return $this->json($data);
    }
}

