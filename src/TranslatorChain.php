<?php
namespace Germania\Translator;

class TranslatorChain implements TranslatorInterface
{

    /**
     * @var TranslatorInterface[]
     */
    protected $translators;


    /**
     * @param TranslatorInterface[] $translators
     */
    public function __construct( array $translators )
    {
        $this->setTranslators( $translators );
    }


    /**
     * @param TranslatorInterface[] $translators
     */
    public function setTranslators( array $translators ) : self
    {
        $this->translators = $translators;
        return $this;
    }


    /**
     * @param TranslatorInterface $translator
     */
    public function push( TranslatorInterface $translator ) : self
    {
        array_push($this->translators, $translator);
        return $this;
    }


    /**
     * @inheritDoc
     */
    public function __invoke( $word, string $domain = null)
    {
        foreach($this->translators as $translator)
        {
            $word = $translator($word, $domain);
        }
        return $word;
    }

}
