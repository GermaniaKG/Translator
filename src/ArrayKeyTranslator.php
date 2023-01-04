<?php
namespace Germania\Translator;

class ArrayKeyTranslator implements TranslatorInterface {


    /**
     * @var string
     */
    public $client_lang;


    /**
     * @var string
     */
    public $default_lang;


    /**
     * @param string $client_lang   Example: "de"
     * @param string $default_lang  Example: "en"
     */
    public function __construct( string $client_lang, string $default_lang )
    {
        $this->setLanguage($client_lang);
        $this->setDefaultLanguage($default_lang);
    }


    /**
     * @param string $lang
     */
    public function setLanguage( string $lang ) : self
    {
        $this->client_lang = strtolower($lang);
        return $this;
    }


    /**
     * @param string $lang
     */
    public function setDefaultLanguage( string $lang ) : self
    {
        $this->default_lang = strtolower($lang);
        return $this;
    }


    /**
     * @return string
     */
    public function getLanguage(  )
    {
        return $this->client_lang;
    }


    /**
     * @return string
     */
    public function getDefaultLanguage(  )
    {
        return $this->default_lang;
    }


    /**
     * @param  string[]|mixed  $variable     String or Array with language keys
     *
     * @return mixed
     *
     * @throws \InvalidArgumentException|TranslatorExceptionInterface if $variable is neither string, nor array, nor ArrayAccess
     * @throws \RuntimeException|TranslatorExceptionInterface if $variable array does not contain neither client nor default language keys
     */
    public function __invoke( $variable, string $domain = null)
    {
        if (is_string($variable)):
            return $variable;
        endif;

        if (!is_array($variable) and !$variable instanceOf \ArrayAccess):
            $emsg = sprintf("Expected string or array or ArrayAccess, got '%s'", gettype($variable));
            throw new TranslatorInvalidArgumentException($emsg);
        endif;

        if (isset($variable[ $this->client_lang ])):
            return $variable[ $this->client_lang ];
        elseif (isset($variable[ $this->default_lang ])):
            return $variable[ $this->default_lang ];
        else:
            $msg = sprintf("Could not find neither '%s' nor '%s' in variable.", $this->client_lang, $this->default_lang);
            throw new TranslatorRuntimeException($msg);
        endif;

    }
}
