<?php

/**
 * Part of the parsetweet package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * @package    parsetweet
 * @version    1.0.0
 * @author     james2doyle
 * @license    MIT
 */

namespace james2doyle\parsetweet\Tests;

use PHPUnit_Framework_TestCase;

class ParsetweetTest extends PHPUnit_Framework_TestCase
{

    /** @test */
    public function the_parse_tweet_function_exists()
    {
        $this->assertTrue(function_exists('parse_tweet'));
    }

    /** @test */
    public function it_parses_simple_text()
    {
        $actual = parse_tweet("I love to tweet!");
        $expected = "I love to tweet!";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_simple_links()
    {
        $actual = parse_tweet("This is a simple link https://google.com");
        $expected = "This is a simple link <a href=\"https://google.com\" target=\"_blank\">https://google.com</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_simple_mentions()
    {
        $actual = parse_tweet("This is a simple mention for @james2doyle");
        $expected = "This is a simple mention for <a title=\"@james2doyle\" href=\"http://twitter.com/james2doyle\" target=\"_blank\">@james2doyle</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_simple_mentions_2()
    {
        $actual = parse_tweet("This is a simple mention for @JAMES2DOYLE");
        $expected = "This is a simple mention for <a title=\"@JAMES2DOYLE\" href=\"http://twitter.com/JAMES2DOYLE\" target=\"_blank\">@JAMES2DOYLE</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_simple_hashtags()
    {
        $actual = parse_tweet("This is a simple #hashtag");
        $expected = "This is a simple <a title=\"#hashtag\" href=\"https://twitter.com/search?q=%23hashtag&src=hash\" target=\"_blank\">#hashtag</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_ignores_non_mentions()
    {
        $actual = parse_tweet("My email is james2doyle@gmail.com");
        $expected = "My email is james2doyle@gmail.com";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_ignores_non_links()
    {
        $actual = parse_tweet("This mentiones HTTP and :// but it is not a proper link.com");
        $expected = "This mentiones HTTP and :// but it is not a proper link.com";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_ignores_non_hashtags()
    {
        $actual = parse_tweet("I have a # but it is not valid. Neither is a hash#tag in the middle.");
        $expected = "I have a # but it is not valid. Neither is a hash#tag in the middle.";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_emojis()
    {
        $actual = parse_tweet("The gym rocks my world everyday #getfitforthesummer 💪🏼🏋🏽");
        $expected = "The gym rocks my world everyday <a title=\"#getfitforthesummer\" href=\"https://twitter.com/search?q=%23getfitforthesummer&src=hash\" target=\"_blank\">#getfitforthesummer</a> 💪🏼🏋🏽";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_complex_tweet_1()
    {
        $actual = parse_tweet("This #weather is crazy! @weatherchannel");
        $expected = "This <a title=\"#weather\" href=\"https://twitter.com/search?q=%23weather&src=hash\" target=\"_blank\">#weather</a> is crazy! <a title=\"@weatherchannel\" href=\"http://twitter.com/weatherchannel\" target=\"_blank\">@weatherchannel</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_complex_tweet_2()
    {
        $actual = parse_tweet("@weatherchannel: please turn on the #snow machine. #toodamnhot #turnontheac");
        $expected = "<a title=\"@weatherchannel\" href=\"http://twitter.com/weatherchannel\" target=\"_blank\">@weatherchannel</a>: please turn on the <a title=\"#snow\" href=\"https://twitter.com/search?q=%23snow&src=hash\" target=\"_blank\">#snow</a> machine. <a title=\"#toodamnhot\" href=\"https://twitter.com/search?q=%23toodamnhot&src=hash\" target=\"_blank\">#toodamnhot</a> <a title=\"#turnontheac\" href=\"https://twitter.com/search?q=%23turnontheac&src=hash\" target=\"_blank\">#turnontheac</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_complex_tweet_3()
    {
        $actual = parse_tweet("Please follow @james2doyle @warpaintmedia and @twitter #followfriday");
        $expected = "Please follow <a title=\"@james2doyle\" href=\"http://twitter.com/james2doyle\" target=\"_blank\">@james2doyle</a> <a title=\"@warpaintmedia\" href=\"http://twitter.com/warpaintmedia\" target=\"_blank\">@warpaintmedia</a> and <a title=\"@twitter\" href=\"http://twitter.com/twitter\" target=\"_blank\">@twitter</a> <a title=\"#followfriday\" href=\"https://twitter.com/search?q=%23followfriday&src=hash\" target=\"_blank\">#followfriday</a>";
        $this->assertEquals($actual, $expected);
    }

    /** @test */
    public function it_parses_complex_tweet_4()
    {
        $actual = parse_tweet("@james2doyle you need to visit https://warpaintmedia.ca because it is #cool!");
        $expected = "<a title=\"@james2doyle\" href=\"http://twitter.com/james2doyle\" target=\"_blank\">@james2doyle</a> you need to visit <a href=\"https://warpaintmedia.ca\" target=\"_blank\">https://warpaintmedia.ca</a> because it is <a title=\"#cool\" href=\"https://twitter.com/search?q=%23cool&src=hash\" target=\"_blank\">#cool</a>!";
        $this->assertEquals($actual, $expected);
    }
}
