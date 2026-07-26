<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst($provider) }} Sign In | Lustreco®</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a2e 50%, #0f3460 100%);
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at center, rgba(66, 133, 244, 0.05) 0%, transparent 60%);
            animation: pulse 8s ease-in-out infinite alternate;
            pointer-events: none;
        }

        @keyframes pulse {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        }

        /* Provider banner */
        .provider-banner {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.75rem;
        }
        .provider-icon {
            width: 48px; height: 48px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem;
        }
        .provider-icon.google { background: rgba(66, 133, 244, 0.15); color: #4285f4; }
        .provider-icon.apple  { background: rgba(255, 255, 255, 0.1); color: #fff; }

        .provider-label {
            font-size: 1.35rem;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
        }

        /* Sandbox badge */
        .sandbox-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(251, 191, 36, 0.12);
            border: 1px solid rgba(251, 191, 36, 0.3);
            color: #fbbf24;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0.35rem 0.75rem;
            border-radius: 999px;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.4rem;
        }
        .card-subtitle {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.45);
            margin-bottom: 1.75rem;
            line-height: 1.5;
        }

        /* Quick Options */
        .quick-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .quick-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .quick-btn {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 0.9rem 0.75rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: left;
        }
        .quick-btn:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.25);
            transform: translateY(-1px);
        }
        .quick-btn.selected {
            background: rgba(66, 133, 244, 0.15);
            border-color: rgba(66, 133, 244, 0.5);
        }
        .quick-btn .avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4285f4, #34a853);
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }
        .quick-btn .qname { font-size: 0.8rem; font-weight: 600; color: white; }
        .quick-btn .qemail { font-size: 0.68rem; color: rgba(255,255,255,0.4); }

        /* Divider */
        .divider {
            display: flex; align-items: center; gap: 0.75rem;
            margin-bottom: 1.25rem;
        }
        .divider-line { flex: 1; height: 1px; background: rgba(255,255,255,0.1); }
        .divider-text { font-size: 0.7rem; color: rgba(255,255,255,0.35); white-space: nowrap; }

        /* Form */
        .form-group { margin-bottom: 1rem; }
        .form-label {
            display: block;
            font-size: 0.72rem;
            font-weight: 600;
            color: rgba(255,255,255,0.55);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 0.45rem;
        }
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 0.8rem 1rem;
            color: white;
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            outline: none;
            transition: all 0.2s ease;
        }
        .form-input::placeholder { color: rgba(255,255,255,0.28); }
        .form-input:focus {
            border-color: rgba(66, 133, 244, 0.6);
            background: rgba(66, 133, 244, 0.07);
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #4285f4, #0f9d58);
            border: none;
            border-radius: 14px;
            padding: 0.9rem 1.5rem;
            color: white;
            font-size: 0.875rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
            margin-top: 0.5rem;
        }
        .btn-submit.apple-btn {
            background: linear-gradient(135deg, #333, #000);
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(66, 133, 244, 0.35);
        }
        .btn-submit.apple-btn:hover {
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }

        /* Error */
        .error-msg {
            background: rgba(239,68,68,0.15);
            border: 1px solid rgba(239,68,68,0.35);
            color: #fca5a5;
            font-size: 0.8rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .back-link:hover { color: rgba(255,255,255,0.7); }
        .back-link i { margin-right: 0.35rem; font-size: 0.7rem; }

        footer {
            text-align: center;
            font-size: 0.75rem;
            color: rgba(255,255,255,0.25);
            padding: 1.25rem;
        }
    </style>
</head>
<body>

<main>
    <div class="card">
        <div class="provider-banner">
            <div class="provider-icon {{ $provider }}">
                @if($provider === 'google')
                    <i class="fa-brands fa-google"></i>
                @else
                    <i class="fa-brands fa-apple"></i>
                @endif
            </div>
            <span class="provider-label">{{ ucfirst($provider) }}</span>
        </div>

        <div style="text-align:center; margin-bottom:1.5rem;">
            <span class="sandbox-badge">
                <i class="fa-solid fa-flask" style="font-size:0.6rem"></i>
                Sandbox Simulator Mode
            </span>
        </div>

        <p class="card-title">Pilih atau masukkan akun</p>
        <p class="card-subtitle">Kredensial {{ ucfirst($provider) }} OAuth belum dikonfigurasi. Gunakan simulator ini untuk menguji alur login.</p>

        @if($errors->any())
            <div class="error-msg">
                <i class="fa-solid fa-triangle-exclamation" style="margin-right:0.4rem;"></i>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Quick options --}}
        <p class="quick-label">Pilih profil cepat</p>
        <div class="quick-options">
            @php
                $mockUsers = [
                    ['name' => 'Budi Santoso', 'email' => 'budi.santoso@gmail.com', 'initial' => 'BS'],
                    ['name' => 'Siti Rahma', 'email' => 'siti.rahma@gmail.com', 'initial' => 'SR'],
                    ['name' => 'Arif Wijaya', 'email' => 'arif.wijaya@gmail.com', 'initial' => 'AW'],
                    ['name' => 'Dewi Putri', 'email' => 'dewi.putri@gmail.com', 'initial' => 'DP'],
                ];
            @endphp
            @foreach($mockUsers as $mock)
                <button type="button" class="quick-btn"
                    onclick="fillForm('{{ $mock['name'] }}', '{{ $mock['email'] }}')">
                    <div class="avatar">{{ $mock['initial'] }}</div>
                    <div class="qname">{{ $mock['name'] }}</div>
                    <div class="qemail">{{ $mock['email'] }}</div>
                </button>
            @endforeach
        </div>

        <div class="divider">
            <div class="divider-line"></div>
            <span class="divider-text">atau masukkan data sendiri</span>
            <div class="divider-line"></div>
        </div>

        <form action="{{ route('auth.simulator.handle', $provider) }}" method="POST" id="simForm">
            @csrf
            <div class="form-group">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-input"
                    placeholder="Masukkan nama kamu..." value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-input"
                    placeholder="contoh@gmail.com" value="{{ old('email') }}" required>
            </div>
            <button type="submit" class="btn-submit {{ $provider === 'apple' ? 'apple-btn' : '' }}">
                <i class="fa-brands fa-{{ $provider }}" style="margin-right:0.5rem;"></i>
                Lanjutkan dengan {{ ucfirst($provider) }}
            </button>
        </form>

        <a href="{{ route('login') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i>Kembali ke halaman login
        </a>
    </div>
</main>

<footer>&copy; {{ date('Y') }} lustreco®. All rights reserved.</footer>

<script>
function fillForm(name, email) {
    document.getElementById('name').value = name;
    document.getElementById('email').value = email;
    document.querySelectorAll('.quick-btn').forEach(btn => btn.classList.remove('selected'));
    event.currentTarget.classList.add('selected');
}
</script>

</body>
</html>
