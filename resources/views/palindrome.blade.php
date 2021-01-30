@extends('layout')
@section('content')
    <div class="card">
        <div class="card-header">
            Palindrome
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-lg-8">
                    <input type="text" class="form-control" placeholder="Enter text to check for palindrome"
                           id="palindrome-input">
                </div>
                <div class="form-group col-lg-4">
                    <button type="button" class="btn btn-primary btn-md" onclick="getResult()">Check</button>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-8">
                    <textarea id="result" disabled rows="4" style="width:800px"></textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function getResult() {
            $.ajax({
                url: "{{ url('check-palindrome') }}",
                type: 'post',
                data: {
                    _token:'{{ csrf_token() }}',
                    string: $('#palindrome-input').val()
                },
                success: function (response) {
                    $('#result').val(response.message);
                },
                error: function (response) {
                    $('#result').val('');
                    toastr.error(response.responseJSON.errors.string[0]);
                }
            });
        }
    </script>
@endsection
