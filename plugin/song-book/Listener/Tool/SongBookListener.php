<?php

namespace MusicRoad\SongBookBundle\Listener\Tool;

use Claroline\AppBundle\API\SerializerProvider;
use Claroline\CoreBundle\Entity\Tool\Tool;
use Claroline\CoreBundle\Event\DisplayToolEvent;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Bundle\TwigBundle\TwigEngine;

/**
 * @DI\Service()
 */
class SongBookListener
{
    /** @var TwigEngine */
    private $templating;

    /** @var SerializerProvider */
    private $serializer;

    /**
     * SongBookListener constructor.
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
     * Displays song book on Desktop.
     *
     * @DI\Observe("open_tool_desktop_music_song_book")
     *
     * @param DisplayToolEvent $event
     */
    public function onDisplayDesktop(DisplayToolEvent $event)
    {
        $content = $this->templating->render(
            'MusicRoadSongBookBundle:tool:song-book.html.twig', [
                'context' => [
                    'type' => Tool::DESKTOP,
                ],
            ]
        );

        $event->setContent($content);
        $event->stopPropagation();
    }
}
