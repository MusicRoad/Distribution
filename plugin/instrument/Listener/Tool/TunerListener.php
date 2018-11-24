<?php

namespace MusicRoad\InstrumentBundle\Listener\Tool;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Entity\Tool\Tool;
use Claroline\CoreBundle\Event\DisplayToolEvent;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * @DI\Service()
 */
class TunerListener
{
    /** @var TwigEngine */
    private $templating;

    /** @var SerializerProvider */
    private $serializer;

    /**
     * TunerListener constructor.
     *
     * @DI\InjectParams({
     *     "templating" = @DI\Inject("templating"),
     *     "serializer" = @DI\Inject("claroline.api.serializer")
     * })
     *
     * @param TwigEngine         $templating
     * @param SerializerProvider $serializer
     */
    public function __construct(
        TwigEngine $templating,
        SerializerProvider $serializer
    ) {
        $this->templating = $templating;
        $this->serializer = $serializer;
    }

    /**
     * Displays tuner on Desktop.
     *
     * @DI\Observe("open_tool_desktop_music_instrument_tuner")
     *
     * @param DisplayToolEvent $event
     */
    public function onDisplayDesktop(DisplayToolEvent $event)
    {
        $content = $this->templating->render(
            'MusicRoadInstrumentBundle:tool:tuner.html.twig', [
                'context' => [
                    'type' => Tool::DESKTOP,
                ],
            ]
        );

        $event->setContent($content);
        $event->stopPropagation();
    }

    /**
     * Displays tuner on Workspace.
     *
     * @DI\Observe("open_tool_workspace_music_instrument_tuner")
     *
     * @param DisplayToolEvent $event
     */
    public function onDisplayWorkspace(DisplayToolEvent $event)
    {
        $workspace = $event->getWorkspace();

        $content = $this->templating->render(
            'MusicRoadInstrumentBundle:tool:tuner.html.twig', [
                'workspace' => $workspace,
                'context' => [
                    'type' => Tool::WORKSPACE,
                    'data' => $this->serializer->serialize($workspace),
                ],
            ]
        );

        $event->setContent($content);
        $event->stopPropagation();
    }
}
