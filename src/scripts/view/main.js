import { loadProductData } from "../data/product.js";
import { loadCustomerData } from "../data/customer.js";
import { loadTransactionData } from "../data/transaction.js";

const main = () => {
  loadProductData();
  loadCustomerData();
  loadTransactionData();
};

export default main;
