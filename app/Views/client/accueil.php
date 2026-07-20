<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>NexusPay | Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-container": "#edeeef",
                    "on-surface-variant": "#424752",
                    "surface-container-low": "#f3f4f5",
                    "surface-tint": "#115cb9",
                    "surface-container-lowest": "#ffffff",
                    "on-secondary-container": "#5b646b",
                    "inverse-primary": "#acc7ff",
                    "primary-fixed-dim": "#acc7ff",
                    "on-secondary": "#ffffff",
                    "surface-container-high": "#e7e8e9",
                    "on-primary-container": "#bbd0ff",
                    "inverse-on-surface": "#f0f1f2",
                    "surface-variant": "#e1e3e4",
                    "on-primary-fixed-variant": "#004491",
                    "on-primary-fixed": "#001a40",
                    "tertiary-fixed": "#ffdbcc",
                    "secondary-fixed": "#dbe4ed",
                    "surface-dim": "#d9dadb",
                    "primary-fixed": "#d7e2ff",
                    "on-tertiary": "#ffffff",
                    "primary": "#003f87",
                    "on-tertiary-fixed": "#351000",
                    "on-secondary-fixed": "#141d23",
                    "on-background": "#191c1d",
                    "on-primary": "#ffffff",
                    "on-error": "#ffffff",
                    "secondary-container": "#d8e1ea",
                    "on-tertiary-container": "#ffc2a7",
                    "background": "#f8f9fa",
                    "on-tertiary-fixed-variant": "#7b2f00",
                    "on-surface": "#191c1d",
                    "outline-variant": "#c2c6d4",
                    "surface": "#f8f9fa",
                    "surface-bright": "#f8f9fa",
                    "secondary": "#575f67",
                    "error-container": "#ffdad6",
                    "error": "#ba1a1a",
                    "inverse-surface": "#2e3132",
                    "tertiary-fixed-dim": "#ffb694",
                    "outline": "#727784",
                    "tertiary-container": "#983c00",
                    "tertiary": "#722b00",
                    "primary-container": "#0056b3",
                    "on-secondary-fixed-variant": "#3f484f",
                    "on-error-container": "#93000a",
                    "secondary-fixed-dim": "#bfc8d0",
                    "surface-container-highest": "#e1e3e4"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "md": "1rem",
                    "margin-desktop": "2rem",
                    "gutter": "1.5rem",
                    "base": "4px",
                    "sm": "0.75rem",
                    "margin-mobile": "1rem",
                    "lg": "1.5rem",
                    "xs": "0.5rem",
                    "xl": "2rem"
            },
            "fontFamily": {
                    "label-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-sm": ["Inter"],
                    "headline-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "body-sm": ["Inter"]
            },
            "fontSize": {
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.5", "fontWeight": "400"}],
                    "body-sm": ["14px", {"lineHeight": "1.5", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }
        .transaction-row:hover {
            background-color: rgba(0, 63, 135, 0.05);
        }
    </style>
</head>
<body class="text-on-surface">
<!-- TopAppBar -->
<header class="bg-white dark:bg-surface-dim shadow-sm flex justify-between items-center px-margin-mobile h-16 w-full fixed top-0 z-50 md:px-margin-desktop">
<div class="flex items-center gap-4">
<span class="text-headline-md font-headline-md text-primary dark:text-primary-fixed-dim">NexusPay</span>
</div>
<div class="flex items-center gap-md">
<button class="material-symbols-outlined text-primary dark:text-primary-fixed-dim p-2 hover:bg-surface-container transition-colors rounded-full">notifications</button>
<button class="material-symbols-outlined text-primary dark:text-primary-fixed-dim p-2 hover:bg-surface-container transition-colors rounded-full">help</button>
<div class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center overflow-hidden border-2 border-surface-container-high">
<img class="w-full h-full object-cover" data-alt="A professional business portrait of a modern executive in a bright, high-key office environment. The lighting is soft and flattering, highlighting confidence and accessibility. The color palette features soft blues and whites to match a corporate financial design system. Professional, minimalist photography style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4yOmt5byARY8e2L7tmJlRV4zxs6tHo-WUw64RYgZtTb1z9d8LGr_JWmgITK9cxeXCxh5C7PCSkccnJR3E9BuTCyU9_5RRxCiKyIo-W9GO2Vz79fFmmiNzde20WHYJCUbBICgy2AVC0lrUROD99MGIw4mjtHgNL4qFDjayq9O7gSJTEa2MsFv2CyNJHzBarh3mdexbElFAYHmbiRQtIcIqmmCQyvCBaIwbGSn2TRCMrXG1dRicR8A-t2cGfGEU6U8KSRFF5xWZuAnT"/>
</div>
</div>
</header>
<!-- SideNavBar (Desktop Only) -->
<aside class="bg-surface-container-lowest dark:bg-inverse-surface border-r border-outline-variant fixed left-0 top-0 h-full flex flex-col p-md z-40 hidden md:flex w-[280px]">
<div class="mt-20 px-xs mb-8">
<div class="flex flex-col items-start p-md bg-surface-container rounded-xl">
<span class="text-label-md font-label-md text-secondary">+254 700 123 456</span>
<span class="text-headline-sm font-headline-sm text-primary mt-1">KES 15,420.00</span>
<span class="text-body-sm font-body-sm text-on-surface-variant opacity-70">Balance disponible</span>
<button class="mt-4 w-full bg-primary text-on-primary py-2 rounded-lg font-label-md hover:scale-[1.02] active:scale-95 transition-all">Deposit Funds</button>
</div>
</div>
<nav class="flex flex-col gap-1 flex-1">
<a class="flex items-center gap-md p-md bg-primary-container text-on-primary-container rounded-lg font-bold translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-label-md font-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-md p-md text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="#">
<span class="material-symbols-outlined">payments</span>
<span class="text-label-md font-label-md">Payments</span>
</a>
<a class="flex items-center gap-md p-md text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="#">
<span class="material-symbols-outlined">swap_horiz</span>
<span class="text-label-md font-label-md">Transfers</span>
</a>
<a class="flex items-center gap-md p-md text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="#">
<span class="material-symbols-outlined">history</span>
<span class="text-label-md font-label-md">History</span>
</a>
</nav>
<div class="mt-auto">
<a class="flex items-center gap-md p-md text-on-surface-variant hover:bg-surface-container-high rounded-lg transition-all" href="#">
<span class="material-symbols-outlined">settings</span>
<span class="text-label-md font-label-md">Settings</span>
</a>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="pt-24 pb-20 md:pb-8 md:pl-[300px] px-margin-mobile md:px-margin-desktop min-h-screen max-w-[1440px] mx-auto">
<!-- Hero Section: Prominent Balance -->
<section class="mb-lg">
<div class="relative overflow-hidden bg-primary text-on-primary p-xl rounded-xl shadow-lg md:p-12">
<!-- Decorative background shader element placeholder -->

<div class="relative z-10">
<p class="text-label-md font-label-md uppercase tracking-widest opacity-80 mb-2">Compte Personnel</p>
<h2 class="text-headline-lg-mobile md:text-headline-lg font-headline-lg mb-1">+254 700 123 456</h2>
<div class="flex items-baseline gap-2 mt-4">
<span class="text-label-md font-label-md opacity-90">KES</span>
<span class="text-[42px] md:text-[56px] font-extrabold leading-none tracking-tight">15,420.00</span>
</div>
</div>
</div>
</section>
<!-- Quick Actions Bento Grid -->
<section class="mb-lg">
<h3 class="text-headline-sm font-headline-sm mb-md flex items-center gap-2">
<span class="material-symbols-outlined text-primary">bolt</span> Actions Rapides
            </h3>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-md">
<button class="flex flex-col items-center justify-center p-lg bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-primary-fixed-dim text-primary rounded-full flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add_circle</span>
</div>
<span class="text-label-md font-label-md text-primary">Dépôt</span>
</button>
<button class="flex flex-col items-center justify-center p-lg bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-secondary-container text-secondary rounded-full flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<span class="text-label-md font-label-md text-secondary">Retrait</span>
</button>
<button class="flex flex-col items-center justify-center p-lg bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">send</span>
</div>
<span class="text-label-md font-label-md text-tertiary">Transfert</span>
</button>
<button class="flex flex-col items-center justify-center p-lg bg-white shadow-sm rounded-xl border border-outline-variant hover:border-primary hover:shadow-md transition-all active:scale-95 group">
<div class="w-12 h-12 bg-surface-container-high text-on-surface-variant rounded-full flex items-center justify-center mb-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
</div>
<span class="text-label-md font-label-md text-on-surface-variant">Historique</span>
</button>
</div>
</section>
<!-- Insights & Recent Activity (Asymmetric Layout) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-lg items-start">
<!-- Recent Activity Table (8 cols) -->
<section class="lg:col-span-8 bg-white shadow-sm rounded-xl overflow-hidden border border-outline-variant">
<div class="px-lg py-md border-b border-outline-variant flex justify-between items-center">
<h3 class="text-headline-sm font-headline-sm">Activité Récente</h3>
<button class="text-primary text-label-sm font-label-sm hover:underline">Voir tout</button>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low">
<th class="px-lg py-md text-label-sm font-label-sm text-secondary uppercase tracking-wider">Transaction</th>
<th class="px-lg py-md text-label-sm font-label-sm text-secondary uppercase tracking-wider">Date</th>
<th class="px-lg py-md text-label-sm font-label-sm text-secondary uppercase tracking-wider text-right">Montant</th>
<th class="px-lg py-md text-label-sm font-label-sm text-secondary uppercase tracking-wider text-center">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant">
<tr class="transaction-row transition-colors">
<td class="px-lg py-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded bg-primary-container text-on-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">shopping_cart</span>
</div>
<div>
<p class="text-label-md font-label-md">Supermarché City</p>
<p class="text-body-sm font-body-sm text-on-surface-variant">Paiement marchand</p>
</div>
</div>
</td>
<td class="px-lg py-md text-body-sm font-body-sm text-on-surface-variant">Hier, 14:20</td>
<td class="px-lg py-md text-label-md font-label-md text-right text-error">- 2,450.00</td>
<td class="px-lg py-md text-center">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-[10px] font-bold uppercase tracking-wider">Succès</span>
</td>
</tr>
<tr class="transaction-row transition-colors">
<td class="px-lg py-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded bg-tertiary-fixed text-tertiary flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">call_received</span>
</div>
<div>
<p class="text-label-md font-label-md">John Doe</p>
<p class="text-body-sm font-body-sm text-on-surface-variant">Transfert reçu</p>
</div>
</div>
</td>
<td class="px-lg py-md text-body-sm font-body-sm text-on-surface-variant">24 Mar, 09:15</td>
<td class="px-lg py-md text-label-md font-label-md text-right text-green-600">+ 5,000.00</td>
<td class="px-lg py-md text-center">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-[10px] font-bold uppercase tracking-wider">Succès</span>
</td>
</tr>
<tr class="transaction-row transition-colors">
<td class="px-lg py-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded bg-surface-container-high text-on-surface-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">electric_bolt</span>
</div>
<div>
<p class="text-label-md font-label-md">Kenya Power</p>
<p class="text-body-sm font-body-sm text-on-surface-variant">Facture Électricité</p>
</div>
</div>
</td>
<td class="px-lg py-md text-body-sm font-body-sm text-on-surface-variant">22 Mar, 18:45</td>
<td class="px-lg py-md text-label-md font-label-md text-right text-error">- 1,200.00</td>
<td class="px-lg py-md text-center">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-[10px] font-bold uppercase tracking-wider">Succès</span>
</td>
</tr>
<tr class="transaction-row transition-colors">
<td class="px-lg py-md">
<div class="flex items-center gap-md">
<div class="w-8 h-8 rounded bg-secondary-container text-secondary flex items-center justify-center">
<span class="material-symbols-outlined text-[18px]">atm</span>
</div>
<div>
<p class="text-label-md font-label-md">Agent Nexus #442</p>
<p class="text-body-sm font-body-sm text-on-surface-variant">Retrait Cash</p>
</div>
</div>
</td>
<td class="px-lg py-md text-body-sm font-body-sm text-on-surface-variant">21 Mar, 11:30</td>
<td class="px-lg py-md text-label-md font-label-md text-right text-error">- 10,000.00</td>
<td class="px-lg py-md text-center">
<span class="px-2 py-1 rounded-full bg-green-100 text-green-800 text-[10px] font-bold uppercase tracking-wider">Succès</span>
</td>
</tr>
</tbody>
</table>
</div>
</section>
<!-- Sidebar Info/Cards (4 cols) -->
<section class="lg:col-span-4 flex flex-col gap-lg">
<!-- Promo Card -->
<div class="relative rounded-xl overflow-hidden shadow-sm h-48 group">
<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" data-alt="A futuristic credit card with glowing blue circuits floating in a minimalist digital space. The background is a clean white and soft grey gradient, embodying a premium fintech aesthetic. High-tech, corporate and sophisticated visual style with sharp focus." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbCa30a6WVzFOwxT7oC8ulV9FqdmHW1j-AHVQQaEIoGbYPotAtuGoJtBgWY0yYGyyEiYIrIzBLYrKierPtHULmYJwFnMNq8hBautOIok_cvGNnxdpdPn7kRp-XELMmaMSeQZCYsc1OTHSlQ7B5ColUtxRzSbbmXQrte80yf38eDYQfp6wEP5_plnyZclDGma6sM4Sw4O3GncrERYg4kSScHWbaJla9KRe5TwF9nRQDiFxvbFXnrR7U6p1mKf09h-rkj8poObLmLgbn"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-lg text-on-primary">
<h4 class="text-headline-sm font-headline-sm">Prêt Express</h4>
<p class="text-body-sm font-body-sm opacity-90">Obtenez jusqu'à KES 50,000 instantanément.</p>
<button class="mt-md px-md py-2 bg-white text-primary rounded-lg text-label-md font-label-md self-start">En savoir plus</button>
</div>
</div>
<!-- Monthly Spending Card -->
<div class="bg-white p-lg rounded-xl shadow-sm border border-outline-variant">
<h4 class="text-label-md font-label-md text-secondary uppercase mb-md">Dépenses ce mois</h4>
<div class="flex items-center justify-between mb-xs">
<span class="text-headline-sm font-headline-sm">KES 18,340.00</span>
<span class="text-green-600 text-label-sm font-label-sm flex items-center gap-1">
<span class="material-symbols-outlined text-sm">trending_down</span> 12%
                        </span>
</div>
<div class="w-full bg-surface-container-high h-2 rounded-full mt-4 overflow-hidden">
<div class="bg-primary h-full w-3/4 rounded-full"></div>
</div>
<p class="text-body-sm font-body-sm text-on-surface-variant mt-md">75% de votre limite mensuelle atteinte.</p>
</div>
<!-- Security Tip -->
<div class="bg-tertiary-fixed text-on-tertiary-fixed-variant p-md rounded-xl flex items-start gap-md">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">security</span>
<div>
<p class="text-label-md font-label-md">Sécurité</p>
<p class="text-body-sm font-body-sm">Ne partagez jamais votre code PIN, même avec un agent NexusPay.</p>
</div>
</div>
</section>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-4 py-2 md:hidden bg-white dark:bg-surface-dim shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)] rounded-t-xl">
<a class="flex flex-col items-center justify-center bg-primary-container text-on-primary-container rounded-full px-4 py-1 active:scale-90 duration-150 transition-all" href="#">
<span class="material-symbols-outlined">home</span>
<span class="text-label-sm font-label-sm">Home</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="#">
<span class="material-symbols-outlined">send</span>
<span class="text-label-sm font-label-sm">Transfers</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<span class="text-label-sm font-label-sm">History</span>
</a>
<a class="flex flex-col items-center justify-center text-on-secondary-container hover:text-primary transition-all active:scale-90 duration-150" href="#">
<span class="material-symbols-outlined">person</span>
<span class="text-label-sm font-label-sm">Profile</span>
</a>
</nav>
<script>
        // Simple micro-interaction for active state simulation
        document.querySelectorAll('button, a').forEach(el => {
            el.addEventListener('mousedown', () => {
                el.classList.add('scale-95');
            });
            el.addEventListener('mouseup', () => {
                el.classList.remove('scale-95');
            });
            el.addEventListener('mouseleave', () => {
                el.classList.remove('scale-95');
            });
        });

        // Dynamic balance reveal animation
        window.addEventListener('DOMContentLoaded', () => {
            const balanceVal = document.querySelector('.tracking-tight');
            if (balanceVal) {
                let start = 0;
                let end = 15420;
                let duration = 1000;
                let startTime = null;

                function animate(currentTime) {
                    if (!startTime) startTime = currentTime;
                    let progress = currentTime - startTime;
                    let run = Math.min(progress / duration * end, end);
                    balanceVal.textContent = run.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    if (progress < duration) {
                        requestAnimationFrame(animate);
                    } else {
                        balanceVal.textContent = "15,420.00";
                    }
                }
                requestAnimationFrame(animate);
            }
        });
    </script>
</body></html>