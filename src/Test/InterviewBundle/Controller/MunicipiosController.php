<?php

namespace Test\InterviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Test\InterviewBundle\Entity\Provincias;
use Test\InterviewBundle\Service\ProvinciaNotFoundException;

class MunicipiosController extends Controller
{
    /**
     * @Route("/api/municipios/{nombreDeProvincia}")
     * @Template()
     */
    public function getByNombreDeProvinciaAction($nombreDeProvincia)
    {
        try {
            $municipios = $this->findAllMunicipiosByProvincia($nombreDeProvincia);
            $response = $this->buildJsonResponseWithMunicipios($municipios);

            return $response;
        } catch (ProvinciaNotFoundException $exception) {
            $response = $this->build404Response();

            return $response;
        }
    }

    private function findAllMunicipiosByProvincia($nombreDeProvincia): array
    {
        $municipiosService = $this->get('municipios');
        $municipios = $municipiosService->getAllByNombreDeProvincia($nombreDeProvincia);

        return $municipios;
    }

    private function buildJsonResponseWithMunicipios($municipios): JsonResponse
    {
        $response = new JsonResponse();
        $response->setData($municipios);

        return $response;
    }

    private function build404Response(): JsonResponse
    {
        $response = new JsonResponse();
        $response->setStatusCode(404);

        return $response;
    }

    /**
     * @Route("/show/municipios/{nombreDeProvincia}")
     * @Template()
     */
    public function showByNombreDeProvinciaAction($nombreDeProvincia)
    {
        try {
            $service = $this->get('check_provincia_is_available');
            $service->execute($nombreDeProvincia);

            return array('nombreDeProvincia' => $nombreDeProvincia);
        } catch (ProvinciaNotFoundException $exception) {
            $response = $this->build404Response();

            return $response;
        }
    }

}
