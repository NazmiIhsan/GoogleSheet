<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Add these links to your HTML head section -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">


</head>

<body>


    <form action="{{ route('get_branch') }}" method="POST">
        @csrf
        <div class="btn-group" id="branch" role="group" aria-label="Basic example"
            style="margin-left: 5%; margin-top:2%">
            <button type="submit" class="btn btn-primary" name="selectedBranch" value="BJ">BESTARI JAYA</button>
            <button type="submit" class="btn btn-primary" name="selectedBranch" value="SA">SHAH ALAM</button>
        </div>
    </form>


    <div class="container mt-5">
        <div class="card-header">
            <h5>
                @if ($branch === 'BJ')
                    Google Sheet (Bestari Jaya)
                @elseif ($branch === 'SA')
                    Google Sheet (Shah Alam)
                @else
                    Google Sheet (Shah Alam)
                @endif
            </h5>
            <div class="card-body">
                {{-- <input type="text" id="searchInput" placeholder="Search..."> --}}
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>PTJ / FAKULTI</th>
                            <th>JAWATAN</th>
                            <th>NAMA</th>
                            <th>DID</th>
                            <th>EXT</th>
                        </tr>
                    </thead>


                    <tbody>
                        @php
                            $data_use = $branch == 'BJ' ? $data : $data2;
                        @endphp

                        @foreach ($data_use as $row)
                            <tr>
                                @foreach ($row as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>



                </table>

            </div>
        </div>
    </div>



    {{-- @dump($values) --}}



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> --}}
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>


    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable({
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]

            });


        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            // Add an input event listener to the search input
            $('#searchInput').on('input', function() {
                // Get the value of the search input
                var searchValue = $(this).val().toLowerCase();

                // Loop through each row in the table body
                $('tbody tr').each(function() {
                    // Check each cell in the row
                    var rowText = $(this).text().toLowerCase();

                    // If the row contains the search value, show it; otherwise, hide it
                    $(this).toggle(rowText.indexOf(searchValue) > -1);
                });
            });
        });
    </script> --}}

    {{-- <script>
        // Wait for the document to be ready
        $(document).ready(function() {
            // Handle the dropdown change event
            $('.dropdown-item').click(function() {
                // Get the selected branch value
                var selectedBranch = $(this).attr('value');

                // Check the selected branch and update the content accordingly
                if (selectedBranch === 'BJ') {
                    $('#googleSheetData').html('<h5>Google Sheet Data -BESTARI JAYA-</h5>');
                } else if (selectedBranch === 'SA') {
                    $('#googleSheetData').html('<h5>Google Sheet Data -SHAH ALAM-</h5>');
                }
            });
        });
    </script> --}}


</body>


</html>
