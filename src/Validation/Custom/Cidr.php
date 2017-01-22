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

namespace Seat\Api\Validation\Custom;
use IPTools\Range;


/**
 * Class Cidr
 * @package Seat\Api\Validation\Custom
 */
class Cidr
{
    /**
     * Validate if the $value is a valid ip using cidr
     */
    public function validate($attribute, $value, $parameters, $validator)
    {
        if (str_contains($value, ',')) {
            $values = explode(',', $value);
            foreach ($values as $value) {
                if (!str_contains($value, '/')) {
                    return false;
                }

                try {
                    $range = Range::parse($value);
                    if ((!$range->count() > 0) || (!$range->valid())) {
                        return false;
                    }
                } catch (\Exception $e) {
                    return false;
                }
            }

            return true;
        }

        if (!str_contains($value, '/')) {
            return false;
        }

        try {
            $range = Range::parse($value);
            return ($range->count() > 0) && $range->valid();
        } catch (\Exception $e) {
            return false;
        }
    }
}