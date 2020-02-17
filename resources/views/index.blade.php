@extends ('layout')

@section ('content')
    <header>
        <h3>
            {{ config('APP_NAME', 'PDF Thumbnails') }}
        </h3>
        <a class="btn btn-primary" href="{{ route('create') }}">Add New Document</a>
    </header>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p> {{ $message }} </p>
        </div>
    @endif
    <div class="gallery">
    @foreach ($pdfs as $pdf)
        <!-- Link to open the modal -->
            <div class="img-thumbnail"
                 onclick="passToModal('{{$pdf->pdf_location}}', '{{explode('_',strtoupper($pdf->name))[1]}}')">
                <img class="image table-bordered"
                     src="{{ $pdf->thumbnail_location }}"
                     alt="Thumbnail of {{$pdf->name}}"/>
            </div>

        @endforeach
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <iframe id="iframepdf" frameborder="0" src="" width="100%" height="840px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row">
        <div class="">
            {{ $pdfs->links() }}
        </div>
        <div>
        <a class="btn btn-info" href="#">To Top</a>
        </div>
    </div>
    <!-- Parsing PDF file location and name using jQuery -->
    <script>
        function passToModal(src, name) {
            $("#pdfModal").modal('show');
            $("#iframepdf").attr('src', src)
            $("#modal-title").html(name)
        }
    </script>

@endsection
