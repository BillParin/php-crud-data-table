@extends('layouts.app')

@section('content')
<style>
.container2 {
    border-radius: 5px;
    background-color: white;
    padding: 10px;
}

.table_modal {
    padding: 5px;
    width: 100%;
    text-align: right;
}

.table_modal tr {
    padding: 5px;
    vertical-align: top;
}

.overlay {
    background: #f9f6f3;
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;
}

.title {
    font-size: 17px;
    width: 300px;
    height: 15px;
    text-align: left;
    float: left;
    margin-left: 20px
}

.imgloading {
    position: absolute;
    left: 50%;
    top: 80%;
    width: 5%;
}

input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<div class="container2">
    <div class="card mb-3">
        <div class="card-header">
            <span>
                <h3><b>Action <i class="fas fa-user-cog"></i></b></h3>
                <div class="title">
                    <div class="">
                        <b> <a href="/catalog"><span>Catalog</span></a> / <a href="/hardware"><span>Hardware</span></a>
                            / ID: {{$_REQUEST["id"]}}</b></b>
                    </div>
                </div>
            </span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <button class="btn btn-outline-primary" id="btnAddRole">
                    <i class="fa fa-plus"></i>
                    Add
                </button>

                <button class="btn btn-outline-dark" id="btnedit">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
                <button class="btn btn-outline-danger" id="btndel">
                    <i class="fa fa-eraser"></i>
                    Delete
                </button>

            </div>
            <form method="post">
                <table id="gridRole" width="100%" class="table table-hover"></table>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="modalAddRole">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Hardware Line <i class="fa fa-laptop" aria-hidden="true"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add">
                    <div class="form-group row">
                        <label for="txtAddHardware" class="col-sm-2 col-form-label">Action </label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="txtAddHardware" name="txtAddHardware"
                                    autocomplete="off" /> -->
                            <div id="dropdrawaction"></div>
                            <input type="hidden" class="form-control" id="txt_action" name="txt_action"
                                autocomplete="off" />
                            <input type="hidden" class="form-control" id="txt_addhardware" name="txt_addhardware"
                                value='{{$_REQUEST["id"]}}' autocomplete="off" />

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" value="add" name="add"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="modalEditRole">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Hardware Line <i class="fa fa-laptop" aria-hidden="true"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit">
                    <div class="form-group row">
                        <label for="txt_edithardware" class="col-sm-2 col-form-label">Action </label>
                        <div class="col-sm-10">
                            <!-- <input type="text" class="form-control" id="txtAddHardware" name="txtAddHardware"
                                    autocomplete="off" /> -->
                            <div id="eactiondropdraw"></div>
                            <input type="hidden" class="form-control" id="txt_editaction" name="txt_editaction"
                                autocomplete="off" />
                            <input type="hidden" class="form-control" id="txt_edithardware" name="txt_edithardware"
                                value='{{$_REQUEST["id"]}}' autocomplete="off" />
                            <input type="hidden" class="form-control" id="txt_id" name="txt_id"
                                value='{{$_REQUEST["id"]}}' autocomplete="off" />

                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" value="add" name="add"> Submit </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="overlay container-fluid">
    <!-- <img class="imgloading" src="/images/loading.gif" alt="Loading..." /> -->
</div>


<script>
$("#btnAddRole").on("click", function() {
    $("#form_add").trigger("reset");
    $("#modalAddRole").modal({
        backdrop: "static"
    });
    $("#modalAddRole").show();


});



