<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: Arial, sans-serif;
  font-size: 11px;
  color: #1e293b;
  background: #fff;
}

/* ── Cover Page ── */
.cover-page {
  text-align: center;
  padding: 60px 40px 40px;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.cover-logo { width: 180px; margin-bottom: 30px; }
.cover-indias-first {
  color: #1A4FB5;
  font-size: 22px;
  font-weight: bold;
  font-family: Georgia, serif;
  border: 1px solid #8fb1cf;
  padding: 6px 16px 10px;
  display: inline-block;
  margin-bottom: 0;
}
.cover-olympiad {
  font-size: 26px;
  font-weight: bold;
  color: #E8500A;
  font-family: Georgia, serif;
  border: 2px solid #8fb1cf;
  border-top: none;
  padding: 8px 16px 12px;
  margin-bottom: 30px;
}
.cover-school { font-size: 16px; font-weight: bold; color: #333; margin-bottom: 6px; }
.cover-title  { font-size: 22px; font-weight: bold; color: #111; font-family: Georgia, serif; margin-bottom: 40px; }

.cover-divider {
  display: table;
  width: 100%;
  margin-bottom: 24px;
}
.cover-divider-line { display: table-cell; border-top: 1px solid #999; vertical-align: middle; }
.cover-divider-text { display: table-cell; padding: 0 12px; color: #555; font-size: 13px; white-space: nowrap; vertical-align: middle; }

.cover-logos-row { width: 100%; margin-bottom: 40px; }
.cover-logos-row table { width: 100%; }
.cover-logos-row td { text-align: center; vertical-align: top; padding: 0 20px; }
.cover-logos-row img { height: 36px; width: auto; margin-bottom: 8px; }
.cover-logos-row p { font-size: 11px; color: #333; line-height: 1.5; }

.cover-footer {
  border-top: 1px solid #ccc;
  width: 100%;
  padding-top: 12px;
  margin-top: auto;
  text-align: center;
}
.cover-footer p { font-size: 10px; color: #444; line-height: 1.6; }

/* ── Page Break ── */
.page-break {
  page-break-before: always;
  break-before: page;
}

/* ── Report Header ── */
.report-header {
  border-bottom: 2px solid #0c4bad;
  padding-bottom: 8px;
  margin-bottom: 16px;
  display: table;
  width: 100%;
}
.report-header img { height: 28px; width: auto; }

/* ── Section Headings ── */
h1 { font-size: 17px; font-weight: bold; color: #000; margin-bottom: 12px; }
h2 { font-size: 14px; font-weight: 700; color: #000; margin: 16px 0 6px; }
h3 { font-size: 12px; font-weight: 700; margin: 12px 0 5px; }
p  { font-size: 11px; line-height: 1.5; margin-bottom: 8px; }

/* ── Grade Header ── */
.grade-header {
  background-color: #f0f0f0;
  padding: 7px 14px;
  margin: 16px 0 8px;
  border: 1px solid #ddd;
  font-weight: bold;
  font-size: 13px;
}

/* ── Split Box ── */
.split-box {
  width: 100%;
  border: 1px solid #999;
  margin-bottom: 16px;
}
.split-box table { width: 100%; border-collapse: collapse; }
.split-left-cell {
  width: 42%;
  border-right: 1px solid #999;
  padding: 12px;
  vertical-align: top;
  background: #fff;
}
.split-right-cell {
  vertical-align: top;
  padding: 12px 16px;
  font-size: 10px;
  line-height: 1.5;
}

/* ── Chart images ── */
.chart-img { width: 100%; height: auto; display: block; }
.chart-placeholder {
  width: 100%;
  height: 160px;
  background: #f8f8f8;
  border: 1px dashed #ccc;
  text-align: center;
  padding-top: 60px;
  font-size: 10px;
  color: #999;
}

/* ── Legend Table ── */
.legend-table { width: 100%; border-collapse: collapse; font-size: 9px; margin-top: 6px; }
.legend-table td { border: 1px solid #ccc; padding: 2px 5px; text-align: center; }
.legend-swatch {
  display: inline-block;
  width: 12px; height: 10px;
  margin-right: 3px;
  vertical-align: middle;
}

/* ── Performance Band Colors ── */
.band-red        { background-color: #e53935; color: #fff; font-weight: 600; }
.band-orange     { background-color: #fb8c00; color: #fff; font-weight: 600; }
.band-blue       { background-color: #1e88e5; color: #fff; font-weight: 600; }
.band-lightgreen { background-color: #66bb6a; color: #fff; font-weight: 600; }
.band-green      { background-color: #2e7d32; color: #fff; font-weight: 600; }

/* ── Tables ── */
.highlights-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 9px;
  margin-top: 8px;
}
.highlights-table th {
  background: #add8e6;
  padding: 5px 6px;
  border: 1px solid #aab;
  font-weight: 700;
  vertical-align: bottom;
  font-size: 9px;
}
.highlights-table td {
  padding: 4px 6px;
  border: 1px solid #ccc;
  vertical-align: top;
  line-height: 1.4;
  font-size: 9px;
}
.highlights-table tr { page-break-inside: avoid; }

/* ── Footer ── */
.pdf-footer {
  border-top: 1px solid #ccc;
  padding-top: 8px;
  margin-top: 20px;
  font-size: 8px;
  color: #666;
  text-align: center;
}

hr { border: none; border-top: 1px dashed #ddd; margin: 12px 0; }

* {
  -webkit-print-color-adjust: exact !important;
  print-color-adjust: exact !important;
  color-adjust: exact !important;
}
</style>
</head>
<body>

<!-- ══════════════════════════════════════════
     COVER PAGE
     ══════════════════════════════════════════ -->
<div class="cover-page">

  <img src="https://sparkolympiads.com/app/web/logo.svg" class="cover-logo" alt="Spark Olympiads"/>

  <div class="cover-indias-first">India's First</div>
  <div class="cover-olympiad">Competency Based Online Olympiad</div>

  <div class="cover-school">{{ $schoolSubjects->flatten()->pluck('school_name')->unique()->implode(', ') }}</div>
  <div class="cover-title">Olympiad Report</div>

  <table style="width:60%; margin:0 auto 20px; border-collapse:collapse;">
    <tr>
      <td style="border-top:1px solid #999; width:45%;"></td>
      <td style="text-align:center; padding:0 12px; white-space:nowrap; color:#555; font-size:12px;">By</td>
      <td style="border-top:1px solid #999; width:45%;"></td>
    </tr>
  </table>

  <div class="cover-logos-row">
    <table>
      <tr>
        <td>
          <img src="https://sparkolympiads.com/app/web/logo.svg" alt="Spark Logo"/><br>
          <p>India's Premier<br>Education Consultants</p>
        </td>
        <td>
          <img src="https://sparkolympiads.com/app/web/logo.svg" alt="Prometric"/><br>
          <p>Global Leaders in Secure<br>Large Scale Online Testing</p>
        </td>
      </tr>
    </table>
  </div>

  <div class="cover-footer">
    <p>For More Information, Contact:<br>reachout@sparkolympiads.com &nbsp;|&nbsp; +91 84474 77275</p>
  </div>

</div>


<!-- ══════════════════════════════════════════
     MAIN REPORT — PAGE 2+
     ══════════════════════════════════════════ -->
<div class="page-break"></div>

<!-- Report Header (shows on all content pages) -->
<div class="report-header">
  <img src="https://sparkolympiads.com/app/web/logo.svg" alt="Spark Olympiad"/>
</div>

<h1>School Performance Report: SparkOlympiad</h1>
<h2>{{ $schoolSubjects->flatten()->pluck('school_name')->unique()->implode(', ') }}</h2>

<p>Dear School Leader,</p>
<p>We are pleased to share the results for Spark Olympiad 2025 conducted by EDXSO in collaboration with Prometric.</p>

<h2>1. Subject Performance &amp; Analysis</h2>
<p>This section compares School's performance against National Average.</p>

@foreach($schoolSubjects as $grade => $subjects)
@php
  $schoolAverages = $subjects->pluck('SchoolAverage');
  $testAverages   = $subjects->pluck('TestAverage');
@endphp

<div class="grade-header">Grade {{ $grade }}</div>

<div class="split-box">
  <table>
    <tr>
      <td class="split-left-cell">

        {{-- Bar Chart: use base64 image if available, else placeholder --}}
        @php $barId = 'barChart' . $grade; @endphp
        @if(isset($charts[$barId]) && $charts[$barId])
          <img src="{{ $charts[$barId] }}" class="chart-img" alt="Bar Chart Grade {{ $grade }}"/>
        @else
          <div class="chart-placeholder">Bar chart not available</div>
        @endif

        <table class="legend-table">
          <tr>
            <td><span class="legend-swatch" style="background:#4472C4;"></span>School Average</td>
            @foreach($schoolAverages as $avg)
            <td>{{ number_format($avg, 2) }}%</td>
            @endforeach
          </tr>
          <tr>
            <td><span class="legend-swatch" style="background:#C00000;"></span>National Average</td>
            @foreach($testAverages as $avg)
            <td>{{ number_format($avg, 2) }}%</td>
            @endforeach
          </tr>
        </table>

        {{-- Radar Chart --}}
        @if($subjects->count() > 2)
          @php $radarId = 'radarChart' . $grade; @endphp
          @if(isset($charts[$radarId]) && $charts[$radarId])
            <img src="{{ $charts[$radarId] }}" class="chart-img" style="margin-top:12px;" alt="Radar Chart Grade {{ $grade }}"/>
          @else
            <div class="chart-placeholder" style="margin-top:12px;">Radar chart not available</div>
          @endif
        @endif

      </td>
      <td class="split-right-cell">
        @foreach($subjects as $subject)
        <div style="margin-bottom:12px;">
          @php
            $text = e($subject->Column1);
            $text = preg_replace('/^(.+?- GRADE \d+)/m', '<strong>$1</strong>', $text);
            $text = preg_replace('/(LEARNING INSIGHTS:)/', '<strong>$1</strong>', $text);
          @endphp
          <p>{!! nl2br($text) !!}</p>
        </div>
        @endforeach
      </td>
    </tr>
  </table>
</div>

@if(!$loop->last)
<div class="page-break"></div>
@endif

@endforeach


<!-- ══════════════════════════════════════════
     SECTION 2: COMPETENCY-WISE PERFORMANCE
     ══════════════════════════════════════════ -->
<div class="page-break"></div>
<h2>2. Competency-Wise Performance</h2>
<p>This section breaks down performance of school students by specific competencies within each subject.</p>

@foreach($records as $group => $items)
@php
  $grade   = $items->first()->grade_id;
  $subject = $items->first()->subject_name;
  $chartId = 'radarChart_' . $grade . '_' . Str::slug($subject);
@endphp

<h3>Grade {{ $grade }} &ndash; {{ $subject }} Competency Based Performance:</h3>

<div class="split-box">
  <table>
    <tr>
      <td class="split-left-cell">
        {{-- Competency Radar Chart --}}
        @if(isset($charts[$chartId]) && $charts[$chartId])
          <img src="{{ $charts[$chartId] }}" class="chart-img" style="min-height:200px;" alt="Competency Radar {{ $subject }}"/>
        @else
          <div class="chart-placeholder">Radar chart not available</div>
        @endif
      </td>
      <td class="split-right-cell">
        @php
          $bandGroups = $items->groupBy('Performance_Band');
          $bandGroups = $bandGroups->sortBy(fn($g) => $g->first()->Perfornance_Sort);
        @endphp
        <table class="highlights-table">
          <thead>
            <tr>
              <th>Performance Band</th>
              <th>Competency</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bandGroups as $band => $rows)
            <tr>
              <td><strong>{{ $band }}</strong></td>
              <td>{{ $rows->pluck('Competency')->implode(', ') }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<!-- Competency Highlights Table -->
<h3>Grade {{ $grade }} &ndash; Competency Based Highlights: {{ $subject }}</h3>
<table class="highlights-table">
  <thead>
    <tr>
      <th style="width:10%">Competency</th>
      <th style="width:42%">Competency Description</th>
      <th style="width:11%">School Avg</th>
      <th style="width:11%">National Avg</th>
      <th style="width:11%">Variance</th>
      <th style="width:15%">Performance Band</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $row)
    @php
      $cleanBand = preg_replace('/^\d+\s*-\s*/', '', $row->Performance_Band);
      $bandClass = '';
      $bl = strtolower($cleanBand);
      if (Str::contains($bl, 'significantly below'))     $bandClass = 'band-red';
      elseif (Str::contains($bl, 'below'))               $bandClass = 'band-orange';
      elseif (Str::contains($bl, 'in line'))             $bandClass = 'band-blue';
      elseif (Str::contains($bl, 'significantly above')) $bandClass = 'band-green';
      elseif (Str::contains($bl, 'above'))               $bandClass = 'band-lightgreen';
    @endphp
    <tr>
      <td>{{ $row->Competency }}</td>
      <td>{{ preg_replace('/[^\x20-\x7E]/', '', $row->CompetencyDescription) }}</td>
      <td style="text-align:center;">{{ number_format($row->School_Competency_Average * 100, 2) }}%</td>
      <td style="text-align:center;">{{ number_format($row->Test_Competency_Average * 100, 2) }}%</td>
      <td style="text-align:center;">{{ number_format($row->Variance * 100, 2) }}%</td>
      <td class="{{ $bandClass }}" style="text-align:center;">{{ $cleanBand }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<hr>

@if(!$loop->last)
<div class="page-break"></div>
@endif

@endforeach

<!-- ── PDF Footer ── -->
<div class="pdf-footer">
  This report is the intellectual property of Spark Olympiad (Edxso) and is shared solely for internal academic review by the respective school.
  Any unauthorized use or distribution is not permitted.
</div>

</body>
</html>
