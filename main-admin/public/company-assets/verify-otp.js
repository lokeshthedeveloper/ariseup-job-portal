// Configuration
const API_BASE_URL = window.location.origin + "/api/company";

// Countdown timer
let countdownInterval;
let countdownSeconds = 60;

// Verification data
let verificationData = null;

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
    // Get verification data from sessionStorage
    const storedData = sessionStorage.getItem("verification_data");

    if (!storedData) {
        showAlert(
            "No verification data found. Please register first.",
            "error"
        );
        setTimeout(() => {
            window.location.href = "/company/register";
        }, 2000);
        return;
    }

    verificationData = JSON.parse(storedData);

    // Display identifier
    const identifierDisplay = document.getElementById("identifierDisplay");
    if (verificationData.type === "email") {
        identifierDisplay.textContent = maskEmail(verificationData.identifier);
    } else {
        identifierDisplay.textContent = maskPhone(verificationData.identifier);
    }

    // Start countdown
    startCountdown();

    // Focus OTP input
    document.getElementById("otp").focus();

    // Auto-format OTP input (only numbers)
    document.getElementById("otp").addEventListener("input", function (e) {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
});

// Handle OTP form submission
document.getElementById("otpForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const otpInput = document.getElementById("otp");
    const otp = otpInput.value.trim();

    // Validate OTP
    if (otp.length !== 6) {
        showError(otpInput, "Please enter a valid 6-digit OTP");
        return;
    }

    clearError(otpInput);

    // Show loading state
    const verifyBtn = document.getElementById("verifyBtn");
    const originalText = verifyBtn.innerHTML;
    verifyBtn.disabled = true;
    verifyBtn.classList.add("loading");
    verifyBtn.innerHTML = '<i class="bi bi-hourglass me-2"></i> Verifying...';

    try {
        const response = await fetch(`${API_BASE_URL}/verify-otp`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({
                identifier: verificationData.identifier,
                type: verificationData.type,
                otp: otp,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            // Store token in localStorage
            localStorage.setItem("auth_token", data.token);
            localStorage.setItem("user_data", JSON.stringify(data.user));

            // Clear verification data
            sessionStorage.removeItem("verification_data");

            // Show success message
            showAlert("Verification successful! Redirecting to dashboard...", "success");

            // Redirect to dashboard
            setTimeout(() => {
                window.location.href = "/company/dashboard";
            }, 1500);
        } else {
            // Show error message
            const errorMessage = data.message || "Invalid OTP. Please try again.";
            showAlert(errorMessage, "error");
            verifyBtn.disabled = false;
            verifyBtn.classList.remove("loading");
            verifyBtn.innerHTML = originalText;
            otpInput.value = "";
            otpInput.focus();
        }
    } catch (error) {
        console.error("Verification error:", error);
        showAlert("An error occurred. Please try again.", "error");
        verifyBtn.disabled = false;
        verifyBtn.classList.remove("loading");
        verifyBtn.innerHTML = originalText;
    }
});

// Handle resend OTP
document.getElementById("resendBtn").addEventListener("click", async function () {
    if (this.disabled) return;

    const resendBtn = this;
    const originalText = resendBtn.innerHTML;
    resendBtn.disabled = true;
    resendBtn.innerHTML = '<i class="bi bi-hourglass me-2"></i> Sending...';

    try {
        const response = await fetch(`${API_BASE_URL}/resend-otp`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({
                identifier: verificationData.identifier,
                type: verificationData.type,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            showAlert("OTP has been resent successfully!", "success");
            // Restart countdown
            countdownSeconds = 60;
            startCountdown();
        } else {
            showAlert(data.message || "Failed to resend OTP. Please try again.", "error");
            resendBtn.disabled = false;
            resendBtn.innerHTML = originalText;
        }
    } catch (error) {
        console.error("Resend error:", error);
        showAlert("An error occurred. Please try again.", "error");
        resendBtn.disabled = false;
        resendBtn.innerHTML = originalText;
    }
});

// Countdown timer
function startCountdown() {
    const resendBtn = document.getElementById("resendBtn");
    const countdownSpan = document.getElementById("countdown");

    resendBtn.disabled = true;

    countdownInterval = setInterval(() => {
        countdownSeconds--;
        countdownSpan.textContent = countdownSeconds;

        if (countdownSeconds <= 0) {
            clearInterval(countdownInterval);
            resendBtn.disabled = false;
            resendBtn.innerHTML = "Resend OTP";
        }
    }, 1000);
}

// Mask email
function maskEmail(email) {
    const [username, domain] = email.split("@");
    const maskedUsername =
        username.substring(0, 2) +
        "*".repeat(Math.max(0, username.length - 4)) +
        username.substring(username.length - 2);
    return `${maskedUsername}@${domain}`;
}

// Mask phone
function maskPhone(phone) {
    const visibleDigits = 4;
    const maskedPart = "*".repeat(Math.max(0, phone.length - visibleDigits));
    const visiblePart = phone.substring(phone.length - visibleDigits);
    return maskedPart + visiblePart;
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
    if (errorElement) {
        errorElement.textContent = "";
    }
}

// Show alert message
function showAlert(message, type = "info") {
    const alertElement = document.getElementById("alertMessage");
    const alertText = document.getElementById("alertText");

    alertElement.className = `alert alert-dismissible fade show ${type}`;
    alertText.textContent = message;
    alertElement.style.display = "block";

    // Auto hide after 5 seconds
    setTimeout(() => {
        alertElement.classList.remove("show");
        setTimeout(() => {
            alertElement.style.display = "none";
        }, 150);
    }, 5000);
}

// Clear error on input
document.getElementById("otp").addEventListener("input", function () {
    clearError(this);
});