$(document).ready(function() {


    var gridRole = "#gridRole";
    var _id = $('input[name=txt_id]').val();

    var dtRole = $(gridRole).DataTable({
        serverSide: false,
        processing: true,
        destroy: true,
        responsive: true,
        ajax: {
            url: "/hardwareheadline",
            type: "post",
            data: {
                "id": _id
            },
            // contentType: 'application/json; charset=utf-8',
            dataSrc: ''

        },

        columns: [{
                title: "ID",
                data: "CatalogLineId"
            },
            {
                title: "Hardware name",
                data: "CatalogDescription"
            },
            {
                title: "Action",
                data: "ActionName"
            },
            {
                title: "Active",
                data: "LineActive"
            }

        ]
    });
    DropdrawActionData();
    $('#dropdrawaction').show();
    $('#eactiondropdraw').show();

    var table = $('#gridRole').DataTable();

    $('#gridRole tbody').on('click', 'tr', function() {
        var data = table.row(this).data();
        if ($(this).hasClass('selected')) {

            // alert('You clicked on ' + data["CatalogId"] + "'s row");
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $('input[name=txt_editaction]').val(data["ActionId"]);
            $('input[name=txt_id]').val(data["CatalogLineId"]);

        }


    });


    $("#btnedit").on("click", function() {
        $count_row = table.rows('.selected').data().length;
        if ($count_row == 0) {
            Swal.fire('กรุณาเลือกรายการ')
        } else {
            $("#modalEditRole").modal({
                backdrop: "static"
            });
            $("#modalEditRole").show();
        }
    });

    $("#btndel").on("click", function() {
        $count_row = table.rows('.selected').data().length;
        $id = $('input[name=txt_id]').val();
        $CatalogId = $('input[name=txt_edithardware]').val();
        if ($count_row == 0) {
            Swal.fire('กรุณาเลือกรายการ')
        } else {
            Swal.fire({
                title: 'Are you sure?',
                text: "คุณแน่ใจที่จะลบหรือไม่",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                    $.ajax({
                        type: "POST",
                        url: "/delete_hardwareline",
                        data: {
                            "id": $id,
                            "CatalogId": $CatalogId
                        },
                        dataType: "JSON",

                        success: function(response) {
                            $('#gridRole').DataTable().ajax.reload();

                        }
                    });
                }

            })

        }
    });



});

$("#form_edit").submit(function(e) {
    e.preventDefault();
    var form_edit = $("#form_edit").serialize();
    $.ajax({
        type: "POST",
        url: "/update_hardwareline",
        data: form_edit,
        dataType: "JSON",

        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'successfully',
                showConfirmButton: false,
                timer: 1500
            })
            $('#gridRole').DataTable().ajax.reload();
            $('#modalEditRole').modal('hide');

        }
    });

});

$("#form_add").submit(function(e) {
    e.preventDefault();
    var form_add = $("#form_add").serialize();

    $('#modalAddRole').modal('hide');


    $.ajax({
        type: "GET",
        url: "/add_hardwareline",
        data: form_add,
        dataType: "JSON",

        success: function(response) {
            $('#gridRole').DataTable().ajax.reload();

        }
    });

    // $(".overlay").show();
});

function DropdrawActionData() {
    //Division Data 
    var divisionsource = {
        datatype: "json",
        datafields: [{
                name: 'ActionId'
            },
            {
                name: 'ActionName'
            },
            // { name: 'full'},

        ],
        url: '/getactive'
    };
    var DropdrawActionData = new $.jqx.dataAdapter(divisionsource);

    $('#dropdrawaction').jqxDropDownList({

        source: DropdrawActionData,
        searchMode: 'contains',
        width: '99%',
        height: '32',
        displayMember: 'ActionName',
        valueMember: 'ActionId',
    });

    $('#eactiondropdraw').jqxDropDownList({

        source: DropdrawActionData,
        searchMode: 'contains',
        width: '99%',
        height: '32',
        displayMember: 'ActionName',
        valueMember: 'ActionId',
    });
}
$('#dropdrawaction').on('select', function(event) {
    codedata = event.args.item.originalItem.ActionId;
    // alert(event.args.item.originalItem.divisionname);
    $("#txt_action").val(codedata);
    // alert(event.value);

});

$('#eactiondropdraw').on('select', function(event) {
    codedata = event.args.item.originalItem.ActionId;
    // alert(event.args.item.originalItem.divisionname);
    $("#txt_editaction").val(codedata);
    // alert(event.value);

});
</script>


@endsection