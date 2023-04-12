<?php

namespace App\Providers;

use App\Actions\AccruedAdvance\AdvanceAccrual;
use App\Actions\AccruedAdvance\AdvanceAccrualForPeriod;
use App\Actions\AccruedAdvance\CreateAccruedAdvance;
use App\Actions\AdvanceAccount\CreateRequestAdvance;
use App\Actions\Application\CreateApplication;
use App\Actions\Bring\CreateBring;
use App\Actions\City\CreateCity;
use App\Actions\City\UpdateCity;
use App\Actions\Company\CreateCompany;
use App\Actions\Company\UpdateCompany;
use App\Actions\Country\CreateCountry;
use App\Actions\Country\UpdateCountry;
use App\Actions\Department\CreateDepartment;
use App\Actions\Department\UpdateDepartment;
use App\Actions\Employee\CreateEmployee;
use App\Actions\Employee\UpdateEmployee;
use App\Actions\FAQ\CreateFAQ;
use App\Actions\FAQ\UpdateFAQ;
use App\Actions\FAQParent\CreateFAQParent;
use App\Actions\FAQParent\UpdateFAQParent;
use App\Actions\Feedback\CreateFeedback;
use App\Actions\Holiday\CreateHoliday;
use App\Actions\Holiday\UpdateHoliday;
use App\Actions\Manager\CreateManager;
use App\Actions\Manager\UpdateManager;
use App\Actions\Offer\CreateOffer;
use App\Actions\Offer\UpdateOffer;
use App\Actions\ProductionCalendar\CreateProductionCalendar;
use App\Actions\ProductionCalendar\UpdateProductionCalendar;
use App\Actions\Region\CreateRegion;
use App\Actions\Region\UpdateRegion;
use App\Actions\SuperManager\CreateSuperManager;
use App\Actions\SuperManager\UpdateSuperManager;
use App\Actions\Users\ActivityChangeUser;
use App\Actions\Users\ChangeProfile;
use App\Actions\Users\WithoutCheckingChangeUser;
use App\Contracts\AdvanceAccount\CreatesRequestAdvances;
use App\Contracts\Advances\AdvanceAccruals;
use App\Contracts\Advances\AdvanceAccrualsForPeriod;
use App\Contracts\Advances\CreatesAccruedAdvances;
use App\Contracts\Application\CreatesApplications;
use App\Contracts\Bring\CreatesBrings;
use App\Contracts\City\CreatesCities;
use App\Contracts\City\UpdatesCities;
use App\Contracts\Company\CreatesCompanies;
use App\Contracts\Company\UpdatesCompanies;
use App\Contracts\Country\CreatesCountries;
use App\Contracts\Country\UpdatesCountries;
use App\Contracts\Department\CreatesDepartments;
use App\Contracts\Department\UpdatesDepartments;
use App\Contracts\Employee\CreatesEmployees;
use App\Contracts\Employee\UpdatesEmployees;
use App\Contracts\FAQ\CreatesFAQs;
use App\Contracts\FAQ\UpdatesFAQs;
use App\Contracts\FAQParent\CreatesFAQParents;
use App\Contracts\FAQParent\UpdatesFAQParents;
use App\Contracts\Feedback\CreatesFeedbacks;
use App\Contracts\Holiday\CreatesHolidays;
use App\Contracts\Holiday\UpdatesHolidays;
use App\Contracts\Manager\CreatesManagers;
use App\Contracts\Manager\UpdatesManagers;
use App\Contracts\Offer\CreatesOffers;
use App\Contracts\Offer\UpdatesOffers;
use App\Contracts\ProductionCalendar\CreatesProductionCalendars;
use App\Contracts\ProductionCalendar\UpdatesProductionCalendars;
use App\Contracts\Region\CreatesRegions;
use App\Contracts\Region\UpdatesRegions;
use App\Contracts\SuperManager\CreatesSuperManagers;
use App\Contracts\SuperManager\UpdatesSuperManagers;
use App\Contracts\Users\ActivityChangesUsers;
use App\Contracts\Users\ChangesProfile;
use App\Contracts\Users\WithoutCheckingChangesUsers;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    protected array $actions = [
        CreatesCompanies::class => CreateCompany::class,
        UpdatesCompanies::class => UpdateCompany::class,
        CreatesCountries::class => CreateCountry::class,
        UpdatesCountries::class => UpdateCountry::class,
        CreatesCities::class => CreateCity::class,
        UpdatesCities::class => UpdateCity::class,
        CreatesDepartments::class => CreateDepartment::class,
        UpdatesDepartments::class => UpdateDepartment::class,
        CreatesProductionCalendars::class => CreateProductionCalendar::class,
        UpdatesProductionCalendars::class => UpdateProductionCalendar::class,
        CreatesHolidays::class => CreateHoliday::class,
        UpdatesHolidays::class => UpdateHoliday::class,
        CreatesRegions::class => CreateRegion::class,
        UpdatesRegions::class => UpdateRegion::class,
        CreatesManagers::class => CreateManager::class,
        UpdatesManagers::class => UpdateManager::class,
        ActivityChangesUsers::class => ActivityChangeUser::class,
        WithoutCheckingChangesUsers::class => WithoutCheckingChangeUser::class,
        CreatesEmployees::class => CreateEmployee::class,
        UpdatesEmployees::class => UpdateEmployee::class,
        CreatesAccruedAdvances::class => CreateAccruedAdvance::class,
        AdvanceAccruals::class => AdvanceAccrual::class,
        AdvanceAccrualsForPeriod::class => AdvanceAccrualForPeriod::class,
        CreatesSuperManagers::class => CreateSuperManager::class,
        UpdatesSuperManagers::class => UpdateSuperManager::class,
        ChangesProfile::class => ChangeProfile::class,
        CreatesRequestAdvances::class => CreateRequestAdvance::class,
        CreatesFAQs::class => CreateFAQ::class,
        UpdatesFAQs::class => UpdateFAQ::class,
        CreatesFAQParents::class => CreateFAQParent::class,
        UpdatesFAQParents::class => UpdateFAQParent::class,
        CreatesOffers::class => CreateOffer::class,
        UpdatesOffers::class => UpdateOffer::class,
        CreatesApplications::class => CreateApplication::class,
        CreatesFeedbacks::class => CreateFeedback::class,
        CreatesBrings::class => CreateBring::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        foreach ($this->actions as $contract => $action) {
            $this->app->singleton($contract, $action);
        }
    }
}
