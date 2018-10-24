<?php

namespace Test\InterviewBundle\Repository\Comunidades;

use Doctrine\Common\Persistence\ObjectRepository;

class ComunidadesRepositoryImp implements ComunidadesRepository
{
    private $repository;

    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findOneByNombre(string $nombreDeComunidad): ?array
    {
        return $this->repository->findBy([
            'nombre' => $nombreDeComunidad
        ]);
    }
}