<?php


namespace App\MenuBuilder\MegaMenus;


use App\Cause;
use App\MenuBuilder\MegaMenuBase;

class DonationMegaMenu extends MegaMenuBase
{

    function model(){
        return 'App\Cause';
    }

    function render($ids,$lang)
    {
        // TODO: Implement render() method.
        //it will have all html markup for the mega menu
        $ids = explode(',',$ids);
        $output = '';
        if (empty($ids)){
            return $output;
        }
        $output .= $this->body_start();

        // TODO:what you want you can write,inside this,
        // TODO:it's recommended to have a column inside it
        $mega_menu_items = Cause::whereIn('id',$ids)->get();
        foreach ($mega_menu_items as $post) {
            $output .= '<div class="col-lg-4 col-md-6">';
            $output .= '<div class="single-donation-mega-menu-item">';
            $output .= '<div class="thumbnail"><a href="'.route('frontend.donations.single',$post->slug).'">'.render_image_markup_by_attachment_id($post->image,'','thumb').'</a></div>';
            $output .= '<div class="content">';
            $output .= '<a href="'.route('frontend.donations.single',$post->slug).'"><h4 class="title">'.$post->title.'</h4></a>';

            $output .= '<div class="goal">';
            $output .=  '<h4 class="raised">'.get_static_option('donation_raised_text');
            if(!empty($post->raised)){
                $output .= ' '.amount_with_currency_symbol($post->raised);
            }else{
                $output .= ' '.amount_with_currency_symbol(0);
            }
            $output .='</h4>';
            $output .= '<h4 class="raised">'.get_static_option('donation_goal_text').' '.amount_with_currency_symbol($post->amount).'</h4>';
            $output .= '</div>';
            $output .= ' <a href="'.route('frontend.donations.single',$post->slug).'" class="boxed-btn">'.get_static_option('donation_button_text').'</a>';
            $output .= '</div></div></div>';
        }

        $output .= $this->body_end();
        // TODO: return all makrup data for render it to frontend
        return $output;

    }

    function category($id)
    {
        return '';
    }

    function name()
    {
        // TODO: Implement name() method.
        return 'donation_page_name';
    }
    function slug()
    {
        // TODO: Implement name() method.
        return 'donation_page_slug';
    }
    function enable()
    {
        // TODO: Implement enable() method.
        return true;
    }
    function query_type()
    {
        // TODO: Implement query_type() method.
        return 'no_lang'; // old_lang|new_lang
    }
    function title_param()
    {
        // TODO: Implement title_param() method.
        return 'title';
    }
}
