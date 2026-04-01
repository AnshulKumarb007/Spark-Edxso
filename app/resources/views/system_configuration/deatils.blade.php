<style>
.status-box {
    background-color: #ecf6fc;
    border-radius: 8px;
    padding: 25px 20px;
    text-align: center;
    color: #1abc57;
    font-weight: 600;
    font-size: 18px;
}
.status-box small {
    display: block;
    color: #1abc57;
    font-size: 14px;
    font-weight: 500;
    margin-top: 8px;
}

.status-box-fail {
    background-color: #fdecea;
    border-radius: 8px;
    padding: 25px 20px;
    text-align: center;
    color: #e53935;
    font-weight: 600;
    font-size: 18px;
}
.status-box-fail small {
    display: block;
    color: #e53935;
    font-size: 14px;
    font-weight: 500;
    margin-top: 8px;
}
.btn-custom {
    background-color: #0B66E1;
    border: none;
    color: white;
    font-weight: 600;
    padding: 10px 20px;
    border-radius: 6px;
}
.btn-custom:hover {
    background-color: #FE5D1E;
}
.env-card, .requirements-check {
    background-color: white;
    color: black;
    border-radius: 10px;
    padding: 30px 25px;
    margin-top: 30px;
}
.env-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
}
.env-item {
    background-color: #f6f6f6;
    padding: 12px 18px;
    border-radius: 6px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
}
.env-item span:last-child {
    font-weight: 600;
}
.requirement-box {
    border: 1px solid #e3e3e3;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}
.requirement-box h6 {
    font-weight: 600;
}
.requirement-box ul {
    padding-left: 20px;
    margin: 10px 0;
}
.requirement-box ul li {
    font-size: 14px;
}
.requirement-box p {
    font-size: 14px;
    margin: 0;
}
.compatible-badge {
    float: right;
    color: #1abc57;
    font-weight: 600;
}
@media (max-width: 768px) {
    .btn-group-custom {
    flex-direction: column;
    gap: 10px !important;
    }
    .env-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 5px;
    }
    .compatible-badge {
    float: none;
    display: block;
    margin-top: 10px;
    }
}
</style>
<div class="container-fluid">
    <div class="row">        
        <div class="col-md-12 py-4 px-3">
            @if($return->status == 'Pass')
                <div class="status-box">
                    ✔️ SUCCESS <small>Your system meets all EdAssess requirements for online testing</small>
                </div>
            @else
                <div class="status-box-fail">
                    ❌ FAILURE <small>Your system does not meet EdAssess requirements for online testing</small>
                </div>
            @endif
            <div class="d-flex mt-4 gap-3 btn-group-custom flex-wrap">
                <button class="btn btn-custom">⬇️ DOWNLOAD REPORT</button>
                <button class="btn btn-custom" data-bs-dismiss="modal" aria-label="Close">⬅️ RETURN</button>
            </div>
            <div class="env-card">
                <div class="env-title">System Environment Details</div>
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="env-item"><span>IP Address</span><span id="ip">{{ $return->ip }}</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="env-item"><span>Display Resolution</span><span id="res">{{ $return->resolution }}</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="env-item"><span>Browser</span><span id="browser">{{ $return->browser }}</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="env-item"><span>Platform</span><span id="platform">{{ $return->os }}</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="env-item"><span>JavaScript</span><span>{{ $return->js_enabled }}</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="env-item"><span>System RAM</span><span id="ram">{{ $return->ram }} GB</span></div>
                    </div>
                </div>
            </div>
            @php
                use Carbon\Carbon;

                $os = strtolower($return->os);
                $isOSCompatible = str_contains($os, 'windows') && preg_match('/\b10\b|\b11\b/', $os)
                                || str_contains($os, 'mac') && preg_match('/\b11\b|\b12\b|\b13\b/', $os)
                                || str_contains($os, 'ios') && intval(preg_replace('/\D/', '', $os)) >= 16
                                || str_contains($os, 'chrome');

                $browser = strtolower($return->browser);
                $isBrowserCompatible = str_contains($browser, 'chrome') || str_contains($browser, 'edge') || str_contains($browser, 'safari');

                $isJSCompatible = strtolower($return->js_enabled) === 'true';

                preg_match('/(\d+)\s*[xX]\s*(\d+)/', $return->resolution, $resMatches);
                $isResCompatible = isset($resMatches[1], $resMatches[2]) && $resMatches[1] >= 1024 && $resMatches[2] >= 768;

                $isRamCompatible = $return->ram >= 4;

                $createdDate = Carbon::parse($return->created_date);
                $isDateCompatible = $createdDate->isBetween(now()->subDays(30), now()); // within last 30 days
            @endphp

            <div class="requirements-check">
                <div class="env-title">EdAssess Requirements Check</div>
                <div class="requirement-box">
                    <h6>Operating Systems
                        <span class="compatible-badge">
                            {{ $isOSCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Windows 10 or higher</li>
                        <li>macOS 11 or higher</li>
                        <li>iOS 16 or higher</li>
                        <li>Chrome OS (Managed Chromebook required for secure testing)</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isOSCompatible ? '#1abc57' : '#e53935' }}" id="platformCheck">{{ $return->os }}</span>
                    </p>
                </div>
                <div class="requirement-box">
                    <h6>Web Browsers
                        <span class="compatible-badge">
                            {{ $isBrowserCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Microsoft Edge (Windows)</li>
                        <li>Safari (macOS, iOS)</li>
                        <li>Chrome (All OS)</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isBrowserCompatible ? '#1abc57' : '#e53935' }}" id="browserCheck">{{ $return->browser }}</span>
                    </p>
                </div>
                <div class="requirement-box">
                    <h6>JavaScript
                        <span class="compatible-badge">
                            {{ $isJSCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Must be enabled</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isJSCompatible ? '#1abc57' : '#e53935' }}">{{ $return->js_enabled }}</span>
                    </p>
                </div>
                <div class="requirement-box">
                    <h6>Screen Resolution
                        <span class="compatible-badge">
                            {{ $isResCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Minimum 1024×768 (common to all OS)</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isResCompatible ? '#1abc57' : '#e53935' }}" id="resCheck">{{ $return->resolution }}</span>
                    </p>
                </div>
                <div class="requirement-box">
                    <h6>System RAM
                        <span class="compatible-badge">
                            {{ $isRamCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Minimum 4GB required</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isRamCompatible ? '#1abc57' : '#e53935' }}" id="ramCheck">{{ $return->ram }} GB</span>
                    </p>
                </div>
                <div class="requirement-box">
                    <h6>Test Date
                        <span class="compatible-badge">
                            {{ $isDateCompatible ? '✔️ Compatible' : '❌ Not Compatible' }}
                        </span>
                    </h6>
                    <strong>Requirements:</strong>
                    <ul>
                        <li>Test must be taken within the last 30 days</li>
                    </ul>
                    <p><strong>Your System:</strong>
                        <span style="color: {{ $isDateCompatible ? '#1abc57' : '#e53935' }}" id="dateCheck">
                            {{ $createdDate->format('n/j/Y, g:i:s A') }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="env-card">
                <div class="env-title">Test Summary</div>
                <div class="env-item">
                    <span>Test Date:</span>
                    <span id="date">{{ \Carbon\Carbon::parse($return->created_date)->format('n/j/Y, g:i:s A') }}</span>
                </div>
                <div class="env-item"><span>Overall Status:</span><span style="color: #1abc57; font-weight: 700;">{{ $return->status }}</span></div>
                @if($return->status == 'Pass')
                    <div class="env-item"><span>Requirements Met:</span><span style="color: #1abc57;">Yes</span></div>
                @else
                    <div class="env-item"><span>Requirements Met:</span><span style="color: #1abc57;">No</span></div>
                @endif
            </div>
        </div>
    </div>
</div>