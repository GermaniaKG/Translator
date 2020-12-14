<?php
namespace Germania\Translator;

use Laminas\I18n\Translator\TranslatorInterface as LaminasTranslator;

class LaminasTranslatorCallable implements TranslatorInterface
{

    /**
     * @param \Laminas\I18n\Translator\TranslatorInterface $translator Laminas Translator
     */
    public function __construct(LaminasTranslator $translator)
    {
        $this->setLaminasTranslator($translator);
    }



    /**
     * @param \Laminas\I18n\Translator\TranslatorInterface $translator Laminas Translator
     */
    public function setLaminasTranslator(LaminasTranslator $translator) : self
    {
        $this->translator = $translator;
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function __invoke( string $word, string $domain = null)
    {
        return (empty($domain))
        ? $this->translator->translate($word)
        : $this->translator->translate($word, $domain);
    }

}
