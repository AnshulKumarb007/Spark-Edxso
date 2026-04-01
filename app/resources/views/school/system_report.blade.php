<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="" rel="icon" />
    <title>System Assessment Report</title>
    <meta name="author" content="">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/vendor/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('invoice/css/stylesheet.css') }}" />
    <style>
        .img-cls {
            width: 100px;
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row gy-3">
                <div class="col-12 text-center">
                    <h2 class="text-4">System Assessment Report</h4>
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('web/logo.svg') }}" title="Edxso" alt="Edxso Logo" class="logo images">
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-right" style="text-align: right">
                    <img id="logo" class="img-cls" src="https://www.edxso.com/img/logo.png" title="Edxso" alt="Edxso Logo" />
                </div>


            </div>

        </header>
        <main>
            <div class="row gy-3">
                <div class="table-responsive">
                    <table class="table border mb-0">
                        <tbody>
                            <tr>
                            <tr class="bg-light">
                                <th>Hash Key</th>
                                <td>{{ $data->hash_key }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>Lab </th>
                                <td>{{ $data->lab_id }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>PC </th>
                                <td>{{ $data->pc_id }}</td>
                            </tr>

                            <tr class="bg-light">
                                <th>IP</th>
                                <td>{{ $data->ip }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>OS</th>
                                <td @if($data->os!='Windows' && $data->os!='macOS' && $data->os!='Linux') style="background: #ffb0b0 !important;color: white;" @endif>{{ $data->os }} </td>
                            </tr>
                            <tr class="bg-light">
                                <th>Browser</th>
                                <td @if($data->browser!='Chrome' && $data->browser!='Firefox' && $data->browser!='Edge') style="background: #ffb0b0 !important;color: white;" @endif>{{ $data->browser }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>Resolution</th>
                                <td @if($data->resolution < 1024 && $data->resolution < 768) style="background: #ffb0b0 !important;color: white;" @endif>{{ $data->resolution }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>JS Enabled</th>
                                <td>{{ $data->js_enabled ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>RAM</th>
                                <td @if($data->ram <= 7) style="background: #ffb0b0 !important;color: white;" @endif>{{ $data->ram }}GB</td>
                            </tr>
                            <tr class="bg-light">
                                <th>Test Date</th>
                                <td class="col-2 text-right">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th>Status</th>
                                <td class="text-danger"> <b>{{ $data->status }}</b></td>
                            </tr>
                          </tr>
                        </tbody>
                    </table>
                </div>
        </main>
        <footer class="mt-5">
            <div class="row">
                <!-- <p class="text-0 mb-0"><strong>Returns Policy:</strong> At Koice we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the original Brand box/price
tag, original packing and invoice without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</p>-->
                <hr class="my-2">
                <p class="text-center">Helpline: +91 8447477275 Or Email: support@sparkolympiads.com</p>
                <p class="text-center">www.sparkolympiads.com</p>
                <p style="text-align:center;font-size:10px"> (This is a system generated document.) </p>
                <div class="text-center">
                    <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                            class="btn btn-success btn-sm border text-white shadow-none"> Print & Download</a> </div>
                </div>
        </footer>
    </div>
</body>

</html>
