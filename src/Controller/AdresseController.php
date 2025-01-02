<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Adresse;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdresseController extends AbstractController
{

    //================= ADDRESSE ===============================
    #[Route('/adresses', name: 'affiche les adresses')]
    public function adresses(EntityManagerInterface $entityManager):JsonResponse
    {
        // Récupérer tous les produits depuis la base de données   
        $data = [];
        $row = [];
        $adresses = $entityManager
        ->getRepository(Adresse::class)
        ->findAll();
        
        if(!$adresses){
            return $this->json([
                'message' => 'Aucune adresses disponible',    
            ], 404);
        }

        
        foreach ($adresses as  $value) {
            # code...
            $client = $entityManager->getRepository(Client::class)->find($value->getClientId());
            // dd($client);
            $row = array(
                "id"=>$value->getId(),
                "client"=>$client->getPrenom() . "  " . $client->getNom(),
                "rue"=>$value->getRue(),
                "ville"=>$value->getVille(),
                "code postal"=>$value->getCodePostal(),
                "pays"=>$value->getPays()
            );
           
            $data [] = $row;
        }

        return $this->json([
             "message"=>$data,
        ], 200);
    }

    #[Route('/adresse/{id}', name: 'affiche un adresse')]
    public function adresse(EntityManagerInterface $entityManager, int $id):JsonResponse
    {
        // Récupérer tous les produits depuis la base de données   
        $data = [];
        $row = [];

        $adresse = $entityManager
            ->getRepository(Adresse::class)
            ->find($id);
        // dd($adresse);
        if (!$adresse) {
            return $this->json([
                'message' => 'Adresse non  disponible',
            ], 404);
        }
        # code...
         $client = $entityManager->getRepository(Client::class)->find($adresse->getClientId());
            // dd($client);
            $row = array(
                "id" => $adresse->getId(),
                "client" => $client->getPrenom() . "  " . $client->getNom(),
                "rue" => $adresse->getRue(),
                "ville" => $adresse->getVille(),
                "code postal" => $adresse->getCodePostal(),
                "pays" => $adresse->getPays()
            );
            $data[] = $row;      

        return $this->json([
            "message" => $data,
        ], 200);
    }   

}
