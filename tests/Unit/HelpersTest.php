<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HelpersTest extends TestCase
{
    /**
     * Test for my_locale_url
     *
     * @return void
     */
    public function testMyLocaleUrl()
    {
        // 指定したページへ移動 (実在しないURLでもOK)
        $this->get('https://foo.com:8080');

        // ヘルパー関数を実行し、加工されたURLを取得する
        $actual = my_locale_url('ja');

        // 期待と実際が同じであることを確かめる
        $this->assertEquals('https://foo.com:8080/?lang=ja', $actual);

        // テスト2回目
        $this->get('http://bar.info:9999/?lang=ja');
        $actual = my_locale_url('en');
        $this->assertEquals('http://bar.info:9999/?lang=en', $actual);

        // テスト3回目
        $this->get('https://baz.io/posts?lang=en&page=23');
        $actual = my_locale_url('ja');
        $this->assertEquals('https://baz.io/posts?lang=ja&page=23', $actual);
    }
}
