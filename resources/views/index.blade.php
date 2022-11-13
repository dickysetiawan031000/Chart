<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container">
        <h1>Laravel 9 </h1>
        <div class="row mt-3">
            <div class="col-md-2">
                <select class="form-control" id="select-area">
                    <!-- readoly first option -->
                    <option value="all_area" selected>All Area</option>
                    @foreach ($store_areas as $area)
                    <option value="{{ $area->area_name }}">{{ $area->area_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="date-from" value="{{ $date_from }}" placeholder="Date From">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="date-to" value="{{ $date_to }}" placeholder="Date To">
            </div>
            <!-- button to view -->
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" id="btn-view">View</button>
            </div>
            <figure class="highcharts-figure mt-5 mb-5">
                <div id="container"></div>

                <table id="datatable" style="display: none">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Roti Tawar</th>
                            <th>Susu Kaleng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>DKI Jakarta</th>
                            <td id="roti_tawar_dki_jkt">30 386</td>
                            <td id="susu_kaleng_dki_jkt">28 504</td>
                        </tr>
                        <tr>
                            <th>Jawa Barat</th>
                            <td>29 173</td>
                            <td>27 460</td>
                        </tr>
                        <tr>
                            <th>Kalimantan</th>
                            <td>28 430</td>
                            <td>26 690</td>
                        </tr>
                        <tr>
                            <th>Jawa Tengah</th>
                            <td>28 042</td>
                            <td>26 453</td>
                        </tr>
                        <tr>
                            <th>Bali</th>
                            <td>27 063</td>
                            <td>25 916</td>
                        </tr>
                    </tbody>
                </table>
            </figure>
            <div class="col-md-12 mt-3 mb-5">
                <table class="table table-bordered" id="data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>DKI Jakarta</th>
                            <th>Jawa Barat</th>
                            <th>Kalimantan</th>
                            <th>Jawa Tengah</th>
                            <th>Bali</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<!-- datatable -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- ajax overlay -->
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
</script>
<!-- highchart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
    integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- datatable #data -->
<script type="text/javascript">
    $(function () {

    var table = $('#data').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/data/data/datatable/" + $('#select-area').val() + "/" + $('#date-from').val() + "/" + $('#date-to').val(),
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {data: 'brand', name: 'brand'},
            {data: 'dki_jakarta', name: 'dki_jakarta'},
            {data: 'jawa_barat', name: 'jawa_barat'},
            {data: 'kalimantan', name: 'kalimantan'},
            {data: 'jawa_tengah', name: 'jawa_tengah'},
            {data: 'bali', name: 'bali'}
        ]
    });

  });
</script>

<!-- highchart -->
<script>
    let chart = Highcharts.chart('container', {
                    data: {
                        table: 'datatable'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Report'
                    },
                    subtitle: {
                        text:
                            'Report'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Amount'
                        }
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                this.point.y + ' ' + this.point.name.toLowerCase();
                        }
                    }
                });
</script>

<!-- datepicker init -->
<script>
    $(document).ready(function () {
        $('#date-from').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            endDate: new Date()
        });
    });

    $(document).ready(function () {
        $('#date-to').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            endDate: new Date()
        });
    });
</script>

<!-- btn-view event -->
<script>
    $('#btn-view').on('click', () => {
        let area = $('#select-area').val();
        let date_from = $('#date-from').val();
        let date_to = $('#date-to').val();

        if (date_from > date_to) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Date From must be less than Date To',
            })
        } else if (area == null || date_from == '' || date_to == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill all fields',
            })
        } else {
            // chart
            axios
            .get("/data/data/chart/" + $('#select-area').val() + "/" + $('#date-from').val() + "/" + $('#date-to').val())
            .then(res => {
                // get text of #roti_tawar_dki_jakarta
                console.log($("#roti_tawar_dki_jakarta").text())
                console.log(res.data.data[0].dki_jakarta)


                // refresh chart
                chart.redraw();
            })


            $('#data').DataTable().destroy();
            $('#data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/data/data/datatable/" + area + "/" + date_from + "/" + date_to
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'brand', name: 'brand'},
                    {data: 'dki_jakarta', name: 'dki_jakarta'},
                    {data: 'jawa_barat', name: 'jawa_barat'},
                    {data: 'kalimantan', name: 'kalimantan'},
                    {data: 'jawa_tengah', name: 'jawa_tengah'},
                    {data: 'bali', name: 'bali'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }

        console.log(area, date_from, date_to);
    })
</script>

<!-- ajax overlay -->
<script>
    $(document).ajaxStart(function(){
        $.LoadingOverlay("show");
    });
    $(document).ajaxStop(function(){
        $.LoadingOverlay("hide");
    });
</script>

</html>