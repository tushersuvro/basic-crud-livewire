<?php

namespace App\Livewire\Issues;

use App\Models\Issue;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class IssueList extends Component
{
    public $page;
    protected $queryString = ['page'];

    public function render(): View
    {
        $issues = Issue::with('client')->latest()->paginate(); //dd($this->page);

        session('submit_redirect', '');
        // creating $this->page variable using public property $page
        // and value of protected property $queryString
        if( $this->page > 0) { // if page query string has value greater than 0
            session()->put('submit_redirect', $_SERVER['REQUEST_URI']); //getting current query string from url and saving it to session variable
        }
        return view('livewire.issues.issue-list', compact('issues'));
    }

    public function delete(Issue $issue): void
    {
        $issue->delete();
        $redirectTo = session()->get('submit_redirect');
        // deleting and redirecting to the page from where deletion is happening which may be not in 1 but in 2,3,4 etc
        if( !empty( $redirectTo ) ) {
            redirect(url('').$redirectTo)->with( 'success', 'Issue deleted successfully' );
        }
    }

}
