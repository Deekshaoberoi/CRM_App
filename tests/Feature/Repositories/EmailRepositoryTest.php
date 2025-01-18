<?php

namespace Tests\Feature\Repositories;

use App\Data\EmailData;
use App\Models\Email;
use App\Repositories\EmailRepository;
use Tests\TestCase;

class EmailRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private EmailRepository $emails;

    protected function setUp(): void
    {
        parent::setUp();

        $this->emails = app(EmailRepository::class);
    }

    public function test_get_email_by_id(): void
    {
        $email = Email::factory()->create();

        $this->assertEquals(Email::class, get_class($this->emails->getEmailById($email->id)));
    }

    public function test_store_email(): void
    {
        $emails = Email::factory()->make([
            'to' => 'test@example.com',
            'cc' => 'cc@example.com',
            'bcc' => 'bcc@example.com',
        ]);
        $emailData = new EmailData(collect($emails->only(['to', 'cc', 'bcc']))->toArray());

        $this->emails->storeEmail($emailData);

        $this->assertDatabaseHas((new Email)->getTable(), [
            'to' => 'test@example.com',
            'cc' => 'cc@example.com',
            'bcc' => 'bcc@example.com',
        ]);
    }

    public function test_delete_email(): void
    {
        $emails = Email::factory()->create();

        $this->emails->deleteEmail($emails);

        $this->assertDatabaseMissing((new Email)->getTable(), [
            'id' => $emails->id,
        ]);
    }
}
