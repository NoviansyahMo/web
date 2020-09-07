const transactionDate = $("#transaction-date");
const transactionProduct = $("#transaction-product-id");
const transactionCustomer = $("#transaction-customer-id");

const formContainerTransaction = $("#insert-transaction");

export function loadTransactionData() {
  $.ajax({
    url: "./database/transaction/db_fetch.php",
    method: "POST",
    success: function (data) {
      $("#transaction-data").html(data);
      console.log(data);
    },
  });
}

const formValidation = (inputField) => {
  const colorRed = "#d50000";
  const colorGreen = "#43A047";
  if (inputField.val() === "") {
    inputField.css("border-color", colorRed);
  } else {
    inputField.css("border-color", colorGreen);
  }
};

const formReset = () => {
  const colorGrey = "#eeeeee";
  transactionDate.css("border-color", colorGrey);
  transactionProduct.css("border-color", colorGrey);
  transactionCustomer.css("border-color", colorGrey);
  formContainerTransaction[0].reset();
};

formContainerTransaction.on("submit", function (event) {
  event.preventDefault();

  formValidation(transactionDate);
  formValidation(transactionProduct);
  formValidation(transactionCustomer);

  const date = transactionDate.val().trim();
  const product = transactionProduct.val().trim();
  const customer = transactionCustomer.val().trim();

  if (date === "" || product === "" || customer === "") {
    return false;
  } else {
    const formData = $(this).serialize();
    $.ajax({
      url: "./database/transaction/db_action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        loadTransactionData();
        console.log(data);
        formReset();
      },
    });
  }
});
