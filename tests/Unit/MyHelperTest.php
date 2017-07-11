<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MyHelperTest extends TestCase
{
    /**
     * Test for myLocaleUrl
     *
     * @return void
     */
    public function testMyLocaleUrl()
    {
        $this->_assertMyLocaleUrl('/',
                                  '/?lang=ja',
                                  'ja');
        $this->_assertMyLocaleUrl('/?lang=ja',
                                  '/?lang=en',
                                  'en');
        $this->_assertMyLocaleUrl('/posts?lang=en&page=1',
                                  '/posts?lang=ja&page=1',
                                  'ja');
    }

    /**
     * Sub method for testMyLocaleUrl.
     *
     * @return void
     */
    private function _assertMyLocaleUrl($current, $expected, $locale)
    {
        $this->get($current);
        $expected = url('/').$expected; // Not "url($expected)"
        $actual = myLocaleUrl($locale);
        $this->assertEquals($expected, $actual);
    }
}
