document.addEventListener('DOMContentLoaded', function() {
    var lockIcons = document.querySelectorAll('.ti-lock');
    var passwordFields = document.querySelectorAll('input[type="password"]');

    lockIcons.forEach(function(lockIcon, index) {
        lockIcon.addEventListener('click', function() {
            if (passwordFields[index].type === 'password') {
                passwordFields[index].type = 'text';
                lockIcon.classList.remove('ti-lock');
                lockIcon.classList.add('ti-unlock');
            } else {
                passwordFields[index].type = 'password';
                lockIcon.classList.remove('ti-unlock');
                lockIcon.classList.add('ti-lock');
            }
        });
    });
});