<?php

namespace App\Http\Controllers\Pages\Application;

use App\Contracts\Application\CreatesApplications;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Services\Freedompay\CardStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function __construct(
        private readonly EmployeeRepositoryInterface $employeeRepository
    ) {
    }

    /**
     * Create a card change application.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contracts\Application\CreatesApplications $applicationsCreator
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, CreatesApplications $applicationsCreator): RedirectResponse
    {
        $this->authorize('create', Application::class);
        $ar = $request->all();
        $ar['user_id'] = auth()->id();
        $applicationsCreator->create($ar);
        toastSuccess('Ваша заявка принята. Наш менеджер с вами свяжется.');
        return back();
    }

    /**
     * Delete a card change application.
     *
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $cardStorage = new CardStorage();
        $card = $this->employeeRepository->getCard($application->user_id);
        $cardStorage->setUserId($application->user_id)->setCardId($card->card_id);
        if ($cardStorage->removeCard()) {
            $card->delete();
            toastSuccess('Карта удалена');
            return back();
        }
        toastError('Ошибка повторите попытку');
        return back();
    }
}
