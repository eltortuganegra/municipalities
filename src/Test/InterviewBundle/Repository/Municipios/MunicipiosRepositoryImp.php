<?php

namespace Test\InterviewBundle\Repository\Municipios;


use Doctrine\Common\Persistence\ObjectRepository;

class MunicipiosRepositoryImp implements MunicipiosRepository
{
    private $repository;

    public function __construct(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findOneByProvinciaAndCodMunicipio(int $idProvincia, int $codMunicipio): ?array
    {
        return $this->repository->findBy([
            'id_provincia' => $idProvincia,
            'cod_municipio' => $codMunicipio,
        ]);
    }

    public function findAllByIdProvincia(int $idProvincia): ?array
    {
        $provincias = $this->repository->findBy([
            'idProvincia' => $idProvincia
        ]);

        if (empty($provincias)) {

            return null;
        }

        return $this->entitiesToArray($provincias);;
    }

    private function entitiesToArray($provincias): array
    {
        $result = [];
        foreach ($provincias as $provincia) {
            $result[] = [
                'idMunicipio' => $provincia->getIdMunicipio(),
                'idProvincia' => $provincia->getIdProvincia(),
                'codMunicipio' => $provincia->getCodMunicipio(),
                'dc' => $provincia->getDc(),
                'nombre' => $provincia->getNombre(),
            ];
        }

        return $result;
    }
}