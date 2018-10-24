<?php

namespace Test\InterviewBundle\Repository\Provincias;


interface ProvinciasRepository
{
    public function findByComunidad(string $comunidad): ?array;
    public function findByName(string $name): ?array;
}