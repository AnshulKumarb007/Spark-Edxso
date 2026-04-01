<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>School Performance Report: Spark Olympiad</title>
<style>

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: Arial, sans-serif;
    font-size: 11px;
    color: #1e293b;
    background: #fff;
}

/* ══════════════════════════════════════════════
   PAGE SETUP — wkhtmltopdf uses @page for size
   ══════════════════════════════════════════════ */
 

/* ══════════════════════════════════════════════
   FIXED HEADER — appears on EVERY page
   Uses display:table so wkhtmltopdf renders it
   ══════════════════════════════════════════════ */
#rpt-header {
   
    top: 0; left: 0; right: 0;
    height: 46px;
    background: #fff;
    border-bottom: 2px solid #0c4bad;
    z-index: 9999;
    display: table;
    width: 100%;
}
#rpt-header .hdr-inner {
    display: table-cell;
    vertical-align: middle;
    padding: 0 14mm;
}
#rpt-header img { height: 26px; width: auto; vertical-align: middle; }
#rpt-header .hdr-pagenum {
    float: right;
    font-size: 9px;
    color: #555;
    font-family: Arial, sans-serif;
    line-height: 26px;
}

/* ══════════════════════════════════════════════
   FIXED FOOTER — appears on EVERY page
   ══════════════════════════════════════════════ */
#rpt-footer {
    /* position: fixed; */
    bottom: 0; left: 0; right: 0;
    height: 40px;
    background: #fff;
    border-top: 1px solid #ccc;
    z-index: 9999;
    display: table;
    width: 100%;
}

#rpt-footer .ftr-inner {
    display: table-cell;
    vertical-align: middle;
    padding: 0 14mm;
}

#rpt-footer .ftr-text {
    font-size: 7.5px;
    color: #555;
    line-height: 1.4;
}
#rpt-footer .ftr-logos {
    float: right;
    margin-top: 1px;
}
#rpt-footer img {
    height: 15px;
    width: auto;
    vertical-align: middle;
    margin-left: 10px;
}
/* ══════════════════════════════════════════════
   PAGE BREAK
   ══════════════════════════════════════════════ */
.page-break {
    display: block;
    page-break-before: always;
}
/* ══════════════════════════════════════════════
   COVER — top padding clears fixed header
   ══════════════════════════════════════════════ */
.cover {
    padding: 56px 14mm 50px 2mm;
    text-align: center;
}

