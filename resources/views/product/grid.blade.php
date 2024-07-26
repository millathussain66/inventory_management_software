@extends('layouts.master')
@section('content')








@php
    $category_str = '<option value="">Choose</option>';
    if (!empty($category)) {
        foreach ($category as $row) {
            $category_str .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
    }
@endphp


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
                    $("#jqxgrid").jqxGrid('updatebounddata', 'filter');
                },
                sort: function() {
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
				rowsheight:30,
				clipboard:false,
				filterable: true,
				sortable: true,
				pageable: true,
				virtualmode: true,
				editable: false,
				rowdetails: false,
                columnsreorder: true,
                columnsresize: true,
				enablebrowserselection: true,
				selectionmode: 'singlerow',
                pagesize: 10,
                pagesizeoptions: ['10', '15', '20', '30'],
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
            $("#save_productBtn").click(function() {



                call_ajax_submit();


            });

            $('#jqxTabs').jqxTabs({
                width: '100%',
            });

            $('#jqxTabs').jqxTabs('select', 0);

        });

        function call_ajax_submit(){

            var url = "{{ route('product.call_ajax_submit') }}";
            var postdata = jQuery('#product_form').serialize() + "&_token=" + jQuery('meta[name="csrf-token"]').attr('content');

            console.log(postdata);
			jQuery.ajax({
					type: "POST",
					cache: false,
					url: url,
					data : postdata,
					datatype: "json",
					success: function(Response){
                        var json = $.parseJSON(Response);
                        $('meta[name="csrf-token"]').attr('content', json.csrf_token);
                        if(json.Message=="Ok"){

                        }else{

                        }
                    },
                    error: function(error){
                        alert("Server Error");
                    }
                })






        }
        function tab_change() {
            $('#jqxTabs').jqxTabs('select', 0);
        }
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
        <button type="button" class="btn btn-primary mb-1" onclick="tab_change();">Add New Product</button>
    </div>
    <div class="page-btn import">
        <a href="#" class="btn btn-added color"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-download me-2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>Import Product</a>
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
                <form action="" id="product_form" name="product_form" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body add-product pb-0">
                            <div class="accordion-card-one accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="accordion-header" id="headingOne">
                                        <div class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-controls="collapseOne">
                                            <div class="addproduct-icon">
                                                <h5><i data-feather="info" class="add-info"></i><span>Product
                                                        Information</span></h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label" for="store">Store</label>
                                                        <select class="select" id="store" name="store">
                                                            <option>Choose</option>
                                                      
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label" for="warehouse">Warehouse</label>
                                                        <select class="select" id="warehouse" name="warehouse">
                                                            <option>Choose</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label" for="product-name">Product
                                                            Name</label>
                                                        <input type="text" class="form-control" id="product-name"
                                                            name="product-name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label" for="slug">Slug</label>
                                                        <input type="text" class="form-control" id="slug" name="slug">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-sm-6 col-12">
                                                    <div class="input-blocks add-product list">
                                                        <label for="sku">SKU</label>
                                                        <input type="text" class="form-control list" id="sku" name="sku"
                                                            placeholder="Enter SKU">
                                                        <button type="submit" class="btn btn-primaryadd">
                                                            Generate Code
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="addservice-info">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label"
                                                                    for="category">Category</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-units-category">
                                                                    <i data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add New</span>
                                                                </a>
                                                            </div>
                                                            <select class="select" id="category" name="category">
                                                                {!! $category_str !!}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label" for="sub_category">Sub Category</label>
                                                            <select class="select" id="sub_category" name="sub_category">
                                                                <option>Choose</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label" for="sub_sub_category">Sub Sub Category</label>
                                                            <select class="select" id="sub_sub_category" name="sub_sub_category">
                                                                <option>Choose</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-product-new">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label" for="brand">Brand</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-units-brand">
                                                                    <i data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add New</span>
                                                                </a>
                                                            </div>
                                                            <select class="select" id="brand" name="brand">
                                                                <option>Choose</option>
                                                                <option>Nike</option>
                                                                <option>Bolt</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <div class="add-newplus">
                                                                <label class="form-label" for="unit">Unit</label>
                                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                    data-bs-target="#add-unit">
                                                                    <i data-feather="plus-circle"
                                                                        class="plus-down-add"></i><span>Add New</span>
                                                                </a>
                                                            </div>
                                                            <select class="select" id="unit" name="unit">
                                                                <option>Choose</option>
                                                                <option>Kg</option>
                                                                <option>Pc</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6 col-12">
                                                        <div class="mb-3 add-product">
                                                            <label class="form-label" for="selling-type">Selling
                                                                Type</label>
                                                            <select class="select" id="selling-type"
                                                                name="selling-type">
                                                                <option>Choose</option>
                                                                <option>Transactional selling</option>
                                                                <option>Solution selling</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="mb-3 add-product">
                                                        <label class="form-label" for="barcode-symbology">Barcode
                                                            Symbology</label>
                                                        <select class="select" id="barcode-symbology"
                                                            name="barcode-symbology">
                                                            <option>Choose</option>
                                                            <option>Code34</option>
                                                            <option>Code35</option>
                                                            <option>Code36</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-12">
                                                    <div class="input-blocks add-product list">
                                                        <label for="item-code">Item Code</label>
                                                        <input type="text" class="form-control list" id="item-code"
                                                            name="item-code" placeholder="Please Enter Item Code">
                                                        <button type="submit" class="btn btn-primaryadd">Generate
                                                            Code</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="input-blocks summer-description-box transfer mb-3">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control h-100" id="description"
                                                        name="description" rows="5"></textarea>
                                                    <p class="mt-1">Maximum 60 Characters</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <button type="button" class="btn btn-primary" id="save_productBtn">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="margin: 20px">
            <div id="jqxgrid"></div>
        </div>
    </div>
</div>
@endsection