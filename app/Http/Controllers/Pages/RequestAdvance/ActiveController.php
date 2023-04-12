<?php

namespace App\Http\Controllers\Pages\RequestAdvance;

use App\Enums\AdvanceAccountStatus;
use App\Http\Controllers\Controller;
use App\Models\AdvanceAccount;
use App\Models\Employee;
use App\Models\User;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Services\Freedompay\P2P;
use Illuminate\Http\RedirectResponse;

class ActiveController extends Controller
{
    public function __construct(
        protected EmployeeRepositoryInterface $usersRepository
    ) {}

    public function __invoke(AdvanceAccount $account): RedirectResponse
    {
        $user = Employee::findOrFail($account->user_id);
        if ($user) {
            $post_advance = $this->p2pInit($user, $account);
            if ($post_advance->credit()) {
                $this->success($account, $user);
                return back();
            }
            toastError('Ошибка повторите попытку. Если ошибка повторяется, то сообщите нам.');
            return back();
        }
        toastError('Ошибка повторите попытку. Если ошибка повторяется, то сообщите нам.');
        return back();
    }

    protected function success(AdvanceAccount $account, User $user)
    {
        $account->update([
            'status' => AdvanceAccountStatus::ON_ACCEPT
        ]);
        $user->update([
            'balance' => $user->balance - $account->amount
        ]);
        toastSuccess('№ ' . $account->id . ', ' . $account->amount . 'T - успешно выплачена!');
    }

    protected function p2pInit(Employee $user, AdvanceAccount $item): P2P
    {
        return (new P2P())
            ->setOrderId($item->id)
            ->setUserId($user->id)
            ->setAmount(amount: $item->amount - $item->fee)
            ->setCardIdTo($this->usersRepository->getCard($user->id)->card_id)
            ->setPostLink(route('api_p2p_result'))
            ->setDescription('Выплата аванса на сумму ' . ($item->amount - $item->fee) . ' для пользователя #' . $user->id);
    }
}
