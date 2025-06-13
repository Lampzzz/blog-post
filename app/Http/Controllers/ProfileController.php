<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
  public function index()
  {
    return view('profile.index');
  }

  public function destroy(Request $request)
  {

    $user = Auth::user();

    Auth::logout();

    User::destroy($user->id);

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'Your account has been permanently deleted.');
  }

  public function update(Request $request)
  {
    $user = Auth::user();

    $validated = $request->validate([
      'name' => 'required|string|min:3',
      'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user->id)],
      'password' => 'nullable|min:3',
    ]);

    // Only update password if it's provided
    if (empty($validated['password'])) {
      unset($validated['password']);
    }

    User::where('id', $user->id)->update($validated);

    return redirect('/profile');
  }
}
