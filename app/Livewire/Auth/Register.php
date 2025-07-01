<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        try{
            $validated['password'] = Hash::make($validated['password']);
        
            $user = User::create($validated);
        
            // ✅ Assign role ID 3 = Core User
            $role = Role::find(3);
            if ($role) {
                $user->assignRole($role->name);
            }
        
            event(new Registered($user));
        
            Auth::login($user);
        
            $this->redirect(route('dashboard'));

        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'register' => 'Registration failed. Please check your details and try again.',
            ]);
        }
    }
}
