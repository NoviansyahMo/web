const productCode = $("#product-code");
const productName = $("#product-name");
const productBrand = $("#product-brand");
const productType = $("#product-type");
const productPrice = $("#product-price");
const productStock = $("#product-stock");

const formContainerProduct = $("#insert-product");
const formActionProduct = $("#action_product");
const searchProduct = $("#search-product");

export function loadProductData() {
  $.ajax({
    url: "./database/product/db_fetch.php",
    method: "POST",
    success: function (data) {
      $("#product-data").html(data);
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
  productName.css("border-color", colorGrey);
  productBrand.css("border-color", colorGrey);
  productType.css("border-color", colorGrey);
  productPrice.css("border-color", colorGrey);
  productStock.css("border-color", colorGrey);
  formActionProduct.val("insert");
  formContainerProduct[0].reset();
};

formContainerProduct.on("submit", function (event) {
  event.preventDefault();

  formValidation(productName);
  formValidation(productBrand);
  formValidation(productType);
  formValidation(productPrice);
  formValidation(productStock);

  const name = productName.val().trim();
  const brand = productBrand.val().trim();
  const type = productType.val().trim();
  const price = productPrice.val().trim();
  const stock = productStock.val().trim();

  if (
    name === "" ||
    brand === "" ||
    type === "" ||
    price === "" ||
    stock === ""
  ) {
    return false;
  } else {
    const formData = $(this).serialize();
    $.ajax({
      url: "./database/product/db_action.php",
      method: "POST",
      data: formData,
      success: function (data) {
        loadProductData();
        formReset();
      },
    });
  }
});

searchProduct.on("keyup", function () {
  let value = searchProduct.val().toLowerCase();
  $("#product-table tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

$(document).on("click", ".btn-edit-product", function () {
  console.log("Edit Clicked");
  let id = $(this).attr("id");
  let action = "fetch_single";
  $.ajax({
    url: "./database/product/db_action.php",
    method: "POST",
    data: {
      kode_barang: id,
      action_product: action,
    },
    dataType: "json",
    success: function (data) {
      productName.val(data.nama_barang);
      productBrand.val(data.merek_barang);
      productType.val(data.tipe_barang);
      productPrice.val(data.harga_barang);
      productStock.val(data.stok_barang);
      formActionProduct.val("update");
      productCode.val(id);
    },
  });
});

$(document).on("click", ".btn-delete-product", function () {
  console.log("Delete Clicked");
  let id = $(this).attr("id");
  let action = "delete";
  $.ajax({
    url: "./database/product/db_action.php",
    method: "POST",
    data: {
      kode_barang: id,
      action_product: action,
    },
    success: function (data) {
      loadProductData();
    },
  });
});
