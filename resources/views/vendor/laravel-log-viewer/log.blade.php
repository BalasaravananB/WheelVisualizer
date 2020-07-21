@extends('admin.layouts.app')

@section('custom_styles')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<style>
    body {
        /*padding: 25px;*/
    }

    h1 {
        font-size: 1.5em;
        margin-top: 0;
    }

    #table-log {
        font-size: 0.85rem;
    }

    .sidebar {
        font-size: 0.85rem;
        line-height: 1;
    }

    .btn {
        font-size: 0.7rem;
    }

    .stack {
        font-size: 0.85em;
    }

    .date {
        min-width: 75px;
    }

    .text {
        word-break: break-all;
    }

    a.llv-active {
        z-index: 2;
        background-color: #f5f5f5;
        border-color: #777;
    }

    .list-group-item {
        word-wrap: break-word;
    }

    .folder {
        padding-top: 15px;
    }

    .div-scroll {
        height: 80vh;
        overflow: hidden auto;
    }

    .nowrap {
        white-space: nowrap;
    }
</style>
 
@endsection

@section('content')


<?php
$is_read_access = VerifyAccess('logs','read');
$is_write_access = VerifyAccess('logs','write');
?>

<div class="product-status mg-b-15">
    <div class="container-fluid">
        <div class="analytics-sparkle-area">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                      <div class="analytics-sparkle-line reso-mg-b-30 dash">
                          <div class="analytics-content">
                              <h2>Inventories Details</h2>
                              <h5 class="total-count" ></h5>
                              <!-- <span class="text-success">20%</span> -->
                              <!-- <div class="progress m-b-0">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                              </div> -->
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap drp-lst">
                  <h1><i class="fa fa-calendar" aria-hidden="true"></i> Server Logs</h1>
                    <div style="text-align:right;padding-bottom: 20px">
                        <!-- <a class="btn btn-info" href="{{url('admin/exportTable')}}?module=Order">Export CSV </a> -->

                    </div>
                    <div class="asset-inner">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col sidebar mb-3">
                                    <!-- <h1><i class="fa fa-calendar" aria-hidden="true"></i> Laravel Log Viewer</h1> -->
                                    <!-- <p class="text-muted"><i>by Rap2h</i></p> -->

                         <!--            <div class="custom-control custom-switch" style="padding-bottom:20px;">
                                        <input type="checkbox" class="custom-control-input" id="darkSwitch">
                                        <label class="custom-control-label" for="darkSwitch" style="margin-top: 6px;">Dark Mode</label>
                                    </div> -->

                                    <div class="list-group div-scroll">
                                        @foreach($folders as $folder)
                                        <div class="list-group-item">
                                            <a href="?f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}">
                                                <span class="fa fa-folder"></span> {{$folder}}
                                            </a>
                                            @if ($current_folder == $folder)
                                            <div class="list-group folder">
                                                @foreach($folder_files as $file)
                                                <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}&f={{ \Illuminate\Support\Facades\Crypt::encrypt($folder) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                                                    {{$file}}
                                                </a>
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                        @foreach($files as $file)
                                        <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                                            {{$file}}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-10 table-container">
                                    @if ($logs === null)
                                    <div>
                                        Log file >50M, please download it.
                                    </div>
                                    @else
                                    <table id="table-log" class="table table-striped" data-ordering-index="{{ $standardFormat ? 2 : 0 }}">
                                        <thead>
                                            <tr>
                                                @if ($standardFormat)
                                                <th>Level</th>
                                                <th>Context</th>
                                                <th>Date</th>
                                                @else
                                                <th>Line number</th>
                                                @endif
                                                <th>Content</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($logs as $key => $log)
                                            @if($log['level'] == 'info')
                                            <tr data-display="stack{{{$key}}}">
                                                @if ($standardFormat)
                                                <td class="nowrap text-{{{$log['level_class']}}}">
                                                    <span class="fa fa-{{{$log['level_img']}}}" aria-hidden="true"></span>&nbsp;&nbsp;{{$log['level']}}
                                                </td>
                                                <td class="text">{{$log['context']}}</td>
                                                @endif
                                                <td class="date">{{{$log['date']}}}</td>
                                                <td class="text">
                                                    @if ($log['stack'])
                                                    <button type="button" class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2" data-display="stack{{{$key}}}">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    @endif
                                                    {{{$log['text']}}}
                                                    @if (isset($log['in_file']))
                                                    <br />{{{$log['in_file']}}}
                                                    @endif
                                                    @if ($log['stack'])
                                                    <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @endif
                                    <div class="p-3">
                                        @if($current_file)
                                        <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                            <span class="fa fa-download"></span> Download file
                                        </a>
                                        <!-- -
                                        <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                            <span class="fa fa-sync"></span> Clean file
                                        </a>
                                        -
                                        <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                            <span class="fa fa-trash"></span> Delete file
                                        </a>
                                        @if(count($files) > 1)
                                        -
                                        <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
                                            <span class="fa fa-trash-alt"></span> Delete all files
                                        </a> -->
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- FontAwesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> -->

<script> 
    $(document).ready(function() {
        $('.table-container tr').on('click', function() {
            $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
            "order": [$('#table-log').data('orderingIndex'), 'desc'],
            "stateSave": true,
            "stateSaveCallback": function(settings, data) {
                window.localStorage.setItem("datatable", JSON.stringify(data));
            },
            "stateLoadCallback": function(settings) {
                var data = JSON.parse(window.localStorage.getItem("datatable"));
                if (data) data.start = 0;
                return data;
            }
        });
        $('#delete-log, #clean-log, #delete-all-log').click(function() {
            return confirm('Are you sure?');
        });

        $('.breadcome-heading').hide();
    });
</script>

<script type="text/javascript">

$(document).ready(function() {  
  // console.log('hiii');
        $.ajax({
            url: "/admin/inventories/count/",
            data:{}, 
            success: function(result){  
                console.log(result,result['data'])
                $(".total-count").html('<span class="counter"> Total Inventories Data : '+result['data']+'</span>')
                console.log()//.html(result['data']);
                 // $('#custom-msg').html(`
                 //  <div class="alert alert-success">
                 //          <button type="button" class="close" data-dismiss="alert">×</button>
                 //          `+result.msg+`
                 //  </div>`);

            },
            error: function (jqXHR, textStatus, errorThrown) {
            
                    // $loading.fadeOut("slow");
            }
        });  
});

    
</script> 
@endsection


@section('custom_scripts')

@endsection