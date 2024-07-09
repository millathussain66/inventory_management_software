<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Inventory Management System -POS </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/images/inventory-management.png') }}">

    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.base.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.fresh.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.light.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.ui-sunny.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.energyblue.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/jqwidgets/styles/jqx.darkblue.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/msg_popup/common.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/assets/css/multiple-select.css') }} " type="text/css" />

    <link href="{{ asset('public/admin-assets/vendor/fontawesome-free/css/all.min.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('public/admin-assets/css/sb-admin-2.min.css') }} " rel="stylesheet" type="text/css">



    <script type="text/javascript" src="{{ url('/') }}/public/assets/scripts/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/assets/scripts/gettheme.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxcore.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxexpander.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxvalidator.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxbuttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxcheckbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/globalization/globalize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxcalendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxdatetimeinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxmaskedinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxlistbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxcombobox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxscrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxwindow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxdropdownlist.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxswitchbutton.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxradiobutton.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.pager.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.selection.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.edit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.filter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.sort.js') }}"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/assets/jqwidgets/jqxgrid.grouping.js"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxdata.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxdata.export.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.export.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxpanel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxtooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxtabs.js') }}"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/assets/jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxgrid.columnsresize.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('public/assets/jqwidgets/jqxdropdownbutton.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('public/assets/jqwidgets/jqxcolorpicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxdragdrop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/assets/jqwidgets/jqxform.js') }}"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/assets/jqwidgets/jqxgrid.columnsreorder.js"></script>
    <script type="text/javascript" src="{{ asset('public/assets/js/jquery.multiple.select.js') }}"></script>









    <script type="text/javascript">
        var baseurl = "{{ url('/') }}";
        jQuery.noConflict();
        var j = jQuery.noConflict();
    </script>
    <script src="{{ url('/') }}/public/assets/js/custom.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript" src="{{ url('/') }}/public/assets/msg_popup/Util-jar.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/public/assets/calender/js/jquery-ui.js"></script>
    <script type="text/javascript" charset="utf-8" language="Javascript">
        function datePicker(id) {
            jQuery(document).ready(function() {
                jQuery('#' + id).datepicker({
                    inline: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'dd/mm/yy'
                });
            });
        }
    </script>
</head>
<body>


    @yield('content')


    
    <script src="{{ asset('public/admin-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/admin-assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>


