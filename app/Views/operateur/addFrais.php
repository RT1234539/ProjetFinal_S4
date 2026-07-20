<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Barèmes des Frais - Admin Money</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-error-container": "#93000a",
                        "on-error": "#ffffff",
                        "primary-fixed-dim": "#acc7ff",
                        "secondary-fixed": "#dbe4ed",
                        "on-primary-container": "#bbd0ff",
                        "secondary-container": "#d8e1ea",
                        "inverse-primary": "#acc7ff",
                        "surface-container-high": "#e7e8e9",
                        "surface-container-low": "#f3f4f5",
                        "surface-container-lowest": "#ffffff",
                        "error-container": "#ffdad6",
                        "on-surface": "#191c1d",
                        "primary-fixed": "#d7e2ff",
                        "on-secondary-fixed": "#141d23",
                        "on-background": "#191c1d",
                        "background": "#f8f9fa",
                        "surface-variant": "#e1e3e4",
                        "on-tertiary-fixed-variant": "#7b2f00",
                        "surface-bright": "#f8f9fa",
                        "surface": "#f8f9fa",
                        "tertiary": "#722b00",
                        "on-secondary-fixed-variant": "#3f484f",
                        "on-secondary-container": "#5b646b",
                        "tertiary-fixed-dim": "#ffb694",
                        "surface-tint": "#115cb9",
                        "secondary-fixed-dim": "#bfc8d0",
                        "tertiary-fixed": "#ffdbcc",
                        "surface-container-highest": "#e1e3e4",
                        "on-tertiary": "#ffffff",
                        "error": "#ba1a1a",
                        "on-primary": "#ffffff",
                        "on-tertiary-fixed": "#351000",
                        "inverse-on-surface": "#f0f1f2",
                        "primary-container": "#0056b3",
                        "inverse-surface": "#2e3132",
                        "on-primary-fixed": "#001a40",
                        "secondary": "#575f67",
                        "surface-container": "#edeeef",
                        "outline-variant": "#c2c6d4",
                        "tertiary-container": "#983c00",
                        "on-tertiary-container": "#ffc2a7",
                        "primary": "#003f87",
                        "outline": "#727784",
                        "surface-dim": "#d9dadb",
                        "on-surface-variant": "#424752",
                        "on-primary-fixed-variant": "#004491",
                        "on-secondary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "2rem",
                        "gutter": "1.5rem",
                        "margin-mobile": "1rem",
                        "md": "1rem",
                        "sm": "0.75rem",
                        "base": "4px",
                        "margin-desktop": "2rem",
                        "lg": "1.5rem",
                        "xs": "0.5rem"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-sm": ["Inter"],
                        "headline-sm": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["12px", {
                            "lineHeight": "1",
                            "fontWeight": "500"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "label-md": ["14px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "fontWeight": "700"
                        }],
                        "body-sm": ["14px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "headline-sm": ["20px", {
                            "lineHeight": "1.4",
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
            background-color: #f8f9fa;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .bento-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 1.5rem;
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen flex">
    <!-- SideNavBar (Shared Component) -->
    <aside class="hidden lg:flex flex-col h-screen border-r border-outline-variant bg-white w-72 fixed left-0 top-0 z-50">
        <div class="p-lg flex items-center gap-sm">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-on-primary">
                <span class="material-symbols-outlined">payments</span>
            </div>
            <div>
                <h1 class="font-headline-sm text-headline-sm text-primary">Mobile Money</h1>
                <p class="text-label-sm font-label-sm text-secondary">Gestionnaire Mobile</p>
            </div>
        </div>
        <nav class="mt-md flex-grow">
            <ul class="space-y-1">
                <!-- Tab: Dashboard -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- Tab: Préfixes -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">phone_iphone</span>
                        <span>Préfixes</span>
                    </a>
                </li>
                <!-- Tab: Barèmes (ACTIVE) -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
                        <span>Barèmes</span>
                    </a>
                </li>
                <!-- Tab: Comptes clients -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">group</span>
                        <span>Comptes clients</span>
                    </a>
                </li>
                <!-- Tab: Simulation -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">calculate</span>
                        <span>Simulation</span>
                    </a>
                </li>
                <!-- Tab: Statistiques -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">leaderboard</span>
                        <span>Statistiques</span>
                    </a>
                </li>
                <!-- Tab: Paramètres -->
                <li class="mx-2 my-1">
                    <a class="flex items-center gap-sm px-md py-sm text-secondary hover:bg-surface-container rounded-lg transition-transform hover:translate-x-1 font-label-md text-label-md" href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <span>Paramètres</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- Main Content Canvas -->
    <main class="flex-grow lg:ml-72 flex flex-col min-h-screen">
        <!-- TopAppBar (Shared Component) -->
        <header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface shadow-sm">
            <div class="flex items-center gap-md">
                <button class="lg:hidden p-xs">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                        <span class="material-symbols-outlined">search</span>
                    </span>
                    <input class="pl-10 pr-4 py-2 bg-surface-container-low border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-primary w-64 transition-all" placeholder="Rechercher un barème..." type="text" />
                </div>
            </div>
            <div class="flex items-center gap-md">
                <div class="h-8 w-px bg-outline-variant"></div>
                <div class="flex items-center gap-sm cursor-pointer hover:bg-surface-container p-1 rounded-lg transition-colors">
                    <img class="w-8 h-8 rounded-full border border-outline-variant object-cover" data-alt="Close up portrait of a professional African male administrator in a light blue corporate shirt, smiling warmly with a clean modern office background, soft daylight illumination, professional business photography style." src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" />
                    <div class="hidden md:block">
                        <p class="font-label-md text-label-md text-on-surface leading-none">Admin</p>
                        <p class="text-label-sm font-label-sm text-secondary">Operateur</p>
                    </div>
                </div>
            </div>
        </header>
        <!-- Content Body -->
        <div class="p-gutter flex-grow space-y-gutter max-w-7xl mx-auto w-full">
            <!-- Page Title Area -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-md">
                <div>
                    <nav class="flex text-label-sm font-label-sm text-secondary mb-xs">
                        <span class="hover:text-primary cursor-pointer">Admin</span>
                        <span class="mx-2">/</span>
                        <span class="text-primary font-bold">Barèmes</span>
                    </nav>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Barèmes des Frais</h2>
                    <p class="text-body-md font-body-md text-secondary mt-3">Configurez les paliers de tarification pour chaque type de transaction financière.</p>
                </div>

            </div>
            <!-- Bento Layout Section -->
            <div class="bento-grid">
                <!-- Form Section: Card Style -->
                <div class="col-span-12 lg:col-span-4 bg-white rounded-xl shadow-sm border border-outline-variant p-lg">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary">add_box</span>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Ajouter un palier</h3>
                    </div>
                    <form action="<?= base_url() ?>frais/ajouter" method="post" class="space-y-md" id="fee-form">
                        <?= csrf_field() ?>

                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Type d'opération</label>
                            <select name="operation" class="w-full bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all font-body-sm text-body-sm">
                                <?php if (isset($operations)) { ?>
                                    <?php for ($i = 1; $i < count($operations); $i++) {
                                        $o = $operations[$i]; ?>
                                        <option value="<?= $o['id'] ?>">
                                            <?= $o['libelle'] ?>
                                        </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-md">
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant">Montant min.</label>
                                <div class="relative">
                                    <input name="min" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="0" type="number" />
                                    <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                                </div>
                            </div>
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant">Montant max.</label>
                                <div class="relative">
                                    <input name="max" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="5000" type="number" />
                                    <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant">Frais appliqués</label>
                            <div class="relative">
                                <input name="frais" class="w-full pl-sm pr-12 bg-surface-container-low border border-outline-variant rounded-lg p-sm focus:ring-2 focus:ring-primary outline-none font-body-sm text-body-sm" placeholder="100" type="number" />
                                <span class="absolute right-3 top-2.5 text-secondary font-label-sm">Ar</span>
                            </div>
                        </div>
                        <div class="flex gap-sm pt-md">
                            <button class="flex-grow bg-primary text-on-primary py-sm rounded-lg font-label-md text-label-md hover:bg-primary-container transition-colors shadow-md" type="submit">
                                Ajouter
                            </button>
                            <button class="px-md py-sm bg-surface-container border border-outline-variant text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-outline-variant transition-colors" type="reset">
                                Réinitialiser
                            </button>
                        </div>
                    </form>
                    <!-- Quick Stats in the Form Column -->
                    <?php
                    $successMessage = session()->getFlashdata('success');
                    $displayMessage = $successMessage ?? $message ?? null;
                    ?>

                    <?php if ($displayMessage): ?>
                        <?php $isSuccess = !empty($successMessage); ?>

                        <div class="mt-xl p-md rounded-lg border <?= $isSuccess ? 'bg-success-container/10 border-success/20' : 'bg-primary-container/10 border-primary-container/20' ?>">
                            <div class="flex items-center gap-sm mb-xs">
                                <span class="material-symbols-outlined <?= $isSuccess ? 'text-success' : 'text-primary' ?> text-[20px]">
                                    <?= $isSuccess ? 'check_circle' : 'info' ?>
                                </span>
                                <p class="font-label-md text-label-md <?= $isSuccess ? 'text-success' : 'text-primary' ?>">
                                    <?= $isSuccess ? 'Succès' : 'Info Barèmes' ?>
                                </p>
                            </div>

                            <div class="text-body-sm font-body-sm text-on-secondary-container">
                                <?php if (is_array($displayMessage) || is_object($displayMessage)): ?>
                                    <ul class="list-disc list-inside space-y-1">
                                        <?php foreach ($displayMessage as $msg): ?>
                                            <li><?= htmlspecialchars(is_array($msg) ? implode(', ', $msg) : $msg) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p><?= htmlspecialchars($displayMessage) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Bloc par défaut si aucun message dynamique n'est présent -->
                        <div class="mt-xl p-md bg-primary-container/10 rounded-lg border border-primary-container/20">
                            <div class="flex items-center gap-sm mb-xs">
                                <span class="material-symbols-outlined text-primary text-[20px]">info</span>
                                <p class="font-label-md text-label-md text-primary">Info Barèmes</p>
                            </div>
                            <p class="text-body-sm font-body-sm text-on-secondary-container">
                                Les frais sont prélevés instantanément sur le compte de l'émetteur lors de la validation.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Table Section: Card Style -->
                <div class="col-span-12 lg:col-span-8 bg-white rounded-xl shadow-sm border border-outline-variant overflow-hidden flex flex-col">
                    <div class="px-lg py-md border-b border-outline-variant flex items-center justify-between bg-surface-container-lowest">
                        <div class="flex items-center gap-sm">
                            <span class="material-symbols-outlined text-secondary">list_alt</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface">Liste des barèmes actifs</h3>
                        </div>
                        <div class="flex items-center gap-xs">
                            <span class="text-label-sm font-label-sm text-secondary">Filtre:</span>
                            <select class="border-none bg-transparent font-label-md text-label-md text-primary focus:ring-0 cursor-pointer">
                                <option>Toutes les opérations</option>
                                <option>Transferts</option>
                                <option>Retraits</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto flex-grow">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-low">
                                <tr>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Type d'opération</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant minimal</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Montant maximal</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant">Frais</th>
                                    <th class="px-lg py-sm font-label-md text-label-md text-secondary border-b border-outline-variant text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant">
                                <?php
                                if (isset($liste)) {
                                    foreach ($liste as $item) {
                                ?>
                                        <tr class="hover:bg-primary/5 transition-colors group">
                                            <td class="px-lg py-md">
                                                <div class="flex items-center gap-sm">
                                                    <span class="font-body-md text-body-md text-on-surface"><?= $item['nom_operation'] ?></span>
                                                </div>
                                            </td>
                                            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant1'] ?> Ar</td>
                                            <td class="px-lg py-md font-body-md text-body-md text-on-surface"><?= $item['montant2'] ?> Ar</td>
                                            <td class="px-lg py-md">
                                                <span class="px-sm py-1 bg-green-100 text-green-700 rounded-pill font-label-md text-label-md"><?= $item['frais'] ?> Ar</span>
                                            </td>
                                            <td class="px-lg py-md text-right">
                                                <div class="flex justify-end gap-xs opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <button class="p-2 text-primary hover:bg-primary/10 rounded-full transition-colors" title="Modifier">
                                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                                    </button>
                                                    <button class="p-2 text-error hover:bg-error/10 rounded-full transition-colors" title="Supprimer">
                                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination Footer -->
                    <div class="px-lg py-md border-t border-outline-variant flex items-center justify-between bg-surface-container-low">
                        <span class="text-label-sm font-label-sm text-secondary">Affichage de 1 à 4 sur 28 entrées</span>
                        <div class="flex gap-xs">
                            <button class="p-2 border border-outline-variant bg-white rounded-lg hover:bg-surface-container transition-colors disabled:opacity-50" disabled="">
                                <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                            </button>
                            <button class="w-10 h-10 bg-primary text-on-primary rounded-lg font-label-md text-label-md shadow-sm">1</button>
                            <button class="w-10 h-10 border border-outline-variant bg-white rounded-lg font-label-md text-label-md hover:bg-surface-container transition-colors">2</button>
                            <button class="w-10 h-10 border border-outline-variant bg-white rounded-lg font-label-md text-label-md hover:bg-surface-container transition-colors">3</button>
                            <button class="p-2 border border-outline-variant bg-white rounded-lg hover:bg-surface-container transition-colors">
                                <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Side Feature Card (Bento style) -->
                <div class="col-span-12 bg-primary-container text-on-primary-container rounded-xl p-lg relative overflow-hidden flex flex-col md:flex-row items-center justify-between">
                    <div class="z-10 text-center md:text-left">
                        <h4 class="font-headline-md text-headline-md mb-xs">Simulation des frais ?</h4>
                        <p class="text-body-md font-body-md opacity-90 max-w-xl">Utilisez notre outil de simulation pour tester l'impact de vos nouveaux barèmes sur les transactions utilisateurs avant de les appliquer officiellement.</p>
                        <button class="mt-md px-lg py-sm bg-white text-primary rounded-lg font-label-md text-label-md hover:shadow-xl transition-all">Accéder au Simulateur</button>
                    </div>
                    <div class="mt-md md:mt-0 relative w-48 h-32 opacity-20">
                        <span class="material-symbols-outlined text-[120px] absolute -right-4 -bottom-4">calculate</span>
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -top-12 -right-12 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
        <!-- Footer (Shared Component) -->
        <footer class="flex justify-between items-center px-gutter w-full mt-auto py-4 bg-surface-container-low border-t border-outline-variant">
            <p class="font-label-sm text-label-sm font-bold text-secondary">© <?= date("Y") ?> Mobile Money - Tous droits réservés</p>
            <div class="flex gap-lg">
                <span class="text-secondary font-label-sm text-label-sm opacity-80 hover:opacity-100 cursor-pointer">Version 2.1.0</span>
                <span class="text-secondary font-label-sm text-label-sm opacity-80 hover:opacity-100 cursor-pointer">Projet Admin</span>
                <span class="text-secondary font-label-sm text-label-sm opacity-80 hover:opacity-100 cursor-pointer">Janvier 2024</span>
            </div>
        </footer>
    </main>
    <!-- Interactive script for demo -->
    <script>
        // Mobile menu toggle logic
        const menuBtn = document.querySelector('header button.lg\\:hidden');
        const sidebar = document.querySelector('aside');

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('flex');
                sidebar.classList.add('w-full', 'fixed', 'inset-0');
            });
        }
    </script>
</body>

</html>