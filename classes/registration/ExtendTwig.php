<?php namespace Dimti\Video\Classes\Registration;

use Dimti\Video\Classes\TwigFilters;

trait ExtendTwig
{
    public function registerMarkupTags()
    {
        $filters = [
            'youtubeEmbedUrl' => function (...$args) {
                return TwigFilters::youtubeEmbedUrl(...$args);
            },
            'youtubeEmbedThumbnail' => function (...$args) {
                return TwigFilters::youtubeEmbedThumbnail(...$args);
            },
        ];

        return [
            'filters' => $filters,
        ];
    }
}
