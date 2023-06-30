namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Logic to update the password
        $user = User::findOrFail($id);

        // Check if the current password matches the user's existing password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect');
        }

        // Update the user's password
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('settings')->with('success', 'Password updated successfully');
    }
}

