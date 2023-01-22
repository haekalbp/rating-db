<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="server.png" type="image/x-icon">
    <title>Database</title>
    
    {{-- My CSS --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    {{-- Bootstrap 5 and Data Tables --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
  </head>
  <body>
    <div class="container my-5">
      <div class="card">
        <h1 class="card-header text-center py-4">Database</h2>
        <div class="card-body">
          <table id="data-table" class="w-100 table table-hover table-bordered table-striped">
            <thead class="bg-warning">
              <tr>
                <th class="text-center">Ticker</th>
                <th class="text-center">Quadrant</th>
                <th class="text-center">Rating</th>
                <th class="text-center">Outlook</th>
              </tr>
            </thead>
            <tbody class="text-center">
            </tbody>
            <tfoot>
              <tr>
                <td>
                  <input type="text" class="form-control filter-input" data-column="0" placeholder="Search for ticker.." >
                </td>
                <td>
                  <input type="text" class="form-control filter-input" data-column="1" placeholder="Search for quadrant.." >
                </td>
                <td>
                  <input type="text" class="form-control filter-input" data-column="2" placeholder="Search for rating.." >
                </td>
                <td>
                  <input type="text" class="form-control filter-input" data-column="3" placeholder="Search for outlook.." >
                </td>
              </tr>
              <tr>
                <td>
                  <select data-column="0" class="form-select filter-select">
                    <option value="">Ticker</option>
                    @foreach ($name as $n)
                    <option value="{{ $n }}">{{ $n }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select data-column="1" class="form-select filter-select">
                    <option value="">Quadrant</option>
                    @foreach ($quadrant as $q)
                    <option value="{{ $q }}">{{ $q }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select data-column="2" class="form-select filter-select">
                    <option value="">Rating</option>
                    @foreach ($rate as $r)
                    <option value="{{ $r }}">{{ $r }}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <select data-column="3" class="form-select filter-select">
                    <option value="">Outlook</option>
                    @foreach ($outlook as $o)
                    <option value="{{ $o }}">{{ $o }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    
    {{-- Bundling of Data Tables and jQuery --}}
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    
    <script>
      
      // Data Tables Configuration
      $(document).ready( function () {
        let table = $('#data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "table",
          // order: [[1, 'asc']],
          // "scrollX": true,
          columns: [
            {data: 'name', name: 'name'},
            {data: 'quadrant', name: 'quadrant'},
            {data: 'rating', name: 'rating'},
            {data: 'outlook', name: 'outlook'},
          ],
        });

        // Column Search Filter
        $('.filter-input').keyup(function() {
          table.column( $(this).data('column') )
          .search( $(this).val() )
          .draw();
        });

        // Column Selection Filter
        $('.filter-select').change(function() {
          table.column( $(this).data('column') )
          .search( $(this).val() )
          .draw();
        });
      });

    </script>

    {{-- Bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>