<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Entity\Client;
use App\Entity\Director;
use App\Repository\HotelRepository;
use App\Repository\ClientRepository;
use App\Repository\DirectorRepository;
use PhpParser\Node\Scalar\MagicConst\Dir;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HotelController extends AbstractController
{
    public function __construct(private HotelRepository $hotelRepository,private ClientRepository $clientRepository,private DirectorRepository $directorRepository)
    {

    }
    #[Route('/hotel', name: 'app_hotel')]
    public function index(): JsonResponse
    {
        $hotel1=new Hotel();
       // $director1=$this->directorRepository->find(1);
       // $client1=$this->clientRepository->find(1);
        $hotel1->setNombre("Casa del Sol ");
        $hotel1->setDirecction("Calle Primavera 123 ");
        $hotel1->setCity("Ciudad Imaginaria ");
        $hotel1->setRooms( 4 );

        $director1=new Director();
        $director1->setFullname(" Albert");
        $director1->setIdcard(" 0123");

        $hotel1->setDirectorId($director1);
        //$hotel1->addClientId($client1);
        $this->hotelRepository->save($hotel1,true);

        $hotel2=new Hotel();
        //$director2=$this->directorRepository->find(2);
        //$client2=$this->clientRepository->find(2);
        $hotel2->setNombre("Hotel Estrella ");
        $hotel2->setDirecction("Avenida del Mar 456 ");
        $hotel2->setCity("Ciudad del Sol ");
        $hotel2->setRooms(150 );

        $director2=new Director();
        $director2->setFullname(" Barry");
        $director2->setIdcard(" 345");

        $hotel2->setDirectorId($director2);
       // $hotel2->addClientId($client2);
        $this->hotelRepository->save($hotel2,true);
       
        $hotel3=new Hotel();
        //$director3=$this->directorRepository->find(3);
        //$client3=$this->clientRepository->find(3);
        $hotel3->setNombre("Hotel Luna Azul ");
        $hotel3->setDirecction("Calle de la Luna 789 ");
        $hotel3->setCity("Villa Nocturna ");
        $hotel3->setRooms(80);

        $director3=new Director();
        $director3->setFullname("Charles ");
        $director3->setIdcard("4567 ");

        $hotel3->setDirectorId($director3);
        //$hotel3->addClientId($client3);
        $this->hotelRepository->save($hotel3,true);

        $hotel4=new Hotel();
        //$director4=$this->directorRepository->find(4);
       // $client4=$this->clientRepository->find(4);
        $hotel4->setNombre("Hotel Montaña Dorada ");
        $hotel4->setDirecction("Camino del Bosque 321 ");
        $hotel4->setCity("Pueblo Verde ");
        $hotel4->setRooms(50 );

        $director4=new Director();
        $director4->setFullname("Jenrik ");
        $director4->setIdcard("8899 ");

        $hotel4->setDirectorId($director4);
        //$hotel4->addClientId($client4);
        $this->hotelRepository->save($hotel4,true);
        

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HotelController.php',
        ]);
    }
}
