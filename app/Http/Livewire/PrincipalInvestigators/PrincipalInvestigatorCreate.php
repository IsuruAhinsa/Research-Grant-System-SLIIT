<?php

namespace App\Http\Livewire\PrincipalInvestigators;

use App\Mail\ResearchProposalSubmitted;
use App\Models\CoPrincipalInvestigator;
use App\Models\Designation;
use App\Models\Faculty;
use App\Models\PrincipalInvestigator;
use App\Models\ResearchAssistant;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;

class PrincipalInvestigatorCreate extends Component implements HasForms
{
    use InteractsWithForms;

    public $title;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $research_title;
    public $designation_id;
    public $faculty_id;
    public $dean_name;
    public $dean_email;
    public $resume;
    public $research_grant_proposal;
    public $budget_activity_plan;
    public $co_pi_attachments = [];
    public $assistant_attachments = [];
    public $user_id;
    public $type;

    protected $messages = [
        'email.ends_with' => 'Please enter the valid email domain. (sliit.lk)'
    ];

    public function mount(): void
    {
        $this->form->fill([
            'email' => Auth::user()->email,
            'title' => Auth::user()->title,
            'first_name' => Auth::user()->first_name,
            'last_name' => Auth::user()->last_name,
            'designation_id' => Auth::user()->designation_id,
            'faculty_id' => Auth::user()->faculty_id,
            'user_id' => Auth::id(),
            'type' => 'NEW',
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Wizard\Step::make('Principal Investigator Details')
                    ->description('Fill your details and upload documents.')
                    ->schema([
                        Grid::make(2)->schema([

                            Hidden::make('user_id'),

                            Hidden::make('type'),

                            TextInput::make('title')
                                ->datalist([
                                    'Dr',
                                    'Esq',
                                    'Hon',
                                    'Jr',
                                    'Mr',
                                    'Mrs',
                                    'Ms',
                                    'Messrs',
                                    'Mmes',
                                    'Msgr',
                                    'Prof',
                                    'Rev',
                                    'Rt. Hon',
                                    'Sr',
                                    'St',
                                ])
                                ->string()
                                ->placeholder('Please select the title.')
                                ->required(),

                            TextInput::make('first_name')
                                ->string()
                                ->maxLength(50)
                                ->placeholder('Enter your first name.')
                                ->required(),

                            TextInput::make('last_name')
                                ->string()
                                ->maxLength(50)
                                ->placeholder('Enter your last name.')
                                ->required(),

                            TextInput::make('email')
                                ->string()
                                ->maxLength(75)
                                ->email()
                                ->placeholder('Enter your sliit email address.')
                                ->endsWith(['sliit.lk'])
                                ->required(),

                            TextInput::make('phone')
                                ->string()
                                ->maxLength(75)
                                ->placeholder('Enter your contact number.')
                                ->regex('/^[0-9]{10}/')
                                ->required(),

                            TextInput::make('research_title')
                                ->string()
                                ->maxLength(255)
                                ->placeholder('Enter your research title.')
                                ->required(),

                            Select::make('designation_id')
                                ->label('Designation')
                                ->options(Designation::all()->pluck('designation', 'id'))
                                ->searchable()
                                ->required(),

                            Select::make('faculty_id')
                                ->label('Faculty')
                                ->options(Faculty::all()->pluck('name', 'id'))
                                ->required()
                                ->searchable(),

                            TextInput::make('dean_name')
                                ->label('Dean\'s name')
                                ->helperText('Ex: Mr. Jhon de silva')
                                ->string()
                                ->maxLength(255)
                                ->placeholder('Enter your dean\'s name of your faculty')
                                ->required(),

                            TextInput::make('dean_email')
                                ->label('Dean\'s email')
                                ->string()
                                ->maxLength(75)
                                ->email()
                                ->placeholder('Enter your dean\'s sliit email address of your faculty')
                                ->endsWith(['sliit.lk'])
                                ->required(),

                            FileUpload::make('resume')
                                ->required()
                                ->helperText('Accepted filetype is pdf only. Max upload size 20mb.')
                                ->maxSize(1024 * 20)
                                ->disk('public')
                                ->directory('uploads/resumes')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    $filename = date("Y_m_d_h_i_s") . "_" . "resume";
                                    return (string)str($file->getClientOriginalExtension())->prepend($filename . ".");
                                })
                                ->acceptedFileTypes(['application/pdf']),

                            FileUpload::make('research_grant_proposal')
                                ->required()
                                ->maxSize(1024 * 20)
                                ->disk('public')
                                ->directory('uploads/research-grant-proposals')
                                ->helperText('Accepted filetypes are docx,doc only. Max upload size 20mb.')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    $filename = date("Y_m_d_h_i_s") . "_" . "research_grant_proposal";
                                    return (string)str($file->getClientOriginalExtension())->prepend($filename . ".");
                                })
                                ->acceptedFileTypes(['application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                            FileUpload::make('budget_activity_plan')
                                ->required()
                                ->maxSize(1024 * 20)
                                ->disk('public')
                                ->directory('uploads/budget-activity-plans')
                                ->helperText('Accepted filetypes are xlsx,xls only. Max upload size 20mb.')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    $filename = date("Y_m_d_h_i_s") . "_" . "budget_activity_plan";
                                    return (string)str($file->getClientOriginalExtension())->prepend($filename . ".");
                                })
                                ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel']),
                        ])
                    ]),

                Wizard\Step::make('Co-Principal Investigator Details')
                    ->description('Upload your co-investigator\'s documents.')
                    ->schema([

                        FileUpload::make('co_pi_attachments')
                            ->required()
                            ->label('Upload Co-Principal Investigator\'s CV(s)')
                            ->helperText('Accepted filetype is pdf only. Max upload size 20mb.')
                            ->maxSize(1024 * 20)
                            ->disk('public')
                            ->multiple()
                            ->maxFiles(5)
                            ->directory('uploads/co_pi_attachments')
                            ->acceptedFileTypes(['application/pdf']),
                    ]),

                Wizard\Step::make('Research Assistant Details')
                    ->description('Upload your assistant\'s documents.')
                    ->schema([

                        FileUpload::make('assistant_attachments')
                            ->label('Upload assistant\'s CV(s)')
                            ->helperText('Accepted filetype is pdf only. Max upload size 20mb.')
                            ->maxSize(1024 * 20)
                            ->disk('public')
                            ->multiple()
                            ->maxFiles(3)
                            ->directory('uploads/assistant_attachments')
                            ->acceptedFileTypes(['application/pdf']),
                    ])
            ])->submitAction(new HtmlString('<button class="filament-button filament-button-size-sm inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">Save</button>')),
        ];
    }

    public function getFormModel(): string
    {
        return PrincipalInvestigator::class;
    }

    public function savePrincipalInvestigator()
    {
        $exists = PrincipalInvestigator::where('email', $this->email)->exists();

        if ($exists) {
            $this->type = 'CORRECTED';
        }

        $principal_investigator = PrincipalInvestigator::create($this->form->getStateExcept(['co_pi_attachments', 'assistant_attachments']));

        if ($principal_investigator) {
            // saving co principal investigator attachments.
            $array1 = $this->form->getStateOnly(['co_pi_attachments']);
            foreach ($array1['co_pi_attachments'] as $var) {
                $principal_investigator->co_principal_investigators()->save(
                    new CoPrincipalInvestigator(['attachment' => $var])
                );
            }

            // saving assistant attachments.
            $array2 = $this->form->getStateOnly(['assistant_attachments']);
            foreach ($array2['assistant_attachments'] as $var) {
                $principal_investigator->research_assistants()->save(
                    new ResearchAssistant(['attachment' => $var])
                );
            }

            // sending email to dean
            Mail::to($this->dean_email)->send(new ResearchProposalSubmitted($principal_investigator, $this->dean_name));

        }

        if ($exists) {
            // catch grant number
            $grant_number = PrincipalInvestigator::where('email', $this->email)->value('grant_number');
            $principal_investigator->grant_number = $grant_number;
            $principal_investigator->save();
        }

        // creating statuses
        $principal_investigator->statuses()->create([
            'user_id' => Auth::id(),
            'name' => 'PENDING',
        ]);

        return redirect()->route('disbursement_plans.create', $principal_investigator->id);
    }

    public function render(): View
    {
        return view('principal-investigators.principal-investigator-create');
    }
}
