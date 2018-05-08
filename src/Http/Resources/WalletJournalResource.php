<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017, 2018  Leon Jacobs
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

namespace Seat\Api\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WalletJournalResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {

        return [

            'id'              => $this->id,
            'date'            => $this->date,
            'ref_type'        => $this->ref_type,
            'first_party_id'  => $this->first_party_id,
            'first_party'     => $this->first_party,
            'second_party_id' => $this->second_party_id,
            'second_party'    => $this->second_party,
            'amount'          => $this->amount,
            'balance'         => $this->balance,
            'reason'          => $this->reason,
            'tax_receiver_id' => $this->tax_receiver_id,
            'tax'             => $this->tax,
            'context_id'      => $this->context_id,
            'context_id_type' => $this->context_id_type,
            'description'     => $this->description,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}
