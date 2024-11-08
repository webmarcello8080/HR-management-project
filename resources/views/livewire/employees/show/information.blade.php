<div>
    <div class="tab-wrapper">
        <div class="tab cursor-pointer @if($tabStep == 1) active @endif" wire:click='getToStep(1)'>@svg('user', 'w-6 h-6') <span>Personal Information</span></div>
        <div class="tab cursor-pointer @if($tabStep == 2) active @endif" wire:click='getToStep(2)'>@svg('briefcase', 'w-6 h-6') <span>Professional Information</span></div>
        <div class="tab cursor-pointer @if($tabStep == 3) active @endif" wire:click='getToStep(3)'>@svg('lock', 'w-6 h-6') <span>Account Access</span></div>
    </div>
    <div>
        @if ($tabStep == 1)
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">First Name</div><div>{{ $employee->first_name }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Last Name</div><div>{{ $employee->last_name }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Mobile Number</div><div>{{ $employee->mobile_number }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Email Address</div><div>{{ $employee->email }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Date of Birth</div><div>{{ $employee->dob }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Marital Status</div><div>{{ $employee->marital_status?->label() }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Gender</div><div>{{ $employee->gender?->label() }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Nationality</div><div>{{ $employee->nationality }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Address</div><div>{{ $employee->address }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">City</div><div>{{ $employee->city }}</div>
                </div>
            </div>
            <div class="flex pb-2 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Country</div><div>{{ $employee->country }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Post Code</div><div>{{ $employee->post_code }}</div>
                </div>
            </div>
        @endif
        @if ($tabStep == 2)
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Employee ID</div><div>{{ $employee?->employeeInformation?->unique_id }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Designation</div><div>{{ $employee?->employeeInformation?->designation }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Joining Date</div><div>{{ $employee?->employeeInformation?->joining_date }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Annual Salary</div><div>{{ $employee?->employeeInformation?->annual_salary }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Days of Holiday</div><div>{{ $employee?->employeeInformation?->days_of_holiday }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Holidays remaining this year</div><div>{{ $employee?->employeeInformation?->getHolidayLeft(date('Y')) }}</div>
                </div>
            </div>
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Employee Type</div><div>{{ $employee?->employeeInformation?->employeeType?->name }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Working Days</div><div>{{ $employee?->employeeInformation?->working_day?->label() }}</div>
                </div>
            </div>
            <div class="flex pb-2 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Department</div><div>{{ $employee?->employeeInformation?->department?->name }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Location</div><div>{{ $employee?->employeeInformation?->location?->name }}</div>
                </div>
            </div>
        @endif
        @if ($tabStep == 3)
            <div class="flex pb-2 border-b border-grey/20 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Internal Email</div><div>{{ $employee?->user?->email }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Slack ID</div><div>{{ $employee?->employeeAccount?->slack_id }}</div>
                </div>
            </div>
            <div class="flex pb-2 mb-5 gap-5">
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Skype ID</div><div>{{ $employee?->employeeAccount?->skype_id }}</div>
                </div>
                <div class="flex-1 flex-grow">
                    <div class="small-caption">Github ID</div><div>{{ $employee?->employeeAccount?->github_id }}</div>
                </div>
            </div>
        @endif
    </div>
</div>
