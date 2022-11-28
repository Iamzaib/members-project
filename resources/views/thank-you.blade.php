@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Thank You
                    </div>

                    <div class="card-body">
                        @if(isset($status))
                            <div class="alert alert-success" role="alert">
                                {{ $status }}
                            </div>
                        @endif
                            @if(isset($warning))
                            <div class="alert alert-danger" role="alert">
                                {{ $warning }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

