<?php

namespace App\Livewire\Attendances;

use App\Models\Attendance;
use App\Services\AttendanceSearchService;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class IndexAttendance extends Component
{
    use WithPagination;
    
    public string $search = '';
    public string $search_date = '';

    public function updated(): void
    {
        $this->resetPage();
    }

    #[On('refreshParent')]
    public function render(): View
    {
        $perPage = Session::get('per_page', 10);

        if(!$this->search && !$this->search_date){
            $attendances = Attendance::orderBy('date', 'desc')->paginate($perPage);
        } else{
            $searchService = new AttendanceSearchService;
            $attendances = $searchService->search($this->search, $this->search_date)->orderBy('date', 'desc')->paginate($perPage);
        }

        return view('livewire.attendances.index-attendance', [
            'attendances' => $attendances,
        ]);
    }
}
