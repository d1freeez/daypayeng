<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Ajax\AmountPercentController;
use App\Http\Controllers\Ajax\CompanyDepartmentsController;
use App\Http\Controllers\Ajax\FilterFaqParentsController;
use App\Http\Controllers\Pages\AdvanceAccount\AcceptController as AdvanceAccountAcceptController;
use App\Http\Controllers\Pages\AdvanceAccount\ArchiveController as AdvanceAccountArchiveController;
use App\Http\Controllers\Pages\AdvanceAccount\MainController as AdvanceAccountMainController;
use App\Http\Controllers\Pages\Application\CardController as CardApplicationsController;
use App\Http\Controllers\Pages\Application\MainController as ApplicationsMainController;
use App\Http\Controllers\Pages\Auth\LoginController;
use App\Http\Controllers\Pages\Company\AccrualAdvanceController as CompanyAccrualPeriodController;
use App\Http\Controllers\Pages\Company\ActiveController as CompanyChangeActivityController;
use App\Http\Controllers\Pages\Company\MainController as CompanyMainController;
use App\Http\Controllers\Pages\Dashboard\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Pages\Employee\AccrualPeriodController as EmployeeAccrualPeriodController;
use App\Http\Controllers\Pages\Employee\AccruedCalendarController as EmployeeAccruedCalendarController;
use App\Http\Controllers\Pages\Employee\ActiveController as EmployeeActivateController;
use App\Http\Controllers\Pages\Employee\BaseController as EmployeesMainController;
use App\Http\Controllers\Pages\Employee\WithoutCheckingController as EmployeeChangeWithoutCheckingController;
use App\Http\Controllers\Pages\Feedback\ChangeAnsweredController as FeedbackChangeAnsweredController;
use App\Http\Controllers\Pages\Feedback\FeedbackController;
use App\Http\Controllers\Pages\Lib\BringController;
use App\Http\Controllers\Pages\Lib\DepartmentController;
use App\Http\Controllers\Pages\Lib\Faq\ChangeLegalController as FaqChangeLegalController;
use App\Http\Controllers\Pages\Lib\Faq\MainController as FaqMainController;
use App\Http\Controllers\Pages\Lib\FaqParentController;
use App\Http\Controllers\Pages\Lib\Offer\ChangePublishedController as OffersChangePublished;
use App\Http\Controllers\Pages\Lib\Offer\MainController as OffersController;
use App\Http\Controllers\Pages\Manager\ActiveController as ManagerChangeActivityController;
use App\Http\Controllers\Pages\Manager\BaseController as ManagerMainController;
use App\Http\Controllers\Pages\RefundApplicationController;
use App\Http\Controllers\Pages\RequestAdvance\ActiveController as CreditAdvanceController;
use App\Http\Controllers\Pages\RequestAdvance\CompanyController as RequestAdvanceCompanyController;
use App\Http\Controllers\Pages\RequestAdvance\MainController as RequestAdvanceMainController;
use App\Http\Controllers\Pages\SuperManager\ActiveController as SuperManagerChangeActivityController;
use App\Http\Controllers\Pages\SuperManager\MainController as SuperManagerMainController;

require __DIR__ . '/web/vue.php';

Route::get('/main/offers/show/{item}', [OffersController::class, 'show'])->name(
    'offer_show'
);

require __DIR__ . '/web/auth.php';
require __DIR__ . '/web/dashboards.php';



/**
 * Ajax Routes
 */
Route::group(['prefix' => 'ajax'], function () {
    Route::get('faq-parent', FilterFaqParentsController::class)->name('ajax_faq_parents');
    Route::get('amount-percent', AmountPercentController::class)->name(
        'ajax_amount_percent'
    );
    Route::get(
        'company/{company}/departments',
        CompanyDepartmentsController::class
    )->name('ajax_company_departments');
});

