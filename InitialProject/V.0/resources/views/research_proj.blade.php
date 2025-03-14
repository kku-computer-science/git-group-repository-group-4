@extends('layouts.layout')
@section('content')

<div class="container refund">
    <p>{{ __('message.Academic topics/research projects')}}</p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">{{__('message.no')}}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{__('message.year')}}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{__('message.Project name')}} </th>
                    <!-- <th>ระยะเวลาโครงการ</th>
                    <th>ผู้รับผิดชอบโครงการ</th>
                    <th>ประเภททุนวิจัย</th>
                    <th>หน่วยงานที่สนันสนุนทุน</th>
                    <th>งบประมาณที่ได้รับจัดสรร</th> -->
                    <th class="col-md-4" style="font-weight: bold;">{{__('message.details')}}</th>
                    <th class="col-md-2" style="font-weight: bold;">{{__('message.Project Manager')}}</th>
                    <!-- <th class="col-md-5">หน่วยงานที่รับผิดชอบ</th> -->
                    <th class="col-md-1" style="font-weight: bold;">{{__('message.status')}}</th>
                </tr>
            </thead>


            <tbody>
                @foreach($resp as $i => $re)
                    <tr>
                        <td style="vertical-align: top;text-align: left;">{{$i + 1}}</td>
                        <td style="vertical-align: top;text-align: left;">{{($re->project_year) + 543}}</td>
                        <td style="vertical-align: top;text-align: left;">
                            {{$re->project_name}}

                        </td>
                        <td>
                            <div style="padding-bottom: 10px">
                                @if ($re->project_start != null)
                                    <span style="font-weight: bold;">
                                        {{ __('message.project_duration') }}
                                    </span>
                                    <span style="padding-left: 10px;">
                                        @if (app()->getLocale() === 'th')
                                            {{ \Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }} ถึง
                                            {{ \Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}
                                        @elseif (app()->getLocale() === 'zh')
                                            {{ \Carbon\Carbon::parse($re->project_start)->format('Y年m月d日') }} 至
                                            {{ \Carbon\Carbon::parse($re->project_end)->format('Y年m月d日') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($re->project_start)->format('j F Y') }} to
                                            {{ \Carbon\Carbon::parse($re->project_end)->format('j F Y') }}
                                        @endif
                                    </span>
                                @else
                                    <span style="font-weight: bold;">
                                        {{ __('message.project_duration') }}
                                    </span>
                                    <span></span>
                                @endif
                            </div>


                            <!-- @if ($re->project_start != null)
                                    <td>{{\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }}<br>ถึง {{\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}</td>
                                    @else
                                    <td></td>
                                    @endif -->

                            <!-- <td>@foreach($re->user as $user)
                                        {{$user->position }}{{$user->fname_th}} {{$user->lname_th}}<br>
                                        @endforeach
                                    </td> -->
                            <!-- <td>
                                        @if(is_null($re->fund))
                                        @else
                                        {{$re->fund->fund_type}}
                                        @endif
                                    </td> -->
                            <!-- <td>@if(is_null($re->fund))
                                        @else
                                        {{$re->fund->support_resource}}
                                        @endif
                                    </td> -->
                            <!-- <td>{{$re->budget}}</td> -->
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;">{{__('message.research_funding_type')}}</span>
                                <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                    {{ __('message.funds.' . $re->fund->fund_type) }}
                                    <!--{{$re->fund->fund_type}}-->
                                @endif</span>
                            </div>
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;">{{__('message.supporting_agency')}}</span>
                                <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                    {{ __('message.support_resource.' . $re->fund->support_resource) }}
                                @endif</span>
                            </div>
                            <div style="padding-bottom: 10px;">
                                <span style="font-weight: bold;">{{__('message.responsible_unit')}}</span>
                                <span style="padding-left: 10px;">
                                    {{ __('message.department.' . $re->responsible_department) }}
                                    <!--{{$re->responsible_department}}-->
                                </span>
                            </div>
                            <div style="padding-bottom: 10px;">

                                <span style="font-weight: bold;">{{__('message.allocated_budget')}}</span>
                                <span style="padding-left: 10px;"> {{number_format($re->budget)}}
                                    {{__('message.currency')}}</span>
                            </div>
                        </td>

                        <td style="vertical-align: top;text-align: left;">
                            <div style="padding-bottom: 10px;">
                                <span>
                                    @foreach($re->user as $user)
                                        @if(App::getLocale() == 'th')
                                            {{ $user->position_th }} {{ $user->fname_th }} {{ $user->lname_th }}<br>
                                        @else
                                            {{ $user->position_en }} {{ $user->fname_en }} {{ $user->lname_en }}<br>
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                        </td>
                        @if($re->status == 1)
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge badge-success">{{__('message.application_submission')}}</label></h6>
                            </td>
                        @elseif($re->status == 2)
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge bg-warning text-dark">{{__('message.implementation')}}</label></h6>
                            </td>
                        @else
                            <td style="vertical-align: top;text-align: left;">
                                <h6><label class="badge bg-dark">{{__('message.project_closure')}}</label>
                                    <h6>
                            </td>
                        @endif
                        <!-- <td></td>
                                    <td></td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function () {
        // ตรวจสอบค่าภาษา (สมมติว่าคุณใช้ `App::getLocale()` หรือค่าจาก HTML)
        var currentLang = $('html').attr('lang'); // หรือคุณสามารถดึงค่าจากที่อื่น

        // ตั้งค่าภาษา
        var languageSettings = {
            en: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching records found",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                infoEmpty: "No entries available",
                infoFiltered: "(filtered from _MAX_ total entries)",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            th: {
                search: "ค้นหา:",
                lengthMenu: "แสดง _MENU_ รายการต่อหน้า",
                zeroRecords: "ไม่พบข้อมูลที่ต้องการ",
                info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                infoEmpty: "ไม่มีข้อมูล",
                infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
                paginate: {
                    first: "หน้าแรก",
                    last: "หน้าสุดท้าย",
                    next: "ถัดไป",
                    previous: "ก่อนหน้า"
                }
            },
            zh: {
                search: "搜索:",
                lengthMenu: "显示 _MENU_ 条记录",
                zeroRecords: "未找到匹配的记录",
                info: "显示 _START_ 到 _END_ 的 _TOTAL_ 条记录",
                infoEmpty: "没有可用的记录",
                infoFiltered: "(从 _MAX_ 条记录中过滤)",
                paginate: {
                    first: "首页",
                    last: "末页",
                    next: "下一页",
                    previous: "上一页"
                }
            }
        };

        // ใช้ค่าภาษาให้เหมาะสม
        var table1 = $('#example1').DataTable({
            responsive: true,
            language: languageSettings[currentLang] || languageSettings['en'] // Default เป็นอังกฤษ
        });
    });

</script>
@stop