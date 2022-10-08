<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Mailgun\Exception\HttpClientException;
use Mailgun\Mailgun;
use Tests\TestCase;

class MailgunTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $api_key = config('services.mailgun.secret');
        $this->client = Mailgun::create($api_key);

        // ご注意： 実際にメール送信されます！
        $this->test_users = [
            ['email' => 'kredo4thbatch@gmail.com', 'name' => '山田太郎'],
        ];
    }

    public function test_can_add_member()
    {
        foreach ($this->test_users as $test_user) {

            $email = $test_user['email'];
            $name = $test_user['name'];

            $user = new User();
            $user->email = $email;
            $user->username = $name;
            $user->password = Hash::make('password');
            $user->save();

            $member = $this->getMailingListMember($email);
            $member_email_address = $member->getMember()->getAddress();
            $this->assertEquals($email, $member_email_address);

        }
    }

    public function test_can_send_mail()
    {
        $mailing_list_address = config('services.mailgun.mailinglist_address');
        $template = 'newsletter_2022_05'; // テンプレート名
        $domain = config('services.mailgun.domain');
        $params = [
            'from' => 'from@example.com',
            'to' => $mailing_list_address,
            'subject' => 'メルマガ送信のテスト',
            'template' => $template,
            'h:X-Mailgun-Variables' => json_encode([ // 追加データ
                'coupon_code' => 'ABC-123',
            ])
        ];

        $result = $this->client->messages()->send($domain, $params);
        $id = $result->getId();

        $this->assertNotEmpty($id);
    }

    public function test_can_remove_member()
    {
        foreach ($this->test_users as $test_user) {

            $email = $test_user['email'];

            $user = User::where('email', $email)->first();
            $user->delete();

            $exists = true;

            try {

                $this->getMailingListMember($email); // メンバーが存在していない場合は例外が発生する

            } catch (HttpClientException $e) {

                $exists = false;

            }

            $this->assertFalse($exists);

        }
    }

    private function getMailingListMember($email)
    {
        $mailing_list_address = config('services.mailgun.mailinglist_address');

        return $this->client
            ->mailingList()
            ->member()
            ->show($mailing_list_address, $email);
    }
}
