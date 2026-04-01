<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf;
use mikehaertl\wkhtmlto\Pdf;
use DB;

class PdfController extends Controller
{
    public function school_reprot($schoolid)
    {
        $schoolSubjects = DB::table('school_subject_summry')
            ->where('School_id', $schoolid)
            ->orderBy('grade_id')
            ->orderBy('subject_name')
            ->get()
            ->groupBy('grade_id');

        if ($schoolSubjects->isEmpty()) {
            return view('school_blank');
        }

            $records = DB::table('spark_school_competencysummary')
                ->where('School_id', $schoolid)
                ->orderBy('grade_id')
                ->orderBy('subject_name')
                ->get()
            ->groupBy(function ($item) {
                return $item->grade_id . '_' . $item->subject_name;
            });

            if ($records->isEmpty()) {
                return view('school_blank');
            }

        // $pdf = SnappyPdf::loadView('school_result', compact('schoolSubjects', 'records'));
        // $pdf->setPaper('A4');
        // $pdf->setOrientation('portrait');
        // $pdf->setOption('encoding', 'UTF-8');
        // $pdf->setOption('margin-top', '0');
        // $pdf->setOption('margin-bottom', '0');
        // $pdf->setOption('margin-left', '0');
        // $pdf->setOption('margin-right', '0');
        // $pdf->setOption('disable-javascript', true); 
        // $pdf->setOption('enable-local-file-access', true);
        // $pdf->setOption('load-error-handling', 'ignore');
        // $pdf->setOption('load-media-error-handling', 'ignore');
        // $pdf->setOption('header-html', view('pdf.header')->render());
        // $pdf->setOption('header-spacing', 5);
        // // FOOTER
        // $pdf->setOption('footer-html', view('pdf.footer')->render());
        // $pdf->setOption('footer-spacing', 5);
        //     // ── PAGE NUMBERS ──────────────────────────────────────────────────
        //     // wkhtmltopdf replaces [page] and [topage] in the HTML body itself.
        //     // This only works with --replace option:
        // $pdf->setOption('replace', [
        //     '[page]'    => '__PAGE__',    // placeholder mapped below
        //     '[topage]'  => '__TOPAGE__',
        // ]);
            // NOTE: The simplest approach is that wkhtmltopdf natively replaces
            // the literal strings [page] and [topage] inside position:fixed
            // elements when using the body HTML approach (no --header-html needed).
            // If [page] does NOT render, see the alternate approach commented below.
        $htmlContent = view('school_result', compact('schoolSubjects', 'records'))->render();
        $pdf_file     = 'school_report_' . time() . '.pdf';
        $public_path  = public_path('pdfs/' . $pdf_file);

        $coverFile = storage_path('app/cover_' . time() . '.html');
        file_put_contents($coverFile, view('pdf.cover',compact('schoolSubjects'))->render());

        $headerPath = storage_path('app/header_' . time() . '.html');
        file_put_contents($headerPath, view('pdf.header')->render());

        $footerPath = storage_path('app/footer_' . time() . '.html');
        file_put_contents($footerPath, view('pdf.footer')->render());

        $tempFile = storage_path('app/temp_report_' . time() . '.html');
        file_put_contents($tempFile, $htmlContent);

        $pdf = new Pdf([
            'binary'         => '/usr/local/bin/wkhtmltopdf',
            'margin-top'     => '25mm',
            'margin-right'   => '5mm',
            'margin-bottom'  => '15mm',
            'margin-left'    => '5mm',
            'page-size'      => 'A4',
            'encoding'       => 'UTF-8',
        ]);
        $pdf->setOptions([
            'header-html'   =>'file://'.$headerPath,
            'footer-html'   => $footerPath,
            'header-spacing' => 5,
            'enable-local-file-access',
            'enable-javascript',
            'disable-smart-shrinking',
            'no-stop-slow-scripts',
            'print-media-type',
            'javascript-delay' => 1000,
        ]);
        $pdf->addCover('file://' . $coverFile);

        $pdf->addPage($tempFile);

        if (!$pdf->saveAs($public_path)) {
            return $pdf->getError();
        }
        return response()->download($public_path);

        // $pdf = SnappyPdf::loadView('school_result', compact('schoolSubjects', 'records'));
        // $pdf->setPaper('A4');
        // $pdf->setOrientation('portrait');

        // $pdf->setOption('encoding', 'UTF-8');
        // $pdf->setOption('margin-top', '30');     // space for header
        // $pdf->setOption('margin-bottom', '30');  // space for footer
        // $pdf->setOption('margin-left', '10');
        // $pdf->setOption('margin-right', '10');

        // $pdf->setOption('enable-local-file-access', true);
        // $pdf->setOption('enable-javascript', true);
        // $pdf->setOption('load-error-handling', 'ignore');
        // $pdf->setOption('load-media-error-handling', 'ignore');


        // // HEADER
        // $pdf->setOption('header-html', view('pdf.header')->render());
        // $pdf->setOption('header-spacing', 5);

        // // FOOTER
        // $pdf->setOption('footer-html', view('pdf.footer')->render());
        // $pdf->setOption('footer-spacing', 5);
        // return $pdf->stream('School_Report.pdf');

        /*
        ┌─────────────────────────────────────────────────────────────────────┐
        │  ALTERNATE: If page numbers don't show, use a separate header HTML  │
        │  file instead of position:fixed in the body.                        │
        │                                                                     │
        │  1. Remove the #rpt-header div from blade.                          │
        │  2. Create resources/views/pdf_header.blade.php:                    │
        │       <!DOCTYPE html><html><head>                                   │
        │       <style>body{font-family:Arial;font-size:9px;padding:4px 14mm;}│
        │       </style></head><body>                                         │
        │       <img src="/path/to/logo.svg" style="height:22px;float:left"/> │
        │       <span style="float:right">Page <span class="page"></span>     │
        │       of <span class="topage"></span></span>                        │
        │       </body></html>                                                │
        │                                                                     │
        │  3. Then in controller:                                             │
        │       ->setOption('header-html', view('pdf_header')->render())      │
        │       ->setOption('header-spacing', 2)                              │
        │       ->setOption('margin-top', '15mm')                             │
        └─────────────────────────────────────────────────────────────────────┘
        */
    }

