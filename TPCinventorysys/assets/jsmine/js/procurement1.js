let count = 0;

function generateCode() {
  document.getElementById("generateButton").addEventListener("click", function(){
    count++;
    var result = 'PO-' + count;
    var result_string = result.toString();
    document.getElementById("result_string").value = result;
  });
}

generateCode();



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
// var name = $("#product_type").val();
// var quantity = $("#quantity").val();
// var price = $("#unit_price").val();
// var subtotal = quantity * price;
//
// // Append the new row to the table
// $("#itemsTableBody").append(
// "<tr>" +
// "<td>" + name + "</td>" +
// "<td>" + quantity + "</td>" +
// "<td>" + price + "</td>" +
// "<td>" + subtotal + "</td>" +
// "<td><button type='button' class='btn btn-danger' onclick='removeItem(this)'>Remove</button></td>" +
// "</tr>"
// );
//
// // Clear the form fields
// $("#product_type").val("");
// $("#item_code").val("");
// $("#quantity").val("");
// $("#unit_price").val("");
// $("#total_price").val("");
    // var name = $("#product_type").val();
// var quantity = $("#quantity").val();
// var price = $("#unit_price").val();
// var subtotal = quantity * price;
var name = document.procurement.product_type.value;
var quantity = document.procurement.quantity.value;
var price = document.procurement.unit_price.value;
var subtotal = quantity * price;

var tr = document.createElement('tr');
var td1 = tr.appendChild(document.createElement('td'));
var td2 = tr.appendChild(document.createElement('td'));
var td3 = tr.appendChild(document.createElement('td'));
var td4 = tr.appendChild(document.createElement('td'));
var td5 = tr.appendChild(document.createElement('td'));

td1.innerHTML='<input type="hidden" name="name[]" value="'+name+'">'+name;
td2.innerHTML='<input type="hidden" name="quantity[]" value="'+quantity+'">'+quantity;
td3.innerHTML='<input type="hidden" name="price[]" value="'+price+'">'+price;
td4.innerHTML='<input type="hidden" name="subtotal[]" value="'+subtotal+'">'+subtotal;
td5.innerHTML='<button type="button" class="btn btn-danger" onclick="removeItem(this)">Remove</button></td>';
document.getElementById("procurementTable").appendChild(tr);


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
  