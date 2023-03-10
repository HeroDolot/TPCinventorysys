function
generateCode() {
document.getElementById("generateButton").addEventListener("click", function(){
   var length = document.getElementById("lengthInput").value;
   if(length == "") length = 10;
   var characters = 'ABCDEFGIJKLNMOPQRSTUVWXYZ123456789';
   var result = '';
   for (var i = length; i > 0; --i) {
       result += characters[Math.floor(Math.random() * characters.length)];
   }
   document.getElementById("result").value = result;
       });
   }

   generateCode();

document.getElementById('generateButton').addEventListener('click', generateCode);

document.getElementById('quantity').addEventListener('input', function() {
   const quantity = document.getElementById('quantity').value;
   const unitPrice = document.getElementById('unit_price').value;

   if (quantity && unitPrice) {
       document.getElementById('total_price').value = (quantity * unitPrice).toFixed(2);
   } else {
       document.getElementById('total_price').value = '';
   }
});

document.getElementById('unit_price').addEventListener('input', function() {
   const quantity = document.getElementById('quantity').value;
   const unitPrice = document.getElementById('unit_price').value;

   if (quantity && unitPrice) {
       document.getElementById('total_price').value = (quantity * unitPrice).toFixed(2);
   } else {
       document.getElementById('total_price').value = '';
   }
});

document.getElementById('supplier_name').addEventListener('change', function() {
   const supplierName = document.getElementById('supplier_name').value;

   fetch(`../../ajax/get_item.php?supplier_name=${supplierName}`)
       .then(response => response.text())
       .then(data => {
        //    document.getElementById('number_input').value = data;
       })
       .catch(error => {
           console.error('Error:', error);
       });
});

$(document).ready(function() {
    // Get the initial contact number for the selected supplier
    var supplierName = 'CISCO';

    $.ajax({
        url: '../ajax/get_contacts.php',
        type: 'GET',
        data: { supplier_name: supplierName },
        success: function(result) {
            result = JSON.parse(result);
            const selectElement = document.getElementById('supplier_contact');
            const optionElement = document.createElement('option');
            optionElement.value = result[0]['supplier_contact'];
            optionElement.text = result[0]['supplier_contact'];
            selectElement.appendChild(optionElement)
        },    
    });         

    // Update the contact number whenever the supplier changes
    
    $('#supplier_name').change(function() {
    var supplierName = $('#supplier_name').val();
        $.ajax({
            url: '../ajax/get_contacts.php',
                type: 'GET',
                data: { supplier_name: supplierName },
                success: function(result) {
                    result = JSON.parse(result);
            const selectElement = document.getElementById('supplier_contact');
            selectElement.innerHTML = ''
            const optionElement = document.createElement('option');
            optionElement.value = result[0]['supplier_contact'];
            optionElement.text = result[0]['supplier_contact'];
            selectElement.appendChild(optionElement)
            },
        })
    })
})

function addItem() {
// Get the values from the form fields
var code = $("#item_code").val();
var name = $("#product_type").val();
var quantity = $("#quantity").val();
var price = $("#unit_price").val();
var subtotal = quantity * price;

// Append the new row to the table
$("#itemsTableBody").append(
"<tr>" +
"<td>" + code + "</td>" +
"<td>" + name + "</td>" +
"<td>" + quantity + "</td>" +
"<td>" + price + "</td>" +
"<td>" + subtotal + "</td>" +
"<td><button type='button' class='btn btn-danger' onclick='removeItem(this)'>Remove</button></td>" +
"</tr>"
);

// Clear the form fields
$("#product_type").val("");
$("#item_code").val("");
$("#quantity").val("");
$("#unit_price").val("");
$("#total_price").val("");
}

// Update the total amount
function updateTotalAmount() {
    var total = 0;
    $('table tr').each(function() {
      var value = parseFloat($(this).find('td:eq(4)').text());
      if (!isNaN(value)) {
        value += total;
      }
    });
    $('#totalAmount').text(total.toFixed(2));
}


function removeItem(button) {
// Remove the row from the table
$(button).closest("tr").remove();

// Update the total amount
var totalAmount = parseFloat($("#totalAmount").text());
var subtotal = parseFloat($(button).closest("tr").find("td:eq(4)").text());
totalAmount -= subtotal;
$("#totalAmount").text(totalAmount.toFixed(2));
}

function clearTable() {
    $('#procurementTable tbody').empty();
  }
  
  $(document).ready(function() {
    $('#clearTable').click(function() {
      clearTable();
    });
  });
  