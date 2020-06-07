<?php

namespace PaulhenriL\LaravelEngine\Services;

use Illuminate\Http\Response;
use PaulhenriL\LaravelEngine\Exceptions\FragmentNotFoundException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ResponseEditor
{
    /**
     * Add the given scripts in the response.
     *
     * @param Response|SymfonyResponse $response
     * @param string[] $scripts
     *
     * @throws FragmentNotFoundException
     */
    public static function addScripts($response, array $scripts)
    {
        $scriptTags = array_reduce($scripts, function ($acc, $script) {
            return $acc . "<script src=\"$script\"></script>";
        });

        static::addBefore($response, '</body>', $scriptTags);
    }

    /**
     * Add the given styles to the response.
     *
     * @param Response|SymfonyResponse $response
     * @param string[] $styles
     *
     * @throws FragmentNotFoundException
     */
    public static function addStyles($response, array $styles)
    {
        $styleTags = array_reduce($styles, function ($acc, $style) {
            return $acc . "<link rel=\"stylesheet\" href=\"$style\">";
        });

        static::addBefore($response, '</head>', $styleTags);
    }

    /**
     * Add the given content before the given fragment. If the given fragment
     * cannot be found an exception will be thrown.
     *
     * @param Response|SymfonyResponse $response
     * @param string $fragment
     * @param string $content
     *
     * @return Response|SymfonyResponse
     * @throws FragmentNotFoundException
     */
    public static function addBefore($response, string $fragment, string $content)
    {
        $responseContent = $response->getContent();
        $fragmentPosition = strpos($responseContent, $fragment);

        if ($fragmentPosition === false) {
            throw new FragmentNotFoundException(
                "The \"$fragment\" fragment could not be found"
            );
        }

        $start = substr($responseContent, 0, $fragmentPosition);
        $end = substr($responseContent, $fragmentPosition);

        $response->setContent($start . $content . $end);

        return $response;
    }
}
