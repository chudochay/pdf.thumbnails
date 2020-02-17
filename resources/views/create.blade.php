@extends ('layout')

@section ('content')
    <div class="form">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-uppercase">
                Add New Document
            </h3>
        </div>
    </div>
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p> {{ $message }} </p>
        </div>
    @endif
    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <input type="file" name="pdf"/>
                <div class="buttons">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-info" href="{{ route('index') }}">Back to PDFs</a>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
