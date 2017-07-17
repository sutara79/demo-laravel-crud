<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MyHelperTest extends TestCase
{
    /**
     * Test for my_locale_url
     *
     * @return void
     */
    public function testMyLocaleUrl()
    {
        $this->get('https://foo.com:8080');
        $actual = my_locale_url('ja');
        $this->assertEquals('https://foo.com:8080/?lang=ja', $actual);

        $this->get('http://bar.info:9999/?lang=ja');
        $actual = my_locale_url('en');
        $this->assertEquals('http://bar.info:9999/?lang=en', $actual);

        $this->get('https://baz.io/posts?lang=en&page=23');
        $actual = my_locale_url('ja');
        $this->assertEquals('https://baz.io/posts?lang=ja&page=23', $actual);
    }
}
