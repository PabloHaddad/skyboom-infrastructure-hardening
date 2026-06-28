<?php
require_once 'config.php';

// Se o operador não tiver a sessão válida, mostra erro de acesso negado
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin' || !isset($_SESSION['admin_verified']) || $_SESSION['admin_verified'] !== true) {
    header('HTTP/1.1 403 Forbidden');
    echo "<h1 style='color:red; font-family:sans-serif; text-align:center; margin-top:50px;'>403 - Acesso Negado</h1>";
    exit;
}
?>
<!DOCTYPE html>
<html class="dark" lang="pt-BR"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Infra Control Terminal | SkyBoom Express</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<style>
        body {
            background-color: #0e1322;
            color: #dee1f7;
            -webkit-font-smoothing: antialiased;
        }
        .glass-card {
            background: rgba(26, 31, 47, 0.4);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .glow-cyan {
            box-shadow: 0 0 15px rgba(0, 238, 252, 0.2);
        }
        .pulse-online {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: .7; transform: scale(1.1); }
        }
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(0, 238, 252, 0.1);
            position: absolute;
            animation: scan 8s linear infinite;
        }
        @keyframes scan {
            from { top: 0; }
            to { top: 100%; }
        }
    </style>
</head>
<body class="font-body-md text-body-md overflow-x-hidden">
<aside class="hidden lg:flex flex-col h-screen py-gutter bg-surface-container dark:bg-surface-container-low h-full w-64 fixed left-0 top-0 border-r border-outline-variant/10 backdrop-blur-3xl shadow-lg z-50">
<div class="px-6 mb-8">
<h1 class="font-headline-xl text-headline-xl text-primary mb-1">SkyBoom Express</h1>
<div class="inline-flex items-center gap-2 bg-secondary-container/10 border border-secondary-container/30 px-2 py-0.5 rounded-sm">
<span class="text-[10px] font-bold tracking-widest text-secondary-fixed-dim uppercase">[ INFRA-CONSOLES ]</span>
</div>
</div>
<nav class="flex-1 space-y-2">
<a class="flex items-center gap-4 bg-primary-container text-on-primary-container rounded-xl px-4 py-3 mx-2 transition-all" href="#">
<span class="material-symbols-outlined">dashboard</span>
<span class="font-label-md text-label-md">Overview</span>
</a>
<a class="flex items-center gap-4 text-on-surface-variant px-4 py-3 mx-2 hover:bg-surface-container-highest rounded-xl transition-all" href="#">
<span class="material-symbols-outlined">security</span>
<span class="font-label-md text-label-md">Security</span>
</a>
</nav>
<div class="mt-auto px-4 space-y-4">
<div class="p-3 bg-surface-container-highest/30 rounded-xl border border-outline-variant/20">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-primary/20 flex items-center justify-center border border-primary/30">
<span class="material-symbols-outlined text-primary text-sm">person</span>
</div>
<div>
<p class="text-xs font-bold text-on-surface">Admin: Operador_TI</p>
<p class="text-[10px] text-on-surface-variant">Session ID: 4921-X</p>
</div>
</div>
</div>
<button type="button" onclick="window.location.href='/logout.php'" class="w-full flex items-center justify-center gap-2 px-4 py-3 text-error bg-error-container/10 border border-error-container/20 rounded-xl hover:bg-error-container/20 transition-all">
<span class="material-symbols-outlined">logout</span>
<span class="font-label-md text-label-md">Logout</span>
</button>
</div>
</aside>

<header class="flex justify-between items-center w-full px-gutter h-16 sticky top-0 z-40 bg-surface-dim/80 backdrop-blur-2xl border-b border-outline-variant/10 shadow-sm lg:pl-72">
<div class="flex items-center gap-4">
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-sm">search</span>
<input class="bg-surface-container-highest/50 border-none rounded-full pl-10 pr-4 py-1.5 text-sm w-64 focus:ring-1 focus:ring-primary/50 transition-all" placeholder="Buscar logs da infra..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="hidden md:flex items-center gap-2 text-primary font-mono-sm text-mono-sm uppercase tracking-wider">
<span class="material-symbols-outlined text-sm">terminal</span>
                Console Restrito // Core-01
            </div>
</div>
</header>

