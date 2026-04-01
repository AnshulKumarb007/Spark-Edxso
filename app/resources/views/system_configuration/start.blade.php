<style>
    .status-badge {
        background-color: #0B66E1;
        color: white;
        border-radius: 30px;
        padding: 5px 15px;
        margin-top: 20px;
        display: inline-block;
    }
    .main-container {
        border-radius: 10px;
        padding: 40px 20px;
        margin-top: 30px;
    }
    .section-subtext {
        color: #fff;
    }
    .card-custom {
        background-color: #101c28;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        padding: 20px;
        color: #ffffff;
        height: 100%;
    }
    .badge-essential,
    .badge-recommended {
        font-size: 0.75rem;
        border-radius: 20px;
        padding: 5px 10px;
        background-color: transparent;
        border: 1px solid #00ff8a;
        color: #00ff8a;
    }
    .btn-custom {
        background-color: #0B66E1;
        border: none;
        color: white;
        border-radius: 10px;
        padding: 10px 20px;
        margin-top: 15px;
        width: 100%;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #FE5D1E;
    }
</style>
<div class="container text-center mb-1">
    <input type="hidden" id="PreAssessmentID">
    <div class="status-badge">⚡ System Ready • IP: 122.162.149.84</div>
    <span class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right;cursor: pointer;background: black;padding: 5px;border-radius: 30px;margin-top: 12px;"><i class="fas fa-times fs-5 text-white" style="width: 21px;height: 10px;"></i></span>
    <div class="main-container">
        <h2 class="section-title" style="font-size: 2rem;font-weight: 700;color: #fff;">Pre-Assessment Verification</h2>
        <p class="section-subtext">Ensure your device and network are optimized for seamless online testing.
            Complete<br>all verification steps before your scheduled examination.</p>

        <div class="row mt-4">
            <!-- Device Verification -->
            <div class="col-md-6 mb-4">
                <div class="card-custom text-start">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="mb-0 text-white">Device Verification</h5>
                        <span class="badge-essential">Essential</span>
                    </div>
                    <div class="text-white float-left">Comprehensive system analysis</div>
                    <br/>
                    <p class="mt-2 text-white" style="text-align: left;">
                        Perform a complete device assessment to ensure compatibility with online testing platforms.
                        This verification checks hardware specifications, browser capabilities, and security
                        requirements.
                    </p>
                    <a data-bs-dismiss="modal" aria-label="Close" onclick="testpc()" class="btn btn-custom">🛡️ Start OS and Browser Check</a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card-custom text-start">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="mb-0 text-white">Network Analysis</h5>
                        <span class="badge-recommended">Recommended</span>
                    </div>
                    <div class="text-white float-left">Network speed and quality testing</div>
                    <br/>
                    <p class="mt-2 text-white" style="text-align: left;">
                        Test your network performance and connection quality. Analyzes download/upload speeds and
                        network stability for optimal exam experience.
                    </p>
                    <button class="btn btn-custom">📶 Run Network Test</button>
                </div>
            </div>
        </div>
    </div>
</div>