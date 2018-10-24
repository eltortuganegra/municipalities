<?php

namespace Test\InterviewBundle\Service;


use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Test\InterviewBundle\Repository\Comunidades\ComunidadesRepositoryFactory;
use Test\InterviewBundle\Repository\Municipios\MunicipiosRepositoryFactory;
use Test\InterviewBundle\Repository\Provincias\ProvinciasRepositoryFactory;

class FindAllProvinciasAndMunicipiosByComunidadService
{
    private $logger;
    private $comunidadesRepository;
    private $provinciasRepository;
    private $municipiosRepository;

    public function __construct(LoggerInterface $logger, EntityManager $entityManager)
    {
        $this->loadLogger($logger);
        $this->loadComunidadesRepository($entityManager);
        $this->loadProvinciasRepository($entityManager);
        $this->loadMunicipiosRepository($entityManager);
    }

    private function loadLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    private function loadProvinciasRepository(EntityManager $entityManager): void
    {
        $provinciasRespositoryFactory = new ProvinciasRepositoryFactory();
        $this->provinciasRepository = $provinciasRespositoryFactory->buildProvinciasRepository($entityManager);
    }

    private function loadComunidadesRepository(EntityManager $entityManager): void
    {
        $comunidadesRespositoryFactory = new ComunidadesRepositoryFactory();
        $this->comunidadesRepository = $comunidadesRespositoryFactory->buildProvinciasRepository($entityManager);
    }

    private function loadMunicipiosRepository(EntityManager $entityManager): void
    {
        $municipiosRespositoryFactory = new MunicipiosRepositoryFactory();
        $this->municipiosRepository = $municipiosRespositoryFactory->buildProvinciasRepository($entityManager);
    }

    public function execute(string $nombreComunidad): ?array
    {
        $comunidad = $this->comunidadesRepository->findOneByNombre($nombreComunidad);
        if (empty($comunidad)) {
            throw new ComunidadNotFoundException();
        }

        $provincias = $this->provinciasRepository->find

        return null;
    }
}