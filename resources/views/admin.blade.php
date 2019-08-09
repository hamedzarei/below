@extends('layouts.base')

@section('title', 'Admin Panel')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/bootstrap34.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.Bootstrap-PersianDateTimePicker.min.css') }}">
    @stop

@section('content')
    <br><br><br><br>

    <div style="margin-top: 50px; clear: both;"></div>

    <div class="container" style="max-width: 500px;">
        <div class="row form-group">
            <div class="col-xs-6">
                <div class="input-group">
                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click"
                         data-targetselector="#from_date" data-groupid="group1" data-fromdate="true"
                         data-enabletimepicker="true" data-placement="left">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <input type="text" class="form-control" id="from_date" placeholder="از تاریخ"
                           data-mddatetimepicker="true" data-trigger="click" data-targetselector="#from_date" data-groupid="group1"
                           data-fromdate="true" data-enabletimepicker="true" data-placement="right"
                        data-englishnumber="true"/>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="input-group">
                    <div class="input-group-addon" data-mddatetimepicker="true" data-trigger="click"
                         data-targetselector="#to_date"  data-groupid="group1" data-todate="true"
                         data-enabletimepicker="true" data-placement="left">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                    <input type="text" class="form-control" id="to_date" placeholder="تا تاریخ"
                           data-mddatetimepicker="true" data-trigger="click" data-targetselector="#to_date" data-groupid="group1"
                           data-todate="true" data-enabletimepicker="true" data-placement="right"/>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">email</th>
                <th scope="col">create time</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@stop

@section('script')<script type="text/javascript">

</script>
    <script src="{{ asset('js/bootstrap34.min.js') }}"></script>
    <script src="{{ asset('js/calendar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.Bootstrap-PersianDateTimePicker.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
@stop
