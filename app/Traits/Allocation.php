<?php

namespace App\Traits;

use App\Models\Fcenter;
use App\Models\Allocation as AllocationTable;

trait Allocation
{

    // allocate amount to fcenter by admin
    public function allocateAmount($id, $amount, $data, Fcenter $model)
    {
        try {

            $data->validate([
                'id' => 'exists:fcenters,id',
            ]);

            $fc = $model::allocateById($id, $amount);

            if ($fc) {
                AllocationTable::create([
                    'fc_id' => $id,
                    'amount' => $amount,
                    'status' => '1',
                    'addition' => 'transferred'
                ]);
            }
        } catch (\Exception $ex) {
            return back()->with('fail', $ex->getMessage());
        }
    }

    // update on transaction by fcenter
    public function updateById($id, $amount)
    {
    }
}
