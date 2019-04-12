@extends('layout.index')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endpush
@section('content')
  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-4">
        <form action="{{url("/upload")}}" method="POST" enctype="multipart/form-data">
          @csrf
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  1
                </th>
                <td>
                  <div style="height:100px">
                      <input type="file" name="pictures[]" class="dropify" data-max-file-size="3M"/>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <input type="file" name="pictures[]"  data-max-file-size="3M" />
          <div class="float-right mt-2">
            <button class="btn btn-sm" type="button">Clone</button>
            <button class="btn btn-sm" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('script-js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
  <script>
    $('.dropify').dropify();

    $(document).ready(function(){
      $('.dropify').dropify({
         messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
      });
    })
  </script>
@endpush