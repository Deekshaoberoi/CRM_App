<?php

namespace App\Repositories;

use App\Models\Email;
use App\Data\EmailData;

class EmailRepository
{
    public function getEmailById(int $id, $relations = []): Email
    {
        return Email::with($relations)->findOrFail($id);
    }

    public function storeEmail(EmailData $emailData): Email
    {
        $email = new Email;
        $email->fill($emailData->except('id')->toArray());
        $email->save();

        return $email;
    }

    public function deleteEmail(Email $email): bool
    {
        return $email->delete();
    }
}
