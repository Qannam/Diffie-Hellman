@extends('layout')
@section('title', 'Diffie Hellman Result')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="text-center">A</p>
                <img src="{{asset("assets/images/boy.png")}}" class="img-fluid" alt="Responsive image">
                <div class="text-center mt-5">
                    <p class="seconds3"><b>Xa = {{$Xa}}</b></p>
                    <p class="seconds4"><b>Ya = {{$Ya}}</b></p>
                    <p class="seconds5"><b>Yb = {{$Yb}}</b></p>
                    <p class="seconds6"><b id="ka">Ka = {{$Ka}}</b></p>
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                    <p class="seconds1"><b>q = {{$q}}</b></p>
                    <p class="seconds2"><b>a = {{$a}}</b></p>
                </div>
            </div>
            <div class="col">
                <p class="text-center">B</p>
                <img src="{{asset("assets/images/man.png")}}" class="img-fluid" alt="Responsive image">
                <div class="text-center mt-5">
                    <p class="seconds3"><b>Xb = {{$Xb}}</b></p>
                    <p class="seconds4"><b>Yb = {{$Yb}}</b></p>
                    <p class="seconds5"><b>Ya = {{$Ya}}</b></p>
                    <p class="seconds6"><b id="kb">Kb = {{$Kb}}</b></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            setTimeout(function() {   //calls click event after a certain time
                successAlert();
            }, 6000);
        });
        function successAlert() {
            swal("Congrats!", "Kab = {{$Kb}}", "success");
        }
    </script>

@endsection