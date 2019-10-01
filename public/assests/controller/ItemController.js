getAllItems();

function getAllItems() {
    $('#tblItem').empty();
    var form = $('#ItemForm').serialize();
    $.ajax({
        url: "api/services/ItemService.php?action=getAll",
        method: "GET",
        async: true,
        // contentType:'application/json',
        dataType: "json",
        data: form
    }).done(function (response) {
        for (var i in response) {
            $('#tblItem').append("" +
                "<tr>" +
                "<td>" + response[i][0] + "</td>" +
                "<td>" + response[i][1] + "</td>" +
                "<td>" + response[i][2] + "</td" +
                "><td>" + response[i][3] + "</td>" +
                "</tr>");
        }
    });
}


function addItem() {
    var form = $('#ItemForm').serialize();
    $.ajax({
        url: "api/services/ItemService.php?action=save",
        method: "POST",
        async: true,
        data: form
    }).done(function (response) {
        if (response=="1") {
            alert("Item Aded");
        }else{
            alert(response);
        }
        getAllItems();
    });

}


function deleteItem() {
    var val = $('#txtSCode').val().trim();
    $.ajax({
        url: "api/services/ItemService.php?action=delete",
        method: "GET",
        async: true,
        data: {
            'code':val
        }
    }).done(function (response) {
        if (response=="1") {
            alert("Item Aded");
        }else{
            alert(response);
        }
        getAllItems();
    });
}

function updateItem() {
    var form = $('#ItemForm').serialize();
    $.ajax({
        url: "api/services/ItemService.php?action=update",
        method: "POST",
        async: true,
        data: form
    }).done(function (response) {
        if (response=="1") {
            alert("Item Aded");
        }else{
            alert(response);
        }
        getAllItems();
    });
}

function searchItem(){
    $('#tblItem').empty();
    var form = $('#txtSCode').val();
    $.ajax({
        url: "api/services/ItemService.php?action=search",
        method: "GET",
        async: true,
        data: {"code":form},
        dataType: "json"
    }).done(function (response) {
        $('#tblItem').append("" +
            "<tr>" +
            "<td>" + response.code + "</td>" +
            "<td>" + response.description + "</td>" +
            "<td>" + response.qtyOnHand + "</td" +
            "><td>" + response.unitPrice + "</td>" +
            "</tr>");

    });
}




// Events

$("#btnGetAllItem").on('click', function () {
    getAllItems();
});

$("#btnSaveItem").on('click', function () {
    addItem();
});

$("#btnDeleteItem").on('click', function () {
    deleteItem();
});

$("#btnUpdateItem").on('click', function () {
    updateItem();
});

$('#txtSCode').on('keypress',function (e) {
    if (e.code=="Enter"){
        searchItem();
    }
});

$("#btnSearch").on("click",function () {
    searchItem();
});