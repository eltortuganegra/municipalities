<?php

namespace Test\InterviewBundle\Service;


use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Test\InterviewBundle\Repository\Municipios\MunicipiosRepositoryFactory;
use Test\InterviewBundle\Repository\Provincias\ProvinciasRepositoryFactory;

class MunicipiosService
{
    private $logger;
    private $provinciasRepository;
    private $municipiosRepository;

    public function __construct(LoggerInterface $logger, EntityManager $entityManager)
    {
        $this->loadLogger($logger);
        $this->loadProvinciasRepository($entityManager);
        $this->loadMunicipiosRespository($entityManager);
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

    private function loadMunicipiosRespository(EntityManager $entityManager): void
    {
        $municipiosRepositoryFactory = new MunicipiosRepositoryFactory();
        $this->municipiosRepository = $municipiosRepositoryFactory->buildProvinciasRepository($entityManager);
    }

    public function getAllByNombreDeProvincia(string $nombreDeProvincia)
    {
        $provincia = $this->findProvincia($nombreDeProvincia);
        if ($this->isProvinciaNotFound($provincia)) {
            $this->addErrorToLogger('Provincia is not found.');
            throw new ProvinciaNotFoundException();
        }

        $municipios = $this->findAllMunicipiosByIdProvincia($provincia);

        return $municipios;
    }

    private function findProvincia(string $nombreDeProvincia)
    {
        $provincia = $this->provinciasRepository->findByName($nombreDeProvincia);

        return $provincia;
    }

    private function isProvinciaNotFound($provincia): bool
    {
        return empty($provincia);
    }

    private function addErrorToLogger(string $message): void
    {
        $this->logger->error($message);
    }

    private function findAllMunicipiosByIdProvincia($provincia)
    {
        $municipios = $this->municipiosRepository->findAllByIdProvincia($provincia['idProvincia']);

        return $municipios;
    }

}