
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="" rel="icon" />
<title>Generate Invoice</title>
<meta name="author" content="">

<!-- Web Fonts
======================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
======================= -->
<link rel="stylesheet" type="text/css" href="{{asset('invoice/vendor/bootstrap.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('invoice/vendor/all.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('invoice/css/stylesheet.css')}}"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
  <!-- Header -->
  <header>
	  <div class="row gy-3">
		<div class="col-12 text-center">
		  <h2 class="text-6 text-danger">{{$invoice->status==1 ?"Canceled":''}}</h2>
		  <h2 class="text-4">Tax Invoice</h4>
		</div>
		<div class="col-sm-3">
		  <img id="logo" src="https://www.edxso.com/img/logo.png" title="Edxso" alt="Edxso Logo" />
		</div>
		<div class="col-sm-9">
		  <h4 class="text-4 mb-1">Edxso LLP</h4>
		  <p class="lh-base mb-0">Reg. Address: Plot No-7 LSC Okhla Phase-2, New Delhi-110020, Delhi, India</p>
		</div>
		 
	  </div>
	  <hr>
  </header>
  
  <!-- Main Content -->
  <main>
	  <div class="row gy-3">
		<div class="col-sm-4">
			 <p class="mb-1"><strong>Invoice No::</strong> {{$data->invoiceno}}</p>
			<p class="mb-1"><strong>Invoice Date:</strong> <?=date("d/m/Y")?></p>
			
			 
		</div>
		<div class="col-sm-4"> <strong>Bill To:</strong>
		  <address class="text-capitalize">
		  {{$data->school_name}}<br />
		  {{$data->city_id}}<br />
		  {{$data->district_title}}<br />
		  {{$data->state_title}}
		  </address>
		</div>
		<div class="col-sm-4"> <strong>Ship To:</strong>
		  <address class="text-capitalize">
			{{$data->school_name}}<br />
			{{$data->city_id}}<br />
			{{$data->district_title}}<br />
			{{$data->state_title}}
		  </address>
		</div>
	  </div>
		<div class="table-responsive">
		<table class="table border mb-0">
			<thead>
			  <tr class="bg-light">
				<td class="col-5"><strong>Item Description</strong></td>
				<td class="col-1 text-center"><strong>QTY</strong></td>
				<td class="col-2 text-center"><strong>HSN Code</strong></td>				
				<td class="col-2 text-end"><strong>Total Amount</strong></td>
			  </tr>
			</thead>
			<tbody>
				<tr>
				  <td class="col-5">
					Spark Olympiads Online Exam Fees
					<p class="text-0 text-black-50 lh-base mb-0">Total Number Of Students - {{$invoice->total_student}}</p>
					 
				  </td>
				  <td class="col-1 text-center">{{$invoice->total_student}}</td>
				  <td class="col-2 text-center">#00777</td>
				  <td class="col-2 text-right">{{$invoice->total_amount}}</td>
				 
				</tr>
			 
			</tbody>
		</table>
		</div>
		<div class="table-responsive">
			<table class="table border border-top-0 mb-0">
				<!--<tr class="bg-light">
				  <td class="text-end"><strong>Sub Total:</strong></td>
				  <td class="col-sm-2 text-end">$277.00</td>
				</tr>-->
				 
				<tr class="bg-light">
				  <td class="text-end"><strong>Grand Total:</strong></td>
				  <td class="col-sm-2 text-right"><strong>{{$invoice->total_amount}}</strong></td>
				</tr>
				<tr class="bg-light">
					{{-- <td class="col-sm-2 text-left">Amount in words {{$data->total_fees}}</td> --}}
				</tr>
			</table>
		</div>
  </main>
  <!-- Footer -->
  <footer class="mt-5">
	<div class="row">
		<div class="col-md-8">
		<table>
			<tr>
				<td class="label" style="width:138px">Account Name:</td>
					<td>EDXSO LLP</td>
				</tr>
				<tr>
				<td class="label">Bank Name:</td>
					<td>ICICI Bank Limited</td>
				</tr>
				<tr>
				<td class="label">Account Number:</td>
				<td>348905001381</td>
				</tr>
				<tr>
				<td class="label">IFSC Code:</td>
				<td>ICIC0003489</td>
				</tr>
				<tr>
				 
			</tr>
		<tr>
			<td></td>
		</tr>
	  	</table>
		</div>
		<div class="col-md-4">	
			<div class="text-end mb-4">
					<img id="logo" src="{{asset('web/logo.svg')}}" title="Spark" alt="Spark" /><br>
					<div class="lh-1 text-black-50">Thank You!</div>
					<div class="lh-1 text-black-50 text-0"><small>For working with us</small></div>
			</div>
		</div>
  
 <!-- <p class="text-0 mb-0"><strong>Returns Policy:</strong> At Koice we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the original Brand box/price 
tag, original packing and invoice without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</p>-->
<hr class="my-2">
  <p class="text-center">Helpline: +91 8447477275 Or Email: support@sparkolympiads.com</p>
    <p class="text-center">www.sparkolympiads.com</p>
	<p style="text-align:center;font-size:10px"> (This is a system generated document hence does not require signatures.) </p>
  <div class="text-center">
	<div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-success btn-sm border text-white shadow-none"> Print & Download</a> </div>

	<div class="btn-group btn-group-sm d-print-none"> <a href="{{url('Spark-bank-details')}}" class="btn btn-danger btn-sm border text-white shadow-none"> Back </a> </div>
  </div>
  </footer>
</div>
</body>
</html>