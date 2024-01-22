<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Branch;
use App\Models\CallBack;
use App\Services\BranchService;
use App\Services\VetService;
use Illuminate\Http\Request;
use Mail;

class CallBackController extends Controller
{
    protected VetService $vetApi;

    public function __construct(VetService $vetApi)
    {
        $this->vetApi = $vetApi;
    }

    public function thanks (Request $request) {
        $validated =  $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'city' => 'required',
            'message' => 'nullable'
        ]);

        $mailData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
            'clinic' => Branch::query()->where(['id' => $request->city])->first()->title,
        ];

        CallBack::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'branch_id' => $request['city'],
            'message' => $request['message']
        ]);

        Mail::to(BranchService::current()->email)->send(new SendMail($mailData));

        return view('thanks');
    }
}
