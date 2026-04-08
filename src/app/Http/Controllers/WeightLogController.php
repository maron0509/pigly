<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightLogUpdateRequest;


class WeightLogController extends Controller
{
    public function index(Request $request)
  {
    $userId = Auth::id();
    $query = WeightLog::where('user_id', $userId);


    if ($request->start_date) {
            $query->where('date', '>=', $request->start_date);
        }

    if ($request->end_date) {
            $query->where('date', '<=', $request->end_date);
        }

        $weightLogs = $query->orderBy('date', 'desc')->paginate(8);;

    // 目標体重
    $target = WeightTarget::where('user_id', Auth::id())->first();
    $targetWeight = $target ? $target->target_weight : null;
    // 最新体重
    $latest = WeightLog::where('user_id', Auth::id())
            ->orderBy('date', 'desc')
            ->first();

$latestWeight = $latest ? $latest->weight : null;
    // 目標まで
    $remainingWeight = ($targetWeight ?? 0) - ($latestWeight ?? 0);

    return view('index',compact('targetWeight',
        'latestWeight',
        'remainingWeight',
        'weightLogs'));
  }

  public function store(WeightLogRequest $request)
{
    WeightLog::create([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'weight' => $request->weight,
        'calorie' => $request->calorie,
        'exercise_time' => $request->exercise_time,
        'exercise_content' => $request->exercise_content,
    ]);

    return redirect('/weight_logs');
  }
  public function goalSettingForm()
{
    $target = WeightTarget::where('user_id', auth()->id())->first();
    return view('goal', compact('target'));

}
public function goalSetting(Request $request)
    {
        $target = WeightTarget::where('user_id', Auth::id())->first();

        if ($target) {
        // 更新
        $target->update([
            'target_weight' => $request->target_weight
        ]);
    } else {
        // 新規作成
        WeightTarget::create([
            'user_id' => Auth::id(),
            'target_weight' => $request->target_weight
        ]);
    }

        return redirect('/weight_logs');
    }
    
    public function update(WeightLogUpdateRequest $request, WeightLog $weightLog)
    {
        // $weightLog = WeightLog::findOrFail($weightLogId);

    $weightLog->update([
        'date' => $request->date,
        'weight' => $request->weight,
        'calorie' => $request->calorie,
        'exercise_time' => $request->exercise_time,
        'exercise_content' => $request->exercise_content,
    ]);

        return redirect()->route('weight_logs.index');
    }

    public function destroy(WeightLog $weightLog)
{
    //WeightLog::findOrFail($weightLogId)->delete();
    $weightLog->delete();

    return redirect()->route('weight_logs.index');
}

    public function search(Request $request)
{
    return $this->index($request);
}

public function show(WeightLog $weightLog)
{
    //$weightLog = WeightLog::findOrFail($weightLogId);

    if ($weightLog->user_id !== auth()->id()) {
        abort(403);
    }
        return view('detail', compact('weightLog'));
 }
}
