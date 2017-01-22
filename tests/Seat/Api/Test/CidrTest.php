<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace Seat\Api\Test;


use PHPUnit\Framework\TestCase;
use Seat\Api\Validation\Custom\Cidr;


class CidrTest extends TestCase
{
    /**
     * @var Cidr
     */
    private $validator;

    public function setUp()
    {
        parent::setUp();
        $this->validator = new Cidr();
    }

    public function testInvalidString()
    {
        $value = "I'm not an ip address";
        $this->assertFalse($this->validator->validate('', $value, '', ''));
    }

    public function testSingleMissingCidr()
    {
        $value = "192.168.1.254";
        $this->assertFalse($this->validator->validate('', $value, '', ''));
    }

    public function testSingleInvalidIpRange()
    {
        $value = "192.168.1.256/32";
        $this->assertFalse($this->validator->validate('', $value, '', ''));
    }

    public function testSingleValidIpRange()
    {
        $value = "192.168.1.0/32";

        $this->assertTrue($this->validator->validate('', $value, '', ''));
    }

    public function testMultipleInvalidIpRange()
    {
        $value = "192.168.1.1/33,192.168.1.3/32";
        $this->assertFalse($this->validator->validate('', $value, '', ''));
    }

    public function testMultipleIpRange()
    {
        $value = "192.168.1.1/32,192.168.1.2/32";

        $this->assertTrue($this->validator->validate('', $value, '', ''));
    }
}
