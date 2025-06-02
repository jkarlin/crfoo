<?php
header("Supports-Loading-Mode: fenced-frame");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Credit Card Checkout</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      /* General Body and Box Sizing */
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        font-family: "Inter", sans-serif;
        background: linear-gradient(to bottom right, #0f172a, #1e293b);
        color: #334155;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
      }

      /* Main Form Container */
      .form-container {
        background: #ffffff;
        border-radius: 0.75rem;
        box-shadow:
          0 20px 25px -5px rgba(0, 0, 0, 0.1),
          0 10px 10px -5px rgba(0, 0, 0, 0.04);
        padding: 2.5rem;
        width: 100%;
        max-width: 32rem; /* 512px */
      }

      /* Header Typography */
      .header {
        text-align: center;
        margin-bottom: 2rem;
      }
      .header h1 {
        font-size: 1.875rem; /* 30px */
        font-weight: 700;
        color: #1e293b;
      }
      .header p {
        margin-top: 0.5rem;
        color: #475569;
      }

      /* Form Grid Layout for Expiry/CVV */
      .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
      }

      @media (min-width: 640px) {
        .form-grid {
          grid-template-columns: repeat(3, 1fr);
        }
      }

      /* Form Groups and Labels */
      .form-group {
        margin-bottom: 1.25rem;
      }
      label {
        display: block;
        font-size: 0.875rem; /* 14px */
        font-weight: 500;
        margin-bottom: 0.25rem;
        color: #334155;
      }

      /* Input and Select Styling */
      input[type="text"],
      select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #cbd5e1;
        border-radius: 0.5rem;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition:
          border-color 0.2s ease,
          box-shadow 0.2s ease;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #fff;
      }

      select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
      }

      input::placeholder {
        color: #94a3b8;
      }
      input:focus,
      select:focus {
        outline: none;
        border-color: #0ea5e9;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.2);
      }

      /* Button Container */
      .button-container {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
      }
      @media (min-width: 640px) {
        .button-container {
          flex-direction: row;
        }
      }

      /* General Button Styling */
      .btn {
        width: 100%;
        font-weight: 600;
        padding: 0.875rem 1rem;
        border: none;
        border-radius: 0.5rem;
        box-shadow:
          0 4px 6px -1px rgba(0, 0, 0, 0.1),
          0 2px 4px -1px rgba(0, 0, 0, 0.06);
        cursor: pointer;
        transition:
          background-color 0.2s ease,
          transform 0.2s ease,
          box-shadow 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .btn:hover {
        box-shadow:
          0 10px 15px -3px rgba(0, 0, 0, 0.1),
          0 4px 6px -2px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
      }

      /* Primary Button (Pay Now) */
      #submitButton {
        background-color: #0284c7;
        color: #ffffff;
      }
      #submitButton:hover {
        background-color: #0369a1;
      }
      #submitButton:disabled {
        background-color: #64748b;
        cursor: not-allowed;
        transform: none;
      }
      #submitButton .spinner {
        animation: spin 1s linear infinite;
        margin-right: 0.75rem;
      }
      @keyframes spin {
        from {
          transform: rotate(0deg);
        }
        to {
          transform: rotate(360deg);
        }
      }

      /* Secondary Button (Disable Network) */
      #disableNetworkButton {
        background-color: #e2e8f0;
        color: #1e293b;
        order: 1; /* Default mobile order: Disable network first */
      }
      #disableNetworkButton:hover {
        background-color: #cbd5e1;
      }
      @media (min-width: 640px) {
        #disableNetworkButton {
          order: 0; /* Desktop order: Disable network first */
        }
      }

      /* Footer / Disclaimer */
      .footer {
        margin-top: 2rem;
        text-align: center;
      }
      .footer p {
        font-size: 0.75rem;
        color: #64748b;
      }
      .footer svg {
        display: inline-block;
        vertical-align: text-bottom;
        width: 1rem;
        height: 1rem;
        margin-right: 0.25rem;
      }

      /* Validation and Message Box Styles */
      .input-error {
        border-color: #fecaca;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
      }
      .error-message {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
      }

      #submissionMessage {
        padding: 1rem;
        margin-bottom: 1.5rem;
        border-radius: 0.5rem;
        text-align: center;
        transition:
          opacity 0.5s ease-in-out,
          transform 0.5s ease-in-out;
      }
      #submissionMessage.message-hidden {
        opacity: 0;
        transform: translateY(-20px);
        pointer-events: none;
        display: none;
      }
      #submissionMessage.message-visible {
        opacity: 1;
        transform: translateY(0);
        display: block;
      }
      #submissionMessage.message-success {
        background-color: #dcfce7;
        color: #166534;
      }
      #submissionMessage.message-error {
        background-color: #fee2e2;
        color: #991b1b;
      }
      #submissionMessage pre {
        white-space: pre-wrap;
        word-break: break-all;
        max-height: 200px;
        overflow-y: auto;
        background-color: rgba(0, 0, 0, 0.05);
        padding: 0.75rem;
        margin-top: 0.5rem;
        border-radius: 0.25rem;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <div class="header">
        <h1>Secure Checkout</h1>
        <p>Please enter your payment details.</p>
      </div>

      <div id="submissionMessage" class="message-hidden"></div>

      <form id="paymentForm" novalidate>
        <div class="form-group">
          <label for="cardholderName">Cardholder Name</label>
          <input
            type="text"
            id="cardholderName"
            name="cardholderName"
            placeholder="e.g. Jane Doe"
            required
          />
          <div id="cardholderNameError" class="error-message"></div>
        </div>

        <div class="form-group">
          <label for="cardNumber">Card Number</label>
          <input
            type="text"
            id="cardNumber"
            name="cardNumber"
            inputmode="numeric"
            pattern="[0-9\s]{13,23}"
            autocomplete="cc-number"
            maxlength="23"
            placeholder="xxxx xxxx xxxx xxxx"
            required
          />
          <div id="cardNumberError" class="error-message"></div>
        </div>

        <div class="form-grid">
          <div>
            <label for="expiryMonth">Expiry Month</label>
            <select id="expiryMonth" name="expiryMonth" required>
              <option value="" disabled selected>MM</option>
            </select>
            <div id="expiryMonthError" class="error-message"></div>
          </div>
          <div>
            <label for="expiryYear">Expiry Year</label>
            <select id="expiryYear" name="expiryYear" required>
              <option value="" disabled selected>YYYY</option>
            </select>
            <div id="expiryYearError" class="error-message"></div>
          </div>
          <div>
            <label for="cvv">CVV</label>
            <input
              type="text"
              id="cvv"
              name="cvv"
              inputmode="numeric"
              pattern="\d{3,4}"
              maxlength="4"
              placeholder="123"
              required
            />
            <div id="cvvError" class="error-message"></div>
          </div>
        </div>

        <!-- Button Container -->
        <div class="button-container">
          <button type="button" id="disableNetworkButton" class="btn">Disable Untrusted Network</button>
          <button type="submit" id="submitButton" class="btn">Pay Now</button>
        </div>
      </form>

      <div class="footer">
        <p>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path
              fill-rule="evenodd"
              d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
              clip-rule="evenodd"
            />
          </svg>
          This is a demo form. Do not enter real credit card details.
        </p>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        // Form related variables
        const paymentForm = document.getElementById("paymentForm");
        const cardholderNameInput = document.getElementById("cardholderName");
        const cardNumberInput = document.getElementById("cardNumber");
        const expiryMonthSelect = document.getElementById("expiryMonth");
        const expiryYearSelect = document.getElementById("expiryYear");
        const cvvInput = document.getElementById("cvv");
        const submitButton = document.getElementById("submitButton");
        const submissionMessage = document.getElementById("submissionMessage");
        const disableNetworkButton = document.getElementById("disableNetworkButton");

        disableNetworkButton.addEventListener("click", async () => {
          if (window.fence !== null) {
            await window.fence.disableUntrustedNetwork();
          } else {
            window.alert(
              "window.fence.disableUntrustedNetwork() is only supported in fenced frames.",
            );
          }
        });

        // --- Form Logic ---
        function escapeHTML(str) {
          const div = document.createElement("div");
          div.appendChild(document.createTextNode(str));
          return div.innerHTML;
        }

        function populateDateDropdowns() {
          expiryMonthSelect.innerHTML = '<option value="" disabled selected>MM</option>';
          expiryYearSelect.innerHTML = '<option value="" disabled selected>YYYY</option>';
          for (let i = 1; i <= 12; i++) {
            const month = i.toString().padStart(2, "0");
            const option = document.createElement("option");
            option.value = month;
            option.textContent = month;
            expiryMonthSelect.appendChild(option);
          }
          const currentYear = new Date().getFullYear();
          for (let i = 0; i <= 10; i++) {
            const year = currentYear + i;
            const option = document.createElement("option");
            option.value = year;
            option.textContent = year;
            expiryYearSelect.appendChild(option);
          }
        }
        populateDateDropdowns();

        cardNumberInput.addEventListener("input", function (e) {
          let value = e.target.value.replace(/\D/g, "");
          let formattedValue = "";
          for (let i = 0; i < value.length; i++) {
            if (i > 0 && i % 4 === 0) formattedValue += " ";
            formattedValue += value[i];
          }
          const oldSelectionStart = e.target.selectionStart;
          e.target.value = formattedValue.trim();
          if (oldSelectionStart === e.target.value.length - 1 && formattedValue.endsWith(" ")) {
            e.target.setSelectionRange(oldSelectionStart, oldSelectionStart);
          }
        });

        function validateField(inputElement, errorElement, validationFn, errorMessage) {
          clearError(inputElement, errorElement);
          if (!validationFn(inputElement.value)) {
            showError(inputElement, errorElement, errorMessage);
            return false;
          }
          return true;
        }
        function showError(inputElement, errorElement, message) {
          inputElement.classList.add("input-error");
          errorElement.textContent = message;
        }
        function clearError(inputElement, errorElement) {
          inputElement.classList.remove("input-error");
          errorElement.textContent = "";
        }
        function clearAllErrors() {
          clearError(cardholderNameInput, document.getElementById("cardholderNameError"));
          clearError(cardNumberInput, document.getElementById("cardNumberError"));
          clearError(expiryMonthSelect, document.getElementById("expiryMonthError"));
          clearError(expiryYearSelect, document.getElementById("expiryYearError"));
          clearError(cvvInput, document.getElementById("cvvError"));
        }

        const isNotEmpty = (value) => value.trim() !== "";
        const isValidCardNumber = (value) => /^\d{13,19}$/.test(value.replace(/\s/g, ""));
        const isValidCVV = (value) => /^\d{3,4}$/.test(value);

        function validateExpiryDate() {
          const month = expiryMonthSelect.value;
          const year = expiryYearSelect.value;
          const monthErrorElement = document.getElementById("expiryMonthError");
          const yearErrorElement = document.getElementById("expiryYearError");
          clearError(expiryMonthSelect, monthErrorElement);
          clearError(expiryYearSelect, yearErrorElement);
          let monthValid = true,
            yearValid = true;
          if (!month) {
            showError(expiryMonthSelect, monthErrorElement, "Month is required.");
            monthValid = false;
          }
          if (!year) {
            showError(expiryYearSelect, yearErrorElement, "Year is required.");
            yearValid = false;
          }
          if (!monthValid || !yearValid) return false;
          const currentYear = new Date().getFullYear();
          const currentMonth = new Date().getMonth() + 1;
          if (
            parseInt(year) < currentYear ||
            (parseInt(year) === currentYear && parseInt(month) < currentMonth)
          ) {
            showError(expiryMonthSelect, monthErrorElement, "Card is expired.");
            showError(expiryYearSelect, yearErrorElement, "");
            return false;
          }
          return true;
        }

        paymentForm.addEventListener("submit", async function (event) {
          event.preventDefault();
          clearAllErrors();
          submissionMessage.classList.remove("message-visible");
          submissionMessage.classList.add("message-hidden");

          let isValid = true;
          isValid =
            validateField(
              cardholderNameInput,
              document.getElementById("cardholderNameError"),
              isNotEmpty,
              "Cardholder name is required.",
            ) && isValid;
          isValid =
            validateField(
              cardNumberInput,
              document.getElementById("cardNumberError"),
              isValidCardNumber,
              "Enter a valid card number (13-19 digits).",
            ) && isValid;
          isValid =
            validateField(
              cvvInput,
              document.getElementById("cvvError"),
              isValidCVV,
              "Enter a valid CVV (3 or 4 digits).",
            ) && isValid;
          isValid = validateExpiryDate() && isValid;

          if (!isValid) {
            showSubmissionMessage("Please correct the errors in the form.", "error");
            return;
          }

          submitButton.disabled = true;
          submitButton.innerHTML = `
                    <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="#ffffff" stroke-width="4" style="opacity: 0.25;"></circle>
                        <path d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" fill="#ffffff" style="opacity: 0.75;"></path>
                    </svg>
                    Processing...
                `;

          const formData = {
            cardholderName: cardholderNameInput.value.trim(),
            cardNumber: cardNumberInput.value.replace(/\s/g, ""),
            expiryMonth: expiryMonthSelect.value,
            expiryYear: expiryYearSelect.value,
            cvv: cvvInput.value,
          };

          try {
            const response = await fetch("https://echo.free.beeceptor.com", {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify(formData),
            });

            if (response.ok) {
              const responseData = await response.json();
              const formattedResponse = JSON.stringify(responseData, null, 2);
              showSubmissionMessage(
                `Data sent successfully and echoed by server:<br><pre>${escapeHTML(formattedResponse)}</pre>`,
                "success",
              );
              paymentForm.reset();
              populateDateDropdowns();
            } else {
              let errorBodyContent = "Could not read error response body.";
              try {
                const errorData = await response.json();
                errorBodyContent = `<pre>${escapeHTML(JSON.stringify(errorData, null, 2))}</pre>`;
              } catch (e) {
                try {
                  const textError = await response.text();
                  errorBodyContent = `<pre>${escapeHTML(textError)}</pre>`;
                } catch (textParseError) {
                  /* Default message used */
                }
              }
              showSubmissionMessage(
                `Request failed with status: ${response.status} (${response.statusText}).<br>Server response: ${errorBodyContent}`,
                "error",
              );
            }
          } catch (error) {
            console.error("Error sending data:", error);
            showSubmissionMessage(
              `Error sending data: ${escapeHTML(error.message)}. Please check your network connection.`,
              "error",
            );
          } finally {
            submitButton.disabled = false;
            submitButton.textContent = "Pay Now";
          }
        });

        function showSubmissionMessage(messageHtml, type) {
          submissionMessage.innerHTML = messageHtml;
          submissionMessage.className = "message-visible";
          if (type === "success") {
            submissionMessage.classList.add("message-success");
          } else if (type === "error") {
            submissionMessage.classList.add("message-error");
          }
        }

        cardholderNameInput.addEventListener("blur", () =>
          validateField(
            cardholderNameInput,
            document.getElementById("cardholderNameError"),
            isNotEmpty,
            "Cardholder name is required.",
          ),
        );
        cardNumberInput.addEventListener("blur", () =>
          validateField(
            cardNumberInput,
            document.getElementById("cardNumberError"),
            isValidCardNumber,
            "Enter a valid card number (13-19 digits).",
          ),
        );
        cvvInput.addEventListener("blur", () =>
          validateField(
            cvvInput,
            document.getElementById("cvvError"),
            isValidCVV,
            "Enter a valid CVV (3 or 4 digits).",
          ),
        );
        expiryMonthSelect.addEventListener("change", validateExpiryDate);
        expiryYearSelect.addEventListener("change", validateExpiryDate);
      });
    </script>
  </body>
</html>
