@extends('layouts.master')
@section('content')
    <script>
        $(document).ready(function() {


            var source = {
                datatype: "json",
                datafields: [{
                        name: 'id',
                        type: 'int'
                    },
                    {
                        name: 'sort_name',
                        type: 'string'
                    },
                    {
                        name: 'menu_name',
                        type: 'string'
                    },
                    {
                        name: 'has_child',
                        type: 'string'
                    },
                    {
                        name: 'url_prefix',
                        type: 'string'
                    },
                    {
                        name: 'sort_order',
                        type: 'int'
                    },
                    {
                        name: 'entry_by_name',
                        type: 'string'
                    },
                    {
                        name: 'entry_by_id',
                        type: 'string'
                    },
                    {
                        name: 'entry_datetime',
                        type: 'string'
                    },
                    {
                        name: 'last_modify_by',
                        type: 'string'
                    },
                    {
                        name: 'last_modify_by_id',
                        type: 'string'
                    },
                    {
                        name: 'last_modify_datetime',
                        type: 'string'
                    },
                    {
                        name: 'last_modify_name',
                        type: 'string'
                    },
                    {
                        name: 'last_modify_id',
                        type: 'string'
                    },
                    {
                        name: 'data_status',
                        type: 'string'
                    }
                ],
                addrow: function(rowid, rowdata, position, commit) {
                    commit(true);
                },
                deleterow: function(rowid, commit) {
                    commit(true);
                },
                updaterow: function(rowid, newdata, commit) {
                    commit(true);
                },
                url: "",
                cache: false,
                filter: function() {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function() {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },
                root: 'Rows',
                beforeprocessing: function(data) {
                    if (data != null) {
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
            var columnsrenderer = function(value) {
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
                // enablebrowserselection: true,
                pagesizeoptions: ['10', '20', '30', '50'],
                rendergridrows: function(obj) {
                    return obj.data;
                },
                columns: [

                    {
                        text: 'P',
                        menu: false,
                        renderer: columnsrenderer,
                        sortable: false,
                        width: 29,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                            return '<div style="text-align:center;cursor:pointer" onClick="preview_details(' +
                                dataRecord.id +
                                ')"><img align="center" src="<?= url('/') ?>/public/assets/images/view_detail.png" /></div>';
                        }
                    },

                    {
                        text: 'D',
                        menu: false,
                        renderer: columnsrenderer,
                        datafield: 'delete',
                        align: 'center',
                        editable: false,
                        sortable: false,
                        width: 30,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                            return '<div style="text-align:center;  cursor:pointer" onclick="delete_records(' +
                                dataRecord.id +
                                ');" ><img align="center" src="{{ url('/') }}/public/assets/images/del.png"></div>';
                        }
                    },
                    {
                        text: 'E',
                        menu: false,
                        renderer: columnsrenderer,
                        datafield: 'Edit',
                        align: 'center',
                        editable: false,
                        sortable: false,
                        width: '30',
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                            return '<div style="text-align:center;  cursor:pointer" onclick="edit(' +
                                dataRecord.id + ',' + editrow + ',' + dataRecord.data_status +
                                ')" ><img  class="s_icon" align="center" src="{{ url('/') }}/public/assets/images/edit.svg"></div>';
                        }
                    },




                    {
                        text: 'Product',
                        datafield: 'menu_name',
                        editable: false,
                        renderer: columnsrenderer,
                        width: '250',
                        cellsalign: 'left'
                    },
                    {
                        text: 'SKU',
                        datafield: 'url_prefix',
                        renderer: columnsrenderer,
                        editable: false,
                        width: '150'
                    },
                    {
                        text: 'Category',
                        datafield: 'sort_order',
                        renderer: columnsrenderer,
                        editable: false,
                        width: '150',
                        cellsalign: 'left'
                    },
                    {
                        text: 'Price',
                        datafield: 'entry_by_name',
                        renderer: columnsrenderer,
                        editable: false,
                        width: '150',
                        menu: false,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                        }
                    },

                    {
                        text: 'Unit',
                        datafield: 'Unit',
                        renderer: columnsrenderer,
                        editable: false,
                        width: '150',
                        menu: false,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                        }
                    },

                    {
                        text: 'Quantity',
                        datafield: 'quantity',
                        renderer: columnsrenderer,
                        editable: false,
                        width: '150',
                        menu: false,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                        }
                    },

                    {
                        text: 'Created by',
                        datafield: 'created_by',
                        renderer: columnsrenderer,
                        menu: false,
                        editable: false,
                        width: '140',
                        menu: false
                    },

                    {
                        text: 'Created Date',
                        datafield: 'created_dt',
                        renderer: columnsrenderer,
                        menu: false,
                        editable: false,
                        width: '140',
                        menu: false
                    },
                    {
                        text: 'Last Modify By',
                        datafield: 'last_modify_name',
                        renderer: columnsrenderer,
                        menu: false,
                        editable: true,
                        width: '150',
                        menu: false,
                        cellsrenderer: function(row) {
                            editrow = row;
                            var dataRecord = $("#jqxgrid").jqxGrid('getrowdata', editrow);
                            if (dataRecord.last_modify_name == null) {
                                return '<div class="tal"></div>';
                            } else {
                                return '<div class="tal" style="padding-left:5%">' + dataRecord
                                    .last_modify_name + ' (' + dataRecord.last_modify_id +
                                    ')</div>';
                            }

                        }
                    },
                    {
                        text: 'Last Modify Date  ',
                        datafield: 'last_modify_datetime',
                        renderer: columnsrenderer,
                        menu: false,
                        editable: false,
                        width: '150'
                    },

                ]
            });
        });
    </script>



    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your products</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img width="25px"
                        src="{{ asset('public/assets/img/icons/pdf.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img width="25px"
                        src="{{ asset('public/assets/img/icons/excel.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print" data-bs-original-title="Print"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-printer feather-rotate-ccw">
                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <rect x="6" y="14" width="12" height="8"></rect>
                    </svg></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh"
                    data-bs-original-title="Refresh"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-rotate-ccw">
                        <polyline points="1 4 1 10 7 10"></polyline>
                        <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                    </svg></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" id="collapse-header" aria-label="Collapse"
                    data-bs-original-title="Collapse"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-up">
                        <polyline points="18 15 12 9 6 15"></polyline>
                    </svg></a>
            </li>
        </ul>
        <div class="page-btn">
            <a href="add-product.html" class="btn btn-added"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle me-2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>Add New Product</a>
        </div>
        <div class="page-btn import">
            <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-download me-2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>Import Product</a>
        </div>
    </div>

    <div class="card table-list-card">
        <div class="card-body">

            <h3>Search Area</h3>
        </div>
    </div>
    <div id="jqxgrid"></div>
@endsection