<main class="lg:pl-64 min-h-screen">
<div class="p-8 max-w-container-max mx-auto space-y-8">
<div class="relative overflow-hidden p-8 rounded-xl bg-surface-container-low border border-outline-variant/10">
<div class="scanline"></div>
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 relative z-10">
<div>
<h2 class="font-headline-lg text-headline-lg text-primary tracking-tight">PAINEL DE GERENCIAMENTO DE INFRAESTRUTURA</h2>
<p class="text-on-surface-variant mt-2 font-mono-sm text-mono-sm">LATENCIA_REDE: 24ms | UPTIME_SISTEMA: 99.998%</p>
</div>
</div>
</div>

<section class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="glass-card p-6 rounded-xl flex flex-col gap-4 border-l-4 border-l-error">
<div class="flex justify-between items-start">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-widest">Métricas do SIEM</span>
<span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">shield</span>
</div>
<div class="mt-2">
<h3 class="text-4xl font-display-lg text-error">42</h3>
<p class="text-on-surface-variant font-mono-sm text-mono-sm mt-1">Ataques Bloqueados (Última hora)</p>
</div>
</div>
<div class="glass-card p-6 rounded-xl flex flex-col gap-4 border-l-4 border-l-secondary-fixed-dim glow-cyan">
<div class="flex justify-between items-start">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-widest">Telemetria Docker</span>
<span class="material-symbols-outlined text-secondary-fixed-dim pulse-online">token</span>
</div>
<div class="mt-2">
<h3 class="text-4xl font-display-lg text-secondary-fixed-dim">ONLINE</h3>
<p class="text-on-surface-variant font-mono-sm text-mono-sm mt-1">7 Microsserviços Ativos</p>
</div>
</div>
<div class="glass-card p-6 rounded-xl flex flex-col gap-4 border-l-4 border-l-primary">
<div class="flex justify-between items-start">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-widest">Armazenamento Guard</span>
<span class="material-symbols-outlined text-primary">database</span>
</div>
<div class="mt-2">
<h3 class="text-4xl font-display-lg text-primary">14%</h3>
<p class="text-on-surface-variant font-mono-sm text-mono-sm mt-1">Uso da Partição Criptografada LUKS</p>
</div>
</div>
</section>

<section class="glass-card rounded-xl overflow-hidden border border-outline-variant/20">
<div class="px-6 py-4 border-b border-outline-variant/10 flex justify-between items-center bg-surface-container/30">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-secondary-fixed-dim">receipt_long</span>
<h3 class="font-headline-lg text-headline-lg text-on-surface">Logs de Incidentes de Segurança (Firewall Borda)</h3>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left font-body-md text-body-md">
<thead class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] tracking-[0.1em]">
<tr>
<th class="px-6 py-4">Timestamp</th>
<th class="px-6 py-4">Endereço IP</th>
<th class="px-6 py-4">Evento Detectado</th>
<th class="px-6 py-4">Ação Mitigatória</th>
<th class="px-6 py-4">Severidade</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/5">
<tr class="hover:bg-white/5 transition-colors">
<td class="px-6 py-4 font-mono-sm text-on-surface-variant">2026-06-14 14:02:11</td>
<td class="px-6 py-4 font-mono-sm text-primary">192.168.1.104</td>
<td class="px-6 py-4">Tentativa de Força Bruta SSH</td>
<td class="px-6 py-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold bg-error-container/20 text-error border border-error/30">BLOQUEADO via Fail2Ban</span></td>
<td class="px-6 py-4"><span class="text-xs text-error font-bold">Crítico</span></td>
</tr>
<tr class="hover:bg-white/5 transition-colors">
<td class="px-6 py-4 font-mono-sm text-on-surface-variant">2026-06-14 14:01:45</td>
<td class="px-6 py-4 font-mono-sm text-primary">45.231.11.2</td>
<td class="px-6 py-4">SQL Injection Detectado</td>
<td class="px-6 py-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold bg-tertiary-container/20 text-tertiary border border-tertiary/30">CONEXÃO REJEITADA</span></td>
<td class="px-6 py-4"><span class="text-xs text-tertiary font-bold">Alerta</span></td>
</tr>
</tbody>
</table>
</div>
</section>
</div>
</main>

<footer class="lg:pl-64 w-full bg-surface-container-lowest/80 border-t border-outline-variant/5 backdrop-blur-md py-4 mt-12">
<div class="max-w-container-max mx-auto px-gutter flex flex-col md:flex-row justify-between items-center gap-4">
<div class="font-mono-sm text-mono-sm text-on-surface-variant">
                © 2026 SkyBoom Express. Integridade Operacional Homologada.
            </div>
</div>
</footer>
</body></html>
