<?php

namespace App\Controller;
use App\Entity\Client;
use App\Entity\Hotel;
use App\Repository\ClientRepository;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/client', name: 'api_')]
class ClientController extends AbstractController
{
    public function __construct(private ClientRepository $clientRepository, private HotelRepository $hotelRepository)
    {

    }

    #[Route('/client', name: 'app_client')]
    public function index(): JsonResponse
    {
        $client=new Client();
        $client->setName(" Michael Douglass ");
        $client->setIdCard(" 48573296n");
        $client->setDirecction(" Avd de las acaceas 32 1d");
        //$hotel=$this->hotelRepository->findOneBy(["nombre"=>" "]);
        //$client->addHotel($hotel);
        $this->clientRepository->save($client,true);

        $client1=new Client();
        $client1->setName(" Robert El patillas ");
        $client1->setIdCard(" 2209114e");
        $client1->setDirecction(" Pere El ceremonios 2 3 a");
        $this->clientRepository->save($client1,true);

        $client2=new Client();
        $client2->setName(" Luca Turili ");
        $client2->setIdCard(" 22114365u");
        $client2->setDirecction(" Pugada al castell 2 baix");
        $this->clientRepository->save($client2,true);
        
        $client3=new Client();
        $client3->setName(" Pep Maragall");
        $client3->setIdCard(" 01234567g");
        $client3->setDirecction(" Carrer Bassa Perico 4 E");
        $this->clientRepository->save($client3,true);

        $client4=new Client();
        $client4->setName(" Ramon Martorell");
        $client4->setIdCard("987654321l ");
        $client4->setDirecction(" Zorrilla 18 3º derecha");
        $this->clientRepository->save($client4,true);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ClientController.php',
        ]);
    }


    #[Route('/', name: 'api_client_show_all', methods:['get'] )]

    public function showAll(): Response
    
    {
        $clients  = $this->clientRepository->findAll();

        foreach ($clients as $client) {
            $data[] = [
                'id' => $client->getId(),
                'name' => $client->getName(),
                'idcard' => $client->getIdCard(),
                'direcction' => $client->getDirecction(),
            ];
         }

        return $this->json($data, 200);
    }




    #[Route('/new', name: 'client_create', methods:['post'] )]
    public function create( Request $request): JsonResponse
    {
   
        $client = new Client();
        $client->setName($request->request->get('name'));
        $client->setIdCard($request->request->get('idcard'));
        $client->setDirecction($request->request->get('direcction'));

        $this->clientRepository->save($client, true);
   
        $data =  [
            'id' => $client->getId(),
            'name' => $client->getName(),
            'idcard' => $client->getIdCard(),
            'direcction' => $client->getDirecction(),
        ];
           
        return $this->json($data);
    }
 
 //__________________________________________________________________________________________
    #[Route('/{id}', name: 'client_show', methods:['get'] )]
    public function show(int $id): JsonResponse
    {
        $client = $this->clientRepository->find($id);
   
        if (!$client) {
            return $this->json('No client found for id ' . $id, 404);
        }
   
        $data =  [
            'id' => $client->getId(),
            'name' => $client->getName(),
            'idcard' => $client->getIdCard(),
            'direcction' => $client->getDirecction(),
        ];
           
        return $this->json($data);
    }
// _________________________________________________________________________________________
    #[Route('/{id}', name: 'client_update', methods:['put', 'patch', 'post'] )]
    public function update(Request $request, int $id): JsonResponse
    {
       
        $client = $this->clientRepository->find($id);
   
        if (!$client) {
            return $this->json('No client found for id' . $id, 404);
        }
   
        $client->setName($request->request->get('name'));
        $client->setIdCard($request->request->get('idcard'));
        $client->setDirecction($request->request->get('direcction'));

        $this->clientRepository->save($client, true);
   
        $data =  [
            'id' => $client->getId(),
            'name' => $client->getName(),
            'idcard' => $client->getIdCard(),
            'direcction' => $client->getDirecction(),
        ];
           
        return $this->json($data);
    }
 //__________________________________________________________________________________________
    #[Route('/{id}', name: 'client_delete', methods:['delete'] )]
    public function delete(int $id): JsonResponse
    {
        $client = $this->clientRepository->find($id);
   
        if (!$client) {
            return $this->json('No client found for id' . $id, 404);
        }
   
        $this->clientRepository->remove($client,true);
        
   
        return $this->json('Deleted a client successfully with id ' . $id);
    }
}
/*'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ClientController.php',*/