Route::group(['middleware' => 'auth'], function () {
    /** Logout route */
    Route::get('logout', [LoginController::class, 'destroy'])
        ->name('logout');

    /** Admin routes */
    Route::prefix('admin')
        ->middleware('auth.admin')
        ->group(function () {
            Route::get('', AdminIndexController::class)
                ->name('dashboard.admin');

            /** Libraries routes. */
            require __DIR__ . '/web/libs.php';
        });

    /**
     * Company pages
     */
    Route::resource('companies', CompanyMainController::class);
    Route::prefix('companies')->group(function () {
        Route::post('{company}/change-activity', CompanyChangeActivityController::class)
            ->name('companies.change.activity');
        Route::post('{company}/accrual-period', CompanyAccrualPeriodController::class)
            ->name('companies.accrual.period');
    });

    /**
     * Employee pages
     */
    Route::resource('employees', EmployeesMainController::class);
    Route::prefix('employees')->group(function () {
        Route::get('{employee}/without-checking', EmployeeChangeWithoutCheckingController::class)
            ->name('employees.without.checking');
        Route::get('{employee}/change-activity', EmployeeActivateController::class)
            ->name('employees.change.activity');
        Route::post('{employee}/accrual-period', EmployeeAccrualPeriodController::class)
            ->name('employees.accrual.period');
        Route::get('{employee}/accrued-calendar', [EmployeeAccruedCalendarController::class, 'show'])
            ->name('employees.accrued.calendar');
        Route::delete('{employee}/accrued-calendar/{advance}', [EmployeeAccruedCalendarController::class, 'destroy'])
            ->name('employees.accrued.calendar.destroy');
    });

    /**
     * Manager pages
     */
    Route::resource('managers', ManagerMainController::class);
    Route::get('managers/change-activity/{manager}', ManagerChangeActivityController::class)
        ->name('managers.change.activity');

    /**
     * Super Manager pages
     */
    Route::resource('super-managers', SuperManagerMainController::class);
    Route::post('super-mangers/{manager}/change-activity', SuperManagerChangeActivityController::class)
        ->name('super-managers.change.activity');

    /**
     * AdvanceAccount pages
     */
    Route::prefix('advance-account')->group(function () {
        Route::get('', [AdvanceAccountMainController::class, 'index'])
            ->name('accounts.index');
        Route::put('{account}/accept', AdvanceAccountAcceptController::class)
            ->name('accounts.accept');
        Route::get('archive', [AdvanceAccountArchiveController::class, 'index'])
            ->name('accounts.archive');
        Route::delete('archive/{account}/destroy', [AdvanceAccountArchiveController::class, 'destroy'])
            ->name('accounts.destroy');
    });

    /**
     * Request advance pages
     */
    Route::prefix('request-advances')->group(function () {
        Route::get('', [RequestAdvanceMainController::class, 'index'])
            ->name('request-advances.index');
        Route::get('create', [RequestAdvanceMainController::class, 'create'])
            ->name('request-advances.create');
        Route::post('', [RequestAdvanceMainController::class, 'store'])
            ->name('request-advances.store');
        Route::post('{account}/company-accept', [RequestAdvanceCompanyController::class, 'store'])
            ->name('request-advances.company.accept');
        Route::delete('{account}/company-reject', [RequestAdvanceCompanyController::class, 'destroy'])
            ->name('request-advances.company.reject');
        Route::post('{account}/credit', CreditAdvanceController::class)->name('request-advances.credit');
    });

    /**
     * Bring pages
     */
    Route::prefix('brings')->group(function () {
        Route::get('', [BringController::class, 'index'])->name('brings.index');
        Route::get('{bring}/show', [BringController::class, 'show'])->name('brings.show');
        Route::delete('{bring}', [BringController::class, 'destroy'])->name('brings.destroy');
    });

    /**
     * Faq pages
     */
    Route::resource('faqs', FaqMainController::class);
    Route::get('faqs/{faq}/change-legal', FaqChangeLegalController::class)->name('faqs.change.legal');

    /**
     * FaqParent pages
     */
    Route::resource('faq-parents', FaqParentController::class)->except('create', 'edit');

    /**
     * Offer pages
     */
    Route::resource('offers', OffersController::class);
    Route::put('offers/{offer}/change-publishing', OffersChangePublished::class)
        ->name('offers.change.publishing');

    /**
     * Application pages
     */
    Route::prefix('applications')->group(function () {
        Route::get('', [ApplicationsMainController::class, 'index'])->name('applications.index');
        Route::get('{application}', [ApplicationsMainController::class, 'show'])->name('applications.show');
        Route::delete('{application}', [ApplicationsMainController::class, 'destroy'])->name('applications.destroy');
        Route::delete('{application}/card-destroy', [CardApplicationsController::class, 'destroy'])->name(
            'applications.card.destroy'
        );
    });

    /**
     * Refund Application pages
     */
    Route::prefix('refund-applications')->group(function () {
        Route::get('', [RefundApplicationController::class, 'index'])->name('refund-applications.index');
        Route::post('{refundApplication}', [RefundApplicationController::class, 'store'])->name(
            'refund-applications.store'
        );
        Route::delete('{refundApplication}', [RefundApplicationController::class, 'destroy'])->name(
            'refund-applications.destroy'
        );
        Route::post('{refundApplication}/accept', [RefundApplicationController::class, 'refund'])->name(
            'refund-applications.refund'
        );
    });

    /**
     * Department pages
     */
    Route::resource('departments', DepartmentController::class)->except(
        'create',
        'edit'
    );

    /**
     * Feedback pages
     */
    Route::prefix('feedbacks')->group(function () {
        Route::get('', [FeedbackController::class, 'index'])->name('feedbacks.index');
        Route::get('{feedback}', [FeedbackController::class, 'show'])->name('feedbacks.show');
        Route::delete('{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
        Route::put('{feedback}/change-answered', FeedbackChangeAnsweredController::class)->name(
            'feedbacks.change.answered'
        );
    });
});
