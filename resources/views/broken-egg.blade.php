@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Broken Egg Problem
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-5">
                    <input type="text" class="form-control" placeholder="Enter number of eggs"
                           id="eggs-count">
                </div>
                <div class="form-group col-lg-5">
                    <input type="text" class="form-control" placeholder="Enter number of floors"
                           id="floors-count">
                </div>
                <div class="form-group col-lg-2">
                    <button type="button" class="btn btn-primary btn-md" onclick="getBrokenEggTrials()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            Result
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Minimum number of attempts</label>
                    <input type="text" class="form-control" id="min-attempts" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function getBrokenEggTrials() {
            $.ajax({
                type: 'post',
                url: "{{ url('broken-eggs') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    eggs_count: $('#eggs-count').val(),
                    floors_count: $('#floors-count').val(),
                },
                success: function (response) {
                    $('#min-attempts').val(response['number_of_attempts']);
                },
                error: function (response) {
                    let errors = response.responseJSON.errors;
                    $.each(errors, function (item, key) {
                        toastr.error(errors[item][0]);
                    });
                }
            });
        }
    </script>
@endsection
