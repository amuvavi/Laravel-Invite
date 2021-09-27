<?php

namespace App\Http\Controllers;

use App\Rules\InviteCodeHasQuantity;
use Illuminate\Http\Request;
use App\Models\InviteCode;
use App\Rules\InviteCodeNotExpired;
use App\Http\Requests\ActivateStoreRequest;

class ActivateStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(ActivateStoreRequest $request)
    {
      $request->user()->activate();

      $request->inviteCode->increment('quantity_used');

      return redirect()->route('dashboard');
    }
}