.cover-logo { width: 180px; margin: 0 auto 26px auto; display: block; }
.indias-first {
    color: #1A4FB5;
    font-size: 35px;
    font-weight: bold;
    font-style: ;
    font-family: CRIMSON PRO;
    display: inline-block;
    background: #fff;
    padding: 0 8px;
    position: relative;
    top: 2px;
}
.box-section {
    border: 2px solid #8fb1cf; padding: 8px 16px 10px;
    display: inline-block; margin-bottom: 20px;
}
.olympiad-txt {
    font-size: 24px; font-weight: bold; color: #E8500A;
    font-family: Georgia, serif; white-space: nowrap;
}
.school-lbl { font-size: 13px; font-weight: bold; color: #333; margin-bottom: 5px; }
.rpt-title  { font-size: 18px; font-weight: bold; color: #111; font-family: Georgia, serif; margin-bottom: 22px; }

/* By-divider using table (no flexbox — more reliable in wkhtmltopdf) */
.by-wrap { width: 70%; margin: 0 auto 16px auto; display: table; }
.by-line { display: table-cell; vertical-align: middle; }
.by-line hr { border: none; border-top: 1px solid #999; }
.by-lbl  { display: table-cell; vertical-align: middle; padding: 0 8px; font-size: 11px; color: #555; white-space: nowrap; }

/* Logos using table */
.logos-wrap { width: 70%; margin: 0 auto 22px auto; display: table; }
.logo-cell  { display: table-cell; text-align: center; vertical-align: top; padding: 0 10px; }
.logo-cell img { height: 30px; display: block; margin: 0 auto 6px auto; }
.logo-cell p { font-size: 9px; color: #333; line-height: 1.5; }
.cover-foot { border-top: 1px solid #ccc; padding-top: 10px; margin-top: 20px; font-size: 9px; color: #444; line-height: 1.6; }

  /* ══════════════════════════════════════════════
   INNER PAGES
   ══════════════════════════════════════════════ */

.inner { padding: 25px 0mm 50px 0mm; }

h1 { font-size: 16px; font-weight: bold; margin-bottom: 8px; color: #000; }
h2 { font-size: 13px; font-weight: 700; margin: 12px 0 4px; color: #000; page-break-after: avoid; }
h3 { font-size: 11px; font-weight: 700; margin: 10px 0 4px; page-break-after: avoid; }
p  { margin-bottom: 5px; line-height: 1.5; font-size: 10px; }
hr.dl { border: none; border-top: 1px solid #ddd; margin: 7px 0; }

.grade-hdr {
    background: #f0f0f0; padding: 6px 12px; margin: 12px 0 8px;
    border: 1px solid #ddd; font-weight: bold; font-size: 12px; page-break-after: avoid;
}

/* Split box — table layout, reliable in old WebKit */
.split-box   { display: table; width: 100%; border: 1px solid #999; margin-bottom: 12px; page-break-inside: avoid; }
.split-left  { display: table-cell; width: 44%; border-right: 1px solid #999; padding: 8px; vertical-align: top; }
.split-right { display: table-cell; width: 56%; padding: 8px 12px; vertical-align: top; font-size: 9.5px; line-height: 1.45; }

.chart-wrap { width: 100%; overflow: hidden; }
/* .chart-wrap svg { display: block; width: 100%; height: auto; } */
.chart-wrap svg { 
    display: block;
}
.legend-tbl { width: 100%; border-collapse: collapse; font-size: 8.5px; margin-top: 5px; }
.legend-tbl td { border: 1px solid #ccc; padding: 2px 4px; text-align: center; }
.swatch { display: inline-block; width: 11px; height: 9px; margin-right: 3px; vertical-align: middle; }

/* Band colours */
.b-red  { background: #e53935; color: #fff; font-weight: 600; }
.b-org  { background: #fb8c00; color: #fff; font-weight: 600; }
.b-blue { background: #1e88e5; color: #fff; font-weight: 600; }
.b-lgrn { background: #66bb6a; color: #fff; font-weight: 600; }
.b-grn  { background: #2e7d32; color: #fff; font-weight: 600; }

.hl-tbl { width: 100%; border-collapse: collapse; font-size: 8.5px; margin-top: 6px; }
.hl-tbl th { background: #add8e6; padding: 4px 5px; border: 1px solid #aab; font-weight: 700; font-size: 8.5px; }
.hl-tbl td { padding: 3px 4px; border: 1px solid #ccc; vertical-align: top; line-height: 1.35; font-size: 8.5px; }

.subj-block { margin-bottom: 8px; }


/* ===== COVER PAGE ===== */
.page {
  min-height: 850px;
  background: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  padding: 40px 40px 35px;
  position: relative;
}

.s-logo {
  width: 280px;
  margin-bottom: 40px;
}

.heading-block {
  width: 80%;
  text-align: center;
  margin-bottom: 40px;
  position: relative;
}

.box-section {
  padding: 10px 20px 14px;
  position: relative;
  border: 2px solid #8fb1cf;
  border-bottom: 2px solid;
  border-image: linear-gradient(to right,
    #6f8fb3 0%, #9fb6cc 30%, #f06d2f 35%,
    #f06d2f 65%, #9fb6cc 70%, #6f8fb3 100%) 1;
}

.online-olympiad {
  font-size: 42px;
  font-weight: bold;
  color: #E8500A;
  font-family: 'Georgia', serif;
}

.school-label {
  font-size: 24px;
  color: #333;
  margin-bottom: 10px;
  margin-top: 15px;
  font-family: Arial, sans-serif;
  font-weight: bold;
  line-height: 1.3;
}

.report-title {
  font-size: 32px;
  font-weight: bold;
  color: #111;
  font-family: 'Georgia', serif;
  margin-bottom: 50px;
}

.title-x { margin-bottom: 80px; }

.by-divider {
  display: flex;
  align-items: center;
  width: 100%;
  margin-bottom: 50px;
  margin-top: 30px;
  gap: 15px;
}
.by-divider hr { flex: 1; border: none; border-top: 1px solid #999; }
.by-divider span { color: #555; font-size: 16px; font-family: Arial, sans-serif; }

.logos-row {
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  width: 100%;
  margin-bottom: 60px;
  gap: 40px;
}

.logo-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  flex: 1;
}
.logo-item img {
  height: 50px;
  object-fit: contain;
  margin-bottom: 15px;
}
.logo-item p {
  font-size: 13px;
  color: #333;
  font-family: Arial, sans-serif;
  line-height: 1.5;
}

.logo-x { width: 150px; }
.spark-logo { width: 120px; margin-bottom: 35px; }

.footeer {
  border-top: 1px solid #ccc;
  width: 100%;
  padding-top: 20px;
  text-align: center;
  margin-top: auto;
}
.footeer p {
  font-size: 12px;
  color: #444;
  font-family: Arial, sans-serif;
  line-height: 1.8;
}

.raghav { margin-top: auto; }
.prometric-label {
  font-family: Arial, sans-serif;
  font-size: 14px;
  letter-spacing: 2px;
  color: #111;
  margin-bottom: 6px;
  font-weight: bold;
}



 
</style>
</head>
<body>

{{-- ══════════════════════════════════════════════════════
     PAGE 2+: MAIN REPORT
     ══════════════════════════════════════════════════════ --}}
<div class="page-break"></div>

<div class="inner">

    
    <h1>School Performance Report: Spark Olympiad</h1>
    <h2>{{ $schoolSubjects->flatten()->pluck('school_name')->unique()->implode(', ') }}</h2>
    <p>Dear School Leader,</p>
    <p>We are pleased to share the results for Spark Olympiad 2025 conducted by EDXSO in collaboration with Prometric.</p>

    {{-- ══ SECTION 1 ══════════════════════════════ --}}
    <h2>1. Subject Performance &amp; Analysis</h2>
    <p>This section compares the School's performance against the National Average.</p>

    @foreach($schoolSubjects as $grade => $subjects)
    @php
        $subjectNames   = $subjects->pluck('subject_name')->values()->toArray();
        $schoolAverages = $subjects->pluck('SchoolAverage')->values()->map(fn($v) => (float)$v)->toArray();
        $testAverages   = $subjects->pluck('TestAverage')->values()->map(fn($v) => (float)$v)->toArray();
        $n              = count($subjectNames);

        /* ════════════════════════════════════════════════
           INLINE SVG BAR CHART + NATIONAL AVG LINE
           Pure PHP — no external deps, no JS, no network
           ════════════════════════════════════════════════ */
        $svgW   = 310; $svgH = 195;
        $padL   = 36;  $padR = 10; $padT = 12; $padB = 54;
        $chartW = $svgW - $padL - $padR;
        $chartH = $svgH - $padT - $padB;
        $groupW = $n > 0 ? $chartW / $n : $chartW;
        $barW   = $groupW * 0.52;

        $yLines = ''; $bars = ''; $linePoints = ''; $dots = ''; $xLabels = '';

        for ($yi = 0; $yi <= 5; $yi++) {
            $val = $yi * 20;
            $yPx = $padT + $chartH - ($val / 100 * $chartH);
            $yLines .= '<line x1="'.$padL.'" y1="'.$yPx.'" x2="'.($svgW-$padR).'" y2="'.$yPx.'"
                              stroke="#e0e0e0" stroke-width="0.5"/>';
            $yLines .= '<text x="'.($padL-3).'" y="'.($yPx+3).'" text-anchor="end"
                              font-size="7" fill="#666">'.$val.'%</text>';
        }

        for ($i = 0; $i < $n; $i++) {
            $cx   = $padL + $groupW * $i + $groupW / 2;
            $barX = $cx - $barW / 2;

            $sh   = max(1, $schoolAverages[$i] / 100 * $chartH);
            $barY = $padT + $chartH - $sh;
            $bars .= '<rect x="'.$barX.'" y="'.$barY.'" width="'.$barW.'" height="'.$sh.'"
                            fill="#4472C4" rx="1"/>';

            $ly          = $padT + $chartH - ($testAverages[$i] / 100 * $chartH);
            $linePoints .= $cx.','.$ly.' ';
            $dots        .= '<circle cx="'.$cx.'" cy="'.$ly.'" r="3" fill="#C00000"/>';

            // X label with word wrap
            $lbl   = $subjectNames[$i];
            $words = explode(' ', $lbl);
            $l1 = ''; $l2 = '';
            foreach ($words as $w) {
                strlen($l1) + strlen($w) <= 11 ? ($l1 .= ($l1?' ':'').$w) : ($l2 .= ($l2?' ':'').$w);
            }
            $ly1 = $padT + $chartH + 12;
            $xLabels .= '<text x="'.$cx.'" y="'.$ly1.'" text-anchor="middle" font-size="7" fill="#333">'
                      . htmlspecialchars($l1).'</text>';
            if ($l2) {
                $xLabels .= '<text x="'.$cx.'" y="'.($ly1+10).'" text-anchor="middle" font-size="7" fill="#333">'
                          . htmlspecialchars($l2).'</text>';
            }
        }

        $polyline = $n > 1
            ? '<polyline points="'.$linePoints.'" fill="none" stroke="#C00000" stroke-width="1.8"/>'
            : '';
        $border = '<rect x="'.$padL.'" y="'.$padT.'" width="'.$chartW.'" height="'.$chartH.'"
                         fill="none" stroke="#ccc" stroke-width="0.5"/>';

        // Legend inside SVG bottom
        $legY    = $svgH - 10;
        $legend  = '<rect x="'.$padL.'" y="'.($legY-7).'" width="10" height="8" fill="#4472C4"/>';
        $legend .= '<text x="'.($padL+12).'" y="'.$legY.'" font-size="7.5" fill="#333">School Avg</text>';
        $legend .= '<line x1="'.($padL+67).'" y1="'.($legY-3).'" x2="'.($padL+79).'" y2="'.($legY-3).'"
                          stroke="#C00000" stroke-width="2"/>';
        $legend .= '<circle cx="'.($padL+73).'" cy="'.($legY-3).'" r="2.5" fill="#C00000"/>';
        $legend .= '<text x="'.($padL+82).'" y="'.$legY.'" font-size="7.5" fill="#333">National Avg</text>';

        $barSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 '.$svgW.' '.$svgH.'" width="'.$svgW.'" height="'.$svgH.'">'
                . $yLines . $bars . $polyline . $dots . $xLabels . $border . $legend . '</svg>';

        /* ════════════════════════════════════════════════
           INLINE SVG RADAR (shown only when > 2 subjects)
           ════════════════════════════════════════════════ */

        $radarSvg = null;
        if ($n > 2) {
            $rW  = 330; $rH = 230;
            $rcx = $rW/2; $rcy = $rH/2 - 14;
            $rad = 82; $rings = 5; $rOut = '';

            for ($r = 1; $r <= $rings; $r++) {
                $rr  = $rad * $r / $rings; $pts = '';
                for ($i = 0; $i < $n; $i++) {
                    $ang = deg2rad(-90 + 360/$n*$i);
                    $pts .= ($rcx+$rr*cos($ang)).','.($rcy+$rr*sin($ang)).' ';
                }
                $rOut .= '<polygon points="'.$pts.'" fill="none" stroke="#ddd" stroke-width="0.6"/>';
                $rOut .= '<text x="'.($rcx+3).'" y="'.($rcy-$rr+3).'" font-size="6" fill="#aaa">'.($r*20).'%</text>';
            }

            for ($i = 0; $i < $n; $i++) {
                $ang = deg2rad(-90 + 360/$n*$i);
                $ex  = $rcx+$rad*cos($ang); $ey = $rcy+$rad*sin($ang);
                $rOut .= '<line x1="'.$rcx.'" y1="'.$rcy.'" x2="'.$ex.'" y2="'.$ey.'"
                                stroke="#ddd" stroke-width="0.6"/>';
                $lx  = $rcx+($rad+15)*cos($ang); $ly = $rcy+($rad+15)*sin($ang);
                $anc = $lx<$rcx-2?'end':($lx>$rcx+2?'start':'middle');
                $rOut .= '<text x="'.$lx.'" y="'.($ly+3).'" text-anchor="'.$anc.'"
                                font-size="7.5" fill="#333">'.htmlspecialchars($subjectNames[$i]).'</text>';
            }

            $sp = ''; $np = '';
            for ($i = 0; $i < $n; $i++) {
                $ang = deg2rad(-90 + 360/$n*$i);
                $sv  = min($schoolAverages[$i],100)/100*$rad;
                $nv  = min($testAverages[$i],100)/100*$rad;
                $sp .= ($rcx+$sv*cos($ang)).','.($rcy+$sv*sin($ang)).' ';
                $np .= ($rcx+$nv*cos($ang)).','.($rcy+$nv*sin($ang)).' ';
            }
            $rOut .= '<polygon points="'.$sp.'" fill="rgba(68,114,196,0.25)" stroke="#4472C4" stroke-width="2"/>';
            $rOut .= '<polygon points="'.$np.'" fill="rgba(192,0,0,0.15)" stroke="#C00000" stroke-width="2"/>';

            $rly = $rH-14;
            $rOut .= '<rect x="'.($rW/2-80).'" y="'.$rly.'" width="10" height="8" fill="#4472C4"/>';
            $rOut .= '<text x="'.($rW/2-67).'" y="'.($rly+7).'" font-size="8" fill="#333">School Avg</text>';
            $rOut .= '<rect x="'.($rW/2+10).'" y="'.$rly.'" width="10" height="8" fill="#C00000"/>';
            $rOut .= '<text x="'.($rW/2+23).'" y="'.($rly+7).'" font-size="8" fill="#333">National Avg</text>';

            $radarSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 '.$rW.' '.$rH.'"  width="'.$rW.'"
    height="'.$rH.'">'.$rOut.'</svg>';
        }
    @endphp

    <br/><br/>
    <div class="grade-hdr" style="margin-top:10px;">Grade {{ $grade }}</div>

    <div class="split-box">
        <div class="split-left">
            <div class="chart-wrap">{!! $barSvg !!}</div>
            <table class="legend-tbl">
                <tr>
                    <td><span class="swatch" style="background:#4472C4;"></span>School Average</td>
                    @foreach($schoolAverages as $avg)
                    <td>{{ number_format($avg,1) }}%</td>
                    @endforeach
                </tr>
                <tr>
                    <td><span class="swatch" style="background:#C00000;"></span>National Average</td>
                    @foreach($testAverages as $avg)
                    <td>{{ number_format($avg,1) }}%</td>
                    @endforeach
                </tr>
            </table>
            @if($radarSvg)
            <div class="chart-wrap" style="margin-top:10px;">{!! $radarSvg !!}</div>
            @endif
        </div>
        <div class="split-right">
            @foreach($subjects as $subject)
            <div class="subj-block">
                @php
                    $text = e($subject->Column1);
                    $text = preg_replace('/^(.+?- GRADE \d+)/m', '<strong>$1</strong>', $text);
                    $text = preg_replace('/(LEARNING INSIGHTS:)/', '<strong>$1</strong>', $text);
                @endphp
                <p style="font-size:9px">{!! nl2br($text) !!}</p>
            </div>
            @endforeach
        </div>
    </div>
    @if(!$loop->last)<div class="page-break"></div>@endif

    @endforeach
    {{-- ══ SECTION 2 ══════════════════════════════ --}}
    <div class="page-break"></div>
    <br/><br/> 
    <h2>2. Competency-Wise Performance</h2>
    <p>This section breaks down performance by specific competencies within each subject.</p>

    @foreach($records as $group => $items)
    @php
        $grade        = $items->first()->grade_id;
        $subject      = $items->first()->subject_name;
        $labels       = $items->pluck('Competency')->toArray();
        $schoolVals   = $items->map(fn($r) => round((float)$r->School_Competency_Average * 100, 2))->toArray();
        $nationalVals = $items->map(fn($r) => round((float)$r->Test_Competency_Average * 100, 2))->toArray();
        $n            = count($labels);

        /* ════════════════════════════════════════════════
           COMPETENCY RADAR — inline SVG
           ════════════════════════════════════════════════ */
        $rW  = 300; $rH = 250;
        $rcx = $rW/2; $rcy = $rH/2 - 16;
        $rad = 88; $rings = 4; $cOut = '';

        for ($r = 1; $r <= $rings; $r++) {
            $rr  = $rad*$r/$rings; $pts = '';
            for ($i = 0; $i < $n; $i++) {
                $ang  = deg2rad(-90+360/$n*$i);
                $pts .= ($rcx+$rr*cos($ang)).','.($rcy+$rr*sin($ang)).' ';
            }
            $cOut .= '<polygon points="'.$pts.'" fill="none" stroke="#ddd" stroke-width="0.6"/>';
            $cOut .= '<text x="'.($rcx+3).'" y="'.($rcy-$rr+3).'" font-size="6.5" fill="#aaa">'.($r*25).'%</text>';
        }

        for ($i = 0; $i < $n; $i++) {
            $ang = deg2rad(-90+360/$n*$i);
            $ex  = $rcx+$rad*cos($ang); $ey = $rcy+$rad*sin($ang);
            $cOut .= '<line x1="'.$rcx.'" y1="'.$rcy.'" x2="'.$ex.'" y2="'.$ey.'"
                            stroke="#ddd" stroke-width="0.6"/>';
            $lx   = $rcx+($rad+16)*cos($ang); $ly = $rcy+($rad+16)*sin($ang);
            $anc  = $lx<$rcx-2?'end':($lx>$rcx+2?'start':'middle');
            $lbl  = strlen($labels[$i])>14 ? substr($labels[$i],0,13).'…' : $labels[$i];
            $cOut .= '<text x="'.$lx.'" y="'.($ly+3).'" text-anchor="'.$anc.'"
                            font-size="7" fill="#333">'.htmlspecialchars($lbl).'</text>';
        }

        $sp = ''; $np = '';
        for ($i = 0; $i < $n; $i++) {
            $ang = deg2rad(-90+360/$n*$i);
            $sv  = min($schoolVals[$i],100)/100*$rad;
            $nv  = min($nationalVals[$i],100)/100*$rad;
            $sp .= ($rcx+$sv*cos($ang)).','.($rcy+$sv*sin($ang)).' ';
            $np .= ($rcx+$nv*cos($ang)).','.($rcy+$nv*sin($ang)).' ';
        }
        $cOut .= '<polygon points="'.$sp.'" fill="rgba(47,85,151,0.15)" stroke="#2F5597" stroke-width="2.5"/>';
        $cOut .= '<polygon points="'.$np.'" fill="rgba(192,0,0,0.1)" stroke="#C00000" stroke-width="2.5"/>';

        for ($i = 0; $i < $n; $i++) {
            $ang = deg2rad(-90+360/$n*$i);
            $sv  = min($schoolVals[$i],100)/100*$rad;
            $nv  = min($nationalVals[$i],100)/100*$rad;
            $cOut .= '<circle cx="'.($rcx+$sv*cos($ang)).'" cy="'.($rcy+$sv*sin($ang)).'" r="3" fill="#2F5597"/>';
            $cOut .= '<circle cx="'.($rcx+$nv*cos($ang)).'" cy="'.($rcy+$nv*sin($ang)).'" r="3" fill="#C00000"/>';
        }

        $rly = $rH-14;
        $cOut .= '<rect x="'.($rW/2-80).'" y="'.$rly.'" width="10" height="8" fill="#2F5597"/>';
        $cOut .= '<text x="'.($rW/2-67).'" y="'.($rly+7).'" font-size="8" fill="#333">School Avg</text>';
        $cOut .= '<rect x="'.($rW/2+8).'" y="'.$rly.'" width="10" height="8" fill="#C00000"/>';
        $cOut .= '<text x="'.($rW/2+21).'" y="'.($rly+7).'" font-size="8" fill="#333">National Avg</text>';

        $compSvg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 '.$rW.' '.$rH.'" width="'.$rW.'"
    height="'.$rH.'">'.$cOut.'</svg>';

        $bandGroups = $items->groupBy('Performance_Band')
                            ->sortBy(fn($g) => $g->first()->Perfornance_Sort);
    @endphp
   <br/><br/> 
    <h3>Grade {{ $grade }} &ndash; {{ $subject }} Competency Based Performance:</h3>

    <div class="split-box">
        <div class="split-left">
            <div class="chart-wrap">{!! $compSvg !!}</div>
        </div>
        <div class="split-right">
            <table class="hl-tbl">
                <thead><tr><th>Performance Band</th><th>Competency</th></tr></thead>
                <tbody>
                    @foreach($bandGroups as $band => $rows)
                    <tr>
                        <td><strong>{{ $band }}</strong></td>
                        <td>{{ $rows->pluck('Competency')->implode(', ') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/><br/> 
    <h3>Grade {{ $grade }} &ndash; Competency Highlights: {{ $subject }}</h3>
    <table class="hl-tbl">
        <thead>
            <tr>
                <th>Competency</th><th>Description</th>
                <th>School Avg</th><th>National Avg</th><th>Variance</th><th>Band</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $row)
            @php
                $cleanBand = preg_replace('/^\d+\s*-\s*/', '', $row->Performance_Band);
                $bl = strtolower($cleanBand);
                $bc = '';
                if (Str::contains($bl,'significantly below'))    $bc='b-red';
                elseif (Str::contains($bl,'below'))              $bc='b-org';
                elseif (Str::contains($bl,'in line'))            $bc='b-blue';
                elseif (Str::contains($bl,'significantly above'))$bc='b-grn';
                elseif (Str::contains($bl,'above'))              $bc='b-lgrn';
            @endphp
            <tr>
                <td>{{ $row->Competency }}</td>
                <td>{{ preg_replace('/[^\x20-\x7E]/','', $row->CompetencyDescription) }}</td>
                <td>{{ number_format($row->School_Competency_Average*100, 1) }}%</td>
                <td>{{ number_format($row->Test_Competency_Average*100, 1) }}%</td>
                <td>{{ number_format($row->Variance*100, 1) }}%</td>
                <td class="{{ $bc }}">{{ $cleanBand }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

   

    @if(!$loop->last)<div class="page-break"></div>@endif

    @endforeach

</div>

</body>
</html>
