const customerCode = $("#customer-code");
const customerName = $("#customer-name");
const customerGender = $("#customer-gender");
const customerAddress = $("#customer-address");
const customerCity = $("#customer-city");

const formContainerCustomer = $("#insert-customer");
const formActionCustomer = $("#action_customer");
const searchCustomer = $("#search-customer");

export function loadCustomerData() {
  $.ajax({
    url: "./database/customer/db_fetch.php",
    method: "POST",
    success: function (data) {
      $("#customer-data").html(data);
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
  customerName.css("border-color", colorGrey);
  customerGender.css("border-color", colorGrey);
  customerAddress.css("border-color", colorGrey);
  customerCity.css("border-color", colorGrey);
  formActionCustomer.val("insert");
  formContainerCustomer[0].reset();
};

formContainerCustomer.on("submit", function (event) {
  event.preventDefault();

  formValidation(customerName);
  formValidation(customerGender);
  formValidation(customerAddress);
  formValidation(customerCity);

  const name = customerName.val().trim();
  const gender = customerGender.val().trim();
  const address = customerAddress.val().trim();
  const city = customerCity.val().trim();

  if (name === "" || gender === "" || address === "" || city === "") {
    return false;
  } else {
    const formData = $(this).serialize();
    $.ajax({
      url: "./database/customer/db_action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        loadCustomerData();
        formReset();
      },
    });
  }
});

searchCustomer.on("keyup", function () {
  let value = searchCustomer.val().toLowerCase();
  $("#customer-table tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

$(document).on("click", ".btn-edit-customer", function () {
  console.log("Edit Clicked");
  let id = $(this).attr("id");
  let action = "fetch_single";
  $.ajax({
    url: "./database/customer/db_action.php",
    method: "POST",
    data: {
      kode_pembeli: id,
      action_customer: action,
    },
    dataType: "json",
    success: function (data) {
      customerName.val(data.nama_pembeli);
      customerGender.val(data.kelamin_pembeli);
      customerAddress.val(data.alamat_pembeli);
      customerCity.val(data.kota_pembeli);
      formActionCustomer.val("update");
      customerCode.val(id);
    },
  });
});

$(document).on("click", ".btn-delete-customer", function () {
  console.log("Delete Clicked");
  let id = $(this).attr("id");
  let action = "delete";
  $.ajax({
    url: "./database/customer/db_action.php",
    method: "POST",
    data: {
      kode_pembeli: id,
      action_customer: action,
    },
    success: function (data) {
      loadCustomerData();
      console.log(data);
    },
  });
});
