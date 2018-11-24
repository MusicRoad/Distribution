<?php

namespace MusicRoad\InstrumentBundle\Controller\Api;

use MusicRoad\InstrumentBundle\Entity\Instrument;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as EXT;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Instrument CRUD Controller.
 *
 * @EXT\Route("/instruments")
 */
class InstrumentController extends Controller
{
    /**
     * List all Instruments of a User.
     *
     * @return JsonResponse
     *
     * @EXT\Route("")
     * @EXT\Method("GET")
     */
    public function listAction()
    {
        $entities = $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository(Instrument::class)
            ->findBy([], ['model' => 'ASC']);

        return new JsonResponse($entities);
    }

    /**
     * Display an Instrument entity.
     *
     * @param Instrument $instrument
     *
     * @return JsonResponse
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("GET")
     */
    public function getAction(Instrument $instrument)
    {
        return new JsonResponse($instrument);
    }

    /**
     * Delete an Instrument.
     *
     * @param Instrument $instrument
     *
     * @return JsonResponse
     *
     * @EXT\Route("/{id}")
     * @EXT\Method("DELETE")
     */
    public function deleteAction(Instrument $instrument)
    {
        $this->getDoctrine()->getManager()->remove($instrument);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse(null, 204);
    }

    /**
     * @param $form
     *
     * @return array
     */
    private function getFormErrors(FormInterface $form)
    {
        $errors = [];
        foreach ($form->getErrors(true, false) as $key => $error) {
            $from = $error->getOrigin();

            $errors[$from->getName()] = $error->getMessage();
        }

        // Get errors from children
        foreach ($form->all() as $child) {
            $childErrors = $this->getFormErrors($child);

            if (!empty($childErrors)) {
                $errors[] = $childErrors;
            }
        }

        return $errors;
    }
}
