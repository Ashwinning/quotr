<?php
/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright MMXII Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

require_once 'Math/BigInteger.php';

abstract class Unit_Math_BigInteger_TestCase extends PhpseclibTestCase
{
    static public function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::reRequireFile('Math/BigInteger.php');
    }

    public function getInstance($x = 0, $base = 10)
    {
        return new Math_BigInteger($x, $base);
    }

    public function testConstructorBase2()
    {
        // 2**65 = 36893488147419103232
        $this->assertSame('36893488147419103232', (string) $this->getInstance('1' . str_repeat('0', 65), 2));
    }

    public function testConstructorBase10()
    {
        $this->assertSame('18446744073709551616', (string) $this->getInstance('18446744073709551616'));
    }

    public function testConstructorBase16()
    {
        $this->assertSame('50',                        (string) $this->getInstance('0x32', 16));
        $this->assertSame('12345678910',            (string) $this->getInstance('0x2DFDC1C3E', 16));
        $this->assertSame('18446744073709551615',    (string) $this->getInstance('0xFFFFFFFFFFFFFFFF', 16));
        $this->assertSame('18446744073709551616',    (string) $this->getInstance('0x10000000000000000', 16));
    }

    public function testToByt