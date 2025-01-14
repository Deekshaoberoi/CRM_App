<?php

namespace App\Http\Controllers;

use App\Data\EmailCampaignData;
use App\Repositories\EmailCampaignRepository;
use Illuminate\Support\Facades\Redirect;

class EmailCampaignController extends Controller
{
    public function __construct(private EmailCampaignRepository $emailCampaignRepository) {}

    public function index()
    {
        return view('Email-campaigns.index');
    }

    public function create()
    {
        return view('Email-campaigns.create');
    }

    public function store(EmailCampaignData $request)
    {
        $this->emailCampaignRepository->storeEmailCampaign($request->validated());

        return Redirect::route('Email-campaigns.index');
    }

    public function update(EmailCampaignData $request, int $id)
    {
        $this->emailCampaignRepository->updateEmailCampaign($request->validated(),
            $this->emailCampaignRepository->getEmailCampaignById($id));

        return Redirect::route('Email-campaigns.index');
    }
}
