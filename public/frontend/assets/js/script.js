$(function(){
    "use strict"
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>");
    });
});
setTimeout(function () {
    $(".alert").hide('slow');
}, 5000);

// Price Range
let minValue = document.getElementById("min-value");
let maxValue = document.getElementById("max-value");
function validateRange(minPrice, maxPrice) {
  if (minPrice > maxPrice) {
    // Swap to Values
    let tempValue = maxPrice;
    maxPrice = minPrice;
    minPrice = tempValue;
  }
  minValue.innerHTML = "₹" + minPrice;
  maxValue.innerHTML = "₹" + maxPrice;
}
const inputElements = document.querySelectorAll("input[type=range]");
inputElements.forEach((element) => {
  element.addEventListener("change", (e) => {
    let minPrice = parseInt(inputElements[0].value);
    let maxPrice = parseInt(inputElements[1].value);
    validateRange(minPrice, maxPrice);   
  });
});
//validateRange(inputElements[0].value, inputElements[1].value);
// End Price Range
