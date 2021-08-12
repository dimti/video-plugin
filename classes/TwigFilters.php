<?php namespace Dimti\Video\Classes;

abstract class TwigFilters
{
    public static function youtubeShortUrl($url)
    {
        $result = '';

        /**
         * Transform "https://www.youtube.com/watch?v=kNnWZkXbpWY"
         * to "https://youtu.be/kNnWZkXbpWY"
         */
        if (false !== strpos($url, 'watch?v=')) {
            parse_str(parse_url($url)['query'], $params);

            $result = 'https://youtu.be/' . $params['v'];
        }

        return $result;
    }

    public static function youtubeEmbedUrl($shortUrl)
    {
        $result = '';

        /**
         * Transform "https://youtu.be/kNnWZkXbpWY"
         * to "https://www.youtube.com/embed/kNnWZkXbpWY"
         */
        if (false !== strpos($shortUrl, 'youtu.be')) {
            $result = 'https://www.youtube.com/embed/' . explode('?', array_reverse(explode('/', $shortUrl))[0])[0];
        }

        return $result;
    }

    /**
     * @param $embedUrl
     * @return string
     * @desc Generate image preview url from embed link, also support embed links with "list" parameter
     */
    public static function youtubeEmbedThumbnail($embedUrl)
    {
        return 'https://img.youtube.com/vi/' . explode('?', array_reverse(explode('/', $embedUrl))[0])[0] . '/0.jpg';
    }
}
