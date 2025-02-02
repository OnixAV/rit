const moneyFields = document.getElementById("moneyFields");
const nonMoneyFields = document.getElementById("nonMoneyFields");

const marketValue = document.getElementById("marketValue");
const quantity = document.getElementById("quantity");
const estimatedValue = document.getElementById("estimatedValue");
const measureUnit = document.getElementById("measureUnit");

const bankInput = document.getElementById("bank_input");
const accountInput = document.getElementById("account_input");

document
  .querySelector('select[name="type"]')
  .addEventListener("change", function () {
    if (this.value === "деньги") {
      moneyFields.style.display = "block";
      nonMoneyFields.style.display = "none";
    } else {
      moneyFields.style.display = "none";
      nonMoneyFields.style.display = "block";
    }
  });

document
  .querySelector('select[name="view"]')
  .addEventListener("change", function () {
    if (this.value === "строение") {
      marketValue.style.display = "none";
      quantity.style.display = "none";
      estimatedValue.style.display = "block";
      measureUnit.style.display = "none";
    } else {
      estimatedValue.style.display = "none";
      marketValue.style.display = "block";
      quantity.style.display = "block";
    }
  });

document
  .getElementById("cash_register")
  .addEventListener("change", function () {
    if (this.checked === true) {
      bankInput.style.display = "none";
      accountInput.style.display = "none";
    } else {
      bankInput.style.display = "block";
      accountInput.style.display = "block";
    }
  });
