@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $chart1->options['column_class'] }}">
                            <h3>{!! $chart1->options['chart_title'] !!}</h3>
                            {!! $chart1->renderHtml() !!}
                        </div>
                        <div class="{{ $chart2->options['column_class'] }}">
                            <h3>{!! $chart2->options['chart_title'] !!}</h3>
                            {!! $chart2->renderHtml() !!}
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Verjaardagen van leden deze maand</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-striped table-hover datatable datatable-members">
                                            <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th>
                                                ledenID
                                            </th>
                                            <th>
                                                Member Name
                                            </th>
                                            <th>
                                                Birthday On
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach($members_birthday_this_month as $mbr)
                                            <tr>
                                                <td>

                                                </td>
                                                <td>
                                                    {{$mbr->ledenid}}
                                                </td>
                                                <td>
                                                    {{$mbr->first_name.' '.$mbr->surname}}
                                                </td>
                                                <td>
                                                    {{date('d-m',strtotime($mbr->date_of_birth))}}
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.members.show',[$mbr->id])}}" class="btn btn-info">View Member</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                            </tbody>
                                    </table>
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
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}{!! $chart2->renderJs() !!}
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 25,
        });
        let table = $('.datatable-members:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    })
</script>
@endsection
