<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Connexion Administrateur | PayGuard Admin</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-surface": "#2e3132",
                        "surface-container": "#edeeef",
                        "on-background": "#191c1d",
                        "surface-container-highest": "#e1e3e4",
                        "on-tertiary-container": "#ffc2a7",
                        "on-secondary": "#ffffff",
                        "primary": "#003f87",
                        "tertiary": "#722b00",
                        "on-error": "#ffffff",
                        "on-surface": "#191c1d",
                        "on-secondary-fixed": "#141d23",
                        "secondary": "#575f67",
                        "on-primary-fixed-variant": "#004491",
                        "surface-container-high": "#e7e8e9",
                        "surface-container-lowest": "#ffffff",
                        "error": "#ba1a1a",
                        "surface-bright": "#f8f9fa",
                        "surface-tint": "#115cb9",
                        "surface-dim": "#d9dadb",
                        "on-error-container": "#93000a",
                        "surface": "#f8f9fa",
                        "outline-variant": "#c2c6d4",
                        "tertiary-fixed-dim": "#ffb694",
                        "on-primary-container": "#bbd0ff",
                        "inverse-on-surface": "#f0f1f2",
                        "primary-fixed-dim": "#acc7ff",
                        "on-secondary-fixed-variant": "#3f484f",
                        "outline": "#727784",
                        "secondary-fixed-dim": "#bfc8d0",
                        "on-tertiary": "#ffffff",
                        "background": "#f8f9fa",
                        "tertiary-fixed": "#ffdbcc",
                        "primary-container": "#0056b3",
                        "inverse-primary": "#acc7ff",
                        "on-tertiary-fixed": "#351000",
                        "primary-fixed": "#d7e2ff",
                        "on-primary-fixed": "#001a40",
                        "secondary-container": "#d8e1ea",
                        "surface-container-low": "#f3f4f5",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "on-primary": "#ffffff",
                        "error-container": "#ffdad6",
                        "surface-variant": "#e1e3e4",
                        "on-surface-variant": "#424752",
                        "tertiary-container": "#983c00",
                        "secondary-fixed": "#dbe4ed",
                        "on-secondary-container": "#5b646b"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "4px",
                        "xl": "2.5rem",
                        "lg": "2rem",
                        "margin-mobile": "1.5rem",
                        "gutter": "1.5rem",
                        "xs": "0.5rem",
                        "md": "1.25rem",
                        "margin-desktop": "3rem",
                        "sm": "0.75rem"
                    },
                    "fontFamily": {
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "headline-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": { 
                        "headline-md": ["28px", {
                            "lineHeight": "1.3",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "fontWeight": "500"
                        }],
                        "headline-sm": ["22px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "headline-lg": ["36px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "800"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .bg-hero {
            background: linear-gradient(135deg, #003f87 0%, #0056b3 50%, #002d62 100%);
            position: relative;
            overflow: hidden;
        }

        .bg-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle at 2px 2px, rgba(255, 255, 255, 0.05) 1px, transparent 0);
            background-size: 24px 24px;
        }

        .hero-circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        }
    </style>
</head>

<body class="min-h-screen bg-surface-bright flex overflow-hidden">
    <!-- Left Panel: Brand & Visuals (Desktop) -->
    <div class="hidden lg:flex w-7/12 bg-hero flex-col items-center justify-center p-margin-desktop relative">
        <div class="hero-circle w-[600px] h-[600px] -top-20 -left-20"></div>
        <div class="hero-circle w-[400px] h-[400px] bottom-10 right-10"></div>
        <div class="relative z-10 text-center space-y-md max-w-lg">
            <div class="inline-flex items-center justify-center p-sm bg-white/10 rounded-2xl backdrop-blur-md border border-white/20 mb-lg shadow-2xl">
                <span class="material-symbols-outlined text-[64px] text-white" data-icon="account_balance_wallet">account_balance_wallet</span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-white">PayGuard</h1>
            <p class="font-headline-sm text-headline-sm text-primary-fixed-dim font-medium">Console d'Administration Unifiée</p>
            <div class="pt-xl opacity-80">
                <p class="font-body-lg text-body-lg text-white/90 leading-relaxed">
                    Gérez vos transactions financières, surveillez les flux en temps réel et sécurisez votre écosystème avec notre interface de pointe.
                </p>
            </div>
        </div>
        <div class="absolute bottom-12 left-12 flex items-center gap-md">
            <div class="flex -space-x-2">
                <div class="w-8 h-8 rounded-full border-2 border-white bg-primary-container"></div>
                <div class="w-8 h-8 rounded-full border-2 border-white bg-secondary"></div>
                <div class="w-8 h-8 rounded-full border-2 border-white bg-tertiary-fixed"></div>
            </div>
            <span class="text-white/60 text-label-sm font-medium">Rejoint par +2000 administrateurs</span>
        </div>
    </div>
    <!-- Right Panel: Login Form -->
    <main class="w-full lg:w-5/12 flex items-center justify-center p-margin-mobile bg-surface-container-lowest relative">
        <div class="w-full max-w-[480px]">
            <!-- Mobile Logo (Visible only on small screens) -->
            <div class="lg:hidden flex flex-col items-center mb-xl">
                <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-sm shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-white text-[30px]" data-icon="account_balance_wallet">account_balance_wallet</span>
                </div>
                <h1 class="font-headline-md text-headline-md text-primary">PayGuard</h1>
            </div>
            <div class="glass-card rounded-xl p-xl lg:p-margin-desktop border border-outline-variant/20">
                <header class="mb-xl text-left">
                    <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Heureux de vous revoir !</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Accédez à votre console d'administration en saisissant vos identifiants sécurisés.
                    </p>
                </header>
                <form action="<?= base_url() ?>login" method="post" class="space-y-lg" id="loginForm">
                    <?= csrf_field() ?>
                    <!-- Phone Number Input -->
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant flex items-center gap-xs" for="phone">
                            Numéro de téléphone
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                                <div class="flex items-center gap-xs border-r border-outline-variant/50 pr-xs mr-xs">
                                    <img alt="Ivory Coast" class="rounded-[2px]" src="" srcset="https://flagcdn.com/w40/mg.png 2x" width="20" />
                                    <span class="font-body-md text-body-md font-medium text-on-surface">+261</span>
                                </div>
                            </div>
                            <input class="w-full pl-[100px] pr-md py-md bg-surface border border-outline-variant rounded-lg font-body-md text-body-md focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all duration-300 placeholder:text-outline-variant/60 hover:border-outline" id="phone" name="telephone" placeholder="Ex: 0330000000" required="" type="tel" />
                        </div>
                    </div>
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-sm cursor-pointer group">
                            <div class="relative flex items-center">
                                <input class="peer h-5 w-5 cursor-pointer appearance-none rounded border border-outline-variant bg-white transition-all checked:bg-primary checked:border-primary focus:ring-primary/20" id="remember" type="checkbox" />
                                <span class="material-symbols-outlined absolute text-white opacity-0 peer-checked:opacity-100 left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none text-[16px] font-bold" data-icon="check">check</span>
                            </div>
                            <span class="font-body-sm text-body-sm text-on-surface-variant group-hover:text-on-surface transition-colors">Rester connecté</span>
                        </label>
                        <a class="font-body-sm text-body-sm text-primary hover:text-primary-container font-semibold transition-colors decoration-primary/20 underline-offset-4 hover:underline" href="#">Mot de passe oublié ?</a>
                    </div>
                    <!-- Submit Button -->
                    <button class="w-full bg-primary text-on-primary py-md rounded-lg font-headline-sm text-headline-sm flex items-center justify-center gap-sm hover:bg-primary-container active:scale-[0.98] transition-all shadow-lg shadow-primary/20 group" id="submitBtn" type="submit">
                        <span>Se connecter</span>
                        <span class="material-symbols-outlined transition-transform duration-300 group-hover:translate-x-1" data-icon="login">login</span>
                    </button>
                </form>
                <!-- Épuré Help Section -->
                <div class="mt-xl flex flex-wrap items-center justify-center gap-x-lg gap-y-sm">
                    <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors flex items-center gap-xs" href="#">
                        Aide
                    </a>
                    <span class="w-1 h-1 bg-outline-variant rounded-full"></span>
                    <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors flex items-center gap-xs" href="#">
                        Support Technique
                    </a>
                </div>
            </div>
            <!-- Minimalist Footer -->
            <footer class="mt-lg text-center">
                <p class="font-label-sm text-label-sm text-outline">© <?= date('Y') ?> PayGuard Financial Solutions • Côte d'Ivoire</p>
            </footer>
        </div>
    </main>
</body>

</html>