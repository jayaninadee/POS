loadAllCustomers();
loadAllItems();

function loadAllCustomers() {
    $("#selectCusID").empty();
    $.ajax({
        url: "api/services/CustomerService.php?action=getAll",
        method: "GET",
        async: true,
        dataType: "json"
    }).done(function (response) {
        for (var i in response) {
            $("#selectCusID").append("<option>" + response[i][0] + "</option>");
        }
    });
}

function loadAllItems() {
    $("#selectItemCode").empty();
    $.ajax({
        url: "api/services/ItemService.php?action=getAll",
        method: "GET",
        async: true,
        dataType: "json",
    }).done(function (response) {
        for (var i in response) {
            $("#selectItemCode").append("<option>" + response[i][0] + "</option>");
        }
    });

}


$("#selectCusID").on("click", function () {
    var customerID = $(this).val();
    $.ajax({
        url: "api/services/CustomerService.php?action=search",
        method: "GET",
        async: true,
        data: {"customerID": customerID},
        dataType: "json"
    }).done(function (response) {

        $("#txtCustomerID").val(response.id);
        $("#txtCustomerName").val(response.name);
        $("#txtCustomerAddress").val(response.address);
        $("#txtCustomerSalary").val(response.salary);

    });
});


$("#selectItemCode").on("click", function () {
    var code = $(this).val();
    $.ajax({
        url: "api/services/ItemService.php?action=search",
        method: "GET",
        async: true,
        data: {"code": code},
        dataType: "json"
    }).done(function (response) {

        $("#txtItemCode").val(response.code);
        $("#txtItemDescription").val(response.description);
        $("#txtQTYOnHand").val(response.qtyOnHand);
        $("#txtItemPrice").val(response.unitPrice);

    });

});


$("#btnAddToTable").click(function () {

    //gather wanted details for table
    var itemCode = $("#selectItemCode").val();
    var itemName = $("#txtItemDescription").val();
    var itemPrice = $("#txtItemPrice").val();
    var qty = $("#txtQty").val();


    var row = "<tr>" +
        "<td>" + itemCode + "</td>" +
        "<td>" + itemName + "</td>" +
        "<td>" + itemPrice + "</td>" +
        "<td>" + qty + "</td>" +
        "<td>" + (parseInt(itemPrice) * parseInt(qty)) + "</td>" +
        "</tr>";


    $("#orderTable").append(row);
});


$("#btnSubmitOrder").click(function () {
    var orderID = $('#txtOrderID').val();
    var orderDate = $("#txtDate").val();
    var customerID = $("#selectCusID").val();

    var row = $("table").children("tbody").children();//tr

    var orderDetails = [];
    for (var i = 0; i < row.length; i++) {
        var itemCode = $($(row[i]).children()[0]).text();
        var itemPrice = $($(row[i]).children()[2]).text();
        var itemQty = $($(row[i]).children()[3]).text();
        orderDetails.push({
            "oid": orderID,
            "icode": itemCode,
            "itemPrice": itemPrice,
            "itemQty": itemQty
        });
    }


    $.ajax({
        url: "api/services/PurchaseOrderService.php?action=save",
        method: "POST",
        async: true,
        contentType: "application/json",
        data: JSON.stringify({
            "orderID": orderID,
            "date": orderDate,
            "customerID": customerID,
            "orderDetails": orderDetails
        })
    }).done(function (response) {
        if (response=="1") {
            alert("Order Aded");
        }else{
            alert(response);
        }

    });

});



