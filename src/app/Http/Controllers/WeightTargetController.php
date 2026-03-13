<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Http\Requests\WeightTargetRequest;

class WeightTargetController extends Controller
{
    public function step2()
    {
        return view('register_step2');
    }

    public function storeStep2(WeightTargetRequest $request)
    {
    WeightTarget::create([
        'user_id' => Auth::id(),
        'target_weight' => $request->target_weight
        
    ]);
    
    return redirect('/weight_logs');
    }  
    

    public function update(WeightTargetRequest $request)
    {
        WeightTarget::updateOrCreate(
            ['user_id' => Auth::id()],
            ['target_weight' => $request->target_weight]
        );

        return redirect('/weight_logs');
    }
}
