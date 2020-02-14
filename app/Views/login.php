<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/vendor.css">
    <!-- Theme initialization -->
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
        var themeName = themeSettings.themeName || '';
        if (themeName)
        {
            document.write('<link rel="stylesheet" id="theme-style" href=' + themeName + '"css/app-.css">');
        }
        else
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
</head>
<body>
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <div class="logo">
                        <span class="l l1"></span>
                        <span class="l l2"></span>
                        <span class="l l3"></span>
                        <span class="l l4"></span>
                        <span class="l l5"></span>
                    </div> Moja eFirma
                </h1>
            </header>
            <div class="auth-content">
                <p class="text-center">ULOGUJTE SE U APLIKACIJU</p>
                <form id="login-form" action="index.php?page=login/validate" method="POST">
                    <div class="form-group">
                        <label for="username">Korisničko ime</label>
                        <input type="text" class="form-control underlined" name="username" id="username" placeholder="Korisničko ime" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control underlined" name="password" id="password" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary" name="btnLogin">Ulogujte se</button>
                    </div>
                    <?php if(isset($_SESSION['error'])): ?>
                        <button type='button' class='btn btn-danger btn-lg'><?= $_SESSION['error']; ?></button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
<script src="js/vendor.js"></script>
</body>
</html>