<?php

namespace App\Livewire\Issues;

use App\Models\Client;
use App\Models\Issue;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class IssueForm extends Component
{
    public ?Issue $issue = null;

    public string $title= '';
    public string|null $description = '';
    public int|null $client_id = null;

    public bool $editing = false; // tracking form whether it is in create or edit mode

    public $clients;

    // using this method to load issue first if the form is in edit mode
    public function mount(Issue $issue): void
    {
        $this->issue = $issue; //dd($this->issue);

        if ($this->issue->exists) {
            $this->editing = true;
            $this->title = $issue->title;
            $this->description = $issue->description;
            $this->client_id = $issue->client_id;
        }

        $this->clients = Client::orderBy('name','asc')->get();
    }

    // this will be default load view method for this livewire component
    public function render(): View
    {
        return view('livewire.issues.issue-form');
    }

    // this method will be used after form is submitted in livewire component
    public function save(): Redirector|RedirectResponse
    {
        $this->validate(); //dd('inside save');

        if ( !$this->editing ) {
            $this->issue = Issue::create($this->only(['title', 'description', 'client_id']));
        } else {
            $this->issue->update($this->only(['title', 'description', 'client_id']));
        }

        return to_route('issues');
    }

    // rules that will be used in livewire component during form submission
    protected function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'required',
            ],
            'client_id' => [
                'required',
            ]
        ];
    }
}
