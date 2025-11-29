// Configuration
const API_BASE_URL = window.location.origin + "/company";

// Get CSRF token
const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
console.log('CSRF Token:', csrfToken);

// Current step tracker
let currentStep = window.initialStep || 1;
console.log('Current Step initialized to:', currentStep);

// Form data storage
let formData = {
    user_id: window.userId || null
};

// Step navigation
async function nextStep(step) {
    // Validate current step before proceeding
    if (!validateStep(currentStep)) {
        return;
    }

    // Save current step data
    saveStepData(currentStep);

    // Step 1 -> 2: Register User Details
    if (currentStep === 1 && step === 2) {
        const success = await registerStep1();
        if (!success) return;
    }

    // Step 2 -> Complete: Register Company Details and redirect to OTP
    if (currentStep === 2) {
        const success = await registerStep2();
        if (!success) return;
        // registerStep2 will handle the redirect
        return;
    }

    // Hide current step
    document.getElementById(`step${currentStep}`).classList.remove("active");
    document
        .querySelector(`.steps-progress .step-item:nth-child(${currentStep})`)
        .classList.remove("active");

    // Show next step
    currentStep = step;
    document.getElementById(`step${step}`).classList.add("active");
    document
        .querySelector(`.steps-progress .step-item:nth-child(${step})`)
        .classList.add("active");

    // Scroll to top
    window.scrollTo({ top: 0, behavior: "smooth" });
}

function prevStep(step) {
    // Save current step data
    saveStepData(currentStep);

    // Hide current step
    document.getElementById(`step${currentStep}`).classList.remove("active");
    document
        .querySelector(`.steps-progress .step-item:nth-child(${currentStep})`)
        .classList.remove("active");

    // Show previous step
    currentStep = step;
    document.getElementById(`step${step}`).classList.add("active");
    document
        .querySelector(`.steps-progress .step-item:nth-child(${step})`)
        .classList.add("active");

    // Scroll to top
    window.scrollTo({ top: 0, behavior: "smooth" });
}

// Save step data to formData object
function saveStepData(step) {
    const stepElement = document.getElementById(`step${step}`);
    const inputs = stepElement.querySelectorAll("input, select, textarea");

    inputs.forEach((input) => {
        if (input.type === "radio") {
            if (input.checked) {
                formData[input.name] = input.value;
            }
        } else {
            formData[input.name] = input.value;
        }
    });
}

// Validate step
function validateStep(step) {
    const stepElement = document.getElementById(`step${step}`);
    const inputs = stepElement.querySelectorAll(
        "input[required], select[required], textarea[required]"
    );
    let isValid = true;

    inputs.forEach((input) => {
        clearError(input);

        if (!input.value.trim()) {
            showError(input, "This field is required");
            isValid = false;
        } else {
            // Specific validations
            if (input.type === "email" && !validateEmail(input.value)) {
                showError(input, "Please enter a valid email address");
                isValid = false;
            }

            if (input.type === "tel" && !validatePhone(input.value)) {
                showError(input, "Please enter a valid phone number");
                isValid = false;
            }

            if (input.type === "url" && !validateURL(input.value)) {
                showError(
                    input,
                    "Please enter a valid URL (e.g., https://example.com)"
                );
                isValid = false;
            }

            if (input.name === "password" && input.value.length < 8) {
                showError(input, "Password must be at least 8 characters");
                isValid = false;
            }

            if (input.name === "password_confirmation") {
                const password = document.getElementById("password").value;
                if (input.value !== password) {
                    showError(input, "Passwords do not match");
                    isValid = false;
                }
            }
        }
    });

    return isValid;
}

// Validation helpers
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re =
        /^[\+]?[(]?[0-9]{1,4}[)]?[-\s\.]?[(]?[0-9]{1,4}[)]?[-\s\.]?[0-9]{1,9}$/;
    return re.test(phone);
}

function validateURL(url) {
    try {
        new URL(url);
        return true;
    } catch (e) {
        return false;
    }
}

