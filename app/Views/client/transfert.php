<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>NexusPay | Transfert</title>
    <?= view('include/tailwind_head') ?>
</head>

<body class="text-on-surface">
    <?= view('include/sidebar_client', ['active' => 'transfert']) ?>
    <header class="bg-white shadow-sm flex items-center px-4 h-16 w-full fixed top-0 z-50 md:pl-[300px]">
        <a href="<?= base_url('accueil') ?>" class="p-2 hover:bg-surface-container rounded-full transition-colors md:hidden">
            <i class="bi-arrow-left"></i>
        </a>
        <h1 class="ml-2 text-headline-md font-headline-md">Transfert</h1>
    </header>
    <main class="pt-24 pb-24 md:pb-8 md:pl-[300px] px-4 md:px-8 min-h-screen max-w-[1440px] mx-auto">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-xl flex items-center gap-2">
                <i class="bi-check-circle"></i>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-xl flex items-center gap-2">
                <i class="bi-x-circle"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <div class="bg-white rounded-xl shadow-sm border border-outline-variant p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-tertiary-fixed text-tertiary rounded-full flex items-center justify-center">
                    <i class="bi-send"></i>
                </div>
                <div>
                    <h2 class="text-headline-sm font-headline-sm">Envoyer de l'argent</h2>
                    <p class="text-body-sm text-on-surface-variant">Transférez à un autre numéro</p>
                </div>
            </div>

            <div class="mb-6">
                <div class="flex bg-surface-container rounded-xl p-1">
                    <button type="button" id="btn-interne" onclick="switchMode('interne')" class="flex-1 py-2.5 rounded-lg text-label-md font-label-md transition-all bg-primary text-on-primary shadow-sm">
                        Transfert Interne
                    </button>
                    <button type="button" id="btn-multiple" onclick="switchMode('multiple')" class="flex-1 py-2.5 rounded-lg text-label-md font-label-md transition-all text-on-surface-variant">
                        Transfert Multiple
                    </button>
                </div>
            </div>

            <div id="form-interne">
                <form method="POST" action="<?= base_url('clients/transfert') ?>">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-label-md font-label-md text-on-surface-variant mb-2">Numéro du destinataire</label>
                        <input type="text" name="numero" required
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="Ex: 0340000000">
                    </div>
                    <div class="mb-4">
                        <label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant (Ar)</label>
                        <input type="number" name="montant" min="1" required
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="Ex: 5000">
                    </div>
                    <div class="mb-6 flex items-center gap-3 p-3 bg-surface-container rounded-xl">
                        <input type="checkbox" name="inclure_frais_retrait" value="1" id="inclure_frais" class="w-5 h-5 text-primary rounded focus:ring-primary">
                        <label for="inclure_frais" class="text-body-sm text-on-surface-variant cursor-pointer">Inclure les frais de retrait du destinataire</label>
                    </div>
                    <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
                        Effectuer le transfert
                    </button>
                </form>
            </div>

            <div id="form-multiple" class="hidden">
                <form method="POST" action="<?= base_url('clients/transfert-multiple') ?>">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="block text-label-md font-label-md text-on-surface-variant mb-2">Numéros destinataires (un par ligne)</label>
                        <textarea name="numeros" rows="5" required
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 text-body-sm focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="0340000001
0320000002
0330000003"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-label-md font-label-md text-on-surface-variant mb-2">Montant total (Ar)</label>
                        <input type="number" name="montant" id="montant-multiple" min="1" required
                            class="w-full border border-outline-variant rounded-xl px-4 py-3 text-headline-sm focus:ring-2 focus:ring-primary focus:outline-none"
                            placeholder="Ex: 15000"
                            oninput="updateMontantParDest()">
                    </div>
                    <div class="mb-6 p-3 bg-surface-container rounded-xl text-body-sm text-on-surface-variant" id="montant-par-dest-container">
                        Montant par destinataire : <span id="montant-par-dest" class="font-label-md text-primary">-</span>
                    </div>
                    <button type="submit" class="w-full bg-primary text-on-primary py-3 rounded-xl font-label-md hover:shadow-lg transition-all active:scale-95">
                        Effectuer le transfert multiple
                    </button>
                </form>
            </div>
        </div>
        <a href="<?= base_url('clients/transfert-externe') ?>" class="mt-4 block text-center text-primary font-label-md hover:underline flex items-center justify-center gap-1">
            Transfert Externe <i class="bi-box-arrow-up-right text-sm"></i>
        </a>
    </main>
    <script>
        function switchMode(mode) {
            const btnInterne = document.getElementById('btn-interne');
            const btnMultiple = document.getElementById('btn-multiple');
            const formInterne = document.getElementById('form-interne');
            const formMultiple = document.getElementById('form-multiple');
            if (mode === 'interne') {
                btnInterne.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
                btnInterne.classList.remove('text-on-surface-variant');
                btnMultiple.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
                btnMultiple.classList.add('text-on-surface-variant');
                formInterne.classList.remove('hidden');
                formMultiple.classList.add('hidden');
            } else {
                btnMultiple.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
                btnMultiple.classList.remove('text-on-surface-variant');
                btnInterne.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
                btnInterne.classList.add('text-on-surface-variant');
                formMultiple.classList.remove('hidden');
                formInterne.classList.add('hidden');
            }
        }

        function updateMontantParDest() {
            const textarea = document.querySelector('#form-multiple textarea[name="numeros"]');
            const montant = parseFloat(document.getElementById('montant-multiple').value) || 0;
            const lines = textarea.value.split('\n').filter(n => n.trim() !== '');
            const count = lines.length;
            const display = document.getElementById('montant-par-dest');
            if (count > 0 && montant > 0) {
                display.textContent = new Intl.NumberFormat('fr-FR').format(montant / count) + ' Ar';
            } else {
                display.textContent = '-';
            }
        }
        document.querySelector('#form-multiple textarea[name="numeros"]').addEventListener('input', updateMontantParDest);
    </script>
</body>

</html>