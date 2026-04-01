<style>
    .card-custom {
        background-color: #1e293b;
        border: none;
        border-radius: 10px;
        padding: 20px;
    }
    .progress {
        height: 6px;
    }
    .step {
        padding: 10px 0;
        border-bottom: 1px solid #334155;
    }
    .step:last-child {
        border-bottom: none;
    }
    .status {
        float: right;
        font-weight: 500;
    }
    .text-green {
        color: #22c55e;
    }
    .text-blue {
        color: #60a5fa;
    }
    .system-info {
        font-size: 14px;
        background-color: #1e293b;
        padding: 15px;
        border-radius: 10px;
    }
    .loader-container {
        position: relative;
    }
    .spinner-border {
        width: 3rem;
        height: 3rem;
    }
    .bg-success {
        background-color: #0B66E1 !important;
    }
</style>
<div class="container">
    <input type="hidden" id="PreAssessmentID" value="{{ $PreAssessmentID }}">
    <div class="text-center text-secondary mb-4">
        <h6>Testing System Check's system compatibility</h6>
    </div>
    <div class="card-custom mb-4">
        <div class="d-flex justify-content-between mb-2">
            <strong>Overall Progress</strong>
            <span id="progressLabel">0%</span>
        </div>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" id="progressBar" style="width: 0%;"></div>
        </div>
    </div>
    <div class="card-custom mb-4 loader-container">
        <div class="loader-overlay" id="loader">
            <div class="text-center">
                <div class="spinner-border text-success" role="status"></div>
                <p class="mt-3 text-white">System check started...</p>
            </div>
        </div>
        <h6 class="text-white">Test Steps</h6>
        <div class="step">System Detection <span class="status" id="status1">Running...</span></div>
        <div class="step">Browser Compatibility <span class="status" id="status2">Pending</span></div>
        <div class="step">Resolution Check <span class="status" id="status3">Pending</span></div>
        <div class="step">JavaScript Check <span class="status" id="status4">Pending</span></div>
        <div class="step">Final Validation <span class="status" id="status5">Pending</span></div>
    </div>

    <div class="system-info">
        <strong>System Information:</strong><br>
        Platform: <span id="os"></span><br>
        Browser: <span id="browser"></span><br>
        Resolution: <span id="resolution"></span><br>
        JavaScript: Enabled
    </div>
</div>