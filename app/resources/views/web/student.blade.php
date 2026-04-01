
@extends('web.layouts.student_app')
@section('content')
 <style>
    .left-section{
        margin-top:-10px;
    }
    </style>
    <div class="card-body">
        @if(!empty($sd->image))
        <div class="row">
            <div class="col-md-3">    
                 <img src="{{ asset($sd->image) }}" alt="" style="width: 100px" class="img-fluid mb-4">
            </div>
            <div class="col-md-9">   
                <h3 class="mt-4">{{$school_details->school_name}}</h3>
            </div>
        </div> 
        @else
        <div class="row">
            <div class="col-md-3">    
                <img src="{{asset('default-logo.png')}}" alt="" style="width: 50px;border-radius:10px;" class="img-fluid mb-4">
            </div>
            <div class="col-md-9">   
                <h3 class="mt-2 text-capitalize">{{$school_details->school_name}}</h3>
            </div>
        </div>   
            
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <form  method="GET" action="{{route('students.create')}}">
            <input type="hidden" name="R&M" value="@php echo Str::random(150); @endphp">    
            @csrf
                <input type="hidden" name="school_id" value="{{$code}}">
                <div class="mb-3">
                    <div class="header-container" style="display: flex; align-items: center; justify-content: space-between;">
  <div>
    <h4 class="f-w-400">Student Enrollment</h4>
    
      <label for="enrollInput" class="input-label">
         Your school admission/enrollment no.
  </label>
  </div>
  <div class="right-section left-section">
      <div style="text-align: right"><button class="success-button go-text" style="display: none;">EdAssess Certified</button> </div>
  </div>
</div>

              
              
    <input type="text" id="admno"
       name="admno" 
       class="form-control mt-2" 
       maxlength="10" 
       minlength="3" 
       placeholder="Enter admission/enrollment no." 
       required 
       autocomplete="off"
       pattern="[A-Za-z0-9/-]+"
       title="Only letters, numbers, slashes (/) and hyphens (-) are allowed." />

                <div id="mobile-error" class="text-danger small mt-1"></div>
            </div>
            <button type="submit" id="submitBtn" class="btn btn-primary w-100">Proceed To Next</button>
            
        </form>


                 <p class="mt-4 text-center">
										Already have an account? <a href="
https://sparkolympiads.prod-pathways.net/edifyAssess/SparkLogin.aspx?SchoolId={{request()->segment(2)}}" target="_blank" class="text-primary font-weight-bold">Login Now</a>                                                                                
                                        <!-- <a href="{{ str_replace('/st', '/sl', url()->full()) }}" class="text-primary font-weight-bold">Login Now</a> -->
									</p>

                        <div class="d-flex justify-content-center  mt-3">
                                    <a href="/privacy-policy.php" class="text-muted mx-2 " style="text-decoration: underline;">Privacy Policy</a> | 
                                    <a href="/terms-and-conditions.php" class="text-muted mx-2" style="text-decoration: underline;">Terms & Conditions</a>
                        </div>
                        <p class="text-muted mt-3 mb-0 text-center">SPARK OLYMPIADS © 2025. All rights reserved.</p>


    </div> 
@endsection

@push('scripts')
    <script>
document.querySelector('form').addEventListener('submit', function (e) {
    const admno = document.querySelector('input[name="admno"]').value;
    const validPattern = /^[A-Za-z0-9/-]+$/;
    if (!validPattern.test(admno)) {
        e.preventDefault();
        document.getElementById('mobile-error').textContent = "Only letters, numbers, '/' and '-' are allowed.";
    } else {
        document.getElementById('mobile-error').textContent = "";
    }
});


$(document).ready(function () {
    checkSystem();
});

 async function checkSystem() {
        var finger_print = await getSystemFingerprints();
        $.ajax({
            url: "{{ url('check-system') }}",
            method: 'POST',
            data: {
                hash_key: finger_print.hashKey,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status ==409) {
                    $('.go-text').show();
                }  else {
                    $('.go-button').hide();
                    if (response.return == 'Pass') {
                        $('.go-text').show();
                    } else {
                        $('.go-text').hide();
                    }
                }
            },
            error: function (err) {
                console.error('Genrate Counts', err);
            }
        });
    }

    const getBrowserName = () => {
        const ua = navigator.userAgent;
        if (ua.includes("Edg")) return "Edge";
        if (ua.includes("Chrome")) return "Chrome";
        if (ua.includes("Safari")) return "Safari";
        if (ua.includes("Firefox")) return "Firefox";
        return "Unknown";
    };

    const getOSName = () => {
        const ua = navigator.userAgent;
        if (/Win/.test(ua)) return "Windows";
        if (/Mac/.test(ua)) return "macOS";
        if (/iPhone|iPad|iPod/.test(ua)) return "iOS";
        if (/Android/.test(ua)) return "Android";
        if (/Linux/.test(ua)) return "Linux";
        return "Unknown";
    };

const getSystemFingerprints = async () => {
        const ram = navigator.deviceMemory || 0;
        const ipRes = await fetch('https://api.ipify.org?format=json');
        const ipData = await ipRes.json();
        const cores = navigator.hardwareConcurrency || 'Unknown';
        let status = "Pass";
        if (ram < 4 || screen.width < 1024 || screen.height < 768 || cores < 4) {
            status = "Fail";
        }
        const fingerprint = {
            ip: ipData.ip,
            os: getOSName(),
            browser: getBrowserName(),
            userAgent: navigator.userAgent,
            language: navigator.language,
            platform: navigator.platform,
            resolution: `${screen.width}x${screen.height}`,
            cores: cores,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            ram: ram,
            js_enabled: true,
            status: status
        };
        const hashKey = await generateHash(JSON.stringify(fingerprint));
        fingerprint.hashKey = hashKey;
        return fingerprint;
    };

 const generateHash = async (input) => {
        const encoder = new TextEncoder();
        const data = encoder.encode(input);
        const hashBuffer = await crypto.subtle.digest('SHA-256', data);
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        return hashHex;
    };

</script>


<script>
  const admnoInput = document.getElementById('admno');
  const submitBtn = document.getElementById('submitBtn');

  // Ensure button is disabled by default
  submitBtn.disabled = true;

  admnoInput.addEventListener('keyup', () => {
    if (admnoInput.checkValidity()) {
      submitBtn.disabled = false;
    } else {
      submitBtn.disabled = true;
    }
  });
</script>
@endpush