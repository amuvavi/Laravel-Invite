<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InviteCode;

class InviteCodeIndexController extends Controller
{
   public function __invoke(Request $request)
   {
       return view('invites.index',[
           'inviteCodes' => $request->user()->inviteCodes
       ]);
   }
}
