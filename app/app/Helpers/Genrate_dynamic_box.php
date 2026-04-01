<?php

use App\Models\LabsDetails;
use App\Models\SystemCheck;
use Illuminate\Support\Facades\Auth;

if (!function_exists('Genrate_dynamic_box')) {
    function Genrate_dynamic_box($labname)
    {
        $user = Auth::guard('school')->user();
        $labs = LabsDetails::where('registration_id', $user->id)->where('labs_name', $labname)->get();
        $output = '<div class="lab-checkbox-grid">';
        foreach ($labs as $lab) {
            $output .= '<div class="checkbox-row">';
            for ($col = 1; $col <= $lab->computer_qty; $col++) {
                $id = "{$labname}-{$col}";
                $checked = SystemCheck::where('lab_id', $labname)
                        ->where('pc_id', $col)
                        ->where('school_id', $user->id)
                        ->where('status', 'Pass')
                        ->exists();
                $isChecked = $checked ? 'checked' : '';
                $iconStyle = $checked ? 'checked' : '';
                $color = $checked ? asset('admin/images/geen_computer.png') : asset('admin/images/red_computer.png');
                $output .= '
                    <label class="checkbox-container">
                        <input type="checkbox" id="' . $id . '" onchange="toggleIcon(\''.$id.'\')" '.$isChecked.'>
                        <span class="check-icon '.$iconStyle.'" id="icon-' . $id . '">
                            <img src="'.$color.'" alt="PC" width="35" height="35">
                        </span>
                        <small>' . $labname . "-PC" . $col . '</small>
                    </label>
                ';
                if ($col % 10 == 0 && $col != $lab->computer_qty) {
                    $output .= '</div><div class="checkbox-row">';
                }
            }
            $output .= '</div>';
        }
        $output .= '</div>'; 
        return $output;
    }
}
if (!function_exists('genrate_box')) {
    function genrate_box($labname)
    {
        $user = Auth::guard('school')->user();
        $labs = LabsDetails::where('registration_id', $user->id)->where('labs_name', $labname)->value('computer_qty');
        $count = SystemCheck::where('lab_id', $labname)
            ->where('school_id', $user->id)
            ->where('status', 'Pass')
            ->count();
        return ['labs'=>$labs,'count'=>$count];
    }
}
