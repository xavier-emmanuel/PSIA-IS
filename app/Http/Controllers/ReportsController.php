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
            PDF::Cell(0,10,'              PATTON SECURITY AND INVESTIGATION AGENCY, INC.', 0, 1, 'C');
            PDF::SetFont('dejavusans','', 9);
            PDF::Cell(0,0,'                    869, Rizal St., Old Albay Legazpi City 4500 Tel No. (052) 481-0321, (052) 435-3992', 0, 1, 'C');
            PDF::Line(10, 40, 290, 40);
       });

        PDF::SetMargins(10, 10, 10, 10);
        PDF::SetTitle('Hired Applicants');
        PDF::AddPage('L', 'A4');
        PDF::Ln(40);
        PDF::SetFont('dejavusans','', 15);
        PDF::Cell(0, 10, 'Hired Applicants', 0, 1, 'C');

        PDF::Line(191,332,25,332);
        PDF::Cell(50, 6, '', 0, 1);
        PDF::SetFont('dejavusans','', 9);

        $html = '<table cellspacing="0" cellpadding="2" border="1">
                    <tr style="font-weight: bold;">
                        <td width="20%">Name</td>
                        <td width="20%">Position</td>
                        <td width="20%">Present Address</td>
                        <td>Contact</td>
                        <td width="5%">Age</td>
                        <td width="6%">Gender</td>
                        <td width="5%">Score</td>
                        <td>Date Hired</td>
                    </tr>';

        foreach($hired as $row) {
        if (empty($row->date_hired)) {
            $date_hired = '';
        } else {
            $date_hired = Carbon::parse($row->date_hired)->format('F d, Y');
        }
        $html .= '<tr>
                    <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                    <td>'.$row->jobVacancies->name.'</td>
                    <td>'.$row->address.'</td>
                    <td>'.$row->mobile.'</td>
                    <td>'.$row->age.'</td>
                    <td>'.$row->gender.'</td>
                    <td>'.$row->score.'</td>
                    <td>'.$date_hired.'</td>
                </tr>';
        }

        $html .= '</table>';

        PDF::writeHTML($html);
        PDF::Output();
    }

    public function approvedApplicantReport(Request $request) {
        $hired = Applicant::where('approved', 1)->where('hired', 0)->get();

        PDF::setHeaderCallback(function($pdf) {
            PDF::Image('img/patton-logo.png', 60, 13, 20, 'PNG');
            PDF::SetFont('dejavusans','', 13);
            PDF::Ln(5);
            PDF::Cell(0, 10, '', 0, 1, 'C');
            PDF::Cell(0,10,'              PATTON SECURITY AND INVESTIGATION AGENCY, INC.', 0, 1, 'C');
            PDF::SetFont('dejavusans','', 9);
            PDF::Cell(0,0,'                    869, Rizal St., Old Albay Legazpi City 4500 Tel No. (052) 481-0321, (052) 435-3992', 0, 1, 'C');
            PDF::Line(10, 40, 290, 40);
       });

        PDF::SetMargins(10, 10, 10, 10);
        PDF::SetTitle('Approved Applicants');
        PDF::AddPage('L', 'A4');
        PDF::Ln(40);
        PDF::SetFont('dejavusans','', 15);
        PDF::Cell(0, 10, 'Approved Applicants', 0, 1, 'C');

        PDF::Line(191,332,25,332);
        PDF::Cell(50, 6, '', 0, 1);
        PDF::SetFont('dejavusans','', 9);

        $html = '<table cellspacing="0" cellpadding="2" border="1">
                    <tr style="font-weight: bold;">
                    <td width="20%">Name</td>
                    <td width="20%">Position</td>
                    <td width="20%">Present Address</td>
                    <td>Contact</td>
                    <td width="5%">Age</td>
                    <td width="6%">Gender</td>
                    <td width="5%">Score</td>
                    <td>Date Approved</td>
                </tr>';

        foreach($hired as $row) {
        if (empty($row->date_approved)) {
            $date_approved = '';
        } else {
            $date_approved = Carbon::parse($row->date_approved)->format('F d, Y');
        }
        $html .= '<tr>
                    <td>'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</td>
                    <td>'.$row->jobVacancies->name.'</td>
                    <td>'.$row->address.'</td>
                    <td>'.$row->mobile.'</td>
                    <td>'.$row->age.'</td>
                    <td>'.$row->gender.'</td>
                    <td>'.$row->score.'</td>
                    <td>'.$date_approved.'</td>
                </tr>';
        }

        $html .= '</table>';

        PDF::writeHTML($html);
        PDF::Output();
    }

    public function applicationFormReport($id) {
        $applicant = Applicant::find($id);

        PDF::SetMargins(10, 10, 10, 10);
        PDF::SetTitle('Application Form');
        PDF::AddPage('P', 'Legal');
        PDF::SetLineStyle( array( 'width' => 0.5, 'color' => array(0,0,0)));
        PDF::Rect(10, 10, 189.9, 278);
        PDF::SetFont('dejavusans','', 15);
        PDF::Cell(149, 45, 'Application Form', 0, 1, 'C');

        PDF::SetFont('dejavusans','B', 8);
        PDF::Cell(19, 5, 'Date Hired:', 0, 0, '');
        PDF::SetFont('dejavusans','', 8);
        PDF::Cell(130, 5, empty($applicant->date_hired) ? 'N/A' : Carbon::parse($applicant->date_hired)->format('F d, Y'), 0, 1, '');

        // PERSONAL INFORMATION
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::Cell(189.9, 5, '', 0, 1, '');
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '1. PERSONAL INFORMATION', 'BT', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        // NAME
        PDF::SetFont('dejavusans', 'B', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, 'Last Name', 0, 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'First Name', 0, 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Middle Name', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY NAME HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(63.3, 5, $applicant->last_name, 'B', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, $applicant->first_name, 'B', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, $applicant->middle_name, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::MultiCell(45, 5, 'Date of Birth (mm-dd-yyyy)', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(84.9, 5, 'Place of Birth (City/Municipality/Province)', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(20, 5, 'Sex', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(25, 5, 'Civil Status', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(15, 5, 'Age', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(45, 5, $applicant->date_of_birth, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(84.9, 5, $applicant->place_of_birth, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(20, 5, $applicant->gender, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(25, 5, $applicant->civil_status, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(15, 5, $applicant->age, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::MultiCell(47.4, 5, 'Height (in centimeter)', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Weight (in kilo)', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Religion', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Contact Number', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->height, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->weight, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->religion, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->mobile, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // SPOUSE
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     1.1. Spouse (Married or Unmarried)', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);
        // NAME
        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(47.4, 5, 'Full Name', 0, 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Date of Birth (mm-dd-yyyy)', 0, 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Occupation', 0, 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Dependent', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY SPOUSE NAME HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->spouse_name) ? 'N/A' : $applicant->personalInfos->spouse_name, 'B', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->spouse_birth_date) ? 'N/A' : $applicant->personalInfos->spouse_birth_date, 'B', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->spouse_occupation) ? 'N/A' : $applicant->personalInfos->spouse_occupation, 'B', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->spouse_dependent) ? 'N/A' : $applicant->personalInfos->spouse_dependent, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // CHILDRED
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     1.2. Children (If any)', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);
        // NAME
        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, 'Full Name', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Date of Birth (mm-dd-yyyy)', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Occupation', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY CHILD NAME HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->child_name_1) ? '     N/A' : $applicant->personalInfos->child_name_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_birth_date_1) ? 'N/A' : $applicant->personalInfos->child_birth_date_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_occupation_1) ? 'N/A' : $applicant->personalInfos->child_occupation_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->child_name_2) ? '     N/A' : $applicant->personalInfos->child_name_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_birth_date_2) ? 'N/A' : $applicant->personalInfos->child_birth_date_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_occupation_2) ? 'N/A' : $applicant->personalInfos->child_occupation_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->child_name_3) ? '     N/A' : $applicant->personalInfos->child_name_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_name_3) ? 'N/A' : $applicant->personalInfos->child_name_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->child_name_3) ? 'N/A' : $applicant->personalInfos->child_name_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // ADDRESS
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     1.3. Address', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(142.3, 5, 'Present Address', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Contact Number', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY ADDRESS HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(142.3, 5, '     '.$applicant->address, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->mobile, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(142.3, 5, 'Provincial Address', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Contact Number', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY ADDRESS HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(142.3, 5, '     '.$applicant->personalInfos->provincial_address, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->phone_number) ? 'N/A' : $applicant->personalInfos->phone_number, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // GOVERNMENT IDS
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     1.4. Government IDs (If applicable)', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, 'SSS Number', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Tax Identification Number (TIN)', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'PhilHealth', 'R', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY GOVERNMENT IDS HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->sss_number) ? 'N/A' : $applicant->personalInfos->sss_number, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->tin_number) ? 'N/A' : $applicant->personalInfos->tin_number, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->philhealth_number) ? 'N/A' : $applicant->personalInfos->philhealth_number, 'BR', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::MultiCell(63.3, 5, 'License No. / SBR No.', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Date Issued (mm-dd-yyyy)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Expiration Date (mm-dd-yyyy)", 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->license_number) ? 'N/A' : $applicant->personalInfos->license_number, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->date_issued) ? 'N/A' : $applicant->personalInfos->date_issued, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(63.3, 5, empty($applicant->personalInfos->expiration_date) ? 'N/A' : $applicant->personalInfos->expiration_date, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // FAMILY MEMBERS
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '2. FAMILY MEMBERS', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);
        // PARENT DETAILS
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, "     2.1. Parent's Details ", 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, 'Full Name', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Date of Birth (mm-dd-yyyy)', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Occupation', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);
        // DISPLAY HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalInfos->father_name, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->father_birth_date, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->father_occupation, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalInfos->mother_name, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->mother_birth_date, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->mother_occupation, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        // SIBLINGS DETAILS
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, "     2.2. Sibling's Details ", 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, 'Full Name', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Date of Birth (mm-dd-yyyy)', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Occupation', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);// // DISPLAY HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->siblings_name_1) ? '     N/A' : $applicant->personalInfos->siblings_name_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_birth_date_1) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_occupation_1) ? 'N/A' : $applicant->personalInfos->siblings_occupation_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->siblings_name_2) ? '     N/A' : $applicant->personalInfos->siblings_name_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_birth_date_2) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_occupation_2) ? 'N/A' : $applicant->personalInfos->siblings_occupation_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.empty($applicant->personalInfos->siblings_name_3) ? '     N/A' : $applicant->personalInfos->siblings_name_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_birth_date_3) ? 'N/A' : $applicant->personalInfos->siblings_birth_date_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, empty($applicant->personalInfos->siblings_occupation_3) ? 'N/A' : $applicant->personalInfos->siblings_occupation_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // CONTACT PERSON
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '3. CONTACT PERSON (In case of Emergency)', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, 'Full Name', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Relation', 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Contact Number', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true); // DISPLAY HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalInfos->contact_name, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->contact_relation, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalInfos->contact_number, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);


        PDF::SetFont('dejavusans', '', 8);
        PDF::MultiCell(189.9, 5, 'Address', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);
        // DISPLAY HERE
        PDF::SetFont('dejavusans','', 9);
        PDF::MultiCell(189.9, 5, $applicant->personalInfos->contact_address, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);

        // IMAGE
        PDF::Image(\App::environment('production') ? '/public/uploads/accounts/'.$applicant->image : '/uploads/accounts/'.$applicant->image, 149, 10, 50.8, 50.8, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

        //
        // SECOND PAGE DISPLAYS HERE
        //
        PDF::AddPage('P', 'Legal');
        PDF::SetLineStyle( array( 'width' => 0.5, 'color' => array(0,0,0)));
        PDF::Rect(10, 10, 189.9, 278);

        // EDUCATIONAL BACKGROUND
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '4. EDUCATIONAL BACKGROUND', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(55.9, 10, "Name of School\n(Elementary - Tertiary)", 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(60, 10, 'Address', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(37, 10, 'Honor/Award', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(37, 10, 'Year Graduated', 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(55.9, 10, $applicant->educationalBackground->elementary_school, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, $applicant->educationalBackground->elementary_address, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->educationalBackground->elementary_award) ? 'N/A' : $applicant->educationalBackground->elementary_award, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, $applicant->educationalBackground->elementary_year, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(55.9, 10, $applicant->educationalBackground->highschool_school, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, $applicant->educationalBackground->highschool_address, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->educationalBackground->highschool_award) ? 'N/A' : $applicant->educationalBackground->highschool_award, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, $applicant->educationalBackground->highschool_year, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(55.9, 10, $applicant->educationalBackground->college_school, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, $applicant->educationalBackground->college_address, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->educationalBackground->college_award) ? 'N/A' : $applicant->educationalBackground->college_award, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, $applicant->educationalBackground->college_year, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // GOVERNMENT EXAMS TAKEN
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '5. GOVERNMENT EXAMS TAKEN', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(55.9, 5, "Type/Title of Examination", 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(60, 5, 'Place Taken', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(37, 5, 'Date Taken', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(37, 5, 'Result/Grade', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(55.9, 10, empty($applicant->governmentExams->examination_1) ? '     N/A' : $applicant->governmentExams->examination_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, empty($applicant->governmentExams->examination_place_taken_1) ? '     N/A' : $applicant->governmentExams->examination_place_taken_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_date_taken_1) ? 'N/A' : $applicant->governmentExams->examination_date_taken_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_result_1) ? 'N/A' : $applicant->governmentExams->examination_result_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(55.9, 10, empty($applicant->governmentExams->examination_2) ? '     N/A' : $applicant->governmentExams->examination_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, empty($applicant->governmentExams->examination_place_taken_2) ? '     N/A' : $applicant->governmentExams->examination_place_taken_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_date_taken_2) ? 'N/A' : $applicant->governmentExams->examination_date_taken_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_result_2) ? 'N/A' : $applicant->governmentExams->examination_result_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(55.9, 10, empty($applicant->governmentExams->examination_3) ? '     N/A' : $applicant->governmentExams->examination_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(60, 10, empty($applicant->governmentExams->examination_place_taken_3) ? '     N/A' : $applicant->governmentExams->examination_place_taken_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_date_taken_3) ? 'N/A' : $applicant->governmentExams->examination_date_taken_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 10, 'M', true);
        PDF::MultiCell(37, 10, empty($applicant->governmentExams->examination_result_3) ? 'N/A' : $applicant->governmentExams->examination_result_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // ORGANIZATIONS

        $year_of_employment1 = $applicant->organizations->organization_date_from_1 .'-'. $applicant->organizations->organization_date_to_1;
        $year_of_employment2 = $applicant->organizations->organization_date_from_2 .'-'. $applicant->organizations->organization_date_to_2;
        $year_of_employment3 = $applicant->organizations->organization_date_from_3 .'-'. $applicant->organizations->organization_date_to_3;

        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '6. SCHOOL/CIVIC/BUSINESS/LOCAL ORGANIZATIONS', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, "Name of Organization", 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, "Years of Membership (From-To)", 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Position', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 8, empty($applicant->organizations->organization_name_1) ? '     N/A' : $applicant->organizations->organization_name_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_date_from_1) ? 'N/A' : $year_of_employment1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_position_1) ? 'N/A' : $applicant->organizations->organization_position_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, empty($applicant->organizations->organization_name_2) ? '     N/A' : $applicant->organizations->organization_name_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_date_from_2) ? 'N/A' : $year_of_employment2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_position_2) ? 'N/A' : $applicant->organizations->organization_position_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, empty($applicant->organizations->organization_name_3) ? '     N/A' : $applicant->organizations->organization_name_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_date_from_3) ? 'N/A' : $year_of_employment3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, empty($applicant->organizations->organization_position_3) ? 'N/A' : $applicant->organizations->organization_position_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        // EMPLOYMENT RECORD
        $period_of_employment1 = $applicant->employmentRecord->period_of_emlployment_from_1 .'-'. $applicant->employmentRecord->period_of_emlployment_to_1;
        $period_of_employment2 = $applicant->employmentRecord->period_of_emlployment_from_2 .'-'. $applicant->employmentRecord->period_of_emlployment_to_2;
        $period_of_employment3 = $applicant->employmentRecord->period_of_emlployment_from_3 .'-'. $applicant->employmentRecord->period_of_emlployment_to_3;
        
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '7. EMPLOYMENT RECORD (Previous Employers)', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);
        // COMPANY 1
        PDF::MultiCell(189.9, 6, '     7.1. Company 1', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Company Name", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Period of Employment (mm-dd-yyyy)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Address', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_name_1) ? 'N/A' : $applicant->employmentRecord->company_name_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->period_of_emlployment_from_1) ? 'N/A' : $period_of_employment1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_address_1) ? '     N/A' : $applicant->employmentRecord->company_address_1, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Last Position", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Name of Immediate Superior", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Nature of Job', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->work_position_1) ? 'N/A' : $applicant->employmentRecord->work_position_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->superior_name_1) ? 'N/A' : $applicant->employmentRecord->superior_name_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->nature_of_job_1) ? 'N/A' : $applicant->employmentRecord->nature_of_job_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Starting Salary", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Salary upon Leaving", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Reason for Leaving', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->starting_salary_1) ? 'N/A' : $applicant->employmentRecord->starting_salary_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->salary_upon_leaving_1) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->reason_of_leaving_1) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        // COMPANY 2
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     7.2. Company 2', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Company Name", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Period of Employment (mm-dd-yyyy)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Address', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_name_2) ? 'N/A' : $applicant->employmentRecord->company_name_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->period_of_emlployment_from_2) ? 'N/A' : $period_of_employment2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_address_2) ? '     N/A' : $applicant->employmentRecord->company_address_2, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Last Position", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Name of Immediate Superior", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Nature of Job', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->work_position_2) ? 'N/A' : $applicant->employmentRecord->work_position_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->superior_name_2) ? 'N/A' : $applicant->employmentRecord->superior_name_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->nature_of_job_2) ? 'N/A' : $applicant->employmentRecord->nature_of_job_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Starting Salary", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Salary upon Leaving", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Reason for Leaving', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->starting_salary_2) ? 'N/A' : $applicant->employmentRecord->starting_salary_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->salary_upon_leaving_2) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->reason_of_leaving_2) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        // COMPANY 3
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '     7.3. Company 3', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Company Name", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Period of Employment (mm-dd-yyyy)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Address', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_name_3) ? 'N/A' : $applicant->employmentRecord->company_name_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->period_of_emlployment_from_3) ? 'N/A' : $period_of_employment3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->company_address_3) ? '     N/A' : $applicant->employmentRecord->company_address_3, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Last Position", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Name of Immediate Superior", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Nature of Job', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->work_position_3) ? 'N/A' : $applicant->employmentRecord->work_position_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->superior_name_3) ? 'N/A' : $applicant->employmentRecord->superior_name_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->nature_of_job_3) ? 'N/A' : $applicant->employmentRecord->nature_of_job_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 5, "Starting Salary", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, "Salary upon Leaving", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(63.3, 5, 'Reason for Leaving', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->starting_salary_3) ? 'N/A' : $applicant->employmentRecord->starting_salary_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->salary_upon_leaving_3) ? 'N/A' : $applicant->employmentRecord->salary_upon_leaving_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(63.3, 8, empty($applicant->employmentRecord->reason_of_leaving_3) ? 'N/A' : $applicant->employmentRecord->reason_of_leaving_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        //
        // THIRD PAGE DISPLAYS HERE
        //
        PDF::AddPage('P', 'Legal');
        PDF::SetLineStyle( array( 'width' => 0.5, 'color' => array(0,0,0)));
        PDF::Rect(10, 10, 189.9, 278);

        // OTHERS
        if ($applicant->questions->convicted == '0') {
            $convicted = 'No';
        } else {
            $convicted = 'Yes, '. $applicant->questions->convicted_details;
        }

        if ($applicant->questions->health_problems == '0') {
            $health_problems = 'No';
        } else {
            $health_problems = 'Yes, '. $applicant->questions->health_problems_details;
        }

        if ($applicant->questions->accident == '0') {
            $accident = 'No';
        } else {
            $accident = 'Yes, '. $applicant->questions->accident_details;
        }

        if ($applicant->questions->relative == '0') {
            $relative = 'No';
        } else {
            $relative = 'Yes, '. $applicant->questions->relative_name;
        }

        if ($applicant->questions->provincial_assignments == '0') {
            $provincial_assignments = 'No';
        } else {
            $provincial_assignments = 'Yes, '. $applicant->questions->preffered_office;
        }

        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '8. OTHERS', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(47.4, 5, "Dialect/Language(s)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, "Skills", 'R', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(94.9, 5, 'Have you ever convicted? (If YES, state the reason)', 0, 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(47.4, 8, $applicant->questions->dialect, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(47.4, 8, $applicant->questions->skills, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, $convicted, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 10, "Do you have any health problems (If YES, kindly describe)
        ", 'R', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(94.9, 10, 'Have you ever had an operation/accident? (If YES, kindly describe)', 0, 'C', 1, 1, '', '', true, 0, false, true, 10, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 8, $health_problems, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, $accident, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 10, "Who recommended you in this company?", 'R', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(94.9, 10, 'Do you have friend(s) or relative(s) working in the company? (If YES, kindly state the name and relation)', 0, 'C', 1, 1, '', '', true, 0, false, true, 10, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 8, empty($applicant->questions->recommend_name) ? 'N/A' : $applicant->questions->recommend_name, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, $relative, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 10, "Are you willing to accept provincial assignments? (If YES, kindly state your preffered province)", 'R', 'C', 1, 0, '', '', true, 0, false, true, 10, '', true);
        PDF::MultiCell(94.9, 10, 'Other experiences/training(s)', 0, 'C', 1, 1, '', '', true, 0, false, true, 10, '', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 8, $provincial_assignments, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 8, 'M', true);
        PDF::MultiCell(94.9, 8, $applicant->questions->skills_select, 'B', 'C', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 10, '     In fifty words or less, please describe yourself. Indicate your likes and dislikes, strengths and areas of improvements, hobbies and interest among others', 'B', 'L', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(189.9, 20, '          '.$applicant->questions->self_description, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 10, '     Explain why you joined Patton Security & Investigation Agency Inc,.?', 'B', 'L', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(189.9, 20, '          '.$applicant->questions->reason_of_applying, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 10, '     Briefly state our personal and career goals. How do you see yourself in five years from today?', 'B', 'L', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(189.9, 20, '          '.$applicant->questions->career_goals, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 10, '     State your three (3) most important accomplishment in life', 'B', 'L', 1, 1, '', '', true, 0, false, true, 10, 'M', true);

        // DISPLAY HERE
        PDF::SetFont('dejavusans', '', 9);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(189.9, 20, '          '.$applicant->questions->accomplishments, 'B', '', 1, 1, '', '', true, 0, false, true, 8, 'M', true);

        // PERSONAL PREFERENCES
        PDF::SetFont('dejavusans', 'B', 9);
        PDF::SetFillColor(222, 226, 230);
        PDF::MultiCell(189.9, 6, '9. PERSONAL PREFERENCES', 'B', 'L', 1, 1, '', '', true, 0, false, true, 6, 'M', true);

        PDF::SetFont('dejavusans', '', 8);
        PDF::SetFillColor(255, 255, 255);
        PDF::MultiCell(94.9, 5, 'Full Name', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Occupation', 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, '', true);
        PDF::MultiCell(47.4, 5, 'Contact Number', 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, '', true);

        // DISPLAY HERE
        // DO NOT REMOVE SPACES INSIDE QUOTATION
        PDF::SetFont('dejavusans', '', 9);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalPreference->preference_name_1, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_occupation_1, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_contact_1, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalPreference->preference_name_2, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_occupation_2, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_contact_2, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(94.9, 5, '     '.$applicant->personalPreference->preference_name_3, 'BR', '', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_occupation_3, 'BR', 'C', 1, 0, '', '', true, 0, false, true, 5, 'M', true);
        PDF::MultiCell(47.4, 5, $applicant->personalPreference->preference_contact_3, 'B', 'C', 1, 1, '', '', true, 0, false, true, 5, 'M', true);


        PDF::MultiCell(189.9, 15, '', 0, 'C', 1, 1, '', '', true, 0, false, true, 15, 'M', true);
        PDF::MultiCell(189.9, 20, '     I hereby certify that i have carefully read and understand the contents of this application form and that I agree to abide and be bound by the terms and conditions for my employment with Patton Security and Investigation Agency. Inc. I authorized the company to investigate the veracity of all information contained in this application. Any wittful falsification entered herein shall be considered a just cause for the forfeiture of this application/ termination of my employment.', 0, '', 1, 0, '', '', true, 0, false, true, 20, 'M', true);

        PDF::Output();
    }
}