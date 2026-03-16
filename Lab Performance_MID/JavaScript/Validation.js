var Quantity = document.getElementById("QuantityPerDay");
var TotalPrice = document.getElementById("TotalPriceFor30Days");
var UnitPrice = document.getElementById("UnitPrice");

var flag = true;

function validateForm() 
{
    if (Quantity.value < 0)
    {
        alert("Quantity must be a positive number.");
        Quantity.value = 0;
    }

    var calculatedTotalPrice = calculateTotalPrice();
    
    return true;
}

function ValidateUnitPrice()
{
    if (UnitPrice.value <= 0)
    {
        UnitPrice.value = 1;
    }
    
    return true;
}

function calculateTotalPrice()
{
    TotalPrice.value = Quantity.value * UnitPrice.value * 30;

    if(flag && TotalPrice.value >= 1000)
    {
        alert("Total price exceeds $1000. You are eligible for a gift coupon!");
        flag = false;
    }

    if(!flag && TotalPrice.value < 1000)
    {
        flag = true;
    }

}


Quantity.addEventListener("input", validateForm);
UnitPrice.addEventListener("input", ValidateUnitPrice);