<?php
namespace Germania\Translator;

use Laminas\I18n\Translator\TranslatorInterface as LaminasTranslator;

class LaminasTranslatorCallable implements TranslatorInterface
{

    /**
     * @var LaminasTranslator
     */
    public $translator;

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
     *
     * @throws TranslatorRuntimeException when Laminas Translator does
     */
    public function __invoke( $word, string $domain = null)
    {
        try {
            return (empty($domain))
            ? $this->translator->translate($word)
            : $this->translator->translate($word, $domain);
        }
        catch (\Throwable $e )
        {
            throw new TranslatorRuntimeException("Caught exception in Laminas Translator", 1, $e);
        }
    }

}
