<?php

namespace App\Controller;
use App\Entity\Room;
use App\Entity\Hotel;
use App\Repository\RoomRepository;
use App\Repository\HotelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{   
    public function __construct(private RoomRepository $roomRepository,private HotelRepository $hotelRepository)
    {

    }
    #[Route('/r/room', name: 'app_r_room')]
    public function index(): JsonResponse
    {
        $room=new Room();
        $room->setNumber(" 256");
        $room->setFloor(" 6º izq");
        $room->setOrientation(" North");
        $hotel1=$this->hotelRepository->findOneBy(["nombre"=>"Casa del Sol "]);
        $room->setHotel($hotel1);
        $this->roomRepository->save($room,true);

        $room1=new Room();
        $room1->setNumber(" 25");
        $room1->setFloor(" 2º");
        $room1->setOrientation(" South");
        $hotel2=$this->hotelRepository->findOneBy(["nombre"=>"Hotel Estrella"]);
        $room1->setHotel($hotel2);
        $this->roomRepository->save($room1,true);


        $room2=new Room();
        $room2->setNumber("44 ");
        $room2->setFloor(" 6º");
        $room2->setOrientation(" East");
        $hotel3=$this->hotelRepository->findOneBy(["nombre"=>"Hotel Luna Azul "]);
        $room2->setHotel($hotel3);
        $this->roomRepository->save($room2,true);

        $room3=new Room();
        $room3->setNumber("25 ");
        $room3->setFloor(" 3º");
        $room3->setOrientation(" West");
        $hotel4=$this->hotelRepository->findOneBy(["nombre"=>"Hotel Montaña Dorada "]);
        $room3->setHotel($hotel4);
        $this->roomRepository->save($room3,true);

        $room4=new Room();
        $room4->setNumber("1 ");
        $room4->setFloor("Ent ");
        $room4->setOrientation(" North");
        //$hotel5=$this->hotelRepository->findOneBy(["nombre"=>" "]);
        //$room4->setHotel($hotel5);
        $this->roomRepository->save($room4,true);

        /*$room5=new Room();
        $room5->setNumber(" 256");
        $room5->setFloor(" 6º izq");
        $room5->setOrientation(" North");
        //$hotel6=$this->hotelRepository->findOneBy(["nombre"=>" "]);
        //$room5->setHotel($hotel6);
        $this->roomRepository->save($room5,true);*/


        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RRoomController.php',
        ]);
    }
}
