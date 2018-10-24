<?php

namespace Test\InterviewBundle\Repository\Provincias;


use Doctrine\ORM\EntityManager;
use Test\InterviewBundle\Entity\Provincias;

class ProvinciasRepositoryFactory
{
    public function buildProvinciasRepository(EntityManager $entityManager): ProvinciasRepository
    {
        $objectRepository = $entityManager->getRepository(Provincias::class);
        $repository = new ProvinciasRepositoryImp($objectRepository);

        return $repository;
    }
}