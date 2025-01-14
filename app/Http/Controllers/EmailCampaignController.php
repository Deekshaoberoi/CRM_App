<?php

namespace App\Http\Controllers;

use App\Data\EmailCampaignData;
use App\Repositories\EmailCampaignRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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

    public function search(Request $request)
    {
        return EmailCampaignData::collect(QueryBuilder::for(EmailCampaign::class)
            ->allowedSorts(['id'])
            ->allowedFilters([
                'id',
                AllowedFilter::exact('id'),
            ])
            ->get());
    }
}
