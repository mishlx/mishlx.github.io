document.addEventListener('DOMContentLoaded', function () {
    const otpFields = document.querySelectorAll('input[name="otp[]"]');
    
    otpFields.forEach((field, index) => {
        field.addEventListener('input', function () {
            if (this.value.length === 1) {
                const nextField = otpFields[index + 1];
                if (nextField) {
                    nextField.focus();
                }
            }
        });

        field.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && this.value === '') {
                const previousField = otpFields[index - 1];
                if (previousField) {
                    previousField.focus();
                }
            }
        });
    });
});
