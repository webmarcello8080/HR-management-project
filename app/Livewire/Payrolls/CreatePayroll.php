<?php

namespace App\Livewire\Payrolls;

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
        return [
            'payroll_date' => 'required|date',
            'annual_salary' => 'required|numeric',
            'gross_pay' => 'required|numeric',
            'deduction_percentage' => 'nullable|numeric',
            'deduction' => 'nullable|numeric',
            'insurance' => 'nullable|numeric',
            'net_pay' => 'required|numeric',
            'employee_id' => 'required|integer',
        ];
    }

    public function mount(Payroll $payroll): void
    {
        $this->payroll = $payroll ?? new Payroll();
        $this->payroll_date = $this->payroll->payroll_date ? $this->payroll->payroll_date->format('Y-m-d') : null;
        $this->annual_salary = $this->payroll->annual_salary;
        $this->gross_pay = $this->payroll->gross_pay;
        $this->deduction_percentage = $this->payroll->deduction_percentage;
        $this->deduction = $this->payroll->deduction;
        $this->insurance = $this->payroll->insurance;
        $this->net_pay = $this->payroll->net_pay;
        $this->employee_id = $this->payroll->employee_id;
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

        $this->redirectRoute('payroll.index');
    }

    public function render()
    {
        return view('livewire.payrolls.create-payroll');
    }
}
