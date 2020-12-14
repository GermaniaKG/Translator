<?php
namespace tests;

use Germania\Translator\LaminasTranslatorCallable;
use Germania\Translator\TranslatorInterface;
use Laminas\I18n\Translator\Translator as LaminasTranslator;

use Prophecy\PhpUnit\ProphecyTrait;


class LaminasTranslatorCallableTest extends \PHPUnit\Framework\TestCase
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
        $sut = new LaminasTranslatorCallable($this->laminas_translator);
        $sut->setLaminasTranslator($this->laminas_translator);

        $this->assertInstanceOf(TranslatorInterface::class, $sut);

        return $sut;
    }


}
