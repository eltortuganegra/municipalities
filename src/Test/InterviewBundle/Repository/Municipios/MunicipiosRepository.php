<?php

namespace Test\InterviewBundle\Repository\Municipios;


interface MunicipiosRepository
{
    public function findOneByProvinciaAndCodMunicipio(int $nombreDeProvincia, int $codMunicipio): ?array;
    public function findAllByIdProvincia(int $idProvincia): ?array;
}