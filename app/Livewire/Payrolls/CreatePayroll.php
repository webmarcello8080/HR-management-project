<?php

namespace App\Livewire\Payrolls;

use App\Http\Requests\PayrollRequest;
use App\Models\Employee;
use App\Models\Payroll;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePayroll extends Component
{
    public Payroll $payroll;
    
    #[Validate]
    public $payroll_date;
    #[Validate]
    public $annual_salary;
    #[Validate]
    public $gross_pay;
    #[Validate]
    public $deduction_percentage = 0;
    #[Validate]
    public $deduction = 0;
    #[Validate]
    public $insurance = 0;
    #[Validate]
    public $net_pay;
    #[Validate]
    public $employee_id;

    public function rules(){
        return (new PayrollRequest())->rules();
    }

    public function mount(Payroll $payroll): void
    {
        $this->payroll = $payroll ?? new Payroll();
        $this->payroll_date = $this->payroll->payroll_date ? $this->payroll->payroll_date->format('Y-m-d') : null;
        $this->fill(
            $payroll->only('annual_salary', 'gross_pay', 'deduction_percentage', 'deduction', 'insurance', 'net_pay', 'employee_id'),
        );
    }

    public function updated(): void
    {
        if($this->employee_id){
            $employee = Employee::find($this->employee_id);
            $this->annual_salary = $employee?->employeeInformation?->annual_salary;    
        }

        if($this->gross_pay){
            if($this->deduction_percentage){
                $this->deduction = $this->gross_pay * ($this->deduction_percentage / 100);
            }
            $this->net_pay = $this->gross_pay - $this->deduction - $this->insurance;
        }
    }

    public function save(): void
    {
        $validated = $this->validate();

        $this->payroll->fill($validated);
        $this->payroll->save();

        session()->flash('status', 'Payroll successfully submitted.');

        $this->redirectRoute('payroll.index');
    }

    public function render()
    {
        return view('livewire.payrolls.create-payroll');
    }
}
