<?php

namespace Test\InterviewBundle\Repository\Comunidades;


use Doctrine\ORM\EntityManager;
use Test\InterviewBundle\Entity\Comunidades;

class ComunidadesRepositoryFactory
{
    public function buildProvinciasRepository(EntityManager $entityManager): ComunidadesRepository
    {
        $objectRepository = $entityManager->getRepository(Comunidades::class);
        $repository = new ComunidadesRepositoryImp($objectRepository);

        return $repository;
    }
}