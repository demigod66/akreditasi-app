@extends('template')
@section('content')

<style>
    .pdfobject-container {
        height: 30rem;
        border: 1rem solid rgba(0, 0, 0, .1);
    }

    h4 {
        text-align: center;
    }
</style>

<h4>Preview File :</h4>
<div id="pdf-viewer"></div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>

<script>
    PDFObject.embed("{{ url('/show-standar-pengelolaan-pdf', $standar_pengelolaan->id) }}", "#pdf-viewer");
</script>


@endsection
