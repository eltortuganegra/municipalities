<?php

namespace Test\InterviewBundle\Repository\Municipios;


use Doctrine\ORM\EntityManager;
use Test\InterviewBundle\Entity\Municipios;

class MunicipiosRepositoryFactory
{
    public function buildProvinciasRepository(EntityManager $entityManager): MunicipiosRepository
    {
        $objectRepository = $entityManager->getRepository(Municipios::class);
        $repository = new MunicipiosRepositoryImp($objectRepository);

        return $repository;
    }
}