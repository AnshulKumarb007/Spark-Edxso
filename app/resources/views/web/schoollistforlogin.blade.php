
@extends('web.layouts.student_app2')
@section('content')
 <style>
    .left-section{
        margin-top:-10px;
    }
</style>
    
  <style>
  .registration-box {
    transition: transform 0.3s, box-shadow 0.3s; /* smooth hover animation */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);  /* subtle shadow */
    border-radius: 8px;
  }

  .registration-box:hover {
    transform: translateY(-5px);  /* lifts the card on hover */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* stronger shadow */
  }
 img{
    height:120px;width:250px;
  }
</style>

<!-- Search Box -->
<div class="mb-3">
  <input type="text" id="school-search" class="form-control" placeholder="Search by School Name" />
</div>

<!-- School List -->
<div class="row" id="school-list">
  @foreach($datas as $d)
    <div class="col-md-2 mb-3 d-flex">
      <div class="registration-box border p-3 text-center flex-fill d-flex flex-column justify-content-between">

        {{-- School Info --}}
        <div>
          <b class="d-block mb-2">{{ $d->school_name }}</b>
          
          {{-- School Logo --}}
          <img 
            src="{{ $d->image ? asset($d->image) : asset('missinglogo.webp') }}" 
            class="img-fluid mb-2" 
            alt="{{ $d->school_name }}"
            onerror="this.src='{{ asset('missinglogo.webp') }}'">
          
          <b class="d-block mb-2">{{ $d->school_id }}</b>
        </div>

        {{-- Login Button --}}
        <a href="{{$d->is_selected == 0 ? '#' :'https://sparkolympiads.prod-pathways.net/edifyAssess/SparkLogin.aspx?SchoolId='.$d->school_id }}" class="btn btn-primary btn-sm mt-2">
          Login  
        </a>
      </div>
    </div>
  @endforeach
</div>


    
@endsection

@push('scripts')
     
 

<script>
  $(document).ready(function() {
    // Trigger the search when typing in the search box
    $('#school-search').on('keyup', function() {
      var searchQuery = $(this).val();  // Get the value from the search box

      // Send an AJAX request to fetch the filtered results
      $.ajax({
        url: '{{ route("school.list") }}',  // Adjust route to match your controller's route name
        method: 'GET',
        data: { search: searchQuery },  // Send the search query
        success: function(response) {
          // Update the school list with the filtered data
          var html = '';
        response.forEach(function(d) {

       // Build image URL using external domain
       let imageUrl = d.image 
        ? "https://sparkolympiads.com/app/" + d.image
        : "/missinglogo.webp";   // local fallback image
  
        html += `
          <div class="col-md-2 mb-3 d-flex">
            <div class="registration-box border p-3 text-center flex-fill d-flex flex-column justify-content-between">
              <div>
                <b class="d-block mb-2">${d.school_name}</b>
                <img src="${imageUrl}" class="img-fluid mb-2" alt="${d.school_name}">
                <b class="d-block mb-2">${d.school_id}</b>
              </div>
              <a href="${d.is_selected == 0 ? '#' : 'https://sparkolympiads.prod-pathways.net/edifyAssess/SparkLogin.aspx?SchoolId=' + d.school_id}" class="btn btn-primary btn-sm mt-2">
                Login  
              </a>
            </div>
          </div>
        `;
    });

          $('#school-list').html(html);  // Replace the school list with the filtered result
        },
        error: function(xhr, status, error) {
          console.error('Error fetching data:', error);
        }
      });
    });
  });
</script>


 
@endpush