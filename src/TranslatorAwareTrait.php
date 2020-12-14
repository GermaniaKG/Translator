<?php
namespace Germania\Translator;

trait TranslatorAwareTrait
{


    /**
     * @var \Germania\Translator\TranslatorInterface
     */
    protected $translator;


    /**
     * @param \Germania\Translator\TranslatorInterface $translator
     */
    public function setTranslator( TranslatorInterface $translator ) : self
    {
        $this->translator = $translator;
        return $this;
    }


    /**
     * @return null|\Germania\Translator\TranslatorInterface
     */
    public function getTranslator( ) : ?TranslatorInterface
    {
        return $this->translator;
    }
}
