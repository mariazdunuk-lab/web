<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoftShop</title>

    <style>
    body {
        background: #faf6ff; /* ніжний лавандовий фон */
        font-family: "Inter", sans-serif;
    }

    .soft-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 28px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.05);
    }

    .btn-soft {
        padding: 10px 24px;
        background: #d7b4f3;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-soft:hover {
        background: #c48eea;
    }

    .btn-outline-soft {
        padding: 10px 24px;
        border: 2px solid #d7b4f3;
        border-radius: 12px;
        color: #8b5fbf;
        font-weight: 600;
        transition: 0.2s ease;
    }

    .btn-outline-soft:hover {
        background: #f1e5ff;
    }

    nav {
        background: #ffffff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 16px 24px;
    }

    nav a {
        margin-left: 24px;
        color: #7a55aa;
        font-weight: 600;
    }

    nav a:hover {
        color: #a06de8;
    }

    .nav-link-admin {
        margin-left: 20px;
        color: #7b4bda;
        font-weight: 600;
        border-bottom: 2px solid transparent;
        transition: 0.2s;
    }

    .nav-link-admin:hover {
        border-bottom: 2px solid #7b4bda;
    }


    .brand-title {
        font-size: 26px;
        font-weight: 800;
        color: #7a55aa;
        letter-spacing: -0.5px;
    }

        .auth-wrapper {
        max-width: 480px;
        margin: 40px auto;
    }

    .auth-card {
        background: #ffffff;
        padding: 32px;
        border-radius: 20px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.06);
    }

    .auth-card h2 {
        color: #7a55aa;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .auth-input {
        width: 100%;
        padding: 12px;
        border: 2px solid #e8d8ff;
        border-radius: 12px;
        margin-bottom: 16px;
        background: #faf6ff;
    }

    .auth-input:focus {
        outline: none;
        border-color: #c9a4f4;
        background: #ffffff;
    }

    .auth-label {
        font-size: 14px;
        font-weight: 600;
        color: #7a55aa;
        margin-bottom: 4px;
        display: block;
    }

    .auth-link {
        color: #7a55aa;
        font-weight: 600;
    }

    .auth-link:hover {
        color: #a06de8;
    }

    .btn-edit {
        background: #8a5cf6;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
    }

    .btn-delete {
        background: #ff6b6b;
        color: white;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
    }

    .btn-edit:hover {
        background: #7744e6;
    }

    .btn-delete:hover {
        background: #ff4a4a;
    }

    .nav-brand {
            font-size: 28px;
            font-weight: 700;
            color: #8b5cf6;
        }

        .nav-link {
            margin-left: 22px;
            font-size: 16px;
            color: #4b5563;
            font-weight: 500;
            transition: 0.25s;
        }

        .nav-link:hover {
            color: #8b5cf6;
        }

        .nav-link-active {
            color: #8b5cf6;
            font-weight: 700 !important;
        }

        .container-soft {
            max-width: 1100px;
            margin: 0 auto;
            padding: 25px;
        }

        .btn-soft {
            background: #8b5cf6;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-soft:hover {
            background: #7349d8;
        }
</style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <!-- Top Navbar -->
    <header class="bg-white shadow">
        <div class="container-soft flex justify-between items-center">

            <a href="{{ route('home') }}" class="nav-brand">SoftShop</a>

            <nav class="flex items-center">

                <a href="{{ route('home') }}" class="nav-link">Головна</a>

                <a href="{{ route('products.index') }}"
                class="nav-link {{ request()->is('products') ? 'nav-link-active' : '' }}">
                    Товари
                </a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('products.create') }}" class="nav-link">Додати товар</a>
                        <a href="{{ route('categories.index') }}" class="nav-link">Категорії</a>
                    @endif

                    @if(auth()->check() && auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-purple-600 hover:underline">
                            Адмін-панель
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="nav-link">Вихід</button>
                    </form>

                @else
                    <a href="{{ route('login') }}" class="nav-link">Вхід</a>
                    <a href="{{ route('register') }}" class="nav-link">Реєстрація</a>
                @endauth
            </nav>
        </div>
    </header>

    



    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-200 text-green-900 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 text-red-900 p-3 text-center">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-200 text-red-900 p-3 text-center">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Page Content -->
    <main class="max-w-5xl mx-auto py-6 px-4">
        @yield('content')
    </main>

</body>
</html>
