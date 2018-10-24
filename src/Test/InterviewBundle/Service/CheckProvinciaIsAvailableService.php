<?php

namespace Test\InterviewBundle\Service;


use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Test\InterviewBundle\Repository\Provincias\ProvinciasRepositoryFactory;

class CheckProvinciaIsAvailableService
{
    private $logger;
    private $provinciasRepository;
    private $municipiosRepository;

    public function __construct(LoggerInterface $logger, EntityManager $entityManager)
    {
        $this->loadLogger($logger);
        $this->loadProvinciasRepository($entityManager);
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

    public function execute(string $nombreDeProvincia): bool
    {
        $provincia = $this->provinciasRepository->findByName($nombreDeProvincia);

        if (empty($provincia)) {
            throw new ProvinciaNotFoundException();
        }

        return true;
    }
}