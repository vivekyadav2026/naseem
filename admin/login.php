<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';

$error = '';

if (isset($_SESSION['admin_user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        $dm = DataManager::getInstance();
        $admin = $dm->verifyAdmin($username, $password);

        if ($admin) {
            $_SESSION['admin_user'] = [
                'id' => $admin['id'] ?? 1,
                'username' => $admin['username'] ?? $username,
                'name' => $admin['name'] ?? 'Muskan Administrator',
                'role' => $admin['role'] ?? 'Super Admin'
            ];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Invalid username or password. Please try again.';
        }
    } else {
        $error = 'Please enter both username and password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Muskan Interiors Studio</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=IBM+Plex+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --bg-dark: #090D14;
            --surface: #0F141C;
            --surface-card: #151C26;
            --border: #222C3D;
            --gold: #C59A3F;
            --gold-light: #E0BA68;
            --text-main: #FFFFFF;
            --text-muted: #94A3B8;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(197, 154, 63, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(30, 41, 59, 0.3) 0%, transparent 50%);
        }

        .login-box {
            width: 100%;
            max-width: 440px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .login-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--gold), transparent);
        }

        .brand-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .logo-symbol {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--gold), #9A7526);
            color: #0F141C;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Cinzel', serif;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 16px;
            box-shadow: 0 8px 20px rgba(197, 154, 63, 0.25);
        }

        .brand-header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.02em;
            margin-bottom: 4px;
        }

        .brand-header p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .error-alert {
            background: rgba(239, 68, 68, 0.12);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #F87171;
            padding: 12px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #CBD5E1;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748B;
            width: 18px;
            height: 18px;
        }

        .form-control {
            width: 100%;
            background: var(--surface-card);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 13px 14px 13px 44px;
            color: #fff;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(197, 154, 63, 0.15);
        }

        .btn-submit {
            width: 100%;
            background: var(--gold);
            color: #090D14;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.03em;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s ease;
            margin-top: 8px;
        }

        .btn-submit:hover {
            background: var(--gold-light);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(197, 154, 63, 0.3);
        }

        .demo-credentials {
            margin-top: 28px;
            background: rgba(30, 41, 59, 0.5);
            border: 1px dashed #334155;
            border-radius: 8px;
            padding: 12px 14px;
            font-size: 12px;
            color: var(--text-muted);
            text-align: center;
        }

        .demo-credentials code {
            color: var(--gold);
            font-family: 'IBM Plex Mono', monospace;
            background: #090D14;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #64748B;
            font-size: 13px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .back-link a:hover {
            color: var(--gold);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="brand-header">
            <div class="logo-symbol">M</div>
            <h1>MUSKAN INTERIORS</h1>
            <p>Admin Management & Work Uploader Portal</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error-alert">
                <i data-lucide="alert-circle" style="width:18px;height:18px;flex-shrink:0;"></i>
                <span><?= htmlspecialchars($error) ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label class="form-label">Username</label>
                <div class="input-wrap">
                    <i data-lucide="user"></i>
                    <input type="text" name="username" class="form-control" placeholder="Enter admin username" value="admin" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-wrap">
                    <i data-lucide="lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" value="admin123" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                Sign In to Dashboard <i data-lucide="arrow-right" style="width:16px;height:16px;"></i>
            </button>
        </form>

        <div class="demo-credentials">
            Default Login: Username: <code>admin</code> &bull; Password: <code>admin123</code>
        </div>

        <div class="back-link">
            <a href="../index.php"><i data-lucide="arrow-left" style="width:14px;height:14px;"></i> Return to Public Website</a>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
