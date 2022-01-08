document.addEventListener('DOMContentLoaded', function() {
    var result = document.querySelector('.generator');
    var copy = document.querySelector('.btn-outline-primary');
    var pwField = document.getElementById('password');
    var pwField2 = document.getElementById('password_confirm');


    function copyToClipboard(text) {
        Swal.fire({
            icon: 'success',
            title: 'Click Button to Copy to Clipboard',
            confirmButtonText: '<i class="far fa-copy"></i> Copy',
            confirmButtonColor: '#28A745',
            text: text,
        }).then((result) => {
            if (result.isConfirmed) {
                navigator.clipboard.writeText(text);
            }
        })
    }

    function generatePass(pwField) {
        var newPassword = '';
        var chars = 'abcdefghijklmnopqrstuvwxyz';
        var pwLength = document.getElementById('pwLength');
        var caps = document.getElementById('caps');
        var special = document.getElementById('special');
        var numbers = document.getElementById('numbers');

        if (caps.checked) {
            chars = chars.concat('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        }

        if (special.checked) {
            chars = chars.concat('!@#$%^&*');
        }

        if (numbers.checked) {
            chars = chars.concat('123456789');
        }

        for (var i = pwLength.value; i > 0; --i) {
            newPassword += chars[Math.round(Math.random() * (chars.length - 1))];
        }

        pwField.value = newPassword;
        pwField2.value = newPassword;
        Swal.fire(newPassword).then(copyToClipboard(pwField.value));
    }
    result.addEventListener('click', function() {
        generatePass(pwField).then(copyToClipboard(pwField.value));
    });
});