getAllCustomers();

function getAllCustomers() {
    $('#tbl-body').empty();
    var form = $('#customerForm').serialize();
    $.ajax({
        url: "http://pos.lk/cusgetall",
        method: "GET",
        async: true,
        dataType: "json",
        data: form
    }).done(function (response) {
        for (var i of response) {
            $('#tbl-body').append("" +
                "<tr>" +
                "<td>" + i.id + "</td>" +
                "<td>" + i.name + "</td>" +
                "<td>" + i.address + "</td" +
                "><td>" + i.salary + "</td>" +
                "</tr>");
        }
    });
}


function addCustomer() {
    var form = $('#customerForm').serialize();
    $.ajax({
        url: "http://pos.lk/cusadd",
        method: "POST",
        async: true,
        data: form,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }).done(function (response) {
        console.log(response);
        if (response=="1") {
            alert("Customer Aded");
        }else{
            alert(response);
        }
        getAllCustomers();
    });

}


function deleteCustomer() {
    var val = $('#txtSCID').val().trim();
    $.ajax({
        url: "http://pos.lk/cusdelete",
        method: "GET",
        async: true,
        data: {
            'customerID':val
        }
    }).done(function (response) {
        alert(response);
        if (response=="1") {
            alert("Customer Aded");
        }else{
            alert(response);
        }
        getAllCustomers();
    });
}

function updateCustomer() {
    var form = $('#customerForm').serialize();
    $.ajax({
        url: "http://pos.lk/cusupdate",
        method: "GET",
        async: true,
        data: form
    }).done(function (response) {
        alert(response);
        if (response=="1") {
            alert("Customer Aded");
        }else{
            alert(response);
        }
        getAllCustomers();
    });
}

function searchCustomer(){
    $('#tbl-body').empty();
    var form = $('#txtSCID').val();
    $.ajax({
        url: "http://pos.lk/cussearch",
        method: "GET",
        async: true,
        data: {"customerID":form},
        dataType: "json"
    }).done(function (response) {
        alert(response);
        $('#tbl-body').append("" +
            "<tr>" +
            "<td>" + response.id + "</td>" +
            "<td>" + response.name + "</td>" +
            "<td>" + response.address + "</td" +
            "><td>" + response.salary + "</td>" +
            "</tr>");


        $("#txtCustomerID").val(response.id)
        $("#txtCustomerName").val(response.name);
        $("#txtCustomerAddress").val(response.address);
        $("#txtCustomerSalary").val(response.salary);

    });
}




// Events

$("#btnGetAllCustomer").on('click', function () {
    getAllCustomers();
});

$("#btnSaveCustomer").on('click', function () {
    addCustomer();
});

$("#btnDeleteCustomer").on('click', function () {
    deleteCustomer();
});

$("#btnUpdate").on('click', function () {
    updateCustomer();
});

$('#txtSCID').on('keypress',function (e) {
   if (e.code=="Enter"){
       searchCustomer();
   }
});

$("#btnSearch").on("click",function () {
    searchCustomer();
});
