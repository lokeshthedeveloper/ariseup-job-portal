// Configuration
const API_BASE_URL = window.location.origin + "/company";

// Get CSRF token
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
console.log('CSRF Token:', csrfToken);

// Countdown timers
let emailCountdownInterval;
let phoneCountdownInterval;
let emailCountdownSeconds = 60;
let phoneCountdownSeconds = 60;

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
    // Check if user data is available
    if (!window.userEmail || !window.userPhone) {
        showAlert("User data missing. Redirecting to login...", "error");
        setTimeout(() => {
            window.location.href = "/company/login";
        }, 2000);
        return;
    }

    // Send OTPs only for unverified methods
    if (window.verificationNeeded && window.verificationNeeded.email) {
        sendOtp('email');
    }
    if (window.verificationNeeded && window.verificationNeeded.phone) {
        sendOtp('phone');
    }

    // If both are already verified, redirect to dashboard
    if (window.emailVerified && window.phoneVerified) {
        showAlert("Your account is already verified. Redirecting to dashboard...", "success");
        setTimeout(() => {
            window.location.href = "/company/dashboard";
        }, 1500);
        return;
    }

    // Focus first input that needs verification
    if (window.verificationNeeded && window.verificationNeeded.email) {
        document.getElementById("email_otp")?.focus();
    } else if (window.verificationNeeded && window.verificationNeeded.phone) {
        document.getElementById("phone_otp")?.focus();
    }

    // Auto-format OTP inputs
    ['email_otp', 'phone_otp'].forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener("input", function (e) {
                this.value = this.value.replace(/[^0-9]/g, "");
            });
        }
    });
});

// Send OTP function
async function sendOtp(type) {
    const identifier = type === 'email' ? window.userEmail : window.userPhone;
    const btnId = type === 'email' ? 'resendEmailBtn' : 'resendPhoneBtn';
    const btn = document.getElementById(btnId);
    
    // Don't send if button is disabled (unless it's initial load)
    // We'll handle initial load separately or just call API directly
    
    try {
        const response = await fetch(`${API_BASE_URL}/resend-otp`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                identifier: identifier,
                type: type,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            showAlert(`${type.charAt(0).toUpperCase() + type.slice(1)} OTP sent successfully!`, "success");
            startCountdown(type);
        } else {
            showAlert(`Failed to send ${type} OTP: ${data.message}`, "error");
        }
    } catch (error) {
        console.error(`Send ${type} OTP error:`, error);
    }
}

// Handle OTP form submission
document.getElementById("otpForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const emailOtpInput = document.getElementById("email_otp");
    const phoneOtpInput = document.getElementById("phone_otp");
    const emailOtp = emailOtpInput?.value.trim() || '';
    const phoneOtp = phoneOtpInput?.value.trim() || '';

    // Validate OTPs only for methods that need verification
    let isValid = true;
    
    if (window.verificationNeeded && window.verificationNeeded.email) {
        if (emailOtp.length !== 6) {
            showError(emailOtpInput, "Please enter a valid 6-digit Email OTP");
            isValid = false;
        } else {
            clearError(emailOtpInput);
        }
    }

    if (window.verificationNeeded && window.verificationNeeded.phone) {
        if (phoneOtp.length < 4 || phoneOtp.length > 6) {
            showError(phoneOtpInput, "Please enter a valid 4-6 digit Phone OTP");
            isValid = false;
        } else {
            clearError(phoneOtpInput);
        }
    }

    if (!isValid) return;

    // Show loading state
    const verifyBtn = document.getElementById("verifyBtn");
    const originalText = verifyBtn.innerHTML;
    verifyBtn.disabled = true;
    verifyBtn.classList.add("loading");
    verifyBtn.innerHTML = '<i class="bi bi-hourglass me-2"></i> Verifying...';

    try {
        // Prepare the request data
        const requestData = {
            email: window.userEmail,
            phone: window.userPhone,
        };

        // Add OTPs only if they need verification
        if (window.verificationNeeded && window.verificationNeeded.email) {
            requestData.email_otp = emailOtp;
        }
        if (window.verificationNeeded && window.verificationNeeded.phone) {
            requestData.phone_otp = phoneOtp;
        }

        // Send single request to verify both OTPs
        const response = await fetch(`${API_BASE_URL}/verify-both-otps`, {
            method: "POST",
            headers: { 
                "Content-Type": "application/json", 
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify(requestData),
        });

        const data = await response.json();

        if (!response.ok || !data.success) {
            throw new Error(data.message || "Verification failed");
        }

        // Store authentication data
        if (data.token) {
            localStorage.setItem("auth_token", data.token);
            localStorage.setItem("user_data", JSON.stringify(data.user));
        }

        showAlert("Verification successful! Redirecting to dashboard...", "success");

        setTimeout(() => {
            window.location.href = "/company/dashboard";
        }, 1500);

    } catch (error) {
        console.error("Verification error:", error);
        showAlert(error.message || "An error occurred. Please try again.", "error");
        verifyBtn.disabled = false;
        verifyBtn.classList.remove("loading");
        verifyBtn.innerHTML = originalText;
    }
});

// Handle resend buttons
['Email', 'Phone'].forEach(type => {
    document.getElementById(`resend${type}Btn`).addEventListener("click", function () {
        if (this.disabled) return;
        sendOtp(type.toLowerCase());
    });
});

// Countdown timer
function startCountdown(type) {
    const btnId = type === 'email' ? 'resendEmailBtn' : 'resendPhoneBtn';
    const spanId = type === 'email' ? 'emailCountdown' : 'phoneCountdown';
    const btn = document.getElementById(btnId);
    const span = document.getElementById(spanId);
    
    let seconds = 60;
    btn.disabled = true;
    span.textContent = seconds;

    const interval = setInterval(() => {
        seconds--;
        span.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(interval);
            btn.disabled = false;
            span.textContent = "0";
        }
    }, 1000);
}

// Show error message
function showError(input, message) {
    const formGroup = input.closest(".form-group");
    let errorElement = formGroup.querySelector(".error-message");
    if (!errorElement) {
        errorElement = document.createElement("div");
        errorElement.className = "error-message text-danger small mt-1";
        formGroup.appendChild(errorElement);
    }
    input.style.borderColor = "#e74c3c";
    errorElement.textContent = message;
}

// Clear error message
function clearError(input) {
    const formGroup = input.closest(".form-group");
    if (!formGroup) return;
    const errorElement = formGroup.querySelector(".error-message");
    input.style.borderColor = "";
    if (errorElement) errorElement.textContent = "";
}

// Show alert message
function showAlert(message, type = "info") {
    const alertElement = document.getElementById("alertMessage");
    const alertText = document.getElementById("alertText");
    alertElement.className = `alert alert-dismissible fade show ${type}`;
    alertText.textContent = message;
    alertElement.style.display = "block";
    setTimeout(() => {
        alertElement.classList.remove("show");
        setTimeout(() => { alertElement.style.display = "none"; }, 150);
    }, 5000);
}

// Clear error on input
['email_otp', 'phone_otp'].forEach(id => {
    const input = document.getElementById(id);
    if(input) {
        input.addEventListener("input", function () {
            clearError(this);
        });
    }
});
