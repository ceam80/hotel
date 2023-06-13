<?php

namespace App\Controller;

use App\Entity\Director;
use App\Repository\DirectorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/director', name: 'api_')]


class DirectorController extends AbstractController
{
    public function __construct(private DirectorRepository $directorRepository)
    {

    }

    #[Route('/director', name: 'app_director')]
    public function index(): JsonResponse
    {
        $director1=new Director();
        $director1->setFullname(" Albert");
        $director1->setIdcard(" 0123");
        $this->directorRepository->save($director1,true);

        $director2=new Director();
        $director2->setFullname(" Barry");
        $director2->setIdcard(" 345");
        $this->directorRepository->save($director2,true);

        $director3=new Director();
        $director3->setFullname("Charles ");
        $director3->setIdcard("4567 ");
        $this->directorRepository->save($director3,true);

        $director4=new Director();
        $director4->setFullname("Jenrik ");
        $director4->setIdcard("8899 ");
        $this->directorRepository->save($director4,true);

        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DirectorController.php',
        ]);
    }
//_______________________________________________________________________________________
 #[Route('/{id}', name: 'director_show', methods:['get'] )]
    public function show(int $id): Response
    {
        $director = $this->directorRepository->find($id);
   
        if (!$director) {
            return $this->json('No director found for id ' . $id, 404);
        }
   
        $data =  [
            'id' => $director->getId(),
            'fullname' => $director->getFullname(),
            'idcard' => $director->getIdCard(),
        ];
           
        return $this->json($data);
    }
 // _________________________________________________________________________________________
 #[Route('/{id}', name: 'director_update', methods:['put', 'patch', 'post'] )]
 public function update(Request $request, int $id): JsonResponse
 {
    
     $director = $this->directorRepository->find($id);

     if (!$director) {
         return $this->json('No director found for id' . $id, 404);
     }

     $director->setFullname($request->request->get('name'));
     $director->setIdCard($request->request->get('idcard'));
     
     $this->directorRepository->save($director, true);

     $data =  [
         'id' => $director->getId(),
         'name' => $director->getFullname(),
         'idcard' => $director->getIdCard(),
     ];
        
     return $this->json($data);
 } 
 //__________________________________________________________________________________________
 #[Route('/{id}', name: 'director_delete', methods:['delete'] )]
 public function delete(int $id): JsonResponse
 {
     $director = $this->directorRepository->find($id);

     if (!$director) {
         return $this->json('No director found for id' . $id, 404);
     }

     $this->directorRepository->remove($director,true);
     

     return $this->json('Deleted a director successfully with id ' . $id);
 }  
}
