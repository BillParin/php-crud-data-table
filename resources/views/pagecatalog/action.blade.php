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

.imgloading {
    position: absolute;
    left: 50%;
    top: 80%;
    width: 5%;
}

.title {
    font-size: 17px;
    width: 200px;
    height: 15px;
    text-align: left;
    float: left;
    margin-left: 20px
}

input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

{{-- <div class="container2">
    <div class="title">
        <div class="card-header">
            <b> <a href="/catalog"><span>Catalog</span></a> / hardware <i class="fa fa-laptop" aria-hidden="true">
                </i></b>
        </div>
    </div> --}}

    <div class="container2">
        <div class="card mb-3">
            <div class="card-header">
                <span>
                    <h1><b>Action <i class="fas fa-running" aria-hidden="true"></i></b></h1>
                </span>
                <div class="title">
                    <div class="">
                        <b> <a href="/catalog"><span>Catalog</span></a> / action </b>
                    </div>
                </div>
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
                    <h5 class="modal-title">Add Action <i class="fa fa-laptop" aria-hidden="true"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_add">
                        <div class="form-group row">
                            <label for="txtAddAction" class="col-sm-2 col-form-label">Action </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txtAddAction" name="txtAddAction"
                                    autocomplete="off" />
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
                    <h5 class="modal-title">Edit Action <i class="fa fa-laptop" aria-hidden="true"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit">
                        <div class="form-group row">
                            <label for="txt_editaction" class="col-sm-2 col-form-label">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txt_editaction" name="txt_editaction"
                                    autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txt_active" class="col-sm-2 col-form-label">Status :</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="txt_active" name="txt_active" autocomplete="off" />
                                    <option value="1">ใช้งาน</option>
                                    <option value="0">ไม่ใช้งาน</option>
                                </select>
                                <input type="hidden" name="txt_id" id="txt_id" />
                            </div>
                        </div>
                            <input type="hidden" name="
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success" value="edit" name="edit"> Submit </button>
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

        var dtRole = $(gridRole).DataTable({
            serverSide: false,
            processing: true,
            destroy: true,
            responsive: true,
            ajax: {
                url: "/actionhead",
                type: "POST",
                // contentType: 'application/json; charset=utf-8',
                dataSrc: ''

            },
            columns: [{
                    title: "ID",
                    data: "ActionId",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    title: "Action name",
                    data: "ActionName"
                },
                {
                    title: "Active",
                    data: "ActionActive",

                "render": function (data, type, row) {
                    if(data == 1) {
                        return "✓";
                    }else if (data == 0){
                        return "X";
                    }else{
                        return "null";
                    }
                }
            }
            ]
        });

        var table = $('#gridRole').DataTable();

        $('#gridRole tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
            if ($(this).hasClass('selected')) {

                // alert('You clicked on ' + data["CatalogId"] + "'s row");
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('input[name=txt_editaction]').val(data["ActionName"]);
                $('input[name=txt_id]').val(data["ActionId"]);
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
            if ($count_row == 0) {
                Swal.fire('กรุณาเลือกรายการ')
            } else {
                $txt_id = $('input[name=txt_id]').val();
                // alert($txt_id);
                $.ajax({
                type: "POST",
                url: "/delete_action",
                data: {"id": $txt_id},
                dataType: "JSON",

                success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'delete successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#gridRole').DataTable().ajax.reload();
                // $("#txt_active option:first").attr('selected','selected');
                // $('#modalEditRole').modal('hide');
                    }
                });
            }
        });
    });

    $("#form_edit").submit(function(e) {
        e.preventDefault();
        var form_edit = $("#form_edit").serialize();
        $.ajax({
            type: "POST",
            url: "/update_action",
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
                $("#txt_active option:first").attr('selected','selected');
                $('#modalEditRole').modal('hide');

            }
        });
    });

    $("#form_add").submit(function(e) {
        e.preventDefault();
        var form_add = $("#form_add").serialize();
        if ($("#txtAddAction").val() == "") {
            alert("Please input Action !!");
            return false;
        }

        // if ($("#txtAddHardware").val() == "") {
        //     alert("Please input Hardware  !!");
        //     return false;
        // }

        $('#modalAddRole').modal('hide');
        //     $.ajax({
        //     type: 'post',
        //     url: '/add_hardware',
        //     data: $('form_add').serialize(),
        //     success: function (respone) {
        //     //   alert(respone);
        //     conson.log(respone);
        //     }
        //   });

        $.ajax({
            type: "GET",
            url: "/add_action",
            data: form_add,
            dataType: "JSON",

            success: function(response) {
                $('#gridRole').DataTable().ajax.reload();
                // alert ('1111');

            }
        });
        // $("#txt_active option:first").attr('selected','selected');
        // $("#txt_active").val($("#txt_active option:first").val());
        // $(".overlay").show();
    });
    </script>


    @endsection
