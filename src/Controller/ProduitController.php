<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Taille;
use App\Entity\Marques;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\ImageProduit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    #[Route('/produits', name: 'affiche tous les produits')]
    public function produits(EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer tous les produits depuis la base de données   
        $data = [];
        $row = [];

        $produits = $entityManager
            ->getRepository(Produit::class)
            ->findAll();

        if (!$produits) {
            return $this->json([
                'message' => 'Aucun produit disponible',
            ], 404);
        }
 
        // dd($produits);

        foreach ($produits as  $produit) {
            # code...
            $marque = $entityManager->getRepository(Marques::class)->find($produit->getMarqueId());
            $categorie = $entityManager->getRepository(Categorie::class)->find($produit->getCategoriesId());
            $genre = $entityManager->getRepository(Genre::class)->find($produit->getGenre());
            $taille = $entityManager->getRepository(Taille::class)->find($produit->getTailleId());
            $imageProduit = $entityManager->getRepository(ImageProduit::class)->find($produit->getImageProduitId());

            $row = array(
                "id"=>$produit->getId(),
                "nom"=>$produit->getNom(),
                "description" => $produit->getDescription(),
                "prix" => $produit->getPrix(),
                "couleur" => $produit->getCouleur(),
                "marque" => $marque->getNom(),
                "categorie" => $categorie->getNom(),
                "taille" => $taille->getNumero(),
                "image" => $imageProduit->getUrl(),
                "genre" => $genre->getNom(),
            );
            $data[] = $row;
        }

        // foreach ($produits as $value) {
        //     # code...
        //     $client = $entityManager->getRepository(Client::class)->find($value->getClientId());
        //     // dd($client);
        //     $row = array(
        //         "id" => $value->getId(),
        //         "client" => $client->getPrenom() . "  " . $client->getNom(),
        //         "rue" => $value->getRue(),
        //         "ville" => $value->getVille(),
        //         "code postal" => $value->getCodePostal(),
        //         "pays" => $value->getPays()
        //     );

        //     $data[] = $row;
        // }

        return $this->json([
            "message" => $data,
        ], 200);
    }
}
