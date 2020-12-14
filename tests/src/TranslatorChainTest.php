<?php
namespace tests;

use Germania\Translator\LaminasTranslatorCallable;
use Germania\Translator\TranslatorChain;
use Germania\Translator\TranslatorInterface;
use Laminas\I18n\Translator\Translator as LaminasTranslator;

use Prophecy\PhpUnit\ProphecyTrait;


class TranslatorChainTest extends \PHPUnit\Framework\TestCase
{
    use ProphecyTrait;

    public $laminas_translator;


    public function setUp() : void
    {
        $this->laminas_translator = new LaminasTranslator;
        parent::setUp();
    }

    public function testInstantiation()
    {
        $translator_mock = $this->prophesize(TranslatorInterface::class);
        $translator = $translator_mock->reveal();

        $translators = array($translator);

        $sut = new TranslatorChain( $translators );
        $this->assertInstanceOf(TranslatorInterface::class, $sut);

        return $sut;
    }

    /**
     * @depends testInstantiation
     */
    public function testSetters( $sut )
    {
        $translator_mock = $this->prophesize(TranslatorInterface::class);
        $translator = $translator_mock->reveal();

        $translators = array($translator);

        $result = $sut->setTranslators($translators);
        $this->assertInstanceOf(TranslatorInterface::class, $result);

        return $sut;
    }

    /**
     * @depends testInstantiation
     */
    public function testPushMethod( $sut )
    {
        $translator_mock = $this->prophesize(TranslatorInterface::class);
        $translator = $translator_mock->reveal();

        $translators = array($translator);

        $result = $sut->push($translator);
        $this->assertInstanceOf(TranslatorInterface::class, $result);

        return $sut;
    }


}
