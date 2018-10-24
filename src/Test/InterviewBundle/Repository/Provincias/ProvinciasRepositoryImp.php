<?php

namespace Test\InterviewBundle\Repository\Provincias;


use Doctrine\Common\Persistence\ObjectRepository;
use Test\InterviewBundle\Entity\Provincias;

class ProvinciasRepositoryImp implements ProvinciasRepository
{
    private $repository;

    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findByComunidad(string $nombreDeComunidad): ?array
    {
        return $this->repository->findBy([
                'provincia' => $nombreDeComunidad
            ]);
    }

    public function findByName(string $name): ?array
    {
        $provincia = $this->repository->findOneBy([
            'provincia' => $name
        ]);

        if ($this->isProvinciaFound($provincia)) {

            return $this->provinciaEntityToArray($provincia);
        }

        return null;
    }

    private function isProvinciaFound($provincia): bool
    {
        return !empty($provincia);
    }

    private function provinciaEntityToArray($provincia): array
    {
        return [
            'idProvincia' => $provincia->getIdProvincia(),
            'provincia' => $provincia->getProvincia(),
        ];
    }


}