document.getElementById('email').addEventListener('input', function() {
    const email = this.value;
    const emailMessage = document.getElementById('emailMessage');

    if (email.includes('@') && email.includes('.com') ) {
        emailMessage.textContent = 'Email  valide';
        emailMessage.className = 'message success';
    } else {
        emailMessage.textContent = 'Veuillez entrer une adresse email valide';
        emailMessage.className = 'message error';
    }
});

document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const passwordMessage = document.getElementById('passwordMessage');

    // Vérification des règles du mot de passe
    const hasUpperCase = /[A-Z]/.test(password);
    const hasNumber = /[0-9]/.test(password);
    const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    const isLengthValid = password.length >= 8;

    if (hasUpperCase && hasNumber && hasSymbol && isLengthValid) {
        passwordMessage.textContent = 'Mot de passe valide';
        passwordMessage.className = 'message success';
    } else {
        let errorMessage = 'Le mot de passe doit contenir :';
        if (!hasUpperCase) errorMessage += ' une majuscule,';
        if (!hasNumber) errorMessage += ' un chiffre,';
        if (!hasSymbol) errorMessage += ' un symbole,';
        if (!isLengthValid) errorMessage += ' au moins 8 caractères.';

        // Supprimer la virgule finale
        errorMessage = errorMessage.replace(/,$/, '.');

        passwordMessage.textContent = errorMessage;
        passwordMessage.className = 'message error';
    }
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Vérification finale avant soumission
    const hasUpperCase = /[A-Z]/.test(password);
    const hasNumber = /[0-9]/.test(password);
    const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    const isLengthValid = password.length >= 8;

    if (!email.includes('@') || !(hasUpperCase && hasNumber && hasSymbol && isLengthValid)) {
        event.preventDefault();
        alert('Veuillez corriger les erreurs avant de soumettre le formulaire.');
    }
});