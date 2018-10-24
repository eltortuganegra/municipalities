<?php

namespace Test\InterviewBundle\Repository\Comunidades;

interface ComunidadesRepository
{
    public function findOneByNombre(string $nombreDeComunidad): ?array;
}