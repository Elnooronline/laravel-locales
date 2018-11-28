<?php

namespace Tests\Unit;

use Tests\TestCase;
use Elnooronline\LaravelLocales\Facades\Locales;
use Elnooronline\LaravelLocales\Exceptions\NotSupportedLocaleException;

class LocalesUnitTest extends TestCase
{
    /** @test */
    public function it_can_get_array_for_supported_locales()
    {

       $this->assertTrue(is_array(Locales::get()));

       $this->assertEquals(count(Locales::get()), 2);
    }

    /** @test */
    public function it_can_display_the_current_locale_instance()
    {
        $this->app->setLocale('en');
        $this->assertEquals(Locales::current()->code, 'en');
        $this->assertEquals(Locales::current()->name, 'English');
        $this->assertEquals(Locales::current()->dir, 'ltr');
        $this->assertEquals(Locales::current()->flag, '/images/flages/us.png');

        $this->app->setLocale('ar');
        $this->assertEquals(Locales::current()->code, 'ar');
        $this->assertEquals(Locales::current()->name, 'العربية');
        $this->assertEquals(Locales::current()->dir, 'rtl');
        $this->assertEquals(Locales::current()->flag, '/images/flages/sa.png');
    }
    /** @test */
    public function it_can_set_the_application_locale()
    {
        Locales::set('ar');
        $this->assertEquals($this->app->getLocale(), 'ar');

        $this->expectException(NotSupportedLocaleException::class);

        Locales::set('fr');
    }

    /** @test */
    public function it_can_display_the_current_locale_properties()
    {
        Locales::set('ar');
        $this->assertEquals(Locales::getCode(), 'ar');
        $this->assertEquals(Locales::getName(), 'العربية');
        $this->assertEquals(Locales::getDir(), 'rtl');
        $this->assertEquals(Locales::getFlag(), '/images/flages/sa.png');

        Locales::set('en');
        $this->assertEquals(Locales::getCode(), 'en');
        $this->assertEquals(Locales::getName(), 'English');
        $this->assertEquals(Locales::getDir(), 'ltr');
        $this->assertEquals(Locales::getFlag(), '/images/flages/us.png');
    }
}