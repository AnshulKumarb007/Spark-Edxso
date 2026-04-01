<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Performance Report: Spark Olympiad</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
        body {
                font-family: 'Poppins', sans-serif;
                font-size: 14px;
                background: linear-gradient(135deg, #0c4bad 20%, #001e47 80%);
                min-height: 100vh;
                margin: 0;
                padding: 30px 15px;
                color: #1e293b;
        }

     .report-container { 
        max-width: 900px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }
        .logo-img {
            width: 100px;
            height: auto;
        }
        .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: flex;
    font-size: 16px;
    cursor: pointer;
    border-radius: 12px;
    transition: background-color 0.3s ease;/* Align button to the right */
}

/* Hover effect */
.button:hover {
    background-color: #357c39; /* Darker green */
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between; /* pushes items apart */
    padding: 10px 20px;
}
@media (max-width: 768px) {
            .report-container {
                padding: 20px;
            }
            h1 { font-size: 1.5rem; }
            .logo-img { width: 80px; }
            table th, table td {
                font-size: 0.9rem;
                padding: 6px;
            }
            canvas { height: 300px !important; }
        }
        @media (max-width: 576px) {
            .report-container {
                padding: 15px;
            }
            table {
                font-size: 0.85rem;
            }
            .table-responsive {
                overflow-x: auto;
            }
        }
        h1, h2, h3 { color: #333; }
        h1 { font-size: 28px; font-weight: bold;}
        h2 { font-size: 22px; font-weight: bold;}
        h3 { font-size: 16px;font-weight: bold;}
        h6 { font-size: 15px; font-weight: bold;}
        table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        th, td {  border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { color: #ffffff; }
        th { background-color: #33abec; }
        .highlight { background-color: yellow; }
        canvas { max-width: 100%; height: auto; margin-bottom: 20px; }

/* Reset */
* {
  box-sizing: border-box;
}

/* Page background */
/* body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
  background: #f4f6f8;
} */

/* Header */
/* .header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 20px;
  background: #ffffff;
  border-bottom: 1px solid #ddd;
} */

/* Button */
#downloadPDF {
  padding: 8px 14px;
  background: #1e88e5;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 14px;
}

/* A4 width lock */
#reportContent {
  width: 900px;        /* web-like width */
  max-width: 100%;
  margin: 10px auto;
  padding: 10px;
  }	

.pdf-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
  font-size: 14px;
}

.pdf-table th,
.pdf-table td {
  border: 1px solid #ccc;
  padding: 8px;
  text-align: left;
  vertical-align: top;
}

.pdf-table th {   
  font-weight: bold;
}

</style>
<style>
.chart-wrapper {
  width: 100%;
  max-width: 100%;
  height: 260px;     /* Fixed height = predictable PDF */
}

.chart-wrapper canvas {
  width: 100% !important;
  height: 260px !important;
}
/* Each logical PDF block */
.pdf-section {
  margin-bottom: 30px;

}

pagebreak: {
  mode: ['avoid-all', 'css']
}
.page-break {
  page-break-before: always !important;
  break-before: page !important;
}
 

        @media print {
  .no-print {
    display: none !important;
  }
}

.button-container {
  display: flex;
  flex-direction: column;
  gap: 10px; /* space between buttons */
  width: fit-content;
}

.btn {
  padding: 12px 24px;
  border: none;
  color: white;
  font-size: 16px;
  cursor: pointer;
  border-radius: 6px;
}

 

    </style>
    </head>
    <body>
        <div class="report-container">
            <div id="reportContent" class="report-container">
                <header  class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                    <div class="header">
                        <img src="/studentreport/content.png" alt="Logo"
                            height="100">
                            <div class="button-container">
                                <button style="margin-left: 450px;" class="button no-print"
                                onclick="window.print()">Print</button>  
                                <button id="downloadPDF" class="button no-print" style="margin-left: 450px;">Download</button>
                            </div>
                    </div>
                </header>
            	
				  <div class="pdf-section">

                    <h1 style="margin-top: 20px;">Student Performance Report: Spark
                        Olympiad</h1>
                    <p>Dear Parent,</p>

					<p>We are pleased to share the results for {{$students->student_name}} (Grade {{$students->grade_id}}) in
						Spark Olympiad 2025 conducted by EDXSO in collaboration with
						Prometric.</p>

					<h2>1. Student Details</h2>
					<ul>
						<li>Student Name:<b>{{$students->student_name}}</b></li>
						<li>Grade: {{$students->grade_id}}</li>
						<li>School Name: {{$students->school_name}}</li>
					</ul>
					</div>
			
			<div class="pdf-section">
					<h2>2. Subject Performance & Analysis</h2>
					<p>This section compares the student's score against the school and
						overall test averages.</p>
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>Subject</th>
									<th>Student Score</th>
									<th>School Average</th>
									<th>Test Average</th>
									<th>Performance Band</th>
								</tr>
							</thead>
							<tbody>


								@php 
								
								$showmath=0;
								$shoevs=0;
								$showReading=0;
								$showIndiaAwareness=0;
								
								@endphp

								@foreach($results as $row)

							 @php
								if ($row->subject_name == "EVS/Science") {
									$shoevs = 1;
								}

								if ($row->subject_name == "Math") {
									$showmath = 1;
								}

								if ($row->subject_name == "India Awareness") {
									$showIndiaAwareness = 1;
								}

								if ($row->subject_name == "Reading") {
									$showReading = 1;
								}
							@endphp




										<tr>
											<td class="{{ $loop->first ? 'highlight' : '' }}">
												{{ $row->subject_name }}
											</td>
												<td>{{ $row->SparkScore }}</td>
												<td>{{ $row->SchoolAverage }}</td>
												<td>{{ $row->TestAverage }}</td>
												<td>{{ $row->Performance_Band }}</td>
										</tr>
									@endforeach
							</tbody>
						</table>
					</div>
			</div>
			
			<div class="pdf-section">
					<h3>SPARK Olympiad - {{$students->student_name}} Performance</h3>
					<canvas id="performanceChart"></canvas>
			</div>
			
			<div class="pdf-section">
					<h3>Subject Analysis:</h3>
					
					<ul>
						 @foreach($results as $row12)
							<li>  <b>{{ $row12->subject_name }} - </b> {{ $row12->Comment }}  </li>                                 
						 @endforeach
					</ul>
			</div>
			
			<div class="pdf-section">
					<h2>3. Competency-Wise Performance</h2>
					<p>This section breaks down performance by specific skills within
						each subject.</p>
						</div>
			
			
				@if($shoevs==1)
				<div class="pdf-section">
					<h3>EVS Competencies Highlights:</h3>
					<canvas id="evsChart"></canvas>
           

       
					  <h3>Competency Score for each Subject</h3>
						<h6>EVS</h6>
						<table>
							<thead>
								<tr>
									<th>Competency</th>
									<th>Competency Description</th>
									<th>Competency Score</th>
									<th>School Average</th>
									<th>Test Average</th>
								</tr>
							</thead>
							<tbody>
								@foreach($results2 as $math)    
										@if($math->subject_name=="EVS/Science")                
											<tr>
												<td>{{$math->Competency}}</td>
												<td>{{$math->CompetencyDescription}}</td>
												<td>{{$math->Competency_Score}}</td>
												<td>{{$math->SchoolComptencyScore}}</td>
												<td>{{$math->TestCompetencyScore}}</td>                                
											</tr>
										@endif
							   @endforeach
							</tbody>
						</table>
						<div class="pdf-section">
					@endif

				@if($showmath==1)  
				<div class="pdf-section">
					<h3>Math Competencies Highlights:</h3>
					<canvas id="mathChart"></canvas>
					 

					<h6>Math</h6>
					<table>
						<thead>
							<tr>
								 <th>Competency</th>
								<th>Competency Description</th>
								<th>Competency Score</th>
								<th>School Average</th>
								<th>Test Average</th>
							</tr>
						</thead>
						<tbody>
							@foreach($results2 as $math)    
							 @if($math->subject_name=="Math")                
									<tr>
										 <td>{{$math->Competency}}</td>
										<td>{{$math->CompetencyDescription}}</td>
										<td>{{$math->Competency_Score}}</td>
										<td>{{$math->SchoolComptencyScore}}</td>
										<td>{{$math->TestCompetencyScore}}</td>                                
									</tr>
							 @endif
							@endforeach
							
						</tbody>
					</table>
					</div>
				@endif
        
					@if($showIndiaAwareness==1)
						<div class="pdf-section">					
						<h3>India Awareness Competencies Highlights:</h3>
						<canvas id="indiaAwarenessChart"></canvas>
						<!-- <ul>
							<li><strong>Strengths:</strong> Scored 100% in
								identifying/analyzing 3D shapes and representing numbers
								using place value.</li>
							<li><strong>Areas for Improvement:</strong> {{$students->student_name}} scored 0% in
								unit conversions, deducing shape area/perimeter
								relationships, and understanding formulas for the area of
								squares or rectangles.</li>
						</ul> -->
						<h6>India Awareness</h6>
						<table>
							<thead>
								<tr>
									<th>Competency</th>
									<th>Competency Description</th>
									<th>Competency Score</th>
									<th>School Average</th>
									<th>Test Average</th>
								</tr>
							</thead>
							<tbody>
								@foreach($results2 as $math)    
								@if($math->subject_name=="India Awareness")                
									   <tr>
										   <td>{{$math->Competency}}</td>
										   <td>{{$math->CompetencyDescription}}</td>
										   <td>{{$math->Competency_Score}}</td>
										   <td>{{$math->SchoolComptencyScore}}</td>
										   <td>{{$math->TestCompetencyScore}}</td>                                
									   </tr>
								@endif
							   @endforeach
							</tbody>
						</table>
						</div>
					@endif   

					@if($showReading==1)    
						<div class="pdf-section">					
						<h3>Reading Competencies Highlights:</h3>
						<canvas id="readingChart"></canvas>
					 
						<h6>Reading</h6>
						<table>
							<thead>
								<tr>
									<th>Competency</th>
									<th>Competency Description</th>
									<th>Competency Score</th>
									<th>School Average</th>
									<th>Test Average</th>
								</tr>
							</thead>
							<tbody>
								@foreach($results2 as $math)    
								@if($math->subject_name=="Reading")                
									   <tr>
										   <td>{{$math->Competency}}</td>
										   <td>{{$math->CompetencyDescription}}</td>
										   <td>{{$math->Competency_Score}}</td>
										   <td>{{$math->SchoolComptencyScore}}</td>
										   <td>{{$math->TestCompetencyScore}}</td>                                
									   </tr>
								@endif
							   @endforeach
							</tbody>
						</table>
						</div>
						@endif
						<footer>
							<div class="navbar-brand d-flex align-items-center gap-2"
								href="#">
								<img src="/studentreport/edxso-logo.png" alt="Logo"
									width="100"
									height="50">
								<img src="/studentreport/prometric-logo.png" alt="Logo"
									width="100"
									height="50" style="margin-left: 630px;">
							</div>
						</footer>
			</div>




        	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    </body>



    <script>
        // Initialize arrays
        let labels1 = [];
        let competencyScores1 = [];
        let schoolAverages1 = [];
        let testAverages1 = [];
    </script>
    
    {{-- Push dynamic data from Blade --}}
    @foreach($results as $subject)
    <script>
        labels1.push("{{ $subject->subject_name }}");
        competencyScores1.push({{ intval($subject->SparkScore ?? 0) }});
        schoolAverages1.push({{ intval($subject->SchoolAverage ?? 0) }});
        testAverages1.push({{ intval($subject->TestAverage ?? 0) }});        
    </script>
    @endforeach

    


   
       <script>
        const mathLabels = [];
        const mathScores = [];
        const mathSchoolAvg = [];
        const mathTestAvg = [];

        const evsLabels = [];
        const evsScores = [];
        const evsSchoolAvg = [];
        const evsTestAvg = [];

        const indiaLabels = [];
        const indiaScores = [];
        const indiaSchoolAvg = [];
        const indiaTestAvg = [];

        const readingLabels = [];
        const readingScores = [];
        const readingSchoolAvg = [];
        const readingTestAvg = [];

        @foreach($results2 as $row)
            @if($row->subject_name === 'Math')
                mathLabels.push(@json($row->Competency));
                mathScores.push({{ (int)$row->Competency_Score }});
                mathSchoolAvg.push({{ (int)$row->SchoolComptencyScore }});
                mathTestAvg.push({{ (int)$row->TestCompetencyScore }});
            @endif

            @if($row->subject_name === 'EVS/Science')
                evsLabels.push(@json($row->Competency));
                evsScores.push({{ (int)$row->Competency_Score }});
                evsSchoolAvg.push({{ (int)$row->SchoolComptencyScore }});
                evsTestAvg.push({{ (int)$row->TestCompetencyScore }});
            @endif

            @if($row->subject_name === 'India Awareness')
                indiaLabels.push(@json($row->Competency));
                indiaScores.push({{ (int)$row->Competency_Score }});
                indiaSchoolAvg.push({{ (int)$row->SchoolComptencyScore }});
                indiaTestAvg.push({{ (int)$row->TestCompetencyScore }});
            @endif

            @if($row->subject_name === 'Reading')
                readingLabels.push(@json($row->Competency));
                readingScores.push({{ (int)$row->Competency_Score }});
                readingSchoolAvg.push({{ (int)$row->SchoolComptencyScore }});
                readingTestAvg.push({{ (int)$row->TestCompetencyScore }});
            @endif

        @endforeach
 
    console.log("Math:", { mathLabels, mathScores, mathSchoolAvg, mathTestAvg });
    console.log("EVS:", { evsLabels, evsScores, evsSchoolAvg, evsTestAvg });
    console.log("India Awareness:", { indiaLabels, indiaScores, indiaSchoolAvg, indiaTestAvg });
    console.log("Reading:", { readingLabels, readingScores, readingSchoolAvg, readingTestAvg });




    
    </script>
    <script>

        
    // Performance Chart
    const ctxPerformance = document.getElementById('performanceChart').getContext('2d');

    const performanceChart = new Chart(ctxPerformance, {
    type: 'bar',
    data: {
        labels: labels1,
        datasets: [
            {
                label: 'Student Score',
                data: competencyScores1,
                backgroundColor: '#33abec',
                order: 1
            },
            {
                label: 'School Average',
                data: schoolAverages1,
                type: 'line',
                borderColor: 'orange',
                backgroundColor: 'transparent',
                borderWidth: 2,
                tension: 0.3,
                order: 0
            },
            {
                label: 'Test Average',
                data: testAverages1,
                type: 'line',
                borderColor: 'green',
                backgroundColor: 'transparent',
                borderWidth: 2,
                tension: 0.3,
                order: 0
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                title: {
                    display: true,
                    text: 'In Percent'
                }
            }
        }
    }
});

  @if($shoevs==1)
const evsCtx = document.getElementById('evsChart').getContext('2d');

new Chart(evsCtx, {
    type: 'bar',
    data: {
        labels: evsLabels,
        datasets: [
            {
                label: 'Competency Score',
                data: evsScores,
                backgroundColor: '#33abec',
                order: 1
            },
            {
                label: 'School Average',
                data: evsSchoolAvg,
                borderColor: 'green',
                type: 'line',
                fill: false,
                 order: 0
            },
            {
                label: 'Test Average',
                data: evsTestAvg,
                borderColor: 'orange',
                type: 'line',
                fill: false,
                 order: 0
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                title: {
                    display: true,
                    text: 'In Percent'
                }
            }, x: { 
                        title: {
                            display: true,
                            text: 'Competency Code'  // Replace with your preferred label
                        }
                    } 
        }
    }
});

 @endif @if($showmath==1)  
const mathCtx = document.getElementById('mathChart').getContext('2d');

new Chart(mathCtx, {
    type: 'bar',
    data: {
        labels: mathLabels,
        datasets: [
            {
                label: 'Competency Score',
                data: mathScores,
                backgroundColor: '#33abec',
                order: 1
            },
            {
                label: 'School Average',
                data: mathSchoolAvg,
                borderColor: 'green',
                type: 'line',
                fill: false
            },
            {
                label: 'Test Average',
                data: mathTestAvg,
                borderColor: 'orange',
                type: 'line',
                fill: false
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                title: {
                    display: true,
                    text: 'In Percent'
                }
            }, x: { 
                        title: {
                            display: true,
                            text: 'Competency Code'  // Replace with your preferred label
                        }
                    } 
        }
    }
});
   @endif @if($showIndiaAwareness==1)  
const indiaAwarenessChartCtx = document.getElementById('indiaAwarenessChart').getContext('2d');
new Chart(indiaAwarenessChartCtx, {
    type: 'bar',
    data: {
        labels: indiaLabels,
        datasets: [
            {
                label: 'Competency Score',
                data: indiaScores,
                backgroundColor: '#33abec',
                order: 1
            },
            {
                label: 'School Average',
                data: indiaSchoolAvg,
                type: 'line',
                borderColor: 'green'
            },
            {
                label: 'Test Average',
                data: indiaTestAvg,
                type: 'line',
                borderColor: 'orange'
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 100,title: {
                    display: true,
                    text: 'In Percent'
                } }, x: { 
                        title: {
                            display: true,
                            text: 'Competency Code'  // Replace with your preferred label
                        }
                    } 
        }
    }
});
 

 @endif @if($showReading==1)
    const readingChartCtx = document.getElementById('readingChart').getContext('2d');
    new Chart(readingChartCtx, {
    type: 'bar',
    data: {
        labels: readingLabels,
        datasets: [
            {
                label: 'Competency Score',
                data: readingScores,
                backgroundColor: '#33abec',
                order: 1
            },
            {
                label: 'School Average',
                data: readingSchoolAvg,
                type: 'line',
                borderColor: 'green'
            },
            {
                label: 'Test Average',
                data: readingTestAvg,
                type: 'line',
                borderColor: 'orange'
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: { beginAtZero: true, max: 100,title: {
                    display: true,
                    text: 'In Percent'
                } }, x: { 
                        title: {
                            display: true,
                            text: 'Competency Code'  // Replace with your preferred label
                        }
                    } 
        }
    }
});
   @endif

     

  </script>



<script>
document.getElementById("downloadPDF").addEventListener("click", function () {

  const element = document.getElementById("reportContent");

  const opt = {
    margin: 0,
    filename: 'Student_Report_Long_Page.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: {
      scale: 2,
      useCORS: true,
      scrollY: 0,
      backgroundColor: '#ffffff',
      windowWidth: document.body.scrollWidth,
      ignoreElements: (el) => el.classList.contains('no-print')
    },
    jsPDF: {
      unit: 'px',
      format: [element.scrollWidth, element.scrollHeight],
      orientation: 'portrait'
    }
  };

  html2pdf().set(opt).from(element).save();
});
</script>

</html>