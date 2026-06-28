<?php
// Inicia a sessão se ela ainda não existir
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o Nginx repassou o usuário autenticado e se é o admin
if (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] === 'admin_skyboom') {
    // Como o Nginx já validou a senha, nós preenchemos as credenciais do sistema
    $_SESSION['usuario_id'] = 1;
    $_SESSION['perfil'] = 'admin';
    $_SESSION['admin_verified'] = true;
} else {
    // Se por algum motivo entrar sem o usuário do Nginx, limpa tudo
    session_unset();
    session_destroy();
}
?>
