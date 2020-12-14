<?php
namespace Germania\Translator;

interface TranslatorInterface
{
    /**
     * Translates the given message.
     *
     * @param  string  $word
     * @return string
     *
     * @throws TranslatorExceptionInterface
     */
    public function __invoke( $word);
}
