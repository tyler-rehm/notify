@extends('spark::layouts.app')

@section('content')
    <home :user="user" inline-template>
        <div class="container">
            <!-- Application Dashboard -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Today's Statistics</div>

                        <div class="panel-body">
                            <div class="col-md-4">
                                <h3>Confirmed</h3>
                                <div>
                                    @if(!empty($confirmed_count))
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>Cancelled</h3>
                                <div>
                                    @if(!empty($cancelled_count))
                                    @else
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>Rescheduled</h3>
                                <div>
                                    @if(!empty($rescheduled_count))
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Appointments</div>
                        <div class="panel-body">
                        @if(!empty($appointments))
                            <table class="table">
                                <tr>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Name</td>
                                </tr>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>
                                            @if(!empty($appointment->date))
                                                {{ $appointment->date }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($appointment->time))
                                                {{ $appointment->time }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($appointment->name))
                                                {{ $appointment->name  }}
                                            @else
                                                John Smith
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h4>No Appointments for Today! Check back again tomorrow.</h4>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </home>
@endsection