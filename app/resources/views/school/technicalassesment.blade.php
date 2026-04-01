@extends('layouts.school')
@section('content')
<style>
    .services-list a.active {
        font-weight: bold;
        color: #0d6efd;
    }
    .card-style {
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 8px;
        background-color: #fff;
        margin-bottom: 15px;
    }
    .lab-checkbox-grid {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .checkbox-row {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
    }
    .checkbox-container {
        position: relative;
        width: 100%;
        height: 35px;
    }
    .checkbox-container input[type="checkbox"] {
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        position: absolute;
        left: 0;
        top: 0;
        z-index: 2;
    }
    .check-icon {
        width: 100%;
        cursor: pointer;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 11px;
        background-color: #f0f0f0;
        border-radius: 5px;
        color: red;
        z-index: 1;
    }
    /* .check-icon.checked {
        color: green;
    } */
    .checkbox-container {
        display: inline-block;
        margin: 4px;
        margin-bottom: 20px;
    }
    .checkbox-container input[type="checkbox"] {
        display: none;
    }
    .check-icon {
        display: inline-block;
        width: 62px;
        height: 34px;
        line-height: 30px;
        text-align: center;
        border-radius: 4px;
        background-color: #f0f0f0;
        font-weight: bold;
        color: black;
        transition: background-color 0.2s;
    }
    /* .check-icon.checked {
        background-color: #4CAF50;
        color: white;
    } */
    .checked {
        color: green;
    }
    .unchecked {
        color: red;
    }
    .checkbox-container small{
        font-weight: 600 !important;
        color: black;
    }
    #preloader {
        position: fixed;
        inset: 0;
        z-index: 999999;
        overflow: hidden;
        background: var(--background-color);
        transition: all 0.6s ease-out;
        display: none;
    }
    #preloader:before {
        content: "";
        position: fixed;
        top: calc(50% - 30px);
        left: calc(50% - 30px);
        border: 6px solid #ffffff;
        border-color: var(--accent-color) transparent var(--accent-color) transparent;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: animate-preloader 1.5s linear infinite;
    }
    @keyframes animate-preloader {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


    
    .text-blue{
        color: rgb(60, 60, 219);
    }
    .text-green{
        color: rgb(11, 146, 11);
    }
    .text-red{
        color: rgb(199, 9, 9);
    }
    .progress-circle {
      position: relative;
      width: 150px;
      height: 150px;
    }

    .progress-circle svg {
      transform: rotate(-90deg);
    }

    .progress-circle circle {
      fill: none;
      stroke-width: 12;
    }

    .circle-bg {
      stroke: #dbe4f0;
    }

    .circle-fg {
      stroke: #1f4e98;
      stroke-linecap: round;
      stroke-dasharray: 440;
      stroke-dashoffset: 440;
      transition: stroke-dashoffset 0.5s ease;
    }

    .progress-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: #0d0d0d;
    }

    .success-button {
        width: 160px;;
        height: 160px;;
        border-radius: 50%;
        background:radial-gradient(circle at center, #03B163 0%, #034e17 100%);
        color: white;
        font-size: 22px;
        font-weight: bold;
        border: 10px solid #03B163;
        cursor: pointer;
    }
    .success-button::before {
        content: "";
        position: absolute;
        top: 165px;
        left: 21%;
        transform: translateX(-50%);
        width: 150px;
        height: 50px;
        background-image: url('{{ asset("admin/images/Frame 14.svg") }}');
        background-size: contain;
        background-repeat: no-repeat;
        margin-left: -24px;
    }
    .failed-button {
        width: 220px;;
        height: 220px;;
        border-radius: 50%;
        background:radial-gradient(circle at center, #f75858 0%, #760000 100%);
        color: white;
        font-size: 40px;
        font-weight: bold;
        border: 10px solid #f36e6e;
        cursor: pointer;
    }
    .go-button {
      width: 160px;;
      height: 160px;;
      border-radius: 50%;
      background: radial-gradient(circle at center, #0d4ba0 0%, #1c2848 100%);
      color: white;
      font-size: 40px;
      font-weight: bold;
      border: 10px solid #a5c9f5;
      cursor: pointer;
    }
  </style>
</style>
<div id="preloader"></div>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5>Lab Certification</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="process-section">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <h5 class="my-font-weight2">Process</h5>
                                            <p class="my-font-weight">Follow this step-by-step process to get SPARK Lab certified. Ensure all listed conditions are met before launching the exam:</p>
                                            <ul>
                                                <li>Verify system configuration</li>
                                                <li>Ensure internet stability</li>
                                                <li>Confirm secure access</li>
                                                <li>Certify computers through the tool</li>
                                            </ul>
                                            <div class="text-right mt-4">
                                                <button class="btn btn-warning btn-sm" onclick="goToSpecifications()">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="specifications-section" style="display: none;">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <h5 class="my-font-weight2">Desired Specifications</h5>
                                            <p class="my-font-weight">Ensure all listed conditions are met before launching the exam:</p>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h6 class="font">Windows 10 or higher</h4>
                                                    <ul class="font">
                                                        <li>Microsoft Edge</li>
                                                        <li>Chrome</li>
                                                        <li>JavaScript must be enabled</li>
                                                        <li>Minimum Screen Resolution: 1024 × 768</li>
                                                    </ul>
                                                    <h6 class="font">Mac OS 11 or higher</h4>
                                                    <ul class="font">
                                                        <li>Safari</li>
                                                        <li>Chrome</li>
                                                        <li>JavaScript must be enabled</li>
                                                        <li>Minimum Screen Resolution: 1024 x 768</li>
                                                    </ul>
                                                    <h6 class="font">Chrome OS (Chromebooks)</h4>
                                                    <ul class="font">
                                                        <li>Chrome</li>
                                                        <li>Managed Chromebook required for secure testing
                                                        </li>
                                                        <li>Recommended Screen Resolution: 1366 x 768</li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h6 class="font">RAM</h4>
                                                    <ul class="font">
                                                        <li>4 GB RAM or more</li>
                                                    </ul>
                                                    <h6 class="font">Internet/Network</h4>
                                                    <ul class="font">
                                                        <li>High Speed Internet connection required</li>
                                                        <li>10 Mbps per user</li>
                                                        <li>100 users × 10 Mbps/user = 1000 Mbps or 1 Gbps Total Network</li>
                                                    </ul>
                                                    <h6 class="font">Wireless Guidelines</h4>
                                                    <ul class="font">
                                                        <li>Recommended Download Speed: 10–15 Mbps per user
                                                        </li>
                                                        <li>Recommended Upload Speed: 3–5 Mbps per user</li>
                                                        <li>Wi-Fi should support many simultaneous connections</li>
                                                    </ul>
                                                    <p class="font"><b>Note:</b> Browsers not using TLS 1.2+ will not access EdAssess. Phones are not supported.</p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mt-4">
                                                <button class="btn btn-secondary" onclick="goBackToProcess()">Back</button>
                                                <button class="btn btn-warning btn-sm" onclick="goToLaunchCertification()">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="launch-section" style="display: none;">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="card card-social">
                                        <div class="card-block">
                                            <h5 class="my-font-weight2">Launch Certification </h5>
                                            <p class="my-font-weight">Begin your SPARK Lab Certification by selecting and verifying the computers you plan to use for the exam. The tool will check technical readiness and mark eligible systems for exam day.</p>
                                            <ul class="nav nav-tabs" role="tablist">
                                                @for ($i = 0; $i < $enrollment_details->total_com_labs; $i++)
                                                    <li class="nav-item">
                                                        <a class="nav-link text-uppercase {{ $i == 0 ? 'active' : '' }}"
                                                            id="tab-{{ $i }}-tab" data-toggle="tab" href="#tab-{{ $i }}"
                                                            role="tab" aria-controls="tab-{{ $i }}"
                                                            aria-selected="{{ $i == 0 ? 'true' : 'false' }}" onclick="checkCounts('Lab{{$i+1}}');">
                                                            Lab - {{ $i + 1 }}
                                                        </a>
                                                    </li>
                                                @endfor
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                @for ($i = 0; $i < $enrollment_details->total_com_labs; $i++)
                                                    @php $lab_name = 'Lab'.($i+1); @endphp
                                                    <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}" id="tab-{{ $i }}" role="tabpanel" aria-labelledby="tab-{{ $i }}-tab">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <h3 style="font-family: Montserrat;font-weight: 700;font-style: Bold;font-size: 28px;leading-trim: NONE;line-height: 70px;letter-spacing: 0%;">SPARK Lab Certification</h3>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div style="display: flex !important;align-items: center;">
                                                                    <img style="width: 165px;height: 165px;top: 492.24px;left: 346.17px;angle: 0 deg;opacity: 1;" src="{{ asset('admin/images/Isolation_Mode.svg') }}">
                                                                    <div>
                                                                        <h1 class="genrate_counts"></h1>
                                                                        <p style="font-family: Montserrat;font-weight: 500;font-style: Italic;font-size: 22px;leading-trim: NONE;letter-spacing: 0%;text-transform: capitalize;color:#EB6432">{{ 'Lab: ' . $i + 1 }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 @if(genrate_box($lab_name)['labs'] < 1) d-none @endif">
                                                                <a href="javascript:void(0)">
                                                                    <div id="meter-{{ $i+1 }}" class="progress-circle" style="display: none;">
                                                                        <svg width="160" height="160">
                                                                            <circle class="circle-bg" cx="75" cy="75" r="70"/>
                                                                            <circle class="circle-fg" id="circle-fg-{{ $i+1 }}" cx="75" cy="75" r="70"/>
                                                                        </svg>
                                                                        <div class="progress-text" id="progressText-{{ $i+1 }}">0%</div>
                                                                    </div>
                                                                </a>
                                                                <input type="hidden" name="labs" id="labs-{{ $i+1 }}" value="{{ $lab_name }}">
                                                                <button id="goBtn-{{ $i+1 }}" data-labs="{{ $lab_name }}" class="go-button" style="display: none">GO</button>
                                                                <button class="failed-button" style="display: none">FAIL</button>
                                                                <button class="success-button" style="display: none">EdAssess Certified</button>
                                                                <div id="systemInfo-{{ $i+1 }}" class="row" style="margin-top: 20px;display:none">
                                                                    <ul class="col-md-6">
                                                                        <li><strong>OS:</strong> <span id="os-{{ $i+1 }}">-</span></li>
                                                                        <li><strong>Browser:</strong> <span id="browser-{{ $i+1 }}">-</span></li>
                                                                    </ul>
                                                                    <ul class="col-md-6">
                                                                        <li><strong>Resolution:</strong> <span id="resolution-{{ $i+1 }}">-</span></li>
                                                                        <li><strong>Ram:</strong> <span id="ram-{{ $i+1 }}">-</span></li>
                                                                    </ul>
                                                                    <ul class="col-md-6">
                                                                        <li><strong>Ram:</strong> <span id="status2-{{ $i+1 }}" class="status">-</span></li>
                                                                        <li><strong>Resolution:</strong> <span id="status3-{{ $i+1 }}" class="status">-</span></li>
                                                                        <li><strong>Browser:</strong> <span id="status4-{{ $i+1 }}" class="status">-</span></li>
                                                                    </ul>
                                                                    <ul class="col-md-6">
                                                                        <li><strong>OS:</strong> <span id="status1-{{ $i+1 }}" class="status">-</span></li>
                                                                        <li><strong>IP Address:</strong> <span id="ipaddress-{{ $i+1 }}" class="status">-</span></li>
                                                                        <li><strong>JS Enabled:</strong> <span id="status5-{{ $i+1 }}" class="status">-</span></li>
                                                                        <li class="d-none"><strong>Cores:</strong> <span id="status6-{{ $i+1 }}" class="status">-</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-secondary" onclick="goBackToSpecifications()">Back</button>
                                                <a href="" id="downloadReportBtn" class="btn btn-warning btn-sm" style="display: none;">Download Failed Report</a>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function goToSpecifications() {
                                document.getElementById("process-section").style.display = "none";
                                document.getElementById("specifications-section").style.display = "block";
                            }
                            function goBackToProcess() {
                                document.getElementById("specifications-section").style.display = "none";
                                document.getElementById("process-section").style.display = "block";
                            }
                            function goToLaunchCertification() {
                                document.getElementById("specifications-section").style.display = "none";
                                document.getElementById("launch-section").style.display = "block";
                            }
                            function goBackToSpecifications() {
                                document.getElementById("launch-section").style.display = "none";
                                document.getElementById("specifications-section").style.display = "block";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="PreAssessmentModal" tabindex="-1" aria-labelledby="PreAssessmentModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="PreAssessmentContainer" style="background: linear-gradient(to bottom right, #FE5D1E, #0B66E1);">
        </div>
    </div>
</div>
<div class="modal fade" id="AssessmentTestModal" tabindex="-1" aria-labelledby="AssessmentTestModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body" id="AssessmentTestContainer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AssessmentDeatilsModal" tabindex="-1" aria-labelledby="AssessmentDeatilsModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">-
                <span class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;cursor: pointer;background: black;padding: 5px;border-radius: 30px;"><i class="fas fa-times fs-5 text-white" style="width: 21px;height: 10px;"></i></span>
            </div>
            <div class="modal-body" id="AssessmentDeatilsContainer">
            </div>
        </div>
    </div>
</div> --}}
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(window).on('load', function () {
        checkCounts('Lab1');
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
                if (response.SystemCheck_faild == 0) {
                    $('.go-button').show();
                }else if (response.SystemCheck_faild == 1) {
                    const reportUrl = "{{ url('download-system-report') }}?hashke=" + finger_print.hashKey;
                            $('#downloadReportBtn')
                                .attr('href', reportUrl)
                                .attr('target', '_blank') // ensures it opens in new tab
                                .show();
                    $('.go-button').show()
                    .attr(
                        'style',
                        'display: inline-block !important; ' +
                        'background: radial-gradient(circle at center, #f75858 0%, #760000 100%) !important; ' +
                        'border: 10px solid #f36e6e !important; ' +
                        'color: white !important;' +
                        'font-size: 23px !important;'
                    )
                    .text('FAILED Try Again');
                } else {
                    $('.go-button').hide();
                    if (response.return == 'Pass') {
                        $('.success-button').show();
                    } else {
                        $('.failed-button').show();
                    }
                }
            },
            error: function (err) {
                console.error('Genrate Counts', err);
            }
        });
    }

    function checkCounts(labs = null) {
        let labname = labs ? labs : $('#labs-1').val();
        $.ajax({
            url: "{{ url('start-assesment') }}",
            method: 'POST',
            data: {
                labname: labname,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == 200) {
                    var labs = response.data.labs;
                    var count = response.data.count;
                    $('.genrate_counts').text(`${count}/${labs}`);
                    if (parseInt(count) === parseInt(labs)) {
                        $('.go-button').hide();
                    }
                }
            },
            error: function (err) {
                console.error('Genrate Counts', err);
            }
        });
    }
    $(document).ready(function () {
        $('.go-button').each(function () {
            const goBtn = $(this);
            const labName = goBtn.data('labs');
            const index = goBtn.attr('id').split('-')[1] || '';


            const fgCircle = document.querySelector(`#circle-fg-${index}`);
            const progressText = document.querySelector(`#progressText-${index}`);
            const totalLength = 440;

            const updateProgress = (percent) => {
                const offset = totalLength - (totalLength * percent / 100);
                if (fgCircle) fgCircle.style.strokeDashoffset = offset;
                if (progressText) {
                    progressText.innerHTML = `${percent}%<br><small>${percent > 99 ? 'COMPLETED' : 'PLEASE WAIT...'}</small>`;
                }
            };
            
            goBtn.on('click', function () {
                $('#meter-' + index).show();
                $('#goBtn-' + index).hide();
                $('#systemInfo-' + index).show();
                runSystemCheck(labName,index,updateProgress);
            });
        });
    });

    const wait = (ms) => new Promise(r => setTimeout(r, ms));

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

    const updateStatus = (id, status, colorClass) => {
        const el = document.getElementById(id);
        el.textContent = status;
        el.className = `status ${colorClass}`;
    };

    const generateHash = async (input) => {
        const encoder = new TextEncoder();
        const data = encoder.encode(input);
        const hashBuffer = await crypto.subtle.digest('SHA-256', data);
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        return hashHex;
    };

    const getSystemFingerprints = async () => {
        const ram = navigator.deviceMemory || 0;
        const ipRes = await fetch('https://api.ipify.org?format=json');
        const ipData = await ipRes.json();
        const cores = navigator.hardwareConcurrency || 'Unknown';
        let status = "Fail";
        // if (ram < 5 || screen.width < 1025 || screen.height < 769 || cores < 5) {

        // if (ram < 5 || screen.width < 1025 || screen.height < 769) {
        //     status = "Fail";
        // }
        if (ram >= 4 && screen.width >= 1024 && screen.height >= 768) {
            status = "Pass";
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

    const getSysteIp = () => {
        return fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => data.ip)
            .catch(error => {
                console.error('Error fetching IP:', error);
                return false;
            });
    };

    const checkIfTestAlreadyDone = async (hashKey) => {
        return $.ajax({
            url: "{{ url('check-system') }}",
            method: 'POST',
            data: {
                hash_key: hashKey,
                _token: '{{ csrf_token() }}'
            }
        });
    };

    const runSystemCheck = async (labs = '', index = '',updateProgress) => {
        let fingerprint = await getSystemFingerprints();
        let hashKey = fingerprint.hashKey;
        console.log(fingerprint);
        try {
            const check = await checkIfTestAlreadyDone(hashKey);
            if (check.status === 409) {
                Swal.fire({
                    title: 'Error!',
                    text: '⚠️ System test already completed on this device.',
                    icon: 'error',
                });
                return;
            }
        } catch (err) {
            console.error('Check error:', err);
            return;
        }

        // === STATUS 1: OS Check ===
        updateStatus("status1-"+index, "Running...", "text-blue");
        await wait(1000);
        document.getElementById("os-"+index).textContent = fingerprint.os;

        const validOS = ["Windows", "macOS", "Linux"];
        updateStatus("status1-"+index, validOS.includes(fingerprint.os) ? "Pass" : "Fail", validOS.includes(fingerprint.os) ? "text-green" : "text-red");
        updateProgress(20);

        // === STATUS 2: RAM Check ===
        updateStatus("status2-"+index, "Running...", "text-blue");
        await wait(1500);
        document.getElementById("resolution-"+index).textContent = fingerprint.resolution;

        updateStatus("status2-"+index, fingerprint.ram >= 8 ? "Pass" : "Fail", fingerprint.ram >= 8 ? "text-green" : "text-red");
        document.getElementById("ram-"+index).textContent = fingerprint.ram;


        getSysteIp().then(ip => {
            document.getElementById("ipaddress-"+index).textContent = ip || 'IP not found';
        });
        updateProgress(40);

        // === STATUS 3: Resolution Check ===
        updateStatus("status3-"+index, "Running...", "text-blue");
        await wait(2000);

        const screenOK = screen.width >= 1024 && screen.height >= 768;
        updateStatus("status3-"+index, screenOK ? "Pass" : "Fail", screenOK ? "text-green" : "text-red");
        updateProgress(60);

        // === STATUS 4: Browser Check ===
        updateStatus("status4-"+index, "Running...", "text-blue");
        await wait(2500);
        document.getElementById("browser-"+index).textContent = fingerprint.browser;

        const supportedBrowsers = ["Chrome", "Firefox", "Edge"];
        updateStatus("status4-"+index, supportedBrowsers.includes(fingerprint.browser) ? "Pass" : "Fail", supportedBrowsers.includes(fingerprint.browser) ? "text-green" : "text-red");
        updateProgress(80);

        // === STATUS 5: JavaScript Enabled ===
        updateStatus("status5-"+index, "Running...", "text-blue");
        await wait(3000);
        updateStatus("status5-"+index, "Pass", "text-green");
        updateProgress(100);

        updateStatus("status6-"+index, "Running...", "text-blue");
        await wait(3500);
        updateStatus("status6-"+index, "Pass", "text-green");
        updateProgress(100);

        updateStatus("status6-"+index, fingerprint.cores, "text-green");
        updateProgress(100);

        $.ajax({
            url: "{{ url('store-assesment') }}",
            method: 'POST',
            data: {
                labs: labs,
                hash_key: hashKey,
                os: fingerprint.os,
                browser: fingerprint.browser,
                resolution: fingerprint.resolution,
                ram: fingerprint.ram,
                js_enabled: fingerprint.js_enabled,
                status: fingerprint.status,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if(response.status==200){
                    $('#meter-' + index).hide();
                    $('#goBtn-' + index).hide();
                    $('#systemInfo-' + index).hide();

                    checkCounts('Lab'+index);
                    checkSystem();
                    $('#downloadReportBtn').hide();
                }else{
                    $('#meter-' + index).hide();
                    $('#goBtn-' + index).show();
                    $('#systemInfo-' + index).hide();
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                    });
                }
                // Swal.fire({
                //     title: 'Success!',
                //     text: response.message,
                //     icon: 'success',
                //     confirmButtonText: 'OK'
                // });
            },
            error: function (err) {
                console.error('❌ System check save error:', err);
                Swal.fire({
                    title: 'Error!',
                    text: '❌ System check save error',
                    icon: 'error',
                });
            }
        });
    };
</script>
@endpush