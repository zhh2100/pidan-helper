<?php
namespace Tests;

use pidan\helper\Str;

class StrTest extends TestCase
{
    public function testCamel()
    {
        $this->assertSame('fooBar', Str::camel('FooBar'));
        $this->assertSame('fooBar', Str::camel('FooBar'));
        $this->assertSame('fooBar', Str::camel('foo_bar'));
        $this->assertSame('fooBar', Str::camel('_foo_bar'));
        $this->assertSame('fooBar', Str::camel('_foo_bar_'));
    }

    public function testStudly()
    {
        $this->assertSame('FooBar', Str::studly('fooBar'));
        $this->assertSame('FooBar', Str::studly('_foo_bar'));
        $this->assertSame('FooBar', Str::studly('_foo_bar_'));
        $this->assertSame('FooBar', Str::studly('_foo_bar_'));
    }

    public function testSnake()
    {
        $this->assertSame('pidan_p_h_p_framework', Str::snake('PidanPHPFramework'));
        $this->assertSame('pidan_php_framework', Str::snake('PidanPhpFramework'));
        $this->assertSame('pidan php framework', Str::snake('PidanPhpFramework', ' '));
        $this->assertSame('pidan_php_framework', Str::snake('Pidan Php Framework'));
        $this->assertSame('pidan_php_framework', Str::snake('Pidan    Php      Framework   '));
        // ensure cache keys don't overlap
        $this->assertSame('pidan__php__framework', Str::snake('PidanPhpFramework', '__'));
        $this->assertSame('pidan_php_framework_', Str::snake('PidanPhpFramework_', '_'));
        $this->assertSame('pidan_php_framework', Str::snake('pidan php Framework'));
        $this->assertSame('pidan_php_frame_work', Str::snake('pidan php FrameWork'));
        // prevent breaking changes
        $this->assertSame('foo-bar', Str::snake('foo-bar'));
        $this->assertSame('foo-_bar', Str::snake('Foo-Bar'));
        $this->assertSame('foo__bar', Str::snake('Foo_Bar'));
        $this->assertSame('żółtałódka', Str::snake('ŻółtaŁódka'));
    }

    public function testTitle()
    {
        $this->assertSame('Welcome Back', Str::title('welcome back'));
    }

    public function testRandom()
    {
        $this->assertIsString(Str::random(10));
    }

    public function testUpper()
    {
        $this->assertSame('USERNAME', Str::upper('username'));
        $this->assertSame('USERNAME', Str::upper('userNaMe'));
    }
}
