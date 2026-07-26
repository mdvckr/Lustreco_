<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    /**
     * Providers yang didukung.
     */
    protected $supportedProviders = ['google', 'apple'];

    /**
     * Redirect ke provider OAuth, atau ke simulator jika credential belum dikonfigurasi.
     */
    public function redirect(string $provider)
    {
        abort_unless(in_array($provider, $this->supportedProviders), 404);

        // Cek apakah credentials sudah diisi atau masih placeholder
        $clientId = config("services.{$provider}.client_id");
        if (empty($clientId) || $clientId === 'placeholder') {
            // Redirect ke simulator
            return redirect()->route('auth.simulator.show', $provider);
        }

        // Redirect ke provider OAuth asli (Google/Apple)
        try {
            return \Laravel\Socialite\Facades\Socialite::driver($provider)
                ->redirect();
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Gagal terhubung ke ' . ucfirst($provider) . '. Silakan coba lagi.');
        }
    }

    /**
     * Handle callback dari provider OAuth asli.
     */
    public function callback(string $provider)
    {
        abort_unless(in_array($provider, $this->supportedProviders), 404);

        try {
            $socialUser = \Laravel\Socialite\Facades\Socialite::driver($provider)->user();

            $user = User::updateOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                    'avatar' => $socialUser->getAvatar(),
                    'password' => Hash::make(Str::random(24)),
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user, remember: true);

            return redirect()->intended('/')->with('success', 'Berhasil masuk dengan ' . ucfirst($provider) . '!');
        } catch (\Exception $e) {
            return redirect()->route('login')
                ->with('error', 'Gagal login via ' . ucfirst($provider) . ': ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan halaman Sandbox Simulator (saat kredensial belum dikonfigurasi).
     */
    public function showSimulator(string $provider)
    {
        abort_unless(in_array($provider, $this->supportedProviders), 404);
        return view('auth.social-simulator', compact('provider'));
    }

    /**
     * Proses login dari Sandbox Simulator.
     */
    public function handleSimulator(Request $request, string $provider)
    {
        abort_unless(in_array($provider, $this->supportedProviders), 404);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::updateOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'password' => Hash::make(Str::random(24)),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user, remember: true);

        return redirect()->intended('/')->with('success', 'Berhasil masuk dengan ' . ucfirst($provider) . ' (Sandbox Simulator)!');
    }
}
