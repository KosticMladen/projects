@extends('front.layout.app')

@section('main_content')

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Previous Polls</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Previous Polls</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @foreach($online_poll_data as $item)

                    @if($loop->iteration == 1)
                        @continue
                    @endif

                    @php

                        $total_vote = $item->no_vote + $item->yes_vote;

                        if ($item->yes_vote == 0) {

                            $total_yes_percentage = 0;
                            
                        } else {

                            $total_yes_percentage = ($item->yes_vote * 100) / $total_vote;
                            $total_yes_percentage = ceil($total_yes_percentage);

                        }
                        

                        if ($item->no_vote == 0) {

                            $total_no_percentage = 0;

                        } else {
                            
                            $total_no_percentage = ($item->no_vote * 100) / $total_vote;
                            $total_no_percentage = ceil($total_no_percentage);

                        }

                    @endphp

                    <div class="poll-item">
                        <div class="question">
                            Question: {{ $item->question }}
                        </div>
                        <div class="poll-date">

                            @php

                            $ts = strtotime($item->created_at);
                            $created_date = date('d F, Y', $ts);

                            @endphp

                            <b>Poll Date:</b> {{ $created_date }}
                        </div>
                        <div class="total-vote">
                            <b>Total Votes:</b> {{ $total_vote }}
                        </div>
                        <div class="poll-result">                        
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Yes ({{ $item->yes_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div
                                                    class="progress-bar bg-success"
                                                    role="progressbar" style="width: {{ $total_yes_percentage }}%"
                                                    aria-valuenow="{{ $total_yes_percentage }}"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                >
                                                    {{ $total_yes_percentage }}%
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No ({{ $item->no_vote }})</td>
                                        <td>
                                            <div class="progress">
                                                <div
                                                    class="progress-bar bg-danger"
                                                    role="progressbar"
                                                    style="width: {{ $total_no_percentage }}%"
                                                    aria-valuenow="{{ $total_no_percentage }}"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                >
                                                    {{ $total_no_percentage }}%
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
</div>

@endsection