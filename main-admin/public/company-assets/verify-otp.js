// Configuration
const API_BASE_URL = window.location.origin + '/api/company';

// Get verification data from session storage
let verificationData = null;

// Timer variables
let countdownInterval = null;
let remainingTime = 600; // 10 minutes in seconds

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    // Get verification data
    const storedData = sessionStorage.getItem('verification_data');

    if (!storedData) {
        showAlert('No verification data found. Please register first.', 'error');
        setTimeout(() => {
            window.location.href = '/company-registration/register';
        }, 2000);
        return;
    }

    verificationData = JSON.parse(storedData);

    // Display verification target
    const targetElement = document.getElementById('verificationTarget');
    targetElement.textContent = verificationData.identifier;

    // Start countdown timer
    startCountdown();

    // Focus first OTP input
    document.getElementById('otp1').focus();
});

// OTP input navigation
function moveToNext(current, nextId) {
    if (current.value.length === 1 && nextId) {
        document.getElementById(nextId).focus();
    }
}

function moveToPrev(event, current, prevId) {
    if (event.key === 'Backspace' && current.value.length === 0 && prevId) {
        document.getElementById(prevId).focus();
    }
}

function handleLastInput(current) {
    if (current.value.length === 1) {
        // All inputs filled, could auto-submit
        current.blur();
    }
}

// Allow only numbers in OTP inputs
document.querySelectorAll('.otp-input').forEach(input => {
    input.addEventListener('keypress', function(e) {
        if (!/[0-9]/.test(e.key)) {
            e.preventDefault();
        }
    });

    // Auto-clear on focus
    input.addEventListener('focus', function() {
        this.select();
    });

    // Paste handler
    input.addEventListener('paste', function(e) {
        e.preventDefault();
        const pastedData = e.clipboardData.getData('text');
        const digits = pastedData.match(/\d/g);

        if (digits && digits.length === 6) {
            for (let i = 0; i < 6; i++) {
                document.getElementById(`otp${i + 1}`).value = digits[i];
            }
            document.getElementById('otp6').focus();
        }
    });
});

// Countdown timer
function startCountdown() {
    remainingTime = 600; // Reset to 10 minutes
    updateCountdownDisplay();

    countdownInterval = setInterval(() => {
        remainingTime--;
        updateCountdownDisplay();

        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            showExpiredState();
        }
    }, 1000);
}

function updateCountdownDisplay() {
    const minutes = Math.floor(remainingTime / 60);
    const seconds = remainingTime % 60;
    const display = `${minutes}:${seconds.toString().padStart(2, '0')}`;

    document.getElementById('countdown').textContent = display;

    // Change color when time is running out
    const timerElement = document.getElementById('timer');
    if (remainingTime <= 60) {
        timerElement.style.color = '#e74c3c';
    } else {
        timerElement.style.color = '';
    }
}

function showExpiredState() {
    document.getElementById('timer').style.display = 'none';
    document.getElementById('resendSection').style.display = 'block';
    showAlert('Your OTP has expired. Please request a new one.', 'error');
}

// Show alert message
function showAlert(message, type = 'info') {
    const alertElement = document.getElementById('alertMessage');
    alertElement.className = `alert ${type}`;
    alertElement.textContent = message;
    alertElement.style.display = 'flex';

    // Auto hide after 5 seconds
    setTimeout(() => {
        alertElement.style.display = 'none';
    }, 5000);
}

// Get OTP from inputs
function getOTP() {
    let otp = '';
    for (let i = 1; i <= 6; i++) {
        const value = document.getElementById(`otp${i}`).value;
        if (!value) {
            return null;
        }
        otp += value;
    }
    return otp;
}

// Clear OTP inputs
function clearOTPInputs() {
    for (let i = 1; i <= 6; i++) {
        document.getElementById(`otp${i}`).value = '';
    }
    document.getElementById('otp1').focus();
}

// Verify OTP
document.getElementById('otpForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const otp = getOTP();

    if (!otp) {
        showAlert('Please enter the complete 6-digit code', 'error');
        return;
    }

    // Show loading state
    const verifyBtn = document.getElementById('verifyBtn');
    const originalText = verifyBtn.innerHTML;
    verifyBtn.disabled = true;
    verifyBtn.classList.add('loading');

    try {
        // Make API request
        const response = await fetch(`${API_BASE_URL}/verify-otp`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                identifier: verificationData.identifier,
                type: verificationData.type,
                otp: otp
            })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            // Store auth token
            localStorage.setItem('auth_token', data.token);
            localStorage.setItem('user_data', JSON.stringify(data.user));

            // Clear verification data
            sessionStorage.removeItem('verification_data');

            // Stop countdown
            clearInterval(countdownInterval);

            // Show success message
            showAlert('Verification successful! Redirecting...', 'success');

            // Redirect to success page or dashboard
            setTimeout(() => {
                window.location.href = '/company-registration/success';
            }, 1500);
        } else {
            // Show error message
            let errorMessage = 'Verification failed. Please try again.';

            if (data.errors) {
                const errors = Object.values(data.errors).flat();
                errorMessage = errors.join(', ');
            } else if (data.message) {
                errorMessage = data.message;
            }

            showAlert(errorMessage, 'error');

            // Clear OTP inputs
            clearOTPInputs();

            // Reset button
            verifyBtn.disabled = false;
            verifyBtn.classList.remove('loading');
            verifyBtn.innerHTML = originalText;
        }
    } catch (error) {
        console.error('Verification error:', error);
        showAlert('An error occurred. Please check your connection and try again.', 'error');

        // Clear OTP inputs
        clearOTPInputs();

        // Reset button
        verifyBtn.disabled = false;
        verifyBtn.classList.remove('loading');
        verifyBtn.innerHTML = originalText;
    }
});

// Resend OTP
async function resendOtp() {
    try {
        showAlert('Sending new code...', 'info');

        const response = await fetch(`${API_BASE_URL}/resend-otp`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                identifier: verificationData.identifier,
                type: verificationData.type
            })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            showAlert('New code sent successfully!', 'success');

            // Hide resend section and show timer
            document.getElementById('resendSection').style.display = 'none';
            document.getElementById('timer').style.display = 'block';

            // Restart countdown
            startCountdown();

            // Clear OTP inputs
            clearOTPInputs();
        } else {
            let errorMessage = 'Failed to resend code. Please try again.';
            if (data.message) {
                errorMessage = data.message;
            }
            showAlert(errorMessage, 'error');
        }
    } catch (error) {
        console.error('Resend error:', error);
        showAlert('An error occurred. Please try again.', 'error');
    }
}
