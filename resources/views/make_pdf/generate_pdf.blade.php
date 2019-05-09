@extends('layout.index')

@push('css')

@endpush

@section('content')
  <div class="container">
    <div class="row mt-5 justify-content-center">
      <div class="col-md-10">

        <div class="card">
          <div class="card-body">

            <table class="table table-bordered table-striped"
              id="tables">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($data as $key => $item)
                    <tr>
                      <th scope="row">{{$key+1}}</th>
                      <td>{{$item['Name']}}</td>
                      <td>{{$item['Email']}}</td>
                      <td>{{$item['Password']}}</td>
                    </tr>
                  @empty
                    <tr>
                      <th>Data Tidak Ada</th>
                    </tr>
                  @endforelse
              </tbody>
            </table>


          </div>
        </div>

      </div>
    </div>
  </div>
@endsection

@push('script-js')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/vfs_fonts.js"></script>
  <script>
    $(document).ready(function(){

      var data = @json($data);

      $('#tables').DataTable();

      var docDefinition = {
        content: 'This is an sample PDF printed with pdfMake'
      };


      function buildTableBody(data, columns) {
          var body = [];
          body.push(columns);
          data.forEach(function(row) {
              var dataRow = [];
              columns.forEach(function(column) {
                  dataRow.push(row[column].toString());
              })
              body.push(dataRow);
          });
          return body;
      }

      function table(data, columns) {
          return {
              table: {
                headerRows: 1,
                body: buildTableBody(data, columns)
              }
          };
      }
      var dd = {
          pageSize: 'A4',
          pageMargins: [ 80, 40, 80, 40 ],
          content: [
              { text: 'Dynamic Part', style: 'subheader' },
              'Moncos Lowrider',
              '',
              table(data, ['Name', 'Email'])
          ]
      }
      pdfMake.createPdf(dd).download();

    })
  </script>
  @endpush
