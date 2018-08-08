<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use Carbon\Carbon;
use PDF;

class ReportsController extends Controller
{
    public function hiredApplicantReport(Request $request) {
        $hired = Applicant::where('hired', 1)->get();

        PDF::setHeaderCallback(function($pdf) {
            PDF::Image('img/patton-logo.png', 60, 13, 20, 'PNG');
            PDF::SetFont('dejavusans','', 13);
            PDF::Ln(5);
            PDF::Cell(0, 10, '', 0, 1, 'C');
            PDF::Cell(0,10,'                    PATTON SECURITY AND INVESTIGATION AGENCY, INC.', 0, 1, 'C');
            PDF::SetFont('dejavusans','', 10);
            PDF::Cell(0,0,'                    869, Rizal St., Old Albay Legazpi City 4500 Tel No. (052) 481-0321, (052) 435-3992', 0, 1, 'C');
            PDF::Line(10, 40, 290, 40);
       });

        PDF::SetMargins(10, 10, 10, 10);
        PDF::SetTitle('Hired Applicants');
        PDF::AddPage('L', 'A4');
        PDF::Ln(40);
        PDF::SetFont('dejavusans','', 15);
        PDF::Cell(0, 10, 'List of Hired Applicants', 0, 1, 'C');

        PDF::Line(191,332,25,332);
        PDF::Cell(50, 6, '', 0, 1);
        PDF::SetFont('dejavusans','', 9);

        $html = '<table cellspacing="0" cellpadding="2" border="1">
                    <tr style="font-weight: bold;">
                        <td>Name</td>
                        <td>Position</td>
                        <td>Present Address</td>
                        <td>Contact</td>
                        <td>Date of Birth</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Status</td>
                        <td>Score</td>
                        <td>Date Hired</td>
                    </tr>';

        foreach($hired as $row) {
        if (empty($row->date_hired)) {
            $date_hired = '';
        } else {
            $date_hired = $row->date_hired->format('F d, Y h:i A');
        }
        $html .= '<tr>
                    <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                    <td>'.$row->jobVacancies->name.'</td>
                    <td>'.$row->address.'</td>
                    <td>'.$row->mobile.'</td>
                    <td>'.$row->date_of_birth.'</td>
                    <td>'.$row->age.'</td>
                    <td>'.$row->gender.'</td>
                    <td>Hired</td>
                    <td>Score</td>
                    <td>'.$date_hired.'</td>
                </tr>';
        }

        $html .= '</table>';

        PDF::writeHTML($html);
        PDF::Output();
    }

    public function approvedApplicantReport(Request $request) {
        $hired = Applicant::where('approved', 1)->get();

        PDF::setHeaderCallback(function($pdf) {
            PDF::Image('img/patton-logo.png', 60, 13, 20, 'PNG');
            PDF::SetFont('dejavusans','', 13);
            PDF::Ln(5);
            PDF::Cell(0, 10, '', 0, 1, 'C');
            PDF::Cell(0,10,'                    PATTON SECURITY AND INVESTIGATION AGENCY, INC.', 0, 1, 'C');
            PDF::SetFont('dejavusans','', 10);
            PDF::Cell(0,0,'                    869, Rizal St., Old Albay Legazpi City 4500 Tel No. (052) 481-0321, (052) 435-3992', 0, 1, 'C');
            PDF::Line(10, 40, 290, 40);
       });

        PDF::SetMargins(10, 10, 10, 10);
        PDF::SetTitle('Approved Applicants');
        PDF::AddPage('L', 'A4');
        PDF::Ln(40);
        PDF::SetFont('dejavusans','', 15);
        PDF::Cell(0, 10, 'List of Approved Applicants', 0, 1, 'C');

        PDF::Line(191,332,25,332);
        PDF::Cell(50, 6, '', 0, 1);
        PDF::SetFont('dejavusans','', 9);

        $html = '<table cellspacing="0" cellpadding="2" border="1">
                    <tr style="font-weight: bold;">
                        <td>Name</td>
                        <td>Position</td>
                        <td>Present Address</td>
                        <td>Contact</td>
                        <td>Date of Birth</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Status</td>
                        <td>Score</td>
                        <td>Date Approved</td>
                    </tr>';

        foreach($hired as $row) {
        if (empty($row->date_approved)) {
            $date_approved = '';
        } else {
            $date_approved = Carbon::parse($row->date_approved)->format('F d, Y h:i A');
        }
        $html .= '<tr>
                    <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                    <td>'.$row->jobVacancies->name.'</td>
                    <td>'.$row->address.'</td>
                    <td>'.$row->mobile.'</td>
                    <td>'.$row->date_of_birth.'</td>
                    <td>'.$row->age.'</td>
                    <td>'.$row->gender.'</td>
                    <td>Approved</td>
                    <td>'.$row->score.'</td>
                    <td>'.$date_approved.'</td>
                </tr>';
        }

        $html .= '</table>';

        PDF::writeHTML($html);
        PDF::Output();
    }
}