// Error handling
function showError(input, message) {
    const formGroup = input.closest(".form-group");
    let errorElement = formGroup.querySelector(".error-message");

    // Create error element if it doesn't exist
    if (!errorElement) {
        errorElement = document.createElement("div");
        errorElement.className = "error-message text-danger small mt-1";
        formGroup.appendChild(errorElement);
    }

    input.style.borderColor = "#e74c3c";
    errorElement.textContent = message;
}

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
    alertElement.className = `alert ${type}`;
    alertElement.textContent = message;
    alertElement.style.display = "flex";

    // Auto hide after 5 seconds
    setTimeout(() => {
        alertElement.style.display = "none";
    }, 5000);
}

// Password toggle
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling;

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}

// Select verification method
function selectVerification(method) {
    document.querySelectorAll(".verification-card").forEach((card) => {
        card.classList.remove("selected");
    });

    if (method === "email") {
        document.getElementById("verify_email").checked = true;
    } else {
        document.getElementById("verify_phone").checked = true;
    }
}

// Social login
function socialLogin(provider) {
    showAlert("Redirecting to " + provider + "...", "info");
    window.location.href = `${API_BASE_URL}/auth/${provider}`;
}

// Register Step 1: User Details
async function registerStep1() {
    const btn = document.querySelector("#step1 button");
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = "Processing...";

    try {
        // Combine country code and phone
        const fullPhone = (formData.country_code || '') + formData.phone;

        const response = await fetch(`${API_BASE_URL}/register-step1`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                name: formData.name,
                email: formData.email,
                password: formData.password,
                password_confirmation: formData.password_confirmation,
                phone: fullPhone,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            formData.user_id = data.user_id;
            btn.disabled = false;
            btn.innerHTML = originalText;
            return true;
        } else {
            // Handle errors
            if (data.errors) {
                Object.keys(data.errors).forEach((key) => {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) {
                        let message = data.errors[key][0];
                        if (key === 'email' && message.includes('taken')) {
                            message = 'Email already registered. <a href="/company/login">Login here</a>';
                            // Show error with HTML
                            const formGroup = input.closest(".form-group");
                            let errorElement = formGroup.querySelector(".error-message");
                            if (!errorElement) {
                                errorElement = document.createElement("div");
                                errorElement.className = "error-message text-danger small mt-1";
                                formGroup.appendChild(errorElement);
                            }
                            input.style.borderColor = "#e74c3c";
                            errorElement.innerHTML = message;
                        } else {
                            showError(input, message);
                        }
                    }
                });
            } else {
                showAlert(data.message || "Registration failed", "error");
            }
            btn.disabled = false;
            btn.innerHTML = originalText;
            return false;
        }
    } catch (error) {
        console.error("Step 1 Error:", error);
        showAlert("An error occurred. Please try again.", "error");
        btn.disabled = false;
        btn.innerHTML = originalText;
        return false;
    }
}

// Register Step 2: Company Details
async function registerStep2() {
    const btn = document.querySelector("#step2 button[onclick*='nextStep']");
    const originalText = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = "Processing...";

    try {
        const response = await fetch(`${API_BASE_URL}/register-step2`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                user_id: formData.user_id,
                company_name: formData.company_name,
                company_type: formData.company_type,
                industry: formData.industry,
                company_size: formData.company_size,
                country: formData.country,
                state: formData.state,
                district: formData.district,
                city: formData.city,
                website: formData.website,
                about_us: formData.about_us,
            }),
        });

        const data = await response.json();

        if (response.ok && data.success) {
            // Redirect to OTP verification page
            window.location.href = '/company-registration/verify-otp';
            return true;
        } else {
            // Handle errors
            if (data.errors) {
                Object.keys(data.errors).forEach((key) => {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) {
                        showError(input, data.errors[key][0]);
                    }
                });
            } else {
                showAlert(data.message || "Company registration failed", "error");
            }
            btn.disabled = false;
            btn.innerHTML = originalText;
            return false;
        }
    } catch (error) {
        console.error("Step 2 Error:", error);
        showAlert("An error occurred. Please try again.", "error");
        btn.disabled = false;
        btn.innerHTML = originalText;
        return false;
    }
}

