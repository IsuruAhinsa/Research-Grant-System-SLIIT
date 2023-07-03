<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $research_proposal_application_size = Storage::disk('public')->size('docs/Research_Proposal_Application.docx');
        $other_research_document_size = Storage::disk('public')->size('docs/Other Research Documents.xlsx');

        $research_proposal_application_size = number_format($research_proposal_application_size / 1024, 2) . " kb";
        $other_research_document_size = number_format($other_research_document_size / 1024, 2) . " kb";

        return view('downloads', [
            'research_proposal_application_size' => $research_proposal_application_size,
            'other_research_document_size' => $other_research_document_size,
        ]);
    }

    public function downloadResearchProposalApplicationFrom()
    {
        if (Storage::disk('public')->exists('docs/Research_Proposal_Application.docx')) {
            return Storage::disk('public')->download('docs/Research_Proposal_Application.docx');
        }
    }

    public function downloadOtherResearchDocument()
    {
        if (Storage::disk('public')->exists('docs/Other Research Documents.xlsx')) {
            return Storage::disk('public')->download('docs/Other Research Documents.xlsx');
        }
    }

    public function downloadUserGuide()
    {
        if (Storage::disk('public')->exists('docs/Principal Investigator User Guide.pdf')) {
            return Storage::disk('public')->download('docs/Principal Investigator User Guide.pdf');
        }
    }
}
