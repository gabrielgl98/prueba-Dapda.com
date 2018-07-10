<?php
namespace AppBundle\Model;

use AppBundle\Entity\Solicitud;
use AppBundle\Repository\SolicitudRepository;
use Doctrine\ORM\EntityManagerInterface;


class SolicitudModel{

      /** @var  SolicitudRepository $repository*/
    private $repository;

    /** @var  EntityManagerInterface */
    private $entityManager;

    function __construct(EntityManagerInterface $entityManager)
    {
      $this->repository = $entityManager->getRepository("AppBundle:Solicitud");
      $this->entityManager = $entityManager;


    }

    public function add(Solicitud $entity)
    {
        $this->entityManager->persist($entity);

    }

    public function applyChanges(){
      $this->entityManager->flush();
    }
}
