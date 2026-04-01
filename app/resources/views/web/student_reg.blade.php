@extends('web.layouts.student_app')
@section('content')
<style>
    .select2-container--default .select2-selection--single {
        height: 40px !important;
        line-height: 40px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 30px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 30px !important;
    }
</style>

<div class="card-body">
    @if(!empty($sd->image))
        <div class="row">
            <div class="col-md-3">    
                <img src="{{ asset($sd->image) }}" alt="" style="width: 100px" class="img-fluid mb-4">
            </div>
            <div class="col-md-9">   
                <h3 class="mt-4 text-capitalize">{{$school_details->school_name}}</h3>
            </div>
        </div> 
    @else
        <!-- <img src="{{asset('web/logo.svg')}}" alt="" class="img-fluid mb-4"> -->
    @endif

    <h4 class="mb-3 f-w-400">Student Registration</h4>
    <p>Search the full official name of your school</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="GET">
        <input type="hidden" name="R&M" value="@php echo Str::random(150); @endphp">    
        @csrf
        <div class="mb-3 position-relative">
            <label for="school_name" class="form-label">Your School Name<span class="text-danger">*</span>
                <i class="fa fa-info text-black ms-1 information"
                    data-bs-toggle="tooltip"
                    data-bs-placement="right"
                    title="Please enter the full official name of your school as it appears on records.">
                </i>
            </label>
            <input type="text" class="form-control" id="school_name_id" name="school_name" value="{{ old('school_name') }}" placeholder="Search Your School Name" autocomplete="off" required maxlength="100">
            <div id="schoolList" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
        </div>
    </form>
    
    <input type="hidden" name="url" id="school_url">
    <form id="school_details_container" action="#" style="display: none;">
        <h5 class="ff" id="school_state_title">School State: </h5>
        <h5 class="ff" id="school_district_title">School District: </h5>
        <h5 class="ff" id="school_display_address">School Address: </h5>
        <h5 class="ff" id="school_display_pincode">School Pincode: </h5>
        <input type="checkbox" id="school_confirm_checkbox" style="height:12px;">
        <label for="school_confirm_checkbox">I confirm that I belong to the above school</label>
        <br>
        <button type="submit" class="btn btn-primary mt-3" id="confirm_button" disabled>Confirm</button>
    </form>
</div>
@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $('#school_name_id').on('keyup', function () {
        let query = $(this).val();
        $('#schoolList').empty();
        if (query.length >= 2) {
            $('#schoolList').show();

            $.ajax({
                url: "{{ url('schools/get-school') }}",
                type: "GET",
                data: { name: query },
                success: function (response) {
                    if (response.status === 200 && response.data.length > 0) {
                        response.data.forEach(function (item) {
                            $('#schoolList').append(`
                                <a href="#" class="list-group-item list-group-item-action school-suggestion text-capitalize" data-address="${item.city_id}" data-pincode="${item.pin}" data-school_name="${item.school_name}" data-district_title="${item.district_title}" data-state_title="${item.state_title}" data-school_url="${item.school_url}/st">
                                    ${item.school_name} (${item.state_title})
                                </a>
                            `);
                        });
                    } else {
                        $('#schoolList').append(`
                            <a href="#" class="list-group-item list-group-item-action disabled">Data Not Found</a>
                        `);
                    }
                }
            });
        } else {
            $('#schoolList').hide();
            $('#schoolList').empty();
        }
    });
    $('#schoolList').on('click', '.list-group-item', function (e) {
        e.preventDefault();
        $('#school_details_container').show();
        const school_url = $(this).data('school_url');
        const state_title = $(this).data('state_title');
        const district_title = $(this).data('district_title');
        const name = $(this).data('school_name');
        const address = $(this).data('address');
        const pincode = $(this).data('pincode');

        $('#school_name_id').val(capitalizeWords(name));
        $('#school_url').val(school_url);
        $('#schoolList').empty();
        $('#school_state_title').text("School State: " + state_title);
        $('#school_district_title').text("School District: " + district_title);
        $('#school_display_address').text("School Address: " + address);
        $('#school_display_pincode').text("School Pincode: " + pincode);
    });
});
function capitalizeWords(str) {
    return str.replace(/\b\w/g, function(char) {
        return char.toUpperCase();
    });
}
$(document).ready(function () {
    $('#school_confirm_checkbox').on('change', function () {
        if ($(this).is(':checked')) {
            var school_url = $('#school_url').val();
            $('#school_details_container').attr('action',school_url)
            $('#confirm_button').prop('disabled', false);
        } else {
            $('#school_details_container').attr('action','')
            $('#confirm_button').prop('disabled', true);
        }
    });
});
</script>
@endpush
