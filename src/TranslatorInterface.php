<?php
namespace Germania\Translator;

interface TranslatorInterface
{
    /**
     * Translates the given message.
     *
     * @param  string      $word
     * @return string
     */
    public function __invoke( string $word);
}
