<?php

function startSecureSession()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
        session_start();
    }
}

function setSecurityHeaders()
{
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    header("Content-Security-Policy: default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval'; frame-ancestors 'self';");
}

function generateCsrfToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verifyCsrfToken($token)
{
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}

function getClientIp()
{
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
    }

    return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
}

function isRateLimited($key, $maxAttempts = 10, $windowSeconds = 600)
{
    $safeKey = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $key);
    $file = sys_get_temp_dir() . '/pgd_rate_limit_' . md5($safeKey) . '.json';

    $attempts = [];
    if (is_file($file)) {
        $content = file_get_contents($file);
        $decoded = json_decode($content, true);
        if (is_array($decoded)) {
            $attempts = $decoded;
        }
    }

    $now = time();
    $attempts = array_values(array_filter($attempts, function ($ts) use ($now, $windowSeconds) {
        return ($now - (int)$ts) <= $windowSeconds;
    }));

    if (count($attempts) >= $maxAttempts) {
        return true;
    }

    $attempts[] = $now;
    file_put_contents($file, json_encode($attempts), LOCK_EX);

    return false;
}

function getApiKeyFromRequest()
{
    $headerKey = $_SERVER['HTTP_X_API_KEY'] ?? '';

    if (!empty($headerKey)) {
        return trim($headerKey);
    }

    return isset($_GET['api_key']) ? trim((string)$_GET['api_key']) : '';
}
