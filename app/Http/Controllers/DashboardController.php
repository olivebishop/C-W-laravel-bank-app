<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class DashboardController extends Controller
{
   public function profile(){
      $user  = Auth::user();
      return view('dashboard.profile', compact('user'));
  }

  public function update_profile(Request $request){
      $user = Auth::user();
      $user->update($request->only(['username', 'email']));
      return redirect()->route('dashboard.profile')->with('success', 'Update successful.');
  }

   public function loans(){
      $user  = Auth::user();
      return view('dashboard.loans', compact('user'));
   }

   public function reports(){
         return view('dashboard/reports');
   }

   public function settings(){
         return view('dashboard/settings');
   }

}
