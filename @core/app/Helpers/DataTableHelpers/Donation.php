<?php


namespace App\Helpers\DataTableHelpers;


use App\Helpers\DonationHelpers;

class Donation
{
    public static function infoColumn($row)
    {
        $output = '<ul>';
        $output .= '<li><strong>' . __('Title') . ':</strong> ' . purify_html($row->title) . '</li>';
        $output .= '<li><strong>' . __('Goal') . ':</strong> ' . amount_with_currency_symbol($row->amount) . '</li>';
        $output .= '<li><strong>' . __('Raised') . ':</strong> ';
        $output .= $row->raised ? amount_with_currency_symbol($row->raised) : amount_with_currency_symbol(0);
        $output .= '</li>';
        $output .= '<li><strong>' . __('Created At') . ':</strong> ' . date("d - M - Y", strtotime($row->created_at)) . '</li>';
        $output .= '<li><strong>' . __('Created By') . ':</strong> ';
        if ($row->created_by === 'user') {
            $output .= optional($row->user)->name ?? __('Anonymous') . ' (' . optional($row->user)->username ?? __('username not found') . ')';
        } else {
            $output .= optional($row->admin)->name ?? __('Anonymous') . ' (' . optional($row->admin)->username ?? __('username not found') . ')';
        }
        $output .= '</li>';

        if ($row->created_by === 'user' && !empty($row->withdraws)) {
            $output .= '<li><strong>' . __('Withdraw') . ':</strong> ' . amount_with_currency_symbol($row->withdraws->where('payment_status', 'approved')->pluck('withdraw_request_amount')->sum()) . '</li>';

            $withdraw_able_amount_without_admin_charge =$row->raised - optional($row->withdraws)->where('payment_status', 'approved')->pluck('withdraw_request_amount')->sum();
            $charge_text = '';
            $donation_charge_form = get_static_option('donation_charge_form');
            if ($donation_charge_form === 'campaign_owner'){
                $charge_text = __('after admin charge applied');
                $output .= '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                $withdraw_able_amount_without_admin_charge -= DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
            }
            $output .= '<li><strong>'.__('Available For Withdraw ').' '.$charge_text.': </strong> '.amount_with_currency_symbol($withdraw_able_amount_without_admin_charge).'</li>';


            $output .= '<li><strong>' . __('Pending Withdraw Request') . ':</strong> ' . amount_with_currency_symbol($row->withdraws->where('payment_status', 'pending')->pluck('withdraw_request_amount')->sum()) . '</li>';
        }
        $output .= ' <li class="donation-status"><strong>' . __('Status') . ':</strong> ' . $row->status . '</li>';
        $output .= '</ul>';
        return $output;
    }

    public static function aboutUpdate($id)
    {
        $title = __('Add/Edit Update About Cause');
        $url = route('add.new.update.cause.page',$id);
        return <<<HTML
        <a href="{$url}"
           class="btn btn-info text-white mb-3 mr-1">{$title}
        </a>
HTML;
    }
    public static function comments($id)
    {
        $title = __('Cause Comments');
        $url = route('all.cause.comment.page',$id);
        return <<<HTML
        <a href="{$url}"
           class="btn btn-success text-white mb-3 mr-1">{$title}
        </a>
HTML;
    }

    public static function campaignApprove($id){
        $title = __('Approve This Campaign');
        $csrf = csrf_field();
        $action = route('admin.donation.approve');
        return <<<HTML
    <form action="{$action}" method="post"
          enctype="multipart/form-data">
          {$csrf}
        <input type="hidden" name="id" value="{$id}">
        <button class="btn btn-warning text-white mb-2"
                type="submit">{$title}
        </button>
    </form>
HTML;

    }

    public static function paymentInfoColumn($row){

        $output = '<ul>';
        $output .= '<li><strong>'.__('Title').': </strong> '.purify_html(optional($row->cause)->title).'</li>';
        $output .= '<li><strong>'.__('Name').': </strong> '.purify_html($row->name).'</li>';
        $output .= '<li><strong>'.__('Email').': </strong> '.purify_html($row->email).'</li>';
        $output .= '<li><strong>'.__('Amount').': </strong> '.amount_with_currency_symbol($row->amount).'</li>';
        $output .= '<li><strong>'.__('Admin Charge').': </strong> '.amount_with_currency_symbol($row->admin_charge).'</li>';
        $output .= '<li><strong>'.__('Payment Gateway').': </strong> '.ucwords(str_replace('_',' ',$row->payment_gateway)).'</li>';
        if ($row->status === 'complete' && $row->payment_gateway != 'manual_payment'){
            $output .= '<li><strong>'.__('Transaction ID').': </strong> '.$row->transaction_id.'</li>';
        }
        $output .= '<li><strong>'.__('Date').': </strong> '.date_format($row->created_at,'d M Y').'</li>';
        $output .= '</ul>';
        return $output;
    }
    public static function withdrawInfoColumn($row){
        
        $output = '<ul>';
        $output .= '<li><strong>'.__('Cause').': </strong> '.purify_html(optional($row->cause)->title).'</li>';
        $output .= '<li><strong>'.__('Requested By').': </strong> '.purify_html(optional($row->user)->name ?? __('untitled')).' ('.optional($row->user)->username.')'.'</li>';
        if(!empty($row->cause)){
            $withdraw_able_amount_without_admin_charge = optional($row->cause)->raised - optional($row->cause)->withdraws->where('payment_status' , 'approved')->pluck('withdraw_request_amount')->sum();
            $charge_text = '';
            $donation_charge_form = get_static_option('donation_charge_form');
            if ($donation_charge_form === 'campaign_owner'){
                $charge_text = __('after admin charge applied');
                $output .= '<li><strong>'.__('Admin Charged From This Campaign').': </strong> '.amount_with_currency_symbol( DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge)).'</li>';
                $withdraw_able_amount_without_admin_charge -= DonationHelpers::get_donation_charge_for_campaign_owner($withdraw_able_amount_without_admin_charge);
            }
            $output .= '<li><strong>'.__('Available For Withdraw Amount').' '.$charge_text.': </strong> '.amount_with_currency_symbol($withdraw_able_amount_without_admin_charge).'</li>';
        }

        $output .= '<li><strong>'.__('Requested Withdraw Amount').': </strong> '.amount_with_currency_symbol($row->withdraw_request_amount).'</li>';
        $output .= '<li><strong>'.__('Payment Gateway').': </strong> '.ucwords(str_replace('_',' ',$row->payment_gateway)).'</li>';
        $output .= '<li><strong>'.__('Payment Status').': </strong> '.$row->payment_status.'</li>';
        $output .= '<li><strong>'.__('Date').': </strong> '.date_format($row->created_at,'d M Y').'</li>';
        if($row->payment_status === 'approved'){
            $output .= '<li><strong>'.__('Approved Date').': </strong> '.date_format($row->updated_at,'d M Y').'</li>';
        }
        $output .= '</ul>';
        return $output;
    }

}