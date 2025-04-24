<?php

use Illuminate\Support\Facades\Storage;
use Jenssegers\Agent\Agent;

function isMobile()
{
    $agent = new Agent();

    if ($agent->isMobile()) {
        return 'mobile';
    } elseif ($agent->isTablet()) {
        return 'tablet';
    } else {
        return "desktop";
    }
}

function formatDate($date, string $format = 'd-M-Y H:i:s'): string
{

    return \Illuminate\Support\Carbon::parse($date)->format($format);
}

function getUserInformation($id)
{
    return \App\Models\User::find($id);
}

function updateUserWallet($userData, $amount, $status, $note)
{
    try {
        $userWallet = $userData->bonus_wallet;
        $userId = $userData->id;
        $updatedAmount = $status == 'approve' ? ($userWallet - $amount) : $userWallet + $amount;

        $walletUpdateStatus = \App\Models\User::where('id', $userId)->update([
            'bonus_wallet' => $updatedAmount
        ]);

        if ($walletUpdateStatus) {

            $transactionData = [
                'user_id' => $userId,
                'amount' => $amount,
                'type' => $status == 'reject' ? CASH_IN : CASH_OUT,
                'status' => $status == 'reject' ? WITHDRAWAL_REJECT_STATUS : WITHDRAWAL_APPROVED_STATUS,
            ];

            createTransaction($transactionData);
        }

        return true;
    } catch (Exception $e) {
        return false;
    }
}

function uniqueId($l = 8): string
{
    return strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, $l));
}

function createTransaction($data)
{
    if (!empty($data)) {
        $createTransaction = \App\Models\Transaction::create($data);

        if (!empty($createTransaction)) {
            return $createTransaction;
        }
    }
    return false;
}

function getSettingsData($input = null)
{
    if (empty($input)) {
        $data = \App\Models\SiteSetting::get()
            ->pluck('value', 'key')
            ->toArray();
    } elseif (is_array($input)) {
        $data = \App\Models\SiteSetting::whereIn('key', $input)
            ->get()
            ->pluck('value', 'key')
            ->toArray();
    } else {
        $item = \App\Models\SiteSetting::where('key', $input)->first();

        $data = empty($item) ? '' : $item->value;
    }

    return $data;
}

function getSiteSettingsData($settingArray, $level)
{

    foreach ($settingArray as $key => $item) {
        if ($key == $level) {
            return $item;
        }
    }
}

function uploadImage($file , $path)
{
    $filename = time() . '_' . $file->getClientOriginalName();
    return Storage::disk('public')->putFileAs($path, $file, $filename);
}

