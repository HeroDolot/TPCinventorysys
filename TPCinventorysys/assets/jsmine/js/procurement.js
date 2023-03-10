var i = 0;

// Add event listener to "Add Row" button
document.getElementById("addRow").addEventListener("click", function() {
    i++;
    var table = document.getElementById("procurementTable");
    var row = table.insertRow();
    
    // Insert cells into new row
    var cell1 = row.insertCell();
    var cell2 = row.insertCell();
    var cell3 = row.insertCell();
    var cell4 = row.insertCell();
    var cell5 = row.insertCell();
    var cell6 = row.insertCell();

    // Fill cells with HTML content
    cell1.innerHTML = "<form id='form" + i + "' action='../../controller/authentication/procurement-con.php' method='POST'>" +
                        "<input type='text' name='product_code[]'>";
    cell2.innerHTML = "<label for='item'></label>" +
                      "<input type='text' name='item1[]'>";
    cell3.innerHTML = "<input oninput='compute()' type='number' class='quantity' value='0' id='quantity" + i + "' name='quantity[]'>";
    cell4.innerHTML = "<input oninput='compute()' type ='text' class='unit-price' value='0' id='unit-price" + i + "' name='unit_price[]'>";
    cell5.innerHTML = "<input type='text' class='total-price' value='0' id='total-price" + i + "' readonly name='total_price[]'>";
    cell6.innerHTML = "<button type='button' class='btn btn-info' onclick='saveForm(" + i + ")'>Save</button>";
});

// Function to calculate total price for each row
function compute() {
    var quantityInputs = document.getElementsByClassName("quantity");
    var unitPriceInputs = document.getElementsByClassName("unit_price");
    var totalPriceInputs = document.getElementsByClassName("total_price");

    for (var i = 0; i < quantityInputs.length; i++) {
        var quantity = parseInt(quantityInputs[i].value) || 0;
        var unitPrice = parseFloat(unitPriceInputs[i].value) || 0;
        var totalPrice = quantity * unitPrice;
        totalPriceInputs[i].value = totalPrice;
    }
}

function saveForm(index) {
    var form = document.getElementById("form" + index);
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../controller/authentication/procurement-con.php');
    xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
            console.log(xhr.responseText);
            alert("Form saved successfully!");
        } else {
            alert("Error saving form!");
        }
    };
    xhr.send(formData);
}
