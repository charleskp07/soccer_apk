<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('css\style.css')}}">
    <style>
        /* Variables */
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --gray-color: #95a5a6;
            --white: #ffffff;
            --black: #000000;
            --transition: all 0.3s ease;
            --box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Base Styles */
        .main-header {
            background-color: var(--white);
            box-shadow: var(--box-shadow);
            width: 100%;
            z-index: 1000;
        }

        .navbar {
            padding: 0 20px;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        /* Logo */
        .logo {
            align-items: center;
        }

        .logo-img {
            height: 30px;
            width: auto;
            transition: var(--transition);
        }

        .logo-img:hover {
            transform: scale(1.05);
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav-item {
            margin-left: 25px;
            position: relative;
        }

        .nav-link {
            color: var(--dark-color);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            transition: var(--transition);
            padding: 8px 0;
        }

        .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        /* Login Button */
        .login-link {
            background-color: var(--primary-color);
            color: var(--white) !important;
            padding: 8px 20px;
            border-radius: 30px;
            transition: var(--transition);
        }

        .login-link:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Logout Button */
        .logout-form {
            margin: 0;
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--danger-color);
            cursor: pointer;
            font-weight: 500;
            font-family: inherit;
            font-size: inherit;
            display: flex;
            align-items: center;
            padding: 8px 0;
            transition: var(--transition);
        }

        .logout-btn i {
            margin-right: 8px;
        }

        .logout-btn:hover {
            color: #c0392b;
        }

        /* Hamburger Menu (Mobile) */
        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 1001;
        }

        .hamburger-line {
            display: block;
            width: 25px;
            height: 2px;
            background-color: var(--dark-color);
            margin: 5px 0;
            transition: var(--transition);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background-color: var(--white);
                flex-direction: column;
                align-items: flex-start;
                padding: 80px 30px 30px;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                z-index: 1000;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-item {
                margin: 15px 0;
                width: 100%;
            }

            .nav-link {
                padding: 12px 0;
                border-bottom: 1px solid var(--light-color);
                width: 100%;
            }

            .login-link {
                justify-content: center;
                margin-top: 20px;
            }

            .logout-btn {
                padding: 12px 0;
                width: 100%;
                border-bottom: 1px solid var(--light-color);
            }

            /* Hamburger animation */
            .hamburger.active .hamburger-line:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.active .hamburger-line:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active .hamburger-line:nth-child(3) {
                transform: rotate(-45deg) translate(5px, -5px);
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 0 15px;
            }

            .logo-img {
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <nav class="navbar">
            <div class="navbar-container">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{URL::asset('images/03fed74e302f3ba5ed2ce41cdd7eb1e2182dda65.png')}}" alt="Logo du site" class="logo-img">
                    </a>
                </div>

                <!-- Menu Hamburger (mobile) -->
                <button class="hamburger" id="hamburger">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>

                <!-- Navigation -->
                <ul class="nav-menu" id="nav-menu">
                    @if (Auth::check())
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="fas fa-calendar-alt"></i> Liste des matchs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('teams.index')}}" class="nav-link">
                                <i class="fas fa-users"></i> Équipes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('profil.index')}}" class="nav-link">
                                <i class="fas fa-user-circle"></i> Mon profil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link">
                                <i class="fas fa-user-circle"></i> Déconnexion 
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                @csrf
                                <button type="submit" class="logout-btn">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </li> --}}
                    @else
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link">
                                <i class="fas fa-calendar-alt"></i> Liste des matchs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('teams.index')}}" class="nav-link">
                                <i class="fas fa-users"></i> Équipes
                            </a>
                        </li>

                        <li class="">
                            <a href="{{route('auth.login')}}" class="">
                                Se connecter
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>








    @yield('content')

    <script>
        // Toggle mobile menu
        document.getElementById('hamburger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.getElementById('nav-menu').classList.toggle('active');
        });

        // Close menu when clicking on a link (mobile)
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('hamburger').classList.remove('active');
                document.getElementById('nav-menu').classList.remove('active');
            });
        });
    </script>
        
</body>
</html>