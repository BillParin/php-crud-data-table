
@extends('layouts.app')

@section('content')


<div class="container">

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1" >Sales order</span>
        <input type="text" class="form-control" placeholder="Sales order" aria-label="code" aria-describedby="basic-addon1" id="inp_so" value="SO17-000008">

    </div>

    <div id="grid_so"></div>
    <div>
        <button class="btn btn-primary" id="btn_add">add</button>
    </div>
   
    
</div>

<script type="text/javascript">

    $(document).ready(function () {

        get_soline();
        var sonumber = $('#inp_so').val();
        $('#btn_add').click(function (e) { 
            var _item = [];
            e.preventDefault();
            var rows = $('#grid_so').jqxGrid('getRows');
            for(var i = 0 ; i < rows.length ; i++)
            {
                _item.push(rows[i]);
            }
            console.log(_item);
            $.ajax({
                type: "post",
                url: "/add",
                data: {
                    "row" : _item,
                    "sonumber" : sonumber
                },
                dataType: "json",
                success: function (response) {
                    if(response.result)
                    {
                        swal.fire('Complete');
                    }
                    
                }
            });
        });
        
    });

    function get_soline()
    {
        var soid = $('#inp_so').val();
        var source =
        {
            datatype: "json",
            datafields: [
                { name: 'SALESID', type: 'string' },
                { name: 'ITEMID', type: 'string' },
                { name: 'NAME', type: 'string' },
                { name: 'SALESQTY', type: 'float' },
                { name: 'Cancel', type: 'int' }
            ],
            url: '/get_soline/' + soid 
        };

        var dataAdapter = new $.jqx.dataAdapter(source);
        $("#grid_so").jqxGrid(
        {
                width: '100%',
                source: dataAdapter,                
                pageable: true,
                autoheight: true,
                altrows: true,
                enabletooltips: true,
                editable: true,
				filterable: true,
                selectionmode: 'multiplecellsadvanced',
                columns: [
                  { text: 'ITEMID',  datafield: 'ITEMID', width: 250 },
                  { text: 'NAME',  datafield: 'NAME', width: 250 },
                  { text: 'SALESQTY',  datafield: 'SALESQTY', width: 250 },
                  { text: 'Cancel',  datafield: 'Cancel', columntype: 'checkbox' , width: 100 }

                ]
        });

    }


     

</script>

@endsection