// Form submission (Step 2 + Verification Method)
document
    .getElementById("registrationForm")
    .addEventListener("submit", async function (e) {
        e.preventDefault();

        // Validate final step
        if (!validateStep(currentStep)) {
            return;
        }

        // Save final step data
        saveStepData(currentStep);

        // Show loading state
        const submitBtn = document.getElementById("submitBtn");
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.classList.add("loading");

        try {
            // Prepare data for API
            const registrationData = {
                name: formData.name, // This will be removed as it's handled by step1
                email: formData.email, // This will be removed as it's handled by step1
                password: formData.password, // This will be removed as it's handled by step1
                password_confirmation: formData.password_confirmation, // This will be removed as it's handled by step1
                phone: formData.phone, // This will be removed as it's handled by step1
                company_name: formData.company_name,
                company_type: formData.company_type,
                verification_method: formData.verification_method,
                // Additional company fields
                industry: formData.industry,
                company_size: formData.company_size,
                location: formData.location,
                website: formData.website,
                description: formData.description,
                about_us: formData.about_us,
            };

            console.log("Submitting registration data:", registrationData);

            // Make API request to register-step2
            const response = await fetch(`${API_BASE_URL}/register-step2`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({
                    user_id: formData.user_id,
                    company_name: formData.company_name,
                    company_type: formData.company_type,
                    verification_method: formData.verification_method,
                    // Additional company fields
                    industry: formData.industry,
                    company_size: formData.company_size,
                    country: formData.country,
                    state: formData.state,
                    district: formData.district,
                    city: formData.city,
                    website: formData.website,
                    description: formData.description,
                    about_us: formData.about_us,
                }),
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Store data in sessionStorage for OTP verification
                sessionStorage.setItem(
                    "verification_data",
                    JSON.stringify({
                        identifier:
                            formData.verification_method === "email"
                                ? formData.email
                                : formData.phone,
                        type: formData.verification_method,
                        user_id: data.user_id,
                    })
                );

                // Show success message
                showAlert(
                    "Registration successful! Redirecting to verification...",
                    "success"
                );

                // Redirect to OTP verification page
                setTimeout(() => {
                    window.location.href = "/company-registration/verify-otp";
                }, 1500);
            } else {
                // Show error message
                let errorMessage = "Registration failed. Please try again.";

                if (data.errors) {
                    // Display validation errors
                    const errors = Object.values(data.errors).flat();
                    errorMessage = errors.join(", ");
                } else if (data.message) {
                    errorMessage = data.message;
                }

                showAlert(errorMessage, "error");
                submitBtn.disabled = false;
                submitBtn.classList.remove("loading");
                submitBtn.innerHTML = originalText;
            }
        } catch (error) {
            console.error("Registration error:", error);
            showAlert(
                "An error occurred. Please check your connection and try again.",
                "error"
            );
            submitBtn.disabled = false;
            submitBtn.classList.remove("loading");
            submitBtn.innerHTML = originalText;
        }
    });

// Clear error on input
document.querySelectorAll("input, select, textarea").forEach((input) => {
    input.addEventListener("input", function () {
        clearError(this);
    });
});

// Initialize
document.addEventListener("DOMContentLoaded", function () {
    // Clear any stored verification data
    sessionStorage.removeItem("verification_data");

    // If starting from a step > 1, show that step
    if (currentStep > 1) {
        // Hide step 1
        document.getElementById("step1").classList.remove("active");
        document.querySelector(".steps-progress .step-item:nth-child(1)").classList.remove("active");
        
        // Show current step
        document.getElementById(`step${currentStep}`).classList.add("active");
        document.querySelector(`.steps-progress .step-item:nth-child(${currentStep})`).classList.add("active");
        
        // Mark previous steps as completed (optional visual improvement)
        for (let i = 1; i < currentStep; i++) {
             document.querySelector(`.steps-progress .step-item:nth-child(${i})`).classList.add("completed");
        }
    } else {
        // Focus first input
        document.getElementById("name").focus();
    }

    // Disable back buttons if user is authenticated (resuming registration)
    if (window.userId) {
        const backButtons = document.querySelectorAll('button[onclick^="prevStep"]');
        backButtons.forEach(button => {
            button.disabled = true;
            button.style.opacity = '0.5';
            button.style.cursor = 'not-allowed';
            button.title = 'You cannot go back during profile completion';
        });
    }
});