    public function exportCondolence($id, $letter_id)
    {
        $condolence = Condolence::where('id',$id)->first();
        $template_select = LetterTemplate::select('id','description','header_footer_id')
            ->where('id',$letter_id)
            ->where('staff_id',auth()->user()->id)
            ->first();
        if(!empty($template_select->id)){
            $str = str_replace("{name}",$condolence->name,$template_select->description);
            $str = str_replace("{name_of_relative}",$condolence->name_of_relative,$str);
            $str = str_replace("{relative_relationship_of_the_deceased}",$condolence->relative_relationship_of_the_deceased,$str);
            if(!empty($condolence->date_of_death)){
                $str = str_replace("{date_of_death}",date('d M Y',strtotime($condolence->date_of_death)),$str);
            }
            $str = str_replace("{whether_to_sit_or_not}",$condolence->whether_to_sit_or_not,$str);
            if(!empty($condolence->going_date)){
                $str = str_replace("{going_date}",date('d M Y',strtotime($condolence->going_date)),$str);
            }
            if(!empty($condolence->created_at)){
                $str = str_replace("{created_at}",date('d/m/Y',strtotime($condolence->created_at)),$str);
            }
            $str = str_replace("{mobile}",$condolence->mobile,$str);
            $str = str_replace("{address}",$condolence->address,$str);
            $str = str_replace("{village}",$condolence->village,$str);
            $str = str_replace("{district}",$condolence->district,$str);
            $str = str_replace("{pincode}",$condolence->pincode,$str);
            $str = str_replace("{letter_id}",$condolence->letter_id,$str);
            $html = $str;
        }
        if(!empty($template_select->header_footer_id)){
            $header_footer = HeaderFooter::select('header_image','footer_image')
                ->where('staff_id',auth()->user()->id)
                ->where('id',$template_select->header_footer_id)
                ->first();
            if(empty($header_footer->header_image)){
                return redirect()->back()->with('error','Opps! header & footer not found');
            }
        }else{
            return redirect('condolence')->with('error','Opps! header & footer not found');
        }
        $htmlContent = view('user.word_html.content',compact('html'))->render();
        $htmlContent = $this->sanitizeHtml($htmlContent);
        $phpWord = new PhpWord();
        $section = $phpWord->createSection();
        if (!empty($header_footer->header_image)) {
            $header = $section->addHeader();
            $header->addImage(public_path($header_footer->header_image), [
                'width'=>600,
                'marginLeft' => -75,
                'positioning'=>'absolute',
                'wrappingStyle'=> 'behind',
                'posHorizontal' => 'absolute',
                'posVertical' => 'absolute',
                'marginTop'=>0,
            ]);
        }
        if (!empty($header_footer->footer_image)) {
            $footer = $section->addFooter();
            $footer->addImage(public_path($header_footer->footer_image), [
                'width'=>600,
                'marginLeft' => -75,
                'positioning'=>'absolute',
                'posHorizontal' => 'absolute',
                'posVertical' => 'absolute',
                'marginTop'=>-50,
            ]);
        }
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlContent, false, false);
        $fileName = 'condolence.docx';
        $filePath = storage_path($fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
