@extends('layouts.master')
@section('content')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var source = {
                datatype: "json",
                datafields: [{
                        name: 'TABLE_NAME',
                        type: 'string'
                    },
                    {
                        name: 'ENGINE',
                        type: 'string'
                    },
                    {
                        name: 'TABLE_ROWS',
                        type: 'number'
                    },
                    {
                        name: 'column_count',
                        type: 'number'
                    },
                    {
                        name: 'CREATE_DATE_TIME',
                        type: 'string'
                    },
                    {
                        name: 'TABLE_COLLATION',
                        type: 'string'
                    },
                    {
                        name: 'TABLE_COMMENT',
                        type: 'string'
                    }
                ],
                id: 'TABLE_NAME', // Ensure a unique identifier field
                url: "{{ route('parameter.grid') }}",
                root: 'Rows',
                beforeprocessing: function(data) {
                    if (data != null && data.length > 0) {
                        source.totalrecords = data[0].TotalRows;
                    }
                }
            };
            var dataadapter = new $.jqx.dataAdapter(source, {
                loadError: function(xhr, status, error) {
                    alert(error);
                }
            });

            var cellsrenderer = function(row, column, value) {
                return '<div style="text-align: center; margin-top: 10px;">' + value + '</div>';
            }

            $("#jqxgrid").jqxGrid({
                width: '99.7%',
                height: "50%",
                source: dataadapter,
                filterable: true,
                sortable: true,
                pageable: true,
                rowsheight: 26,
                enablehover: true,
                virtualmode: true,
                columnsreorder: true,
                columnsresize: true,
                pagesize: 10,
                editable: false,
                selectionmode: 'singlerow',
                clipboard: false,
                enablebrowserselection: true,
                pagesizeoptions: ['10', '20', '30', '50'],
                rendergridrows: function(obj) {
                    return obj.data;
                },
                columns: [{
                        text: 'D',
                        datafield: 'delete',
                        align: 'center',
                        editable: false,
                        sortable: false,
                        width: 30,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = jQuery("#jqxgrid").jqxGrid('getrowdata', editrow);
                            return '<div style="text-align:center;  cursor:pointer" onclick="delete_table(\'' + dataRecord.TABLE_NAME + '\');" ><img width="20px" align="center" src="{{ url('/') }}/public/assets/action_icon/delete.png"></div>';
                        }
                    },
                    {
                        text: 'E',
                        datafield: 'Edit',
                        align: 'center',
                        editable: false,
                        sortable: false,
                        width: 30,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = jQuery("#jqxgrid").jqxGrid('getrowdata', editrow);
                            return '<div style="text-align:center;  cursor:pointer" onclick="delete_records(' +
                                dataRecord.id +
                                ');" ><img width="20px" align="center" src="{{ url('/') }}/public/assets/action_icon/edit.png"></div>';
                        }
                    },
                    {
                        text: 'Table Name',
                        datafield: 'TABLE_NAME',
                        editable: false,
                        width: 300,
                        cellsalign: 'left'
                    },
                    {
                        text: 'Engine',
                        datafield: 'ENGINE',
                        editable: false,
                        width: 300
                    },
                    {
                        text: 'Table Column',
                        datafield: 'column_count',
                        editable: false,
                        width: 100,
                        cellsalign: 'left'
                    },
                    {
                        text: 'Table Rows',
                        datafield: 'TABLE_ROWS',
                        editable: false,
                        width: 100,
                        cellsalign: 'left'
                    },
                    {
                        text: 'Create Time',
                        datafield: 'CREATE_DATE_TIME',
                        editable: false,
                        width: 100,
                        menu: false
                    },
                ]
            });

            $('#jqxTabs').jqxTabs({
                width: '100%',
            });

            $('#jqxTabs').jqxTabs('select', 1);
            $("#table_name").on('blur change click focus mouseenter mouseleave keydown keyup keypress', function() {
                var table_name = $("#table_name").val();
                // table_name = table_name.replace(/\s+/g, '_').replace(/[^a-zA-Z0-9_]/g, '');
                table_name = table_name.replace(/\s+/g, '_').replace(/[^a-zA-Z_]/g, '').toLowerCase();
                table_name = "ref_" + table_name;
                $("#dynamic_table_push").html(table_name);
                $("#table_name_hidden").val(table_name);
            });
            jQuery('#table_name_form').jqxValidator({
                hintType: 'label',
                rules: [{
                        input: '#table_name',
                        message: 'required!',
                        action: 'keyup,blur',
                        rule: 'required'
                    },
                    {
                        input: '#table_name',
                        message: 'Maximum length 80',
                        action: 'keyup, blur, change',
                        rule: function(input, commit) {
                            if (input.val() != '') {
                                if (input.val().length > 80) {
                                    $("#table_name").focus();
                                    return false;
                                }
                            }
                            return true;
                        }
                    },
                    {
                        input: '#table_name',
                        message: 'Duplicate',
                        action: 'keyup, blur, change',
                        rule: function(input, commit) {
                            if (input.val() == '') {
                                commit(true);
                                return true
                            } else {
                                var hiddenValue = $("#table_name_hidden").val();
                                var dup = 0;
                                jQuery.ajax({
                                    type: "GET",
                                    cache: false,
                                    async: false,
                                    url: "{{ route('parameter.duplicate_check') }}",
                                    data: {
                                        val: hiddenValue,
                                    },
                                    datatype: "json",
                                    error: function(request, error) {
                                        console.log("Server Error");
                                    },
                                    success: function(response) {
                                        var json = jQuery.parseJSON(response);
                                        if (json.Status == 'ok') {
                                            dup = 0;
                                        } else {
                                            dup = 1;
                                        }
                                    }
                                });
                                if (dup == 1) {
                                    commit(false);
                                    return false;
                                } else {
                                    commit(true);
                                    return true;
                                }
                            }
                        }
                    }
                ]
            });
            $("#saveBtn").bind('click', function() {
                var validationResult = function(isValid) {
                    if (isValid) {
                        Swal.fire({
                            title: "Do you want to save?",
                            showCancelButton: true,
                            confirmButtonText: "Save",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                call_ajax_submit();
                                Swal.fire("Saved!", "", "success");
                                $("#jqxgrid").jqxGrid('clearselection');
                                $("#jqxgrid").jqxGrid('updatebounddata');
                                $('#jqxTabs').jqxTabs('select', 1);
                            } else if (result.isDenied) {
                                Swal.fire("Changes are not saved", "", "info");
                            }
                        });
                    }
                }
                $('#table_name_form').jqxValidator('validate', validationResult);
            });
        });

        function call_ajax_submit() {
            var postdata = jQuery('#table_name_form').serialize() + "&_token=" + jQuery('meta[name="csrf-token"]').attr(
                'content');
            jQuery.ajax({
                type: "POST",
                cache: false,
                async: true,
                url: "{{ route('parameter.add') }}",
                data: postdata,
                datatype: "json",
                success: function(addresponse) {
                    var json = jQuery.parseJSON(addresponse);
                    jQuery('meta[name="csrf-token"]').attr('content', json.csrf_token);
                }
            });
        }

        function delete_table(name) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed) {
                delete_action(name);
                Swal.fire({
                    position: "top-end",
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
            });
        }
        function delete_action(name){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            jQuery.ajax({
                cache: false,
                async: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                method: "POST",
                datatype: "json",
                url: "{{ route('parameter.delete')}}",
                success: function(res) {
                    jQuery('meta[name="csrf-token"]').attr('content', res.csrf_token);
                }
            });











            
        }


        function tab_change() {
            $('#jqxTabs').jqxTabs('select', 0);
        }
    </script>
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Parameter List</h4>
                <h6>Manage your Parameter</h6>
            </div>
        </div>

        <div class="page-btn">
            <button type="button" class="btn btn-primary mb-1" onclick="tab_change();">Add New Parameter</button>
        </div>
    </div>


    <div id='jqxTabs'>
        <ul>
            <li style="margin-left: 30px;">Form</li>
            <li>Data Grid</li>
        </ul>
        <div style="overflow: hidden;">
            <div class="main-wrapper">
                <div class="content">
                    <form action="" id="table_name_form">
                        <div class="card">
                            <div class="card-body add-product pb-0">
                                <div class="accordion-card-one accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <div class="accordion-header" id="headingOne">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label">Table Name</label>
                                                        <input type="text" class="form-control" id="table_name"
                                                            name="table_name" maxlength="81">
                                                        <input type="hidden" name="table_name_hidden"
                                                            id="table_name_hidden">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-12">
                                                    <div class="mb-3 add-product">
                                                        <h1 class="form-h1">Table Name : </h1>
                                                        <i>
                                                            <h2 id="dynamic_table_push"></h2>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-5">
                            <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div class="">
                <h3>Search Area</h3>
            </div>
            <div id="jqxgrid"></div>
        </div>
    </div>
@endsection


{{-- SELECT * 
FROM information_schema.tables 
WHERE table_schema = 'inventory_management_software'; --}}
