<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\LibCity;
use App\Policies\CityPolicy;

use App\Models\LibCountry;
use App\Policies\CountryPolicy;

use App\Models\LibCompany;
use App\Policies\CompanyPolicy;

use App\Models\LibRegion;
use App\Policies\RegionPolicy;

use App\Models\Employee;
use App\Policies\EmployeePolicy;

use App\Models\AdvanceAccount;
use App\Policies\AdvanceAccountPolicy;

use App\Models\Manager;
use App\Policies\ManagerPolicy;

use App\Models\SuperManager;
use App\Policies\SuperManagerPolicy;

use App\Models\Card;
use App\Policies\CardPolicy;

use App\Models\Tariff;
use App\Policies\TariffPolicy;

use App\Models\Bring;
use App\Policies\BringPolicy;

use App\Models\Faq;
use App\Policies\FaqPolicy;

use App\Models\Offer;
use App\Policies\OfferPolicy;

use App\Models\FaqParent;
use App\Policies\FaqParentPolicy;

use App\Models\Application;
use App\Policies\ApplicationPolicy;

use App\Models\ProductionCalendar;
use App\Policies\ProductionCalendarPolicy;

use App\Models\Holiday;
use App\Policies\HolidayPolicy;

use App\Models\RefundApplication;
use App\Policies\RefundApplicationPolicy;

use App\Models\Department;
use App\Policies\DepartmentPolicy;

use App\Models\Feedback;
use App\Policies\FeedbackPolicy as FeedbackPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        LibCity::class => CityPolicy::class,
        LibCountry::class => CountryPolicy::class,
        LibRegion::class => RegionPolicy::class,
        LibCompany::class => CompanyPolicy::class,
        Employee::class => EmployeePolicy::class,
        AdvanceAccount::class => AdvanceAccountPolicy::class,
        Manager::class => ManagerPolicy::class,
        SuperManager::class => SuperManagerPolicy::class,
        Card::class => CardPolicy::class,
        Tariff::class => TariffPolicy::class,
        Bring::class => BringPolicy::class,
        Faq::class => FaqPolicy::class,
        Feedback::class => FeedbackPolicy::class,
        Offer::class => OfferPolicy::class,
        FaqParent::class => FaqParentPolicy::class,
        Application::class => ApplicationPolicy::class,
        ProductionCalendar::class => ProductionCalendarPolicy::class,
        Holiday::class => HolidayPolicy::class,
        RefundApplication::class => RefundApplicationPolicy::class,
        Department::class => DepartmentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
