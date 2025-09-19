// assets/js/login.js

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            const usuario = document.getElementById('usuario').value.trim();
            const clave = document.getElementById('clave').value.trim();

            if (usuario === "" || clave === "") {
                e.preventDefault(); // solo bloquear si falta algo
                document.getElementById('loginError').style.display = 'block';
                document.getElementById('loginError').textContent = "Complete usuario y clave";
            }
            // Si está todo lleno, NO hacemos preventDefault → el form se manda a procesarLogin.php
        });
    }
});
