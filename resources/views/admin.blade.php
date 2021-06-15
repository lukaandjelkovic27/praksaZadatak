@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Import File</h5>
                <div class="card-body">
                    <form action="{{route('importCsv')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" accept=".csv" name="file">
                        <button type="submit">Import</button>
                    </form>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
            <br>
            <div class="card">
                <h5 class="card-header">Filter imported file</h5>
                <div class="card-body">
                    <a href="{{route('api')}}"><button type="button">Filter</button></a>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
