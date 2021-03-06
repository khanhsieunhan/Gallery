@extends('./dashboard')
@section('title')
    Upload file images
@endsection
@section('content')
    <div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ route('uploads.store') }}" enctype="multipart/form-data" id="image-upload"> {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group"> <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="file"  name="file" multiple>
                </span> </span>
                    <input type="text" class="form-control" id="field" name="field"> </div> <img id='img-upload' class="img-rounded" /> </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
    <script>
      
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file").change(function(){
                readURL(this);
            });

        });
    </script>
@endsection
