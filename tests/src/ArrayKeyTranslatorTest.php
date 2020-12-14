<?php
namespace tests;

use Germania\Translator\ArrayKeyTranslator;
use Germania\Translator\TranslatorInterface;
use Laminas\I18n\Translator\Translator as LaminasTranslator;

use Prophecy\PhpUnit\ProphecyTrait;


class ArrayKeyTranslatorTest extends \PHPUnit\Framework\TestCase
{
    use ProphecyTrait;



    public function testInstantiation()
    {
        $sut = new ArrayKeyTranslator( "de", "en" );
        $this->assertInstanceOf(TranslatorInterface::class, $sut);

        return $sut;
    }

    /**
     * @dataProvider provideTranslations
     * @depends testInstantiation
     */
    public function testTranslation( $lang, $default_lang, $msgId, $expectedResult, $sut )
    {
        $sut->setLanguage($lang);
        $sut->setDefaultLanguage($default_lang);

        $result = $sut($msgId);
        $this->assertEquals($result, $expectedResult);

        return $sut;
    }


    public function provideTranslations( )
    {
        return array(
            [ "de", "en", "foo", "foo" ],
            [ "de", "en", ["de" => "foo"], "foo" ],
            [ "tr", "en", ["en" => "bar"], "bar" ],
        );
    }

}
